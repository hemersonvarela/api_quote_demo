<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_id',
        'is_valid'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_valid' => 'boolean',
    ];

    /**
     * Constants
     */
    const IS_VALID = true;
    const IS_NOT_VALID = false;

    /**
     * Relationships
     */
    public function quoteDetails()
    {
        return $this->hasMany(QuoteDetail::class);
    }

}
