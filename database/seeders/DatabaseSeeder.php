<?php

namespace Database\Seeders;

use App\Helpers\Utilities;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Cache::forget( 'ShopFilter' );

        foreach(
            [

                'pending-confirm',
                'pending-payment',
                'preparing',
                'awaiting-pickup',
                'delivery',
                'completed',

            ] as $idx => $type )
        {
            DB::table('order_statuses')->insert( [ 'name' => $type ] );
        }

        foreach(
            [

                'milk',
                'milkshake',
                'kefir',
                'ryazhenka',
                'snezhok',
                'yoghurt',
                'sour_cream',
                'curd',
                'butter',

            ] as $idx => $type )
        {
            DB::table('product_types')->insert( [ 'name' => $type ] );
        }

        foreach(
            [

                'ecolean',
                'tba',
                'tfa',
                'curd-container',
                'tetra-rex',
                'milk-film',
                'glass',

            ] as $idx => $type )
        {
            DB::table('product_packs')->insert( [ 'name' => $type ] );
        }

        foreach(
            [

                'none',
                'sale',
                'new',

            ] as $idx => $type )
        {
            DB::table('product_statuses')->insert( [ 'name' => $type ] );
        }

        foreach(
            [

                'promotions',
                'news-company',
                'about-us',
                'recipes',

            ] as $idx => $type )
        {
            DB::table('article_categories')->insert( [ 'name' => $type ] );
        }

        foreach(
            [

                'new-order',
                'order_change_status',

            ] as $idx => $type )
        {
            DB::table('notification_types')->insert( [ 'name' => $type ] );
        }

        foreach(
            [

                'db' => 'Добрая Буренка',
                'fg' => 'Фруктовый гость',
                'mg' => 'Молочный Гость',
                'mur' => 'Мурлыкино',

            ] as $name => $company_name )
        {
            DB::table('partners')->insert( [

                'name' => $name,
                'company_name' => $company_name,
                'slogan' => 'Слоган',
                'info' => 'Описание',

            ] );
        }

//        for( $i = 0; $i < 50; $i++ )
//        {
//            $item = [
//
//                'title' => "Название #$i",
//                'partner_id' => random_int( 1, 4 ),
//                'product_type_id' => random_int( 1, 9 ),
//                'product_pack_id' => random_int( 1, 7 ),
//                'product_status_id' => random_int( 1, 3 ),
//                'cost' => random_int( 20, 30 ),
//                'group' => random_int( 10, 20 ),
//                'fat' => random_int( 0, 20 ),
//                'weight' => random_int( 10, 90 ) * 10,
//                'temperature' => random_int( 0, 4 ),
//                'life_time' => random_int( 1, 6 ) * 5,
//                'limit' => random_int( 1, 5 ) * 100,
//                'created_at' => Utilities::getRandomTimestamp(),
//                'updated_at' => Utilities::getRandomTimestamp(),
//
//            ];
//
//            if( $item[ 'product_status_id' ] == 2 )
//            {
//                $item[ 'new_cost' ] = random_int( 10, 19 );
//            }
//
//            DB::table('products')->insert( $item );
//        }
//
//        for( $i = 0; $i < 50; $i++ )
//        {
//            DB::table('articles')->insert( [
//
//                'title' => "Название #$i",
//                'article_category_id' => random_int( 1, 4 ),
//                'created_at' => Utilities::getRandomTimestamp(),
//                'updated_at' => Utilities::getRandomTimestamp(),
//
//            ] );
//        }
    }
}













