<?php

namespace App\Filters\Api\Common;

use Closure;

/**
 * Filtro para realizar búsquedas por columnas.
 */
class LikeFilter
{
    public function handle($query, Closure $next)
    {
        $column = request('like.column');
        $value = request('like.value');

        if ($column && $value) {
            $query->where($column, 'like', "%$value%");
        }

        return $next($query);
    }
}