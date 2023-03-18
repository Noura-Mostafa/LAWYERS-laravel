<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class contact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cont = DB::table('contacts')->delete();
        $cont = array(
            array( 'company_id'=>1,'country_id'=>1,'status'=>0,'name'=>'Fatema','email'=>'f@gmail.com','phone'=>'yy','files'=>'yyyyy'),
            array( 'company_id'=>1,'country_id'=>2,'status'=>1,'name'=>'Heba','email'=>'h@gmail.com','phone'=>'yy','files'=>'yyyyy'),
            array( 'company_id'=>4,'country_id'=>2,'status'=>0,'name'=>'Maha','email'=>'m@gmail.com','phone'=>'yy','files'=>'yyyyy'),
            array( 'company_id'=>3,'country_id'=>3,'status'=>1,'name'=>'Noura','email'=>'n@gmail.com','phone'=>'yy','files'=>'yyyyy'),

        );
        $contacts=DB::table('contacts')->insert($cont);
    
    }
}
