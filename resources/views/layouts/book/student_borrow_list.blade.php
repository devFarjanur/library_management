<x-app-layout>
    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card-header">Borrow Requests</div>

                                <div class="card-body text-center">
                                    @if (count($borrowRequests) > 0)
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
                                                        Returned
                                                    @else
                                                        @if ($borrowRequest->approvals->count() > 0)
                                                            @if ($borrowRequest->approvals->last()->status === 'approved')
                                                                Approved
                                                            @elseif ($borrowRequest->approvals->last()->status === 'rejected')
                                                                Rejected
                                                            @endif
                                                        @else
                                                            No decision yet
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
