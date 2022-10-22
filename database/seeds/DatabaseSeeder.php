<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'username' => 'gian', 
            'name' => 'Gianmatteo', 
            'surname' => 'Palmieri',
            'sex' => 'male',
            'address' => 'Via dei Marsi 59',
            'city' => 'San Nicandro Garganico',
            'birthdate' => '2000-03-06',
            'role' => 'user', 
            'private' => true, 
            'friends' => '', 
            'bio' => 'Ciao sono Gianmatteo. Questa è la mia biografia.', 
            'password' => '$2y$10$fNsWl0GTIUolV68.5BSIr.6K1NFw5Nm/0nf8stRwAN8pJKCbIojdC'],

            ['id' => 2, 'username' => 'giulia', 
            'name' => 'Giulia', 
            'surname' => 'Rossi',
            'sex' => 'female',
            'address' => 'Via dei Marsi 59',
            'city' => 'San Nicandro Garganico',
            'birthdate' => '2000-03-06',
            'role' => 'user', 
            'private' => true, 
            'friends' => '', 
            'bio' => 'Ciao sono Giulia. Questa è la mia biografia.', 
            'password' => '$2y$10$fNsWl0GTIUolV68.5BSIr.6K1NFw5Nm/0nf8stRwAN8pJKCbIojdC'],

            ['id' => 3, 'username' => 'mario', 
            'name' => 'Mario', 
            'surname' => 'Rossi',
            'sex' => 'male',
            'address' => 'Via dei Marsi 59',
            'city' => 'San Nicandro Garganico',
            'birthdate' => '2000-03-06',
            'role' => 'user', 
            'private' => true, 
            'friends' => '', 
            'bio' => 'Ciao sono Mario. Questa è la mia biografia.', 
            'password' => '$2y$10$fNsWl0GTIUolV68.5BSIr.6K1NFw5Nm/0nf8stRwAN8pJKCbIojdC'],

            ['id' => 4, 'username' => 'alex', 
            'name' => 'Alex', 
            'surname' => 'Rossi',
            'sex' => 'male',
            'address' => 'Via dei Marsi 59',
            'city' => 'San Nicandro Garganico',
            'birthdate' => '2000-03-06',
            'role' => 'user', 
            'private' => true, 
            'friends' => '', 
            'bio' => 'Ciao sono Alex. Questa è la mia biografia.', 
            'password' => '$2y$10$fNsWl0GTIUolV68.5BSIr.6K1NFw5Nm/0nf8stRwAN8pJKCbIojdC'],

            ['id' => 5, 'username' => 'admin', 
            'name' => 'Alex', 
            'surname' => 'Rossi',
            'sex' => 'male',
            'address' => 'Via dei Marsi 59',
            'city' => 'San Nicandro Garganico',
            'birthdate' => '2000-03-06',
            'role' => 'admin', 
            'private' => true, 
            'friends' => '', 
            'bio' => 'Ciao sono Admin. Questa è la mia biografia.', 
            'password' => '$2y$10$fNsWl0GTIUolV68.5BSIr.6K1NFw5Nm/0nf8stRwAN8pJKCbIojdC'],

            ['id' => 6, 'username' => 'staff', 
            'name' => 'Alex', 
            'surname' => 'Rossi',
            'sex' => 'male',
            'address' => 'Via dei Marsi 59',
            'city' => 'San Nicandro Garganico',
            'birthdate' => '2000-03-06',
            'role' => 'staff', 
            'private' => true, 
            'friends' => '', 
            'bio' => 'Ciao sono Admin. Questa è la mia biografia.', 
            'password' => '$2y$10$fNsWl0GTIUolV68.5BSIr.6K1NFw5Nm/0nf8stRwAN8pJKCbIojdC'],
        ]);

        DB::table('blogs')->insert([
            ['id' => 1, 'blogname' => 'tennis', 
            'name' => 'Blog di Tennis',
            'topic' => 'In questo blog si parla di tennis',
            'owner' => 'gian'],

            ['id' => 2, 'blogname' => 'politica', 
            'name' => 'Blog di politica',
            'topic' => 'In questo blog si parla di politica',
            'owner' => 'gian'],

            ['id' => 3, 'blogname' => 'moda', 
            'name' => 'Blog di moda',
            'topic' => 'In questo blog si parla di moda',
            'owner' => 'giulia'],
        ]);

        DB::table('posts')->insert([
            ['id' => 1, 'author' => 'gian', 
            'blog' => 'tennis', 
            'text' => 'Ciao a tutti! Questo è il mio primo post sul mio nuovo blog che parla di tennis'],

            ['id' => 2, 'author' => 'gian', 
            'blog' => 'politica', 
            'text' => 'Ciao a tutti! Questo è il mio primo post sul mio nuovo blog che parla di politica'],

            ['id' => 3, 'author' => 'giulia', 
            'blog' => 'moda', 
            'text' => 'Ciao a tutti! Questo è il mio primo post sul mio nuovo blog che parla di moda'],
        ]);
        
        DB::table('friend_requests')->insert([
            ['id' => 1,
            'from' => 'giulia', 
            'to' => 'gian'],

            ['id' => 2,
            'from' => 'mario', 
            'to' => 'gian'],

            ['id' => 3,
            'from' => 'alex', 
            'to' => 'gian'],
        ]);

        DB::table('messages')->insert([
            ['id' => 1,
            'from' => 'admin', 
            'to' => 'gian',
            'text' => 'Messaggio di prova'],

            ['id' => 2,
            'from' => 'admin', 
            'to' => 'giulia',
            'text' => 'Messaggio di prova'],

            ['id' => 3,
            'from' => 'admin', 
            'to' => 'gian',
            'text' => 'Messaggio di prova 2'],

            ['id' => 4,
            'from' => 'admin', 
            'to' => 'gian',
            'text' => 'Messaggio di prova 3'],
        ]); 
    }
}
