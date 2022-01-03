@extends('admin.layouts')

@section('content')

    <br><br>

    <table class="table mx-auto mt-5 text-center w-50">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>

        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td class="d-flex pl-5">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary">Update</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger ml-2">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    <br><br>
    <div class="container text-center">
        <a href="{{ route('authors.create') }}" role="button" class="btn btn-success">Create</a>
    </div>


@endsection
