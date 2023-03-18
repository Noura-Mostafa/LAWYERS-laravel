<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class court extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $court = DB::table('courts')->delete();
        $court = array(
            array( 'company_id'=>1,'country_id'=>1,'court_name'=>'ALAdel'),
            array( 'company_id'=>2,'country_id'=>2,'court_name'=>'AlNour'),
            array( 'company_id'=>3,'country_id'=>4,'court_name'=>'UKSC'),
            array( 'company_id'=>5,'country_id'=>2,'court_name'=>'Aceris Law'),
        );
        $courts=DB::table('courts')->insert($court);
     
    }
}
