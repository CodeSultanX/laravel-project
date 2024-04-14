@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление тэга</h1>
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.tag.store') }}" class="w-25" method="POST">
                          @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name = "title" placeholder="Название">
                                @error('title')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                           
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.card -->
</div>

@endsection