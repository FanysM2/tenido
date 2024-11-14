<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class ReportesController extends Controller
{
   
    public function index()
    {
        $data = ['title' => 'domPDF in Laravel 10'];
        $reportes = PDF::loadView('reportes.document', $data);
        return $reportes->download('document.reportes');
    }
}
