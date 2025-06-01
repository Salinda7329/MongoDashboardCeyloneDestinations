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
                            <button type="button" id="6+" class="btn btn-outline-primary block btnAddDestination"
                                data-bs-toggle="modal" data-bs-target="#manageDestinationModal">
                                Add a Destination
                            </button>
                        </div>

                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($destinations->isEmpty())
                                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                                        <h4 class="alert-heading">No Destinations Found</h4>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinations as $destination)
                                                <!-- <div>{{ $destination }}</div> -->
                                                <tr>
                                                    <td>{{ (string) $destination['_id'] }}</td>
                                                    <td>{{ $destination['destinationTitle'] }}</td>
                                                    <td>{{ $destination['description'] }}</td>
                                                    <td>
                                                        <a href="{{ asset($destination->imagePath) }}"
                                                            data-lightbox="destination-gallery"
                                                            data-title="{{ $destination['destinationTitle'] }}">
                                                            <img src="{{ asset($destination->imagePath) }}" width="100px"
                                                                height="100px" class="img-fluid img-thumbnail">
                                                        </a>

                                                    </td>

                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#"
                                                                class="btn btn-primary btn-icon btnEditDestination me-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#manageDestinationModal"
                                                                data-id="{{ (string) $destination['_id'] }}">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>

                                                            <a href="#"
                                                                class="btn btn-danger btn-icon btnDeleteDestination me-2"
                                                                data-id="{{ (string) $destination['_id'] }}">
                                                                <i class="bi bi-x-square"></i>
                                                            </a>
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

    {{-- Destination Modal --}}
    <div class="modal modal-lg fade text-left mt-3" id="manageDestinationModal" tabindex="-1" role="dialog"
        aria-labelledby="addSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="DestinationModalLabel"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" class="form form-horizontal" id="destinationAddForm" enctype="multipart/form-data">
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

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 90vw;">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body d-flex justify-content-center align-items-center p-0"
                    style="background: rgba(0,0,0,0.85);">
                    <img src="" id="previewImage" class="img-fluid rounded"
                        style="max-height: 90vh; max-width: 100%;">
                </div>
            </div>
        </div>
    </div>
    {{-- End of Image preview modal --}}

@endsection

@section('after-body')
    <script>
        // Show image in modal preview when clicked
        $(document).on('click', '.img-preview', function() {
            const imageUrl = $(this).data('image');
            $('#previewImage').attr('src', imageUrl);
            $('#imagePreviewModal').modal('show');
        });


        let editMode = false;
        let editId = null;

        // When "Add a Destination" button is clicked
        $(document).on('click', '.btnAddDestination', function() {
            editMode = false;
            editId = null;
            $('#DestinationModalLabel').text('Add New Destination');
            $('#destinationAddForm').trigger('reset');
            $('#destinationAddForm').attr('action', '/create_destination');
            $('#destinationAddForm input[name="_method"]').remove(); // Ensure no method override
            $('#imagePath').prop('required', true); // Required on create
        });

        // When "Edit" button is clicked
        $(document).on('click', '.btnEditDestination', function() {
            editMode = true;
            editId = $(this).data('id');
            $('#DestinationModalLabel').text('Edit Destination');

            $.ajax({
                url: `/get_destination/${editId}`, // You implement this in controller
                type: 'GET',
                success: function(data) {
                    $('#destinationTitle').val(data.destinationTitle);
                    $('#description').val(data.description);
                    $('#imagePath').prop('required', false);

                    $('#destinationAddForm').attr('action', `/update_destination/${editId}`);
                    if (!$('#destinationAddForm input[name="_method"]').length) {
                        $('#destinationAddForm').append(
                            '<input type="hidden" name="_method" value="PUT">');
                    }
                    $('#manageDestinationModal').modal('show');
                },
                error: function(xhr) {
                    alert('Failed to fetch destination data.');
                }
            });
        });

        // Submit the form via AJAX
        $('#destinationAddForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this)[0];
            const formData = new FormData(form);
            const actionUrl = $(this).attr('action');
            const method = editMode ? 'POST' : 'POST'; // PUT is spoofed using _method

            $.ajax({
                url: actionUrl,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    $('#manageDestinationModal').modal('hide');
                    alert(res.message || 'Destination saved successfully!');
                    location.reload(); // Refresh to update table
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    if (response && response.message) {
                        alert(response.message);
                    } else {
                        alert('An error occurred while submitting the form.');
                    }
                }
            });
        });

        // When "Delete" button is clicked
        $(document).on('click', '.btnDeleteDestination', function() {
            const id = $(this).data('id');

            if (confirm('Are you sure you want to delete this destination? This action cannot be undone.')) {
                $.ajax({
                    url: `/delete_destination/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        alert(res.message || 'Destination deleted successfully.');
                        location.reload();
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;
                        if (response && response.message) {
                            alert(response.message);
                        } else {
                            alert('An error occurred while deleting the destination.');
                        }
                    }
                });
            }
        });
    </script>
@endsection
