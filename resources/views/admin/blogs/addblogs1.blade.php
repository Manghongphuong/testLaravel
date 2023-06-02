@extends('admin.dashboard')
@section('title')
    <div class="col-sm-6">
        <h1 class="m-0">Add Blogs</h1>
    </div>
@endsection
@section('titlemini')
    <li class="breadcrumb-item active">Add Blogs</li>
@endsection
@section('content')
 <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Blogs</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputCate">Loại Danh mục</label>
              <select class="form-control" name="name_ct">
                @foreach ( $cate as $ct )
                    <option value="{{$ct->id}}">{{$ct->name_ct}}</option>
                @endforeach
              </select>
            </div> 
            <div class="form-group">
                <label for="exampleInputCate">Tiêu đề blogs</label>
                <input type="text" name="title" class="form-control" id="exampleInputCate" placeholder="Nhập tiêu đề">
                @error('title')
                    <span style="color:red">Lỗi : {{ $message }}</span>
                @enderror
            </div>              
            <div class="form-group">
                <label for="exampleInputCategory" class="form-label">Tóm tắt</label>
                <textarea class="form-control" id="textarea" placeholder="Default Textarea" rows="5" name="synopsis"></textarea>
                @error('synopsis')
                    <span style="color:red">Lỗi : {{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputCategory" class="form-label">Nội dung</label>
                <textarea class="form-control" id="textarea" placeholder="Default Textarea" rows="5" name="content"></textarea>
                @error('content')
                    <span style="color:red">Lỗi : {{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="file_upload">
                </div>
                @error('file_upload')
                    <span style="color:red">Lỗi : {{ $message }}</span>
                @enderror
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
