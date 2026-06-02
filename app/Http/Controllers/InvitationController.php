<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Invitation;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::latest()->get();

        return view(
            'invitations.index',
            compact('invitations')
        );
    }

    public function create()
    {
        $companies = Company::all();

        return view(
            'invitations.create',
            compact('companies')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'email'      => 'required|email'
        ]);

        $token = Str::uuid();

        $invitation = Invitation::create([
            'company_id' => $request->company_id,
            'email'      => $request->email,
            'role'       => 'Admin',
            'token'      => Str::uuid(),
            'accepted'   => false,
        ]);

        Mail::to(
            $invitation->email
        )->send(
            new InvitationMail($invitation)
        );

        return redirect()
            ->route('invitations.index')
            ->with(
                'success',
                'Invitation Created'
            );
    }

    public function accept($token)
    {
        $invitation = Invitation::where(
            'token',
            $token
        )->where(
            'accepted',
            false
        )->firstOrFail();

        return view(
            'invitations.accept',
            compact('invitation')
        );
    }

    public function register(
        Request $request,
        $token
    )
    {
        $invitation = Invitation::where(
            'token',
            $token
        )->firstOrFail();

        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'company_id' => $invitation->company_id,
            'name'       => $request->name,
            'email'      => $invitation->email,
            'password'   => Hash::make(
                $request->password
            )
        ]);

        $user->assignRole(
            $invitation->role
        );

        $invitation->update([
            'accepted' => true
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Account Created Successfully'
            );
    }

    public function inviteAdmin(Company $company)
    {
        return view(
            'invitations.invite-admin',
            compact('company')
        );
    }

}
