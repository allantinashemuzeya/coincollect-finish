<?php /** @noinspection PhpUndefinedMethodInspection */

/** @noinspection PhpPossiblePolymorphicInvocationInspection */

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Orchid\Platform\Models\Role;

class ClientController extends Controller
{
    //
    public function create(): Response
    {
       return  Inertia::render('Client/CreateClient');
    }

    public function store(Request $request): RedirectResponse
    {
        Client::create([
            'user_id' => auth()->user()->id,
            'phone_number' => $request->phone_number,
            'address' => 'NONE',
            'country' => $request->country,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'Swift_code' => $request->Swift_code,
            'desired_payment_methods' => $request->desired_payment_methods,
        ]);

        self::setClientRole();

        return redirect()->route('dashboard');
    }

    private static function setClientRole(): void
    {
        $user = auth()->user();
        $role = Role::where('slug', 'client')->first();
        $user->addRole($role);
    }
}
