@extends('admin.dashboard')
@section('title')
    <div class="col-sm-6">
        <h1 class="m-0">List Category</h1>
    </div>
@endsection
@section('titlemini')
    <li class="breadcrumb-item active">List Category</li>
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
              <th>Mã Id</th>
              <th>Tên danh mục</th>
              <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($category as $cate)
                    <tr>
                        <td>{{$cate->id}}</td>
                        <td>{{$cate->name_ct}}</td>
                        <td style="text-align: center">
                            <a href="{{route('cates.edit', $cate->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                            <form action="{{route('cates.destroy', $cate->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa loại tin tức này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
@endsection
