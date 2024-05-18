<x-app-layout>
    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card-header text-xl mb-4">Borrow Requests</div>

                                <div class="card-body text-center">
                                    @if ($borrowRequests->isNotEmpty())
                                    <table class="table mx-auto">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Book Title</th>
                                                <th>Status</th>
                                                <th>Admin Decision</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($borrowRequests as $borrowRequest)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $borrowRequest->book->title }}</td>
                                                <td>{{ $borrowRequest->status }}</td>
                                                <td>
                                                    @if ($borrowRequest->approvals->contains('status', 'returned'))
                                                        <button class="btn btn-secondary btn-sm" disabled>Returned</button>
                                                    @else
                                                        @php
                                                            $lastApproval = $borrowRequest->approvals->last();
                                                        @endphp
                                                        @if ($lastApproval)
                                                            @if ($lastApproval->status === 'approved')
                                                                <button class="btn btn-success btn-sm" disabled>Approved</button>
                                                            @elseif ($lastApproval->status === 'rejected')
                                                                <button class="btn btn-danger btn-sm" disabled>Rejected</button>
                                                            @endif
                                                        @else
                                                            <button class="btn btn-warning btn-sm" disabled>No decision yet</button>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>No borrow requests found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
