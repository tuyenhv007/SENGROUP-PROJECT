<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Services\CommentService;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService=$commentService;
    }

    public function postComment($id,Request $request){

        $id_house=$id;
        if($request->comment){
            $comment=new Comment();
            $comment->content=$request->comment;
            $comment->house_id=$id_house;
            $comment->rating=$request->rating;
            $comment->user_id=Session::get('user')->id;
            $comment->save();
        }
        return back();
    }
    public function checkComment(){
        return redirect()->route('login');
    }

}
