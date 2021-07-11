<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $messages = Message::orderBy('id','DESC')->paginate(15);
        return view('message.index',['messages'=>$messages]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Message::where('id',$id)->delete();
        return redirect(route('messages.index'))->with('message','Message deleted successfully..');
    }
}
