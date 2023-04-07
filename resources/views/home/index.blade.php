@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <body>
        <div class="container">
            <h1>Hi! {{Auth::user()->name }}</h1>
            <a href="{{ url('home/create') }}" class="btn btn-primary">Create</a>
            <table class="table border rounded my-3">
                @php($number = 1)
                @foreach ($dataSiswa as $d)
                    <tbody>
                        <tr>
                            <th scope="row">
                                {{ $number }}
                            </th>
                            <td>{{ $d->name }}</td>
                            <td>
                                {{ $d->grade }}
                            </td>
                            <td class="text-end">
                                <a href="{{ url("home/{$d->slug}/edit") }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td class="text-end">
                                <form method="POST" action="{{ url("home/{$d->slug}/delete") }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @php($number++)
                @endforeach
            </table>
        </div>
    </body>
@endsection