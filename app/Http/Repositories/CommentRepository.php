<?php


namespace App\Http\Repositories;

use App\Comment;

class CommentRepository
{
    protected $comment;
    public function __construct(Comment $comment)
    {
        $this->comment=$comment;
    }
    public function getAll(){
        return $this->comment->all();
    }
    public function getAllCommentByUserId($id){
        return $this->comment->where('user_id',$id)->get();
    }

}
