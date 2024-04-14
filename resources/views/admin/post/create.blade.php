@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                      <li class="breadcrumb-item active">Посты </li>
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
                        <div class="card card-primary mt-3">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Название</label>
                                  <input type="text" class="form-control" value="{{ old('title') }}" name="title" placeholder="Название...">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label>Превью</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="preview_image" id="exampleInputFile">
                                      <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                
                                    </div>
                                    <div class="col-12 mt-2">
                                        @error('preview_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label >Главное изображение</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" name="main_image" class="custom-file-input">
                                      <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                   
                                    </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                    @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="form-group w-25">
                                    <label>Выберите категорию</label>
                                    <select class="form-control" name="category_id">
                                    @foreach ( $categories as $category ) 
                                        <option value="{{ $category->id  }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>    
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>

                                  <div class="form-group " >
                                    <label>Тэги</label>
                                    <select class="select2 " name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                                        @foreach ($tags as $tag )
                                        <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}" >{{ $tag->title }}</option>
                                        @endforeach    
                                    </select>      
                                    @error('tag_ids')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror  
                                  </div>
                              </div>

                             
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                              </div>
                            </form>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.card -->
</div>

@endsection