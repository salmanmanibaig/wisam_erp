<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate</title>

    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo asset('assets/theme.css'); ?>">

    <style>
        body {
            padding-top: 40px;
        }
        .alert {
            padding: 10px !important;
            margin: 10px 0px !important;

        }
        /* input
         {
             background: transparent !important;
             color: white;
         }
         input::-webkit-input-placeholder {
             color: white;
         }*/
    </style>
</head>
<body class="no-top-padding bg_image">


<div class="container">
    <div class="row" style="text-align: center">
        <div class="col">
            <h3>Donation Info</h3>
        </div>

    </div>
</div>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4"> One Millions Meal</h1>

        <label class="display-4">Hospital Info</label> <br>
        <label class="display-4">{{ucfirst("Name :")}}</label>
        <span class="display-4">{{ucfirst($requirement->hospital->name)}}</span>

        &nbsp;&nbsp;
        <label class="display-4">{{ucfirst("Address :")}}</label>
        <span class="display-4">{{ucfirst($requirement->hospital->address)}}</span>
        &nbsp;&nbsp;
        <label class="display-4">{{ucfirst("contact Person :")}}</label>
        <span class="display-4">{{ucfirst($requirement->hospital->contact_person)}}</span>
        &nbsp;&nbsp;
        <label class="display-4">{{ucfirst("Phone :")}}</label>
        <span class="display-4">{{ucfirst($requirement->hospital->phone)}}</span>
        &nbsp;&nbsp;
        <label class="display-4">{{ucfirst("Mobile :")}}</label>
        <span class="display-4">{{ucfirst($requirement->hospital->mobile)}}</span>
&nbsp;&nbsp;<br>
        <label class="display-4">{{ucfirst("Requirment Info")}}</label>
        <br>
        <label class="display-4">{{ucfirst("Ticket No :")}}</label>
        <span class="display-4">{{'REQ-'.sprintf("%03d",$requirement->id).'-'.date('m',strtotime($requirement->created_at))}}</span>

        &nbsp;&nbsp;
        <label class="display-4">{{ucfirst("Department :")}}</label>
        <span class="display-4">{{ucfirst($requirement->department)}}</span>
        &nbsp;&nbsp;
        <label class="display-4">{{ucfirst("No Of Meals :")}}</label>
        <span class="display-4">{{ucfirst($requirement->number_of_meals)}}</span>
        &nbsp;&nbsp;
        <label class="display-4">{{ucfirst("Req on Date :")}}</label>
        <span class="display-4">{{ucfirst($requirement->req_on_date)}}</span>
        &nbsp;&nbsp;
            <label class="display-4">{{ucfirst("Mobile :")}}</label>
            <span class="display-4">{{ucfirst($requirement->hospital->mobile)}}</span>
    </div>
</div>

<div class="container">
    <div class="row" style="text-align: center">
        <div class="col">
            <h3>Donation Form</h3>
        </div>

    </div>
</div>
<div class="container">
    @if(\Session::has('success'))
        <h4 class="alert alert-success fade in">
            {{\Session::get('success')}}
        </h4>
    @endif
    <form method="POST" action="{{url('donate')}}">
        <input type="hidden" name="requirement_id" value="{{$requirement_id}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
            @if($errors->has('name'))
                <small style="color: red" class="error">{{ $errors->first('name') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            @if($errors->has('email'))
                <small style="color: red" class="error">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <input name="company" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter company name">
            @if($errors->has('company'))
                <small style="color: red" class="error">{{ $errors->first('company') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input name="phone" type="text" class="form-control phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone">
            @if($errors->has('phone'))
                <small style="color: red" class="error">{{ $errors->first('phone') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mobile</label>
            <input name="mobile_1" type="text" class="form-control phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter mobile">
            @if($errors->has('mobile_1'))
                <small style="color: red" class="error">{{ $errors->first('mobile_1') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
            @if($errors->has('address'))
                <small style="color: red" class="error">{{ $errors->first('address') }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>

<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- App scripts -->
@stack('scripts')

<script>

    $(document).ready(function() {
        $(".phone").inputFilter(function(value) {
            return /^\d*$/.test(value);    // Allow digits only, using a RegExp
        });
    });

    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };
    }(jQuery));
</script>

</body>
</html>
