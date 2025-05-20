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


        <section class="section">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dummy Text</h4>
                </div>
                <div class="card-body">

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis tincidunt tempus. Duis vitae
                        facilisis enim, at rutrum lacus. Nam at nisl ut ex egestas placerat sodales id quam. Aenean sit amet
                        nibh quis lacus pellentesque venenatis vitae at justo. Orci varius natoque penatibus et magnis dis
                        parturient montes, nascetur ridiculus mus. Suspendisse venenatis tincidunt odio ut rutrum. Maecenas
                        ut urna venenatis, dapibus tortor sed, ultrices justo. Phasellus scelerisque, nibh quis gravida
                        venenatis, nibh mi lacinia est, et porta purus nisi eget nibh. Fusce pretium vestibulum sagittis.
                        Donec sodales velit cursus convallis sollicitudin. Nunc vel scelerisque elit, eget facilisis tellus.
                        Donec id molestie ipsum. Nunc tincidunt tellus sed felis vulputate euismod.
                    </p>
                    <p>
                        Proin accumsan nec arcu sit amet volutpat. Proin non risus luctus, tempus quam quis, volutpat orci.
                        Phasellus commodo arcu dui, ut convallis quam sodales maximus. Aenean sollicitudin massa a quam
                        fermentum, et efficitur metus convallis. Curabitur nec laoreet ipsum, eu congue sem. Nunc
                        pellentesque quis erat at gravida. Vestibulum dapibus efficitur felis, vel luctus libero congue
                        eget. Donec mollis pellentesque arcu, eu commodo nunc porta sit amet. In commodo augue id mauris
                        tempor, sed dignissim nulla facilisis. Ut non mattis justo, ut placerat justo. Vestibulum
                        scelerisque cursus facilisis. Suspendisse velit justo, scelerisque ac ultrices eu, consectetur ac
                        odio.
                    </p>
                    <p>
                        In pharetra quam vel lobortis fermentum. Nulla vel risus ut sapien porttitor volutpat eu ac lorem.
                        Vestibulum porta elit magna, ut ultrices sem fermentum ut. Vestibulum blandit eros ut imperdiet
                        porttitor. Pellentesque tempus nunc sed augue auctor eleifend. Sed nisi sem, lobortis eget faucibus
                        placerat, hendrerit vitae elit. Vestibulum elit orci, pretium vel libero at, imperdiet congue
                        lectus. Praesent rutrum id turpis non aliquam. Cras dignissim, metus vitae aliquam faucibus, elit
                        augue dignissim nulla, bibendum consectetur leo libero a tortor. Vestibulum non tincidunt nibh. Ut
                        imperdiet elit vel vehicula ultricies. Nulla maximus justo sit amet fringilla laoreet. Aliquam
                        malesuada diam in augue mattis aliquam. Pellentesque id eros dignissim, dapibus sem ac, molestie
                        dolor. Mauris purus lacus, tempor sit amet vestibulum vitae, ultrices eu urna.
                    </p>
                </div>
            </div>

            <!-- Button trigger for Disabled Backdrop -->
            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#backdrop">
                Launch Modal
            </button>

            <!--Disabled Backdrop Modal -->
            <div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4"
                data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h5 class="modal-title white" id="myModalLabel160">
                                Success Modal
                                {{-- danger,info,warning,dark --}}
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">

                            Tart lemon drops macaroon oat cake chocolate
                            toffee chocolate bar icing. Pudding jelly
                            beans carrot cake pastry gummies cheesecake
                            lollipop. I love cookie lollipop cake I love
                            sweet gummi bears cupcake dessert.

                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Primary
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                    <a class="dropdown-item" href="#">Option 1</a>
                                    <a class="dropdown-item" href="#">Option 2</a>
                                    <a class="dropdown-item" href="#">Option 3</a>
                                </div>
                            </div>

                            <img src="./assets/compiled/svg/ball-triangle.svg" class="me-4" style="width: 3rem"
                                alt="audio" />


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Accept</span>
                            </button>
                        </div>
                    </div>


                </div>
            </div>


        </section>

        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Usage</h4>
                        </div>
                        <div class="card-body">
                            <p><code>flatpickr</code> without any config</p>
                            <input type="date" class="form-control mb-3 flatpickr-no-config"
                                placeholder="Select date.." />

                            <p>Always-open date picker</p>
                            <input type="date" class="form-control flatpickr-always-open" placeholder="Select date.." />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Date Range</h4>
                        </div>
                        <div class="card-body">
                            <p>You can choose the start date and the end date</p>
                            <input type="date" class="form-control flatpickr-range mb-3" placeholder="Select date.." />
                            <p>Preloaded date ranges</p>
                            <input type="date" class="form-control flatpickr-range-preloaded"
                                placeholder="Select date.." />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Time Picker</h4>
                        </div>
                        <div class="card-body">
                            <p>24-hour time picker</p>
                            <input type="date" class="form-control flatpickr-time-picker-24h"
                                placeholder="Select time.." />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="col-12 col-md-4">
            <button
              id="bottom-right-toast"
              class="btn btn-outline-primary btn-block btn-lg"
            >
              Bottom Right
            </button>
          </div>
    </div>


    <script>
        document.getElementById("bottom-right-toast").addEventListener("click", () => {
            Toastify({
                text: "This is toast in bottom right",
                duration: 5000,
                close: true,
                gravity: "bottom",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast()
        })
    </script>
@endsection
