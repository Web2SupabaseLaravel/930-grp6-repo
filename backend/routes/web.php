<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/humans', function () {
    return view('humans');
});

Route::get('/tickets', function () {
    return view('tickets');
});

Route::get('/admins', function () {
    return view('admins');
});

Route::get('/admin_dashboards', function () {
    return view('admin_dashboards');
});

Route::get('/admin_human_manages', function () {
    return view('admin_human_manages');
});

Route::get('/admin_ticket_accesses', function () {
    return view('admin_ticket_accesses');
});

Route::get('/organizers', function () {
    return view('organizers');
});

Route::get('/organizer_dashboards', function () {
    return view('organizer_dashboards');
});

Route::get('/attendees', function () {
    return view('attendees');
});

Route::get('/attendee_events_searches', function () {
    return view('attendee_events_searches');
});

Route::get('/attendee_ticket_accesses', function () {
    return view('attendee_ticket_accesses');
});


>>>>>>> event-repo/main
