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
        // echo $search_gameinfo[0]->title;
        // echo $search_gameinfo[0]->release_maker;

        return view('result')->with([
            'software_type' => $software_type,
            'age_limit' => $age_limit,
            'publisher' => $publisher,
            'gameinfo' => $gameinfo,
            'image' => $image
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

        $image_dir = "download/" . $image_id;
        $result = array();
        $command = "find " . $image_dir . " -name '*.jpg' | wc -l";
        exec($command, $result);
        $image_count = $result[0];

        for($i = 1; $i <= $image_count; $i++) {
            $image[$i] = "<img src='/download/" . $image_id . "/00000" . $i . ".jpg'>";
        }

        return $image;
    }

    private function search_gameimg($search_gameinfo, $type) {

        $gameinfo["title"] = $this->title_releasemaker_strpos($search_gameinfo->title);
        $gameinfo["release_date"] = $search_gameinfo->release_date;
        $gameinfo["release_maker"] = $this->title_releasemaker_strpos($search_gameinfo->release_maker);
        $gameinfo["download"] = $this->download_check($search_gameinfo->download);
        $gameinfo["cero"] = $search_gameinfo->cero;

        if($type == 1) {
            $gameinfo["type"] = 1;
            $gameinfo["online"] = $this->online_check($search_gameinfo->online);
            $gameinfo["ranking"] = $this->ranking_check($search_gameinfo->ranking);
            $gameinfo["joycon_sideways"] = $this->joycon_check($search_gameinfo->joycon_sideways);
        }
        if($type == 2) {
            $gameinfo["type"] = 2;
            $gameinfo["online"] = $this->online_check($search_gameinfo->online);
            $gameinfo["ranking"] = $this->ranking_check($search_gameinfo->ranking);
        }
        if($type == 3) {
            $gameinfo["type"] = 3;
        }

        // echo "<br>";
        // foreach($gameinfo as $info) {
        //     echo $info . "<br>";
        // }

        return $gameinfo;
    }

    private function title_releasemaker_strpos($title) {

        if(strpos($title,'英語版') !== false) {
            $title = mb_substr($title, 0, -5);
        }
        if(strpos($title,'イタリア語版') !== false) {
            $title = mb_substr($title, 0, -8);
        }
        if(strpos($title,'フランス語版') !== false) {
            $title = mb_substr($title, 0, -8);
        }

        return $title;
    }

    private function download_check($download) {

        if($download === 1) {
            $download = "あり";
        } else {
            $download = "なし";
        }

        return $download;
    }

    private function online_check($online) {

        if(is_null($online) || $online === 0) {
            $online = "非対応";
        }
        if($online === 1) {
            $online = "対応";
        }
        if($online === 2) {
            $online = "Nintendo Switch Onlineに加入なしでもオンライン可";
        }

        return $online;
    }

    private function ranking_check($ranking) {

        if(is_null($ranking) || $ranking === 0) {
            $ranking = "非対応";
        }
        if($ranking === 1) {
            $ranking = "対応";
        }

        return $ranking;
    }

    private function joycon_check($joycon_sideways) {

        if($joycon_sideways === 0) {
            $joycon_sideways = "JOY CON横持ち非対応";
        }
        if($joycon_sideways === 1) {
            $joycon_sideways = "JOY CON横持ち対応";
        }
        if($joycon_sideways === 2) {
            $joycon_sideways = "JOY CON横持ち一部対応";
        }

        return $joycon_sideways;
    }
}
