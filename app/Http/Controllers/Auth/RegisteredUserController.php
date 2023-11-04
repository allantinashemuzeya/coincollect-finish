<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        $referralCode = request()->get('referral_code');
        return Inertia::render('Auth/Register', [
            'referral_code' => $referralCode ? $referralCode : '',
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->referral_code !== '') {
            $reference = Referral::where('referral_code', $request->referral_code)->first();
            if ($reference) {
                $reference->use_count = $reference->use_count   + 1;
                $reference->save();
            }

            $referralCode = $user->name[0].$user->name[1] . rand(10000, 99999);

            Referral::create([
                'referrer_id' => $user->id,
                'user_id' => $user->id,
                'referral_code' => $referralCode,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::CLIENT);
    }
}
