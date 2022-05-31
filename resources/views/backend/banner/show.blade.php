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
                    <div class="card mb-2 bg-gradient-dark">
                        <img class="card-img-top" src="{{ asset('/storage/' . $banner->image->image) }}" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h4 class="text-primary text-white">{{ $banner->title }}</h4>
                            <p class="card-text text-white pb-2 pt-1">{{ $banner->short_intro }}</p>
                            <p class="text-white">Last Updated {{ $banner->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
