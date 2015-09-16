@extends('layout')
@section('content')
@section('content')
<h1 id="page-header"><div class="container">Logout</div></h1>
<div id="page-subheading"><div class="container">Logging you out...</div></div>
<div class="container">
    <div id="page-spacer"></div>
    <?php
        Auth::logout();
    ?>
    <div>Logged out... redirecting...</div>
    <script type="text/javascript">window.location.replace("{{PageController::getUrlPath($lang, 'home');}}");</script>
@stop