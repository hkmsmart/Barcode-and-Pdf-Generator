<?php

namespace App\Http\Controllers;
use Com\Tecnick\Barcode\Barcode;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

class GenerateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(){
        $fpdf = new Fpdi();
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(50, 25, 'Hello World!');
        $fpdf->Output(); exit();

    }
}
