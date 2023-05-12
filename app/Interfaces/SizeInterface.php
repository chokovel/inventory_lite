<?php

namespace App\Interfaces;

use App\Models\Size;

Interface SizeInterface
{
    public function create(array $data): Size;

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(Size $size): bool;
}
