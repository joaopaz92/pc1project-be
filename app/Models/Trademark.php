<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trademark extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get the models for the selected trademark.
     */
    public function models(): HasMany
    {
        return $this->hasMany(TrademarkModel::class);
    }
}
