<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwitchRandomResult;
use Storage;

class SwitchRandomResultController extends Controller
{

    // public function show($image_id) {
    //     $disk = Storage::disk('s3');

    //     $path[0] = $disk->url($image_id . '/000001.jpg');
    //     $img_path[0] = "<img src='".$path[0]."' ".$this->calc_image($path[0]).">";
    //     $path[1] = $disk->url($image_id . '/000002.jpg');
    //     $img_path[1] = "<img src='".$path[1]."' ".$this->calc_image($path[1]).">";
    //     $path[2] = $disk->url($image_id . '/000003.jpg');
    //     $img_path[2] = "<img src='".$path[2]."' ".$this->calc_image($path[2]).">";
    //     $path[3] = $disk->url($image_id . '/000004.jpg');
    //     $img_path[3] = "<img src='".$path[3]."' ".$this->calc_image($path[3]).">";
    //     $path[4] = $disk->url($image_id . '/000005.jpg');
    //     $img_path[4] = "<img src='".$path[4]."' ".$this->calc_image($path[4]).">";
    //     $path[5] = $disk->url($image_id . '/000006.jpg');
    //     $img_path[5] = "<img src='".$path[5]."' ".$this->calc_image($path[5]).">";

    //     return view('show', compact('img_path'));
    // }

    public function result(Request $request) {

        $software_type = $request->software_type;
        $age_limit = $request->age_limit;
        $publisher = $request->publisher;

        // SwitchRandomモデルのインスタンス化
        $md = new SwitchRandomResult();
        
        $release_maker = $md->ReleaseMakerSearch($publisher);
        $search_gamecount = $this->searchcolumn_gamecount($software_type, $age_limit, $release_maker, $md);
        $search_gameinfo = $md->GameRandomSearch($search_gamecount, $age_limit, $release_maker, $software_type);

        $gameinfo = $this->search_gameimg($search_gameinfo[0], $search_gameinfo[0]->type);
        $image = $this->image_search($search_gameinfo[0]);


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

    private function image_pass() {

        if(PHP_OS === "Darwin") {
            return Storage::disk('darwin_thumbnail');
        } else {
            return Storage::disk('linux_thumbnail');
        }
    } 

    private function image_search($search_gameinfo) {

        $image_id = $search_gameinfo->id;
        $image_title = $search_gameinfo->title;
        echo $image_id ."<br>";
        echo $image_title ."<br>";

        $image_dir = "download/" . $image_id;
        $result = array();
        $command = "find " . $image_dir . " -name '*.jpg' | wc -l";
        exec($command, $result);
        $image_count = $result[0];

        for($i = 1; $i < $image_count; $i++) {
            $image[$i] = "<img src='/download/" . $image_id . "/00000" . $i . ".jpg'>";
            echo $image[$i];
        }

        return $image;
    }

    private function search_gameimg($search_gameinfo, $type) {

        $gameinfo[0] = $search_gameinfo->title;
        $gameinfo[1] = $search_gameinfo->release_date;
        $gameinfo[2] = $search_gameinfo->release_maker;
        $gameinfo[3] = $search_gameinfo->download;
        $gameinfo[4] = $search_gameinfo->cero;

        if($type == 1) {
            $gameinfo[5] = $search_gameinfo->online;
            $gameinfo[6] = $search_gameinfo->ranking;
            $gameinfo[7] = $search_gameinfo->joycon_sideways;
        }
        if($type == 2) {
            $gameinfo[5] = $search_gameinfo->online;
            $gameinfo[6] = $search_gameinfo->ranking;
        }

        echo "<br>";
        foreach($gameinfo as $info) {
            echo $info . "<br>";
        }

        return $gameinfo;
    }
}
