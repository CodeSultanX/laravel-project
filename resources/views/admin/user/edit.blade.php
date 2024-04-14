@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
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
                        <form action="{{ route('admin.user.update',$user->id) }}" class="w-25" method="POST">
                          @csrf
                          @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->name }}" name = "name" placeholder="Имя">
                                @error('name')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            <div class="form-group">
                                <input type="email" class="form-control" value="{{ $user->email }}" name = "email" placeholder="Email">
                                @error('email')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                              </div>

                              <div class="form-group w-50">
                                {{-- <input type="hidden" name="user_id" >  --}}
                                <label>Выберите роль</label>
                                <select class="form-control" name="role" >
                                @foreach ( $roles as $key => $role ) 
                                    <option value="{{ $key }}" {{ $key == $user->role ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>    
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                           
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.card -->
</div>

@endsection