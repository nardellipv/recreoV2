<?php

use App\Buttons;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buttons')->delete();

        $buttons = [
            ['id' => 2, 'name_button' => 'Registro Colegio', 'status_button' => '1', 'first_note_max' => '0', 'second_note_max' => '0'],
            ['id' => 3, 'name_button' => 'Registro Profesor', 'status_button' => '1', 'first_note_max' => '0', 'second_note_max' => '0'],
            ['id' => 4, 'name_button' => 'Registro Estudiante', 'status_button' => '1', 'first_note_max' => '0', 'second_note_max' => '0'],
            ['id' => 5, 'name_button' => 'Notas', 'status_button' => '1', 'first_note_max' => '50', 'second_note_max' => '50'],
        ];

        foreach ($buttons as $button) {
            Buttons::create($button);
        }
    }
}
