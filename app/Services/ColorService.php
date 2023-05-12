<?php

namespace App\Services;

use App\Interfaces\ColorInterface;
use App\Models\Color;

class ColorService implements ColorInterface
{
    public function create(array $data): Color
    {
        $color = new Color();
        $color->name = $data['name'];
        $color->save();
        return $color;
    }

    public function update($id, array $data): bool
    {
        $color = $this->getById($id);
        return $color->update($data);
    }

       public function getById($id)
    {
        return Color::find($id);
    }

    public function getAll()
    {
        return Color::get();
    }

    public function delete(Color $color): bool
    {
        return $color->delete();
    }
}
