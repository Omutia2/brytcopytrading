@props([
    'title',
    'value',
    'icon',
    'trend' => null,
    'trendValue' => null,
    'color' => 'primary'
])

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $value }}</p>
            
            @if($trend && $trendValue)
                <div class="flex items-center mt-2">
                    @if($trend === 'up')
                        <svg class="w-4 h-4 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span class="text-sm text-green-500">{{ $trendValue }}</span>
                    @else
                        <svg class="w-4 h-4 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                        </svg>
                        <span class="text-sm text-red-500">{{ $trendValue }}</span>
                    @endif
                </div>
            @endif
        </div>
        
        <div class="w-12 h-12 bg-{{ $color }}-100 dark:bg-{{ $color }}-900 rounded-lg flex items-center justify-center">
            {!! $icon !!}
        </div>
    </div>
</div>
