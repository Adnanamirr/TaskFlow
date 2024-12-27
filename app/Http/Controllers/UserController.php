<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('user.index',compact('users'));
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

    public function create(){

        return view('user.create');
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
        return redirect()->route('user.index')->with('success', 'User Restored successfully!');
    }



}
