<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }


    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = Auth::user();

    // Cek apakah password saat ini cocok
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password saat ini salah.'])->withInput();
    }

    // Update password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('status', 'Password berhasil diubah.');
}

public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Memproses data registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }
}


