@extends('layout')

@section('title', 'Blog')

@section('content')

    <h1 class="text text-center py-2">Blog</h1>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col" >ชื่อ</th>
                <th scope="col" width="20%">สถานะ</th>
                <th scope="col" width="15%">ลบ</th>
                <th scope="col" width="15%">แก้ไข</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{ $blog->title }}</th>
                    @if ($blog->status == true)
                        <td><a href="{{route('change',$blog->id)}}" class="btn btn-success">พร้อมใช้งาน</a></td>
                    @else
                        <td><a href="{{route('change',$blog->id)}}" class="btn btn-warning">ไม่พร้อมใช้งาน</a></td>
                    @endif
                    <td><a href="{{route('delete',$blog->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure?')">ลบ</a></td>
                    <td><a href="{{route('update',$blog->id)}}" class="btn btn-primary">แก้ไข</a></td>
                </tr>
            @endforeach


        </tbody>
    </table>
{{$blogs->links()}}

@endsection
