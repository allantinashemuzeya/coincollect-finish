<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Screen\AsSource;

class SellDate extends Model
{
    use AsSource,  HasFactory, HasUuids;

    protected $table = 'sell_dates';

    protected $fillable = [
        'sell_date',
    ];

    protected $casts = [
        'sell_date' => 'datetime',
    ];

    protected array $allowedFilters = [
        'id',
        'sell_date',
        'created_at',
        'updated_at',
    ];

    protected array $allowedSorts = [
        'id',
        'sell_date',
        'created_at',
        'updated_at',
    ];

    // a sell date has many transactions that happen on that date
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }


}
