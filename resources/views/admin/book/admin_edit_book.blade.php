@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Book</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Book</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Book</h6>
                    <form method="POST" action="{{ route('admin.update.book', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Book Title</label>
                            <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Title" value="{{ $book->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book Author</label>
                            <input type="text" class="form-control" name="author" id="author" placeholder="Author" value="{{ $book->author }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book Edition</label>
                            <input type="text" class="form-control" name="edition" id="edition" placeholder="Edition" value="{{ $book->edition }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book Quantity</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="{{ $book->quantity }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Book Description</label>
                            <textarea id="description" name="description" class="form-control" rows="8" placeholder="Enter a detailed description of book...">{{ $book->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <a href="{{ route('admin.book') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
