<?php

            use GeoIp2\Database\Reader;
class UserController extends \BaseController {
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $validator = Validator::make(
            Input::get(),
            array(
                'firstname' => 'required|max:20',
                'lastname' => 'required|max:20',
                'password' => 'required|min:8|max:30',
                'email' => 'required|email|unique:users|max:40'
            )
        );
        if ($validator->fails())
        {   
            $messages = array();
            foreach($validator->messages()->all() AS $message){
                array_push($messages, $message);
            }
            return json_encode($messages);
        }else{
            $user = new User;
            $code = str_random(128);
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->activationCode = $code;
            try{
                $reader = new Reader(base_path().'/GeoLite2-City.mmdb');
                $record = $reader->city($_SERVER['REMOTE_ADDR']);
                $user->address = json_encode(array('street' => '','province' => $record->mostSpecificSubdivision->name, 'city' => $record->city->name, 'country'=>$record->country->isoCode));  
            }catch(Exception $e){
                
            }
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            Mail::send('emails.auth.welcome', array('name' => Input::get('firstname'), 'code' => $code), function($message)
            {
                $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Welcome '.Input::get('firstname').'!');
            });
            return 'success';
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id = null)
	{
		$validator = Validator::make(
            Input::get(),
            array(
                'firstname' => 'required|max:20',
                'lastname' => 'required|max:20',
                'changepassword' => 'min:8|max:30',
                'changepasswordconfirm' => 'min:8|max:30|same:changepassword',
                'email' => 'required|email|max:40',
                'about' => 'max:1000'
            )
        );
        if ($validator->fails())
        {   
            $messages = array();
            foreach($validator->messages()->all() AS $message){
                array_push($messages, $message);
            }
            return json_encode($messages);
        }else{
            $user = User::find(Auth::user()->id);
            $stuff = Input::get('types');
            if($stuff == null){
                $stuff = array();
            }
            $user->address = json_encode(array('street' => Input::get('street'),'province' => Input::get('province'), 'city' => Input::get('city'), 'country'=>Input::get('country')));  
            if(Input::has('interestspecific')){
                $toInsert = array();
                $count = 0;
                $charcount = 0;
                foreach(Input::get('interestspecific') as $interest){
                    if($count <= 40 && $charcount < 500){
                        $charcount += strlen($interest);
                        $count++;
                        array_push($toInsert, (trim($interest)));
                    }
                }
                $user->specificint = json_encode($toInsert);
            }else{
                $user->specificint = '[]';
            }
            $user->interests = json_encode(array('events' => in_array('events',$stuff),'projects' => in_array('projects',$stuff), 'volunteering' => in_array('volunteering',$stuff)));
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            if(Input::get('changepassword') != ""){
                $user->password = Hash::make(Input::get('changepassword'));
            }
            if(Input::get('about') != ""){
                $user->about = Input::get('about');
            }
            if(Input::get('address') != ""){
                $user->address = Input::get('address');
            }
            $user->save();
            return 'success';
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}