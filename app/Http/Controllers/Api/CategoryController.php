<?php

namespace App\Http\Controllers\Api;

/* use App\Http\Controllers\Controller; */

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Pasar el modelo al constructor de base controller
     */
    public function __construct()
    {
        parent::__construct(new Category());
    }
}