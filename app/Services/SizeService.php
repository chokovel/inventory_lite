<?php

namespace App\Services;

use App\Interfaces\SizeInterface;
use App\Models\Size;

class SizeService implements SizeInterface
{
    // public function create($data)
    // {
    //     // $data = [
    //     //     'name' => "My Size"
    //     // ];
    //     return Size::created($data);
    // }

    public function create(array $data): Size
    {
        $size = new Size();
        $size->name = $data['name'];
        $size->save();
        return $size;
    }

    public function update($id, array $data): bool
    {
        $size = $this->getById($id);
        return $size->update($data);
    }

     public function getById($id)
    {
        return Size::find($id);
    }

    public function getAll()
    {
        return Size::get();
    }

    public function delete(Size $size): bool
    {
        return $size->delete();
    }

}
