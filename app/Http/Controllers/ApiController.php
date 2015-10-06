<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ApiController extends Controller
{

    protected $invalidParamsError;

    function __construct()
    {
        $this->invalidParamsError = $this->invalidParamsError = [
            'code' => '400',
            'error_message' => 'Invalid Parameters'
        ];

    }

    public function categories(){
        $categories = DB::table('tblcategories')->select('cat_name AS categoryName', 'description', 'cat_type as categoryType','cat_id as categoryID')->get();
        $response['data'] = $categories;
        return json_encode($response);
    }


    public function results(){
        $results = DB::table('result_confirm')->select('event as eventName', 'category as categoryName', 'round', 'position', 'teamid as teamId')->get();

	$i = 0;
	if(count($results)==0){
		return;
	}
	foreach($results as $result){
		$data[$i]['eventName'] = $result->eventName. " Round ".$result->round;
		$data[$i]['categoryName'] = $result->categoryName;
		$data[$i]['result'] = " Team ID: ".$result->teamId." Position: ".$result->position;
		$i++;
	}
        $response['data'] = $data;
        return json_encode($response);
    
    }

    public function events($cat_id = null){
        if($cat_id==null)
            $events = DB::table('tblevents')
                ->select('event_id as eventID', 'event_name as eventName', 'tblevents.description as description', 'tblcategories.cat_id as categoryID', 'cat_name AS categoryName', 'event_max_team_number as maxTeamSize','contact_name as contactName','contact_number as contactNumber')
                ->join('tblcategories', 'tblcategories.cat_id', '=', 'tblevents.cat_id')
                ->get();
        else {
            $events = DB::table('tblevents')
                ->select('event_id as eventID', 'event_name as eventName', 'tblevents.description as description', 'tblcategories.cat_id as categoryID', 'cat_name AS categoryName', 'event_max_team_number as maxTeamSize','contact_name as contactName','contact_number as contactNumber')
                ->join('tblcategories', 'tblcategories.cat_id', '=', 'tblevents.cat_id')
                ->where('tblcategories.cat_id', $cat_id)
                ->get();
        }

        $response['data'] = $events;
        return json_encode($response);

    }
}