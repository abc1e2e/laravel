<!Doctype html>

<html>
<head>
<title>View Student Records</title>

<!-- library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<!-- library bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>
<br>
<br>
    <div class="container">
        @if(Session::has('delete'))
            <div class="alert-success text-center" id="res_message">
                {{ Session::get('delete') }}
            </div>
        @endif
            <script>
                $(document).ready(function(){
                setTimeout(function() {
                    $('#res_message').hide();
                    },3000);
                });
            </script>

        @if(Session::has('message'))
            <div class="alert-success" id="res_message">
                {{ Session::get('message') }}
            </div>
        @endif
            <script>
            $(document).ready(function(){
                setTimeout(function() {
                    $('#res_message').hide();
                    },3000);
                });
                </script>

        <table id="tableHorizontalWrapper" class="table table-striped table-bordered table-sm text-center" cellspacing="0"width="50%">
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Lastst Name</td>
                <td>City Name</td>
                <td>Email</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->city_name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href = 'edit/{{ $user->id }}'>Edit</a></td>
                <td><a href = 'delete/{{ $user->id }}'>Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>