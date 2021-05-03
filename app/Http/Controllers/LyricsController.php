<?php

namespace App\Http\Controllers;
use App\User;
use App\Song;
use Illuminate\Http\Request;
use App\Http\Requests\SongRequest;
class LyricsController extends Controller
{
	
    public function __construct(){
    	$this->data['data'] = [];
    }

    public function index(){

    	$this->data['songs'] = Song::all();
    	return view('song.index',$this->data);
    }

    public function create(){
       	return view('song.create',$this->data);
    }

    public function store(SongRequest $request){
     // return $request;

    	$song = new Song;
    	$song->fill($request->all());
    	
    	if($song->save()){

    		session()->flash('notification-status','success');
			session()->flash('notification-msg',"New song has been added successfully.");
    		return redirect()->route("song.index");
    	}
   
    }
    public function edit($id = " "){
    	$this->data['song'] = Song::find($id);
    	return view('song.edit',$this->data);
    }

   public function update(SongRequest $request,$id = " "){
   	$song = Song::find($id);
   	$song->title = $request->title;
   	$song->artist = $request->artist;
   	$song->lyrics = $request->lyrics;
   	if($song->save()){
   			session()->flash('notification-status','success');
			session()->flash('notification-msg',"Data has been modified successfully.");
    		return redirect()->route("song.index");
   	}
   }

    public function destroy($id = " "){
    	$song = Song::find($id);
    	if($song->delete()){
    	return redirect()->back();
    	}
    	
    }

    public function show($id = " "){
    	$this->data["song"] = Song::find($id);
    	return view("song.show",$this->data);
    }
}
