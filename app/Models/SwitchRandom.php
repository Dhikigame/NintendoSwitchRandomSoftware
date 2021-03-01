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

    public function AllGamecount($type=null) {
        $query = $this->db();
        $allgamecount = $query->where('cero_all', "<>" , NULL)->sum('cero_all');

        return $allgamecount;
    }
    public function Gamecount_Cero_A_3($type=null) {
        $query = $this->db();
        $gamecount_cero_A_3 = $query->where('cero_A_3', "<>" , NULL)->sum('cero_A_3');

        return $gamecount_cero_A_3;
    }
    public function Gamecount_Cero_7($type=null) {
        $query = $this->db();
        $gamecount_cero_7 = $query->where('cero_A_3', "<>" , NULL)->sum('cero_7');

        return $gamecount_cero_7;
    }
    public function Gamecount_Cero_B_12($type=null) {
        $query = $this->db();
        $gamecount_cero_B_12 = $query->where('cero_B_12', "<>" , NULL)->sum('cero_B_12');

        return $gamecount_cero_B_12;
    }
    public function Gamecount_Cero_C($type=null) {
        $query = $this->db();
        $gamecount_cero_C = $query->where('cero_C', "<>" , NULL)->sum('cero_C');

        return $gamecount_cero_C;
    }
    public function Gamecount_Cero_16($type=null) {
        $query = $this->db();
        $gamecount_cero_16 = $query->where('cero_16', "<>" , NULL)->sum('cero_16');

        return $gamecount_cero_16;
    }
    public function Gamecount_Cero_D($type=null) {
        $query = $this->db();
        $gamecount_cero_D = $query->where('cero_D', "<>" , NULL)->sum('cero_D');

        return $gamecount_cero_D;
    }
    public function Gamecount_Cero_Z($type=null) {
        $query = $this->db();
        $gamecount_cero_Z = $query->where('cero_Z', "<>" , NULL)->sum('cero_Z');

        return $gamecount_cero_Z;
    }
}
