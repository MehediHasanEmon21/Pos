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
              <h3>Invoice# {{ $invoice->invoice_no }}</h3>
              <a href="{{route('pending.invoice')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Pending Invoice List</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table width="100%">
                <tbody>
                  <tr style="line-height: 2.5">
                    <td width="15%"><strong>Costomer Info</strong></td>
                    <td width="25%">Name : <strong>{{ $invoice->payment->customer->name }}</strong></td>
                    <td width="25%">Mobile : <strong>{{ $invoice->payment->customer->mobile }}</td>
                    <td width="35%">Address : <strong>{{ $invoice->payment->customer->address }}</td>
                  </tr>
                  <tr>
                    <td width="15%"></td>
                    <td width="85%" colspan="3"> Description : <strong>{{ $invoice->description }}</td>
                  </tr>
                </tbody>
              </table>

              <br>
              
              <form method="post" action="{{ route('invoice.approve.done',$invoice->id) }}">
                @csrf
              <table border="1" width="100%">

                <thead>
                  <tr class="text-center">
                    <th>SL</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th style="background-color: #ddd">Current Stock</th>
                    <th>Selling Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                @php
                  $sum = 0;
                @endphp
                <tbody>
                  @foreach($invoice->invoiceDetails as $key=>$detail)
                  <tr class="text-center">
                    <input type="hidden" name="category_id[]" value="{{ $detail->category_id }}">
                    <input type="hidden" name="product_id[]" value="{{ $detail->product_id }}">
                    <input type="hidden" name="sellling_qty[{{ $detail->id }}]" value="{{ $detail->sellling_qty }}">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detail->category->name  }}</td>
                    <td>{{ $detail->product->name  }}</td>
                    <td style="background-color: #ddd">{{ $detail->product->quantity  }}</td>
                    <td>{{ $detail->sellling_qty  }}</td>
                    <td>{{ $detail->unit_price }}</td>
                    <td>{{ $detail->selling_price }}</td>
                  </tr>
                  @php
                    $sum += $detail->selling_price;
                  @endphp
                  @endforeach
                  <tr>
                    <td colspan="6" class="text-right"><strong>Subtotal</strong></td>
                    <td class="text-center">{{ $sum }}</td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-right"><strong>Discount</strong></td>
                    <td class="text-center">{{ $invoice->payment->discount_amount }}</td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-right"><strong>Grand Total</strong></td>
                    <td class="text-center">{{ $invoice->payment->total_amount }}</td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-right"><strong>Paid Amount</strong></td>
                    <td class="text-center">{{ $invoice->payment->paid_amount }}</td>
                  </tr>
                  <tr>
                    <td colspan="6" class="text-right"><strong>Due Amount</strong></td>
                    <td class="text-center">{{ $invoice->payment->due_amount }}</td>
                  </tr>
                </tbody>
                
              </table>
              <br>
              <div>
                <button class="btn btn-primary" type="submit">Approve Invoice</button>
              </div>
              </form>
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