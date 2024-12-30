<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        $currentUser = auth()->user();
        return view('user.index',compact('users','currentUser'));
    }
    public function archived(){
        $archivedUser = User::onlyTrashed()->get();
        return view('user.archived', compact('archivedUser'));


    }
    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function register(){

        return view('user.register');
    }

    public function store(Request $request){
        $validated =  $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'

            ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
]);
        return redirect()->route('user.index')->with('success', 'User Added successfully!');
    }


    public function edit($id){
        $user =  User::findOrFail($id);
        return view('user.edit', compact('user'));

    }

    public function update(Request $request, $id){

        $validated =  $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email'. $id,
            'password' => 'nullable|min:8'

        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
        ]);
        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function archive($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Archived successfully!');

    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $user->forceDelete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
    public function restore($id )
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.index')->with('success', 'Logged in successfully!');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully!');
    }



}
