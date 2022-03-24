@extends('admin.layouts.app')

@section('page_title')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Category</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Category</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="card"> 
    <div class="card-header">
      <h3 class="card-title">Add Category</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Main Category</label>
                <select name="main_category_id"  class="form-control">
                    @foreach ($main_category as $key => $item)
                        <option value="{{ $key }}" {{ old('main_category_id')==strval($key) ? 'selected':''}}>{{ $item  }}</option>
                    @endforeach
                </select>
              </div>
              @error('name')
              <p class="text-danger">{{ $message }}</p>
          @enderror
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" name="name" id="category" value="{{ old('name') }}" placeholder="Enter Category Name">
              </div>
              @error('name')
              <p class="text-danger">{{ $message }}</p>
          @enderror
            </div>
         
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
    </div>
   
    
  </div>
@endsection
