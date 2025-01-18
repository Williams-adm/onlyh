<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Base\PaginationRequest;
use App\Repositories\Api\BaseRepository;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Listado de tipo getAll
     */
    public function index(PaginationRequest $request) 
    {
        $perPage = $request->get('per_page', 15);
        return $this->repository->getAll($perPage);
    }

    /**
     * Crear un nuevo registro
     */
    public function store(Request $request) {
        return $this->repository->create($request);
    }

    /**
     * Listado de tipo getById
     */
    public function show(int $id) {
        return $this->repository->getById($id);
    }

    /**
     * Actualizar un registro
     */
    public function update(Request $request, $id) {
        return $this->repository->update($request, $id);
    }

    /**
     * Eliminar un registro
     */
    public function destroy($id) {
        return $this->repository->delete($id);
    }
}