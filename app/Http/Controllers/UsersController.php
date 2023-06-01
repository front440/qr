<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(\Auth::user()->id);
        
        return view('user.home', ["user" => $user,]);
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
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 'user',
            'user_statu' => false,
            'action' => '',
        ]);

        return $this->updateNewUser($user->id);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $user = User::find($id);
    if (!$user) {
        return response()->json([
            'error' => 'Unable to locate the user'
        ], 404);
    }

    $user->update([
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request['password']),
    ]);

    return redirect()->back(); // Redirecciona a la página actual

    // Si prefieres redireccionar a una ruta específica, puedes usar:
    // return redirect()->route('nombre_de_la_ruta');
    }


    /**
     * @param  int  $id
     * Este método añadirá a la columna de acciones el html para la edición de ellos
     */
    public function updateNewUser($id)
    {
        $userUpdate = User::find($id);
        $userUpdate->update([
            'action' => '<i class=\'fa-sharp fa-solid fa-pen-to-square\' data=' . $id . ' data-target=\'#exampleModal\' data-toggle=\'modal\' id=\'editUser\' style=\'cursor: pointer;\'></i><i style=\'cursor: pointer;\' class=\'fa-sharp fa-solid fa-trash\'  data=' . $id . '></i>',
        ]);
        return $userUpdate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'error' => 'Unable to locate the user'
            ], 404);
        }
        $user->delete();
        return $id;
    }

    public function getUsers()
    {
        $users = User::all();

        return view('user.dash.users', ["users" => $users]);
    }

    public function getCalendar()
    {
        $user = User::find(\Auth::user()->id);

        $events = [];
        $bookings = Event::all();

        foreach ($bookings as $event) {

            $events[] = [
                'id'   => $event->id,
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }
        
        return view('user.dash.index', ["user" => $user, 'events' => $events]);
    }

    public function getUsersDatatable()
    {
        $users = User::all();
        return datatables(User::all())->toJson();
        // datatables()->User::all()->toJson();

        // return datatables()->User::all()->toJson();
    }

    public function profile(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        $value = $request->session()->get('key');
        //dd($user);

        
        return view("user.profile",["user" => $user,]);
    }

    public function pass(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        $value = $request->session()->get('key');
        //dd($user);

        
        return view("user.changePass",["user" => $user,]);
    }
}
