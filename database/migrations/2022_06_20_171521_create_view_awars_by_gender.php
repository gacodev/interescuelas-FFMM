<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW view_awards_by_gender AS select g.sexo , count(dpg.award_id) as gold, count(dps.award_id) as silver, count(dpb.award_id) as bronze
        from genders g
        join participants p on p.gender_id = g.id
        left JOIN discipline_participants dpg on (dpg.participant_id = p.id and dpg.award_id in (select id from awards a WHERE a.award = 'oro'))
        left JOIN discipline_participants dps on (dps.participant_id = p.id and dps.award_id in (select id from awards a WHERE a.award = 'plata'))
        left JOIN discipline_participants dpb on (dpb.participant_id = p.id and dpb.award_id in (select id from awards a WHERE a.award = 'bronce'))
        GROUP by g.sexo");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_awards_by_gender');
    }
};
