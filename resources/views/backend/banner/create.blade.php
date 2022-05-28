@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @include('partials.breadcrumb')
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a href="{{ route('banners.index') }}" type="button" class="btn btn-primary ml-auto"><i
                                class="far fa-hand-point-left mr-1"></i>
                            Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="file-input">
                                        <img id="frame" src="https://picsum.photos/1155/235" alt="" width="1155px"
                                            height="235px"></label>
                                    <input id="file-input" onchange="preview()" name="image"
                                        class="d-none form-control @error('image') is-invalid @enderror" type="file">
                                    @error('image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Sub Header</label>
                                    <input name="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Header</label>
                                    <input name="header" type="text"
                                        class="form-control @error('header') is-invalid @enderror">
                                    @error('header')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Short Intro</label>
                                    <textarea name="short_intro" class="form-control @error('short_intro') is-invalid @enderror" rows="3"></textarea>
                                    @error('short_intro')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input name="link" type="url" class="form-control @error('link') is-invalid @enderror">
                                    @error('link')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i>Save
                                        Banner</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
