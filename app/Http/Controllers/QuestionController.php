<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Survey;
use App\Models\Wilayah;
use Laravolt\Indonesia\Models\Province; 
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function formSurvey($surveyId){

        $surveys = Survey::where('id', $surveyId)->firstOrFail();
        $sections = $surveys->section;

        $provinsi = Province::pluck('name', 'code');
        $wilayah = Wilayah::all();
        return view('formSurvey',compact('surveys','sections', 'provinsi'));
        
    }
    public function getCitiesByProvince($provinceCode)
    {
        $cities = City::where('province_code', $provinceCode)->get();
        return response()->json($cities);
    }

    public function getDistrictsByCity($cityCode)
    {
        $districts = District::where('city_code', $cityCode)->get();
        return response()->json($districts);
    }

    public function getVillagesByDistrict($districtCode)
    {
        $villages = Village::where('district_code', $districtCode)->get();
        return response()->json($villages);
    }
    
    // public function testFormSurvey($surveyId){

    //     $surveys = Survey::where('id', $surveyId)->firstOrFail();
    //     $questions = $surveys->questions;
    //     return view('testFormSurvey',compact('surveys',  'questions'));
    // }
}
