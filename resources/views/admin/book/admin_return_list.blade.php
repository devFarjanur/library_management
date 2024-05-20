@extends('admin.admin_dashboard')
@section('admin')



    <div class="page-content">


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Return Book</a></li>
            <li class="breadcrumb-item active" aria-current="page">Return Book List</li>
        </ol>
    </nav>



        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-3">Return Book</h6>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Title</th>
                                    <th>Student Name</th>
                                    <th>Returned At</th>
                                    <th>Fine</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($returnedBooks as $return)
                                    <tr>
                                        <td>{{ $return->id }}</td>
                                        <td>{{ $return->book->title }}</td>
                                        <td>{{ $return->user->name }}</td>
                                        <td>{{ $return->returned_at }}</td>
                                        <td>{{ $return->fine }}</td>
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
