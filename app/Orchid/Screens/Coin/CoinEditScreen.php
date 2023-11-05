<?php

namespace App\Orchid\Screens\Coin;

use App\Models\Coin;
use App\Models\CoinType;
use App\Models\User;
use App\Orchid\Layouts\Coin\CoinEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Alert;


class CoinEditScreen extends Screen
{
    /**
     * @var Coin
     */
    public $coin;

    /**
     *
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Coin $coin): iterable
    {
        $coin_types = CoinType::all();
        $c_types = [];
        $client_role = Role::where('slug', 'client')
            ->first();
        $admin_role = Role::where('slug', 'platform-admins')
            ->first();

        $users = $client_role?->getUsers();
        $admin_users = $admin_role?->getUsers();

        $users = $users->merge($admin_users);

        $clients = [];
        foreach ($users as $client) {
            $clients[$client->id] = $client->name;
        }

        foreach ($coin_types as $coin_type) {
            $c_types[$coin_type->id] = $coin_type->name;
        }

        return [
            'coin'       => $coin,
            'coin_types' => $c_types,
            'clients'     => $clients,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Coin Edit Screen';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Create A Coin';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('createOrUpdate'),

            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->method('remove')
                ->canSee($this->coin->exists),
        ];
    }


    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block([
                CoinEditLayout::class
            ])
            ->title(__('Coin Information'))
            ->description(__('Coin Information')),
          //  Layout::view('admin.screens.coin-edit')
        ];
    }

    /**
     * Create or update a coin.
     * @param Request $request
     * @param Coin $coin
     * @return RedirectResponse
     */
    public function createOrUpdate(Request $request, Coin $coin): RedirectResponse
    {
        $request->validate([
            'coin.coin_name' => [
                'required',
                Rule::unique(Coin::class, 'coin_name')->ignore($coin),
            ],
            'coin.coin_type_id' => [
                'required',
               function ($attribute, $value, $fail) {
                   if(!isset($value) ){
                       $fail('Coin type is required');
                   }
               },
            ],
            'coin.coin_total_supply' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value < 1) {
                        $fail('Total supply must be greater than 0');
                    }
                },
            ],
        ]);

        $attributes = $request->all()['coin'];
        $this->coin->fill($attributes)->save();
        $coin_value = $this->coin->load('coinType')->coinType->min_price;
        $this->coin->fill(['coin_value' => $coin_value])
            ->save();

        Alert::success('You have successfully created a coin');
        Toast::success('You have successfully created a coin');

        return redirect()->route('platform.systems.coin-collection');
    }

    /**
     * @param Coin $coin
     * @return RedirectResponse
     */
    public function remove(Coin $coin): RedirectResponse
    {
        $coin->delete();

        Toast::info(__('Coin was removed'));

        return redirect()->route('platform.systems.coin-collection');
    }

}
