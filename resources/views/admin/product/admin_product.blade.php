@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
</nav>


    <div class=" mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>
    </div>

    <div class="row row-cols-2 row-cols-md-4">
    @foreach($products as $product)
        <div class="col grid-margin stretch-card">
            <div class="card h-100 d-flex flex-column">
                <img src="{{ asset('upload/admin_images/' . $product->photo) }}" class="card-img-top img-fluid px-5 py-2" alt="..." style="height: 250px; ">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text mb-3">{{ $product->price }}</p>
                    <a href="{{ route('admin.product.singleview', $product->id) }}" 
                    class="btn btn-primary d-flex justify-content-center align-items-center mt-auto">Product Details
                    </a>
            </div>
        </div>
        </div>
    @endforeach
    </div>
</div>

@endsection