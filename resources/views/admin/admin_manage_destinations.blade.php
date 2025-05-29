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
                            <h3 class="card-title">New Signups</h3>
                        </div>
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
                                    <!-- <div>{{$destination}}</div> -->
                                    <tr>
                                    <td>{{ (string) $destination['_id'] }}</td>
                                        <td>{{ $destination['destinationTitle'] }}</td>
                                        <td>{{ $destination['description'] }}</td>
                                        <td><img src="{{ $destination['imagePath'] }}" alt="Image" width="100"></td>
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

<script>
</script>
@endsection

@section('after-body')
@endsection
