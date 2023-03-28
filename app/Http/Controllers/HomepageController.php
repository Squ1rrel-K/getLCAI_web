<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function home(Request $request)
    {
        return view('home');

    }

    public function DoGetLCAi(Request $request)
    {

        if ($request->file('expFile') == null || $request->file('phenoFile') == null)
            return response(['code' => 1]);

        $folder_base_path = base_path() . '/scripts/REntrance/getLCAI';
        $getLCAI_path = base_path() . '/scripts/REntrance/getLCAI.R';
        $exp_test_path = storage_path() . '/app/' . $request->file('expFile')->store('expFiles');
        $pheno_test_path = storage_path() . '/app/' . $request->file('phenoFile')->store('phenoFiles');
        $control_type = $request->input('controlType');
        $experimental_type = $request->input('experimentalType');
        $data_type = $request->input('dataType');
        $json_name = storage_path() . '/app/' . (string)time() . 'result.json';

        /* problem has been found that Rscript will automatically build a getLCAi folder,
           which causes next run to an older getLCAi version.
         * use rm -rf to remove this folder, plan to seek a better solution later.
         */
        $command = "rm -rf $folder_base_path && Rscript $getLCAI_path $exp_test_path $pheno_test_path $control_type $experimental_type $data_type $json_name";
        exec($command, $output_array, $result_code);

        $output = json_decode(implode('', $output_array));
        return response(["output" => $output, 'result_code' => $result_code]);
    }

}
