<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Research;
use Illuminate\Http\Request;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\CommentResource;

class ReactionController extends Controller
{
    public function index($id){
        $data = Comment::where('commentable_id',$id)->where('commentable_type','App\Models\Research')
        ->with('user:id','user.profile:user_id,id,firstname,lastname,middlename,avatar')
        ->with('comments')
        ->with('likes')
        ->paginate(5);
        
       return CommentResource::collection($data);
    }

    public function store(Request $request){
        $type = $request->input('type');

        if($type == 'Comment'){
            $data = Research::find($request->input('id'));
            $data->comments()->create([
                'user_id' => Auth::user()->id,
                'comment' => $request->input('comment')
            ]);
            $data = $data->comments()->latest()->first();
        }else{
            $data = Comment::find($request->input('id'));
            $data->comments()->create([
                'user_id' => Auth::user()->id,
                'comment' => $request->input('comment')
            ]);
            $data = $data->comments()->latest()->first();
        }
        return new CommentResource($data);
    }

    public function like(Request $request){
        $user_id = Auth::user()->id;
        $comment_id = $request->input('comment');

        $data = Like::where('user_id',$user_id)->where('comment_id',$comment_id)->first();
        if(empty($data)){
            $data = new Like;
            $data->user_id = $user_id;
            $data->comment_id = $comment_id;
            $data->save();
            return new DefaultResource($data);
        }else{
            $id = $data->id;
            $data->delete();
            return $id;
        }
    }   
}
