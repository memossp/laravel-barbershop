@extends('layouts.main')

@section('title', 'Edit Booking')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/book_now.css') }}"/>
    <style>
        .former-wrap {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .cuts {
            display: flex;
            gap: 20px;
            margin: 10px 0;
        }
        .cuts-col {
            flex: 1;
        }
        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #ef4444;
            color: #991b1b;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="former-wrap">
        <h1>Edit Booking</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text"
                   id="name"
                   name="name"
                   value="{{ old('name', $booking->name) }}"
                   class="@error('name') is-invalid @enderror"
                   required>
            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <label for="email">Email:</label>
            <input type="email"
                   id="email"
                   name="email"
                   value="{{ old('email', $booking->email) }}"
                   class="@error('email') is-invalid @enderror"
                   required>
            @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <label for="phone">Phone:</label>
            <input type="tel"
                   id="phone"
                   name="phone"
                   value="{{ old('phone', $booking->phone) }}"
                   class="@error('phone') is-invalid @enderror"
                   required>
            @error('phone')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <label for="preferred_date">Preferred Date:</label>
            <input type="date"
                   id="preferred_date"
                   name="preferred_date"
                   value="{{ old('preferred_date', $booking->preferred_date->format('Y-m-d')) }}"
                   class="@error('preferred_date') is-invalid @enderror"
                   min="{{ date('Y-m-d') }}"
                   required>
            @error('preferred_date')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <label for="preferred_time">Preferred Time:</label>
            <input type="time"
                   id="preferred_time"
                   name="preferred_time"
                   value="{{ old('preferred_time', $booking->preferred_time->format('H:i')) }}"
                   class="@error('preferred_time') is-invalid @enderror"
                   required>
            @error('preferred_time')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <label>Services:</label>
            <div class="cuts">
                <div class="cuts-col">
                    <label for="haircut">
                        <input type="checkbox"
                               id="haircut"
                               name="services[]"
                               value="haircut"
                            {{ in_array('haircut', old('services', $booking->services)) ? 'checked' : '' }}>
                        Haircut 12$
                    </label>
                </div>
                <div class="cuts-col">
                    <label for="shave">
                        <input type="checkbox"
                               id="shave"
                               name="services[]"
                               value="shave"
                            {{ in_array('shave', old('services', $booking->services)) ? 'checked' : '' }}>
                        Shave 6$
                    </label>
                </div>
                <div class="cuts-col">
                    <label for="beardtrim">
                        <input type="checkbox"
                               id="beardtrim"
                               name="services[]"
                               value="beardtrim"
                            {{ in_array('beardtrim', old('services', $booking->services)) ? 'checked' : '' }}>
                        Beard Trim 6$
                    </label>
                </div>
            </div>
            @error('services')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <label for="comments">Comments:</label>
            <textarea id="comments"
                      name="comments"
                      class="@error('comments') is-invalid @enderror">{{ old('comments', $booking->comments) }}</textarea>
            @error('comments')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror

            <input type="submit" value="Update Booking">
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add date validation
            const dateInput = document.getElementById('preferred_date');
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);

            // Add time validation for business hours (optional)
            const timeInput = document.getElementById('preferred_time');
            timeInput.addEventListener('change', function() {
                const time = this.value;
                const hour = parseInt(time.split(':')[0]);
                if (hour < 9 || hour >= 20) {
                    alert('Please select a time between 9:00 AM and 8:00 PM');
                    this.value = '';
                }
            });

            // Service selection validation
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const services = document.querySelectorAll('input[name="services[]"]:checked');
                if (services.length === 0) {
                    e.preventDefault();
                    alert('Please select at least one service');
                }
            });
        });
    </script>
@endsection
