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
        DB::statement("CREATE OR REPLACE VIEW view_awards_by_force AS select f.`force`, 
        SUM(dp.award_id  = 1) as gold, SUM(dp.award_id = 2) as silver, SUM(dp.award_id = 3) as bronze
        from forces f
        join participants p on p.force_id = f.id
        JOIN discipline_participants dp on dp.participant_id = p.id 
        GROUP by f.`force`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_awards_by_force');
    }
};
