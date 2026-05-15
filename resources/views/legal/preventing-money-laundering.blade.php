@extends('layouts.guest')

@section('title', 'Anti-Money Laundering Policy - BrytCopyTrading')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-8 sm:px-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Anti-Money Laundering Policy</h1>
                
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Last Updated: {{ date('F j, Y') }}
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">1. Policy Overview</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        BrytCopyTrading is committed to preventing money laundering, terrorist financing, and other financial crimes. This policy outlines our procedures and requirements to comply with applicable laws and regulations.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">2. Customer Due Diligence (CDD)</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>All users must provide valid identification documents</li>
                        <li>Proof of address is required for account verification</li>
                        <li>Enhanced due diligence for high-risk jurisdictions</li>
                        <li>Regular review of customer information and risk assessment</li>
                        <li>Screening against sanctions lists and PEP databases</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">3. Identity Verification Requirements</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Valid government-issued ID (passport, national ID, driver's license)</li>
                        <li>Proof of address (utility bill, bank statement, government correspondence)</li>
                        <li>Selfie verification for identity confirmation</li>
                        <li>Source of funds documentation for large transactions</li>
                        <li>Beneficial ownership information for corporate accounts</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">4. Transaction Monitoring</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Real-time monitoring of all transactions</li>
                        <li>Automated alerts for suspicious activity patterns</li>
                        <li>Manual review of high-value transactions</li>
                        <li>Geographic and behavioral analysis</li>
                        <li>Reporting unusual or unexplained transactions</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">5. Suspicious Activity Reporting</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Mandatory reporting of suspicious transactions to authorities</li>
                        <li>Internal escalation procedures for potential AML issues</li>
                        <li>Cooperation with law enforcement and regulatory bodies</li>
                        <li>Maintenance of records for minimum required periods</li>
                        <li>Regular staff training on AML procedures</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">6. Prohibited Activities</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Using the platform for money laundering purposes</li>
                        <li>Facilitating terrorist financing activities</li>
                        <li>Structuring transactions to avoid reporting requirements</li>
                        <li>Using funds from illegal sources</li>
                        <li>Providing false or misleading information</li>
                        <li>Evading sanctions or embargoes</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">7. High-Risk Jurisdictions</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        We maintain a list of high-risk jurisdictions and apply enhanced due diligence for customers from these regions. Transactions involving these jurisdictions are subject to additional scrutiny and may be declined.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">8. Record Keeping</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Customer identification records retained for 5 years after account closure</li>
                        <li>Transaction records maintained for 5 years</li>
                        <li>AML compliance records and reports archived</li>
                        <li>Internal investigation documents preserved</li>
                        <li>Training records for staff maintained</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">9. Staff Training</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Regular AML training for all relevant staff</li>
                        <li>Updates on regulatory changes and requirements</li>
                        <li>Testing of knowledge and procedures</li>
                        <li>Scenario-based training exercises</li>
                        <li>Documentation of training completion</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">10. Compliance Officer</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        BrytCopyTrading designates a Compliance Officer responsible for implementing and overseeing AML procedures, ensuring regulatory compliance, and serving as the primary contact for AML-related matters.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">11. Third-Party Relationships</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Due diligence on all service providers and partners</li>
                        <li>AML compliance requirements in contractual agreements</li>
                        <li>Regular monitoring of third-party activities</li>
                        <li>Right to audit third-party AML procedures</li>
                        <li>Immediate termination for AML violations</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">12. User Responsibilities</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Provide accurate and complete information</li>
                        <li>Update information promptly when changes occur</li>
                        <li>Cooperate with verification requests</li>
                        <li>Report suspicious activities to us</li>
                        <li>Comply with all AML policies and procedures</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">13. Enforcement</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Violations of this AML policy may result in account suspension, transaction rejection, reporting to authorities, and termination of services. We reserve the right to take any action necessary to prevent money laundering and comply with legal requirements.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">14. Contact Information</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        For AML-related inquiries or to report suspicious activity:
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Email: compliance@brytcopytrading.com<br>
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
