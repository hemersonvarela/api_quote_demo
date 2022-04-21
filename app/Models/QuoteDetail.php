<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_id',
        'carrier_id',
        'tariff_id',
        'quote_detail_id',
        'quote_number',
        'base_charge',
        'net_charge',
        'transit_time',
        'origin_phone',
        'dest_phone',
        'message'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'netCharge' => 'decimal',
    ];

    /**
     * Relationships
     */
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

}
