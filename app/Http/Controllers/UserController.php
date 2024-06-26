<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tittle'] = 'Data User';
        $data['user'] = User::all();

        return view('admin.user.user-index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_roles = Roles::all();
        $data['roles'] = $data_roles;
        $data['tittle'] = 'Data User';
        return view('admin.user.user-add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userData = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->roles,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'password' => Hash::make($request->password), // Pastikan password di-hash menggunakan bcrypt
        ];

        // Simpan data pengguna ke dalam tabel
        User::create($userData);

        return redirect()->route('user');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_roles = Roles::all();
        $data['roles'] = $data_roles;

        $data_user = User::where('id', $id)->get();
        $data['data_user'] = $data_user;

        $data['tittle'] = 'Data User';
        return view('admin.user.user-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'roles' => 'required|string|exists:roles,role_name',
        ]);
        // Retrieve the user by username
        $user = User::where('id', $request->id_user)->firstOrFail();

        // Update the user's data
        $user->name = $request->name;
        $user->role = $request->roles;

        // If a new password is provided, hash it and update the password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the updated user
        $user->save();

        // Redirect back with a success message
        return redirect()->route('user')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari user berdasarkan ID dan hapus
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('user')->with('success', 'User berhasil dihapus.');
    }
}
