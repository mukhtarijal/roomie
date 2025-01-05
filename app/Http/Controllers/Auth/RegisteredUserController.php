<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input pendaftaran
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'role' => ['required', 'in:Owner_kos,User'], // Validasi role
        ]);

        // Membuat pengguna baru dengan data tambahan
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'role' => $request->role, // Menyimpan role
        ]);

        // Memicu event setelah registrasi berhasil
        event(new Registered($user));

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Pengalihan setelah registrasi sukses
        return redirect(route('login'))->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}
