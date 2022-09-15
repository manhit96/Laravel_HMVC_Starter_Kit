<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

abstract class AbstractController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected function response($content = '', $status = 200, array $headers = [])
    {
        return response($content, $status, $headers);
    }

    protected function json($data = [], $status = 200, array $headers = [], $options = 0)
    {
        return response()->json($data, $status, $headers, $options);
    }

    protected function jsonp($callback, $data = [], $status = 200, array $headers = [], $options = 0)
    {
        return response()->jsonp($callback, $data, $status, $headers, $options);
    }

    protected function stream($callback, $status = 200, array $headers = [])
    {
        return response()->stream($callback, $status, $headers);
    }

    protected function streamDownload($callback, $name = null, array $headers = [], $disposition = 'attachment')
    {
        return response()->streamDownload($callback, $name, $headers, $disposition);
    }

    protected function download($file, $name = null, array $headers = [], $disposition = 'attachment')
    {
        return response()->download($file, $name, $headers, $disposition);
    }

    protected function file($file, array $headers = [])
    {
        return response()->file($file, $headers);
    }

    protected function render($view = null, $data = [], $mergeData = [])
    {
        return view($view, $data, $mergeData);
    }

    protected function noContent($status = 204, array $headers = [])
    {
        return response()->noContent($status, $headers);
    }

    protected function redirectTo($to = null, $status = 302, $headers = [], $secure = null)
    {
        return redirect($to, $status, $headers, $secure);
    }

    protected function redirectToRoute($route, $parameters = [], $status = 302, $headers = [])
    {
        return redirect()->route($route, $parameters, $status, $headers);
    }

    protected function redirectGuest($path, $status = 302, $headers = [], $secure = null)
    {
        return redirect()->guest($path, $status, $headers, $secure);
    }

    protected function redirectToIntended($default = '/', $status = 302, $headers = [], $secure = null)
    {
        return redirect()->intended($default, $status, $headers, $secure);
    }

    protected function redirectBack($status = 302, $headers = [], $fallback = false)
    {
        return back($status, $headers, $fallback);
    }

    protected function flash($message = null, $level = 'info')
    {
        return flash($message, $level);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    abstract function index();

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    abstract function create();

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return Renderable
     */
    abstract function store(Request $request);

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     *
     * @return Renderable
     */
    abstract function show($id);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Renderable
     */
    abstract function edit($id);

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return Renderable
     */
    abstract function update(Request $request, $id);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Renderable
     */
    abstract function destroy($id);
}
