@extends('admin.admin_dashboard')

@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
    </ol>
</nav>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">

                <h3 class="mb-3">Edit Product</h3>
                <!-- <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Primary</button>
                </div> -->

                <form method="POST" action="{{ route('admin.update.product', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                    <div class="mb-3">
                        <label class="form-label">Product Photo</label>
                        <input name="photo" type="file" class="form-control" id="image" autocomplete="off" >
                    </div>

                    <div class="mb-3">
                        <img id="showImage" class="wd-150 rounded" height="150px" src="{{ (!empty ($profileData->photo)) ?
                        url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')  
                        }}" alt="profile">
                    </div>

                    <div class="mb-3">       
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="stock">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Description</label>
                        <textarea id="description" name="description" class="form-control" rows="8" placeholder="Enter a detailed description of your product..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Update Product</button>
                    <button class="btn btn-secondary">Cancel</button>
                </form>

            </div>
        </div>
    </div>
    
</div>

<script type="text/javascript">
  $(document).ready(function(){
  $('#image').change(function(e){
  var reader = new FileReader();
  reader.onload = function(e){
    $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>


@endsection