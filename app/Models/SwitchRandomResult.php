<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SwitchRandomResult extends SwitchRandom
{

    private function db() {
        $query = DB::table($this->switch_software_releasemaker_gamecount);
        return $query;
    }

    // 販売メーカーを取得
    public function ReleaseMakerSearch($publisher_num=0) {
        $query = $this->db();
        $release_maker_top20 = $query->orderby('cero_all', 'desc')->select('release_maker')->limit(20)->get();
        if($publisher_num !== 0) {
            $release_maker = $release_maker_top20[$publisher_num-1]->release_maker;
        } else {
            $release_maker = "ALL";
        }

        return $release_maker;
    }

    // 販売メーカー・年齢制限・ゲーム種別からランダムでゲームを1件検索する
    public function GameRandomSearch($searchcolumn="ALL", $publisher=0) {
        $query = $this->db();
        $search_gamecount = $this->GameRandomSearchCount($searchcolumn, $publisher);
        echo $search_gamecount;
    }

    private function GameRandomSearchCount($searchcolumn="cero_all", $release_maker="ALL") {

        $search_gamecount = $this->SearchGamecountCeroSum($searchcolumn, $release_maker);

        return $search_gamecount;
    }

    public function SearchGamecountAllCeroSum($searchcolumn="cero_all", $release_maker="ALL") {
        $query = $this->db();
        $search_gamecount = 0;
        echo $searchcolumn;
        echo $release_maker;
        // 個別メーカー検索
        if($searchcolumn === "cero_all" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
        }
        if($searchcolumn === "cero_A_3" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
        }
        if($searchcolumn === "cero_7" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_B_12" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_C" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_16" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_D" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_16")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_Z" && $release_maker !== "ALL") {
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount = $search_gamecount_tmp;
        }
        // 個別メーカー検索なし
        if($searchcolumn === "cero_all" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
        }
        if($searchcolumn === "cero_A_3" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
        }
        if($searchcolumn === "cero_7" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("cero_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_B_12" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("cero_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_C" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("cero_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_16" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("cero_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_D" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("cero_16")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_Z" && $release_maker === "ALL") {
            $search_gamecount_tmp = $query->sum($searchcolumn);
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount = $search_gamecount_tmp;
        }

        echo $search_gamecount;

        return $search_gamecount;
    }

    public function SearchGamecountPackageCeroSum($searchcolumn="cero_all", $release_maker="ALL") {
        $query = $this->db();
        $search_gamecount = 0;
        echo $searchcolumn;
        echo $release_maker;
        // 個別メーカー検索
        if($searchcolumn === "type1_all" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
        }
        if($searchcolumn === "type1_A_3" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
        }
        if($searchcolumn === "type1_7" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_B_12" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_C" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_16" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_D" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_16")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_Z" && $release_maker !== "ALL") {
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount = $search_gamecount_tmp;
        }
        // 個別メーカー検索なし
        if($searchcolumn === "type1_all" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
        }
        if($searchcolumn === "type1_A_3" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
        }
        if($searchcolumn === "type1_7" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("type1_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_B_12" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("type1_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_C" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("type1_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_16" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("type1_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_D" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("type1_16")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_Z" && $release_maker === "ALL") {
            $search_gamecount_tmp = $query->sum($searchcolumn);
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount = $search_gamecount_tmp;
        }

        echo $search_gamecount;

        return $search_gamecount;
    }

    public function SearchGamecountDownloadCeroSum($searchcolumn="cero_all", $release_maker="ALL") {
        $query = $this->db();
        $search_gamecount = 0;
        echo $searchcolumn;
        echo $release_maker;
        // 個別メーカー検索
        if($searchcolumn === "download_all" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
        }
        if($searchcolumn === "download_A_3" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
        }
        if($searchcolumn === "download_7" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_B_12" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_C" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_C;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_B_12")->get()[0]->download_B_12;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_7")->get()[0]->download_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_A_3")->get()[0]->download_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_16" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_D" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_16")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_B_12")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_7")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_A_3")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_Z" && $release_maker !== "ALL") {
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select($searchcolumn)->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount = $search_gamecount_tmp;
        }
        // 個別メーカー検索なし
        if($searchcolumn === "download_all" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
        }
        if($searchcolumn === "download_A_3" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
        }
        if($searchcolumn === "download_7" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("download_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_B_12" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("download_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_C" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("download_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_16" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("download_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_D" && $release_maker === "ALL") {
            $search_gamecount = $query->sum($searchcolumn);
            $search_gamecount_tmp = $query->sum("download_16")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_C")->get();
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_B_12");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_7");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_A_3");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_Z" && $release_maker === "ALL") {
            $search_gamecount_tmp = $query->sum($searchcolumn);
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount = $search_gamecount_tmp;
        }

        echo $search_gamecount;

        return $search_gamecount;
    }
}
