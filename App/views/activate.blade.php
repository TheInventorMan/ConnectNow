@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Activate your account</div></h1>
<div id="page-subheading"><div class="container">You're almost there!</div></div>
<div class="container">
    <?php 
        $error = null;
        if(Input::has('email') && Input::has('_token') && Input::has('code')){
            if(Session::get('_token') == Input::get('_token')){
                $data = DB::table('users')->where('email', Input::get('email'))->where('activationCode', Input::get('code'));
                if($data->count() == 1){
                    if($data->first()->activated == false){
                        DB::table('users')->where('email', Input::get('email'))->where('activationCode', Input::get('code'))->update(array('activated' => true));
                        $error = false;
                    }else{
                        $error = 'Account already activated';   
                    }
                }else{
                    $error = 'Invalid Activation Code/Email combination';   
                }
            }else{
                $error = 'Invalid Session Token. Refresh and try again';
            }
        }
        if($error === false){ ?>
        <h2>Thank you for activating your account!</h2>
        <a href="{{PageController::getUrlPath($lang, 'login');}}" class="ui button green">Click here to log in</a>
    <?php }else{
        echo '<div id="page-spacer"></div>';
        if($error !== null){
            echo '<div class="ui red message">'.$error.'</div>';
        }
    ?>
    <form class="ui form" id="activate-form" method="POST" action="#">
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" id="activate-email" value="{{Input::get('email');}}">
        </div>
        <div class="field">
            <label>Activation Code</label>
            <input type="text" name="code" id="activate-code" value="{{Input::get('code');}}">
        </div>
        <input type="hidden" name="_token" value="{{csrf_token();}}">
        <input type="submit" class="ui button green" id="activate-button" value="Activate Account">
    </form>
    <?php } ?>
</div>
<div class="spacer">&nbsp;</div>
@stop