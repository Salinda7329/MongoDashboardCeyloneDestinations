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
                                <h3 class="card-title">Manage Galleries</h3>
                            </div>
                            <button type="button" class="btn btn-outline-primary btnAddGallery" data-bs-toggle="modal"
                                data-bs-target="#manageGalleryModal">
                                Add a Gallery
                            </button>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($galleries->isEmpty())
                                    <div class="alert alert-danger text-center">
                                        <h4>No Galleries Found</h4>
                                        <p>If this is unexpected, contact the Dev Team.</p>
                                    </div>
                                @else
                                    <table class="table table-hover table-bordered" id="galleryTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Default Image</th>
                                                <th>Hover Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($galleries as $gallery)
                                                <tr>
                                                    <td>{{ (string) $gallery->_id }}</td>
                                                    <td>{{ $gallery->name }}</td>
                                                    <td>
                                                        <img src="{{ asset($gallery->defaultPath) }}" width="100px"
                                                            height="100px" class="img-fluid img-thumbnail img-preview"
                                                            data-image="{{ asset($gallery->defaultPath) }}">
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset($gallery->hoverPath) }}" width="100px"
                                                            height="100px" class="img-fluid img-thumbnail img-preview"
                                                            data-image="{{ asset($gallery->hoverPath) }}">
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <button class="btn btn-primary btnEditGallery me-2"
                                                                data-id="{{ (string) $gallery->_id }}">
                                                                <i class="bi bi-pencil"></i>
                                                            </button>
                                                            <button class="btn btn-danger btnDeleteGallery"
                                                                data-id="{{ (string) $gallery->_id }}">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
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

    {{-- Gallery Modal --}}
    <div class="modal fade" id="manageGalleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="galleryModalLabel"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg text-white"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="galleryForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod">
                        <div class="form-group mb-3">
                            <label for="galleryName">Name</label>
                            <input type="text" name="name" id="galleryName" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="defaultPath">Default Image</label>
                            <input type="file" name="defaultPath" id="defaultPath" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="hoverPath">Hover Image</label>
                            <input type="file" name="hoverPath" id="hoverPath" class="form-control">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Image Preview Modal --}}
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 90vw;">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body d-flex justify-content-center p-0" style="background: rgba(0,0,0,0.8);">
                    <img src="" id="previewImage" class="img-fluid rounded" style="max-height: 90vh;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-body')
    <script>
        let editId = null;
        let editMode = false;

        $(document).on('click', '.img-preview', function() {
            $('#previewImage').attr('src', $(this).data('image'));
            $('#imagePreviewModal').modal('show');
        });

        $('.btnAddGallery').on('click', function() {
            editId = null;
            editMode = false;
            $('#galleryForm')[0].reset();
            $('#galleryModalLabel').text('Add New Gallery');
            $('#formMethod').remove();
            $('#galleryForm').attr('action', '/galleries');
            $('#manageGalleryModal').modal('show');
        });

        $('.btnEditGallery').on('click', function() {
            const id = $(this).data('id');
            editId = id;
            editMode = true;
            $('#galleryModalLabel').text('Edit Gallery');

            $.get(`/galleries/${id}`, function(data) {
                $('#galleryName').val(data.name);
                $('#formMethod').val('PUT');
                $('#galleryForm').attr('action', `/galleries/${id}`);
                $('#manageGalleryModal').modal('show');
            });
        });

        $('#galleryForm').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = $(this).attr('action');

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    alert(res.message || 'Gallery saved successfully.');
                    $('#manageGalleryModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON?.message || 'Failed to save gallery.');
                }
            });
        });

        $('.btnDeleteGallery').on('click', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this gallery?')) {
                $.ajax({
                    url: `/galleries/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        alert(res.message || 'Gallery deleted.');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON?.message || 'Error deleting gallery.');
                    }
                });
            }
        });
    </script>
@endsection
