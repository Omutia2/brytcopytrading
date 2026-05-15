@extends('layouts.guest')

@section('title', 'Privacy Agreement - BrytCopyTrading')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-8 sm:px-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Privacy Agreement</h1>
                
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Last Updated: {{ date('F j, Y') }}
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">1. Introduction</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        BrytCopyTrading ("we", "our", or "us") is committed to protecting your privacy. This Privacy Agreement explains how we collect, use, and safeguard your personal information when you use our copy trading platform.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">2. Information We Collect</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Personal Information: Name, email address, phone number, country of residence</li>
                        <li>Account Information: Trading account details, balance, equity, risk settings</li>
                        <li>Financial Information: Payment details, transaction history</li>
                        <li>Technical Information: IP address, device information, browsing behavior</li>
                        <li>Communication Records: Messages, support tickets, feedback</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">3. How We Use Your Information</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>To provide and maintain our copy trading services</li>
                        <li>To process transactions and manage your trading accounts</li>
                        <li>To communicate with you about your account and services</li>
                        <li>To improve our platform and develop new features</li>
                        <li>To comply with legal and regulatory requirements</li>
                        <li>To prevent fraud and protect account security</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">4. Data Sharing</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        We do not sell your personal information. We may share your information with:
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Service providers who assist in operating our platform</li>
                        <li>Regulatory authorities when required by law</li>
                        <li>Master account providers for copy trading execution</li>
                        <li>Financial institutions for payment processing</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">5. Data Security</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        We implement industry-standard security measures to protect your information, including encryption, secure servers, and regular security audits. However, no method of transmission over the internet is 100% secure.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">6. Your Rights</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Access to your personal information</li>
                        <li>Correction of inaccurate information</li>
                        <li>Deletion of your account and data</li>
                        <li>Opt-out of marketing communications</li>
                        <li>Data portability requests</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">7. Cookies and Tracking</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        We use cookies and similar technologies to improve your experience, analyze usage patterns, and personalize content. You can manage cookie preferences through your browser settings.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">8. Third-Party Services</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Our platform may integrate with third-party services such as payment processors, analytics providers, and trading platforms. These services have their own privacy policies.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">9. Changes to This Policy</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        We may update this Privacy Agreement from time to time. We will notify you of significant changes by email or through our platform.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">10. Contact Us</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        If you have questions about this Privacy Agreement or our data practices, please contact us at:
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Email: privacy@brytcopytrading.com<br>
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
