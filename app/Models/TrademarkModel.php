<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrademarkModel extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Get the post that owns the comment.
     */
    public function trademarks(): BelongsTo
    {
        return $this->belongsTo(Trademark::class);
    }
}
