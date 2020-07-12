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
        $new_location->url = $request->url;
        $new_location->user_id = $user['id'];
        $new_location->latitude = 35.6851793;//kari
        $new_location->longitude = 139.7506108;//kari
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
        return view('locations.edit');
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
