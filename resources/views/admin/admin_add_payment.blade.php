@extends('admin.admin_dashboard')
@section('admin')




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">



<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Payment Method</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Payment Method</li>
    </ol>
</nav>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">

                <h6 class="card-title">Add Payment Method</h6>


                <form method="POST" action="{{ route('admin.store.payment') }}" enctype="multipart/form-data">
                @csrf 

                <div class="mb-3">
                    <label for="payment" class="form-label">Payment Method</label>
                    <input id="payment" class="form-control" name="paymentmethod" type="text">
                </div>

                <input class="btn btn-primary" type="submit" value="Submit">


                </form>

            </div>
        </div>
    </div>
    
</div>



@endsection