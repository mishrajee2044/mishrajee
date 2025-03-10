<?php

namespace App\Http\Controllers\bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bus\Ticket;
use App\Models\bus\Booking;
use Inertia\Inertia;
class BookingController extends Controller
{
    public function store(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        if ($ticket->is_booked) {
            return back()->withErrors(['error' => 'This seat is already booked']);
        }

        $ticket->update(['is_booked' => true]);

        Booking::create([
            'user_id' => auth()->id(),
            'ticket_id' => $ticket->id,
            'status' => 'confirmed'
        ]);

        return redirect()->route('bookings.index');
    }

    public function index()
    {
        return Inertia::render('Bookings/Index', [
            'bookings' => auth()->user()->bookings()->with('ticket.bus')->get()
        ]);
    }
}
