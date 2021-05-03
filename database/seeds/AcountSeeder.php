<?php

use Illuminate\Database\Seeder;
use App\User;

class AcountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew([
            'name' => "Juan Dela Cruz", 
            'email' => "admin@gmail.com", 
           
        ]);

        $user->password = bcrypt("admin");
        $user->save();
    }
}
