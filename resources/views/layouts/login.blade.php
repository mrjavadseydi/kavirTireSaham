<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سامانه امور سهام شرکت کویر تایر</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/login.css')}}" rel="stylesheet" >
    <link rel="icon" sizes="32x32" href="{{asset('favicon-32.png')}}" type="image/png"/>
    <link rel="icon" sizes="64x64" href="{{asset('favicon-64.png')}}" type="image/png"/>
    <link rel="icon" sizes="96x96" href="{{asset('favicon-96.png')}}" type="image/png"/>
    @livewireStyles
    <style>
        #top{
            position: absolute;
            height: 150px;
            width: 99%;
            background: white;
            top: 0;
            overflow-y: scroll;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="top">
<img src="{{asset('w1.jpg')}}" style="width: 95%;margin: 0 auto">
</div>
{{$slot}}
@livewireScripts
<script src="{{asset('js/login.js')}}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
