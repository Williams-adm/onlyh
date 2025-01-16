<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
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
    public function index(Request $request) 
    {
        $perPage = $request->get('per_page', 15);
        if (!is_numeric($perPage) || $perPage < 0) {
            return response()->json(['error' => 'El valor de "per_page" debe ser un número mayor que 0.'], 400);
        }

        return $this->repository->getAll($perPage, $request);
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