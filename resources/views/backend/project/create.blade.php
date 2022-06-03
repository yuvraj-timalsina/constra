@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @include('partials.breadcrumb')
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a href="{{ route('projects.index') }}" type="button" class="btn btn-primary ml-auto"><i
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
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group input-field">
                                    <label>Gallery</label>
                                    <div class="gallery-images"></div>
                                    @error('gallery')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" value="{{ old('title') }}" type="text"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Short Intro</label>
                                    <textarea name="short_intro" class="form-control @error('short_intro') is-invalid @enderror"
                                        rows="3">{{ old('short_intro') }}</textarea>
                                    @error('short_intro')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Client</label>
                                    <input name="client" value="{{ old('client') }}" type="text"
                                        class="form-control @error('client') is-invalid @enderror">
                                    @error('client')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Architect</label>
                                    <input name="architect" value="{{ old('architect') }}" type="text"
                                        class="form-control @error('architect') is-invalid @enderror">
                                    @error('architect')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input name="location" value="{{ old('location') }}" type="text"
                                        class="form-control @error('location') is-invalid @enderror">
                                    @error('location')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input name="size" value="{{ old('size') }}" type="text"
                                        class="form-control @error('size') is-invalid @enderror">
                                    @error('size')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Completion Year</label>
                                    <input name="title" value="{{ old('title') }}" type="text"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select name="categories[]" multiple
                                        class="form-control categories @error('categories') is-invalid @enderror">
                                        @error('categories')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{!! $category->title !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i>Save
                                        Project</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.categories').select2({
                theme: 'classic'
            });
        });
    </script>
    <script src="{{ asset('js/image-uploader.min.js') }}"></script>
    <script>
        $('.gallery-images').imageUploader({
            imagesInputName: 'gallery',
        });
    </script>
@endsection
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/image-uploader.min.css') }}">
@endsection
