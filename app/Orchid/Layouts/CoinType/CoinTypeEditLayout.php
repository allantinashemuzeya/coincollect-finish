<?php

namespace App\Orchid\Layouts\CoinType;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CoinTypeEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('coinType.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name'))
                ->help(__('Coin type display name')),

            Input::make('coinType.growth_rate')
                ->type('float')
                ->max(255)
                ->required()
                ->title(__('Growth Rate'))
                ->placeholder(__('Growth Rate'))
                ->help(__('The rate at which coins under this type grow')),

            Input::make('coinType.min_price')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Minimum Price'))
                ->placeholder(__('Minimum Price'))
                ->help(__('Coin type display name')),


        ];
    }
}
