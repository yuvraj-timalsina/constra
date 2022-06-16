@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @include('partials.breadcrumb')
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a href="{{ route('projects.create') }}" type="button" class="btn btn-success ml-auto"><i
                                class="fas fa-paper-plane mr-1"></i>Create
                            Project</a>
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
                                        <th>Category</th>
                                        <th>Gallery</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>
                                                @foreach ($project->categories as $category)
                                                    <a href="#"
                                                        class="btn btn-xs btn-outline-primary">{{ $category->title }}</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($project->images as $image)
                                                    <img src="{{ asset('/storage/' . $image->imageFile) }}" alt=""
                                                        width="50px" height="35px">
                                                @endforeach

                                            </td>
                                            <td class="d-flex">
                                                <button class="btn bg-success mr-2" data-toggle="modal"
                                                    data-target="#projectModal" onclick="showProject({{ $project->id }})">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="{{ route('projects.edit', $project->id) }}"
                                                    class="btn bg-info mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('projects.destroy', $project->id) }}"
                                                    method="POST">
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
    <div class="modal fade" id="projectModal">
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
                    <p class="card-text"></p>
                </div>

            </div>
        </div>
    </div>
    <script>
        function showProject(id) {
            $.ajax({
                type: "GET",
                url: "{{ url('/projects/') }}/" + id,
                dataType: "json",
                success: function(res) {
                    $('.modal-title').html(res.title);
                }
            });
        }
    </script>
@endsection
