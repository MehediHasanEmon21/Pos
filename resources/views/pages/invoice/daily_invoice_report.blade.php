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
              <h2 class="card-title">Daily Invoice Report</h2>
             
            </div>
            <!-- /.card-header -->
            <div class="card-body">
  
                <form method="GET" target="_blank" action="{{ route('invoice.daily.report.pdf') }}" id="myform">
                 <div class="row">
              
                    <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="name">Start Date</label>
                        <input type="text" class="form-control datepicker" name="start_date" id="start_date"  placeholder="YYYY-MM-DD">
                    </div>

                  </div>

                     <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="name">End Date</label>
                        <input type="text" class="form-control datepicker1" name="end_date" id="end_date"  placeholder="YYYY-MM-DD">
                    </div>

                  </div>

                  <div class="col-md-4">
                    
                    <div class="form-group" style="padding-top: 30px">
                      <button type="submit" class="btn btn-primary addmore">Submit</i></button>
                    </div>

                  </div>


                </div>
                </form>

            
            <!-- /.card-body -->
            </div>
          
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
      start_date: {
        required: true,
      },
      end_date: {
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
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

@endsection