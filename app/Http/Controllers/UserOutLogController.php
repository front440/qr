<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserLog;

class UserOutLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();


        // return view('admin.log.inputlog', ["registrosEntrada" => $registrosEntrada, "usuarios" => $usuarios]);
        return view('admin.log.outlog', [ "usuarios" => $usuarios]);
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

        $inputLog->date = $request->fecha;
        $inputLog->type = $request->tipo;
        $inputLog->id_user = $request->usuario;

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
        $result = UserLog::find($request->id);

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
        // dd("EE");
        $input = UserLog::find($request->id);
        // dd($request);
        $input->date = $request->fecha;
        $input->type = $request->tipo;
        $input->id_user = $request->usuario;
        $input->save();
        if ($input) {
            return response()->json([
                'message' => "Data Saved",
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $input = UserLog::find($request->id)->delete();
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
       //SELECT ul.id, ul.date, ul.type, u.name FROM users_logs ul, users u WHERE ul.id_user = u.id and ul.type = 0 ORDER BY ul.date ASC; 
       $query = \DB::select("SELECT ul.id, ul.date, ul.type, u.name FROM users_logs ul, users u WHERE ul.id_user = u.id AND ul.type = 0 ORDER BY ul.date DESC");
       // dd($query);

       return datatables()->of($query)->toJson();
    }
}