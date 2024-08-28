@extends('adminlte::page')

@section('title', 'Vacation Request')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
         
            <div class="card shadow-lg border-0 rounded-lg">
            
                <div class="card-header bg-gradient-success text-white text-center py-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h4 class="font-weight-bold mb-0">Vacation Request Form</h4>
                </div>
      
                <div class="card-body p-5" style="background-color: #f9f9f9;">
                  
                    <p class="lead mb-4">
                        <strong>{{ $employe->fullname }}</strong> from the <strong>{{ $employe->departement }}</strong> department is currently employed in the following position:
                    </p>
                  
                    <hr class="my-4" style="border-top: 2px solid #28a745;">
                  
                    <p class="lead mb-4">
                        The employee is requesting a vacation starting from: 
                        <strong style="font-style: italic;">___________________</strong>
                    </p>
                    <p class="lead mb-4">
                        And ending on: 
                        <strong style="font-style: italic;">______________________</strong>
                    </p>
                    
                    <div class="text-center mt-5">
                        <div class="signature-box">
                            <p class="lead">
                                <span class="d-block mb-2">Signature:</span>
                                <span class="d-block" style="padding: 15px; border-bottom: 1px solid #ddd;">___________________</span>
                            </p>
                            <p class="lead mt-4">
                                <span class="d-block mb-2">Date:</span>
                                <span class="d-block" style="padding: 15px; border-bottom: 1px solid #ddd;">______________________</span>
                            </p>
                        </div>
                    </div>
                </div>
              
                <div class="card-footer bg-light text-center py-3" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <button class="btn btn-success" onclick="window.print()">Print Vacation Request</button>
                    <small class="d-block text-muted mt-2">OCP Employers - Employee Vacation Request</small>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .bg-gradient-success {
        background: linear-gradient(90deg, #28a745 0%, #63d467 100%);
    }

    .signature-box {
        padding-top: 30px;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    @media print {
        body * {
            visibility: hidden;
        }
        .container, .container * {
            visibility: visible;
        }
        .container {
            position: absolute;
            top: 0;
            left: 0;
        }
        .card-footer {
            display: none;
        }
    }
</style>
@endsection


