@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Delete Account</div></h1>
<div class="container">
    <div id="page-spacer"></div>
    <?php
        if(Input::has('deleteConfirm') && Input::get('deleteConfirm') == 'DELETE'){
            $id = Auth::user() -> id;
            Auth::logout();
            User::destroy($id);
            ?>
        <h3>Your account has been successfully deleted.</h3>
        <p>We hope that you've enjoyed your time here, and wish you the best for the future.</p>
      <?php  }else{
    ?>
    <form action="#" id="deleteForm" method="post">
        <p><strong>Are you sure you want to delete your account? You will lose EVERYTHING on this site (that's a lot of stuff) FOREVER (that's a very long time) and it cannot be undone.</strong></p>
        <p>Type "<strong>DELETE</strong>" in capitals below to confirm deletion</p>
        <div class="ui input fluid">
            <input type="text" ng-model="deleteForm" name="deleteConfirm">
        </div>
        <div class="ui divider"></div>
        <a class="ui button" href="{{PageController::getUrlPath($lang, 'dashboard');}}">Cancel</a>
        <button class="ui button negative" ng-show="deleteForm == 'DELETE'" id="delete-account-button">Delete Account Permanently (no going back after this)</button>
        <div class="spacer"></div>
    </form>
    <?php } ?>
</div>
@stop
@section('scripts')
$('#deleteForm .input').keypress(function(e){
    if ( e.which == 13 )
    {
        $(this).next().focus();  //Use whatever selector necessary to focus the 'next' input
        return false;
    }
});
@stop