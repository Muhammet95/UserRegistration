<?php

namespace App\Observers;

use App\Mail\NotifyMail;
use App\Models\Request;
use Illuminate\Support\Facades\Mail;

class RequestObserver
{
    /**
     * Handle the Request "created" event.
     *
     * @param  \App\Models\Request  $request
     * @return void
     */
    public function created(Request $request)
    {
        Mail::to($request->email)->send(new NotifyMail($request));
    }

    /**
     * Handle the Request "updated" event.
     *
     * @param  \App\Models\Request  $request
     * @return void
     */
    public function updated(Request $request)
    {
        //
    }

    /**
     * Handle the Request "deleted" event.
     *
     * @param  \App\Models\Request  $request
     * @return void
     */
    public function deleted(Request $request)
    {
        //
    }

    /**
     * Handle the Request "restored" event.
     *
     * @param  \App\Models\Request  $request
     * @return void
     */
    public function restored(Request $request)
    {
        //
    }

    /**
     * Handle the Request "force deleted" event.
     *
     * @param  \App\Models\Request  $request
     * @return void
     */
    public function forceDeleted(Request $request)
    {
        //
    }
}
