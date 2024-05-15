@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product Details</li>
    </ol>
</nav>

<div class=" mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('admin.edit.product', $product->id) }}" class="btn btn-primary">Edit Product</a>
    <a href="#" class="btn btn-primary">Delete Product</a>
</div>

<div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ asset('upload/admin_images/' . $product->photo) }}" alt="Product Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        
        <h3 class="price">Price: {{ $product->price }}</h3>
        <p>{{ $product->description }}</p>
        <button class="btn btn-primary">Add to Cart</button>
        <a href="#" class="btn btn-outline-secondary">Learn More</a>
      </div>
    </div>
  </div>

</div>


@endsection