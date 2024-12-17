<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class APIController extends Controller
{
    /**
     * Send a successfull response to the client
     * (HTTP 200)
     *
     * @param  array|string|View|null  $content
     * @param  array  $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function success($content, $headers)
    {
        return response($content, 200, $headers);
    }

    /**
     * Send a response when the request is not valid
     * (HTTP 400)
     *
     * @param  array|string|View|null  $content
     * @param  array  $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function invalidRequest($content, $headers)
    {
        return response($content, 400, $headers);
    }

    /**
     * Send a response when a resource doesn't exist to the client
     * (HTTP 404)
     *
     * @param  array|string|View|null  $content
     * @param  array  $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function notFound($content, $headers)
    {
        return response($content, 404, $headers);
    }

    /**
     * Send a response when the server encountered an error
     * (HTTP 500)
     *
     * @param  array|string|View|null  $content
     * @param  array  $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function serverError($content, $headers)
    {
        return response($content, 500, $headers);
    }
}
