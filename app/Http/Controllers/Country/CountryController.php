<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    public function country()
    {
        return response()->json(CountryModel::get(), 200);
    }

    public function countrybyid($id)
    {
        $country = CountryModel::find($id);
        if(is_null($country))
        {
            return response()->json('Record not found!!', 404);
        }
        return response()->json($country, 200);
    }

    public function countrysave(Request $request)
    {
        $country = CountryModel::create($request->all());

        return response()->json($country, 201);
    }

    public function countryupdate(Request $request, CountryModel $country)
    {
        $country->update($request->all());

        return response()->json($country, 200);
    }

    public function countrydelete(Request $request, CountryModel $country)
    {
        $country->delete();
        return response()->json(null, 204);
    }

}
