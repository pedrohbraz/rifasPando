<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Route;

class ModoManutencao
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;
    protected $excludedRoutes = ['/bring/the/application/down/now','/bring/the/application/up/now'];

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance() ) {
            $response = $next($request);
            $route = $request->route();

            if ($route instanceof Route) {
                if (in_array($route->getName(), $this->excludedRoutes)) {
                    return $response;
                }
            }
            throw new HttpException(503);
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {

    }
}
