<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bus\Bus;
use Inertia\Inertia;

class BusController extends Controller
{
    public function index()
    {
        return Inertia::render('Buses/index', [
            'buses' => Bus::with('tickets')->get()
        ]);
    }
}
