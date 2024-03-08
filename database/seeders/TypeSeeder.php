<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Generando los tipos de preguntas (no van a cambiar)
     */
    public function run(): void
    {
        $data = [
            array('name' => 'Multiple Choice'),
            array('name' => 'Single Choice'),
        ];
        Type::insert($data);
    }
}
