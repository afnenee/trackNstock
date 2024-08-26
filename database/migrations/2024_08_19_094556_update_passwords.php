<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswords extends Migration
{
    public function up()
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

    public function down()
    {
        // Optionally, you can add logic to revert changes if necessary
    }
}
