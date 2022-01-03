<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mails')->insert([
            'mail' => 'accounts@eirtrans.ie,collections@eirtrans.ie',
            'name' => ''        
        ]);

        DB::table('mails')->insert([
            'mail' => 'customs@eirtrans.ie,collections@eirtrans.ie',
            'name' => 'Eirtrans'        
        ]);
    }
}
