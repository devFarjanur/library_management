<x-app-layout>
    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card-header">Borrowed Book List</div>

                                <div class="card-body text-center">
                                    <table class="table mx-auto">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Return Due Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($borrowRequests as $borrowApproval)
                                                <tr>
                                                    <td>{{ $borrowApproval->borrowRequest->book->title }}</td>
                                                    <td>{{ $borrowApproval->status }}</td>
                                                    <td>{{ $borrowApproval->return_due_date }}</td>


                                                    <td>
                                                        <form action="{{ route('student.return.book', $borrowApproval->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Return Book</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if($borrowRequests->isEmpty())
                                        <h6 class="title">No borrowed books to show.</h6>
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
