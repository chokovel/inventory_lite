<?php

namespace App\Interfaces;

use App\Models\Color;

Interface ColorInterface
{
    public function create(array $data): Color;

    public function update($id, array $data): bool;

    public function getById($id);

    public function getAll();

    public function delete(Color $color): bool;
}
