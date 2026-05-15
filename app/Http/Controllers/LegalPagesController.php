<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LegalPagesController extends Controller
{
    public function privacyAgreement(): View
    {
        return view('legal.privacy-agreement');
    }

    public function riskDisclosure(): View
    {
        return view('legal.risk-disclosure');
    }

    public function preventingMoneyLaundering(): View
    {
        return view('legal.preventing-money-laundering');
    }

    public function securityInstructions(): View
    {
        return view('legal.security-instructions');
    }

    public function legalDocuments(): View
    {
        return view('legal.legal-documents');
    }

    public function complaintsHandlingPolicy(): View
    {
        return view('legal.complaints-handling-policy');
    }
}
