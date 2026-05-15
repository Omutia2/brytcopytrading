@extends('layouts.guest')

@section('title', 'Complaints Handling Policy - BrytCopyTrading')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-8 sm:px-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Complaints Handling Policy</h1>
                
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Last Updated: {{ date('F j, Y') }}
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">1. Policy Overview</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        BrytCopyTrading is committed to providing excellent customer service and resolving complaints fairly and efficiently. This policy outlines our procedures for handling customer complaints and disputes.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">2. What Constitutes a Complaint</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Service quality or performance issues</li>
                        <li>Disputes over transactions or fees</li>
                        <li>Technical problems with the platform</li>
                        <li>Account access or security concerns</li>
                        <li>Communication or support issues</li>
                        <li>Billing or payment disputes</li>
                        <li>Copy trading execution problems</li>
                        <li>Policy or procedure disagreements</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">3. How to File a Complaint</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li><strong>Email:</strong> Send detailed information to complaints@brytcopytrading.com</li>
                        <li><strong>WhatsApp:</strong> Message us at +256 752 525 709</li>
                        <li><strong>Support Ticket:</strong> Submit through your account dashboard</li>
                        <li><strong>Phone:</strong> Call our support line during business hours</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">4. Required Information</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        When filing a complaint, please provide:
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Your full name and account details</li>
                        <li>Contact information (email, phone)</li>
                        <li>Detailed description of the issue</li>
                        <li>Relevant dates and times</li>
                        <li>Supporting documentation (screenshots, statements, etc.)</li>
                        <li>Previous communication regarding the issue</li>
                        <li>Desired resolution or outcome</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">5. Response Times</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li><strong>Initial Acknowledgment:</strong> Within 24 hours of receipt</li>
                        <li><strong>Investigation Period:</strong> 5-10 business days depending on complexity</li>
                        <li><strong>Resolution:</strong> Within 15 business days for most complaints</li>
                        <li><strong>Complex Cases:</strong> Up to 30 business days with regular updates</li>
                        <li><strong>Emergency Issues:</strong> Immediate response for security or urgent matters</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">6. Complaint Resolution Process</h2>
                    <ol class="list-decimal pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li><strong>Receipt:</strong> Complaint received and logged in our system</li>
                        <li><strong>Acknowledgment:</strong> Confirmation sent to complainant with reference number</li>
                        <li><strong>Assessment:</strong> Complaint reviewed and categorized by priority</li>
                        <li><strong>Investigation:</strong> Thorough investigation of the issue</li>
                        <li><strong>Resolution:</strong> Proposed solution or response developed</li>
                        <li><strong>Communication:</strong> Resolution communicated to complainant</li>
                        <li><strong>Follow-up:</strong> Confirmation of satisfaction and case closure</li>
                    </ol>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">7. Escalation Process</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        If you are not satisfied with the initial resolution:
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li><strong>Level 1:</strong> Request review by Customer Support Manager</li>
                        <li><strong>Level 2:</strong> Escalation to Operations Manager</li>
                        <li><strong>Level 3:</strong> Review by Compliance Officer</li>
                        <li><strong>Level 4:</strong> Executive Management review</li>
                        <li><strong>Level 5:</strong> External dispute resolution</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">8. Types of Resolutions</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Full or partial refund of fees or charges</li>
                        <li>Correction of technical errors</li>
                        <li>Service credits or compensation</li>
                        <li>Process improvements or system fixes</li>
                        <li>Formal apology and explanation</li>
                        <li>Account adjustments or corrections</li>
                        <li>Policy changes or clarifications</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">9. Record Keeping</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>All complaints are documented and tracked</li>
                        <li>Records maintained for minimum 5 years</li>
                        <li>Regular analysis of complaint patterns</li>
                        <li>Service improvements based on feedback</li>
                        <li>Reporting to management on complaint trends</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">10. Fair and Impartial Treatment</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        We ensure that all complaints are handled fairly, impartially, and without bias. Our staff are trained to handle sensitive situations professionally and confidentially.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">11. Confidentiality</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        All complaint information is treated as confidential and is only shared with authorized personnel involved in the resolution process. We comply with data protection regulations in handling your personal information.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">12. External Dispute Resolution</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        If internal resolution is not possible, we can provide information about external dispute resolution services available in your jurisdiction. We cooperate fully with external mediators or regulatory bodies when required.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">13. Regulatory Reporting</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Serious complaints or systemic issues may be reported to relevant regulatory authorities as required by law. We maintain transparency with regulatory bodies regarding our complaint handling procedures.
                    </p>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">14. Contact Information</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        For complaints or questions about this policy:
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Email: complaints@brytcopytrading.com<br>
                        WhatsApp: +256 752 525 709<br>
                        Phone: +256 752 525 709
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('welcome') }}" class="text-indigo-600 hover:text-indigo-500 underline">Return to Home</a>
        </div>
    </div>
@endsection
