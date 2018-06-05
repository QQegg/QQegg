<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Store;
use App\Category;
use App\Coupon;
use App\User;
use App\Product;
class DATA extends Controller
{

    public function create()
    {
        Admin::create([
            'account' => "sh980932",
            'email'=>'mimi@gmail.com',
            'password'=>Hash::make('123456')
            ]);
        Store::create([
                'email' =>'mimi@gmail.com',
                'name' => 'EatFoodFood 小吃貨 - 美食、伴手禮',
                'contact' => '陳地瓜妤',
                'phone' => '0988045436',
                'address' => '台中市',
                'password'=>Hash::make('123456'),
                'title'=>'test1',
            ]);
        Store::create([
                'email' =>'gigi@gmail.com',
                'name' => '富山韓國服飾',
                'contact' => '王志揚',
                'phone' => '0785155622',
                'address' => '台中市',
                'password'=>Hash::make('123456'),
                'title'=>'test2',
            ]);
        Store::create([
            'email' =>'riri@gmail.com',
            'name' => '青年戶外休閒用品專賣店',
            'contact' => '許漢昌',
            'phone' => '0785155622',
            'address' => '台中市',
            'password'=>Hash::make('123456'),
            'title'=>'test2',
        ]);
        User::create([
        'name' => '李玉娟',
        'account' => 'sh980932',
        'email' =>'mimi@gmail.com',
        'password'=>Hash::make('123456'),
        'point' => '500',
        'birthday' => '19970730',
        'phone' => '0988045436',

    ]);
        User::create([
            'name' => '王建志',
            'account' => 'sh980933',
            'email' =>'gigi@gmail.com',
            'password'=>Hash::make('123456'),
            'point' => '1000',
            'birthday' => '19970730',
            'phone' => '0988045436',

        ]);
        User::create([
            'name' => '陳小妤',
            'account' => 'sh980934',
            'email' =>'riri@gmail.com',
            'password'=>Hash::make('123456'),
            'point' => '500',
            'birthday' => '19970730',
            'phone' => '0988045436',

        ]);
        Category::create([
           'store_id'=>'1',
           'name'=>'日本零食'
        ]);
        Category::create([
            'store_id'=>'1',
            'name'=>'傳統美食'
        ]);
        Category::create([
            'store_id'=>'1',
            'name'=>'沖泡飲品'
        ]);
        Category::create([
            'store_id'=>'2',
            'name'=>'長褲'
        ]);
        Category::create([
            'store_id'=>'2',
            'name'=>'上衣'
        ]);
        Category::create([
            'store_id'=>'2',
            'name'=>'裙子'
        ]);
        Category::create([
        'store_id'=>'2',
        'name'=>'短褲'
        ]);
        Category::create([
            'store_id'=>'3',
            'name'=>'摺疊傘'
        ]);
        Category::create([
            'store_id'=>'3',
            'name'=>'旅行收納'
        ]);
        Category::create([
            'store_id'=>'3',
            'name'=>'瑜珈器材'
        ]);
        Category::create([
            'store_id'=>'3',
            'name'=>'運動毛巾'
        ]);
        Category::create([
            'store_id'=>'3',
            'name'=>'露營'
        ]);
        Coupon::create([
            'Store_id'=>'1',
            'title'=>'會員好康$600折價券',
            'start'=>'20180706',
            'end'=>'20190808',
            'discount'=>'600',
            'lowestprice'=>'1800',
            'picture'=>'eatfoodfood600.jpg',
            'status'=>'0',
        ]);
        Coupon::create([
            'Store_id'=>'1',
            'title'=>'會員好康$200折價券',
            'start'=>'20180706',
            'end'=>'20190808',
            'discount'=>'200',
            'lowestprice'=>'600',
            'picture'=>'eatfoodfood600.jpg',
            'status'=>'0',
        ]);

        Coupon::create([
            'Store_id'=>'2',
            'title'=>'會員專屬$350折價券',
            'start'=>'20180706',
            'end'=>'20190808',
            'discount'=>'350',
            'lowestprice'=>'1500',
            'picture'=>'富山350.jpg',
            'status'=>'0',
        ]);

        Coupon::create([
            'Store_id'=>'3',
            'title'=>'會員好康100折價券',
            'start'=>'20180706',
            'end'=>'20190808',
            'discount'=>'100',
            'lowestprice'=>'1000',
            'picture'=>'青年100.jpg',
            'status'=>'0',
        ]);



        Product::create([
            'Category_id'=>'1',
            'store_id'=>'1',
            'name'=>'梅片',
            'specification'=>'大',
            'price'=>'100',
            'picture'=>'梅乾片.JPG',
        ]);
        Product::create([
            'Category_id'=>'2',
            'store_id'=>'1',
            'name'=>'寒天蒟蒻條 300G',
            'specification'=>'胡椒',
            'price'=>'180',
            'picture'=>'蒟蒻條.JPG',
        ]);
        Product::create([
            'Category_id'=>'3',
            'store_id'=>'1',
            'name'=>'發泡錠',
            'specification'=>'檸檬',
            'price'=>'69',
            'picture'=>'發泡錠.JPG',
        ]);
        Product::create([
            'Category_id'=>'2',
            'store_id'=>'1',
            'name'=>'義美小泡芙',
            'specification'=>'草莓',
            'price'=>'30',
            'picture'=>'泡芙.JPG',
        ]);
        Product::create([
            'Category_id'=>'4',
            'store_id'=>'2',
            'name'=>'百搭緊身黑褲',
            'specification'=>'S',
            'price'=>'158',
            'picture'=>'緊身褲.JPG',
        ]);
        Product::create([
            'Category_id'=>'4',
            'store_id'=>'2',
            'name'=>'百搭鉛筆褲',
            'specification'=>'S',
            'price'=>'290',
            'picture'=>'鉛筆褲.JPG',
        ]);
        Product::create([
            'Category_id'=>'5',
            'store_id'=>'2',
            'name'=>'童趣塗鴉短袖上衣',
            'specification'=>'S',
            'price'=>'390',
            'picture'=>'上衣.JPG',
        ]);
        Product::create([
            'Category_id'=>'5',
            'store_id'=>'2',
            'name'=>'棒球T恤',
            'specification'=>'S',
            'price'=>'290',
            'picture'=>'T恤.JPG',
        ]);


        Product::create([
            'Category_id'=>'6',
            'store_id'=>'2',
            'name'=>'牛仔短裙',
            'specification'=>'XL',
            'price'=>'299',
            'picture'=>'短裙.JPG',
        ]);
        Product::create([
            'Category_id'=>'7',
            'store_id'=>'2',
            'name'=>'運動短褲',
            'specification'=>'S',
            'price'=>'150',
            'picture'=>'短褲.JPG',
        ]);
        Product::create([
            'Category_id'=>'8',
            'store_id'=>'3',
            'name'=>'大傘面摺疊自動傘',
            'specification'=>'黑',
            'price'=>'230',
            'picture'=>'自動傘.JPG',
        ]);
        Product::create([
            'Category_id'=>'9',
            'store_id'=>'3',
            'name'=>'旅行整理收納包六件套',
            'specification'=>'黑',
            'price'=>'199',
            'picture'=>'旅行包.JPG',
        ]);
        Product::create([
            'Category_id'=>'10',
            'store_id'=>'3',
            'name'=>'多功能止滑瑜珈墊',
            'specification'=>'一般',
            'price'=>'299',
            'picture'=>'瑜珈墊.JPG',
        ]);
        Product::create([
            'Category_id'=>'11',
            'store_id'=>'3',
            'name'=>'NIKE 頭帶',
            'specification'=>'黑',
            'price'=>'150',
            'picture'=>'頭帶.JPG',
        ]);
        Product::create([
            'Category_id'=>'12',
            'store_id'=>'3',
            'name'=>'露營遮陽帳篷',
            'specification'=>'黑',
            'price'=>'400',
            'picture'=>'帳篷.JPG',
        ]);
        Product::create([
            'Category_id'=>'9',
            'store_id'=>'3',
            'name'=>'磨砂防水收納袋',
            'specification'=>'大',
            'price'=>'35',
            'picture'=>'收納袋.JPG',
        ]);
    }
}
