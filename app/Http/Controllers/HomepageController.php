<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        $getLCAI_path = '../scripts/REntrance/getLCAI.R';
        $exp_test_path = "./test_data/exp_GSE165843.txt";
        $pheno_test_path = "./test_data/GSE165843_phe.txt";
        $control_type = "shAMPKa";
        $experimental_type = "shCTL";
        $data_type = "Array";

        $command = "Rscript {$getLCAI_path} {$exp_test_path} {$pheno_test_path} {$control_type} {$experimental_type} {$data_type}";
        exec($command.' 2>&1',$outs,$result_code);
        echo $result_code;
        return $outs;
    }
}
