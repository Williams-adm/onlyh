<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\Api\ResolvesRequests;
use App\Traits\Api\ResolvesResources;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    use ResolvesResources;
    use ResolvesRequests;

    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Listado de tipo getAll
     */
    public function index(Request $request) 
    {
        $perPage = $request->get('per_page', 15);
        if (!is_numeric($perPage) || $perPage <= 0) {
            return response()->json(['error' => 'El valor de "per_page" debe ser un número mayor que 0.'], 400);
        }
        $data = $this->model->paginate($perPage);
        return $this->resourceCollection($data);
    }

    /**
     * Crear un nuevo registro
     */
    public function store(Request $request) {
        $validated = $this->validateStoreRequest($request);
        $data = $this->model->create($validated);

        return $this->resource($data);
    }

    /**
     * Listado de tipo getById
     */
    public function show($id) {
        $data = $this->model->findOrFail($id);
        return $this->resource($data);
    }

    /**
     * Actualizar un registro
     */
    public function update(Request $request, $id) {
        $data = $this->model->findOrFail($id);
        $data->update($request->all());
        return $this->resource($data);
    }

    /**
     * Eliminar un registro
     */
    public function destroy($id) {
        $data = $this->model->findOrFail($id);
        $data->delete();
        return response()->json(['message' => "La category {$data->name} ha sido eliminado"], 200);
    }
}