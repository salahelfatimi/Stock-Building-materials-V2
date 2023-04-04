<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF ;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf()
{
    // $data = ['reports' => $reports]; // Pass data to view

    $pdf = PDF::loadView('pdf.generatePdf'); // Generate PDF from view

    return $pdf->download('report.pdf'); // Download PDF file
}
}
