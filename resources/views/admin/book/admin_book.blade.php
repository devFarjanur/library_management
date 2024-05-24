@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Book</a></li>
            <li class="breadcrumb-item active" aria-current="page">Book List</li>
        </ol>
    </nav>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="mt-2 mb-4 d-grid gap-2 d-md-flex justify-content-md-start">
                    <form action="{{ route('admin.search.book') }}" method="GET" class="d-flex w-50">
                        <input type="text" class="form-control me-2" id="title" name="title" placeholder="Title">
                        <input type="text" class="form-control me-2" id="author" name="author"
                            placeholder="Author">
                        <input type="text" class="form-control me-2" id="category" name="category"
                            placeholder="Category">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="card-title mb-0">Books List</h6>
                    <a href="{{ route('admin.add.book') }}" class="btn btn-primary">Add Book</a>
                </div>

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
                            @foreach ($books as $book)
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