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
            <h3>Hospital Registration Form</h3>
        </div>

    </div>
</div>
<div class="container" style="margin-top: 20px">

        @if(\Session::has('error'))
            <div class="alert alert-danger fade in">
                {{\Session::get('error')}}
            </div>
        @endif
    <form method="POST" action="{{url('register')}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter name">
            @if($errors->has('name'))
                <small style="color: red" class="error">{{ $errors->first('name') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Contact Person</label>
            <input value="{{ old('contact_person') }}" name="contact_person" type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter name">
            @if($errors->has('contact_person'))
                <small style="color: red" class="error">{{ $errors->first('contact_person') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            @if($errors->has('email'))
                <small style="color: red" class="error">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input  value="{{ old('phone') }}" name="phone" type="text" class="form-control phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone">
            @if($errors->has('phone'))
            <small style="color: red" class="error">{{ $errors->first('phone') }}</small>
                @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mobile</label>
            <input value="{{ old('mobile') }}" name="mobile" type="text" class="form-control phone" id="" aria-describedby="emailHelp" placeholder="Enter mobile">
            @if($errors->has('mobile'))
            <small style="color: red" class="error">{{ $errors->first('mobile') }}</small>
                @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input value="{{ old('address') }}" name="address" type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter address">
            @if($errors->has('address'))
            <small style="color: red" class="error">{{ $errors->first('address') }}</small>
                @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Department</label>
            <input value="{{ old('department') }}" name="department" type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter department">
            @if($errors->has('department'))
                <small style="color: red" class="error">{{ $errors->first('department') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
            @if($errors->has('password'))
                <small style="color: red" class="error">{{ $errors->first('password') }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
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
