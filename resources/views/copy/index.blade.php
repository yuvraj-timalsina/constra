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
                        <a href="{{ route('banners.create') }}" type="button" class="btn btn-outline-danger ml-auto">Create
                            Banner</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">S.N.</th>
                                        <th>Sub Header</th>
                                        <th>Cover Image</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $banner->sub_header }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/' . $banner->image->image) }}" alt=""
                                                    width="50px">
                                            </td>
                                            <td><span class="badge bg-danger">55%</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
