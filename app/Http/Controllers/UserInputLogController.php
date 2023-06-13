<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserLog;

class UserInputLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('admin.log.inputlog', [ "usuarios" => $usuarios]);
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

    public function show($id)
    {
        //
    }

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $query = \DB::select("SELECT ul.id, ul.date, ul.type, u.name FROM users_logs ul, users u WHERE ul.id_user = u.id and ul.type = 1 ORDER BY ul.date ASC");
        // dd($query);

        return datatables()->of($query)->toJson();
    }
}