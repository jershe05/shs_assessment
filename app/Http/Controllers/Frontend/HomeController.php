<?php

namespace App\Http\Controllers\Frontend;

use PDF;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // $pdf = PDF::loadView('frontend.index');
        // return $pdf->download('pdfview.pdf');
        return view('frontend.index');
    }
}
