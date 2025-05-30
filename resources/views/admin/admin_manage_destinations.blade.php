@extends('admin.layout.admin_layout')

@section('page-title')
    Admin | Dashboard
@endsection

@section('main-content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-md">
                                <h3 class="card-title">Manage Destinations</h3>
                            </div>
                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                data-bs-target="#addSubject">
                                Add a Subject
                            </button>
                        </div>

                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($destinations->isEmpty())
                                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                                        <h4 class="alert-heading">No New Signups Found</h4>
                                        <p>There are no new signups at the moment. Please check back later.</p>
                                        <hr>
                                        <p class="mb-0">If you believe this is an error, please contact Development Team.
                                        </p>
                                    </div>
                                @else
                                    <table class="table table-hover table-bordered mb-0" id="myTable"
                                        style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinations as $destination)
                                                <!-- <div>{{ $destination }}</div> -->
                                                <tr>
                                                    <td>{{ (string) $destination['_id'] }}</td>
                                                    <td>{{ $destination['destinationTitle'] }}</td>
                                                    <td>{{ $destination['description'] }}</td>
                                                    <td><img src="{{ $destination['imagePath'] }}" alt="Image"
                                                            width="100"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- add Destination Modal --}}
    <div class="modal modal-lg fade text-left mt-3" id="addSubject" tabindex="-1" role="dialog"
        aria-labelledby="addSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="addSubjectModalLabel">Add New t</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/create_destination" class="form form-horizontal"
                        id="destinationAddForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="destinationTitle">Title</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="destinationTitle" id="destinationTitle" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="imagePath">Image</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="imagePath" id="imagePath" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- End of add Destination Modal --}}

@endsection

@section('after-body')
@endsection
