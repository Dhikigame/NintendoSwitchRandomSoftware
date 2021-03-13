<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SwitchRandomResult extends SwitchRandom
{
    // ゲームのランダム検索のためのクエリ
    private $search_game_result_query;
    protected $switch_software_data = 'switch_software_data';

    private function db() {
        $query = DB::table($this->switch_software_releasemaker_gamecount);
        return $query;
    }

    private function db_switch_software_data() {
        $query = DB::table($this->switch_software_data);
        return $query;
    }

    // 販売メーカーを取得
    public function ReleaseMakerSearch($publisher_num=0) {
        $query = $this->db();
        $release_maker_top20 = $query->orderby('cero_all', 'desc')->select('release_maker')->limit(20)->get();
        if($publisher_num != 0) {
            $release_maker = $release_maker_top20[$publisher_num-1]->release_maker;
        } else {
            $release_maker = "ALL";
        }

        return $release_maker;
    }

    // 販売メーカー・年齢制限・ゲーム種別からランダムでゲームを1件検索する
    public function GameRandomSearch($search_gamecount=0, $age_limit="ALL_cero", $release_maker="ALL") {
        $query = $this->db_switch_software_data();

        $search_gamecount_rand = rand(0, $search_gamecount);

        $release_maker = $this->releasemaker_conv($release_maker);
        $this->search_game_result_query = $query->where('release_maker', $release_maker);

        $cero = $this->cero_conv($age_limit);

        $search_game_result = $this->search_game_result_query->offset($search_gamecount_rand)->limit(1)->get();
        var_dump($search_game_result);
    }

    private function cero_conv($age_limit="ALL_cero") {

        if($age_limit == "ALL_cero") {
            $cero[0] = null;
        }
        if($age_limit == "A3+") {
            $cero[0] = "A";
            $cero[1] = "3+";
            $this->search_game_result_query = $this->search_game_result_query
            ->where('cero', 'LIKE', $cero[0])
            ->orwhere('cero', 'LIKE', $cero[1]);
        }
        if($age_limit == "7+") {
            $cero[0] = "A";
            $cero[1] = "3+";
            $cero[2] = "7+";
            $this->search_game_result_query = $this->search_game_result_query
            ->where('cero', 'LIKE', $cero[0])
            ->orwhere('cero', 'LIKE', $cero[1])
            ->orwhere('cero', 'LIKE', $cero[2]);
        }
        if($age_limit == "B12+") {
            $cero[0] = "A";
            $cero[1] = "3+";
            $cero[2] = "7+";
            $cero[3] = "B";
            $cero[4] = "12+";
            $this->search_game_result_query = $this->search_game_result_query
            ->where('cero', 'LIKE', $cero[0])
            ->orwhere('cero', 'LIKE', $cero[1])
            ->orwhere('cero', 'LIKE', $cero[2])
            ->orwhere('cero', 'LIKE', $cero[3])
            ->orwhere('cero', 'LIKE', $cero[4]);
        }
        if($age_limit == "C+") {
            $cero[0] = "A";
            $cero[1] = "3+";
            $cero[2] = "7+";
            $cero[3] = "B";
            $cero[4] = "12+";
            $cero[5] = "C";
            $this->search_game_result_query = $this->search_game_result_query
            ->where('cero', 'LIKE', $cero[0])
            ->orwhere('cero', 'LIKE', $cero[1])
            ->orwhere('cero', 'LIKE', $cero[2])
            ->orwhere('cero', 'LIKE', $cero[3])
            ->orwhere('cero', 'LIKE', $cero[4])
            ->orwhere('cero', 'LIKE', $cero[5]);
        }
        if($age_limit == "16+") {
            $cero[0] = "A";
            $cero[1] = "3+";
            $cero[2] = "7+";
            $cero[3] = "B";
            $cero[4] = "12+";
            $cero[5] = "C";
            $cero[6] = "16+";
            $this->search_game_result_query = $this->search_game_result_query
            ->where('cero', 'LIKE', $cero[0])
            ->orwhere('cero', 'LIKE', $cero[1])
            ->orwhere('cero', 'LIKE', $cero[2])
            ->orwhere('cero', 'LIKE', $cero[3])
            ->orwhere('cero', 'LIKE', $cero[4])
            ->orwhere('cero', 'LIKE', $cero[5])
            ->orwhere('cero', 'LIKE', $cero[6]);
        }
        if($age_limit == "D+") {
            $cero[0] = "A";
            $cero[1] = "3+";
            $cero[2] = "7+";
            $cero[3] = "B";
            $cero[4] = "12+";
            $cero[5] = "C";
            $cero[6] = "16+";
            $cero[7] = "D";
            $this->search_game_result_query = $this->search_game_result_query
            ->where('cero', 'LIKE', $cero[0])
            ->orwhere('cero', 'LIKE', $cero[1])
            ->orwhere('cero', 'LIKE', $cero[2])
            ->orwhere('cero', 'LIKE', $cero[3])
            ->orwhere('cero', 'LIKE', $cero[4])
            ->orwhere('cero', 'LIKE', $cero[5])
            ->orwhere('cero', 'LIKE', $cero[6])
            ->orwhere('cero', 'LIKE', $cero[7]);
        }
        if($age_limit == "Z18+") {
            $cero[0] = "Z";
            $cero[1] = "18+";
            $this->search_game_result_query = $this->search_game_result_query
            ->where('cero', 'LIKE', $cero[0])
            ->orwhere('cero', 'LIKE', $cero[1]);
        }

        return $cero;
    }

    private function releasemaker_conv($release_maker="ALL") {

        if($release_maker == "ALL") {
            $release_maker = null;
        }

        return $release_maker;
    }

    public function SearchGamecountAllCeroSum($searchcolumn="cero_all", $release_maker="ALL") {
        $query = $this->db();
        $search_gamecount = 0;

        // 個別メーカー検索
        if($searchcolumn === "cero_all" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_all;
        }
        if($searchcolumn === "cero_A_3" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_A_3;
        }
        if($searchcolumn === "cero_7" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_7;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get()[0]->cero_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_B_12" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_B_12;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get()[0]->cero_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get()[0]->cero_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_C" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_C;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_B_12")->get()[0]->cero_B_12;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get()[0]->cero_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get()[0]->cero_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_16" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_16;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_C")->get()[0]->cero_C;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_B_12")->get()[0]->cero_B_12;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get()[0]->cero_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get()[0]->cero_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_D" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_D;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_16")->get()[0]->cero_16;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_C")->get()[0]->cero_C;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_B_12")->get()[0]->cero_B_12;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_7")->get()[0]->cero_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("cero_A_3")->get()[0]->cero_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "cero_Z" && $release_maker !== "ALL") {
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->cero_Z;
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
            $search_gamecount_tmp = $query->sum("cero_C");
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
            $search_gamecount_tmp = $query->sum("cero_16");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("cero_C");
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

        return $search_gamecount;
    }

    public function SearchGamecountPackageCeroSum($searchcolumn="cero_all", $release_maker="ALL") {
        $query = $this->db();
        $search_gamecount = 0;

        // 個別メーカー検索
        if($searchcolumn === "type1_all" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_all;
        }
        if($searchcolumn === "type1_A_3" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->type1_A_3;
        }
        if($searchcolumn === "type1_7" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->type1_7;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get()[0]->type1_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_B_12" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->type1_B_12;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get()[0]->type1_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get()[0]->type1_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_C" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()->type1_C;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_B_12")->get()->type1_B_12;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get()[0]->type1_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get()[0]->type1_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_16" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()->type1_16;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_C")->get()->type1_C;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_B_12")->get()->type1_B_12;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get()[0]->type1_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get()[0]->type1_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_D" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()->type1_D;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_16")->get()->type1_16;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_C")->get()->type1_C;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_B_12")->get()->type1_B_12;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_7")->get()[0]->type1_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("type1_A_3")->get()[0]->type1_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "type1_Z" && $release_maker !== "ALL") {
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()->type1_Z;
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
            $search_gamecount_tmp = $query->sum("type1_C");
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
            $search_gamecount_tmp = $query->sum("type1_16");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("type1_C");
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

        return $search_gamecount;
    }

    public function SearchGamecountDownloadCeroSum($searchcolumn="cero_all", $release_maker="ALL") {
        $query = $this->db();
        $search_gamecount = 0;

        // 個別メーカー検索
        if($searchcolumn === "download_all" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_all;
        }
        if($searchcolumn === "download_A_3" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_A_3;
        }
        if($searchcolumn === "download_7" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_7;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_A_3")->get()[0]->download_A_3;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
        }
        if($searchcolumn === "download_B_12" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_B_12;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_7")->get()[0]->download_7;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_A_3")->get()[0]->download_A_3;
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
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_16;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_C")->get()[0]->download_C;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
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
        if($searchcolumn === "download_D" && $release_maker !== "ALL") {
            $search_gamecount = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_D;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_16")->get()[0]->download_16;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select("download_C")->get()[0]->download_C;
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
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
        if($searchcolumn === "download_Z" && $release_maker !== "ALL") {
            $search_gamecount_tmp = $query->where('release_maker', $release_maker)->select($searchcolumn)->get()[0]->download_Z;
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
            $search_gamecount_tmp = $query->sum("download_C");
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
            $search_gamecount_tmp = $query->sum("download_16");
            $search_gamecount_tmp == null ? $search_gamecount_tmp = 0 : 1;
            $search_gamecount += $search_gamecount_tmp;
            $search_gamecount_tmp = $query->sum("download_C");
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

        return $search_gamecount;
    }
}
