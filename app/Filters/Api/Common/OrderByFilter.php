<?php

namespace App\Filters\Api\Common;

use Closure;

/**
 * Filtro para ordenar los registros.
 */
class OrderByFilter
{
    public function handle($query, Closure $next)
    {
        $column = request('order_by.column');
        $direction = request('order_by.direction', 'asc');

        if ($column) {
            $query->orderBy($column, strtolower($direction) === 'desc' ? 'desc' : 'asc');
        }

        /* si existe un error al psar una columna invalida debemos mostrar algun error para no romper la app */
        /* aqui puede sher, del direction pero si pasamos un direction invalido enviar algun error */
        return $next($query);
    }
}