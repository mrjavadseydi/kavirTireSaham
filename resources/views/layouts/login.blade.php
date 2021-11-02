<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>حق تقدم کویر تایر</title>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/login.css')}}" rel="stylesheet" >
    @livewireStyles
</head>
<body>
{{$slot}}
@livewireScripts
<script src="{{asset('js/login.js')}}"></script>
<script src="{{ mix('js/app.js') }}" defer></script>

</body>
</html>
