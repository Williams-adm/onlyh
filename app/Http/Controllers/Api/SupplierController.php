<?php

namespace App\Http\Controllers\Api;

use App\Filters\Api\Common\LikeFilter;
use App\Filters\Api\Common\OrderByFilter;
use App\Filters\Api\Common\StatusFilter;
use App\Models\Supplier;
use App\Repositories\Api\BaseRepository;
use Illuminate\Http\Request;

class SupplierController extends BaseController
{
    /**
     * Instancia del repositorio y se pasa el modelo y filtros.
     */
    public function __construct()
    {
        $model = new Supplier();
        $filters = [
            OrderByFilter::class,
            LikeFilter::class,
            StatusFilter::class,
        ];

        $relationships = [
            'phones',
            'addresses',
            'documentTypes'
        ];

        $repository = new BaseRepository($model, $filters, $relationships);

        parent::__construct($repository);
    }
}