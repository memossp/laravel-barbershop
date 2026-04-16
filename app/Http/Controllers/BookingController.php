<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('preferred_date', 'desc')->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name'           => 'required|string|max:255',
                'email'          => 'required|email',
                'phone'          => 'required|string',
                'preferred_date' => 'required|date|after:today',
                'preferred_time' => 'required',
                'services'       => 'required|array|min:1',
                'comments'       => 'nullable|string',
            ]
        );

        $booking = Booking::create(array_merge($validated, ['user_id' => Auth::user()->getAuthIdentifier()]));

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully!');
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate(
            [
                'name'           => 'required|string|max:255',
                'email'          => 'required|email',
                'phone'          => 'required|string',
                'preferred_date' => 'required|date',
                'preferred_time' => 'required',
                'services'       => 'required|array|min:1',
                'comments'       => 'nullable|string',
            ]
        );

        $booking->update($validated);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking cancelled successfully!');
    }

}
