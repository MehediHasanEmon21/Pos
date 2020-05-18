<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>

</head>
<body>

  <div class="container">


    <div class="row">

      <table width="100%">
        <tr>
          <td width="30%"><h2>Invoice no# {{ $invoice->invoice_no }}</h2></td>
          <td width="40%">
            <h2 style="background-color: #ddd; border-radius: 20px;">Z SHOPPING MALL</h2>
            <span>Dhaka, Narayanganj</span>
          </td>
          <td width="30%">
            <h3>Mobile : 01787676572</h3>
          </td>
        </tr>
      </table>
    
    </div>

  <hr>

    <div class="row">
      
      <table width="100%">

        <tr>
          <td width="40%"></td>
          <td width="40%" style="text-decoration: underline;"><h3>Customer Info</h3></td>
          <td width="20%"></td>
        </tr>
        
      </table>

    </div>

  <br>

    <div class="row">
      
      <table width="100%">

        <tr>
          <td width="30%">Name : <strong>{{ $invoice->payment->customer->name }}</strong></td>
          <td width="30%">Mobile : <strong>{{ $invoice->payment->customer->mobile }}</td>
          <td width="40%">Address : <strong>{{ $invoice->payment->customer->address }}</td>
        </tr>
        
      </table>

    </div>

    <div style="margin-top: 10px">
    

       <table border="1" width="100%">

            <thead>
              <tr class="text-center">
                <th>SL</th>
                <th>Category</th>
                <th>Product Name</th>
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
                <td>{{ $detail->sellling_qty  }}</td>
                <td>{{ $detail->unit_price }}</td>
                <td>{{ $detail->selling_price }}</td>
              </tr>
              @php
                $sum += $detail->selling_price;
              @endphp
              @endforeach
              <tr>
                <td colspan="5" style="text-align: right"><strong>Subtotal</strong></td>
                <td class="text-center">{{ $sum }}</td>
              </tr>
              <tr>
                <td colspan="5" style="text-align: right"><strong>Discount</strong></td>
                <td class="text-center">{{ $invoice->payment->discount_amount }}</td>
              </tr>
              <tr>
                <td colspan="5" style="text-align: right"><strong>Grand Total</strong></td>
                <td class="text-center">{{ $invoice->payment->total_amount }}</td>
              </tr>
              <tr>
                <td colspan="5" style="text-align: right"><strong>Paid Amount</strong></td>
                <td class="text-center">{{ $invoice->payment->paid_amount }}</td>
              </tr>
              <tr>
                <td colspan="5" style="text-align: right"><strong>Due Amount</strong></td>
                <td class="text-center">{{ $invoice->payment->due_amount }}</td>
              </tr>
            </tbody>
            
            </table>
            <br>

            @php

              $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));

            @endphp

            <i style="font-size: 11px; float: right;">printing time {{ $date->format('F j, Y, g:i a') }}</i>

        </div>

  <hr>

  <div class="row">

    <table width="100%">
      
      <tbody>
        <tr>
          <td width="30%" style="text-align: center;">Customer Singnature</td>
          <td ></td>
          <td width="40%" style="text-align: center;">Seller Singnature</td>
        </tr>
      </tbody>
    </table>
    

  </div>
    



  </div>


  
</body>
</html>