<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserConsortium;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Services\StoreImage;
use App\Http\Resources\StaffResource;
use App\Http\Requests\StaffRequest;
use App\Jobs\EmailNewAccount;

class StaffController extends Controller
{
    public function index(){
        return view('user_admin.staff');
    }

    public function lists($keyword){
        ($keyword == '-') ? $keyword = '' : $keyword;
        $users =  User::with('profile')
        ->with('consortium:consortium_id,user_id','consortium.consortium:id,acronym')
        ->whereIn('type',['Secretariat','Consortium'])
        ->whereHas('profile',function ($query) use ($keyword) {
            $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', '%'.$keyword.'%')->orWhere(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', '%'.$keyword.'%');
        })->paginate(10);

        return StaffResource::collection($users);
    }

    public function store(StoreImage $strmg, Request $request){
        \DB::transaction(function () use ($request,$strmg){
            
            $data = ($request->input('editable')) ? User::findOrFail($request->input('id')) : new User;
            $data->email = strtolower($request->input('email'));
            $data->password = bcrypt("DostRegion9");
            $data->type = $request->input('type');
            
            if($data->save()){

                if($data->type == "Consortium"){
                    if(!$request->input('editable')){
                        $consortium = new UserConsortium;
                        $consortium->consortium_id = $request->input('consortium')['id'];
                        $consortium->user_id = $data->id;
                        $consortium->save();
                    }else{
                        $consortium = UserConsortium::where('user_id',$data->id)->first();
                        $consortium->consortium_id = $request->input('consortium')['id'];
                        $consortium->save();
                    }
                }

                if(!$request->input('editable')){
                    $profile = new UserProfile;
                    $profile->firstname = ucwords(strtolower($request->input('firstname')));
                    $profile->lastname = ucwords(strtolower($request->input('lastname')));
                    $profile->middlename = ucwords(strtolower($request->input('middlename')));
                    $profile->birthdate = $request->input('birthdate');
                    $profile->mobile_no = $request->input('mobile_no');
                    $profile->gender = $request->input('gender');
                    $profile->user_id = $data->id;
                    $profile->save();
                    
                    $name = strtolower($request->input('lastname')).'-'.$data->id;
                    if($request->input('avatar') != ''){
                        $imageName = $strmg->strmg($request->input('avatar'),$name);
                    }else{
                        ($request->input('editable')) ? $imageName = $data->avatar : $imageName = 'avatar.jpg';
                    }
                    $profile->avatar = $imageName;
                    $profile->save();
                
                    EmailNewAccount::dispatch($data->id)->delay(now()->addSeconds(10));
                    // $expiresAt = now()->addDay();
                    // $data->sendWelcomeNotification($expiresAt);
                }

            }
        });
    }

    public function test(){
        EmailNewAccount::dispatch(2)->delay(now()->addSeconds(10));
    }
}
