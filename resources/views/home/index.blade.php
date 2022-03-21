@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh mục sách</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                        </div>
            </form> 
                                    
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped" text-align: center>
                <thead>
                    <th>STT</th>
                    <th>Tên Sách</th>
                    <th>Môn học</th>
                    <th>Hình Ảnh</th>
                    <th>Trạng thái</th>
                </thead>
                <tbody >
                    @php
                         $index = 0;
                    @endphp
                    @foreach ($books as $book)

                  
                        
                   
                        <tr>
                            <td>{{$index+=1}}</td> 
                            <td>{{$book->book_title}}</td> 
                            <td>{{$book->sub_name}}</td> 
                            <td width="150px" height="200px" ><img src="{{$book->book_img}}" ></td>
                            <td> 
                                @if ($book->book_id == $book->bookid)
                                    <button class="btn btn-info btn-fill btn-wd">Đã đăng ký</button>
                                @else

                                    <a rel="tooltip" class="btn btn-success btn-fill btn-wd" href="{{ route('home.create',['idBook' => $book->book_id]) }}">Đăng Ký</a>
                                @endif
                             
                               
                                   
                             
                            </td>
                        </tr> 
                        
                    @endforeach                                       
                </tbody>
            </table> 
            <div class="text-center">
                {{ $books->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endsection
    