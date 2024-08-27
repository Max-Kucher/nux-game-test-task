<?php

namespace App\Models\Modules\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameResult extends Model
{
    use HasFactory;

    protected $fillable = ['random_number', 'is_win', 'win_amount'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
