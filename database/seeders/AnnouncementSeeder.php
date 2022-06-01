<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Announcement_;

class AnnouncementSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {  
        $announcement1 = Announcement_::create([
            'id' => '1',
            'announcement' => 'Selamat Datang Kepada Semua Team !',    
        ]);
        $announcement1->save();
    }
}
