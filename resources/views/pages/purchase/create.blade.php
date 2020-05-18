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
              <a href="{{ route('purchase.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Purchase</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
  

                 <div class="row">
                    <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="name">Purchase Date</label>
                        <input type="text" class="form-control datepicker" name="date" id="date"  placeholder="YYYY-MM-DD">
                    </div>

                  </div>

                   <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="mobile">Purchase No</label>
                        <input type="text" class="form-control" name="purchase_no" id="purchase_no" placeholder="Enter No">
                    </div>

                  </div>


                  <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="email">Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="form-control select2" style="width: 100%">
                            <option value="" selected="" disabled="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                             <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach

                        </select>
                        
                    </div>

                  </div>

                 

                   <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="address">Category</label>
                        <select name="category_id" id="category_id" class="form-control select2">
                            
                        </select>
                    </div>

                  </div>

                  <div class="col-md-4">
                    
                    <div class="form-group">
                        <label for="address">Product</label>
                        <select name="product_id" id="product_id" class="form-control select2">
                            
                        </select>
                    </div>

                  </div>

                  <div class="col-md-4">
                    
                    <div class="form-group" style="padding-top: 30px">
                      <a class="btn btn-primary addmore"><i class="fa fa-plus-circle">Add Item</i></a>
                    </div>

                  </div>


            </div>

            <div class="card-body" style="margin-top: 30px">
              
              <form action="{{ route('purchase.store') }}" method="POST">
                @csrf
              <table class="table table-bordered table-sm table-striped" width="100%">
                
                <thead>
                  <tr>
                    <td>Category</td>
                    <td>Product Name</td>
                    <td width="7%">PCS/KG</td>
                    <td width="10%">Unit Price</td>
                    <td>Description</td>
                    <td width="10%">Total Price</td>
                    <td>Action</td>
                  </tr>
                </thead>

                <tbody class="addRow" id="addRow">
                  
                </tbody>

                <tbody>
                  <tr>
                    <td colspan="5"></td>
                    <td>
                      <input type="text" class="form-control form-control-sm estimated_amount" id="estimated_amount" name="estimated_amount" readonly="" value="0" style="background-color: #D8FDBA">
                    </td>
                    <td></td>
                  </tr>
                </tbody>

              </table>
                <div class="form-group">
                  <button type="submi" class="btn btn-info">Purchase Store</button>
                </div>
              </form>

            </div>
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

  <script id="document-template" type="test/x-handlebars-template">

  <tr class="delete_add_more_item">
    <input type="hidden" name="date[]" value="@{{date}}">
    <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
    <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">

    <td>
      <input type="hidden" name="category_id[]" value="@{{category_id}}">
      @{{category_name}}
    </td>

    <td>
      <input type="hidden" name="product_id[]" value="@{{product_id}}">
      @{{product_name}}
    </td>

    <td>
      <input type="number" name="buying_qty[]" min="1" class="form-control form-control-sm buying_qty text-right"  value="1">  
    </td>

    <td>
      <input type="number" name="unit_price[]"  class="form-control form-control-sm unit_price text-right"  value="">  
    </td>

    <td>
      <input type="text" name="description[]"  class="form-control form-control-sm">  
    </td>
    <td>
      <input name="buying_price[]"  class="form-control form-control-sm buying_price text-right" value="0" readonly="">
    </td>
    <td>
      <i class="fa fa-window-close btn btn-danger btn-sm removeItem"></i>
    </td>
  </tr>
    


  </script>

  <script>
    
    $(function(){

      $(document).on('click','.addmore',function(){

          var date = $('#date').val();
          var purchase_no = $('#purchase_no').val();
          var supplier_id = $('#supplier_id').val();
          var category_id = $('#category_id').val();
          var product_id = $('#product_id').val();
          var product_id = $('#product_id').val();
          var category_name = $('#category_id').find('option:selected').text();
          var product_name = $('#product_id').find('option:selected').text();
          
          if (date == '') {
            $.notify('Date is required', {globalPosition: 'top right', className: 'error'})
            return false
          }

          if (purchase_no == '') {
            $.notify('Purchase no is required', {globalPosition: 'top right', className: 'error'})
            return false
          }

          if (supplier_id == '') {
            $.notify('Supplier is required', {globalPosition: 'top right', className: 'error'})
            return false
          }

          if (category_id == '') {
            $.notify('Category is required', {globalPosition: 'top right', className: 'error'})
            return false
          }

          if (product_id == '') {
            $.notify('Product is required', {globalPosition: 'top right', className: 'error'})
            return false
          }

          var source = $('#document-template').html();
          var template = Handlebars.compile(source);
          var data = {
            date: date,
            purchase_no: purchase_no,
            supplier_id: supplier_id,
            category_id: category_id,
            product_id: product_id,
            category_name: category_name,
            product_name: product_name,
          }

          var html = template(data);
          $('#addRow').append(html);

      })

      $(document).on('click','.removeItem',function(e){
        $(this).closest('.delete_add_more_item').remove()
        totalPrice()
      })

      $(document).on('keyup click','.buying_qty,.unit_price', function(){

          var buying_qty = $(this).closest('tr').find('input.buying_qty').val();
          var unit_price = $(this).closest('tr').find('input.unit_price').val();
          var buying_price =  buying_qty*unit_price;
          $(this).closest('tr').find('input.buying_price').val(buying_price);
          totalPrice()

      })

      function totalPrice(){

        var sum = 0;

        $('.buying_price').each(function(){
          var value = $(this).val();
          if (!isNaN(value) && value.length != 0) {
              sum += parseFloat(value);
          }
          
        })

        $('#estimated_amount').val(sum)

      }

    })


  </script>

  <script>
    
    $(function(){

      $(document).on('change','#supplier_id',function(){
         var supplier_id = $(this).val();
          $.ajax({
            url: "{{ route('get-category') }}",
            data: {
              supplier_id: supplier_id
            },
            success:function(data){
              var html = '<option value="" selected="" disabled="">Select Category</option>'
              $.each(data,function(key,v){
                html += '<option value="'+v.category_id+'">'+v.category.name+'</option>'
              })
              $('#category_id').html(html)
              
            }
          })
      })

      $(document).on('change','#category_id',function(){
         var category_id = $(this).val();
          $.ajax({
            url: "{{ route('get-product') }}",
            data: {
              category_id: category_id
            },
            success:function(data){
              var html = '<option value="" selected="" disabled="">Select Product</option>'
              $.each(data,function(key,v){
                html += '<option value="'+v.id+'">'+v.name+'</option>'
              })
              $('#product_id').html(html)
              
            }
          })
      })

    })

  </script>

  <script type="text/javascript">
      

  $(document).ready(function () {

  $('#myform').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      mobile: {
        required: true,
      },
      address: {
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
    </script>

@endsection