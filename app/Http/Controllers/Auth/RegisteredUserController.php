<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        return view('auth.register_page');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'      => ['required', 'string', 'max:255', 'unique:' . User::class],
            'username'  => ['required', 'string', 'max:255', 'unique:' . User::class],
            'role'      => ['required', 'in:1,2'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);



        try {
            DB::beginTransaction();

            $user = User::create([
                'nama'      => $request->nama,
                'username'  => $request->username,
                'role'      => $request->role,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);

            if ($request->role == 2) {
                Mahasiswa::create([
                    'id_user' => $user->id,
                ]);
            } elseif ($request->role == 1) {
                Dosen::create([
                    'id_user' => $user->id,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();

            throw $th;
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
