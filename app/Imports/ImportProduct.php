<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProduct implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row;
        return new Product([
            'code' => $row['codigo'],
            'name' => $row['nombre'],
            'price' => $row['precio'],
            'stock' => $row['stock'],
            'min_sale' => $row['venta_minima'],
            'description' => $row['descripcion'],
            'long_description' => $row['descripcion_larga'],
            'category_id' => $row['categoria'],
            'brand_id' => $row['marca'],
            'packaging_id' => $row['tipo_de_paquete']
        ]);
    }
}
