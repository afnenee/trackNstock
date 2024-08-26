<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordsSeeder extends Seeder
{
    public function run()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            // Check if the password is plain text (i.e., not a hash)
            if (strlen($user->password) < 60) { // Length of bcrypt hashed passwords is typically 60 characters
                DB::table('users')->where('id', $user->id)->update([
                    'password' => Hash::make($user->password), // Hash the plain text password
                ]);
            }
        }
    }
}
