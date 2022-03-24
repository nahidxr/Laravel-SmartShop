@extends('admin.layouts.app')

@section('page_title')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Product</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Product</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="card"> 
    <div class="card-header">
      <h3 class="card-title">Add Product</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" name="name" id="category" value="{{ old('name') }}" placeholder="Enter product Name">
              </div>
              @error('name')
              <p class="text-danger">{{ $message }}</p>
              @enderror

              <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select name="category_id" class="form-control">
                  @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
              @error('name')
              <p class="text-danger">{{ $message }}</p>
              @enderror

              <div class="form-group">
                <label for="exampleInputEmail1">Product Price</label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter product price">
              </div>
              @error('price')
              <p class="text-danger">{{ $message }}</p>
              @enderror

            <div class="form-group">
                <label for="exampleInputEmail1">Discount Amount</label>
                <input type="text" class="form-control" name="discount_amount" value="{{ old('discount_amount') }}" placeholder="Enter Discount Amount">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Remaining Stock</label>
                <input type="text" class="form-control" name="stock" value="{{ old('stock') }}" placeholder="Enter Product Stock">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
               <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Product Size</label>
              <input type="text" class="form-control" name="size" id="size" value="{{ old('size') }}" placeholder="Enter product sizes">
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Product Colour</label>
              <input type="text" class="form-control" name="colour" id="colour" value="{{ old('colour') }}" placeholder="Enter product colour">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Featured Image</label>
                <input type="file" name="featured_image">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Images</label>
                <input type="file" name="images[]" multiple>
            </div>
    </div>
         
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
</div>

@endsection
