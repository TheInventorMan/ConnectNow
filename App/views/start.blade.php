@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Start</div></h1>
<div id="page-subheading"><div class="container">Go out there and start your own awesome!</div></div>
<div id="page-heading-text" style="background-image:url('{{URL::asset('img/about.jpg');}}');">
    <div id="page-heading-text-inner">
        <div class="container">
            <div class="ui five steps" id="top-steps">
                <div class="ui active step" data-target="step-rules" id="top-step-rules">Rules</div>
                <div class="ui disabled step" data-target="step-basic" id="top-step-basic">Basic</div>
                <div class="ui disabled step" data-target="step-advanced" id="top-step-advanced">Advanced</div>
                <div class="ui disabled step" data-target="step-confirm" id="top-step-confirm">Confirm</div>
                <div class="ui disabled step" data-target="step-complete" id="top-step-complete">Complete</div>
            </div>
        </div>
    </div>
</div>
<div id="page-spacer"></div>
<div class="container">
    <form id="steps" class="ui fluid form large">
        <div id="step-rules" class="step active">
            <h1>Rules</h1>
            <p>Before you get started, please take a moment to review our terms of service and privacy policy. They contain valuable information on what can be done and what cannot be done, ensuring that everyone has a fair and happy experience.</p>
            <a href="{{PageController::getUrlPath($lang, 'terms');}}" class="ui button blue" target="_blank">Our Terms of Service</a>
            <a href="{{PageController::getUrlPath($lang, 'privacy');}}" class="ui button blue" target="_blank">Our Privacy Policy</a><br/>&nbsp;<br/>
            <div class="ui red toggle button" id="agreeButton">I agree to the Terms of Service and Privacy Policy</div>
            <input type="hidden" value="false" name="terms" id="terms">
            <div class="ui divider"></div> 
            <a class="ui button facebook disabled" id="rules-continue" onclick="$('#top-step-basic').trigger('click');" href="javascript:void(0);">Continue</a>
        </div>
        <div id="step-basic" class="step">
            <h1>Basic Setup</h1>
            <div class="field ui input fluid">
                <label>Title (50 chars max) <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" maxlength="50" placeholder="Give us a simple title for your endeavour">
            </div>
            <div class="field ui input fluid">
                <label>Description (600 chars max) <span class="text-danger">*</span></label>
                <textarea name="description" id="description" maxlength="600" placeholder="What's this about? Tell us about it!"></textarea>
            </div>
            <div class="field ui input fluid">
                <label>Type <span class="text-danger">*</span></label>
                <div class="ui fluid dropdown selection">
                    <input name="type" type="hidden" value="event">
                    <div class="default text">Event</div>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item" data-value="event">Event</div>
                        <div class="item" data-value="project">Project</div>
                        <div class="item" data-value="volunteer">Volunteering</div>
                    </div>
                </div>
            </div>
            <div class="ui divider"></div> 
            <a class="ui button facebook disabled" id="basic-continue" onclick="$('#top-step-advanced').trigger('click');" href="javascript:void(0);">Continue</a>
        </div>
        <div id="step-advanced" class="step">
            <h1>Advanced Details</h1>
        </div>
        <div id="step-confirm" class="step">
            
        </div>
        <div id="step-complete" class="step">
            
        </div>
    </form>
</div>
<div class="spacer"></div>
@stop
@section('scripts')
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
$(function(){
    var validationRules = {
        title: {
            identifier: 'title',
            rules: [{
              type: 'empty',
              prompt: 'You must have a title'
            },{
              type: 'maxLength[50]',
              prompt: 'Your title must be under 50 characters'
            }]
        },
        description: {
            identifier: 'description',
            rules: [{
              type: 'empty',
              prompt: 'You must have a description'
            },{
              type: 'maxLength[600]',
              prompt: 'Your description must be under 50 characters'
            }]
        },
        type: {
            identifier: 'type',
            rules: [{
              type: 'empty',
              prompt: 'You must specify the type'
            }]
        }
    };
    $('#steps').submit(function(e){
        e.preventDefault();
    }).form(validationRules, {
        inline : true,
        on: 'blur',
        onValid: function(){
            $(this).addClass('input-success');   
        },
        onInvalid: function(){
            $(this).removeClass('input-success');  
        }
    });
    $('#steps input, #steps textarea').change(function(){
        setTimeout(function(){
            if($.trim($('#title').val()).length > 0 && $.trim($('#title').val()).length < 50 && $.trim($('#description').val()).length > 0 && $.trim($('#description').val()).length < 600){
                $('#basic-continue, #top-step-advanced').removeClass('disabled');
            }else{
                $('#basic-continue, #top-step-advanced').addClass('disabled');
            }
        }, 100);
    });
    $('#steps input, #steps textarea').trigger('change');
    $('.ui.dropdown').dropdown();
    $('#agreeButton').click(function(){
        if($('#agreeButton').hasClass('active')){
            $('#agreeButton').removeClass('active');
            $('#rules-continue, #top-step-basic').addClass('disabled');
            $('#terms').val('false');
        }else{
            $('#agreeButton').addClass('active');
            $('#terms').val('true');
            $('#rules-continue, #top-step-basic').removeClass('disabled');
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