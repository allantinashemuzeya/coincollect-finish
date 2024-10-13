<?php

namespace App\Orchid\Layouts\Coin;

use App\Models\Coin;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use ReflectionException;

class CoinListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'coins';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     * @throws ReflectionException
     */
    protected function columns(): iterable
    {
        return [
            TD::make('coin_name', 'Coin Name')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Coin $coin) => Link::make($coin->coin_name)
                ->route('platform.systems.coin.edit', $coin->id)),


            TD::make('coin_type_id', 'Coin Type')
                ->sort()
                ->cantHide()
                ->filter()
                ->align(TD::ALIGN_CENTER)
                ->render(function ($coin) {
                    return $coin->coinType?->name;
                }),

            // owner of the coin
            TD::make('user_id', 'Owner')
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->filter(TD::FILTER_TEXT)
                ->render(function ($coin) {
                    return $coin->user->name;
                }),

            TD::make('coin_total_supply', 'Total Supply')
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->filter(TD::FILTER_TEXT)
                ->render(function ($coin) {
                    return $coin->coin_total_supply;
                }),

            TD::make('coin_price', 'Price')
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->align(TD::ALIGN_CENTER)
                ->render(function ($coin) {
                    return "R".$coin->coin_value.".00";
                }),

            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_CENTER)
                ->defaultHidden()
                ->sort(),

            TD::make('updated_at', __('Last edit'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_CENTER)
                ->sort(),

        ];
    }
}
