<?php

namespace App\Orchid\Layouts\CoinType;

use App\Models\CoinType;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Columns;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CoinTypeListLayout extends Table
{

    protected $target = 'coin_types';

    /**
     * Get the fields elements to be displayed.
     *
     * @return Colu[]
     * @throws \ReflectionException
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name', 'Name')
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->filter(Input::make())
                ->render(fn (CoinType $coinType) => Link::make($coinType->name)
                    ->route('platform.systems.coin.types.edit', $coinType->id)),

            TD::make('min_price', 'Min Price')
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->filter(Input::make())
                ->render(function (CoinType $coinType){
                    return $coinType->min_price;
                }),

            // growth_rate
            TD::make('growth_rate', 'Growth Rate')
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->filter(Input::make())
                ->render(function (CoinType $coinType){
                    return $coinType->growth_rate;
                }),

            TD::make('market_cap', 'Market Cap')
                ->sort()
                ->cantHide()
                ->align(TD::ALIGN_CENTER)
                ->filter(Input::make())
                ->render(function (CoinType $coinType){
                    return $coinType->market_cap;
                }),

            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_CENTER)
                ->sort(),


        ];
    }
}
