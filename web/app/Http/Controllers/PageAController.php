<?php

namespace App\Http\Controllers;

use App\Models\Modules\Customer\Models\Link;
use Illuminate\Http\Request;

class PageAController extends Controller
{
    public function show(Request $request, $uuid)
    {
        $link = Link::where('uuid', $uuid)->firstOrFail();

        return view('pages.a-page.index', compact('link'));
    }
}
