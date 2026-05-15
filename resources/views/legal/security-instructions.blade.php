@extends('layouts.guest')

@section('title', 'Security Instructions - BrytCopyTrading')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-8 sm:px-8">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Security Instructions</h1>
                
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Last Updated: {{ date('F j, Y') }}
                    </p>

                    <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4 mb-6">
                        <p class="text-blue-800 dark:text-blue-200 font-semibold">
                            Your account security is our top priority. Follow these instructions to protect your trading account and personal information.
                        </p>
                    </div>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">1. Password Security</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Use strong passwords with at least 12 characters</li>
                        <li>Include uppercase and lowercase letters, numbers, and special characters</li>
                        <li>Avoid using personal information or common words</li>
                        <li>Use unique passwords for different accounts</li>
                        <li>Change your password regularly (every 90 days recommended)</li>
                        <li>Never share your password with anyone</li>
                        <li>Use a password manager to securely store passwords</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">2. Two-Factor Authentication (2FA)</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Enable 2FA on your account for enhanced security</li>
                        <li>Use an authenticator app (Google Authenticator, Authy, etc.)</li>
                        <li>Keep your backup codes in a secure location</li>
                        <li>Never share your 2FA codes or backup codes</li>
                        <li>Immediately report lost or stolen 2FA devices</li>
                        <li>Regularly review connected 2FA devices</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">3. Account Security</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Never share your account credentials with anyone</li>
                        <li>BrytCopyTrading staff will never ask for your password</li>
                        <li>Log out after each session, especially on shared devices</li>
                        <li>Use secure networks (avoid public Wi-Fi for sensitive activities)</li>
                        <li>Keep your contact information up to date</li>
                        <li>Review account activity regularly</li>
                        <li>Report suspicious activity immediately</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">4. Device Security</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Keep your operating system and software updated</li>
                        <li>Use reputable antivirus and anti-malware software</li>
                        <li>Enable firewall protection on your devices</li>
                        <li>Only download apps from trusted sources</li>
                        <li>Lock your devices with strong PINs or biometrics</li>
                        <li>Encrypt sensitive data on your devices</li>
                        <li>Regularly backup your important data</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">5. Trading Account Security</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Never share your trading account credentials</li>
                        <li>Use unique passwords for each trading account</li>
                        <li>Enable additional security features offered by your broker</li>
                        <li>Regularly review your trading account statements</li>
                        <li>Set up alerts for unusual account activity</li>
                        <li>Be cautious of granting API access to third parties</li>
                        <li>Revoke access from unauthorized applications immediately</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">6. Phishing Awareness</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Be suspicious of unsolicited emails asking for personal information</li>
                        <li>Verify the sender's email address carefully</li>
                        <li>Don't click on links in suspicious emails</li>
                        <li>Always check the URL before entering credentials</li>
                        <li>Look for HTTPS and security indicators in the browser</li>
                        <li>Report phishing attempts to security@brytcopytrading.com</li>
                        <li>Never download attachments from unknown sources</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">7. Data Protection</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Never share your personal information in public forums</li>
                        <li>Be cautious about what you share on social media</li>
                        <li>Use privacy settings on social media platforms</li>
                        <li>Regularly review your privacy settings</li>
                        <li>Be aware of data collection practices of third-party services</li>
                        <li>Use encrypted communication channels when possible</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">8. Financial Security</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Use secure payment methods only</li>
                        <li>Never send funds to unverified addresses</li>
                        <li>Verify withdrawal destinations carefully</li>
                        <li>Set transaction limits for your accounts</li>
                        <li>Regularly review your transaction history</li>
                        <li>Report unauthorized transactions immediately</li>
                        <li>Use separate accounts for trading and personal use</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">9. Incident Response</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        If you suspect your account has been compromised:
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Change your password immediately</li>
                        <li>Contact BrytCopyTrading support immediately</li>
                        <li>Review recent account activity</li>
                        <li>Check for unauthorized transactions</li>
                        <li>Scan your devices for malware</li>
                        <li>Update your security questions</li>
                        <li>Consider enabling additional security measures</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">10. Security Best Practices</h2>
                    <ul class="list-disc pl-6 text-gray-600 dark:text-gray-300 mb-4">
                        <li>Stay informed about current security threats</li>
                        <li>Educate yourself about common scams</li>
                        <li>Trust your instincts - if something seems wrong, report it</li>
                        <li>Keep your recovery information updated</li>
                        <li>Regularly review and update your security settings</li>
                        <li>Participate in security awareness training</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">11. Contact Security Team</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        For security concerns or to report suspicious activity:
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        Email: security@brytcopytrading.com<br>
                        WhatsApp: +256 752 525 709<br>
                        Emergency Hotline: +256 752 525 709
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('welcome') }}" class="text-indigo-600 hover:text-indigo-500 underline">Return to Home</a>
        </div>
    </div>
@endsection
