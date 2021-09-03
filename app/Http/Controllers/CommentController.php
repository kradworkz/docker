<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Research;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index($id){
        $data = Comment::where('commentable_id',$id)->where('commentable_type','App\Models\Research')
        ->with('user:id','user.profile:user_id,id,firstname,lastname,middlename,avatar')
        ->with('comments')
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
    
}
