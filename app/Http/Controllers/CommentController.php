<?php

namespace ArticulosReligiosos\Http\Controllers;

use Illuminate\Http\Request;
use ArticulosReligiosos\Http\Requests\CommentRequest;
use ArticulosReligiosos\Product;
use ArticulosReligiosos\Comment;
use ArticulosReligiosos\Replie;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.admin')->except('store');
    }

    public function store(CommentRequest $request, Product $product){
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->user()->associate($request->user());
        $product->comments()->save($comment);
        return redirect('product/'.$product->slug);
    }

    public function index(){
        $comments = Comment::all();
        return view("comment.index", compact('comments'));
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('comment');
    }

    public function store_replie(Request $request, Comment $comment)
    {
        $replie = new Replie([
            'text' => $request->text,
        ]);
        $replie->user()->associate($request->user());
        $comment->replie()->save($replie);
        return redirect('comment');
    }
}
