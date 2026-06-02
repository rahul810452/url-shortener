<h2>Hello</h2>

<p>
You have been invited as
<strong>{{ $invitation->role }}</strong>
</p>

<p>

<a href="{{ url('/invite/'.$invitation->token) }}">
    Accept Invitation
</a>

</p>
