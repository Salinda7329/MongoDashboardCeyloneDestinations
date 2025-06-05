@extends('admin.layout.admin_layout')

@section('page-title')
    Admin | Users
@endsection

@section('main-content')
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Manage Users</h3>
                        <button type="button" class="btn btn-outline-primary btnAddUser" data-bs-toggle="modal"
                            data-bs-target="#manageUserModal">
                            Add User
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($users->isEmpty())
                                <div class="alert alert-danger text-center">
                                    <h4>No Users Found</h4>
                                </div>
                            @else
                                <table class="table table-hover table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Email Verified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ (string) $user->_id }}</td> --}}
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role == 1 ? 'Admin' : 'User' }}</td>
                                                <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ $user->email_verified_at ? \Carbon\Carbon::parse($user->email_verified_at)->toDayDateTimeString() : 'Unverified' }}
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btnEditUser me-2"
                                                        data-id="{{ (string) $user->_id }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-danger btnDeleteUser"
                                                        data-id="{{ (string) $user->_id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
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
    </section>

    {{-- User Modal --}}
    <div class="modal fade" id="manageUserModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="userModalLabel"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg text-white"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" id="userName" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" id="userEmail" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Role</label>
                            <select name="role" id="userRole" class="form-control">
                                <option value="2">Sub Admin</option>
                                <option value="3">User</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="status" id="userStatus" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
@endsection

@section('after-body')
    <script>
        let editId = null;

        $('.btnAddUser').on('click', function() {
            editId = null;
            $('#userForm')[0].reset();
            $('#userModalLabel').text('Add New User');
            $('#formMethod').remove();
            $('#userForm').attr('action', '/create_user');
            $('#manageUserModal').modal('show');
        });

        $('.btnEditUser').on('click', function() {
            const id = $(this).data('id');
            editId = id;
            $('#userModalLabel').text('Edit User');

            $.get(`/get_user/${id}`, function(data) {
                $('#userName').val(data.name);
                $('#userEmail').val(data.email);
                $('#userRole').val(data.role);
                $('#userStatus').val(data.status);
                $('#formMethod').val('PUT');
                $('#userForm').attr('action', `/users/${id}`);
                $('#manageUserModal').modal('show');
            });
        });

        $('#userForm').on('submit', function(e) {
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
                    alert(res.message || 'User saved successfully.');
                    $('#manageUserModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON?.message || 'Failed to save user.');
                }
            });
        });

        $('.btnDeleteUser').on('click', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: `/users/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        alert(res.message || 'User deleted.');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON?.message || 'Error deleting user.');
                    }
                });
            }
        });
    </script>
@endsection
