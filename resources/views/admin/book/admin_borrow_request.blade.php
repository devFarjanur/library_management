@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Borrow Requests</h6>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Book Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowRequests as $borrowRequest)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $borrowRequest->book->title }}</td>
                                        <td>{{ $borrowRequest->status }}</td>
                                        <td>
                                            @if ($borrowRequest->status === 'pending')
                                                <form action="{{ route('admin.approve.borrow.request', ['borrowRequest' => $borrowRequest]) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                </form>
                                                <form action="{{ route('admin.reject.borrow.request', ['borrowRequest' => $borrowRequest]) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                </form>
                                            @elseif ($borrowRequest->status === 'approved')
                                                <button type="button" class="btn btn-success btn-sm" disabled>Approved</button>
                                            @elseif ($borrowRequest->status === 'rejected')
                                                <button type="button" class="btn btn-danger btn-sm" disabled>Rejected</button>
                                            @endif
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
