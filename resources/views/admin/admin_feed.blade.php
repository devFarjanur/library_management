@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Student Feedbacks</li>
        </ol>
    </nav>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Feedback') }}</div>

                    <div class="card-body">
                        @foreach ($feedbacks as $feedback)
                            <div class="mb-3">
                                <div><strong>Student Name:</strong> {{ $feedback->user->name }}</div>
                                <div><strong>Feedback:</strong> {{ $feedback->content }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
