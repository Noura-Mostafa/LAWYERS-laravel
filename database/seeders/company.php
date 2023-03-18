<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class company extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $copm = DB::table('companies')->delete();
        $copm = array(
            array( 'owner-id'=>2,'company-name'=>'CompanyA','company-phone'=>'2561783','company-address'=>'Gaza','image'=>'xx'),
            array( 'owner-id'=>3,'company-name'=>'CompanyB','company-phone'=>'2561783','company-address'=>'Gaza','image'=>'xx'),
            array( 'owner-id'=>4,'company-name'=>'CompanyC','company-phone'=>'2561783','company-address'=>'Gaza','image'=>'xx'),
            array( 'owner-id'=>5,'company-name'=>'CompanyD','company-phone'=>'2561783','company-address'=>'Gaza','image'=>'xx'),
            array( 'owner-id'=>6,'company-name'=>'CompanyE','company-phone'=>'2561783','company-address'=>'Gaza','image'=>'xx')
        );
        $companies=DB::table('companies')->insert($copm);   
    }
}
