<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = User::all();

        return view('admin.alumnos', ["alumnos" => $alumnos]);
    }


    /**
     * Normalize a string
     *
     * @param $string
     */
    public function normalize($string)
    {
        $originales = 'ÁÉÍÓÚáéíóú';
        $modificadas = 'AEIOUaeiou';
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($originales), $modificadas);
        $string = strtolower($string);
        return utf8_encode($string);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputLog = new UserLog();

        $inputLog->name = $request->Nombre;
        $inputLog->surname1 = $request->Apellido1;
        $inputLog->surname2 = $request->Apellido2;
        $inputLog->email = $request->Email;
        $inputLog->phone = $request->Telefono;
        $inputLog->cif = $request->Dni;

        $result = $inputLog->save();

        if ($result) {
            return response()->json([
                'message' => "Data Inserted Successfully",
                "code"    => 200
            ]);
        } else {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $result = User::find($request->id);

        // dd($result);

        if ($result) {
            return response()->json([
                'message' => "Data Found",
                "code"    => 200,
                "data"    => $result
            ]);
        } else {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //  dd("EE");
        $user = User::find($request->id);
        //  dd($request);
        $user->name = $request->name;
        $user->surname1 = $request->surname1;
        $user->surname2 = $request->surname2;
        $user->phone = $request->phone;

        $user->save();

        if ($user) {
            return response()->json([
                'message' => "Data Saved",
                "code"    => 200,
                "data"    => $user
            ]);
        } else {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $input = User::find($request->id)->delete();
        if ($input) {
            return response()->json([
                'message' => "Input Deleted!",
                "code"    => 200,
                "data"    => $input
            ]);
        } else {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function entrada(Request $request)
    {

        $value = $request->session()->get('key');

        return view("admin.entrada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function salida(Request $request)
    {
        $user = \Auth::user();
        $value = $user->createToken('MyApp')->accessToken->token;
        dd($value);
        $value = $request->session()->get('key', 'default');
        dd($value);
        return view("admin.salida", compact($value));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        //SELECT ul.id, ul.date, ul.type, u.name FROM users_logs ul, users u WHERE ul.id_user = u.id and ul.type = 0 ORDER BY ul.date ASC; 
        $query = \DB::select("SELECT u.name, u.surname1, u.surname2, u.email, u.phone, u.cif FROM users u");
        // dd($query);
        $user = User::all();

        return datatables()->of($user)->toJson();
    }
}
