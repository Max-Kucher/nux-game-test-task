<?php

namespace App\Models\Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'phone_number'];

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function gameResults(): HasMany
    {
        return $this->hasMany(GameResult::class);
    }
}
