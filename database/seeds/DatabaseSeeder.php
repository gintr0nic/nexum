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
            'private' => false, 
            'friends' => '', 
            'bio' => 'Ciao sono Gianmatteo. Questa è la mia biografia.', 
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

            ['id' => 3, 'blogname' => 'calcio', 
            'name' => 'Blog di Calcio',
            'topic' => 'In questo blog si parla di calcio',
            'owner' => 'gian'],
        ]);

        DB::table('posts')->insert([
            ['id' => 1, 'author' => 'gian', 
            'blog' => 'tennis', 
            'text' => 'Ciao a tutti! Questo è il mio primo post sul mio nuovo blog che parla di tennis'],

            ['id' => 2, 'author' => 'gian', 
            'blog' => 'politica', 
            'text' => 'Ciao a tutti! Questo è il mio primo post sul mio nuovo blog che parla di politica'],
        ]);        
    }
}
