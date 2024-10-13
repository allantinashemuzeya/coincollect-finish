<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Screen\AsSource;

class Coin extends Model
{
    use AsSource,Filterable, HasFactory, HasUuids, Attachable;

    protected $table = 'coins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coin_type_id',
        'user_id',
        'coin_name',
        'coin_value',
        'coin_data',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['data' => 'array'];

    protected array $allowedFilters = [
        'id' => Where::class,
        'coin_name' => Like::class,
        'user_id' => Where::class,
        'coin_value' => Where::class,
        'created_at' => Where::class,
        'updated_at' => Where::class,
    ];

    protected array $allowedSorts = [
        'id',
        'coin_name',
        'coin_type_id',
        'coin_value',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the coin type that owns the coin.
     */
    public function coinType(): BelongsTo
    {
        return $this->belongsTo(CoinType::class);
    }

    /**
     * Get the user that owns the coin.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the transactions for the coin.
     */
    public function transactions(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    /**
     * Get the growth rates for the coin.
     */
    public function growthRate() {
       return $this->coinType()->growthRate;
    }

    //Coin
    public function calculateNewValue()
    {
        // Assuming $this->price represents the price when the coin was bought
        // 30% increase

        return $this->price * 1.30;
    }
}
