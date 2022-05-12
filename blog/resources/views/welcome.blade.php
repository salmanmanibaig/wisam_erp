<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>One Millions MEAL</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset('assets/theme.css'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 20px 10px;

        }

        .header a {
            float: left;
            color: black;
            text-align: center;
            margin: 10px;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            /*font-size: 25px;*/
            /*font-weight: bold;*/
        }

        .header a:hover {
            /*background-color: #ddd;*/
            /*color: black;*/
        }

        .header a.active {
            /*background-color: dodgerblue;*/
            /*color: white;*/
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {

                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
    </style>


    <style>
        body {
            padding-top: 40px;
        }

        div.dataTables_wrapper div.dataTables_processing {
            position: absolute;
            top: 81%;
            left: 14%;
            width: 90%;
            /* margin-left: -100px; */
            margin-top: -26px;
            text-align: center;
            padding: 1em 0;
            background: transparent;
        }
        input[type="search"]
        {
            background: transparent !important;
        }
        select {
            background: transparent !important;
        }
        td {
            color: white;
        }
    </style>
</head>
<body class="no-top-padding bg_image">
<div class=container>

    <div class="panel-body">
        <div class="header">
            <div class="col-md-6">

                <a class="navbar-brand" rel="home" href="#" title="One Million MEAL">
                    <img style="max-width:150px; margin-top: -20px;"
                         src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://onemillionmeals.uk/wp-content/uploads/2020/04/ezgif.com-optimize.gif">
                </a>

                <h1 style="font-weight: bolder">One Millions Meal</h1>
            </div>

            <div class="header-right">
                @if(Auth::id() )
                    <a class="btn btn-primary active" href="{{url('admin/login')}}">{{ ucfirst(Auth::user()->name)  }}</a>
                @else
                    <a class="btn btn-primary" href="{{url('admin/login')}}">Login</a>
                    <a class="btn btn-primary" href="{{url('/register')}}">Register</a>

                @endif
            </div>
        </div>

    </div>

{{--    <div class="row" style="float: right;margin-top: 12px">--}}
{{--        @if(Auth::id() )--}}
{{--        <a class="btn btn-primary" href="{{url('admin/login')}}">{{ ucfirst(Auth::user()->name)  }}</a>--}}
{{--        @else--}}
{{--            <a class="btn btn-primary" style="margin-right: 10px" href="{{url('admin/login')}}">Login</a>--}}
{{--        <a class="btn btn-primary" href="{{url('/register')}}">Register</a>--}}

{{--        @endif--}}
{{--    </div>--}}
</div>
<div class="container" style="margin-top: 30px">
    <table class="table table  table-bordered" id="users-table">
        <thead>
        <tr>
            <th>Ticket No</th>
            <th>Hospital</th>
            <th>Address</th>
            <th>Department</th>
            <th>Requirement</th>
            <th>Meals</th>
            <th>Date</th>

            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
</div>



<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>







<!-- App scripts -->
@stack('scripts')

<script>
    $(function() {
        var base_url = "{{url('/')}}";
        $('#users-table').DataTable({
            /*oLanguage: { sProcessing: '<img class="loader_giph" src="'+ base_url +'/images/bx_loader.gif">' },*/
            processing: true,
            serverSide: true,
            ajax: "{{url('get-requirements')}}",
            columns: [
                { data: 'ticket_number', name: 'ticket_number' },
                { data: 'hospital_name', name: 'hospital_name' },
                { data: 'hospital_address', name: 'hospital_address' },
                { data: 'department', name: 'department' },
                { data: 'requirment_text', name: 'requirment_text' },
                { data: 'number_of_meals', name: 'number_of_meals' },
                { data: 'req_on_date', name: 'req_on_date' },

                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
</body>
</html>
