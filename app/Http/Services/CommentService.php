<?php


namespace App\Http\Services;
use App\Http\Repositories\CommentRepository;

class CommentService
{
    protected $commentRepository;
    public function __construct(CommentRepository $commentRepository){
        $this->commentRepository=$commentRepository;
    }
    public function getAllComments(){
        return $this->commentRepository->getAll();
    }
    public function getAllPostsByUserId($id){
        return $this->commentRepository->getAllCommentByUserId($id);

    }

}
