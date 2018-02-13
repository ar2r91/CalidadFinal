<?php

namespace App\Http\Controllers;

use App\intraoral;

class PdfController extends Controller
{
    public function pdfReporteIntraoral($codIntraoral)
    {
        $intraoral = new intraoral();
        $intra = $intraoral->consultarIntraoralInforme($codIntraoral);

        view()->share(['intraoral' => $intra]);

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('Administrador/Dental/Intraoral/reporte');
        return $pdf->download('ReporteIntraoral.pdf');
    }

    public function pdfCertificadoIntraoral($codIntraoral)
    {
        $intraoral = new intraoral();
        $intra = $intraoral->consultarIntraoralCertificado($codIntraoral);

        view()->share(['intraoral' => $intra]);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('Administrador/Dental/Intraoral/certificado');
        return $pdf->download('CertificadoIntraoral.pdf');
    }
}
