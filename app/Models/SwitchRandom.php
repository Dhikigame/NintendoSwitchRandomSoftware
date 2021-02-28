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
}
