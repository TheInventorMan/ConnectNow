@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Sign Up</div></h1>
<div id="page-subheading"><div class="container">Go ahead, it's free and takes less than a minute</div></div>
<div id="page-heading-text" style="background-image:url('{{URL::asset('img/about.jpg');}}');">
    <div id="page-heading-text-inner">
        <div class="container">
            <div class="ui five steps" id="top-steps">
                <div class="ui active step" data-target="step-rules" id="top-step-rules">Rules</div>
                <div class="ui disabled step" data-target="step-social" id="top-step-social">Social</div>
                <div class="ui disabled step" data-target="step-details" id="top-step-details">Details</div>
                <div class="ui step" data-target="step-confirm" id="top-step-confirm" ng-class="{disabled: myScope.signupForm.$invalid}">Confirm</div>
                <div class="ui disabled step" data-target="step-complete" id="top-step-complete">Complete</div>
            </div>
        </div>
    </div>
</div>
<div id="page-spacer"></div>
<div class="container" ui-view ng-controller="SignupController">
    <form id="steps" name="signupForm" class="ui fluid form large" autocomplete="off">
        <div class="ui inverted dimmer" id="loader">
            <div class="ui text loader">Loading</div>
        </div>
        <div id="step-rules" class="step active">
            <h1>Rules</h1>
            <p>Before you get started, please take a moment to review our terms of service and privacy policy. They contain valuable information on what can be done and what cannot be done, ensuring that everyone has a fair and happy experience.</p>
            <a href="{{PageController::getUrlPath($lang, 'terms');}}" class="ui button blue" target="_blank">Our Terms of Service</a>
            <a href="{{PageController::getUrlPath($lang, 'privacy');}}" class="ui button blue" target="_blank">Our Privacy Policy</a><br/>&nbsp;<br/>
            <div class="ui red toggle button" id="agreeButton">I agree to the Terms of Service and Privacy Policy</div>
            <input type="hidden" value="false" name="terms" id="terms">
            <div class="ui divider"></div> 
            <a class="ui button facebook disabled" id="rules-continue" onclick="$('#top-step-social').trigger('click');" href="javascript:void(0);">Continue</a>
        </div>
        <div id="step-social" class="step">
            <h1>Let's make your life easier...</h1>
            <div class="text-muted">Link your account with one of your socials, and we'll automatically fill in things for you</div><br/>
            <button class="ui facebook button"><i class="facebook icon"></i> Facebook</button>
            <button class="ui google plus button"><i class="google plus icon"></i> Google Plus</button>
            <button class="ui twitter button"><i class="twitter icon"></i> Twitter</button>
            <div class="ui divider"></div> 
            <a class="ui button" onclick="$('#top-step-rules').trigger('click');" href="javascript:void(0);">Previous</a>
            <a class="ui button facebook" id="social-continue" onclick="$('#top-step-details').trigger('click');" href="javascript:void(0);">Continue</a>
        </div>
        <div id="step-details" class="step">
            <h1>Some Basic Details...</h1>
            <div class="ui two column grid">
                <div class="field ui fluid column">
                    <label>First Name ([[20-firstname.length]] chars remaining)<span class="text-danger">*</span></label>
                    <input type="text" autocomplete="off" ng-model="firstname" required ng-maxlength="20" name="firstname" id="firstname" maxlength="20" placeholder="First name comes first!">
                </div>
                <div class="field ui fluid column">
                    <label>Last Name ([[20-lastname.length]] chars remaining)<span class="text-danger">*</span></label>
                    <input type="text" autocomplete="off" ng-model="lastname" required ng-maxlength="20" name="lastname" id="lastname" maxlength="20" placeholder="Show us your beautiful last name!">
                </div>
            </div>
            <div class="field ui input fluid">
                <label>Email ([[40-email.length]] chars remaining) <span class="text-danger">*</span></label>
                <input name="email" autocomplete="off" ng-model="email" required type="email" ng-maxlength="40" id="email" maxlength="40" placeholder="Give us a way to contact you">
            </div>
            <div class="ui two column grid">
                <div class="field ui column fluid">
                    <label>Password (8 chars min, [[30-password.length]] chars remaining)<span class="text-danger">*</span></label>
                    <input type="password" autocomplete="off" ng-minlength="8" ng-model="password" required ng-maxlength="30" name="signupPassword" id="password" maxlength="30" placeholder="Protect yourself!">
                    <div class="ui progress" id="passbar"><div class="bar" style="width: 0%"><div class="progress-text"></div></div></div>
                </div>
                <div class="field ui column fluid">
                    <label>Confirm Password (8 chars min, [[30-passwordconfirm.length]] chars remaining)<span class="text-danger">*</span></label>
                    <input type="password" autocomplete="off" ng-minlength="8" required ui-validate="'$value==password'" ui-validate-watch="'password'" ng-maxlength="30" name="passwordconfirm" id="passwordconfirm" ng-model="passwordconfirm" maxlength="30" placeholder="Protect yourself again!">
                </div>
            </div>
            <div class="ui divider"></div> 
            <a class="ui button" onclick="$('#top-step-social').trigger('click');" href="javascript:void(0);">Previous</a>
            <a class="ui button facebook" id="details-continue" onclick="$('#top-step-confirm').trigger('click');" href="javascript:void(0);" ng-class="{disabled: signupForm.$invalid}">Continue</a>
        </div>
        <div id="step-confirm" class="step">
            <h1>Hello [[firstname]]!</h1>
            <div class="text-muted">Let's just make sure that everything is right</div>
            <div class="ui segment piled">
                <table class="ui table">
                    <tbody>
                        <tr><td><strong>Name</strong></td><td>[[firstname]] [[lastname]]</td></tr>
                        <tr><td><strong>Email</strong></td><td>[[email]]</td></tr>
                        <tr><td><strong>Password Length</strong></td><td>[[password.length]] characters long</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="ui divider"></div> 
            <div class="ui red message" ng-hide="errors.length == 0">
                <ul>
                    <li ng-repeat="error in errors">[[error]]</li>
                </ul>
            </div>
            <a class="ui button" onclick="$('#top-step-details').trigger('click');" href="javascript:void(0);">Previous</a>
            <a class="ui button facebook" id="confirm-continue" ng-click="submit()" href="javascript:void(0);">I'm ready, blastoff!</a>
        </div>
        <div id="step-complete" class="step">
            <h1>It's done [[firstname]]!</h1>
            <p>Just to be sure, we've sent you an email ([[email]]) to verify your account. It should arrive in a couple moments. Just click the link on that email and it's smooth sailing here on out! <div class="text-muted">Make sure to check your spam folder!</div></p>
            <div class="text-muted">(you can close this page now)</div>
        </div>
    </form>
</div>
<div class="spacer"></div>
@stop
@section('scripts')
    
    
    function Captcha(elem) {
        var time = Math.round(new Date().getTime() / 1000);
        this.show = function () {
            time = Math.round(new Date().getTime() / 1000);
            var imgurl = 'https://192.241.165.163/captcha/en?id=' + time;
            $(elem).html('<img src="' + imgurl + '" class="panel" style="padding:0px;height:102px;width:202px;margin:0px;"/>');
        }
        this.getId = function () {
            return time;
        }
    }
    var passwordElement = $('#password');
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
    var tc = new Captcha($('#captcha'));
    tc.show();
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
$(window).resize(function(){
    $('#resultsMenu').width('auto');
    if($('#resultsMenu').hasClass('affix')){
        $('#resultsMenu').removeClass('affix').width($('#resultsMenu').width()).addClass('affix');

    }else{
        $('#resultsMenu').width($('#resultsMenu').width());
    }
});
$(window).load(function(){
    $('#signupForm input').val('');
});
function SignupController($scope, $rootScope) {
    $scope.errors = [];
    $scope.submit = function(){
        $('#loader').addClass('active');
        $.get('{{URL::asset('user/create');}}', {firstname:$scope.firstname, _token:$rootScope.csrf, lastname:$scope.lastname, email:$scope.email, password:$scope.password, passwordconfirm:$scope.passwordconfirm}, function(data){
            $('#loader').removeClass('active');
            if(data == 'success'){
                $('#top-steps .step').addClass('disabled');
                $('#top-step-complete').removeClass('disabled').click();
            }else{
                $scope.errors = JSON.parse(data);
                $scope.$apply();
            }
        });
    }
    $rootScope.myScope = $scope;
}
$(function(){
    /*var validationRules = {
        firstname: {
            identifier: 'firstname',
            rules: [{
              type: 'empty',
              prompt: "Please enter your first name"
            },{
              type: 'maxLength[20]',
              prompt: 'Your first name is a bit too long for us to handle...'
            }]
        },
        lastname: {
            identifier: 'lastname',
            rules: [{
              type: 'empty',
              prompt: 'Please enter your last name'
            },{
              type: 'maxLength[20]',
              prompt: 'Your last name is a bit too long for us to handle...'
            }]
        },
        email: {
            identifier: 'email',
            rules: [{
              type: 'empty',
              prompt: 'We need to contact you!'
            },{
              type: 'maxLength[40]',
              prompt: 'Your email is a bit too long for us to handle...'
            },{
              type: 'email',
              prompt: 'Check your email. It isn\'t valid'
            }]
        },
        password: {
            identifier: 'password',
            rules: [{
              type: 'empty',
              prompt: 'Please enter your password'
            },{
              type: 'length[8]',
              prompt: 'Your password is too short'
            },{
              type: 'maxLength[30]',
              prompt: 'Your password is a bit too long for us to handle...'
            }]
        },
        passwordconfirm: {
            identifier: 'passwordconfirm',
            rules: [{
              type: 'empty',
              prompt: 'Please confirm your password'
            },{
              type: 'match[password]',
              prompt: 'Your password doesn\'t match'
            }]
        }
    }; $('#steps').form(validationRules, {
        inline : true,
        on: 'blur',
        onValid: function(){
            $(this).addClass('input-success');   
        },
        onInvalid: function(){
            $(this).removeClass('input-success');  
        }
    });*/
    $('#steps').submit(function(e){
        e.preventDefault();
    });
    /*$('#steps input, #steps textarea').change(function(){
        $('#steps').form('validate form');
        if($('#firstname').hasClass('input-success') && $('#lastname').hasClass('input-success') && $('#email').hasClass('input-success') && $('#password').hasClass('input-success') && $('#passwordconfirm').hasClass('input-success')){
            $('#details-continue, #top-step-confirm').removeClass('disabled');
        }else{
            $('#details-continue, #top-step-confirm').addClass('disabled');
        }
    });*/
    $('#steps input, #steps textarea').trigger('change');
    $('.ui.dropdown').dropdown();
    $('#agreeButton').click(function(){
        if($('#agreeButton').hasClass('active')){
            $('#agreeButton').removeClass('active');
            $('#rules-continue, #top-step-social, #top-step-details').addClass('disabled');
            $('#terms').val('false');
        }else{
            $('#agreeButton').addClass('active');
            $('#terms').val('true');
            $('#rules-continue, #top-step-social, #top-step-details').removeClass('disabled');
        }
    });
    $('#top-steps').on('click','.step:not(.disabled)',function(){
         $('#top-steps .step').removeClass('active');
        $(this).addClass('active');
        $('#steps .step').hide();
        $('#'+$(this).attr('data-target')).show();
    });
});
@stop