<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Request $request)
    {
        $categories = Categorie::where("sport_id", "=", $request->sport_id)
            ->where("gender_id", "=", $request->gender_id)
            ->get([
                "id", "categorie"
            ]);

        return $categories;
    }
}
