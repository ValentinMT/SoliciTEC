<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PrintController extends Controller
{
   public function genPDFAdmin($id)
	{
        //return $solicitudes;
    	$pdf2 = \PDF::loadView('administrador.pdf2',compact('id'));
        // return $pdf->download('Solicitud.pdf');
        return $pdf2->stream('Solicitud.pdf');
   }

   public function genPDFRecibidas($id)
	{
        //return $solicitudes;
    	$pdf2 = \PDF::loadView('administrador.pdf2',compact('id'));
        // return $pdf->download('Solicitud.pdf');
        return $pdf2->stream('Solicitud.pdf');
   }

   public function genPDFRealizadas($id)
	{
        //return $solicitudes;
    	$pdf2 = \PDF::loadView('administrador.pdf2',compact('id'));
        // return $pdf->download('Solicitud.pdf');
        return $pdf2->stream('Solicitud.pdf');
   }
}
