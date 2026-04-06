@extends('layouts.app')

@section('content')
        <!-- Trade Detail Content -->
        <main class="flex-1 p-6">
            <div class="max-w-12xl mx-auto">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Trade Details</h1>
                        <p class="text-gray-600 dark:text-gray-300 mt-2">View detailed information about this trade</p>
                    </div>
                    <a href="{{ route('trades.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                        Back to Trades
                    </a>
                </div>

                <!-- Trade Details Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Symbol and Account -->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Symbol</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $trade->symbol }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Trading Account</h3>
                                @if($trade->tradingAccount)
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $trade->tradingAccount->broker_name }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $trade->tradingAccount->account_number }}</p>
                                @else
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">N/A</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">No trading account</p>
                                @endif
                            </div>
                        </div>

                        <!-- Trade Type and Lot Size -->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Trade Type</h3>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $trade->type === 'BUY' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    {{ $trade->type }}
                                </span>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Lot Size</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ number_format($trade->lot_size, 2) }}</p>
                            </div>
                        </div>

                        <!-- Status and Profit/Loss -->
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</h3>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $trade->status === 'OPEN' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200' }}">
                                    {{ $trade->status }}
                                </span>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Profit/Loss</h3>
                                <p class="text-lg font-semibold {{ $trade->profit_loss >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $trade->profit_loss ? ($trade->profit_loss >= 0 ? '+' : '') . '$' . number_format($trade->profit_loss, 2) : '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Price Information -->
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Price Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Entry Price</h4>
                                <p class="text-xl font-semibold text-gray-900 dark:text-white">${{ number_format($trade->entry_price, 5) }}</p>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Exit Price</h4>
                                <p class="text-xl font-semibold text-gray-900 dark:text-white">
                                    {{ $trade->exit_price ? '$' . number_format($trade->exit_price, 5) : 'Not closed yet' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Timeline</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Opened At</h4>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $trade->opened_at ? $trade->opened_at->format('M j, Y H:i:s') : 'N/A' }}
                                </p>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Closed At</h4>
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $trade->closed_at ? $trade->closed_at->format('M j, Y H:i:s') : 'Not closed yet' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Notes -->
                    @if ($trade->notes)
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Notes</h3>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                <p class="text-gray-700 dark:text-gray-300">{{ $trade->notes }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Actions -->
                {{-- <div class="flex space-x-4">
                    @if ($trade->status === 'OPEN')
                        <button onclick="closeTrade({{ $trade->id }})" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                            Close Trade
                        </button>
                    @endif
                    <button onclick="editTrade({{ $trade->id }})" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg font-medium transition-colors">
                        Edit Trade
                    </button>
                    <form action="{{ route('trades.destroy', $trade->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trade?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-100 hover:bg-red-200 dark:bg-red-900 dark:hover:bg-red-800 text-red-700 dark:text-red-300 px-4 py-2 rounded-lg font-medium transition-colors">
                            Delete Trade
                        </button>
                    </form>
                </div> --}}
            </div>
        </main>

<script>
function closeTrade(id) {
    const exitPrice = prompt('Enter exit price:');
    if (exitPrice) {
        fetch(`/trades/${id}/close`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ exit_price: exitPrice })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert('Error closing trade: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error closing trade');
        });
    }
}

function editTrade(id) {
    // Redirect to edit page or open edit modal
    window.location.href = `/trades/${id}/edit`;
}
</script>
@endsection
