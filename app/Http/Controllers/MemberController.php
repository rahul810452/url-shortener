<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invitation;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {
        $members = User::where(
            'company_id',
            auth()->user()->company_id
        )
        ->role('Member')
        ->get();

        //dd("comming");

        return view(
            'members.index',
            compact('members')
        );
    }

    public function create()
    {
        return view('members.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $invitation = Invitation::create([

            'company_id' =>
                auth()->user()->company_id,

            'email' =>
                $request->email,

            'role' =>
                'Member',

            'token' =>
                Str::uuid(),

            'accepted' =>
                false

        ]);

        Mail::to(
            $invitation->email
        )->send(
            new InvitationMail($invitation)
        );

        return redirect()
            ->route('members.index');
    }
}
