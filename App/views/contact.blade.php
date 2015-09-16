@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">Contact Us</div></h1>
<div id="page-subheading"><div class="container">So you want to stalk us? Fine.</div></div>
<div class="container">
    <div class="row">
        <div class="col-sm-7 col-md-8">
            <h2>Shoot us an email!</h2>
            <form id="contact-form" class="ui form">
                <div class="field">
                    <label>Name</label>
                    <input type="text">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email">
                </div>
                <div class="field">
                    <label>Message</label>
                    <textarea></textarea>
                </div>
                <input type="submit" value="Blastoff!" class="ui button green massive">
            </form>
        </div>
        <div class="col-sm-5 col-md-4">
            <h3>Or use the following:</h3>
            <strong>Email:</strong>
            <div><a href="mailto:contact@connectnow.today">contact@connectnow.today</a></div><br/>
            <strong>Phone:</strong>
            <div>111-222-3333</div>
            <div class="ui segment">
                Please use this contact information regarding any inquiries that are related to ConnectNow and/or any partnership development that is currently being processed with the organization.
            </div>
            <div class="ui horizontal divider">
                OR
            </div>
            <div class="center">
                <a href="{{PageController::getUrlPath($lang, 'about');}}#members" class="button ui large">Contact a specific member of the team</a>
            </div>
        </div>
    </div>
</div>
<div class="spacer">&nbsp;</div>
@stop