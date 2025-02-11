<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventResponseController extends Controller
{
    public function index(Event $event): View
    {
        return view('form.event', compact('event'));
    }
    public function success(EventResponse $eventResponse): View
    {
        return view('form.success', compact('eventResponse'));
    }
}
