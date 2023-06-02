@extends('admin.dashboard')
@section('title')
    <div class="col-sm-6">
        <h1 class="m-0">Add Category</h1>
    </div>
@endsection
@section('titlemini')
    <li class="breadcrumb-item active">Add Category</li>
@endsection
@section('content')
 <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('cates.store')}}" method="POST">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputCate">Danh mục</label>
              <input type="text" name="name_ct" class="form-control" id="exampleInputCate" placeholder="Nhập danh mục">
              @error('name_ct')
                <span style="color:red">Lỗi : {{ $message }}</span>
              @enderror
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
