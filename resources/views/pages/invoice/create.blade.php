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
              <a href="{{ route('invoice.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list">All Invoice</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
  

                 <div class="row">
                 <div class="col-md-1">
                    
                    <div class="form-group">
                        <label for="mobile">Invoice</label>
                        <input type="text" class="form-control" value="{{ $invoice_no }}" name="invoice_no" id="invoice_no" placeholder="" style="background-color: #D8FDBA" readonly="">
                    </div>

                  </div>
                    <div class="col-md-2">
                    
                    <div class="form-group">
                        <label for="name">Date</label>
                        <input type="text" class="form-control datepicker" name="date" id="date"  placeholder="YYYY-MM-DD">
                    </div>

                  </div>

         

                  <div class="col-md-3">
                    
                    <div class="form-group">
                        <label for="address">Category</label>
                        <select name="category_id" id="category_id" class="form-control select2">

                          <option value="" selected="" disabled="">Select Category</option>
                            @foreach($categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                  </div>


                 

               

                  <div class="col-md-3">
                    
                    <div class="form-group">
                        <label for="address">Product</label>
                        <select name="product_id" id="product_id" class="form-control select2">
                            
                        </select>
                    </div>

                  </div>

                  <div class="col-md-2">
                    
                    <div class="form-group">
                        <label for="mobile">Stock(PCS/KG)</label>
                        <input type="text" readonly="" class="form-control" name="stock" id="stock" placeholder="" style="background-color: #D8FDBA">
                    </div>

                  </div>

                  <div class="col-md-1">
                    
                    <div class="form-group" style="padding-top: 30px">
                      <a class="btn btn-primary addmore"><i class="fa fa-plus-circle">Add</i></a>
                    </div>

                  </div>


            </div>

            <div class="card-body" style="margin-top: 30px">
              
              <form action="{{ route('invoice.store') }}" method="POST">
                @csrf
              <table class="table table-bordered table-sm table-striped" width="100%">
                
                <thead>
                  <tr>
                    <td>Category</td>
                    <td>Product Name</td>
                    <td width="7%">PCS/KG</td>
                    <td width="10%">Unit Price</td>
                    <td width="10%">Total Price</td>
                    <td>Action</td>
                  </tr>
                </thead>

                <tbody class="addRow" id="addRow">
                  
                </tbody>

                <tbody>
                  <tr>
                    <td colspan="4" class="text-right">Discount Price</td>
                    <td>
                      <input type="text" class="form-control form-control-sm discount_price" id="discount_price" name="discount_amount"  value="0" placeholder="Enter Discount Price">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="text-right">Grand Total</td>
                    <td>
                      <input type="text" class="form-control form-control-sm estimated_amount" id="estimated_amount" name="estimated_amount" readonly="" value="0" style="background-color: #D8FDBA">
                    </td>
                    <td></td>
                  </tr>
                </tbody>

              </table>
              <br>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Enter Description" name="description"></textarea>
                </div>
                </div>
                
              </div>

              <div class="form-row">
                <div class="col-md-3">
                    <select class="form-control" name="paid_status" id="paid_status">
                       <option value="" selected="" disabled="">Select Payment</option>
                      <option value="full_paid">Full Paid</option>
                      <option value="full_due">Full Due</option>
                      <option value="partial_paid">Partial Paid</option>
                    </select>
                    <br>
                    <input style="display: none" type="text" name="paid_amount" placeholder="Enter Paid Amount" class="form-control paid_amount" id="paid_amount">
                    <br>
                </div>
                <div class="col-md-9">
                  <select class="form-control select2" name="customer_id" id="customer_id">
                      <option value="" selected="" disabled="">Select Customer</option>
                      <option value="0">New Customer</option>
                      @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} ({{$customer->mobile}}) ({{$customer->address}})</option>
                      @endforeach
                  </select>
                </div>
              </div>

              <div class="form-row customer_info" style="display: none">
                <div class="col-md-4">
                  <input type="text" name="name" class="form-control" placeholder="Enter Customer Name">
                </div>
                 <div class="col-md-4">
                  <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile no">
                </div>
                 <div class="col-md-4">
                  <input type="text" name="address" class="form-control" placeholder="Enter Customer Address">
                </div>
              </div>
                <br>
                <div class="form-row">
                  <button type="submi" class="btn btn-info">Invoice Store</button>
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
    <input type="hidden" name="date" value="@{{date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">

    <td>
      <input type="hidden" name="category_id[]" value="@{{category_id}}">
      @{{category_name}}
    </td>

    <td>
      <input type="hidden" name="product_id[]" value="@{{product_id}}">
      @{{product_name}}
    </td>

    <td>
      <input type="number" name="sellling_qty[]" min="1" class="form-control form-control-sm sellling_qty text-right"  value="1">  
    </td>

    <td>
      <input type="number" name="unit_price[]"  class="form-control form-control-sm unit_price text-right"  value="">  
    </td>
    <td>
      <input name="selling_price[]"  class="form-control form-control-sm selling_price text-right" value="0" readonly="">
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
          var invoice_no = $('#invoice_no').val();
          var category_id = $('#category_id').val();
          var product_id = $('#product_id').val();
          var category_name = $('#category_id').find('option:selected').text();
          var product_name = $('#product_id').find('option:selected').text();
          
          if (date == '') {
            $.notify('Date is required', {globalPosition: 'top right', className: 'error'})
            return false
          }

          if (invoice_no == '') {
            $.notify('Purchase no is required', {globalPosition: 'top right', className: 'error'})
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
            invoice_no: invoice_no,
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

      $(document).on('keyup click','.sellling_qty,.unit_price', function(){

          var sellling_qty = $(this).closest('tr').find('input.sellling_qty').val();
          var unit_price = $(this).closest('tr').find('input.unit_price').val();
          var selling_price =  sellling_qty*unit_price;
          $(this).closest('tr').find('input.selling_price').val(selling_price);
          $('#discount_price').trigger('keyup')
          

      })

      $(document).on('keyup', '#discount_price', function(){
          totalPrice();
      })

      function totalPrice(){

        var sum = 0;

        $('.selling_price').each(function(){
          var value = $(this).val();
          if (!isNaN(value) && value.length != 0) {
              sum += parseFloat(value);
          }
          
        })

        var discount_price = $('#discount_price').val();
        if (!isNaN(discount_price) && discount_price.length != 0) {
          sum -= parseFloat(discount_price)
        }

        $('#estimated_amount').val(sum)

      }

    })


  </script>

  <script>
    
    $(function(){



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

      $(document).on('change','#product_id',function(){

          var product_id = $(this).val()
          $.ajax({
            url: "{{ route('get-stock') }}",
            data: {
              product_id: product_id
            },
            success:function(data){
              $('#stock').val(data)
              
            }
          })

      })

    })

  </script>

  <script>
    
    $(document).on('change','#paid_status',function(){

        var status = $(this).val();

        if (status == 'partial_paid') {
          $('#paid_amount').show()
        }else{
          $('#paid_amount').hide()
        }

    })

    $(document).on('change','#customer_id',function(){

        var customer_id = $(this).val();

        if (customer_id == '0') {
          $('.customer_info').show()
        }else{
          $('.customer_info').hide()
        }

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