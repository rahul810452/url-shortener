<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = ShortUrl::where(
            'company_id',
            auth()->user()->company_id
        )->latest()->get();

        return view(
            'short-urls.index',
            compact('urls')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('short-urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $code = Str::random(10);

        ShortUrl::create([

            'company_id' =>
                auth()->user()->company_id,

            'user_id' =>
                auth()->id(),

            'original_url' =>
                $request->original_url,

            'short_code' =>
                $code,

            'clicks' =>
                0
        ]);

        return redirect()
            ->route('short-urls.index');
    }

    public function redirect($code)
    {
        $url = ShortUrl::where(
            'short_code',
            $code
        )->firstOrFail();

        $url->increment('clicks');

        return redirect(
            $url->original_url
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
