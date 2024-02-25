<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Str;

class ShortLinkController extends Controller
{
    public function index() {

        $shortLinks = ShortLink::all();
        return view('dashboard',compact('shortLinks'));

    }

    public function store(Request $request ) {
        $request->validate([
            'link' =>'required|url'
        ]);
        $input['link'] = $request->link;
        $input['code'] = Str::random(6);
        ShortLink::create($input);
        return redirect('dashboard')->withSuccess('Shorten link generated successfully');

    }

    public function shortLink($code) {
        $find = ShortLink::where('code',$code)->first();
        return redirect($find->link);

    }
}
