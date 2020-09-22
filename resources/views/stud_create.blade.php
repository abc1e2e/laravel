<!DOCTYPE html>
<html>
<head>
<title>Student Management | Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<br>
    <h2 class="text-center">Form Insert Data Student</h2>

    @if(Session::has('insert'))
            <div class="alert-success text-center" id="res_message">
                {{ Session::get('insert') }}
            </div>
        @endif
            <script>
            $(document).ready(function(){
                setTimeout(function() {
                    $('#res_message').hide();
                    },3000);
            });
            </script>

    <form action = "/create" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="usr">First Name:</label>
                    <input type='text'class="form-control" name='first_name' required >
                </div>
                <div class="col-6">
                    <label for="usr">Last Name:</label>
                    <input type="text" class="form-control" name='last_name' required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="pwd">City Name:</label>
            <select class="form-control" name="city_name" required>
                <option >Please select city</option>
                <option value="Phnom Penh">Phnom Penh</option>
                <option value="USA">USA</option>
                <option value="English">English</option>
                <option value="Canada">Canada</option>
                <option value="Frence">Frence</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pwd">Email:</label>
            <input type="text" class="form-control" name='email' required>
            </div>
            <input type ='submit' class=" btn btn-success text-center" value = "Insert">
        </div>
        {{-- <div class="form-group">
            <label>Ảnh</label>
            <input type="file" class="form-control-file border" name="image" value="{{ old('image')}}" required>
        </div>   --}}
    </form>
</body>
</html>