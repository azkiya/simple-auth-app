<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:user-list|user-create|user-edit|user-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:user-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:user-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:user-delete'], ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $jobTitles = ['Direktur', 'Finance', 'Staff'];
        return view('user.create', compact('jobTitles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:users',
            'nama' => 'required',
            'jabatan' => 'required',
            'password' => 'required',
        ]);

         $request['password'] = Hash::make('password');
        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $jobTitles=['Direktur', 'Finance', 'Staff'];
        return view('user.edit', compact('user', 'jobTitles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
