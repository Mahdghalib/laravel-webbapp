@extends('adminlte::page')

@section('title', 'Employee Space | OCP Employers')

@section('content_header')
   
@endsection

@section('content')
    <div class="container">
        @include('layouts.alert')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 my-5 rounded-lg">
                    <div class="card-header bg-gradient-success text-white text-center py-4">
                        <h3 class="font-weight-bold text-uppercase">{{ $employe->fullname }}</h3>
                    </div>

                    <div class="text-center my-4">
                        <a href="{{ route('vacation.request', $employe->registration_number) }}" class="btn btn-outline-success mx-2 btn-lg">
                            <i class="fas fa-plane-departure"></i> Vacation Request
                        </a>
                        <a href="{{ route('certificate.request', $employe->registration_number) }}" class="btn btn-outline-success mx-2 btn-lg">
                            <i class="fas fa-certificate"></i> Work Certificate
                        </a>
                    </div>

                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="registration_number" class="font-weight-bold">Registration Number</label>
                                    <input type="text" disabled class="form-control form-control-lg bg-light" name="registration_number" value="{{ $employe->registration_number }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="fullname" class="font-weight-bold">Full Name</label>
                                    <input type="text" disabled class="form-control form-control-lg bg-light" name="fullname" value="{{ $employe->fullname }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="departement" class="font-weight-bold">Department</label>
                                    <input type="text" disabled class="form-control form-control-lg bg-light" name="departement" value="{{ $employe->departement }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="hire_date" class="font-weight-bold">Hire Date</label>
                                    <input type="date" disabled class="form-control form-control-lg bg-light" name="hire_date" value="{{ $employe->hire_date }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="phone" class="font-weight-bold">Phone</label>
                                    <input type="tel" disabled class="form-control form-control-lg bg-light" name="phone" value="{{ $employe->phone }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="speciality" class="font-weight-bold">Speciality</label>
                                    <input type="text" disabled class="form-control form-control-lg bg-light" name="speciality" value="{{ $employe->speciality }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="address" class="font-weight-bold">Address</label>
                                    <input type="text" disabled class="form-control form-control-lg bg-light" name="address" value="{{ $employe->address }}">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="city" class="font-weight-bold">City</label>
                                    <input type="text" disabled class="form-control form-control-lg bg-light" name="city" value="{{ $employe->city }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

