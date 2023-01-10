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
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.store') }}" method="POST">
                            @csrf
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                value="{{ old('title') }}"
                                >
                                @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <form method="post">
                                    <textarea id="summernote" name="content">
                                        {{ old('content') }}
                                    </textarea>
                                    @error('content')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                    @enderror
                                </form>
                                    <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
