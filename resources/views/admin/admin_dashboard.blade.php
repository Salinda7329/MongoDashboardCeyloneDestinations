@extends('admin.layout.admin_layout')

@section('page-title')
    Admin | Dashboard
@endsection

@push('styles')
    <style>
        .dashboard-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .dashboard-card {
            flex: 0 0 250px;
            background: linear-gradient(to right, #06b6d4, #3b82f6);
            color: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .dashboard-card:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .chart-container {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
@endpush

@section('main-content')
    <h3 class="mb-2 text-3xl font-bold text-gray-800 text-center">Overview</h3>

    <!-- Card Row -->
    <div class="dashboard-container mt-2 mb-4">
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-1">
            <div class="col">
                <!-- Destination Card -->
                 <div class="dashboard-card rounded-3 shadow-sm p-1 d-flex flex-column justify-content-center align-items-center h-100"
                    style="background: linear-gradient(to right, #3b82f6, #2563eb);">
                    <h6 class="text-xl font-semibold text-white">Destinations</h6>
                    <p class="text-4xl font-bold text-white">{{ $destinationCount }}</p>
                </div>
            </div>
            <div class="col">
                <!-- Gallery Card -->
                 <div class="dashboard-card rounded-3 shadow-sm p-1 d-flex flex-column justify-content-center align-items-center h-100"
                    style="background: linear-gradient(to right, #ec4899, #ef4444);">
                    <h6 class="text-xl font-semibold text-white">Galleries</h6>
                    <p class="text-4xl font-bold text-white">{{ $galleryCount }}</p>
                </div>
            </div>
            <div class="col">
                <!-- User Card -->
                <div class="dashboard-card rounded-3 shadow-sm p-1 d-flex flex-column justify-content-center align-items-center h-100"
                    style="background: linear-gradient(to right, #10b981, #059669);">
                    <h6 class="text-xl font-semibold text-white">Total Users</h6>
                    <p class="text-4xl font-bold text-white">{{ $userCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Full-Width Chart Section -->
    <div class="chart-container">
        <h3 class="text-lg font-semibold mb-2 mt-2 text-gray-700 text-center">Users by Role</h3>
        <canvas id="roleChart" height="100"></canvas>
    </div>
@endsection

@section('after-body')
    <script src="{{ asset('assets/extensions/chart.js/chart.cjs') }}"></script>
    <script>
        const ctx = document.getElementById('roleChart').getContext('2d');
        const roleChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($roleLabels) !!},
                datasets: [{
                    label: 'Users by Role',
                    data: {!! json_encode($roleData) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection


