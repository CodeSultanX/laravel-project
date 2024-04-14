@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста</h1>
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
                            <form action="{{ route('admin.post.update',$post->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PATCH')
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Название</label>
                                  <input type="text" class="form-control" value="{{ $post->title }}" name="title" placeholder="Название...">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <textarea id="summernote" name="content">{{  $post->content }}</textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label>Превью</label>
                                  <div class="mb-3 w-25">
                                    <img src="{{ asset('storage/' .$post->preview_image) }}" alt="preview_image" class="w-50">
                                  </div>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="preview_image" id="exampleInputFile">
                                      <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                
                                    </div>
                                  
                                   
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label >Главное изображение</label>
                                  <div class="mb-3 w-50">
                                    <img src="{{ asset('storage/' .$post->main_image) }}" alt="main_image" class="w-50">
                                  </div>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" name="main_image" class="custom-file-input">
                                      <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                   
                                    </div>
                                  </div>
                                
                                </div>

                                <div class="form-group w-25">
                                    <label>Выберите категорию</label>
                                    <select class="form-control" name="category_id">
                                    @foreach ( $categories as $category ) 
                                        <option value="{{ $category->id }}" {{ $category->id ==  $post->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
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
                                        <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $tag->id }}" >{{ $tag->title }}</option>
                                        @endforeach    
                                    </select>      
                                    @error('tag_ids')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror  
                                  </div>
                              </div>

                             
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Обновить</button>
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