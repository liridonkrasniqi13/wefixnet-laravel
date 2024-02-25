<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function getAllUsers()
    {
        $users = User::all();

        return response()->json(['users' => $users], 200);
    }
    
    public function getAllUsersVeturat()
    {
        $users = User::where('userRole', 'Vetura')->get();

        return response()->json(['users' => $users], 200);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'string',
            'username' => 'required|string',
            'last_name' => 'required|string',
            'userRole' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,

        ]);

        $user->update([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'last_name' => $validatedData['last_name'],
            'userRole' => $validatedData['userRole'],
            'email' => $validatedData['email'],

        ]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }
}
