@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление юзера</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.user.store')}}" method="POST" class="col-4">
                            @csrf

                            <div class="form-group">
                                <label>Имя</label>
                                <input type="text" class="form-control" name="name" placeholder="Имя"
                                       value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                       value="{{ old('email') }}">
                            </div>
                            @error('email')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group">
                                <label>Пароль</label>
                                <input type="text" class="form-control" name="password" placeholder="Пароль"
                                       value="{{ old('password') }}">
                            </div>
                            @error('password')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror

                            <div class="form-group w-25">
                                <label>Виберите пользователя</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $id => $role)
                                        <option
                                            value="{{$id}}"{{$id == old('role') ? 'selected' : ''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">Поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
