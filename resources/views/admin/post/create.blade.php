@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-4">
                                <label>Назва</label>
                                <input type="text" class="form-control" name="title" placeholder="Назва поста"
                                       value="{{old('title')}}">
                            </div>
                            @error('title')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group">
                                <textarea name="content" id="summernote">{{old('content')}}</textarea>
                            </div>
                            @error('title')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            @error('title')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить картинки</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Картинка</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            @error('title')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group w-25">
                                <label>Виберите категорию</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}"{{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">Поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <select class="select2" multiple="multiple" name="tag_ids[]"
                                        data-placeholder="Виберите Теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}}
                                            value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавать">
                            </div>
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
