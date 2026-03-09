<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSuper
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('admin_role') !== 'utama') {
            return redirect('/admin/obat');
        }

        return $next($request);
    }
}
