<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        DB::statement("CREATE OR REPLACE VIEW medalleria_general AS SELECT
        total.`force`,
        SUM(gold) as gold, SUM(silver) as silver, SUM(bronze) as bronze
        FROM
        (
            (
                select f.`force`,
                SUM(dp.award_id  = 1) as gold, SUM(dp.award_id = 2) as silver, SUM(dp.award_id = 3) as bronze
                from forces f
                join participants p on p.force_id = f.id
                JOIN discipline_participants dp on dp.participant_id = p.id
                GROUP by f.`force`
            )
            UNION ALL
            (
                select f.`force`,
                SUM(t.award_id  = 1) as gold, SUM(t.award_id = 2) as silver, SUM(t.award_id = 3) as bronze
                from forces f
                join teams t on t.force_id = f.id
                GROUP by f.`force`
                ORDER by f.id
            )
        ) as total
        GROUP by total.`force`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS medalleria_general');
    }
};
