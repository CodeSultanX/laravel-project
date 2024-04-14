@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 d-flex align-items-center ">
                           
                                <h1 class="m-1">{{ $category->title }}</h1>
                                <td><a href="{{ route('admin.category.edit',$category->id) }}"><i class=" fas fa-pencil-alt text-success"></i></a></td>
                                <td>
                                    <form action="{{ route('admin.category.delete',$category->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent text-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                         
                            
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                                <li class="breadcrumb-item active">Категорий </li>
                            </ol>
                        </div>
                    </div>
              </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
        
                <div class="col-6 mt-3">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap ">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $category->id }}</td>
                                        </tr>    
                                        <tr>
                                            <td>Название</td>
                                            <td>{{ $category->title }}</td>
                                        </tr>    
                                    </tbody>
                                </table>
                        </div>
                
                    </div>
                </div>
                    <!-- /.card -->
                  </div>
            
        </section>
        
    </div>
@endsection