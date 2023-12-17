@extends('layouts.master')

@section('title', 'emails')

@section('content')

    <body>

        <div style="container w-25 border p-4">

            <h1>Listado de emails</h1>

            <table class="table table-striped table-success">

                <thead class="table-striped">
                    <th scope="col">id</th>
                    <th scope="col">to</th>
                    <th scope="col">from</th>
                    <th scope="col">subject</th>
                    <th scope="col">body</th>
                </thead>

                <tbody>

                    @foreach ($emails as $item)
                        <tr>
                            <td> {{ $item->id }}</td>
                            <td> {{ $item->to }}</td>
                            <td> {{ $item->from }}</td>
                            <td> {{ $item->subject }}</td>
                            <td> {{ $item->body }}</td>

                            <td>
                                <a href="{{ route('emails.show', $item->id) }}" type="button" class="btn btn-info">Info</a>
                            </td>
                            <td>
                                <a href="{{ route('emails.edit', $item->id) }}" type="button"
                                    class="btn btn-info">Modificar</a>
                            </td>
                            <td>
                                <form action="{{ route('emails.destroy', [$item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>
            <a href="{{ route('emails.create') }}" type="button" class="btn btn-success btn-sm">Añadir email</a>
        </div>
    </body>
@endsection


{{-- <form action="{{ route('emails') }}" method="POST">
                        @csrf

                        @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                        @endif

                        @error('tittle')
                            <h6 class="alert alert-success">{{ message }}</h6>
                        @enderror


                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="email" class="form-control" placeholder="Escribe tu email">
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form> --}}
