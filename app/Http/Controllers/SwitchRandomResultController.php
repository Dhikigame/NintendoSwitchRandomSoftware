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
        $search_gamecount = $this->searchcolumn_gamecount($software_type, $age_limit, $release_maker, $md);
        $search_gameinfo = $md->GameRandomSearch($search_gamecount, $age_limit, $release_maker, $software_type);
        $search_gameimg = $this->search_gameimg($search_gameinfo);


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

    private function calc_image($img) {
        $img_size = getimagesize($img);
        $width = floor(187 * $img_size[0] / $img_size[1]);
        if($width > 332){
            $width = 332;
        } else {
            return "width='332' height='187'";
        }
        return "width='".$width."' height='187'";
    }

    private function search_gameimg($search_gameinfo) {

        $disk = Storage::disk('s3');

        $image_id = $search_gameinfo[0]->id;
        echo $search_gameinfo[0]->title . "<br>";

        $path[0] = $disk->url($image_id . '/000001.jpg');
        // $img_path[0] = "<img src='".$path[0]."' ".$this->calc_image($path[0]).">";
        $path[1] = $disk->url($image_id . '/000002.jpg');
        // $img_path[1] = "<img src='".$path[1]."' ".$this->calc_image($path[1]).">";
        $path[2] = $disk->url($image_id . '/000003.jpg');
        // $img_path[2] = "<img src='".$path[2]."' ".$this->calc_image($path[2]).">";
        $path[3] = $disk->url($image_id . '/000004.jpg');
        // $img_path[3] = "<img src='".$path[3]."' ".$this->calc_image($path[3]).">";
        $path[4] = $disk->url($image_id . '/000005.jpg');
        // $img_path[4] = "<img src='".$path[4]."' ".$this->calc_image($path[4]).">";
        $path[5] = $disk->url($image_id . '/000006.jpg');
        // $img_path[5] = "<img src='".$path[5]."' ".$this->calc_image($path[5]).">";

        $img_path[0] = "<img src='".$path[0]."'>";
        $img_path[1] = "<img src='".$path[1]."'>";
        $img_path[2] = "<img src='".$path[2]."'>";
        $img_path[3] = "<img src='".$path[3]."'>";
        $img_path[4] = "<img src='".$path[4]."'>";
        $img_path[5] = "<img src='".$path[5]."'>";

        for($i = 0; $i <= 5; $i++) {
            echo $img_path[$i] . "<br>";
        }

        return $img_path;
    }
}
