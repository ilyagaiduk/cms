<?php


namespace App\Http\Middleware;

use Illuminate\Http\RedirectResponse;
use Closure;
use App\Config;


class Redirect
{
    public function handle($request, Closure $next)
    {
        $model = new Config();
        $data = $model->forRedirect();
        if ($data['www'] == 1) {
            $request->headers->set('host', 'www.' . $data['domain']);
        } else {
            $request->headers->set('host', $data['domain']);

        }
        if (!$request->secure()) {
            return redirect()->secure($request->path());
        }
        else{
            return $next($request);
        }
    }
}
