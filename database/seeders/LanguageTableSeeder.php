<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
use Illuminate\Support\Str;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                ['name'=>'English','slug'=>Str::slug('English'),'sindhi_name'=>'انگريزي','urdu_name'=>'انگریزی','status'=>1],
                ['name'=>'Sindhi','slug'=>Str::slug('Sindhi'),'sindhi_name'=>'سنڌي','urdu_name'=>'سندھی','status'=>1],
                ['name'=>'Urdu','slug'=>Str::slug('Urdu'),'sindhi_name'=>'اردو','urdu_name'=>'اردو','status'=>1],
                ['name'=>'Punjabi','slug'=>Str::slug('Punjabi'),'sindhi_name'=>'پنجابي','urdu_name'=>'پنجابی','status'=>1],
                ['name'=>'Baluchi','slug'=>Str::slug('Baluchi'),'sindhi_name'=>'بلوچي','urdu_name'=>'بلوچي','status'=>1],
                ['name'=>'Siraiki','slug'=>Str::slug('Siraiki'),'sindhi_name'=>'سرائيڪي','urdu_name'=>'سرائیکی','status'=>1],
                ['name'=>'Pushto','slug'=>Str::slug('Pushto'),'sindhi_name'=>'پشٽو','urdu_name'=>'پشٹو','status'=>1],
                ['name'=>'Other','slug'=>Str::slug('Other'),'sindhi_name'=>'ٻيا','urdu_name'=>'دیگر','status'=>1],
            ];    
        
        foreach($data as $value){
            Language::create($value);
        }
    }
}
