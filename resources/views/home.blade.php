<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <title>Welcome to getLCAi</title>
</head>
<body style="background-color: #fff">
@include('_header')

{{--jumbotron S--}}
<div class="jumbotron container jumbotron-home">
    <h1 class="display-4">Welcome to getLCAi!</h1>
    <p class="lead">getLCAi is an R package which analyzes the action direction of target gene regulation or drug
        treatment on lung cancer progression.</p>
    <hr class="my-4">
    <p>getLCAi can clearly indicate the anti-cancer or cancer promoting effect of this research factor (gene or
        drug).</p>
    <a class="btn btn-primary btn-lg" href="https://github.com/Squ1rrel-K/getLCAI" role="button">Learn more</a>
</div>
{{--jumbotron E--}}

{{--Main Block S--}}
<div class="container">
    <div class="shadow rounded align-self-center mb-4 pb-5">
        <i class="bi bi-chevron-right" style="font-size: 24px"></i>
        <div class="p-2">

            <h1 style="font-family: 'Microsoft YaHei UI Light',sans-serif;font-size: 36px;margin-bottom: 0">

                <div class="text-center"> Using getLCAi today</div>
            </h1>
            <br>
            <h1 class="text-center" style="font-family: 'Microsoft YaHei UI Light',sans-serif;font-size: 36px;">
                Analyzing lung cancer progression
            </h1>


        </div>
        <div class="text-center p-3" style="height: 100px">
            <a class="btn btn-primary btn-lg" href="#"><i class="bi bi-caret-right"></i>More info</a>
        </div>
    </div>





    <div class="d-flex align-items-center mb-3">
        <i class="bi bi-chevron-right" style="font-size: 24px;margin-right: 5px"></i>
        <strong>Please set values and press the 'submit' button.</strong>
        <div class="spinner-border ml-auto left" role="status" aria-hidden="true"></div>
    </div>
    <div class="row ml-3 mr-3">
        <div class="col col-5 pt-5" style="border-right: 1px solid #dcdfe6 ">


            <form action="{{route('dataProcessing')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row mb-2">
                        <label for="expFile" class="col-4 pt-1">exp input:</label>
                        <input type="file" class="form-control-file w-auto" id="expFile" name="expFile"
                               style="display:none"
                               onchange="expFilePath.value=this.value">
                        <input type=text class="form-control w-auto " id=expFilePath readonly>
                        <input type=button class="form-control w-auto" id=expFileButton value="Upload"
                               onclick="expFile.click()">
                    </div>

                    <div class="row mb-2">
                        <label for="phenoFile" class="col-4 pt-1">pheno input:</label>
                        <input type="file" class="form-control-file w-auto" id="phenoFile" name="phenoFile"
                               style="display: none"
                               onchange="phenoFilePath.value=this.value">

                        <input type=text class="form-control w-auto " id=phenoFilePath readonly>
                        <input type=button class="form-control w-auto" id=phenoFileButton value="Upload"
                               onclick="phenoFile.click()">
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <label for="controlType" class="col-4 pt-1">control type:</label>
                            <input type="text" class="form-control w-auto" id="controlType"
                                   placeholder="e.g. :shAMPKa" name="controlType">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="experimentalType" class="col-4 pt-1">experimental type: </label>
                            <input type="text" class="form-control w-auto" id="experimentalType"
                                   placeholder="e.g. :shCTL"
                                   name="experimentalType">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="dataType" class="col-4 pt-1">data type:</label>
                            <select id="dataType" class="form-control w-auto" name="dataType">
                                <option selected>Array</option>
                                <option>RNA-seq</option>
                            </select>
                        </div>

                    </div>
                    <a id="focus"></a>

                    <button type="submit" class="btn btn-primary"><i class="bi bi-caret-right"></i>submit</button>


                </div>
            </form>

        </div>


        <div id="main" class="col col-7">
            @include('painter')
        </div>
    </div>


    @include('_footer')
</div>
{{--Main Block E--}}


</body>
</html>
