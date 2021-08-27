@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                        <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group col-4">
                                <label>Назва</label>
                                <input type="text" class="form-control" name="title" placeholder="Назва поста"
                                       value="{{$post->title}}">
                            </div>
                            @error('title')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group">
                                <textarea name="content" id="summernote">{{$post->content}}</textarea>
                            </div>
                            @error('title')
                            <div class="text-danger">Поле необходимо заполнить</div>
                            @enderror
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
                                @if($post->preview_image)
                                    <div class="w-50 mb-2">
                                        <img src="{{asset('storage/'.$post->preview_image)}}" alt="preview_image"
                                             class="w-50">
                                    </div>
                                @endif
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
                                @if($post->main_image)
                                    <div class="w-50 mb-2">
                                        <img src="{{asset('storage/'.$post->main_image)}}" alt="main_image" class="w-50">
                                    </div>
                                @endif
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
                                            value="{{$category->id}}"{{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <select class="select2" multiple="multiple" name="tag_ids[]"
                                        data-placeholder="Виберите Теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id,$post->tags->pluck('id')->toArray()) ? 'selected' : ''}}
                                            value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
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
