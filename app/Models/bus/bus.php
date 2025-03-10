<?php

namespace App\Models\bus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = ['bus_name', 'bus_number', 'total_seats'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
