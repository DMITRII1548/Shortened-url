<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Url\StoreRequest;
use App\Http\Resources\Url\UrlMinifiedResource;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function store(StoreRequest $request): array
    {
        $url = Url::firstOrCreate($request->validated());

        return UrlMinifiedResource::make($url)->resolve();
    }
}
