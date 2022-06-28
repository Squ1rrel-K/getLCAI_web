<!doctype html>
<html lang="zh-CN">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to getLCAI</title>
</head>
<body>
<form action="{{route('getLCAIResults')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="expFile">exp input</label>
        <input type="file" class="form-control-file" id="expFile" name="expFile">
        <label for="phenoFile">pheno input</label>
        <input type="file" class="form-control-file" id="phenoFile" name="phenoFile">

        <div class="form-group mx-sm-3 mb-2">
            <label for="controlType" class="sr-only">control type</label>
            <input type="text" class="form-control" id="controlType" placeholder="e.g. :shAMPKa" name="controlType">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <label for="experimentalType" class="sr-only">experimental type</label>
            <input type="text" class="form-control" id="experimentalType" placeholder="e.g. :shCTL" name="experimentalType">
        </div>

        <div class="form-group col-md-4">
            <label for="dataType">data type</label>
            <select id="dataType" class="form-control" name="dataType">
                <option selected>Array</option>
                <option>exp</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">submit</button>
    </div>
</form>

</body>
</html>
