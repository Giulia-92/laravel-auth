<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorieslist = ['Antipasti', 'Primi piatti','Secondi piatti','Contorni','Dolci'];
        forEach($categorieslist as $category){
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::of ($newCategory->name)->slug('-');
            $newCategory->save();
        }
    }
}
