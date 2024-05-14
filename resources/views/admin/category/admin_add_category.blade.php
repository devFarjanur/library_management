@extends('admin.admin_dashboard')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Product Category</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add Product Category</li>
	</ol>
</nav>


    <div class="row">
		
        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Add Product Category Name</h4>

                <form method="POST" action="#" enctype="multipart/form-data">
                @csrf 
                    <div class="mb-3">
                        <label for="category" class="form-label">Product Category:</label>
                        <input id="category" class="form-control" name="productcategory" type="text">
                    </div>

                    <input class="btn btn-primary" type="submit" value="Add Category">
                </form>


                </div>
            </div>
        </div>
    
	</div>

</div>


@endsection