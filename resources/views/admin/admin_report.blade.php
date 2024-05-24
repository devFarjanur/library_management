@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Admin Report</li>
        </ol>
    </nav>



    <div class="mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('admin.report.pdf') }}" class="btn btn-primary">Download PDF</a>
    </div>




    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title mb-3">Admin Report</h6>
                <div class="table-responsive">
                    <table class="table table-hover text-center table-bordered"> <!-- Added table-bordered class -->
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Student Name</th> <!-- Added border class -->
                                <th class="px-4 py-2 border">Email</th> <!-- Added border class -->
                                <th class="px-4 py-2 border">Total Books Requested</th> <!-- Added border class -->
                                <th class="px-4 py-2 border">Total Books Pending</th> <!-- Added border class -->
                                <th class="px-4 py-2 border">Total Books Approved</th> <!-- Added border class -->

                                <th class="px-4 py-2 border">Total Books Rejected</th> <!-- Added border class -->
                                <th class="px-4 py-2 border">Total Books Returned</th> <!-- Added border class -->
                                <th class="px-4 py-2 border">Total Fine</th> <!-- Added border class -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportData as $data)
                                <tr>
                                    <td class="border px-4 py-2">{{ $data['student_name'] }}</td>
                                    <td class="border px-4 py-2">{{ $data['student_email'] }}</td>
                                    <td class="border px-4 py-2">{{ $data['total_books_borrowed'] }}</td>
                                    <td class="border px-4 py-2">{{ $data['total_books_pending'] }}</td>
                                    <td class="border px-4 py-2">{{ $data['total_books_approved'] }}</td>
                                    <td class="border px-4 py-2">{{ $data['total_books_rejected'] }}</td>
                                    <td class="border px-4 py-2">{{ $data['total_books_returned'] }}</td>
                                    <td class="border px-4 py-2">{{ $data['total_fine'] }}</td>
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