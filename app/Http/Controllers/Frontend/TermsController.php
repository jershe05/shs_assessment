<?php

namespace App\Http\Controllers\Frontend;

use PDF;

/**
 * Class TermsController.
 */
class TermsController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('frontend.pages.terms');
        return $pdf->download('pdfview.pdf');
        return view('frontend.pages.terms');
    }
}
