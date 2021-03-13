<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwitchRandomResult;
use Storage;

class SwitchRandomResultController extends Controller
{

    public function result(Request $request) {

        $software_type = $request->software_type;
        $age_limit = $request->age_limit;
        $publisher = $request->publisher;

        // SwitchRandomモデルのインスタンス化
        $md = new SwitchRandomResult();
        // echo $software_type;
        // echo $age_limit;
        // echo $publisher;

        $release_maker = $md->ReleaseMakerSearch($publisher);
        // echo $release_maker;
        $search_gamecount = $this->searchcolumn_gamecount($software_type, $age_limit, $release_maker, $md);

        $md->GameRandomSearch($search_gamecount, $age_limit, $release_maker);


        return view('result')->with([
            'software_type' => $software_type,
            'age_limit' => $age_limit,
            'publisher' => $publisher,
        ]);
    }

    private function searchcolumn_gamecount($software_type="ALL_software", $age_limit="ALL_cero", $release_maker="ALL", $md=null) {

        $column = "cero_all";

        // パッケージ・ダウンロードソフト全ての場合のカラムを検索
        if($software_type === "ALL_software" && $age_limit === "ALL_cero") {
            $column = "cero_all";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }
        if($software_type === "ALL_software" && $age_limit === "A3+") {
            $column = "cero_A_3";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }
        if($software_type === "ALL_software" && $age_limit === "7+") {
            $column = "cero_7";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }
        if($software_type === "ALL_software" && $age_limit === "B12+") {
            $column = "cero_B_12";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }
        if($software_type === "ALL_software" && $age_limit === "C+") {
            $column = "cero_C";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }
        if($software_type === "ALL_software" && $age_limit === "16+") {
            $column = "cero_16";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }
        if($software_type === "ALL_software" && $age_limit === "D+") {
            $column = "cero_D";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }
        if($software_type === "ALL_software" && $age_limit === "Z18+") {
            $column = "cero_Z";
            $search_gamecount = $md->SearchGamecountAllCeroSum($column, $release_maker);
        }

        // パッケージソフト全ての場合のカラムを検索
        if($software_type === "package" && $age_limit === "ALL_cero") {
            $column = "type1_all";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }
        if($software_type === "package" && $age_limit === "A3+") {
            $column = "type1_A_3";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }
        if($software_type === "package" && $age_limit === "7+") {
            $column = "type1_7";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }
        if($software_type === "package" && $age_limit === "B12+") {
            $column = "type1_B_12";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }
        if($software_type === "package" && $age_limit === "C+") {
            $column = "type1_C";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }
        if($software_type === "package" && $age_limit === "16+") {
            $column = "type1_16";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }
        if($software_type === "package" && $age_limit === "D+") {
            $column = "type1_D";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }
        if($software_type === "package" && $age_limit === "Z18+") {
            $column = "type1_Z";
            $search_gamecount = $md->SearchGamecountPackageCeroSum($column, $release_maker);
        }

        // ダウンロードソフト全ての場合のカラムを検索
        if($software_type === "download" && $age_limit === "ALL_cero") {
            $column = "download_all";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }
        if($software_type === "download" && $age_limit === "A3+") {
            $column = "download_A_3";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }
        if($software_type === "download" && $age_limit === "7+") {
            $column = "download_7";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }
        if($software_type === "download" && $age_limit === "B12+") {
            $column = "download_B_12";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }
        if($software_type === "download" && $age_limit === "C+") {
            $column = "download_C";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }
        if($software_type === "download" && $age_limit === "16+") {
            $column = "download_16";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }
        if($software_type === "download" && $age_limit === "D+") {
            $column = "download_D";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }
        if($software_type === "download" && $age_limit === "Z18+") {
            $column = "download_Z";
            $search_gamecount = $md->SearchGamecountDownloadCeroSum($column, $release_maker);
        }

        return $search_gamecount;
    }
}
