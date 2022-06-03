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
                                                    width="100px" height="50px">
                                            </td>
                                            <td><a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a>
                                            </td>
                                            <td class="d-flex">
                                                <button class="btn bg-success mr-2" data-toggle="modal"
                                                    data-target="#bannerModal" onclick="showBanner({{ $banner->id }})">
                                                    <i class="fas fa-eye"></i>
                                                </button>
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
    <!-- The Modal -->
    <div class="modal fade" id="bannerModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"><i
                            class="far fa-times-circle"></i></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <img class="card-img-top mb-2" src="" alt="">
                    <p class="card-text"></p>
                    <a class="card-link btn btn-primary float-right" href="" target="_blank"><i class="fas fa-link"></i>
                        Visit
                        Link</a>
                </div>

            </div>
        </div>
    </div>
    <script>
        function showBanner(id) {
            $.ajax({
                type: "GET",
                url: "{{ url('/banners/') }}/" + id,
                dataType: "json",
                success: function(res) {
                    $('.modal-title').html(res.title);
                    $('.card-text').html(res.short_intro);
                    $('.card-link').attr('href', res.link);
                    $('.card-img-top').attr('src', '/storage/' + res.image.image);
                }
            });
        }
    </script>
@endsection
