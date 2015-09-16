@extends('emails.layout')
@section('body')
    <p style="text-align:left;">Hi {{$name}}, we've been expecting you! Consider this as an official welcoming letter from us, you are now moments away from being part of a great community on the web! It's simple to get started, just click the link below! <br/><a href="http://connectnow.today/activate?code={{$code}}">Please click here to activate your account and get started!</a></p>
<div style="color:#888;text-align:left;font-size:11px;margin-top:15px;">Or if you can't click the link, go to http://connectnow.today/activate?code={{$code}}</div>
@stop
@section('title')
    Welcome to ConnectNow {{$name}}!
@stop