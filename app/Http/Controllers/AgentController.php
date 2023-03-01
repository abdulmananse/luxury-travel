<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function invite ()
    {
        return view('agents.invite');
    }
    
    public function sendInvitation (Request $request)
    {
        $emails = explode(',', $request->emails);
        if (count($emails) == 1) {
            $emails = explode(PHP_EOL, $emails[0]);
        }
        dd($emails);
    }
}
