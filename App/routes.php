<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$languages = array('en','ch');
$GLOBALS['request-locale'] = Request::segment(1);
if(!in_array($GLOBALS['request-locale'], $languages)){
    $GLOBALS['request-locale'] = 'en';
}
Route::group(array('before' => 'csrf'), function()
{
    if(Auth::check()){
        Route::resource('user', 'UserController',array('only' => array('show','edit','update','destroy')));
    }else{
        Route::resource('user', 'UserController',array('only' => array('show','create')));
    }
});
/*Route::any('/emailtest', function(){
    $users = User::all();
    foreach($users as $user){
        $GLOBALS['user'] = $user;
        Mail::send('emails.auth.welcome', array('name' => $user->firstname), function($message)
        {
            $message->to($GLOBALS['user']->email, $GLOBALS['user']->firstname.' '.$GLOBALS['user']->lastname)->subject('Welcome '.$GLOBALS['user']->firstname.'!');
        });
    }
});*/
Route::group(array('prefix' => $GLOBALS['request-locale']), function()
{
    Route::get('{all}', function($page){
        $showLang = new PageController;
        return $showLang -> showPageLang($GLOBALS['request-locale'], $page);
    })->where('all', '.*');
});
Route::any('{all}', 'PageController@showPage')->where('all', '.*');
/*
Route::get('/', function()
{
	return View::make('home',array('css'=>'home'));
});
Route::get('/explore', function()
{
	return View::make('explore',array('css'=>'explore'));
});*/