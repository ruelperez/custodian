<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>
        Login
    </title>
    <style>
        .image-container {
            display: inline-block;
            position: relative;
        }

        .image {
            width: 100%; /* Ensure the image takes the full width of the container */
            height: auto; /* Maintain the image's aspect ratio */
        }

        .overlay {
            position: absolute;
            top: 0; /* Adjust the vertical position of the text */
            left: 0; /* Adjust the horizontal position of the text */
            width: 100%;
            height: 100%;
            /*transform: translate(-50%, -50%); !* Center the text horizontally and vertically *!*/
            background-color: rgba(0, 0, 0, 0.7); /* Background color for the text */
            color: white; /* Text color */
            padding: 10px; /* Add padding for spacing */
        }
    </style>
</head>
<body>
<div style="width: 100%; text-align: right; padding-top: 0.5%; padding-bottom: 0.5%; padding-right: 3%;">
    <img src="{{asset('image/logo.png')}}" width="70">
</div>
<div class="image-container">
    <img src="{{asset('image/home.png')}}" class="image"  style="margin-left: 1%; width: 100%;">
    <div class="overlay">
        <div style="text-align: center; margin-top: 15%;">
            <p style="font-size: 70px;">Welcome to</p><p style="font-size: 70px;">TanHS!</p>
        </div>
        <div style="text-align: center; margin-top: 4%;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login_modal" style="width: 12%; padding-top: 1%;"><h5>Login</h5></button>
        </div>

    </div>

</div>


@include('modal.login-modal')
<button style="display: none;" onclick="location.href = 'register';">register</button>

@include('partial.footer')
{{--<div style="margin-top: 3.5%; margin-left: 13%; cursor: pointer;">--}}
{{--    <h5 data-bs-toggle="modal" data-bs-target="#login_modal"><u>Login</u></h5>--}}
{{--</div>--}}
