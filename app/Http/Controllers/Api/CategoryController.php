<?php

namespace App\Http\Controllers\Api;

/* use App\Http\Controllers\Controller; */

use App\Filters\Api\Common\LikeFilter;
use App\Filters\Api\Common\OrderByFilter;
use App\Filters\Api\Common\StatusFilter;
use App\Models\Category;
use App\Repositories\Api\BaseRepository;

class CategoryController extends BaseController
{
    /**
     * Instancia del repositorio y se pasa el modelo y filtros.
     */
    public function __construct()
    {
        $model = new Category();
        $filters = [
            OrderByFilter::class,
            LikeFilter::class,
            StatusFilter::class,
        ];

        $repository = new BaseRepository($model, $filters);

        parent::__construct($repository);
    }
}