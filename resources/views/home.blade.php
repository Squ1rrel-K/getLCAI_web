<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">$(function () {
            $('[data-toggle="popover"]').popover()
        })</script>
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
            <h1 class="text-center mt-4" style="font-family: 'Microsoft YaHei UI Light',sans-serif;font-size: 36px;">
                Analyzing lung cancer progression!
            </h1>


        </div>
        <div class="text-center p-3" style="height: 50px">

        </div>
    </div>


    <div class="d-flex align-items-center mb-3">
        <i class="bi bi-chevron-right" style="font-size: 24px;margin-right: 5px"></i>
        <h5 class="pt-2"><strong>Click each tag for further explanations.</strong></h5>
        <div class="spinner-border ml-auto left" role="status" aria-hidden="true"></div>
    </div>
    <div class="row m-3 mb-4 pb-5 shadow rounded">
        <div class="col col-6">
            <form action="{{route('home-doGetLCAi')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row mb-2">
                        <label for="expFile" class="col-4 ">
                            <button type="button" class="btn btn-light " style="width: 160px;text-align:left"
                                    title="Expression:  "
                                    data-container="body"
                                    data-toggle="popover"
                                    data-placement="right" data-content="an expression matrix (data.frame or file).
            The columns of the matrix are samples and the rows are the unique genes.">
                                Exp Input:
                            </button>
                        </label>
                        <input type="file" class="form-control-file w-auto" id="expFile" name="expFile"
                               style="display:none"
                               onchange="expFilePath.value=this.value">
                        <input type=text class="form-control w-auto " id=expFilePath readonly>
                        <input type=button class="form-control w-auto" id=expFileButton value="Upload"
                               onclick="expFile.click()">
                    </div>

                    <div class="row mb-2">
                        <label for="phenoFile" class="col-4 pt-1">
                            <button type="button" class="btn btn-light " style="width: 160px;text-align:left"
                                    title="Phenotype:  "
                                    data-container="body"
                                    data-toggle="popover"
                                    data-placement="right" data-content="a sample grouping information matrix (data.frame or file).
            There are two columns in the matrix. The first column is the sample ID and the second column is the grouping information.">
                                Pheno Input:
                            </button>
                        </label>
                        <input type="file" class="form-control-file w-auto" id="phenoFile" name="phenoFile"
                               style="display: none"
                               onchange="phenoFilePath.value=this.value">

                        <input type=text class="form-control w-auto " id=phenoFilePath readonly>
                        <input type=button class="form-control w-auto" id=phenoFileButton value="Upload"
                               onclick="phenoFile.click()">
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <label for="controlType" class="col-4 pt-1">
                                <button type="button" class="btn btn-light" style="width: 160px;text-align:left"
                                        title="Control Type:  "
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="right" data-content="a character vector. The group you want to set as control in
            the group information.">
                                    Control Type:
                                </button>
                            </label>
                            <input type="text" class="form-control w-auto" id="controlType"
                                   placeholder="e.g. :shAMPKa" name="controlType">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="experimentalType" class="col-4 pt-1">
                                <button type="button" class="btn btn-light" style="width: 160px;text-align:left"
                                        title="Experimental Type:  "
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="right" data-content="a character vector. The group you want to set as
            experimental in the group information.">
                                    Experimental Type:
                                </button>

                            </label>
                            <input type="text" class="form-control w-auto" id="experimentalType"
                                   placeholder="e.g. :shCTL"
                                   name="experimentalType">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="dataType" class="col-4 pt-1">
                                <button type="button" class="btn btn-light" style="width: 160px;text-align:left"
                                        title="Data Type:  "
                                        data-container="body"
                                        data-toggle="popover"
                                        data-placement="right" data-content="the type of experiment to obtain mRNA expression profile data.
            Use 'Array' or 'RNA-seq'.">
                                    Data Type:
                                </button>
                            </label>
                            <select id="dataType" class="form-control w-auto" name="dataType">
                                <option selected>Array</option>
                                <option>RNA-seq</option>
                            </select>
                            <button type="submit" class="btn btn-primary" style="margin-left: 79px"><i
                                    class="bi bi-caret-right"></i>submit
                            </button>
                        </div>

                    </div>


                </div>
            </form>

        </div>
        <div class="col col-6">

        </div>


    </div>
    <div id="main" class="row col m-3" style="height: 50rem">

        @include('painter')
    </div>

    @include('_footer')
</div>
{{--Main Block E--}}


</body>
</html>
