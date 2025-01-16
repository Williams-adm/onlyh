<?php

namespace App\Filters\Api\Common;

use Closure;

/**
 * Filtro segun el estado de los registros.
 */
class StatusFilter
{
    public function handle($query, Closure $next)
    {
        $status = request('status');

        if (in_array($status, [0, 1, '0', '1'], true)) {
            $query->where('status', (int) $status);
        }

        return $next($query);
    }
}