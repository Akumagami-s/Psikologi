<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
class MeetController extends Controller
{


    public function prepareMeet(Request $request)
    {
        return view('preparemeet');
    }
    public function loginMeet(Request $request)
    {
        
        $client = new Client();
        $res = $client->request('POST', 'https://api-platform.umeetme.id/platform/auth/login/app', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                "appId"=> "C_SQUAT_IHF",
                "appKey"=> "Q1NRVUFUSUhGX1VNRUVUTUVfMjAxMjIxMw==",
                "accessTokenExpired"=> 120
            ]
        ]);
        $login = $res->getBody()->getContents();
        $login = json_decode($login,true);
        $at = $login['data']['accessToken'];
        $client2 = New Client();
        $res2 = $client2->request('POST', 'https://api-platform.umeetme.id/api/room-management/create-meeting', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'auth' => [
                'telkom', 
                'da1c25d8-37c8-41b1-afe2-42dd4825bfea'
            ],
                'json'=>[
                        "platformLanguage"=> "indonesia",
                        "token"=>$at,
                        "title"=> $request->title,
                        "pmrCode"=> null,
                        "meetingId"=> null,
                        "appId"=> "C_SQUAT_IHF",
                        "serviceCode"=> "UMEETME",
                        "isContinue"=> true          
                ]


        ]);
    
        $result= $res2->getBody()->getContents();
        $result = json_decode($result,true);
        $link = $result['data']['detailMeetingData']['meetingLink'];
        $linkjoin = $result['data']['meetingData']['joinLink'];
        Message::create([
            'from'=>Auth::id(),
            'message'=>"i invite you for meeting !   "."<a target='_blank' href='https://".$linkjoin."'>Join </a>",
            'to'=>$request->user_id,
            'is_read'=>FALSE
        ]);


        return redirect($link);

        
    }
}
