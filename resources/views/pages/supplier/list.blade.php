@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
  
<section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Supplier List</h2>
              <a href="{{route('supplier.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Supplier</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  {{-- <th>Action</th> --}}
                </tr>
                </thead>
                <tbody>
                  @foreach($suppliers as $key=>$supplier)
                <tr>

                  <td>{{$key + 1}}</td>
                  <td>{{$supplier->name}}
                  </td>
                  <td>{{$supplier->mobile}}</td>
                  <td> {{$supplier->address}}</td>
                  {{-- <td>
                    <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                    <a href="" id="delete" class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a>
                  </td> --}}
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                 {{--  <th>Action</th> --}}
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
          <!-- /.Left col -->

        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection