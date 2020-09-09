<?php

use Illuminate\Database\Seeder;

class table_NguoiDung extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10;$i++)
        {
        	DB::table('nguoidung')->insert(
	        	[
	        		'name' => 'User_'.$i,
	            	'email' => 'user_'.$i.'@mymail.com',
	            	'password' => bcrypt('123456'),
	            	'created_at' => new DateTime(),
	        	]
        	);
        }
    }
}
