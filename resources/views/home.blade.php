@extends('adminlte::page')

@section('title', 'OCP Dashboard')

@section('content_header')
    <h1 class="text-gray font-weight-bold">Dashboard</h1>
@endsection

@section('content')
<div class="container">
    <div class="row my-4">
       
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-success shadow-lg rounded-lg hover-animate">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-users fa-3x text-success"></i>
                    </div>
                    <div>
                        <h3 class="font-weight-bold text-dark">{{ $employeeCount }}</h3>
                        <p class="mb-0 text-dark">Employees</p>
                    </div>
                </div>
                <div class="card-footer bg-success text-white text-center">
                    <a href="{{ url('admin/employes') }}" class="text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

    
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-success shadow-lg rounded-lg hover-animate">
                <div class="card-body d-flex align-items-center">
                    <div class="mr-3">
                        <i class="fas fa-comments fa-3x text-success"></i>
                    </div>
                    <div>
                        <h3 class="font-weight-bold text-dark">{{ $feedbackCount }}</h3>
                        <p class="mb-0 text-dark">Client Feedback</p>
                    </div>
                </div>
                <div class="card-footer bg-success text-white text-center">
                    <a href="{{ url('admin/feedback') }}" class="text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-4">
    
        <div class="col-md-6 mb-4">
            <div class="card border-info shadow-lg rounded-lg hover-animate">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">Client Feedback Trends</h3>
                </div>
                <div class="card-body p-0">
                    <canvas id="feedbackTrendsChart"></canvas>
                </div>
            </div>
        </div>

        
        <div class="col-md-6 mb-4">
            <div class="card border-warning shadow-lg rounded-lg hover-animate">
                <div class="card-header bg-warning text-white">
                    <h3 class="card-title">Quality Rating Distribution</h3>
                </div>
                <div class="card-body p-0">
                    <canvas id="qualityRatingChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Feedback Trends with Chart
    const feedbackTrendsCtx = document.getElementById('feedbackTrendsChart').getContext('2d');
    const feedbackTrendsChart = new Chart(feedbackTrendsCtx, {
        type: 'line',
        data: {
            labels: @json($feedbackTrends['dates']),
            datasets: [{
                label: 'Feedback Submitted',
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: 'rgba(0, 123, 255, 1)',
                data: @json($feedbackTrends['counts'])
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { title: { display: true, text: 'Month' }, grid: { display: false } },
                y: { title: { display: true, text: 'Feedback Count' }, grid: { borderDash: [5, 5] } }
            }
        }
    });

    
    const qualityRatingCtx = document.getElementById('qualityRatingChart').getContext('2d');
    const qualityRatingChart = new Chart(qualityRatingCtx, {
        type: 'pie',
        data: {
            labels: ['Good', 'Average', 'Poor'],
            datasets: [{
                label: 'Quality Ratings',
                data: @json($qualityRatings['counts']),
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            let dataset = tooltipItem.dataset;
                            let value = dataset.data[tooltipItem.dataIndex];
                            return dataset.label + ': ' + value.toFixed(2) + '%';
                        }
                    }
                }
            }
        }
    });
</script>
@endpush

@push('css')
<style>
    body {
        background-color: #343a40;  
        color: #ffffff; 
    }

    .container {
        background-color: #ffffff; 
        padding: 20px;
        border-radius: 8px; 
    }

    .card {
        border-radius: 12px;
        overflow: hidden;
    }

    .card-body {
        background: linear-gradient(135deg, #ffffff, #e0e0e0); 
        color: #333;
    }

    .card-footer {
        background-color: #f0f0f0;
        color: #333; 
    }

    .card-header {
        border-bottom: 2px solid #dee2e6;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .hover-animate {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-animate:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .text-dark {
        color: #333 !important; 
    }
</style>
@endpush









