@extends('adminlte::page')

@section('plugins.Datatables', true) 
@section('plugins.DatatablesPlugins', true)

@section('title', 'List of Employees | OCP Employers')

@section('content_header')
  
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-light shadow-sm">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">List of Employes</h4>
                        <a href="{{ route('employes.create') }}" class="btn btn-success btn-sm rounded-pill">
                            <i class="fas fa-plus"></i> Add Employe
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead class="bg-success text-white">
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                        <th>Hired Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employes as $key => $employe)
                                        <tr class="animate__animated animate__fadeIn animate__delay-1s">
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $employe->fullname }}</td>
                                            <td>{{ $employe->departement }}</td>
                                            <td>{{ $employe->hire_date }}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <a href="{{ route('employes.show', $employe->registration_number) }}" class="btn btn-sm btn-success mx-2 rounded-pill" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('employes.edit', $employe->registration_number) }}" class="btn btn-sm btn-primary mx-2 rounded-pill" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form id="deleteForm-{{ $employe->registration_number }}" action="{{ route('employes.destroy', $employe->registration_number) }}" method="post" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" onclick="confirmDelete('{{ $employe->registration_number }}')" class="btn btn-sm btn-danger mx-2 rounded-pill" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf', 'print', 'colvis'
            ]
        });
    });

    function confirmDelete(registrationNumber) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + registrationNumber).submit();
            }
        })
    }
</script>

@if(session()->has('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session()->get('success') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif    
@endsection

@push('css')
<style>
    .card {
        border-radius: 15px;
    }

    .card-header {
        border-bottom: 1px solid #dee2e6;
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        border-radius: 0 0 15px 15px;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .btn {
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .btn:hover {
        background-color: gray;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>
@endpush

