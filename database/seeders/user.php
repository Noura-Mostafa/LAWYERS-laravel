<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = DB::table('users')->delete();
        // $user = array(
        //     array( 'company_id'=>1,'country_id'=>1,'name'=>'Fatema','avatar'=>'mmmm','phone'=>'05938855','email'=>'f@gmail.com','password'=>Hash::make('yyyyy')),
        //     array( 'company_id'=>2,'country_id'=>2,'name'=>'Heba','avatar'=>'mmmm','phone'=>'05933213','email'=>'h@gmail.com','password'=>Hash::make('nnnn')),
        //     array( 'company_id'=>3,'country_id'=>4,'name'=>'Osama','avatar'=>'mmmm','phone'=>'05921554','email'=>'o@gmail.com','password'=>Hash::make('1234')),
        //     array( 'company_id'=>5,'country_id'=>2,'name'=>'Nour','avatar'=>'mmmm','phone'=>'05922545','email'=>'n@gmail.com','password'=>Hash::make('8520')),
        //     array( 'company_id'=>4,'country_id'=>3,'name'=>'Maha','avatar'=>'mmmm','phone'=>'05925875','email'=>'m@gmail.com','password'=>Hash::make('yyy22')),
        //     array( 'company_id'=>2,'country_id'=>4,'name'=>'Samer','avatar'=>'mmmm','phone'=>'05934882','email'=>'l@gmail.com','password'=>Hash::make('y22y22')),
        // );
        // $users=DB::table('users')->insert($user);
   
    }
}
