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
    <div class="jumbotron">
        <h1 class="display-4">Welcome to getLCAI!</h1>
        <p class="lead">getLCAi is an R package which analyzes the action direction of target gene regulation or drug
            treatment on lung cancer progression.</p>
        <hr class="my-4">
        <p>getLCAi can clearly indicate the anti-cancer or cancer promoting effect of this research factor (gene or
            drug).</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>

<div class="container">
    <div class="col align-self-center mb-4 pb-3" style="border-bottom: 1px solid #eee">
        <div class="h2 text-center">Use getLCAI to analyze your data</div>
    </div>
    <p class="ml-1">Give introduction for these values. </p>
    <p class="ml-1">Give introduction for these values. </p>
    <p class="ml-1">Give introduction for these values. </p>
    <p class="ml-1">Give introduction for these values. </p>
    <div class="row p-3 pt-5 m-1" style="border: solid #f8f9fa">

        <div class="col-6 pt-2">
            <h3 class="pb-2">Values</h3>
            <form action="{{route('DoGetLCAI')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row mb-2">
                        <label for="expFile" class="col-4 pt-1">exp input:</label>
                        <input type="file" class="form-control-file w-auto" id="expFile" name="expFile">
                    </div>

                    <div class="row mb-2">
                        <label for="phenoFile" class="col-4 pt-1">pheno input:</label>
                        <input type="file" class="form-control-file w-auto" id="phenoFile" name="phenoFile">
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
                                <option>exp</option>
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>

                </div>
            </form>
        </div>
        <div class="col-6 pt-2" style="border-left: 1px solid #eee">
            <h3>Results</h3>
            @if($output ?? ''!=null)
                <p>{{var_dump($output ?? '')}}</p>

            @else

                <div class="d-flex align-items-center">
                    <strong>Please set values and press the 'submit' button..</strong>
                    <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                </div>

            @endif
        </div>

    </div>


</div>


</body>
</html>
