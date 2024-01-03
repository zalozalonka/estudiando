<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function Laravel\Prompts\alert;

class imagen extends Controller
{
    public function mostrarImagen(Request $request)
    {
        try {
            $varValue = $request->input('var');

            // Lógica para generar o recuperar el PDF utilizando $varValue
            $pdf = PDF::loadView('pdf', ['var' => $varValue]);


            return $pdf->download('pdf.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
