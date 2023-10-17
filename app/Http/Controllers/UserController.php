<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $title = 'Kelola User | Web Jurnal';

    public function index()
    {
        return view('dashboard.user.index', [
            'title' => $this->title,
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => $this->title,
            'jurusans' => Jurusan::where('name', '!=', 'Umum')->get(),
            'rombels' => Rombel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'unique:users', 'max:20', 'min:3'],
            'rombel_id' => ['nullable'],
            'role' => ['required'],
            'jurusan_id' => ['nullable'],
            'password' => ['required', 'min:4']
        ]);
        // password hash
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        // succes
        return redirect('/dashboard/user')->with('success', 'Akun berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('dashboard.user.show', [
        //     'title' => $this->title,
        //     'user' => $user
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'user' => $user,
            'jurusans' => Jurusan::where('name', '!=', 'Umum')->get(),
            'rombels' => Rombel::all(),
            'title' => $this->title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'max:20', 'min:3'],
            'rombel_id' => ['nullable'],
            'role' => ['required'],
            'jurusan_id' => ['nullable']
        ]);

        $user = User::where('id', $user->id)->update($validatedData);
        return redirect('/dashboard/user/')->with('successEdit', "User berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/user')->with('successDelete', 'Akun berhasil dihapus!');
    }
}