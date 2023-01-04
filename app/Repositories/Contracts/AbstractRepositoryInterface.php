<?php

namespace App\Repositories\Contracts;

interface AbstractRepositoryInterface
{

    // public function fill();
    public function getAll();

    // public function get(int $id);

    public function getById(int $id);

    public function create(array $attributes);

    public function update(array $attributes, int $id);

    public function destroy(object $obj);
}
