<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomSearchApiController extends Controller
{
    /**
     * 検索キーワード入力画面
     * @return View
     */
    public function top()
    {
        //test
        return view('search_form');
    }

    /**
     * 検索処理（GoogleCustomSearchApi）
     * @param Request $request
     * @return View
     */
    public function search(Request $request)
    {
        $url = 'https://www.googleapis.com/customsearch/v1';
        $param = [
            'key' => config('services.custom_search_api.api_key'),
            'cx'  => config('services.custom_search_api.engine_id'),
            'q'   => $request->keyword
        ];

        $response = Http::get($url, $param);
        if($response->failed()) {
            abort(404);
        };

        $result = $response->json();
        return view('search_result', compact('result'));
    }
}
