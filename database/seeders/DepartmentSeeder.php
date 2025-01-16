<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Department;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department')->insert([
            ['departmentname'=>'Construction plc', 'departmentdesc'=>'An organization that produces construction materials'],
            [ 'departmentname'=>'Pharmacy', 'departmentdesc'=>'An organization that sells mediciens'],
            [ 'departmentname'=>'School Sector', 'departmentdesc'=>'An organiation that has education materials'],
          
        ]);
    }
}
