<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Services\StoreImage;
use App\Http\Resources\DefaultResource;

class InstitutionController extends Controller
{
    public function institutions(){
        return view('user_admin.institution');
    }

    public function agencies(){
        return view('user_admin.agency');
    }

    public function consortiums(){
        return view('user_admin.consortium');
    }

    public function store(StoreImage $strmg, Request $request)
    {   
        $type = $request->input('type');
        $data = ($request->input('editable')) ? Organization::findOrFail($request->input('id')) : new Organization;
        $data->name  = ucwords(strtolower($request->input('name')));
        $data->type_id  = $type;
        $data->acronym =($request->acronym == '') ? 'n/a' : strtoupper($request->input('acronym'));
        if($data->save()){
            $name = strtolower($request->input('acronym')).'-'.$data->id;
            if($request->input('avatar') != ''){
                $imageName = $strmg->strmg($request->input('avatar'),$name);
            }else{
                ($request->input('editable')) ? $imageName = $data->avatar : $imageName = 'school.jpg';
            }
            $data->avatar = $imageName;
            $data->save();
        }
        return new DefaultResource($data);
    }

    public function list($type,$keyword)
    {
        ($keyword == '-') ? $keyword = '' : $keyword;
        $data = Organization::where('type_id',$type)
        ->where(function($q) use ($keyword) {
            $q->where('name','LIKE','%'.$keyword.'%')->orWhere('acronym','LIKE','%'.$keyword.'%');
        })
        ->orderBy('created_at','DESC')
        ->paginate(5);
        return DefaultResource::collection($data);
    }

    public function lists($type)
    {
        $data =  Organization::where('type_id',$type)->get();
        return DefaultResource::collection($data);
    }
}
