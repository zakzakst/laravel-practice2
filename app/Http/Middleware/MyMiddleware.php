<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Facades\MyService;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // before処理開始
        $id = rand(0, count(MyService::alldata()));
        MyService::setId($id);
        $merge_data = [
            'id' => $id,
            'msg' => MyService::say(),
            'alldata' => MyService::alldata(),
        ];
        $request->merge($merge_data);

        $response = $next($request);

        // after処理開始
        $content = $response->content();
        $content .= '<style>
            body { background-color: #eef; }
            p { font-size: 18px; }
            li { color: red; font-weight: bold; }
        </style>';
        $response->setContent($content);

        return $response;
    }
}
