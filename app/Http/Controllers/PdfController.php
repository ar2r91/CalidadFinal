<?php

namespace App\Http\Controllers;

use App\dental;

class PdfController extends Controller
{
    public function pdfReporteDental($codDental)
    {
        $dental = new dental();
        $dent = $dental->consultarDentalInforme($codDental);

        view()->share(['dental' => $dent]);

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('Administrador/Dental/reporte');
        return $pdf->download('ReporteDental.pdf');
    }

    public function pdfCertificadoDental($codDental)
    {
        $dental = new dental();
        $dent = $dental->consultarDentalCertificado($codDental);

        view()->share(['dental' => $dent]);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('Administrador/Dental/certificado');
        return $pdf->download('CertificadoDental.pdf');
    }
}
