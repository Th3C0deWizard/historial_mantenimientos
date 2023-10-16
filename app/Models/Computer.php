<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'ram',
        'cpu'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function observations(): HasMany
    {
        return $this->hasMany(Observation::class, 'computer_id');
    }
}
