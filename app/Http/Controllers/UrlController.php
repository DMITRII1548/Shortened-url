<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function create(): View
    {
        return view('url.create');
    }

    public function redirect(string $id): RedirectResponse
    {
        $id = hexdec($id);

        $url = Url::select('url_to')
            ->where('id', '=', $id)
            ->first()
            ->url_to;

        return redirect($url);
    }
}
