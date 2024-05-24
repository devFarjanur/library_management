@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Search Result</a></li>
        </ol>
    </nav>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">


                <h6 class="card-title mb-3">Search Result</h6>

                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Edition</th>
                                <th>Quantity</th>
                                <th>Action</th> <!-- Added this header for action buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($searchResults as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->edition }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit.book', $book->id) }}"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('admin.delete.book', $book->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection