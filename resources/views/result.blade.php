<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{mix('js/app.js')}}"></script>

    <title>Welcome to getLCAI</title>
</head>
<body style="background-color: #fff">
@include('_header')
<div class="container">
    <div class="col pt-2" style="border: 1px solid #eee">
        <h3 class="text-center">Results</h3>
        @if($result_code===0)

            <p>{{print_r($output->lcai_ouput_list->lcai_ouput[0],true) }}</p>
            <img class="img-fluid p-3" src = 'https://tuchuangs.com/imgs/2022/11/10/ea7f838f95cb9ce2.jpg' />
        @else

            <p>Something went wrong, please try again!</p>

        @endif
    </div>
    @include('_footer')
</div>
</body>
