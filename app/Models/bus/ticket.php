<?php

namespace App\Models\bus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['bus_id', 'seat_number', 'price', 'is_booked'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
