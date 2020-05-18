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
              <h2 class="card-title">Purchase List</h2>
              <a href="{{route('purchase.create')}}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-plus-circle">Add Purchase</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Product</th>
                  <th>Supplier</th>
                  <th>Category</th>
                  <th>Purchase No</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Buying Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
           
                <tbody>
                @foreach($purchases as $key=>$purchase)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$purchase->product->name}}</td>
                  <td>{{$purchase->supplier->name}}</td>
                  <td>{{$purchase->category->name}}</td>
                  <td>{{$purchase->purchase_no}}</td>
                  <td>{{$purchase->buying_quantity}} {{ $purchase->product->unit->name }}</td>
                  <td>{{$purchase->unit_price}}</td>
                  <td>{{$purchase->buying_price}}</td>
                  <td>
                    @if($purchase->status == 0)
                      <span class="badge badge-danger">pending</span>
                    @else
                    <span class="badge badge-success">approved</span>
                    @endif
                  </td>
                 <td>
                    <a href="{{ route('purchase.approve',$purchase->id) }}" id="approveBtn" class="btn btn-sm btn-success" href=""><i class="fa fa-check-circle"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>

                <tfoot>
                  <tr>
                    <th>SL</th>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Category</th>
                    <th>Purchase No</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Buying Price</th>
                    <th>Status</th>
                    <th>Action</th>
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


  <script type="text/javascript">
      
      $(document).on('click','#approveBtn',function(e){
        e.preventDefault()
        var link = $(this).attr('href')
          Swal.fire({
            title: 'Are you sure?',
            text: "Approve this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Approve it!'
          }).then((result) => {
            if (result.value) {
              window.location.href = link
              Swal.fire(
                'Approved!',
                'Your file has been Approve.',
                'success'
              )
            }
          })

      })

    </script>


@endsection