<?php 

namespace App\Repositories;

use App\Traits\Api\ResolvesRequests;
use App\Traits\Api\ResolvesResources;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class BaseRepository
{
    use ResolvesResources;
    use ResolvesRequests;

    protected $model;
    protected $filters = [];

    public function __construct(Model $model, array $filters = [])
    {
        $this->model = $model;
        $this->filters = $filters;
    }

    /**
     * Aplicar los filtros al modelo.
     */
    protected function applyFilters()
    {
        return app(Pipeline::class)
            ->send($this->model->query())
            ->through($this->filters)
            ->thenReturn();
    }

    /**
     * Listado de todos los registros
     */
    public function getAll(int $perPage, Request $request)
    {
        $query = $this->applyFilters($request);
        $data = $query->paginate($perPage);
        return $this->resourceCollection($data);
    }

    /**
     * Crear un nuevo registro
     */
    public function create(Request $request){
        $validated = $this->validateStoreRequest($request);
        $data = $this->model->create($validated);

        return $this->resource($data);
    }


    /**
     * Listado de un registro por ID
     */
    public function getById(int $id){
        $data = $this->model->findOrFail($id);
        return $this->resource($data);
    }

    /**
     * Actualizar un registro
     */
    public function update(Request $request, int $id){
        $data = $this->model->findOrFail($id);
        $validated = $this->validateUpdateRequest($request);
        $data->update($validated);
        return $this->resource($data);
    }

    /**
     * Eliminar un registro
     */
    public function delete(int $id){
        $data = $this->model->findOrFail($id);
        $data->delete();
        return response()->json(['message' => "La category {$data->name} ha sido eliminado"], 200);
    }
}