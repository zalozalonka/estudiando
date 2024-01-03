<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpleadosController extends Controller
{
    public function mensaje()
    {
        return view('salir');
    }

    public function generarPDF(Request $request)
    {
        // Lógica para generar el contenido del PDF
        $data = ['mensaje' => 'Hola, este es un ejemplo de contenido para el PDF.'];

        // Generar el PDF
        $pdf = PDF::loadView('pdf', $data);

        // Establecer el nombre del archivo de descarga
        $downloadFilename = 'tu_archivo.pdf';

        // Descargar el PDF
        return $pdf->download($downloadFilename);
    }

    public function saludo($nombre, $diasTrabajados)
    {
        // return view('Empleado', compact('nombre', 'diasTrabajados'));
        // return view('Empleado', ['nombre' => $nombre], ['diasTrabajados' => $diasTrabajados]);
        return view('Empleado')->with('nombre', $nombre)->with('diasTrabajados', $diasTrabajados);
    }

    public function salir()
    {
        return "Saliste weon";
    }
}
