<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.list', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {  
        //$user = User::findOrFail($id);

        // if ( $user == null ) {
        //     return response()->view('errors.404', [], 404);
        // }

        return view('users.show', compact('user'));
    }

    public function store()
    {
        $data = request()->validate(
        [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ],
        [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Ingrese un email valido',
            'email.unique' => 'Este email ya se encuentra en uso',
            'password.required' => 'El campo password es obligatorio',
            'password.min:6' => 'Ingrese como minimo 6 caracteres'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => ''
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Ingrese un email valido',
            'email.unique' => 'Este email ya se encuentra en uso',
            'password.min:6' => 'Ingrese como minimo 6 caracteres'
        ]);

        if ( $data['password'] != null ) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset( $data['password'] );
        }

        $user->update($data);

        return redirect()->route('users.show', ['user' => $user->id]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('users.index');
    }
}
