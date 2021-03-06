<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SwitchRandom extends Model {

    // 発売メーカーのゲームソフト数のリリース数とCERO・IRACごとの数含める
    protected $switch_software_releasemaker_gamecount = 'switch_software_releasemaker_gamecount';

    private function db() {
        $query = DB::table($this->switch_software_releasemaker_gamecount);
        return $query;
    }

    public function ReleasemakerGamecountgetData($type=null) {
        $query = $this->db();
        $data = $query->get();

        return $data;
    }

    // 全てのゲームのカウント
    public function AllGamecount($type=null) {
        $query = $this->db();
        $allgamecount = $query->where('cero_all', "<>" , NULL)->sum('cero_all');

        return $allgamecount;
    }
    public function Gamecount_Cero_A_3($type=null) {
        $query = $this->db();
        $gamecount = $query->where('cero_A_3', "<>" , NULL)->sum('cero_A_3');

        return $gamecount;
    }
    public function Gamecount_Cero_7($type=null) {
        $query = $this->db();
        $gamecount = $query->where('cero_7', "<>" , NULL)->sum('cero_7');

        return $gamecount;
    }
    public function Gamecount_Cero_B_12($type=null) {
        $query = $this->db();
        $gamecount = $query->where('cero_B_12', "<>" , NULL)->sum('cero_B_12');

        return $gamecount;
    }
    public function Gamecount_Cero_C($type=null) {
        $query = $this->db();
        $gamecount = $query->where('cero_C', "<>" , NULL)->sum('cero_C');

        return $gamecount;
    }
    public function Gamecount_Cero_16($type=null) {
        $query = $this->db();
        $gamecount = $query->where('cero_16', "<>" , NULL)->sum('cero_16');

        return $gamecount;
    }
    public function Gamecount_Cero_D($type=null) {
        $query = $this->db();
        $gamecount = $query->where('cero_D', "<>" , NULL)->sum('cero_D');

        return $gamecount;
    }
    public function Gamecount_Cero_Z($type=null) {
        $query = $this->db();
        $gamecount = $query->where('cero_Z', "<>" , NULL)->sum('cero_Z');

        return $gamecount;
    }

    // ダウンロードのゲームのカウント
    public function DownloadAllGamecount($type=null) {
        $query = $this->db();
        $allgamecount = $query->where('download_all', "<>" , NULL)->sum('download_all');

        return $allgamecount;
    }
    public function DownloadGamecount_Cero_A_3($type=null) {
        $query = $this->db();
        $gamecount = $query->where('download_A_3', "<>" , NULL)->sum('download_A_3');

        return $gamecount;
    }
    public function DownloadGamecount_Cero_7($type=null) {
        $query = $this->db();
        $gamecount = $query->where('download_7', "<>" , NULL)->sum('download_7');

        return $gamecount;
    }
    public function DownloadGamecount_Cero_B_12($type=null) {
        $query = $this->db();
        $gamecount = $query->where('download_B_12', "<>" , NULL)->sum('download_B_12');

        return $gamecount;
    }
    public function DownloadGamecount_Cero_C($type=null) {
        $query = $this->db();
        $gamecount = $query->where('download_C', "<>" , NULL)->sum('download_C');

        return $gamecount;
    }
    public function DownloadGamecount_Cero_16($type=null) {
        $query = $this->db();
        $gamecount = $query->where('download_16', "<>" , NULL)->sum('download_16');

        return $gamecount;
    }
    public function DownloadGamecount_Cero_D($type=null) {
        $query = $this->db();
        $gamecount = $query->where('download_D', "<>" , NULL)->sum('download_D');

        return $gamecount;
    }
    public function DownloadGamecount_Cero_Z($type=null) {
        $query = $this->db();
        $gamecount = $query->where('download_Z', "<>" , NULL)->sum('download_Z');

        return $gamecount;
    }

    // パッケージのゲームのカウント
    public function PackageAllGamecount($type=null) {
        $query = $this->db();
        $allgamecount = $query->where('type1_all', "<>" , NULL)->sum('type1_all');

        return $allgamecount;
    }
    public function PackageGamecount_Cero_A_3($type=null) {
        $query = $this->db();
        $gamecount_cero_A_3 = $query->where('type1_A_3', "<>" , NULL)->sum('type1_A_3');

        return $gamecount_cero_A_3;
    }
    public function PackageGamecount_Cero_7($type=null) {
        $query = $this->db();
        $gamecount_cero_7 = $query->where('type1_7', "<>" , NULL)->sum('type1_7');

        return $gamecount_cero_7;
    }
    public function PackageGamecount_Cero_B_12($type=null) {
        $query = $this->db();
        $gamecount_cero_B_12 = $query->where('type1_B_12', "<>" , NULL)->sum('type1_B_12');

        return $gamecount_cero_B_12;
    }
    public function PackageGamecount_Cero_C($type=null) {
        $query = $this->db();
        $gamecount_cero_C = $query->where('type1_C', "<>" , NULL)->sum('type1_C');

        return $gamecount_cero_C;
    }
    public function PackageGamecount_Cero_16($type=null) {
        $query = $this->db();
        $gamecount_cero_16 = $query->where('type1_16', "<>" , NULL)->sum('type1_16');

        return $gamecount_cero_16;
    }
    public function PackageGamecount_Cero_D($type=null) {
        $query = $this->db();
        $gamecount_cero_D = $query->where('type1_D', "<>" , NULL)->sum('type1_D');

        return $gamecount_cero_D;
    }
    public function PackageGamecount_Cero_Z($type=null) {
        $query = $this->db();
        $gamecount_cero_Z = $query->where('type1_Z', "<>" , NULL)->sum('type1_Z');

        return $gamecount_cero_Z;
    }
}
