<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomepageController extends Controller
{

    public function home(Request $request)
    {

        return view('home', ['json_path' => 'storage/data/result.json']);

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
        $json_name = '_' . time() . '_result.json';
        $json_storage_path = storage_path() . '/app/public/data/' . $json_name;
        $json_public_path = '/storage/data/' . $json_name;
        session(['json_name' => $json_name]);

        /* problem has been found that Rscript will automatically build a getLCAi folder,
           which should be removed by process but failed.
         * use rm -rf to remove this folder, plan to seek a better solution later.
         * rm -rf $folder_base_path &&
         */
        $command = "Rscript $getLCAI_path $exp_test_path $pheno_test_path $control_type $experimental_type $data_type $json_storage_path 2&>1";
        exec($command, $output_array, $result_code);

        $output = json_decode(implode('', $output_array));
        Log::debug($output);
        return view('home', ['json_path' => $json_public_path]);
        // return response(['c' => $command, "output" => $output_array, 'result_code' => $result_code]);
    }

}
