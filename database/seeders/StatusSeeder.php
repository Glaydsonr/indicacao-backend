<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Permission Types
         */
        $Permissionitems = [
            [
                'description' => 'INICIADA',
                'is_default' => true,
                'next' => 2,
            ],
            [
                'description' => 'EM PROGRESSO',
                'is_default' => false,
                'next' => 3,
            ],
            [
                'description' => 'FINALIZADA',
                'is_default' => false,
                'next' => null,
            ],
        ];

        /**
         * Add Permission Items
         */
        foreach ($Permissionitems as $Permissionitem) {
            Status::create($Permissionitem);
        }
    }
}
