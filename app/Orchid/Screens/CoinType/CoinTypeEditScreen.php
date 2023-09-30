<?php

namespace App\Orchid\Screens\CoinType;

use App\Models\CoinType;
use App\Orchid\Layouts\CoinType\CoinTypeEditLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;

class CoinTypeEditScreen extends Screen
{

    /**
     * @var CoinType
     */
    public $coinType;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'coin_type' => $this->coinType,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Edit/Create A Coin Type';
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
                ->canSee((bool)$this->coinType?->exists),
        ];
    }


    public function createOrUpdate(CoinType $coinType, Request $request)
    {
      //  dd($request);
        $coinType->fill($request->get('coinType'))->save();

        Alert::info('You have successfully created an coin type.');

        return redirect()->route('platform.systems.coin.types');
    }


    /**
     * The screen's layout elements.
     *
     * @return Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CoinTypeEditLayout::class,
        ];
    }
}
