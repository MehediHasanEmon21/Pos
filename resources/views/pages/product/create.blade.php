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
              <h2 class="card-title">Add Product</h2>
              <a href="{{ route('product.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All User</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('product.store') }}" method="POST" id="myform">
                @csrf
             <div class="row">
              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>

              </div>

              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="name">Supplier</label>
                    <select class="form-control" name="supplier_id">
                      <option value="" selected="" disabled="" hidden>Select Supplier</option>
                      @foreach($suppliers as $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                      @endforeach
                    </select>
                </div>

              </div>

               <div class="col-md-6">
                
                <div class="form-group">
                    <label for="name">Category</label>
                    <select class="form-control" name="category_id">
                      <option value="" selected="" disabled="" hidden>Select Category</option>
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                </div>

              </div>


              <div class="col-md-6">
                
                <div class="form-group">
                  <label for="name">Unit</label>
                    <select class="form-control" name="unit_id">
                    <option value="" selected="" disabled="" hidden>Select Unit</option>
                      @foreach($units as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                      @endforeach
                    </select>
                </div>

              </div>

             

           



             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
          </form>
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
      

  $(document).ready(function () {

  $('#myform').validate({
    rules: {
      name: {
        required: true,
      },
      supplier_id: {
        required: true,
      },
      category_id: {
        required: true,
      },
      unit_id: {
        required: true,
      },
    },
    messages: {
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


    </script>

@endsection