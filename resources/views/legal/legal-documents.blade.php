@extends('layouts.guest')

@section('title', 'Legal Documents - BrytCopyTrading')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-8 sm:px-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Legal Documents</h1>
                
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Last Updated: {{ date('F j, Y') }}
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Overview</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        This page provides access to all legal documents governing your use of BrytCopyTrading services. Please review these documents carefully before using our platform.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Available Documents</h2>
                    
                    <div class="space-y-4">
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Privacy Agreement</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">How we collect, use, and protect your personal information.</p>
                            <a href="{{ route('legal.privacy-agreement') }}" class="text-indigo-600 hover:text-indigo-500 underline">View Document →</a>
                        </div>

                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Risk Disclosure Statement</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">Important information about trading risks and copy trading specific risks.</p>
                            <a href="{{ route('legal.risk-disclosure') }}" class="text-indigo-600 hover:text-indigo-500 underline">View Document →</a>
                        </div>

                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Anti-Money Laundering Policy</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">Our procedures for preventing money laundering and financial crimes.</p>
                            <a href="{{ route('legal.preventing-money-laundering') }}" class="text-indigo-600 hover:text-indigo-500 underline">View Document →</a>
                        </div>

                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Security Instructions</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">Guidelines for protecting your account and personal information.</p>
                            <a href="{{ route('legal.security-instructions') }}" class="text-indigo-600 hover:text-indigo-500 underline">View Document →</a>
                        </div>

                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Complaints Handling Policy</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-3">How we handle and resolve customer complaints and disputes.</p>
                            <a href="{{ route('legal.complaints-handling-policy') }}" class="text-indigo-600 hover:text-indigo-500 underline">View Document →</a>
                        </div>
                    </div>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Terms of Service</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        By using BrytCopyTrading services, you agree to be bound by our Terms of Service. This document outlines the terms and conditions governing your use of our platform.
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Account creation and verification requirements</li>
                        <li>Trading account management rules</li>
                        <li>Copy trading service terms</li>
                        <li>Fee structure and payment terms</li>
                        <li>Account suspension and termination policies</li>
                        <li>Limitation of liability and disclaimers</li>
                        <li>Intellectual property rights</li>
                        <li>Governing law and dispute resolution</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">User Agreement</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        The User Agreement governs the relationship between you and BrytCopyTrading. It includes provisions regarding:
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Eligibility requirements for using our services</li>
                        <li>Your responsibilities as a user</li>
                        <li>Our obligations and service commitments</li>
                        <li>Prohibited activities and conduct</li>
                        <li>Intellectual property and content usage</li>
                        <li>Privacy and data protection</li>
                        <li>Termination rights and procedures</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Important Notices</h2>
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 p-4 mb-4">
                        <p class="text-yellow-800 dark:text-yellow-200 font-semibold">
                            Please read all legal documents carefully before using our services. Your use of BrytCopyTrading constitutes acceptance of these terms and conditions.
                        </p>
                    </div>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Document Updates</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        We may update these legal documents from time to time. Significant changes will be communicated through:
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Email notifications to registered users</li>
                        <li>Platform notifications and announcements</li>
                        <li>Website updates with effective dates</li>
                        <li>Social media announcements for major changes</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Contact Information</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        For questions about our legal documents or terms of service:
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Email: legal@brytcopytrading.com<br>
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
