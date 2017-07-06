<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedDevelopLogin();
        $this->seedOsocLogins();
    }

    /**
     * Add one account for developpers
     */
    private function seedDevelopLogin()
    {
    	$this->createUser('develop', 'develop@bird.today', 'bird');
    }

	/**
     * Add all oSoc17 accounts
     */
    private function seedOsocLogins()
    {
    	// If there was a spacebar in the first name it was removed. Special characters such as 'ë','ç' and dashes '-' are used.
		$firstnames = ['dylan','demian','bert','diëgo','cynthia','krishnakumar','tim','françois','redouane','eveline','pierre-alexandre','niels','eva','pol','dieter','damian','moustapha','arnaud','theo','alexandra','ismail','maxime','remco','sheila','astrid','brysen','elias','pieter-jan','jasper','robrecht','israelketema','bruno','michiel','thor','jean-pacifique','simon','ruben','thibault','arne','frederik','ben','pieter','johan','xavier','miet','jonathan','julian','dries'];
		
		// Create one user account per person
		foreach ($firstnames as $firstname) {
			$this->createUser($firstname, $firstname.'@bird.today', 'code9000');
		}
	}

	/**
	 * Create User with name, email and password
	 */
	private function createUser($name, $email, $password)
	{
		$account = [
    		'name' => $name,
    		'email' => $email, 
    		'password' => bcrypt($password)
    	];
	 	User::create($account);
	}
}
