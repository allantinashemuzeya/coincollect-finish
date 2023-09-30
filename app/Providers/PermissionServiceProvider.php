<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Dashboard $dashboard): void
    {

        //

        $systemPermissions = ItemPermission::group('System')
            ->addPermission('manage permissions', 'Permissions')
            ->addPermission('manage platform posers', 'Platform Posers')
            ->addPermission('manage entire system', 'Manage System');

        $coinPermissions = ItemPermission::group('Platform Coins')
            ->addPermission('create coin', 'Create new Coin')
            ->addPermission('update coin', 'Update Coin')
            ->addPermission('delete coin', 'Delete Coin')
            ->addPermission('read coin', 'Read Coin');

        $transactionPermissions = ItemPermission::group('Platform Transactions')
            ->addPermission('view transactions', 'View Transactions')
            ->addPermission('view transactions history', 'View Transactions History');

        $walletPermissions = ItemPermission::group('Platform Wallets')
            ->addPermission('view coins', 'View Coins')
            ->addPermission('view wallets', 'View Wallets')
            ->addPermission('view wallets history', 'View Wallets History')
            ->addPermission('view wallets statistics', 'View Wallets Statistics');

        $marketPermissions = ItemPermission::group('Market Permissions')
            ->addPermission('open market', 'Open Market')
            ->addPermission('close market', 'Close Market')
            ->addPermission('view market', 'View Market')
            ->addPermission('view market history', 'View Market History')
            ->addPermission('view market orders', 'View Market Orders')
            ->addPermission('view market trades', 'View Market Trades')
            ->addPermission('view market charts', 'View Market Charts')
            ->addPermission('view market depth', 'View Market Depth')
            ->addPermission('view market statistics', 'View Market Statistics')
            ->addPermission('view market settings', 'View Market Settings')
            ->addPermission('view market fees', 'View Market Fees')
            ->addPermission('view market bots', 'View Market Bots')
            ->addPermission('view market bots settings', 'View Market Bots Settings')
            ->addPermission('view market bots logs', 'View Market Bots Logs');

        $sellDatePermissions = ItemPermission::group('Sell Date Permissions')
            ->addPermission('view sell date calendar', 'View Sell Date Calendar')
            ->addPermission('view sell date calendar settings', 'View Sell Date Calendar Settings')
            ->addPermission('view sell date calendar logs', 'View Sell Date Calendar Logs')
            ->addPermission('view sell date calendar statistics', 'View Sell Date Calendar Statistics')
            ->addPermission('modify sell date calendar', 'Modify Sell Date Calendar');

        $flagsPermissions = ItemPermission::group('Platform Flags')
            ->addPermission('view flags', 'View Flags')
            ->addPermission('modify flags', 'Modify Flags');

        $permissions = [
            $systemPermissions,
            $coinPermissions,
            $transactionPermissions,
            $walletPermissions,
            $marketPermissions,
            $sellDatePermissions,
            $flagsPermissions,
        ];

        foreach ($permissions as $permission) {
            $dashboard->registerPermissions($permission);
        }
    }
}
