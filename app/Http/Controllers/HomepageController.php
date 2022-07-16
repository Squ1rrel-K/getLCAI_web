<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class HomepageController extends Controller
{

    public function home(Request $request)
    {
        return view('home');
    }

    #[NoReturn] public function DoGetLCAI(Request $request)
    {
        $getLCAI_path = base_path() . '/scripts/REntrance/getLCAI.R';
        $exp_test_path = storage_path() . '/app/' . $request->file('expFile')->store('expFiles');
        $pheno_test_path = storage_path() . '/app/' . $request->file('phenoFile')->store('phenoFiles');
        $control_type = $request->input('controlType');
        $experimental_type = $request->input('experimentalType');
        $data_type = $request->input('dataType');
        $command = "Rscript $getLCAI_path $exp_test_path $pheno_test_path $control_type $experimental_type $data_type 2&>1";

        exec($command, $output, $result_code);
        return view('home',["output"=>$output]);
    }
}
