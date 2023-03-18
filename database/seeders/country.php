<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class country extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('countries')->delete();
        $count = array(
            array( 'company_id'=>1,'code'=>'EGP','Name'=>'Egypt'),
            array( 'company_id'=>2,'code'=>'PAL','Name'=>'Palestine'),
            array( 'company_id'=>3,'code'=>'UK','Name'=>'United Kingdom'),
            array( 'company_id'=>4,'code'=>'USA','Name'=>'United States')
        );
        $countries=DB::table('countries')->insert($count);

    }
}
