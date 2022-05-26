@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a href="{{ route('banners.index') }}" type="button" class="btn btn-outline-danger ml-auto">Go
                            Back</a>
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

                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub Header</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Header</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Short Intro</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Cover Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose Cover Image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
