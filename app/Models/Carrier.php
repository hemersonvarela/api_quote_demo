<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * Constants
     */
    const IS_ACTIVE = true;
    const IS_INACTIVE = false;

    /**
     * Relationships
     */
    public function quoteDetails()
    {
        return $this->hasMany(QuoteDetail::class);
    }

}
