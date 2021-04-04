<?php

use App\Packaging;
use Illuminate\Database\Seeder;

class PackagingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packaging::create(['name'=>'Unidad']);
        Packaging::create(['name'=>'Caja']);
        Packaging::create(['name'=>'Paquete']);
    }
}
