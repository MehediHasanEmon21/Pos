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
              <h2 class="card-title">Invoice List</h2>
              <a href="{{route('invoice.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Invoice</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Customer Name</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
                </tr>
                </thead>
           
                <tbody>
                  @foreach($invoices as $key => $invoice)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$invoice->payment->customer->name}}</td>
                    <td>{{$invoice->invoice_no}}</td>
                    <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                    <td>{{$invoice->description}}</td>
                    <td>{{$invoice->payment->total_amount}}</td>
           
                  </tr>
                  @endforeach
                </tbody>

                <tfoot>
                  <tr>
                  <th>SL</th>
                  <th>Customer Name</th>
                  <th>Invoice No</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>
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