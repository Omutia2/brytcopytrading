<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trading_account_id',
        'master_account_id',
        'symbol',
        'type',
        'lot_size',
        'entry_price',
        'exit_price',
        'profit_loss',
        'status',
        'notes',
        'opened_at',
        'closed_at',
    ];

    protected $casts = [
        'entry_price' => 'decimal:5',
        'exit_price' => 'decimal:5',
        'profit_loss' => 'decimal:2',
        'lot_size' => 'decimal:2',
        'opened_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tradingAccount()
    {
        return $this->belongsTo(TradingAccount::class);
    }

    public function masterAccount()
    {
        return $this->belongsTo(MasterAccount::class);
    }

    /**
     * Check if this is a master account trade
     */
    public function isMasterTrade(): bool
    {
        return !is_null($this->master_account_id) && 
               is_null($this->trading_account_id) && 
               $this->user_id === null;
    }

    /**
     * Check if this is a copied trade
     */
    public function isCopiedTrade(): bool
    {
        return !is_null($this->master_account_id) && 
               !is_null($this->trading_account_id) && 
               !is_null($this->user_id);
    }

    /**
     * Get the original master trade for copied trades
     */
    public function getMasterTrade()
    {
        if ($this->isCopiedTrade()) {
            return Trade::where('master_account_id', $this->master_account_id)
                ->where('symbol', $this->symbol)
                ->where('type', $this->type)
                ->where('opened_at', '<=', $this->opened_at)
                ->whereNull('trading_account_id')
                ->orderBy('opened_at', 'desc')
                ->first();
        }
        
        return null;
    }

    /**
     * Calculate profit/loss percentage
     */
    public function getProfitLossPercentage(): float
    {
        if ($this->status === 'CLOSED' && $this->exit_price && $this->entry_price) {
            $pipMovement = $this->type === 'BUY' 
                ? $this->exit_price - $this->entry_price
                : $this->entry_price - $this->exit_price;
                
            $pipValue = $pipMovement * 100000; // Standard pip value
            $positionValue = $pipValue * $this->lot_size;
            
            // Calculate percentage based on account balance
            $accountBalance = $this->tradingAccount?->balance ?? 10000;
            
            return $accountBalance > 0 ? ($positionValue / $accountBalance) * 100 : 0;
        }
        
        return 0;
    }

    /**
     * Get trade duration in human readable format
     */
    public function getDuration(): string
    {
        if ($this->opened_at && $this->closed_at) {
            return $this->opened_at->diffForHumans($this->closed_at, true);
        }
        
        if ($this->opened_at) {
            return $this->opened_at->diffForHumans(now(), true);
        }
        
        return 'N/A';
    }
}
