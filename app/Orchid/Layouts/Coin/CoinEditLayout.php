<?php

namespace App\Orchid\Layouts\Coin;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class CoinEditLayout extends Rows
{

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
       $coin_types =  $this->query->get('coin_types');
       $posers     =  $this->query->get('posers');
        return [
            Input::make('coin.coin_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name'))
                ->help(__('Coin display name')),

            Select::make('coin.coin_type_id')
                ->options($coin_types)
                ->title('Select Coin Type')
                ->help('Select Coin Type'),

            Select::make('coin.user_id')
                ->options($posers)
                ->title('Select Coin Owner ')
                ->help('Select Coin Owner'),


            Input::make('coin.coin_total_supply')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Total Supply'))
                ->placeholder(__('Total Supply'))
                ->help(__('Coin total supply eg 5000')),
        ];

    }
}
