@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @include('partials.breadcrumb')
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a href="{{ route('banners.create') }}" type="button" class="btn btn-success ml-auto"><i
                                class="fas fa-paper-plane mr-1"></i>Create
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
                                            <td class="d-flex">
                                                <a class="btn bg-info mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn bg-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
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
