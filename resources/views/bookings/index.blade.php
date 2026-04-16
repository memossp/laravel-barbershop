@extends('layouts.main')

@section('title', 'My Bookings')

@section('additional_css')
    <style>
        .bookings-container {
            background: url('/image/tools.jpg');
            background-size: cover;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .page-title {
            text-align: center;
            color: #FFD700;
            font-size: 2.5rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .booking-card {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            padding: 25px;
            margin: 20px auto;
            max-width: 800px;
            color: #FFD700;
            border: 1px solid #FFD700;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #FFD700;
            padding-bottom: 10px;
        }

        .booking-header h2 {
            color: #FFD700;
            margin: 0;
        }

        .status-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .status-pending {
            background-color: #ffd700;
            color: black;
        }

        .status-confirmed {
            background-color: #4CAF50;
            color: white;
        }

        .status-cancelled {
            background-color: #dc3545;
            color: white;
        }

        .booking-detail {
            margin: 10px 0;
            color: white;
        }

        .booking-detail strong {
            color: #FFD700;
            margin-right: 10px;
        }

        .services-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 15px 0;
        }

        .service-tag {
            background: rgba(255, 215, 0, 0.2);
            padding: 5px 15px;
            border-radius: 15px;
            border: 1px solid #FFD700;
            color: #FFD700;
        }

        .booking-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            font-weight: bold;
            transition: opacity 0.3s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        .comments {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="bookings-container">
        <h1 class="page-title">My Bookings</h1>

        @foreach($bookings as $booking)
            <div class="booking-card">
                <div class="booking-header">
                    <h2>Booking #{{ $booking->id }}</h2>
                    <span class="status-badge status-{{ $booking->status }}">
                {{ ucfirst($booking->status) }}
            </span>
                </div>

                <div class="booking-detail">
                    <strong>Date:</strong> {{ $booking->preferred_date->format('F j, Y') }}
                </div>

                <div class="booking-detail">
                    <strong>Time:</strong> {{ $booking->preferred_time->format('g:i A') }}
                </div>

                <div class="booking-detail">
                    <strong>Services:</strong>
                    <div class="services-tags">
                        @foreach($booking->services as $service)
                            <span class="service-tag">{{ ucfirst($service) }}</span>
                        @endforeach
                    </div>
                </div>

                @if($booking->comments)
                    <div class="booking-detail">
                        <strong>Comments:</strong>
                        <div class="comments">
                            {{ $booking->comments }}
                        </div>
                    </div>
                @endif

                @if($booking->status !== 'cancelled')
                    <div class="booking-actions">
                        <form action="{{ route('bookings.edit', $booking) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-edit">Edit Booking</button>
                        </form>

                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-cancel">Cancel Booking</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach

        @if($bookings->isEmpty())
            <div class="booking-card">
                <p style="text-align: center; color: white;">You don't have any bookings yet.
                    <a href="{{ route('bookings.create') }}" style="color: #FFD700;">Book now!</a>
                </p>
            </div>
        @endif
    </div>
@endsection
