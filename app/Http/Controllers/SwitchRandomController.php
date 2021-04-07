<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SwitchRandom;
use Storage;


class SwitchRandomController extends Controller
{

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

        // ゲームのリリース数を取得
        $gamecount = $this->gamecount($md);

        $gamecount = json_encode($gamecount);

        return view('index')->with([
            'gamecount' => $gamecount,
        ]);
    }

    private function gamecount($md) {

        $gamecount = [];        
        $gamecount = $this->gametype_cero_gamecount($md, $gamecount);
        $gamecount = $this->releasemakertop20_gamecount($md, $gamecount);
        $gamecount = $this->releasemakertop20_package_gamecount($md, $gamecount);
        $gamecount = $this->releasemakertop20_download_gamecount($md, $gamecount);

        // for($i = 0; $i <= 23; $i++) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }

        // for($i = 24; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 25; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 26; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 27; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 28; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 29; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 30; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 31; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 32; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 33; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 34; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 35; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 36; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 37; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 38; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 39; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 40; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 41; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 42; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }
        // for($i = 43; $i < count($gamecount); $i = $i + 20) {
        //     echo $i . " " . $gamecount[$i] . "<br>";
        // }



        return $gamecount;
    }

    private function gametype_cero_gamecount($md) {

        $gamecount[0] = $md->AllGamecount();
        $gamecount[1] = $md->Gamecount_Cero_A_3();
        $gamecount[2] = $md->Gamecount_Cero_7() + $gamecount[1];
        $gamecount[3] = $md->Gamecount_Cero_B_12() + $gamecount[2];
        $gamecount[4] = $md->Gamecount_Cero_C() + $gamecount[3];
        $gamecount[5] = $md->Gamecount_Cero_16() + $gamecount[4];
        $gamecount[6] = $md->Gamecount_Cero_D() + $gamecount[5];
        $gamecount[7] = $md->Gamecount_Cero_Z();

        $gamecount[8] = $md->PackageAllGamecount();
        $gamecount[9] = $md->PackageGamecount_Cero_A_3();
        $gamecount[10] = $md->PackageGamecount_Cero_7() + $gamecount[9];
        $gamecount[11] = $md->PackageGamecount_Cero_B_12() + $gamecount[10];
        $gamecount[12] = $md->PackageGamecount_Cero_C() + $gamecount[11];
        $gamecount[13] = $md->PackageGamecount_Cero_16() + $gamecount[12];
        $gamecount[14] = $md->PackageGamecount_Cero_D() + $gamecount[13];
        $gamecount[15] = $md->PackageGamecount_Cero_Z();

        $gamecount[16] = $md->DownloadAllGamecount();
        $gamecount[17] = $md->DownloadGamecount_Cero_A_3();
        $gamecount[18] = $md->DownloadGamecount_Cero_7() + $gamecount[17];
        $gamecount[19] = $md->DownloadGamecount_Cero_B_12() + $gamecount[18];
        $gamecount[20] = $md->DownloadGamecount_Cero_C() + $gamecount[19];
        $gamecount[21] = $md->DownloadGamecount_Cero_16() + $gamecount[20];
        $gamecount[22] = $md->DownloadGamecount_Cero_D() + $gamecount[21];
        $gamecount[23] = $md->DownloadGamecount_Cero_Z();

        return $gamecount;
    }

    private function releasemakertop20_gamecount($md, $gamecount) {

        $gamecount_sub = count($gamecount);
        $ReleaseMakerNameTop20 = $md->ReleaseMakerNameTop20();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerNameTop20); $ranking_count++) {
            $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerNameTop20[$ranking_count]->release_maker;
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20 = $md->ReleaseMakerGameCountTop20();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20); $ranking_count++) {
            if($ReleaseMakerGameCountTop20[$ranking_count]->cero_all == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20[$ranking_count]->cero_all;
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20_Cero_A_3 = $md->ReleaseMakerGameCountTop20_Cero_A_3();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20_Cero_A_3); $ranking_count++) {
            if($ReleaseMakerGameCountTop20_Cero_A_3[$ranking_count]->cero_A_3 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20_Cero_A_3[$ranking_count]->cero_A_3;
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20_Cero_7 = $md->ReleaseMakerGameCountTop20_Cero_7();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20_Cero_7); $ranking_count++) {
            if($ReleaseMakerGameCountTop20_Cero_7[$ranking_count]->cero_7 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20_Cero_7[$ranking_count]->cero_7 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20_Cero_B_12 = $md->ReleaseMakerGameCountTop20_Cero_B_12();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20_Cero_B_12); $ranking_count++) {
            if($ReleaseMakerGameCountTop20_Cero_B_12[$ranking_count]->cero_B_12 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20_Cero_B_12[$ranking_count]->cero_B_12 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20_Cero_C = $md->ReleaseMakerGameCountTop20_Cero_C();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20_Cero_C); $ranking_count++) {
            if($ReleaseMakerGameCountTop20_Cero_C[$ranking_count]->cero_C == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20_Cero_C[$ranking_count]->cero_C + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20_Cero_16 = $md->ReleaseMakerGameCountTop20_Cero_16();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20_Cero_16); $ranking_count++) {
            if($ReleaseMakerGameCountTop20_Cero_16[$ranking_count]->cero_16 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20_Cero_16[$ranking_count]->cero_16 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20_Cero_D = $md->ReleaseMakerGameCountTop20_Cero_D();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20_Cero_D); $ranking_count++) {
            if($ReleaseMakerGameCountTop20_Cero_D[$ranking_count]->cero_D == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20_Cero_D[$ranking_count]->cero_D + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerGameCountTop20_Cero_Z = $md->ReleaseMakerGameCountTop20_Cero_Z();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerGameCountTop20_Cero_Z); $ranking_count++) {
            if($ReleaseMakerGameCountTop20_Cero_Z[$ranking_count]->cero_Z == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerGameCountTop20_Cero_Z[$ranking_count]->cero_Z;
            }
        }

        return $gamecount;
    }

    private function releasemakertop20_package_gamecount($md, $gamecount) {

        $gamecount_sub = count($gamecount);
        $ReleaseMakerPackageGameCountTop20 = $md->ReleaseMakerPackageGameCountTop20();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20[$ranking_count]->type1_all == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20[$ranking_count]->type1_all;
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerPackageGameCountTop20_Cero_A_3 = $md->ReleaseMakerPackageGameCountTop20_Cero_A_3();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20_Cero_A_3); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20_Cero_A_3[$ranking_count]->type1_A_3 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20_Cero_A_3[$ranking_count]->type1_A_3;
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerPackageGameCountTop20_Cero_7 = $md->ReleaseMakerPackageGameCountTop20_Cero_7();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20_Cero_7); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20_Cero_7[$ranking_count]->type1_7 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20_Cero_7[$ranking_count]->type1_7 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerPackageGameCountTop20_Cero_B_12 = $md->ReleaseMakerPackageGameCountTop20_Cero_B_12();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20_Cero_B_12); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20_Cero_B_12[$ranking_count]->type1_B_12 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20_Cero_B_12[$ranking_count]->type1_B_12 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerPackageGameCountTop20_Cero_C = $md->ReleaseMakerPackageGameCountTop20_Cero_C();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20_Cero_C); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20_Cero_C[$ranking_count]->type1_C == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20_Cero_C[$ranking_count]->type1_C + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerPackageGameCountTop20_Cero_16 = $md->ReleaseMakerPackageGameCountTop20_Cero_16();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20_Cero_16); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20_Cero_16[$ranking_count]->type1_16 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20_Cero_16[$ranking_count]->type1_16 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerPackageGameCountTop20_Cero_D = $md->ReleaseMakerPackageGameCountTop20_Cero_D();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20_Cero_D); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20_Cero_D[$ranking_count]->type1_D == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20_Cero_D[$ranking_count]->type1_D + $gamecount[$ranking_count+$gamecount_sub-20];       
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerPackageGameCountTop20_Cero_Z = $md->ReleaseMakerPackageGameCountTop20_Cero_Z();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerPackageGameCountTop20_Cero_Z); $ranking_count++) {
            if($ReleaseMakerPackageGameCountTop20_Cero_Z[$ranking_count]->type1_Z == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerPackageGameCountTop20_Cero_Z[$ranking_count]->type1_Z;
            }
        }

        return $gamecount;
    }

    private function releasemakertop20_download_gamecount($md, $gamecount) {
        
        $gamecount_sub = count($gamecount);
        $ReleaseMakerDownloadGameCountTop20 = $md->ReleaseMakerDownloadGameCountTop20();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20[$ranking_count]->download_all == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20[$ranking_count]->download_all;
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerDownloadGameCountTop20_Cero_A_3 = $md->ReleaseMakerDownloadGameCountTop20_Cero_A_3();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20_Cero_A_3); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20_Cero_A_3[$ranking_count]->download_A_3 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20_Cero_A_3[$ranking_count]->download_A_3;
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerDownloadGameCountTop20_Cero_7 = $md->ReleaseMakerDownloadGameCountTop20_Cero_7();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20_Cero_7); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20_Cero_7[$ranking_count]->download_7 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20_Cero_7[$ranking_count]->download_7 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerDownloadGameCountTop20_Cero_B_12 = $md->ReleaseMakerDownloadGameCountTop20_Cero_B_12();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20_Cero_B_12); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20_Cero_B_12[$ranking_count]->download_B_12 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20_Cero_B_12[$ranking_count]->download_B_12 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerDownloadGameCountTop20_Cero_C = $md->ReleaseMakerDownloadGameCountTop20_Cero_C();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20_Cero_C); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20_Cero_C[$ranking_count]->download_C == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20_Cero_C[$ranking_count]->download_C + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerDownloadGameCountTop20_Cero_16 = $md->ReleaseMakerDownloadGameCountTop20_Cero_16();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20_Cero_16); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20_Cero_16[$ranking_count]->download_16 == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20_Cero_16[$ranking_count]->download_16 + $gamecount[$ranking_count+$gamecount_sub-20];
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerDownloadGameCountTop20_Cero_D = $md->ReleaseMakerDownloadGameCountTop20_Cero_D();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20_Cero_D); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20_Cero_D[$ranking_count]->download_D == null) {
                $gamecount[$ranking_count+$gamecount_sub] = $gamecount[$ranking_count+$gamecount_sub-20];
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20_Cero_D[$ranking_count]->download_D + $gamecount[$ranking_count+$gamecount_sub-20];        
            }
        }
        $gamecount_sub += $ranking_count;
        $ReleaseMakerDownloadGameCountTop20_Cero_Z = $md->ReleaseMakerDownloadGameCountTop20_Cero_Z();
        for($ranking_count = 0; $ranking_count < count($ReleaseMakerDownloadGameCountTop20_Cero_Z); $ranking_count++) {
            if($ReleaseMakerDownloadGameCountTop20_Cero_Z[$ranking_count]->download_Z == null) {
                $gamecount[$ranking_count+$gamecount_sub] = 0;
            } else {
                $gamecount[$ranking_count+$gamecount_sub] = $ReleaseMakerDownloadGameCountTop20_Cero_Z[$ranking_count]->download_Z;
            }
        }

        return $gamecount;
    }
}
