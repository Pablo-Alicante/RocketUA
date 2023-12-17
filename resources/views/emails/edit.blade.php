@extends('layouts.master')

@section('content')
    <div>
        <h2>Editar Email</h2>
        <form action="{{ route('emails.update', ['id' => $emails->id]) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="to">To:</label>
                <input value="{{ old('to', $emails->to) }}" type="text" name="to" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="form">From:</label>
                <input value="{{ old('from', $emails->from) }}" type="text" name="from" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="subject">Subject</label>
                <input value="{{ old('subject', $emails->subject) }}" type="text" name="subject" class="form-control"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="body">Body:</label>
                <textarea value="{{ old('body', $emails->body) }}" type="text" name="body" class="form-control" required>{{ old('body', $emails->body) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>

        <a href="{{ route('emails.index') }}" class="btn btn-success mt-4">Atrás</a>
    </div>
@endsection
