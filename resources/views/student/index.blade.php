@extends('layouts.app')

@section('main')
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="page-title">All Student</h3>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      <a href="{{ route('student.create') }}" class="btn btn-primary">Add New Student</a>
      <br>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="datatable table table-stripped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>student_id</th>
                      <th>photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($students  as $student )  
                      <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $student -> name }}</td>
                        <td>{{ $student -> email }}</td>
                        <td>{{ $student -> student_id }}</td>
                        <td>
                          <div>
                            <img style="height: 50px;width: 56px;object-fit:cover;bor;border-radius: 5px;" src="{{ asset('media/student/' . $student->photo) }}" alt="{{ $student->name }}">
                          </div>
                        </td>
                        <td>
                          <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                          <a class="btn btn-sm btn-warning" href=""><i class="fa fa-edit"></i></a>
                          <a class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
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
  </div>
  <!-- /Page Wrapper -->
@endsection
