@extends('adminlte::page')

@section('title', 'Salary Certificate | Ocp Employers')

@section('content_header')
    
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card my-5 shadow-lg border-0 animate__animated animate__fadeInUp">
                    <div class="card-header bg-success text-white text-center py-4">
                        <h3 class="font-weight-bold mb-1">Salary Certificate</h3>
                        <p class="mb-0">{{ $employe->fullname }}</p>
                        <small>Registration Number: {{ $employe->registration_number }}</small>
                    </div>

                    <div class="card-body p-5">
                        <div class="certificate-content">
                            <p class="text-center lead mb-4">
                                This is to certify that <strong>{{ $employe->fullname }}</strong>, holding Registration Number 
                                <strong>{{ $employe->registration_number }}</strong>, is currently employed at 
                                <strong>OCP</strong> and earns a monthly salary of <strong>{{ $employe->salary }} ______________MAD</strong>.
                            </p>

                            <div class="salary-details mb-5">
                                <h5 class="font-weight-bold mb-3 text-center">Salary Breakdown</h5>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <table class="table table-borderless table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Basic Salary:</strong></td>
                                                    <td>{{ $employe->basic_salary }} MAD</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Housing Allowance:</strong></td>
                                                    <td>{{ $employe->housing_allowance }} MAD</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Transport Allowance:</strong></td>
                                                    <td>{{ $employe->transport_allowance }} MAD</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Other Allowances:</strong></td>
                                                    <td>{{ $employe->other_allowances }} MAD</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <p class="text-center">
                                This certificate is issued upon the employee's request for purposes of employment, bank loan applications, or other personal matters.
                            </p>

                            <div class="text-right mt-4">
                                <button onclick="window.print()" class="btn btn-success btn-lg shadow-sm">Print Certificate</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center py-4 bg-light">
                        <p class="mb-0">
                            <strong>OCP Employers</strong><br>
                            Official Seal & Stamp
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-color: #f8f9fa;
        }


        @media print {
            .btn {
                display: none;
            }

            .card {
                box-shadow: none;
                border: none;
            }
        }
        
        .certificate-content p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .salary-details {
            border: 1px solid #dee2e6;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-borderless td {
            padding: 0.75rem;
        }

        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1.25rem;
        }

        .shadow-lg {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
