<?php

declare(strict_types=1);

use App\Orchid\Screens\Coin\CoinCollectionScreen;
use App\Orchid\Screens\Coin\CoinEditScreen;
use App\Orchid\Screens\CoinGrowthRate\CoinGrowthRateScreen;
use App\Orchid\Screens\CoinType\CoinTypeEditScreen;
use App\Orchid\Screens\CoinType\CoinTypeListScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Referral\ReferralScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\SellDate\SellDateCalendarScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');

// Platform > System > CoinCollection
Route::screen('coins/collection', CoinCollectionScreen::class)
    ->name('platform.systems.coin-collection')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('CoinCollection'), route('platform.systems.coin-collection')));

// Platform > System > CoinCollection > Create
Route::screen('coins/create', CoinEditScreen::class)
    ->name('platform.systems.coin.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.coin-collection')
        ->push(__('Create'), route('platform.systems.coin.create')));

// Platform > System > CoinTypes > Listing
Route::screen('coins/types', CoinTypeListScreen::class)
    ->name('platform.systems.coin.types')
    ->breadcrumbs(/**
     * @throws Throwable
     */ fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('CoinTypes'), route('platform.systems.coin.types')));

// Platform > System > CoinTypes > Create
Route::screen('coins/types/create', CoinTypeEditScreen::class)
    ->name('platform.systems.coin.types.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.coin.types')
        ->push(__('Create'), route('platform.systems.coin.types.create')));

Route::screen('coins/types/{coinType}/edit', CoinTypeEditScreen::class)
    ->name('platform.systems.coin.types.edit')
    ->breadcrumbs(fn (Trail $trail, $coinType) => $trail
        ->parent('platform.systems.coin.types')
        ->push($coinType->name, route('platform.systems.coin.types.edit', $coinType)));

// route for calendar
Route::screen('coins/calendar', SellDateCalendarScreen::class)
    ->name('platform.systems.calendar')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Sell Dates'), route('platform.systems.coin.sell-dates')));

// Platform > System > CoinCollection > Edit
Route::screen('coins/{coin}/edit', CoinEditScreen::class)
    ->name('platform.systems.coin.edit')
    ->breadcrumbs(fn (Trail $trail, $coin) => $trail
        ->parent('platform.systems.coin-collection')
        ->push($coin->coin_name, route('platform.systems.coin.edit', $coin)));

//Route for referral
Route::screen('referral', ReferralScreen::class)
    ->name('platform.systems.referrals')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Referral'), route('platform.systems.referrals')));

//Route for coin rate management
Route::screen('coin/manage-rate', CoinGrowthRateScreen::class)
    ->name('platform.systems.coin.growth')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Coin Rate'), route('platform.systems.coin.growth')));
