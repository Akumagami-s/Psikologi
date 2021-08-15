<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Events\MyEvent;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    public function index(Request $request)
    {
        return view('chat');
    }

    public function privateChat(Request $request,$user_id)
    {
        if (is_null(User::where('id',$user_id)->first())) {
            return redirect()->back();
        } else {
            if ($user_id == Auth::id()) {
                return redirect()->back();
            }
            else if (Auth::user()->role == User::where('id',$user_id)->first()->role){
                return redirect()->back();
            }
            else {
                $chat = [];
                
                foreach (Message::all() as $key => $value) {
                    if ($value->from == Auth::id() && $value->to == $user_id) {
                        $chat[] = $value;
                    }
                    elseif ($value->from == $user_id && $value->to == Auth::id()) {
                        $chat[] = $value;
                    }
                }
                // dd($chat);
                foreach ($chat as $key => $value) {
                    Message::where('id',$value->id)->update([
                        'is_read'=>TRUE
                    ]);
                }
                return view('privatechat',['chat'=>$chat,'id'=>$user_id,'receive'=>User::where('id',$user_id)->first()]);
            }
        }
    }
    public function getMsg(Request $request)
    {
        $new = Message::where(['from'=>$request->user_id,'to'=>Auth::id(),'is_read'=>FALSE])->get();
        
        
        foreach ($new as $key => $value) {
            Message::where(['from'=>Auth::id(),'to'=>$request->user_id])->orWhere(['from'=>$request->user_id,'to'=>Auth::id()])->update([
                'is_read'=>TRUE
            ]);
        }
        return response()->json($new, 200);
    }

    public function send(Request $request)
    {
        Message::create([
            'from'=>Auth::id(),
            'message'=>$request->message,
            'to'=>$request->user_id,
            'is_read'=>FALSE
        ]);

        return response()->json(['message'=>'success'], 200);

    }

    public function test(Request $request)
    {
        

// event(new MyEvent('hello world'));

return view('test');


    }

    public function test2()
    {
        echo "ada";
        event(new MyEvent('hello world'));

    }
}
