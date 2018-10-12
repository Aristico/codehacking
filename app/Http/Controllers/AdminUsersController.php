<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all(); // ruft die Daten des Requests als Array ab!

        if ($file = $request->file('photo_id')) { // Schaut ob eine Datei dabei ist

            $name = time() . $file->getClientOriginalName(); // Ruft den Dateinamen ab

            $file->move('images', $name); // Speichert die Datei im Ordner "Images" mit dem Namen $name

            $photo = Photo::create(['file'=>$name]);    // Speichert den Dateinamne in der Tabelle Fotos und speichert die Infos
                                                        // in der Variable photo

            $input['photo_id'] = $photo->id;            // schreibt die ID ist aus der photos Datenbank in dem Array aus dem Formular
                                                        // Vorher stand dort der Dateiname drin.

        }

        $input['password'] = bcrypt($request->password); // Verschlüsselt das Passwort mit bcrypt.

        User::create($input); // legt den User an

        return redirect('/users'); // leitet weiter an die Users Seite

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
        return view('admin.users.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
