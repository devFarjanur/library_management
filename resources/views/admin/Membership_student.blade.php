@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Student</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student Request</li>
        </ol>
    </nav>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Student</h6>
                <div class="table-responsive">
                    @if ($pendingStudentRequests->isEmpty())
                        <p>No pending requests found.</p>
                    @else
                        <table class="table table-hover text-center"> <!-- Added text-center class -->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Payment Method</th>
                                    <th>TrxID</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingStudentRequests as $request)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->email }}</td>
                                        <td>{{ $request->phone }}</td>
                                        <td>{{ $request->payment->payment_method_name ?? 'N/A' }}</td> <!-- Displaying payment method name -->
                                        <td>{{ $request->TrxID }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-center">
                                                <form method="POST" action="{{ route('admin.approve.student', $request->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary me-md-2">Approve</button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.reject.student', $request->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
