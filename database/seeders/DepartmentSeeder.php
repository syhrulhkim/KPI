<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {  
        $department1 = Department::create([
            'id' => '1',
            'name' => 'CEO Office',    
        ]);
        $department1->save();

        $department2 = Department::create([
            'id' => '2',
            'name' => 'Human Resource (HR) & Administration', 
        ]);
        $department2->save();

        $department3 = Department::create([
            'id' => '3',
            'name' => 'Account & Finance (A&F)',
        ]);
        $department3->save();

        $department4 = Department::create([
            'id' => '4',
            'name' => 'Sales',
        ]);
        $department4->save();

        $department5 = Department::create([
            'id' => '5',
            'name' => 'Marketing',
        ]);
        $department5->save();

        $department6 = Department::create([
            'id' => '6',
            'name' => 'Operation',
        ]);
        $department6->save();

        $department7 = Department::create([
            'id' => '7',
            'name' => 'High Network Client (HNC)',
        ]);
        $department7->save();

        $department8 = Department::create([
            'id' => '8',
            'name' => 'Research & Development (R&D)',
        ]);
        $department8->save();
    }
}
