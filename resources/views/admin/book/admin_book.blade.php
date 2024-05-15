@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Book</a></li>
            <li class="breadcrumb-item active" aria-current="page">Book List</li>
        </ol>
    </nav>



    <div class=" mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('admin.add.book') }}" class="btn btn-primary">Add Book</a>
    </div>


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Book List</h6>
                <div class="table-responsive">
                        <table class="table table-hover text-center"> <!-- Added text-center class -->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Edition</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->edition }}</td> <!-- Assuming this is how you access the course name -->
                                        <td>{{ $book->quantity }}</td> <!-- Assuming this is how you access the role -->
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

