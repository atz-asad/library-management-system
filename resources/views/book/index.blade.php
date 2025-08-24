@extends('layouts.app')

@section('main')
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="page-title">All Books</h3>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
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
                      <th>Title</th>
                      <th>Author</th>
                      <th>Copy</th>
                      <th>ISBN</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ( $books  as $books )
                    <tr style="vertical-align: middle">
                      <td>{{ $loop -> iteration }}</td>
                      <td>
                        <img style="height: 50px;width: 56px;object-fit:cover;"  src="{{ URL::to('media/books/' . $books -> cover )}}" alt="{{ $books -> title }}">

                        {{ $books -> title }}
                        
                      </td>
                      <td>{{ $books -> author }}</td>
                      <td>{{ $books -> copy }}</td>
                      <td>{{ $books -> isbn }}</td>
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
