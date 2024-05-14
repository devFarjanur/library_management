@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Product Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Category List</li>
        </ol>
    </nav>


<div class=" mb-3 d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('admin.create.product.categories') }}" class="btn btn-primary">Add Product Category</a>

</div>








</div>



@endsection