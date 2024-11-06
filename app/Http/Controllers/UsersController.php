<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\JobTitle;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('dashboard.principal');
        }

        return redirect()->route('admin.login')->withErrors(['login_error' => 'Credenciales incorrectas.']);
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function users(Request $request)
    {
        $users = $this->filterUsers($request);
        $titles = JobTitle::all();

        return view('admin.users', compact('users', 'titles'));
    }

    public function create()
    {
        $titles = JobTitle::all();
        return view('admin.create', compact('titles'));
    }

    public function store(Request $request)
    {
        $this->validateUser($request);

        User::create($this->userData($request));

        return redirect()->route('admin.users')->with('success', 'Usuario creado correctamente.');
    }

    public function show(string $id)
    {
        $user = User::with('jobTitle')->findOrFail($id);
        return view('admin.seeUser', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $titles = JobTitle::all();
        
        return view('admin.edit', compact('user', 'titles'));
    }

    public function update(Request $request, string $id)
    {
        $this->validateUser($request, $id);

        $user = User::findOrFail($id);
        $user->fill($this->userData($request, false));
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.show', $user->id)->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
    }

    private function validateLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    private function validateUser(Request $request, ?string $id = null)
    {
        $uniqueEmailRule = $id ? 'unique:users,email,' . $id : 'unique:users,email';

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                $uniqueEmailRule,
                function ($attribute, $value, $fail) {
                    if (!str_ends_with($value, '.com')) {
                        $fail('El correo debe terminar con .com');
                    }
                }
            ],
            'job_titles_id' => 'required|exists:job_titles,id',
            'password' => 'nullable|string|min:6',
        ]);
    }

    private function filterUsers(Request $request)
    {
        $query = User::select('users.id', 'users.name', 'job_titles.title as title')
            ->join('job_titles', 'users.job_titles_id', '=', 'job_titles.id');

        if ($name = $request->input('dish')) {
            $query->where('users.name', 'LIKE', '%' . $name . '%');
        }

        if ($jobTitleId = $request->input('category')) {
            $query->where('job_titles.id', $jobTitleId);
        }

        return $query->get();
    }

    private function userData(Request $request, bool $hashPassword = true)
    {
        $data = $request->only(['name', 'username', 'email', 'job_titles_id']);
        if ($hashPassword && $request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        return $data;
    }
}
