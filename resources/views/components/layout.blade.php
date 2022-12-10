<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>

</head>

<body>

    <x-navbar />
    <div class="row">
        <div class="col-2">
            <x-menu.principal />
        </div>
        <div class="col-10">
            <x-erros />
            {{ $slot}}
        </div>
    </div>

    <script src="{{asset('admin/js/layout.js')}}" ></script>
</body>

</html>
