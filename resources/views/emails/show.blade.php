@extends('layouts.master')

@section('title', 'emails')

@section('content')

    <div class="containter mt-4">
        <h1>Lista de emails</h1>


        <p><b>ID</b>{{ $emails->id }}</p>
        <p><b>TO</b>{{ $emails->to }}</p>
        <p><b>FROM</b>{{ $emails->from }}</p>
        <p><b>SUBJECT</b>{{ $emails->subject }}</p>
        <p><b>BODY</b>{{ $emails->body }}</p>

        <a href="{{ route('emails.index') }}" class="btn btn-primary">Volver<a>

    </div>
@endsection
