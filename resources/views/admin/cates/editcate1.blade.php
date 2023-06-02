@extends('admin.dashboard')
@section('title')
    <div class="col-sm-6">
        <h1 class="m-0">Add Category</h1>
    </div>
@endsection
@section('titlemini')
    <li class="breadcrumb-item active">Update Category</li>
@endsection
@section('content')
 <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('cates.update', $editcate->id)}}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputCate">Danh mục</label>
              <input type="text" name="name_ct" value="{{$editcate->name_ct}}" class="form-control" id="exampleInputCate">
            </div>          
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>

  </div>
@endsection
