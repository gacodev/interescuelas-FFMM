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
        DB::statement('CREATE VIEW view_awards AS
        select a.award, f.force,  count(s.award_id) as total from scores s
        join participants p on s.participant_id = p.id
        join forces f on f.id = p.force_id
        join awards a on s.award_id  = a.id
        GROUP by a.award, f.force
        ORDER by a.id, f.`force`, a.id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_awards');
    }
};
