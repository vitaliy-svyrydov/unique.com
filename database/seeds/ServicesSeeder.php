<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'Android',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..	
',
            'icon' => 'fa-android',
        ]);
        Service::create([
            'name' => 'Apple IOS',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..	
',
            'icon' => 'fa-apple',
        ]);
        Service::create([
            'name' => 'Design',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..	
',
            'icon' => 'fa-dropbox',
        ]);
        Service::create([
            'name' => 'Concept',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..	
',
            'icon' => 'fa-html5',
        ]);
        Service::create([
            'name' => 'User Research',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..	
',
            'icon' => 'fa-slack',
        ]);
        Service::create([
            'name' => 'User Experience',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text..	
',
            'icon' => 'fa-users',
        ]);
    }
}
