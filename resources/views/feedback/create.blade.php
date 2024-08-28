@extends('layouts.app')

@section('title', 'Submit Feedback')

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <div class="row bg-success text-white py-5 mb-4">
        <div class="col-md-10 mx-auto text-center">
            <h1 class="display-4 mb-3">We Value Your Feedback</h1>
            <p class="lead mb-4">Your opinion is important to us. Please let us know how we’re doing and how we can improve.</p>
            <img src="/images/feed.avif" class="img-fluid rounded-lg shadow-lg" alt="Feedback Hero Image">
        </div>
    </div>

    <!-- Feedback Form Card -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg transition-transform transform-gpu hover:scale-105">
                <div class="card-header bg-success text-white text-center">
                    <h3 class="mb-0">Submit Your Feedback</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Feedback Form -->
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf

                        <!-- Client Name Input -->
                        <div class="mb-3">
                            <label for="client" class="form-label">Your Name <span class="text-danger">*</span></label>
                            <input type="text" name="client" id="client" class="form-control @error('client') is-invalid @enderror" placeholder="Enter your name" required>
                            @error('client')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Quality Rating Input -->
                        <div class="mb-3">
                            <label for="quality_rating" class="form-label">Quality Rating <span class="text-danger">*</span></label>
                            <select name="quality_rating" id="quality_rating" class="form-control @error('quality_rating') is-invalid @enderror" required>
                                <option value="" disabled selected>Select Rating</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                            @error('quality_rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Time of Treatment Input -->
                        <div class="mb-3">
                            <label for="time_of_treatment" class="form-label">Time of Treatment <span class="text-danger">*</span></label>
                            <input type="text" name="time_of_treatment" id="time_of_treatment" class="form-control @error('time_of_treatment') is-invalid @enderror" placeholder="Enter the time taken" required>
                            @error('time_of_treatment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Comportment Input -->
                        <div class="mb-3">
                            <label for="comportment" class="form-label">Comportment <span class="text-danger">*</span></label>
                            <input type="text" name="comportment" id="comportment" class="form-control @error('comportment') is-invalid @enderror" placeholder="Describe the comportment" required>
                            @error('comportment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="comments" class="form-label">Additional Comments</label>
                            <textarea name="comments" id="comments" class="form-control @error('comments') is-invalid @enderror" rows="4" placeholder="Share any additional feedback"></textarea>
                            @error('comments')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       
                        <button type="submit" class="btn btn-success btn-lg w-100">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for Animations -->
<style>
    .transition-transform {
        transition: transform 0.3s ease-in-out;
    }
    .transform-gpu {
        transform: translateZ(0);
    }
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
    .card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 15px;
    }
    .card-header {
        border-bottom: 0;
    }
    .card-body {
        padding: 2rem;
    }
    .form-control {
        border-radius: 10px;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 10px;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
@endsection




