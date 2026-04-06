<!-- Charts and Tables -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
    <!-- Performance Chart -->
    <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6">
        <h2 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-3 sm:mb-4">Performance Over Time</h2>
        <div class="h-48 sm:h-64 flex items-center justify-center bg-gray-50 dark:bg-gray-700 rounded-lg">
            <canvas id="performanceChart"></canvas>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6">
        <h2 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-3 sm:mb-4">Recent Activity</h2>
        <div class="space-y-3 sm:space-y-4">
            <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white truncate">EUR/USD Buy</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">2 hours ago • +$125.50</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-red-500 rounded-full mt-2"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white truncate">GBP/USD Sell</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">4 hours ago • -$45.20</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white truncate">USD/JPY Buy</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">6 hours ago • +$89.30</p>
                </div>
            </div>
            <div class="flex items-start space-x-3">
                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white truncate">Subscription Renewed</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">1 day ago • PRO Plan</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('performanceChart');
    if (ctx) {
        // Sample trade performance data
        const performanceData = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Daily P&L ($)',
                data: [125.50, -45.20, 89.30, 156.80, -23.40, 201.15, 178.90],
                borderColor: 'rgb(251, 146, 60)',
                backgroundColor: 'rgba(251, 146, 60, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: 'rgb(251, 146, 60)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        };

        const config = {
            type: 'line',
            data: performanceData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: 'rgb(251, 146, 60)',
                        borderWidth: 1,
                        padding: 10,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                let value = context.parsed.y;
                                return value >= 0 ? `+$${value.toFixed(2)}` : `-$${Math.abs(value).toFixed(2)}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6b7280',
                            font: {
                                size: 11
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(107, 114, 128, 0.1)'
                        },
                        ticks: {
                            color: '#6b7280',
                            font: {
                                size: 11
                            },
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        };

        new Chart(ctx, config);
    }
});
</script>
@endpush

