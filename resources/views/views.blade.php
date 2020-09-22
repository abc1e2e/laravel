<!DOCTYPE html>
<html lang="en">
<head>
<title>View Report</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<!-- library bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>
    
            <!-- table user all  -->
            <table id="tableHorizontalWrapper" class="table table-striped table-bordered table-sm text-center" cellspacing="0"width="50%">
                <thead>
                    <tr> 
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($viewReport as $views)
                        <tr>
                            <td>{{$views->id}}</td>
                            <td>{{$views->first_name}}</td>
                            <td>{{$views->last_name}}</td>
                            <td>{{$views->city_name }}</td>
                            <td>{{$views->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
     
</body>
</html>