@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
              
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Тэги</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Тэги</li>
                        </ol>
                    </div>
                </div>
            </div>
        <!-- /.content-header -->
        <div class="col-12">
        
            
            <!-- /.card-header -->
            <div class="row">
              <div class="col-1 mb-3">
                <a href="{{ route('admin.tag.create') }}"  class = "btn btn-primary">Добавить</a>
              </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th colspan="2" style="text-align: center" >Действие</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tags as $tag )
                          <tr>
                              <td>{{ $tag->id }}</td>
                              <td>{{ $tag->title }}</td>
                              <td><a href="{{ route('admin.tag.show',$tag->id) }}"><i class="fa fa-eye"></i></a></td>
                              <td><a href="{{ route('admin.tag.edit',$tag->id) }}"><i class=" fas fa-pencil-alt text-success"></i></a></td>
                              <td>
                                  <form action="{{ route('admin.tag.delete',$tag->id) }}" method="POST" >
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="border-0 bg-transparent text-danger"><i class="fa fa-trash"></i></button>
                                  </form>
                              </td>
                          
                          </tr>    
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        
         
        </div>
     
      
           
    </div>
    </div>
  
   
@endsection