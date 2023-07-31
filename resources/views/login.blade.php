<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>

    </title>
</head>
<body>
<div style="display: flex; margin-top: 1%;">
    <div style="margin-left: 23%; padding-bottom: 1%;">
        <img src="{{asset('image/logo.jpg')}}" width="90">
    </div>
    <div style="margin-left: 2%;">
        <h3 style="margin-left: 13%;">TANDAAY NATIONAL HIGH SCHOOL</h3>
        <h3>PROPERTY CUSTODIAN MANAGEMENT SYSTEM</h3>
    </div>
    <div style="margin-top: 3.5%; margin-left: 13%; cursor: pointer;">
        <h5 data-bs-toggle="modal" data-bs-target="#login_modal"><u>Login</u></h5>
    </div>

</div>
<img src="{{asset('image/front.jpg')}}" width="1490" height="700" style="margin-left: 1%;">

@include('modal.login-modal')
<button style="display: none;" onclick="location.href = 'register';">register</button>

@include('partial.footer')
