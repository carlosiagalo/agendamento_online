<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Services;

use App\Models\User;

class ServiceController extends Controller
{
    public function index(){

        $search = request('search');
        if($search){

            $services = Services::where([
                ['title','like','%'.$search.'%']
            ])->get();

        } else{
            $services = Services::all();
        }
        
        return view('welcome',['services'=>$services,'search'=>$search]);
    }

    public function create(){
        return view('services.create');
    }

    public function store(Request $request){

        $service = new Services;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->profissional = $request->profissional;
        $service->local = $request->local;
        $service->duration = $request->duration;
        $service->payments = $request->payments;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $request->image->move(public_path('img/services'),$imageName);
            $service->image = $imageName;
        }

        $user = auth()->user();
        $service->user_id = $user->id;
        
        $service->save();

        return redirect('/')->with('msg','Serviço criado com sucesso!');
    }

    public function show($id){
        $services = Services::findOrFail($id);
        $userOwner = User::where('id',$services->user_id)->first()->toArray();

        return view('services.show',['service'=>$services, 'serviceOwner'=> $userOwner]);
    }

    public function dashboard(){
        $user = auth()->user();
        $services = $user->services;

        return view('services.dashboard',['services'=> $services]);
    }

    public function destroy($id){
        Services::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Evento excluído com sucesso!');
    }

    public function edit($id){

        $service = Services::findOrFail($id);

        return view('/services.edit',['service' => $service]);
    }

    public function update(Request $request){

        $data = $request->all();
        
        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $request->image->move(public_path('img/services'),$imageName);
            $data['image'] = $imageName;
        }

        Services::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Evento editado com sucesso!');
    }

    public function joinService($id){
        $user = User::findOrFail($id);
        $user->attach($id);
        $service = Services::findOrFail($id);

        return redirect('/dashboard')->with('msg','Presença confirmada' . $service->title);
    }
}
