<?php

namespace Lorem\WebInstaller\Middleware;

use Closure;
use Lorem\WebInstaller\Traits\Installable;

class IsInstallable
{
    use Installable;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->isInstalled()) {
            abort(404, 'You appear to have already installed Draft.');
        }

        return $next($request);
    }
}
