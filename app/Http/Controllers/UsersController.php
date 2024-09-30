<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\JobTitle;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Si la autenticación es exitosa, redirigir a la página de usuarios
            return redirect()->route('dishes.index')->with('success', '¡Has iniciado sesión correctamente!');
        }

        // Si la autenticación falla, redirigir de nuevo con un mensaje de error
        return redirect()->route('admin.login')->withErrors(['login_error' => 'Credenciales incorrectas.']);
    }

    public function profile()
    {
        //
        return view('admin.profile');
    }

    public function users(Request $request)
    {
        $name = $request->input('dish');
        $jobTitleId = $request->input('category');

        $query = User::select(
            'users.id',
            'users.name',
            'job_titles.title as title'
        )
        ->join('job_titles', 'users.job_titles_id', '=', 'job_titles.id');

        if (!empty($name)) {
            $query->where('users.name', 'LIKE', '%' . $name . '%');
        }

        if ($jobTitleId && $jobTitleId != 0) {
            $query->where('job_titles.id', $jobTitleId);
        }

        $users = $query->get();

        $titles = JobTitle::all();
        
        return view('admin.users', compact('users', 'titles'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $selectedJobTitleId = $request->input('job_titles_id');

        $titles = JobTitle::all();

        return view('admin.create', compact('titles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'job_titles_id' => 'required|exists:job_titles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'job_titles_id' => $request->job_titles_id,
        ]);

        return redirect()->route('admin.users')->with('success', 'Usuario creado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('jobTitle')->findOrFail($id);  

        return view('admin.seeUser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $titles = JobTitle::all();
        
        return view('admin.edit', compact('user', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'job_titles_id' => 'required|exists:job_titles,id',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->job_titles_id = $request->job_titles_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.show', $user->id)->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete(); 
        }

        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.'); 
    }
}
