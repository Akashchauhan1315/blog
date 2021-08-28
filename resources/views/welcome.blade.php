<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Enquiry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- toast code-->

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
 alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" 
 href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Car Enquiry  Form</h2>
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Name" name="name">
      @error('name')
        <label style="color: red">{{ $message }}</label>
      @enderror
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="email">
      @error('email')
        <label style="color: red">{{ $message }}</label>
      @enderror
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" placeholder="Enter Phone" name="phone">
      @error('phone')
        <label style="color: red">{{ $message }}</label>
      @enderror
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control"  placeholder="Enter Address" name="address">
      @error('address')
        <label style="color: red">{{ $message }}</label>
      @enderror
    </div>

    <div class="form-group">
      <label for="pwd">Manufacture:</label>
      
      <select class="form-control" name="manu_id" onchange="getmanufacture(this);">
        <option value="">Select Manufacture</option>
        @foreach($manu as $manuInfo)
            <option value="{{ $manuInfo->id }}">{{ $manuInfo->name }}</option>
        @endforeach
      </select>
      @error('manu_id')
        <label style="color: red">{{ $message }}</label>
      @enderror
    </div>

    <div class="form-group">
      <label for="pwd">Car:</label>
      
      <select class="form-control" name="car_id" id="car_id" onchange="postcarmodel(this);">
        <option value="">Select Car</option>
      </select>
      @error('car_id')
        <label style="color: red">{{ $message }}</label>
      @enderror
    </div>

    <div class="form-group">
      <label for="pwd">CarModel:</label>
      
      <select class="form-control" name="model_id" id="model_id">
        <option value="">Select CarModel</option>
      </select>
      @error('model_id')
        <label style="color: red">{{ $message }}</label>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-default" style="color: white;background-color: green">Submit</button>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

    function getmanufacture(id)
    {
      $.ajax({
        url: "{{ route('car.ajax')}}",
        method:"post",
        data:{id:id.value,"_token": "{{ csrf_token() }}"},
        success: function(response){
           html = "";
           html += '<option value="">Select Car</option>';
            $.each(response.data, function( index, value ) {
                html += '<option  value="'+ value.id +'">' + value.name +'</li>';
            });
           $('#car_id').empty('').append(html);
        }
      });
    }

    function postcarmodel(id)
    {

      $.ajax({
        url: "{{ route('carmodel.ajax')}}",
        method:"post",
        data:{id:id.value,"_token": "{{ csrf_token() }}"},
        success: function(response){
           html = "";
           html += '<option value="">Select CarModel</option>';
            $.each(response.data, function( index, value ) {
                html += '<option  value="'+ value.id +'">' + value.name +'</li>';
            });
           $('#model_id').empty('').append(html);
        }
      });
    }
</script>

<script>
      @if(Session::has('message'))
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
            toastr.success("{{ session('message') }}");
      @endif

      @if(Session::has('error'))
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
            toastr.error("{{ session('error') }}");
      @endif

      @if(Session::has('info'))
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
            toastr.info("{{ session('info') }}");
      @endif

      @if(Session::has('warning'))
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
            toastr.warning("{{ session('warning') }}");
      @endif
    </script>

</body>
</html>
