<?php 

namespace App\Repositories\Api;

use App\Repositories\Api\Contracts\RepositoryInterface;
use App\Traits\Api\ResolvesRequests;
use App\Traits\Api\ResolvesResources;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class BaseRepository implements RepositoryInterface
{
    use ResolvesResources;
    use ResolvesRequests;

    protected $model;
    protected $filters = [];
    protected $relationships = [];

    public function __construct(Model $model, array $filters = [], array $relationships = [])
    {
        $this->model = $model;
        $this->filters = $filters;
        $this->relationships = $relationships;
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
    public function getAll(int $perPage)
    {

        $query = $this->applyFilters();

        if (!empty($this->relationships)) {
            $query = $query->with($this->relationships);
        }

        $data = $query->paginate($perPage);
        return $this->resourceCollection($data);
    }

    /**
     * Crear un nuevo registro
     */
    public function create(Request $request){
        $validated = $this->validateStoreRequest($request);
        $data = $this->model->create($validated);
        $data->refresh();
        return $this->resource($data);
    }


    /**
     * Listado de un registro por ID
     */
    public function getById(int $id){
        $data = $this->model->findOrFail($id);

        if(!empty($this->relationships)){
            $data->load($this->relationships);
        }
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