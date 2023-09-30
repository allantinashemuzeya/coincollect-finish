<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Screen\AsSource;

class CoinType extends Model
{
    use AsSource,Filterable, HasFactory, HasUuids, Attachable;

    protected $table = 'coin_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'min_price',
        'market_cap',
        'total_supply',
        'growth_rate',
    ];

    protected array $allowedFilters = [
        'id' => Where::class,
        'name' => Like::class,
        'min_price' => Where::class,
        'growth_rate' => Where::class,
        'market_cap' => Where::class,
        'total_supply' => Where::class,
        'created_at' => Where::class,
        'updated_at' => Where::class,
    ];

    protected $casts = ['data' => 'array'];

    /**
     * Get the coins for the coin type.
     */
    public function coins(): HasMany
    {
        return $this->hasMany(Coin::class);
    }

}
