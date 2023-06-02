@extends('admin.dashboard')
@section('title')
    <div class="col-sm-6">
        <h1 class="m-0">List Blog</h1>
    </div>
@endsection
@section('titlemini')
    <li class="breadcrumb-item active">List Blog</li>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">
          <h3 class="card-title">Da</h3>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Danh mục</th>
                <th>Tiêu đề</th>
                <th>Tóm tắt</th>
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($blog as $tt)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$tt->name_ct}}</td>
                        <td>{{$tt->title}}</td>
                        <td>{{$tt->synopsis}}</td>
                        <td>{{$tt->content}}</td>
                        <td><img src="{{$tt->image}}" style="width:150px;"alt=""></td>
                        <td style="text-align: center">
                            <a href="{{route('blogs.edit', $tt->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                            <form action="{{route('blogs.destroy', $tt->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa loại tin tức này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
          </table>
          {{$blog->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
@endsection
