@extends('components.mazer.layout')
@section('page-title')
    Dummy Page
@endsection

@section('custom-left-sidebar')
    @include('DAEEAdmin.layout.daee-admin-left-sidebar')
@endsection

@section('main-content')
    <div class="page-heading">

        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Vertical Layout with Navbar</h3>
                    <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <button id="basic2" class="btn btn-outline-primary btn-lg btn-block">
                            Basic Example
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('after-body')
    <script>
        document.getElementById("basic2").addEventListener("click", (e) => {
            Swal2.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong.☺",
                footer: "<a href>Why do I have this issue?</a>",
            })
        })
    </script>
@endsection
