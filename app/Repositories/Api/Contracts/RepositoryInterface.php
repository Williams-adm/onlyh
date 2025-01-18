<?php

namespace App\Repositories\Api\Contracts;

use Illuminate\Http\Request;

interface RepositoryInterface 
{
    public function getAll(int $perPage);
    public function create(Request $request);
    public function getById(int $id);
    public function update(Request $request, int $id);
    public function delete(int $id);
}