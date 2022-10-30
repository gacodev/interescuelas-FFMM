<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Multimedallist extends Component
{
    public $award_id = null;
    public $sport_id;
    public $discipline_id;

    public function render()
    {
        if ($this->sport_id) {
            $participants = DB::select("select p.id, p.identification, p.name, p.photo, p.birthday, p.range_id, p.phone,  f.`force`, f.force_image, f.color,  n.nationality, n.flag_image,  
            SUM(dp.award_id  = 1) as gold, SUM(dp.award_id = 2) as silver, SUM(dp.award_id = 3) as bronze
            from participants p
            JOIN forces f on f.id = p.force_id
            JOIN nationalities n on n.id = p.nationality_id
            JOIN discipline_participants dp on dp.participant_id = p.id 
            where p.id in (
                    select DISTINCT p.id  from participants p
                    join discipline_participants dp on dp.participant_id = p.id
                    where dp.discipline_id in (
                            select d.id from sports s
                            join disciplines d on d.sport_id = s.id
                            WHERE s.id = $this->sport_id
                        )
                )
            GROUP by p.id
            ORDER BY gold DESC, silver desc, bronze desc
            limit 5");
        } else if ($this->discipline_id) {
            $participants = DB::select("select p.id, p.identification, p.name, p.photo, p.birthday, p.range_id, p.phone,  f.`force`, f.force_image, f.color,  n.nationality, n.flag_image,  
            SUM(dp.award_id  = 1) as gold, SUM(dp.award_id = 2) as silver, SUM(dp.award_id = 3) as bronze
            from participants p
            JOIN forces f on f.id = p.force_id
            JOIN nationalities n on n.id = p.nationality_id
            JOIN discipline_participants dp on dp.participant_id = p.id 
            where p.id in (
                    select DISTINCT p.id  from participants p
                    join discipline_participants dp on dp.participant_id = p.id
                    where dp.discipline_id = $this->discipline_id
                )
            GROUP by p.id
            ORDER BY gold DESC, silver desc, bronze desc
            limit 5
            ");
        } else {
            $participants = DB::select("select p.id, p.identification, p.name, p.photo, p.birthday, p.range_id, p.phone,  f.`force`, f.force_image, f.color,  n.nationality, n.flag_image,  
            SUM(dp.award_id  = 1) as gold, SUM(dp.award_id = 2) as silver, SUM(dp.award_id = 3) as bronze
            from participants p
            JOIN forces f on f.id = p.force_id
            JOIN nationalities n on n.id = p.nationality_id
            JOIN discipline_participants dp on dp.participant_id = p.id 
            GROUP by p.id  ORDER BY gold DESC, silver desc, bronze desc
            limit 5");
        }

        return view('livewire.multimedallist', compact('participants'));
    }
}
