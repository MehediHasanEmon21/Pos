<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daily Report Invoice</title>

</head>
<body>

  <div class="container">


    <div class="row">

      <table width="100%">
        <tr>
          <td width="30%"></td>
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
          <td width="30%"></td>
          <td width="50%" style="text-decoration: underline;"><h5>Daily Invoice Report({{ date('d-m-Y',strtotime($start_date)) }} - {{ date('d-m-Y',strtotime($end_date)) }})</h5></td>
          <td width="20%"></td>
        </tr>
        
      </table>

    </div>

  <br>

  <div class="row">
    
    <table border="1" width="100%">
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
      @php 
        $total = 0;
      @endphp
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
          @php
            $total += $invoice->payment->total_amount;
          @endphp
        @endforeach
        <tr>
          <td colspan="5" style="text-align: right;"><strong>Grand Total</strong></td>
          <td>{{ $total }}</td>
        </tr>
      </tbody>
    </table>


  </div>



    <div style="margin-top: 10px">
    

       

  </div>

  <hr>

  <div class="row">

    <table width="100%">
      
      <tbody>
        <tr>
          <td width="30%" style="text-align: center;"></td>
          <td ></td>
          <td width="40%" style="text-align: center; border-bottom: : 1px solid #ddd">Owner Singnature</td>
        </tr>
      </tbody>
    </table>
    

  </div>
    



  </div>


  
</body>
</html>