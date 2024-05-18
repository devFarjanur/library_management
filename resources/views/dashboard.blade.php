<x-app-layout>

    <div class="py-4">
        <div class="mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h6 class="card-title mb-4 text-xl">Book List</h6>

                    <!-- Search Form -->
                    <form action="{{ route('student.search.book') }}" method="GET" class="mb-4">
                        <div class="flex items-center">
                            <input type="text" name="title" placeholder="Search by Title" class="mr-2 px-3 py-2 border border-gray-300 focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 rounded-md">
                            <input type="text" name="author" placeholder="Search by Author" class="mr-2 px-3 py-2 border border-gray-300 focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200 rounded-md">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Search</button>
                        </div>
                    </form>

                    <!-- Book List -->
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Edition</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
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
                                        <form action="{{ route('student.borrow.book', ['book' => $book]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Borrow</button>
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

</x-app-layout>
