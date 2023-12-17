@extends('layouts.master')

@section('title', 'emails')

@section('content')

    <div class="container mt-4">
        <h2>Dar de alta Email</h2>
        <form action="{{ route('emails.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="to">To:</label>
                <input value="{{ old('to') }}" type="text" name="to" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="form">From:</label>
                <input value="{{ old('from') }}" type="text" name="from" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="subject">Subject</label>
                <input value="{{ old('subject') }}" type="text" name="subject" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="body">Body:</label>
                <textarea value="{{ old('body') }}" type="text" name="body" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <a href="{{ route('emails.index') }}" class="btn btn-success mt-4">Atrás</a>

    </div>
@endsection
