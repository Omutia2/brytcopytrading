// Dashboard JavaScript functionality
import Chart from 'chart.js';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize performance chart
    const ctx = document.getElementById('performanceChart');
    if (ctx) {
        const performanceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Portfolio Value',
                    data: [20000, 22000, 19500, 24000, 28000],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    }

    // Initialize dark mode for charts
    const updateChartsTheme = () => {
        const isDark = document.documentElement.classList.contains('dark');
        
        // Update chart colors based on theme
        if (performanceChart) {
            performanceChart.data.datasets[0].borderColor = isDark ? 'rgb(251, 191, 36)' : 'rgb(59, 130, 246)';
            performanceChart.data.datasets[0].backgroundColor = isDark ? 'rgba(251, 191, 36, 0.1)' : 'rgba(59, 130, 246, 0.1)';
            performanceChart.options.scales.y.ticks.color = isDark ? '#9CA3AF' : '#6B7280';
            performanceChart.options.scales.y.grid.color = isDark ? '#374151' : '#E5E7EB';
            performanceChart.options.scales.x.ticks.color = isDark ? '#9CA3AF' : '#6B7280';
            performanceChart.options.scales.x.grid.color = isDark ? '#374151' : '#E5E7EB';
            performanceChart.update();
        }
    };

    // Listen for dark mode changes
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                updateChartsTheme();
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });

    // Initial theme setup
    updateChartsTheme();
});
