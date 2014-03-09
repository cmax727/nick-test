<?php

class UserprofilesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $uprofiles=array();
        $uprofiles = DB::collection('userprofiles')->get();
//        $uprofiles = Userprofile::find('1234');
		return View::make("userprofiles.index", compact('uprofiles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make("userprofiles.create", array());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $uid = Input::get('uid');
        foreach (range(0,2) as $kk){
        $host[] = array(
            'hostname'=>Input::get('hostname')[$kk],
            'block'=>@Input::get('block')[$kk]
        );
        $network[] = array(
            'nid'=>Input::get('nid')[$kk],
            'n_name'=>Input::get('name')[$kk],
            'n_ip'=>Input::get('n_ip')[$kk],
            'n_status'=>Input::get('n_status')[$kk],
        );

    }
        $userProfile = Userprofile::where('uid', $uid)->first();

        if ( ! $userProfile){
            $userProfile = new Userprofile();
            $userProfile->uid = $uid;

        }else{
//            $userProfile->hosts->insert( $host);
//            $userProfile->networks[] =  $network;
        }
        $userProfile->hosts =  (object) $host;
        $userProfile->networks = (object) $network;

        $userProfile->save();

        return View::make('userprofiles.show', array('uprofile'=>$userProfile));
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $uprofile = Userprofile::where('uid', $id)->first();
        return View::make('userprofiles.show', compact('uprofile'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $uprofile = Userprofile::where('uid', $id)->first();
        return View::make('userprofiles.edit', compact('uprofile'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $uid = $id;
        foreach (range(0,2) as $kk){
            $host[] = array(
                'hostname'=>Input::get('hostname')[$kk],
                'block'=>@Input::get('block')[$kk]
            );
            $network[] = array(
                'nid'=>Input::get('nid')[$kk],
                'n_name'=>Input::get('name')[$kk],
                'n_ip'=>Input::get('n_ip')[$kk],
                'n_status'=>Input::get('n_status')[$kk],
            );

        }
        $userProfile = Userprofile::where('uid', $uid)->first();

        $userProfile->hosts =  (object) $host;
        $userProfile->networks = (object) $network;

        $userProfile->save();
        return Redirect::to('userprofiles');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $uprofile = Userprofile::where('uid', $id)->delete();
        return View::make('userprofiles.index');
	}

}