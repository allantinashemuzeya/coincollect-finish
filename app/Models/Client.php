<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Client extends Model
{
    use AsSource, HasUuids, HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'country',
        'bank_name',
        'account_number',
        'account_name',
        'account_type',
        'Swift_code',
        'desired_reference',
        'desired_payment_methods',
    ];

    protected $casts = [
        'desired_payment_methods' => 'array',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class);
    }


}
