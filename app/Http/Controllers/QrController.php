<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function entrada()
    {
        $tipo=0;
        $fecha=date ("d-m-Yh:i:s");
        $idAlumno=\Auth::user()->id;
        
        $datos= "id={$idAlumno}|date={$fecha}|type={$tipo}";
        //dd($datos);

        //$codigoQR = QrCode::size(250)->generate($datos);    

        return view('qr', compact('datos'));
    }
    //<localhost>/id/fecha/tipo
    public function salida()
    {
        $tipo = 1;
        $fecha = date ("d-m-Yh:i:s");
        $idAlumno=\Auth::user()->id;
        
        $datos= "id={$idAlumno}|date={$fecha}|type={$tipo}";
        //dd($datos);

        //$codigoQR = QrCode::size(250)->generate($datos);

        return view('qr', compact('datos'));
    }
}
