<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;


class UserEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        $is_poser = false;
        $roles = $this->query->get('roles');
        if(isset($roles)){
            foreach ($roles as $role){
                if($role->slug == 'posers'){
                    $is_poser = true;
                }
            }
        }


        $inputs = [
            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
        ];

        if($is_poser){
            $inputs[] = Input::make('user.bank_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Bank Name'))
                ->placeholder(__('Bank Name'));

            $inputs[] = Input::make('user.account_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Account Name'))
                ->placeholder(__('Account Name'));

            $inputs[] = Input::make('user.account_number')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Account Number'))
                ->placeholder(__('Account Number'));

            $inputs[] = Input::make('user.account_type')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Account Type'))
                ->placeholder(__('Account Type eg cheque/savings'));

            $inputs[] = Input::make('user.phone_number')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Phone Number'))
                ->placeholder(__('Phone Number'));

            $inputs[] = Input::make('user.desired_reference')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Desired Reference'))
                ->value('Coin purchase from Coin Collect User');
        }

        return $inputs;
    }
}
