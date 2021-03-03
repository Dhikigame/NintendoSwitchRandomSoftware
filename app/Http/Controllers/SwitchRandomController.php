<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwitchRandom;
use Storage;

class SwitchRandomController extends Controller
{
    // //
    // public function index() {
    //     return "hello";
    // }
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


    public function show($image_id) {
        $disk = Storage::disk('s3');

        $path[0] = $disk->url($image_id . '/000001.jpg');
        $img_path[0] = "<img src='".$path[0]."' ".$this->calc_image($path[0]).">";
        $path[1] = $disk->url($image_id . '/000002.jpg');
        $img_path[1] = "<img src='".$path[1]."' ".$this->calc_image($path[1]).">";
        $path[2] = $disk->url($image_id . '/000003.jpg');
        $img_path[2] = "<img src='".$path[2]."' ".$this->calc_image($path[2]).">";
        $path[3] = $disk->url($image_id . '/000004.jpg');
        $img_path[3] = "<img src='".$path[3]."' ".$this->calc_image($path[3]).">";
        $path[4] = $disk->url($image_id . '/000005.jpg');
        $img_path[4] = "<img src='".$path[4]."' ".$this->calc_image($path[4]).">";
        $path[5] = $disk->url($image_id . '/000006.jpg');
        $img_path[5] = "<img src='".$path[5]."' ".$this->calc_image($path[5]).">";

        return view('show', compact('img_path'));
    }

    public function index() {

        // SwitchRandomモデルのインスタンス化
        $md = new SwitchRandom();
        $releasemaker_gamecount = json_encode($md->ReleasemakerGamecountgetData());

        $gamecount[0] = $md->AllGamecount($releasemaker_gamecount);
        $gamecount[1] = $md->Gamecount_Cero_A_3($releasemaker_gamecount);
        $gamecount[2] = $md->Gamecount_Cero_7($releasemaker_gamecount) + $gamecount[1];
        $gamecount[3] = $md->Gamecount_Cero_B_12($releasemaker_gamecount) + $gamecount[2];
        $gamecount[4] = $md->Gamecount_Cero_C($releasemaker_gamecount) + $gamecount[3];
        $gamecount[5] = $md->Gamecount_Cero_16($releasemaker_gamecount) + $gamecount[4];
        $gamecount[6] = $md->Gamecount_Cero_D($releasemaker_gamecount) + $gamecount[5];
        $gamecount[7] = $md->Gamecount_Cero_Z($releasemaker_gamecount) + $gamecount[6];

        $gamecount[8] = $md->DownloadAllGamecount($releasemaker_gamecount);
        $gamecount[9] = $md->DownloadGamecount_Cero_A_3($releasemaker_gamecount);
        $gamecount[10] = $md->DownloadGamecount_Cero_7($releasemaker_gamecount) + $gamecount[9];
        $gamecount[11] = $md->DownloadGamecount_Cero_B_12($releasemaker_gamecount) + $gamecount[10];
        $gamecount[12] = $md->DownloadGamecount_Cero_C($releasemaker_gamecount) + $gamecount[11];
        $gamecount[13] = $md->DownloadGamecount_Cero_16($releasemaker_gamecount) + $gamecount[12];
        $gamecount[14] = $md->DownloadGamecount_Cero_D($releasemaker_gamecount) + $gamecount[13];
        $gamecount[15] = $md->DownloadGamecount_Cero_Z($releasemaker_gamecount) + $gamecount[14];

        $gamecount[16] = $md->PackageAllGamecount($releasemaker_gamecount);
        $gamecount[17] = $md->PackageGamecount_Cero_A_3($releasemaker_gamecount);
        $gamecount[18] = $md->PackageGamecount_Cero_7($releasemaker_gamecount) + $gamecount[17];
        $gamecount[19] = $md->PackageGamecount_Cero_B_12($releasemaker_gamecount) + $gamecount[18];
        $gamecount[20] = $md->PackageGamecount_Cero_C($releasemaker_gamecount) + $gamecount[19];
        $gamecount[21] = $md->PackageGamecount_Cero_16($releasemaker_gamecount) + $gamecount[20];
        $gamecount[22] = $md->PackageGamecount_Cero_D($releasemaker_gamecount) + $gamecount[21];
        $gamecount[23] = $md->PackageGamecount_Cero_Z($releasemaker_gamecount) + $gamecount[22];

        $gamecount = json_encode($gamecount);

        // return view('index', compact('test'));
        return view('index')->with([
            'releasemaker_gamecount' => $releasemaker_gamecount,
            'gamecount' => $gamecount,
            // 'allgamecount' => $allgamecount,
            // 'gamecount_cero_A_3' => $gamecount_cero_A_3,
            // 'gamecount_cero_7' => $gamecount_cero_7,
            // 'gamecount_cero_B_12' => $gamecount_cero_B_12,
            // 'gamecount_cero_C' => $gamecount_cero_C,
            // 'gamecount_cero_16' => $gamecount_cero_16,
            // 'gamecount_cero_D' => $gamecount_cero_D,
            // 'gamecount_cero_Z' => $gamecount_cero_Z,
        ]);
    }
}
