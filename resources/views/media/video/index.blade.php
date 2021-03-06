@extends('layouts.backend')

@section('title')
{{$title}}
@endsection
 
@section('content')


<div id="user-manage" class="row">

    <div class="col-lg-12">
        <h2>{{$title}}</h2>

        @if(Session::has('Mess'))
            <div class="alert alert-success">
                <p>{{Session::get('Mess')}}</p>
            </div>
            @endif
            @if(Session::has('errorMess'))
            <div class="alert alert-danger">
                <p>{{Session::get('errorMess')}}</p>
            </div>
            @endif
        
        @include('parts.tablenav', ['filter' => ['name' => 'Tên', 'order' => 'Thứ tự', 'count' => 'Số bài']])
        
        <form class="" method="POST" action="{{route('admin.video.massdel')}}">
            {!! csrf_field() !!}
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left"><input type="checkbox" name="massdel" class="checkall" /></th>
                            <th>ID</th>
                            <th>Video</th>
                            <th>Tên</th>
                            <th>Tiêu đề</th>
                            <th>Author</th>
                            <th>Kiểu</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($videos)
                        @foreach($videos as $video)
                        <tr>
                            <td><input type="checkbox" name="massdel[{{$video->id}}]" class="checkitem" /></td>
                            <td>{{$video->id}}</td>
                            <td>{{$video->src}}</td>
                            <td>{{$video->name}}</td>
                            <td>{{$video->title}}</td>
                            <td>{{$video->author_id}}</td>
                            <td>{{$video->type}}</td>
                            <td style="min-width: 93px;">
                                <a href="{{route('admin.video.edit', $video->id)}}" class="btn btn-info btn-sm item-edit" title="Chỉnh sửa"><span class="fa fa-pencil"></span></a>  
                                <a href="{{route('admin.video.delete', $video->id)}}" class="btn btn-danger btn-sm item-delete" title="Xóa"><span class="fa fa-close"></span></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            
            <a href="{{route('admin.video.create')}}" class="btn btn-success"><span class="fa fa-plus"></span> Thêm mới</a>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Xóa</button>
            
        </form>
        
    </div>
</div>
<!-- /.row -->

@endsection