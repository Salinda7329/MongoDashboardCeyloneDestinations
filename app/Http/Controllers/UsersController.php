<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UsersController extends Controller
{
    // Store a new user
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role'  => 'required|in:2,3',
            'status' => 'required|in:0,1',
        ]);

        // Use email as default password
        $defaultPassword = $request->email;

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($defaultPassword),
            'role'     => (int) $request->role,
            'status'   => (int) $request->status,
        ]);

        // This triggers the email verification link
        event(new Registered($user));

        return response()->json(['message' => 'User created successfully with email as default password.']);
    }

    // Get user details
    public function getUser($id)
    {
        try {
            $user = User::findOrFail($id);

            // Inline role and status label resolution
            $roleText = match ((int) $user->role) {
                1 => 'Admin',
                2 => 'Sub Admin',
                3 => 'User',
                default => 'Unknown',
            };

            $statusText = match ((int) $user->status) {
                1 => 'Active',
                2 => 'Not Active',
                default => 'Unknown',
            };

            return response()->json([
                'name'        => $user->name,
                'email'       => $user->email,
                'role'        => $user->role,
                'role_text'   => $roleText,
                'status'      => $user->status,
                'status_text' => $statusText,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User not found.'], 404);
        }
    }

    // Update a user
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => "required|email|unique:users,email,$id,_id",
                'password' => 'nullable|string|min:6',
                'role'     => 'required|in:1,2,3',
                'status'   => 'required|in:0,1',
            ]);

            $user->name   = $request->name;
            $user->email  = $request->email;
            $user->role   = (int) $request->role;
            $user->status = (int) $request->status;

            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json(['message' => 'User updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Update failed.'], 500);
        }
    }

    // Delete a user
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json(['message' => 'User deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User deletion failed.'], 500);
        }
    }
}
