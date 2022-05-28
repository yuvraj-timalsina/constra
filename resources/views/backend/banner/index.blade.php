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
                                        <th>Title</th>
                                        <th>Cover Image</th>
                                        <th>Link</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $banner->title }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/' . $banner->image->image) }}" alt=""
                                                    width="50px">
                                            </td>
                                            <td><a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('banners.edit', $banner->id) }}"
                                                    class="btn bg-info mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn bg-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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
