@extends('layouts.guest')

@section('title', 'Risk Disclosure - BrytCopyTrading')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-8 sm:px-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Risk Disclosure Statement</h1>
                
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Last Updated: {{ date('F j, Y') }}
                    </p>

                    <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4 mb-6">
                        <p class="text-red-800 dark:text-red-200 font-semibold">
                            WARNING: Trading financial markets involves substantial risk and may result in the loss of your invested capital. You should carefully consider whether trading is suitable for you in light of your financial condition and investment objectives.
                        </p>
                    </div>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">1. Trading Risks</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Market Volatility: Prices can fluctuate rapidly, causing significant losses</li>
                        <li>Leverage Risk: Trading with leverage can amplify both gains and losses</li>
                        <li>Liquidity Risk: Some markets may have limited liquidity, affecting trade execution</li>
                        <li>Technical Risk: Platform failures, internet connectivity issues, or system errors</li>
                        <li>Regulatory Risk: Changes in regulations may affect trading conditions</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">2. Copy Trading Specific Risks</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Master Account Performance: Past performance does not guarantee future results</li>
                        <li>Delayed Execution: Copy trades may not execute at the same price as master trades</li>
                        <li>System Failure: Technical issues may prevent trade copying</li>
                        <li>Overlapping Positions: Multiple master accounts may create conflicting positions</li>
                        <li>Risk Percentage Settings: Incorrect risk settings can lead to excessive losses</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">3. Financial Risks</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>You may lose more than your initial investment</li>
                        <li>Losses can exceed your account balance in certain market conditions</li>
                        <li>Margin calls may result in automatic position closures</li>
                        <li>Currency fluctuations can affect your account value</li>
                        <li>Trading fees and spreads reduce your potential profits</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">4. Psychological Risks</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Emotional trading decisions can lead to poor outcomes</li>
                        <li>Overconfidence after winning trades can lead to excessive risk-taking</li>
                        <li>Fear of missing out (FOMO) can cause impulsive trading</li>
                        <li>Revenge trading after losses can compound losses</li>
                        <li>Stress and anxiety from trading losses can affect decision-making</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">5. Technology Risks</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Internet connectivity issues may prevent trade execution</li>
                        <li>Platform downtime may result in missed trading opportunities</li>
                        <li>Software bugs or glitches may cause unintended trades</li>
                        <li>Cybersecurity threats may compromise your account</li>
                        <li>Mobile device limitations may affect trading performance</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">6. Regulatory and Legal Risks</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Trading regulations vary by jurisdiction</li>
                        <li>Tax implications may apply to your trading profits</li>
                        <li>Legal restrictions may limit trading activities in certain regions</li>
                        <li>Compliance requirements may affect account operations</li>
                        <li>Dispute resolution processes may be complex and time-consuming</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">7. Risk Management Recommendations</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Only trade with funds you can afford to lose</li>
                        <li>Set appropriate risk percentages (typically 1-5% per trade)</li>
                        <li>Use stop-loss orders to limit potential losses</li>
                        <li>Diversify your trading across different master accounts</li>
                        <li>Regularly review and adjust your risk settings</li>
                        <li>Keep records of all trading activities</li>
                        <li>Stay informed about market conditions and news</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">8. No Guarantees</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        BrytCopyTrading does not guarantee any specific returns or trading outcomes. Past performance of any master account is not indicative of future results. You acknowledge that trading involves significant risk and that you are solely responsible for your trading decisions.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">9. Acknowledgment</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        By using BrytCopyTrading services, you acknowledge that you have read, understood, and accept these risks. You confirm that you are trading at your own risk and that BrytCopyTrading shall not be liable for any trading losses incurred.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">10. Contact Us</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        If you have questions about trading risks or need assistance with risk management, please contact us:
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Email: support@brytcopytrading.com<br>
                        WhatsApp: +256 752 525 709
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('welcome') }}" class="text-indigo-600 hover:text-indigo-500 underline">Return to Home</a>
        </div>
    </div>
@endsection
