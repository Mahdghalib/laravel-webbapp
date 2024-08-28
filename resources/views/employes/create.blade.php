@extends('adminlte::page')

@section('title')
    Employe Space | OCP Employers
@endsection

@section('content_header')
    
@endsection

@section('content')
    <div class="container mt-4">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card my-3 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <div class="text-center text-uppercase">
                            <h4>Add Employe</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employes.store') }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="registration_number">Registration Number</label>
                                <input type="text" class="form-control" name="registration_number" placeholder="Registration Number" value="{{ old('registration_number') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="departement">Department</label>
                                <input type="text" class="form-control" name="departement" placeholder="Department" value="{{ old('departement') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="hire_date">Hire Date</label>
                                <input type="date" class="form-control" name="hire_date" placeholder="Hire Date" value="{{ old('hire_date') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="speciality">Speciality</label>
                                <input type="text" class="form-control" name="speciality" placeholder="Speciality" value="{{ old('speciality') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="{{ old('city') }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
