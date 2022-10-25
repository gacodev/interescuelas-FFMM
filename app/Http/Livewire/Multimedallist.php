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
            $participants = DB::select("select p.id, p.identification, p.name, p.photo, p.birthday, p.range_id, p.phone,  f.`force`, f.force_image, f.color,  n.nationality, n.flag_image,  count(dpg.award_id) as gold, count(dps.award_id) as silver, count(dpb.award_id) as bronze
            from participants p
            JOIN forces f on f.id = p.force_id
            JOIN nationalities n on n.id = p.nationality_id
            left JOIN discipline_participants dpg on
                (
                    dpg.participant_id = p.id and
                    dpg.award_id in (select id from awards a WHERE a.award = 'oro')
                )
            left JOIN discipline_participants dps on
                (
                    dps.participant_id = p.id and
                    dps.award_id in (select id from awards a WHERE a.award = 'plata')
                )
            left JOIN discipline_participants dpb on
                (
                    dpb.participant_id = p.id and
                    dpb.award_id in (select id from awards a WHERE a.award = 'bronce')
                )
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
            $participants = DB::select("select p.id, p.identification, p.name, p.photo, p.birthday, p.range_id, p.phone,  f.`force`, f.force_image, f.color,  n.nationality, n.flag_image,  count(dpg.award_id) as gold, count(dps.award_id) as silver, count(dpb.award_id) as bronze
            from participants p
            JOIN forces f on f.id = p.force_id
            JOIN nationalities n on n.id = p.nationality_id
            left JOIN discipline_participants dpg on
                (
                    dpg.participant_id = p.id and
                    dpg.award_id in (select id from awards a WHERE a.award = 'oro')
                )
            left JOIN discipline_participants dps on
                (
                    dps.participant_id = p.id and
                    dps.award_id in (select id from awards a WHERE a.award = 'plata')
                )
            left JOIN discipline_participants dpb on
                (
                    dpb.participant_id = p.id and
                    dpb.award_id in (select id from awards a WHERE a.award = 'bronce')
                )
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
            $participants = DB::select("select p.id, p.identification, p.name, p.photo, p.birthday, p.range_id, p.phone,  f.`force`, f.force_image, f.color,  n.nationality, n.flag_image,  count(dpg.award_id) as gold, count(dps.award_id) as silver, count(dpb.award_id) as bronze
            from participants p
            JOIN forces f on f.id = p.force_id
            JOIN nationalities n on n.id = p.nationality_id
            left JOIN discipline_participants dpg on (dpg.participant_id = p.id and dpg.award_id in (select id from awards a WHERE a.award = 'oro'))
            left JOIN discipline_participants dps on (dps.participant_id = p.id and dps.award_id in (select id from awards a WHERE a.award = 'plata'))
            left JOIN discipline_participants dpb on (dpb.participant_id = p.id and dpb.award_id in (select id from awards a WHERE a.award = 'bronce'))
            GROUP by p.id  ORDER BY gold DESC, silver desc, bronze desc
            limit 5");
        }

        return view('livewire.multimedallist', compact('participants'));
    }
}
