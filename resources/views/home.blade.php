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
        <a class="btn btn-primary btn-lg" href="https://github.com/Squ1rrel-K/getLCAI" role="button">Learn more</a>
    </div>
</div>

<div class="container">
    <div class="col align-self-center mb-4 pb-3" style="border-bottom: 1px solid #eee">
        <div class="h2 text-center">Use getLCAI to analyze your data!</div>
    </div>
    <div class="row">
        <div class="col col-2">
            <strong>exp:</strong>
        </div>
        <div class="col col-10">
            <p class="ml-1"> an expression matrix (data.frame or file).
                The columns of the matrix are samples and the rows are the unique genes. </p>
        </div>
    </div>

    <div class="row">
        <div class="col col-2">
            <strong>pheno:</strong>
        </div>
        <div class="col col-10">
            <p class="ml-1"> a sample grouping information matrix (data.frame or file).
                There are two columns in the matrix. The first column is the sample ID and the second column is the
                grouping
                information. </p>
        </div>
    </div>

    <div class="row">
        <div class="col col-2">
            <strong>control:</strong>
        </div>
        <div class="col col-10">
            <p class="ml-1">a character vector. The group you want to set as control in
                the group information. </p>
        </div>
    </div>

    <div class="row">
        <div class="col col-2">
            <strong>experimental:</strong>
        </div>
        <div class="col col-10">
            <p class="ml-1">a character vector. The group you want to set as
                experimental in the group information. </p>
        </div>
    </div>

    <div class="row">
        <div class="col col-2">
            <strong>type:</strong>
        </div>
        <div class="col col-10">
            <p class="ml-1">the type of experiment to obtain mRNA expression profile data.
                Use "Array" or "RNA-seq". </p>
        </div>
    </div>

    <div class="row p-3 pt-5 m-1" style="border: solid #f8f9fa">
        <div class="col">
            <div class="d-flex align-items-center mb-3">
                <strong>Please set values and press the 'submit' button..</strong>
                <div class="spinner-border ml-auto left" role="status" aria-hidden="true"></div>
            </div>
            <h3 class="pb-2">Values</h3>
            <form action="{{route('DoGetLCAI')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row mb-2">
                        <label for="expFile" class="col-4 pt-1">exp input:</label>
                        <input type="file" class="form-control-file w-auto" id="expFile" name="expFile"
                               style="display:none"
                               onchange="expFilePath.value=this.value">
                        <input type=text class="form-control w-auto mr-2" id=expFilePath readonly>
                        <input type=button class="form-control w-auto" id=expFileButton value="Upload"
                               onclick="expFile.click()">
                    </div>

                    <div class="row mb-2">
                        <label for="phenoFile" class="col-4 pt-1">pheno input:</label>
                        <input type="file" class="form-control-file w-auto" id="phenoFile" name="phenoFile"
                               style="display: none"
                               onchange="phenoFilePath.value=this.value">

                        <input type=text class="form-control w-auto mr-2" id=phenoFilePath readonly>
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
                    <button type="submit" class="btn btn-primary">submit</button>

                </div>
            </form>

        </div>


    </div>
    @include('_footer')
</div>


</body>
</html>
