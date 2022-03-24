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
      <h3 class="card-title">Category List</h3>
      <div class="card-tools">
        <a  class="btn btn-success" href="{{ url('/admin/categories/create') }}">Add New Category</a>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Main Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($category_list as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ App\Enums\MainCategory::getDescription($item->main_category_id) }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ url("admin/categories/$item->id/edit") }}" class="btn btn-primary btn-sm">Update</a>
                    {{-- <a href="" class="btn btn-danger btn-sm">Delete</a> --}}
    
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
