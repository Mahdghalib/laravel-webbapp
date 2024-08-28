@extends('adminlte::page')

@section('title', 'Client Feedback')

@section('content_header')

   
@endsection

@section('content')
<div class="container mt-4">
    <div class="row my-5">
        <div class="col-md-12">
            <div class="card border-light shadow-lg">
                <div class="card-header bg-success text-white rounded-top">
                    <h3 class="text-center mb-0">Client Feedback</h3>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="feedbackTable" class="table table-bordered table-striped">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th>Client</th>
                                    <th>Quality Rating</th>
                                    <th>Time of Treatment</th>
                                    <th>Comportment</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feedbacks as $feedback)
                                    <tr class="animate__animated animate__fadeIn animate__delay-1s">
                                        <td>{{ $feedback->client }}</td>
                                        <td>
                                            @for ($i = 1; $i <= $feedback->quality_rating; $i++)
                                                <span class="text-warning">&#9733;</span> <!-- Star character -->
                                            @endfor
                                            @for ($i = $feedback->quality_rating + 1; $i <= 5; $i++)
                                                <span class="text-muted">&#9734;</span> <!-- Empty star character -->
                                            @endfor
                                        </td>
                                        <td>{{ $feedback->time_of_treatment }}</td>
                                        <td>{{ $feedback->comportment }}</td>
                                        <td>{{ $feedback->comments }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button onclick="printTable()" class="btn btn-success btn-lg rounded-pill">
                        Print Feedback
                    </button>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .hover-bg-light tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.3s ease;
    }

    .card {
        border-radius: 15px;
    }

    .card-header {
        border-bottom: 1px solid #dee2e6;
    }

    .card-footer {
        border-top: 1px solid #dee2e6;
    }
</style>


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"></script>
<script>
    function printTable() {
        var originalContents = document.body.innerHTML;
        var printContents = document.getElementById('feedbackTable').outerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

</script>
@section('js')
<script>
  

@endpush




