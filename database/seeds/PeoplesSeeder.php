<?php

use Illuminate\Database\Seeder;
use App\People;

class PeoplesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        People::create([
            'name' => 'Tom Rensed',
            'position' => 'Chief Executive Officer',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.
',
            'images' => 'team_pic1.jpg'
        ]);
        People::create([
            'name' => 'Kathren Mory',
            'position' => 'Vice President',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.
',
            'images' => 'team_pic2.jpg'
        ]);
        People::create([
            'name' => 'Lancer Jack',
            'position' => 'Senior Manager',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.
',
            'images' => 'team_pic3.jpg'
        ]);
    }
}
