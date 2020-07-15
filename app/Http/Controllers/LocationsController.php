<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models;
use Auth;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function new()
    {

      return view('locations.new');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();
        //location_create
        $new_location = new Location;
        $new_location->title = $request->title;
        $new_location->content = $request->content;
        $new_location->user_id = $user['id'];
        $new_location->url = 'null';
        $new_location->latitude = $request->lat;//kari
        $new_location->longitude = $request->lng;//kari
        $new_location->save();
        return redirect('/users/locations/list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function list()
   {
     $user = Auth::user();
     $users = Models\User::all();
     $query = Location::query();
     $query->where('user_id',$user->id); // user_id が 1 のものだけを取得する
     $lists = $query->get();
     //$lists = Location::all();
     return view('locations.list',compact('lists','users'));
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('locations.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $location = Location::find($id);
        return view('locations.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $location = Location::find($id);
        $location->title = $request->title;
        $location->content = $request->content;
        $location->url = "";
        $location->latitude = $request->lat;//
        $location->longitude = $request->lng;//
        $location->save();
        return redirect('/users/locations/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $location = Location::find($id);
        $location->delete();
        return redirect('/users/locations/list');

    }
}
