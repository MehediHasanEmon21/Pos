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
          <td width="40%"></td>
          <td width="40%" style="text-decoration: underline;"><h5> STOCK REPORT </h5></td>
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
          <th>Name</th>
          <th>Supplier</th>
          <th>Category</th>
          <th>Quantity</th>
          <th>Unit</th>
         
      </thead>
      <tbody>
          @foreach($products as $key=>$product)
        <tr>

          <td>{{$key + 1}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->supplier->name}}</td>
          <td>{{$product->category->name}}</td>
          <td>
            @if($product->quantity > 0)
              {{$product->quantity}}
            @else
              <span class="badge badge-danger">stock out</span>
            @endif
          </td>
          <td> {{$product->unit->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>


  </div>



    <div style="margin-top: 10px">
    

       

  </div>



  <div class="row">

    <table width="100%">
      
      <tbody>
        <tr>
          <td width="30%" style="text-align: center;"></td>
          <td ></td>
          <td width="30%" style="text-align: center; border-bottom: 1px dotted black;">Owner Singnature</td>
        </tr>
      </tbody>
    </table>
    

  </div>
    



  </div>


  
</body>
</html>