<?php

namespace App\Http\Controllers;

use App\Models\File as F;
use App\Models\Research;
use Illuminate\Http\Request;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\ResearchResource;
use App\Http\Requests\UploadRequest;

class ResearchController extends Controller
{
    public function index(){
        return view('user_researcher.researches');
    }

    public function add(){
        return view('user_researcher.research-add');
    }

    public function view(){
        return view('user_researcher.research-view');
    }

    public function research($id){
        $data =  Research::with('user','user.profile')->with('status')->with('iprstatus')->with('classification')
        ->where('id',$id)
        ->first();
        
        return new ResearchResource($data);
    }

    public function lists($keyword){
        ($keyword == '-') ? $keyword = '' : $keyword;
        $query = Research::query();
        $query->with('status')->with('iprstatus')->with('classification');
        $query->where('title','LIKE', '%'.$keyword.'%');
        (\Auth::user()->type == "Researcher") ? $query->where('user_id',\Auth::user()->id)  : '';
        $data = $query->paginate(10);

        return ResearchResource::collection($data);
    }

    public function store(Request $request){
        \DB::transaction(function () use ($request){
            $data = ($request->input('editable')) ? Research::findOrFail($request->input('id')) : new Research;
            $data->title = ucfirst(strtolower($request->input('title')));
            $data->content = 'Aa';
            ($request->input('editable')) ? '' : $data->status_id = 5;
            $data->iprstatus_id = $request->input('iprstatus');
            $data->classification_id = $request->input('classification');
            $data->specialty_id = $request->input('specialty');
            $data->user_id = \Auth::user()->id;
            $data->save();

            return new DefaultResource($data);
        });
    }

    public function upload(UploadRequest $request){

        if($request->hasFile('files'))
        {
            $files = $request->file('files');   
            foreach ($files as $file) {
                $file_name = time().'.'.$file->getClientOriginalExtension();
                $file_path = $file->storeAs('uploads', $file_name, 'public');
            }
        }
    }
}
