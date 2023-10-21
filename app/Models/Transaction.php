<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Screen\AsSource;

class Transaction extends Model
{
    use AsSource, Attachable, HasFactory, HasUuids;

    protected $fillable = [
        'client_id',
        'coin_id',
        'amount',
        'status',
        'payment_method',
        'payment_reference',
        'payment_proof',
        'payment_proof_type',
    ];

    protected array $allowedFilters = [
        'client_id' => Where::class,
        'coin_id' => Where::class,
        'amount' => Where::class,
        'status' => Where::class,
        'payment_method' => Where::class,
        'payment_reference' => Like::class,
        'payment_proof' => Where::class,
        'payment_proof_type' => Where::class,
    ];

    protected array $allowedSorts = [
        'client_id',
        'coin_id',
        'amount',
        'status',
        'payment_method',
        'payment_reference',
        'payment_proof',
        'payment_proof_type',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'payment_proof' => 'array',
    ];

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function coin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Coin::class);
    }

    public function sellDate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SellDate::class);
    }


}
