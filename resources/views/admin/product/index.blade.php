@extends('admin.layouts.app')

@section('page_title')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Products</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Products</li>
    </ol>
  </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Product List</h3>
      <div class="card-tools">
        <a  class="btn btn-success" href="{{ url('/admin/products/create') }}">Add New Product</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount Amount</th>
            <th>Featured Image</th>
            <th>Stock</th>
            <th>Sizes</th>
            <th>Colours</th>
            <th>Description</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
         
          
            @foreach ($product as $item)
            <tr>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->discount_amount }}</td>
                <td><img src="{{ asset("storage/$item->featured_image") }}" width="100px"></td>
                <td>{{ $item->stock }}</td>
                @php
                $size=$item->size;
                $product_size=explode(',',$size);
                @endphp
                <td>
                  @foreach ($product_size as $one_size)
                      {{ $one_size }}<br>
                  @endforeach
                </td>
                @php
                $colour=$item->colour;
                $product_colour=explode(',',$colour);
                @endphp
                <td>
                  @foreach ($product_colour as $one_colour)
                      {{ $one_colour }}<br>
                  @endforeach
                </td>
                <td>{{ $item->description }}</td>
                
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ url("admin/categories/$item->id/edit") }}" class="btn btn-primary btn-sm">Update</a>
                   
    
                    <form action="{{ url("/admin/categories/$item->id") }}" method="POST" onsubmit="return confirm('Do you really want to delete this category?');">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm ml-1">
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach 
        </tbody>
      </table>
    </div>
   
    
  </div>
@endsection
