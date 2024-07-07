<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    protected $signature = 'hash:passwords';

    protected $description = 'Hash existing passwords with Bcrypt';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Şifrenin zaten hashlenip hashlenmediğini kontrol edebiliriz
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
                $user->save();
                $this->info('Password hashed for user: ' . $user->email);
            } else {
                $this->info('Password already hashed for user: ' . $user->email);
            }
        }

        $this->info('All passwords have been processed.');
    }
}
