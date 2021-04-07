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
        // var_dump($search_gameinfo);
        $search_gameimg = $this->search_gameimg($search_gameinfo);

        $image_id = $search_gameinfo[0]->id;
        $image_title = $search_gameinfo[0]->title;
        

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

    private function search_gameimg($search_gameinfo) {

        $image_id = $search_gameinfo[0]->id;
        $image_title = $search_gameinfo[0]->title;
        echo $image_id ."<br>";
        echo $image_title ."<br>";
        // $image_pass = $this->image_pass();
        // $image_pass = Storage::disk('darwin_thumbnail')->files($image_id);
        // $image_pass = Storage::disk('darwin_thumbnail')->files($image_id);
        // print_r($image_pass);
        // $i = 0;
        // foreach($image_pass as $file){
        //     $img_path[$i] = Storage::disk('darwin_thumbnail')->url($file).'';
        //     $i++;
        // }
        // echo $search_gameinfo[0]->title . "<br>";
        // print_r($img_path[0]);

        // echo "<img src='".$img_path[0]."'>";
        // $jpegFile = scandir("/download/" . $image_id . "/*.jpg");
        // echo count($jpegFile);
        $image_dir = "download/" . $image_id;
        $result = array();
        $command = "find " . $image_dir . " -name '*.jpg' | wc -l";
        exec($command, $result);
        $image_count = $result[0];

        for($i = 1; $i <= $image_count; $i++) {
            $image[$i] = "<img src='/download/" . $image_id . "/00000" . $i . ".jpg'>";
            echo $image[$i];
        }
        // echo "<img src='/download/" . $image_id . "/000001.jpg'>";
        // echo "<img src='/download/" . $image_id . "/000002.jpg'>";
        // echo "<img src='/download/" . $image_id . "/000003.jpg'>";
        // echo "<img src='/download/" . $image_id . "/000004.jpg'>";
        // echo "<img src='/download/" . $image_id . "/000005.jpg'>";
        // echo "<img src='/download/" . $image_id . "/000006.jpg'>";
        // echo "<img src='/download/" . $image_id . "/000007.jpg'>";
        // echo "<img src='".$image_pass."'>";
        // $path[0] = $image_pass . $image_id . '/000001.jpg';
        // $path[0] = $image_pass->files($image_id)->url('/000001.jpg');
        // $response = @file_get_contents($path[0], NULL, NULL, 0, 1);
        // $img_path[0] = "<img src='".$path[0]."'>";
        // echo $img_path[0] . "<br>";
        // if ($response !== false) {
        //     $img_path[0] = "<img src='".$path[0]."' ".$this->calc_image($path[0]).">";
        //     echo $img_path[0] . "<br>";
        // }

        // $path[1] = $disk->url($image_id . '/000002.jpg');
        // $response = @file_get_contents($path[1], NULL, NULL, 0, 1);
        // if ($response !== false) {
        //     $img_path[1] = "<img src='".$path[1]."' ".$this->calc_image($path[1]).">";
        //     echo $img_path[1] . "<br>";
        // }

        // $path[2] = $disk->url($image_id . '/000003.jpg');
        // $response = @file_get_contents($path[2], NULL, NULL, 0, 1);
        // if ($response !== false) {
        //     $img_path[2] = "<img src='".$path[2]."' ".$this->calc_image($path[2]).">";
        //     echo $img_path[2] . "<br>";
        // }

        // $path[3] = $disk->url($image_id . '/000004.jpg');
        // $response = @file_get_contents($path[3], NULL, NULL, 0, 1);
        // if ($response !== false) {
        //     $img_path[3] = "<img src='".$path[3]."' ".$this->calc_image($path[3]).">";
        //     echo $img_path[3] . "<br>";
        // }

        // $path[4] = $disk->url($image_id . '/000005.jpg');
        // $response = @file_get_contents($path[4], NULL, NULL, 0, 1);
        // if ($response !== false) {
        //     $img_path[4] = "<img src='".$path[4]."' ".$this->calc_image($path[4]).">";
        //     echo $img_path[4] . "<br>";
        // }

        // $path[5] = $disk->url($image_id . '/000006.jpg');
        // $response = @file_get_contents($path[5], NULL, NULL, 0, 1);
        // if ($response !== false) {
        //     $img_path[5] = "<img src='".$path[5]."' ".$this->calc_image($path[5]).">";
        //     echo $img_path[5] . "<br>";
        // }

        // $path[6] = $disk->url($image_id . '/000006.jpg');
        // $response = @file_get_contents($path[6], NULL, NULL, 0, 1);
        // if ($response !== false) {
        //     $img_path[6] = "<img src='".$path[6]."' ".$this->calc_image($path[5]).">";
        //     echo $img_path[6] . "<br>";
        // }
        // $img_path[0] = "<img src='".$path[0]."'>";
        // $img_path[1] = "<img src='".$path[1]."'>";
        // $img_path[2] = "<img src='".$path[2]."'>";
        // $img_path[3] = "<img src='".$path[3]."'>";
        // $img_path[4] = "<img src='".$path[4]."'>";
        // $img_path[5] = "<img src='".$path[5]."'>";
        // $img_path[6] = "<img src='".$path[5]."'>";

        // return $img_path;
    }
}
