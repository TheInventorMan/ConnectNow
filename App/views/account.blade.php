@extends('layout')
@section('top')
<?php
    if(isset($_POST['_token']) && Session::get('_token') == Input::get('_token')){
        $userController = new UserController;
        $returnValue = $userController->update();
    }
    if(Auth::check()){
        $user = (object) DB::table('users')->where('id', Auth::user()->id)->first();   
    }
    $userData = array(
        'firstname' => $user->firstname, 
        'lastname' => $user->lastname,
        'email' => $user->email,
        'about' => $user->about,
        'address' => (object)json_decode($user->address),
        'types' => (object)json_decode($user->interests),
        'specific' => json_decode($user->specificint, true)
    );
?>
@stop
@section('content')
<h1 id="page-header"><div class="container">Account Settings</div></h1>
<div id="page-subheading"><div class="container">Time to tinker!</div></div>
<div class="container" id="resultsContainer" ng-controller="accountController">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div id="resultsMenu">
                <div class="ui vertical menu" ng-init="page.active='basic';check()">
                    <a class="item black" href="#all" ng-class="{active:page.active=='all'}" ng-click="page.active='all'"><i class="grid layout icon"></i> <span ng-style="{ 'font-weight' : page.active=='all' ? 'bold' : 'normal'}">Show All</span></a>
                    <a class="purple item" href="#basic" ng-class="{active:page.active=='basic'}" ng-click="page.active='basic'"><i class="flag icon red" ng-show="isValid('#basic-section')"></i><i class="save icon" ng-show="isDirty('#basic-section')"></i> Basic</a>
                    <a class="item orange" href="#personal" ng-class="{active:page.active=='personal'}" ng-click="page.active='personal'"><i class="flag icon red" ng-show="isValid('#personal-section')"></i><i class="save icon" ng-show="isDirty('#personal-section')"></i> Personalization</a>
                    <a class="item teal" href="#privacy" ng-class="{active:page.active=='privacy'}" ng-click="page.active='privacy'">Privacy</a>
                    <a class="item blue" href="#email" ng-class="{active:page.active=='email'}" ng-click="page.active='email'">Email Settings</a>
                    <a class="item red" href="{{PageController::getUrlPath($lang, 'deleteaccount');}}">Delete Account</a>
                </div>
                <div class="text-muted">Thick bottom bar means you've modified the value</div>
            </div>
        </div>
        <form class="col-sm-9 col-md-9 ui form" name="editForm" action="#" id="editForm" ng-submit="submit($event)" autocomplete="off" method="post">
            <div ng-show="page.active=='basic' || page.active=='all'" id="basic-section">
                <h1 class="settings-head">Basic Settings</h1>
                <div class="row">
                    <div class="col-sm-4">
                        <img src="http://placehold.it/300x300" style="width:100%;">
                    </div>
                    <div class="col-sm-8">
                        <div class="field ui input fluid">
                            <label>First Name ([[20-user.firstname.length]] chars remaining)<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" ng-model="user.firstname" ng-trim="false" name="firstname" required ng-maxlength="20" maxlength="20" placeholder="First name comes first!">
                        </div>
                        <div class="field ui input fluid">
                            <label>Last Name ([[20-user.lastname.length]] chars remaining)<span class="text-danger">*</span></label>
                            <input type="text" autocomplete="off" ng-model="user.lastname" ng-trim="false" name="lastname" required ng-maxlength="20" maxlength="20" placeholder="Show us your beautiful last name!">
                        </div>
                        <div class="field ui">
                            <label>Upload Profile Picture (max 8mb | jpg, png, gif)</label>
                            <input type="file" name="picture" class="ui button">
                        </div>
                    </div>
                </div>
                <div class="ui divider"></div>
                <div class="field ui input fluid">
                    <label>Email ([[40-user.email.length]] chars remaining) <span class="text-danger">*</span></label>
                    <input name="email" autocomplete="off" ng-model="user.email" ng-trim="false" required ng-maxlength="40" type="email" maxlength="40" placeholder="Give us a way to contact you">
                </div>
                <div class="ui divider"></div>
                <strong>Change Password</strong>
                <div class="text-muted">Leave this empty if you don't want to change it</div>
                <div class="ui two column grid">
                    <div class="field ui column fluid">
                        <label>Password (8 chars min, [[30-password.length]] chars remaining)</label>
                        <input type="text" class="pseudopass" autocomplete="off" ng-model="user.password" ng-minlength="8" ng-maxlength="30" name="changepassword" maxlength="30" id="changepassword" placeholder="Protect yourself!">
                        <div class="ui progress" id="passbar"><div class="bar" style="width: 0%"><div class="progress-text"></div></div></div>
                    </div>
                    <div class="field ui column fluid">
                        <label>Confirm Password (8 chars min, [[30-passwordconfirm.length]] chars remaining)</label>
                        <input type="text" class="pseudopass" autocomplete="off" ng-minlength="8" ui-validate="'$value==user.password'" ui-validate-watch="'user.password'" ng-maxlength="30" name="changepasswordconfirm" ng-model="user.passwordconfirm" maxlength="30" placeholder="Protect yourself again!">
                    </div>
                </div>
            </div>
            <div ng-show="page.active=='personal' || page.active=='all'" id="personal-section">
                <div class="ui divider" ng-show="page.active=='all'"></div>
                <h1 class="settings-head">Personal Settings</h1>
                <h3>Basic Personalization</h3>
                <div class="field ui input fluid">
                    <label>About You ([[1000-user.about.length]] chars remaining)</label>
                    <textarea name="about" autocomplete="off" ng-model="user.about" ng-trim="false" ng-maxlength="1000" maxlength="1000" placeholder="Tell the world who you are!"></textarea>
                </div>
                <div class="field ui input fluid">
                    <label>Street Address ([[70-user.address.length]] chars remaining)</label>
                    <input name="street" autocomplete="off" ng-model="user.address.street" ng-trim="false" ng-maxlength="70" type="text" maxlength="70" placeholder="Automatically tell organizers where you are when you sign up for events">
                </div>
                <div class="ui three column grid">
                    <div class="field ui column fluid bottom">
                        <label>City ([[30-user.address.city.length]] chars remaining)</label>
                        <input name="city" autocomplete="off" ng-model="user.address.city" ng-trim="false" ng-maxlength="30" type="text" maxlength="30">
                    </div>
                    <div class="field ui column fluid bottom">
                        <label>State/Province ([[30-user.address.province.length]] chars remaining)</label>
                        <input name="province" autocomplete="off" ng-model="user.address.province" ng-trim="false" ng-maxlength="30" type="text" maxlength="30">
                    </div>
                    <div class="field ui column fluid bottom">
                        <label>Country</label>
                        <div class="ui selection dropdown" id="user-country-dropdown">
                            <input type="text" style="display:none;" id="user-country" name="country" ng-model="user.address.country" value="{{{$userData['address']->country}}}">
                            <div class="default text">Select a Country</div>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <div on-finish-render="doSelect()" ng-repeat="(code, country) in countries" class="item" data-value="[[code]]">[[country]]</div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>Targeting</h3>
                <div class="text-muted">Let us give you stuff that's relevant to you!</div><br/>
                <strong>What do you want to discover?</strong><br/>
                <div class="check">
                  <label><input type="checkbox" ng-model="user.types.events" name="types[]" value="events"> Events</label>
                </div>
                <div class="check">
                  <label><input type="checkbox" ng-model="user.types.projects" name="types[]" value="projects"> Projects</label>
                </div>
                <div class="check">
                  <label><input type="checkbox" ng-model="user.types.volunteering" name="types[]" value="volunteering"> Volunteering Opportunities</label>
                </div>
                <div style="height:10px;"></div>
                <strong>Specific Interests?</strong><br/>
                <div class="text-muted">Seperate with commas ([[500-user.specific.toString().length]] chars remaining, [[40-user.specific.length]] tags remaining)</div>
                <div class="ui label teal" ng-repeat="interest in user.specific | unique | limitTo:40">[[interest]]<input type="checkbox" style="display:none;" name="interestspecific[]" checked value="[[interest]]"></div>
                <div style="height:10px;"></div>
                <div class="field ui input fluid">
                    <textarea ui-validate="'40-user.specific.length > -1'" maxlength="500" ng-maxlength="500" msd-elastic="\n" id="interests-textarea" autocomplete="off" ng-list ng-model="user.specific"></textarea>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{csrf_token();}}">
            <div ng-show="page.active=='privacy' || page.active=='all'">
                <div class="ui divider" ng-show="page.active=='all'"></div>
                <h1 class="settings-head">Privacy Settings</h1>
            </div>
            <div ng-show="page.active=='email' || page.active=='all'">
                <div class="ui divider" ng-show="page.active=='all'"></div>
                <h1 class="settings-head">Email Settings</h1>
            </div>
            <div class="ui divider"></div>
            <button class="ui button" ng-class="{disabled:(editForm.$dirty == false || editForm.$invalid == true), negative: editForm.$invalid == true, positive: editForm.$invalid == false && editForm.$dirty == true}"><span ng-show="editForm.$invalid == true">There are some invalid fields</span><span ng-show="editForm.$dirty == false">Nothing has changed</span><span ng-show="editForm.$dirty == true && editForm.$invalid == false">Save Changes</span></button><div style="height:10px;"></div>
            <?php if(isset($returnValue)){
                if($returnValue == 'success'){
                    echo '<div class="text-success">Account Successfully Updated</div>';
                }else{
                    foreach(json_decode($returnValue, true) AS $error){
                        echo '<div class="text-danger">'.$error.'</div>';
                    }
                }
            }?>
        </form> 
    </div>
</div>
<div class="spacer"></div>
  <div class="ui active inverted dimmer" id="formDimmer" style="display:none;">
    <div class="ui text loader">Saving...</div>
  </div>
@stop
@section('scripts')
helperAngular.directive('onFinishRender', function ($timeout) {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
            if (scope.$last === true) {
                scope.$evalAsync(attr.onFinishRender);
            }
        }
    }
});
var passwordElement = $('#changepassword');
var passwordBar = $('#passbar');
passwordElement.keyup(function () {
    var alphabet = 0;
    var value = passwordElement.val();
    if (value.match(/\d+/g)) {
        alphabet += 10;
    }
    if (value.match(/[a-z]/)) {
        alphabet += 26;
    }
    if (value.match(/[A-Z]/)) {
        alphabet += 26;
    }
    if (value.match(/\p{L}/)) {
        alphabet += 26;
    }
    if (!value.match(/^[a-z0-9]+$/i)) {
        alphabet += 33;
    }
    if (!value.match(/^[ -~]+$/)) {
        alphabet += 123;
    }
    var entropy = value.length * Math.log(alphabet) / Math.log(2);
    var passwordStrength = "";
    var passwordClass = "failed";
    var passwordColor = "#FFF";
    if (entropy > 100) {
        passwordStrength = "Excellent";
        passwordClass = "successful";
    } else if (entropy > 80) {
        passwordStrength = "Good";
        passwordClass = "blue";
    } else if (entropy > 60) {
        passwordStrength = "Fair";
        passwordClass = "warning";
    } else if (entropy > 40) {
        passwordStrength = "Weak";
    } else if (entropy > 0) {
        passwordStrength = "Insecure";
        passwordClass = "red";
    }
    if (value.length < 8) {
        var passwordStrength = "";
        entropy = 0;
    } else {
        if (entropy > 100) {
            entropy = 100;
        }
        entropy /= 1 + (100 - entropy) / 100;
        if (entropy > 60) {
            var passwordColor = "#FFF"; 
        }
    }
    passwordBar.attr('class', 'ui progress ' + passwordClass).find('.bar').width(entropy + '%');
    passwordBar.find('.progress-text').text(passwordStrength).css('color', passwordColor);
});
passwordElement.trigger('keyup');
function accountController($scope){
    $scope.user = {{json_encode($userData);}};
    $scope.submit = function(e){
        if(!$scope.editForm.$dirty || $scope.editForm.$invalid){
            e.preventDefault();
        }else{  
            $(window).scrollTop(0);
            $('#formDimmer').show();
        }
    };
    $scope.doSelect = function(){
        $('#user-country-dropdown').dropdown('set value', $scope.user.address.country).dropdown({onChange:function(value, text){
            $('#user-country').val(value).trigger('change');
        }});
    };
    $scope.countries = {{json_encode($countries)}};
    $scope.user.hasSubmit = false;
    $scope.isValid = function(selector){
        return $(selector).find('.ng-invalid').length;
    }
    $scope.isDirty = function(selector){
        return $(selector).find('.ng-dirty').length;
    }
    $scope.check = function(){
        <?php
            if(Input::has('hash')){
                echo 'location.hash = "'.Input::get('hash').'";';   
            }
        ?>
        if(location.hash == "#all" || location.hash == "#basic" || location.hash == "#personal" || location.hash == "#privacy" || location.hash == "#email"){
            $scope.page.active = location.hash.substring(1);
        }
    }
    window.scope = $scope;
}
$(window).hashchange(function(){
    $('#editForm').attr('action', location.hash);
}).trigger('hashchange');
$('#resultsMenu').affix({
    offset: {
      top: function () {
        return (this.top = $('#resultsContainer').offset().top - 120)
        }
    , bottom: function () {
        return ($('#footer').outerHeight(true)+200)
      }
    }
});
$('.pseudopass').focus(function(){
    $(this).attr('type', 'password');
});
$(window).resize(function(){
    $('#resultsMenu').width('auto');
    if($('#resultsMenu').hasClass('affix')){
        $('#resultsMenu').removeClass('affix').width($('#resultsMenu').width()).addClass('affix');
    }else{
        $('#resultsMenu').width($('#resultsMenu').width());
    }
});
@stop