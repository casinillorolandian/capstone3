<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class MessagesController extends Controller
{
    function showMessages(Request $request){
      // $all_messages = \App\Message::all();
      // $all_messages= \App\Message::orderby('created_at','desc')->limit('3')->get();
      $all_messages= \App\Message::orderby('created_at','desc')->get();
      return view('messages.messaging', compact('all_messages'));
    }

    function show($id){
        $all_messages =\App\Message::find($id);
        // $result  = $all_messages->replies();
        $related_comments = $all_messages->replies;
        // $showreplyuser = $all_messages->replies()
                          // ->where('message_id','==','$id');
        // dd($message_replies);
        $adminseen = '1';
        $userseen= '2';

        if(Auth::user()->role == 'admin'){
        $message_obj = \App\Message::find($id);
        $message_obj ->seen = $adminseen;
        $message_obj ->save();
        }

        if(Auth::user()->role == 'user' && !is_null($related_comments)){
          foreach($related_comments as $reply_obj){
            // $reply_obj = \App\Reply::find($related_comments);
            $reply_obj ->seen = $userseen;
            $reply_obj ->save();
          }
        }
        return view('messages.messaging_showthemessages', compact('all_messages', 'related_comments'));
	  }

    function create(){

      $reserve_item = '0';
      $id = '0';

   		return view('messages.messaging_create', compact('reserve_item','id')) ;
    }

    function store(Request $request){
        $title= $request->post('title');
        $messageabout= $request->post('messageabout');
        $actualmessage= $request->post('actualmessage');
        $firstimage= $request->file('1stimage');
        $secondimage= $request->file('2ndimage');
        $thirdimage= $request->file('3rdimage');
        $sendto_id= '4';
        $seen= '0';
        $user_id = Auth::user()->id;
        //reserve item
        $reserve_item = $request->post('reserve');
        $spam= 0;


        // 1st IMAGE going to the folder
        if($firstimage != null){
        $file1 = $firstimage;
        $namefile1 = $file1->getClientOriginalName();
        $finalfilename1 = time(). '1st'. $namefile1 ;
        $destinationPath = 'uploads';
        $file1->move($destinationPath,$finalfilename1);

        // 1stimage going to the database
        $imageName1 = $firstimage->getClientOriginalName();
        $imagedata1 = 'uploads/'. time(). '1st' .$imageName1 ;
        } else {
          $imagedata1 = '0';
        }

        // 2nd IMAGE 
        if($secondimage != null){
        $file2 = $secondimage;
        $namefile2 = $file2->getClientOriginalName();
        $finalfilename2 = time() . '2nditem'. $namefile2 ;
        $destinationPath = 'uploads/item';
        $file2->move($destinationPath,$finalfilename2);


        $imageName2 = $secondimage->getClientOriginalName();
        $imagedata2 = 'uploads/item/'. time() . '2nditem' .$imageName2 ;
        } else {
          $imagedata2 = '0';
        }

        // 3rd IMAGE
        if($thirdimage != null){
        $file3 = $thirdimage;
        $namefile3 = $file3->getClientOriginalName();
        $finalfilename3 = time() . '3rditem' . $namefile3 ;
        $destinationPath = 'uploads/item';
        $file3->move($destinationPath,$finalfilename3);


        $imageName3 = $thirdimage->getClientOriginalName();
        $imagedata3 = 'uploads/item/'. time() . '3rditem' .$imageName3 ;
        } else {
          $imagedata3 = '0';
        }

        $rules = array(
          'title' => 'required | min:3 | max:191 | regex:/^[A-Za-z0-9\-\s ]+$/',
          'messageabout' => 'required | not_in:0', 
          'actualmessage' => 'required',
          '1stimage' => '',
          '2ndimage' => '',
          '3rdimage' => '',
          'sendto_id' => '', 
        );

      $this -> validate($request,$rules);

      $message_obj = new \App\Message();
      $message_obj ->user_id = $user_id;
      $message_obj ->title = $title;
      $message_obj ->messageabout = $messageabout;
      $message_obj ->actualmessage = $actualmessage;
      $message_obj ->messageabout = $messageabout;
      $message_obj ->firstimage = $imagedata1;
      $message_obj ->secondimage = $imagedata2;
      $message_obj ->thirdimage = $imagedata3;
      $message_obj ->seen = $seen;
      $message_obj ->sendto_id = $sendto_id;
      $message_obj ->spam = $spam;
      $message_obj ->save();

      // dd($request);
      if($reserve_item != null){
        $item_obj = \App\Item::find($reserve_item);
        $item_obj ->reserve_id = $user_id;
        $item_obj ->save();
      }

      return redirect("messages");
      
    }

    function delete($id){
        // saving to deletedmessages table
        $deletedtitle= \App\Message::find($id)->title;
        $deletedmessageabout= \App\Message::find($id)->messageabout;
        $deletedactualmessage= \App\Message::find($id)->actualmessage;
        $deletedfirstimage= \App\Message::find($id)->firstimage;
        $deletedsecondimage= \App\Message::find($id)->secondimage;
        $deletedthirdimage= \App\Message::find($id)->thirdimage;
        $deletedsendto_id= '4';
        $deleteduser_id = Auth::user()->id;


        $message_obj = new \App\DeletedMessage();
        $message_obj ->user_id = $deleteduser_id;
        $message_obj ->title = $deletedtitle;
        $message_obj ->messageabout = $deletedmessageabout;
        $message_obj ->actualmessage = $deletedactualmessage;
        $message_obj ->firstimage = $deletedfirstimage . 'deleted' . time();
        $message_obj ->secondimage = $deletedsecondimage . 'deleted' . time();
        $message_obj ->thirdimage = $deletedthirdimage . 'deleted' . time();
        $message_obj ->sendto_id = $deletedsendto_id;
        $message_obj ->message_id = $id;
        $message_obj ->save(); 

        // dd($deletedfirstimage);



      $message_to_delete = \App\Message::find($id);

      $message_to_delete -> delete();
      // what is this(below comment)
      // $all_messages = Message::all();
      return redirect("messages")->with("deleted","Message deleted...");
    }

    function postComment(Request $request, $id){
        // dd("hello");
        $replymessage = $request -> post('replymessage');
        $user_id = Auth::user()->id;
        $message_id = $id;
        if(Auth::user()->role == 'admin'){
        $seen = 1;
        } elseif(Auth::user()->role == 'user') {
        $seen= 0;
        }
        // $seenadmin= 0;
        // $seenuser= 1;

        $reply_obj = new \App\Reply;
        $reply_obj ->user_id = $user_id;
        $reply_obj ->message_id = $message_id;
        $reply_obj ->replymessage = $replymessage;
        $reply_obj ->seen = $seen;
        $reply_obj ->save();





        $all_messages =\App\Message::find($id);
        $related_comments = $all_messages->replies;

        // for admin
        if(Auth::user()->role == 'admin' && !is_null($related_comments)){
        $newrepliedbyadmin = 1;
        
        foreach($related_comments as $reply_obj){
            $reply_obj ->seen = $newrepliedbyadmin;
            $reply_obj ->save();
          }
        }

        // if(Auth::user()->role == 'user' && !is_null($message_replies)){
        //   foreach($related_comments as $reply_obj){
        //     $reply_obj ->seen = $newrepliedbyadmin;
        //     $reply_obj ->save();
        //   }
        // }

        return back();
    }

    function replied($id){
        $all_messages =\App\Message::find($id);
        // $result  = $all_messages->replies();
        $related_comments = $all_messages->replies() ->get();

        return view('messages.messaging_showthemessages', compact('all_messages', 'related_comments'));
    }

    function showUsers(Request $request){
      // $all_messages = \App\Message::all();
      // $all_messages= \App\Message::orderby('created_at','desc')->limit('3')->get();
      $all_users= \App\User::all();
      return view('settings', compact('all_users'));
    }

    function showDeletedMessages(Request $request){

      $all_messages= \App\DeletedMessage::orderby('created_at','desc')->get();

      //fetch comments from deleted
      //$find_id= \App\DeletedMessage::find('message_id')->get();
      //$name_comment= \App\User::where('message_id','$findid')->get();
      return view('messages.deletedmessaging', compact('all_messages'));
    }


    function spam($id){
        // saving to deletedmessages table

        $spam = 1;

        if(Auth::user()->role == 'admin'){
        $message_obj = \App\Message::find($id);
        $message_obj ->spam = $spam;
        $message_obj ->save();
        }


      return redirect("messages");
    }

    function showSpammedMessages(Request $request){

      $all_messages= \App\Message::orderby('created_at','desc')->get();

      
      return view('messages.spammedmessages', compact('all_messages'));
    }

  
}
