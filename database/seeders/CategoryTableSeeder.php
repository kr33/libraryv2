<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Africa','slug'=>Str::slug('Africa'),'sindhi_name'=>'آفريڪا','urdu_name'=>'افریقہ','status'=>1],
            ['name'=>'Agriculture','slug'=>Str::slug('Agriculture'),'sindhi_name'=>'زراعت','urdu_name'=>'زراعت','status'=>1],
            ['name'=>'Anarchism','slug'=>Str::slug('Anarchism'),'sindhi_name'=>'انتشار پسندي','urdu_name'=>'انتشار پسندی','status'=>1],
            ['name'=>'Anthropology','slug'=>Str::slug('Anthropology'),'sindhi_name'=>'علم انسان','urdu_name'=>'علم الانسان','status'=>1],
            ['name'=>'Archeology','slug'=>Str::slug('Archeology'),'sindhi_name'=>'آثار قدريات','urdu_name'=>'آثار قدیمہ','status'=>1],
            ['name'=>'Architecture','slug'=>Str::slug('Architecture'),'sindhi_name'=>'اڏاوتي','urdu_name'=>'فن تعمیر','status'=>1],
            ['name'=>'Art','slug'=>Str::slug('Art'),'sindhi_name'=>'آرٽ','urdu_name'=>'آرٹ','status'=>1],
        ];    
        
        foreach($data as $value){
            Category::create($value);
        }    
    }
}
