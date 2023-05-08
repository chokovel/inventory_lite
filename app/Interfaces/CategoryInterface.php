<?php

namespace App\Interfaces;

interface CategoryInterface
{
    public function create($data);

    public function update($data, $id);

    public function getById($id);

    public function getAll();
}
