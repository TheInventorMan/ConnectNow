@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Log In</div></h1>
<div id="page-subheading"><div class="container">Log in to your account here!</div></div>
<div class="container">
    <div id="page-spacer"></div>
    <?php 
        $error = null;
        if(Auth::check()){
            $error = false;   
        }
        if(Input::has('email') && Input::has('_token') && Input::has('password') && $error === null){
            if(Session::get('_token') == Input::get('_token')){
                $data = DB::table('users')->where('email', Input::get('email'))->where('activationCode', Input::get('code'));
                if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'), 'activated' => true)))
                {
                    $error = false;
                }else{
                    $error = 'Invalid Email/Password OR Account not Activated';   
                }
            }else{
                $error = 'Invalid Session Token. Refresh and try again';
            }
        }
        if($error === false){ ?>
        <div>Logged in... redirecting...</div>
        <?php if(Input::has('same')){ ?>
        <script type="text/javascript">window.location.reload();</script>
            
        <?php }else{ ?>
        <script type="text/javascript">window.location.replace("{{PageController::getUrlPath($lang, 'home');}}");</script>
    <?php } }else{
        if($error !== null){
            echo '<div class="ui red message">'.$error.'</div>';
        }
    ?>
    <form class="ui form" method="POST" action="#">
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" id="activate-email" value="{{Input::get('email');}}">
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="password" value="{{Input::get('password');}}">
        </div>
        <input type="hidden" name="_token" value="{{csrf_token();}}">
        <?php if(isset($loginSame)||Input::has('same')){ ?>
        <input type="hidden" name="same" value="true">
        <?php } ?>
        <input type="submit" class="ui button green" value="Login">
    </form>
    <?php } ?>
</div>
<div class="spacer">&nbsp;</div>
@stop