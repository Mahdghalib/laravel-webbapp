@extends('adminlte::page')

@section('title', 'Update Employee | OCP Employers')

@section('content_header')

@endsection

@section('content')
    <div class="container">
        @include('layouts.alert')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-lg border-0 my-5">
                    <div class="card-header bg-gradient-success text-white text-center">
                        <h4 class="font-weight-bold text-uppercase">Edit Employee Details</h4>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('employes.update', $employe->registration_number) }}" method="POST" class="mt-3">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-4">
                                <label for="registration_number" class="font-weight-bold">Registration Number</label>
                                <input type="text" class="form-control form-control-lg"
                                       name="registration_number" placeholder="Registration Number"
                                       value="{{ old('registration_number', $employe->registration_number) }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="fullname" class="font-weight-bold">Full Name</label>
                                <input type="text" class="form-control form-control-lg"
                                       name="fullname" placeholder="Full Name"
                                       value="{{ old('fullname', $employe->fullname) }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="departement" class="font-weight-bold">Department</label>
                                <input type="text" class="form-control form-control-lg"
                                       name="departement" placeholder="Department"
                                       value="{{ old('departement', $employe->departement) }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="hire_date" class="font-weight-bold">Hire Date</label>
                                <input type="date" class="form-control form-control-lg"
                                       name="hire_date" value="{{ old('hire_date', $employe->hire_date) }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="phone" class="font-weight-bold">Phone</label>
                                <input type="tel" class="form-control form-control-lg"
                                       name="phone" placeholder="Phone"
                                       value="{{ old('phone', $employe->phone) }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="speciality" class="font-weight-bold">Speciality</label>
                                <input type="text" class="form-control form-control-lg"
                                       name="speciality" placeholder="Speciality"
                                       value="{{ old('speciality', $employe->speciality) }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="address" class="font-weight-bold">Address</label>
                                <input type="text" class="form-control form-control-lg"
                                       name="address" placeholder="Address"
                                       value="{{ old('address', $employe->address) }}">
                            </div>

                            <div class="form-group mb-4">
                                <label for="city" class="font-weight-bold">City</label>
                                <input type="text" class="form-control form-control-lg"
                                       name="city" placeholder="City"
                                       value="{{ old('city', $employe->city) }}">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-lg btn-success px-5">
                                    <i class="fas fa-save"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
