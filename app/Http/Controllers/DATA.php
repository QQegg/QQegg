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
use App\Post;
use App\Push;
use App\Comment;
use App\StoreComment;
class DATA extends Controller
{

    public function create()
    {
        Admin::create([
            'account' => "sh980932",
            'email'=>'admin@gmail.com',
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
                'picture'=>'EatFoodFood.png',

            ]);
        Store::create([
                'email' =>'gigi@gmail.com',
                'name' => '富山韓國服飾',
                'contact' => '王志揚',
                'phone' => '0785155622',
                'address' => '台中市',
                'password'=>Hash::make('123456'),
                'title'=>'test2',
                'picture'=>'富山韓國服飾.png',
            ]);
        Store::create([
            'email' =>'riri@gmail.com',
            'name' => '青年戶外休閒用品專賣店',
            'contact' => '許漢昌',
            'phone' => '0785155622',
            'address' => '台中市',
            'password'=>Hash::make('123456'),
            'title'=>'test2',
            'picture'=>'青年戶外休閒用品專賣店.png',
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
            'id'=>'57891986',
            'Category_id'=>'1',
            'store_id'=>'1',
            'name'=>'梅片',
            'specification'=>'大',
            'price'=>'100',
            'picture'=>'梅乾片.JPG',
        ]);
        Product::create([
            'id'=>'45551129',
            'Category_id'=>'2',
            'store_id'=>'1',
            'name'=>'寒天蒟蒻條 300G',
            'specification'=>'胡椒',
            'price'=>'180',
            'picture'=>'蒟蒻條.JPG',
        ]);
        Product::create([
            'id'=>'63645424',
            'Category_id'=>'3',
            'store_id'=>'1',
            'name'=>'發泡錠',
            'specification'=>'檸檬',
            'price'=>'69',
            'picture'=>'發泡錠.JPG',
        ]);
        Product::create([
            'id'=>'74564685',
            'Category_id'=>'2',
            'store_id'=>'1',
            'name'=>'義美小泡芙',
            'specification'=>'草莓',
            'price'=>'30',
            'picture'=>'泡芙.JPG',
        ]);
        Product::create([
            'id'=>'76876877',
            'Category_id'=>'4',
            'store_id'=>'2',
            'name'=>'百搭緊身黑褲',
            'specification'=>'S',
            'price'=>'158',
            'picture'=>'緊身褲.JPG',
        ]);
        Product::create([
            'id'=>'45621654',
            'Category_id'=>'4',
            'store_id'=>'2',
            'name'=>'百搭鉛筆褲',
            'specification'=>'S',
            'price'=>'290',
            'picture'=>'鉛筆褲.JPG',
        ]);
        Product::create([
            'id'=>'45687985',
            'Category_id'=>'5',
            'store_id'=>'2',
            'name'=>'童趣塗鴉短袖上衣',
            'specification'=>'S',
            'price'=>'390',
            'picture'=>'上衣.JPG',
        ]);
        Product::create([
            'id'=>'44287654',
            'Category_id'=>'5',
            'store_id'=>'2',
            'name'=>'棒球T恤',
            'specification'=>'S',
            'price'=>'290',
            'picture'=>'T恤.JPG',
        ]);


        Product::create([
            'id'=>'41254944',
            'Category_id'=>'6',
            'store_id'=>'2',
            'name'=>'牛仔短裙',
            'specification'=>'XL',
            'price'=>'299',
            'picture'=>'短裙.JPG',
        ]);
        Product::create([
            'id'=>'45546488',
            'Category_id'=>'7',
            'store_id'=>'2',
            'name'=>'運動短褲',
            'specification'=>'S',
            'price'=>'150',
            'picture'=>'短褲.JPG',
        ]);
        Product::create([
            'id'=>'25353446',
            'Category_id'=>'8',
            'store_id'=>'3',
            'name'=>'大傘面摺疊自動傘',
            'specification'=>'黑',
            'price'=>'230',
            'picture'=>'自動傘.JPG',
        ]);
        Product::create([
            'id'=>'54656512',
            'Category_id'=>'9',
            'store_id'=>'3',
            'name'=>'旅行整理收納包六件套',
            'specification'=>'黑',
            'price'=>'199',
            'picture'=>'旅行包.JPG',
        ]);
        Product::create([
            'id'=>'45241264',
            'Category_id'=>'10',
            'store_id'=>'3',
            'name'=>'多功能止滑瑜珈墊',
            'specification'=>'一般',
            'price'=>'299',
            'picture'=>'瑜珈墊.JPG',
        ]);
        Product::create([
            'id'=>'56431461',
            'Category_id'=>'11',
            'store_id'=>'3',
            'name'=>'NIKE 頭帶',
            'specification'=>'黑',
            'price'=>'150',
            'picture'=>'頭帶.JPG',
        ]);
        Product::create([
            'id'=>'45655444',
            'Category_id'=>'12',
            'store_id'=>'3',
            'name'=>'露營遮陽帳篷',
            'specification'=>'黑',
            'price'=>'400',
            'picture'=>'帳篷.JPG',
        ]);
        Product::create([
            'id'=>'45645628',
            'Category_id'=>'9',
            'store_id'=>'3',
            'name'=>'磨砂防水收納袋',
            'specification'=>'大',
            'price'=>'35',
            'picture'=>'收納袋.JPG',
        ]);
        Post::create([
            'Admin_id'=>'1',
            'title'=>'系統維修公告',
            'content'=>'親愛的店家戶您好﹕為提昇網路服務品質，本系統將於107年06月17日 上午04:00 ~ 10:00 進行系統維護，敬請見諒。    祝您 身體健康 萬事如意  雙魚商圈 敬上'
        ]);

        Post::create([
            'Admin_id'=>'1',
            'title'=>'2018年雙魚商圈優良店家',
            'content'=>'2018年雙魚商圈優良店家票選活動開跑拉~
即日起至06月15日開始進行優良店家票選活動
'
        ]);
       Comment::create([
            'Member_id'=>'1',
            'Store_id'=>'1',
            'content'=>'店家販售種類蠻多的，價格也很親民',
            'rate'=>'5',

        ]);
        Comment::create([
            'Member_id'=>'2',
            'Store_id'=>'1',
            'content'=>'店員看起來臉有點臭',
            'rate'=>'3',

        ]);
        Comment::create([
            'Member_id'=>'3',
            'Store_id'=>'1',
            'content'=>'不定期有即期品便宜販售，覺得很棒，蠻划算的!',
            'rate'=>'5',

        ]);
        Comment::create([
            'Member_id'=>'3',
            'Store_id'=>'2',
            'content'=>'店長態度不佳，一副要賣不賣的，傻眼',
            'rate'=>'1',

        ]);
        Comment::create([
            'Member_id'=>'2',
            'Store_id'=>'2',
            'content'=>'明明是韓國服飾，為什麼店長穿著隨便，像個土鳳梨',
            'rate'=>'3',

        ]);
        Comment::create([
            'Member_id'=>'3',
            'Store_id'=>'3',
            'content'=>'一進門就看見店長在做伏地挺身?????????? Excuse me??',
            'rate'=>'2',

        ]);
        Comment::create([
            'Member_id'=>'1',
            'Store_id'=>'3',
            'content'=>'店員很親切，很用心地介紹，一定會再來光顧！',
            'rate'=>'5',

        ]);
        StoreComment::create([
            'Member_id'=>'1',
            'Store_id'=>'1',
            'content'=>'謝謝您的支持，歡迎再度光臨!',


        ]);
        StoreComment::create([
            'Member_id'=>'2',
            'Store_id'=>'1',
            'content'=>'我們會再進行員工教育，謝謝您的包容!',


        ]);
        StoreComment::create([
            'Member_id'=>'3',
            'Store_id'=>'1',
            'content'=>'謝謝您的支持，歡迎再度光臨!!',


        ]);
        StoreComment::create([
            'Member_id'=>'3',
            'Store_id'=>'2',
            'content'=>'不買就不要買阿',


        ]);
        StoreComment::create([
            'Member_id'=>'2',
            'Store_id'=>'2',
            'content'=>'你才土鳳梨，你全家都土鳳梨',


        ]);
        StoreComment::create([
            'Member_id'=>'3',
            'Store_id'=>'3',
            'content'=>'你沒有感受到我的運動魂嗎?',


        ]);
        StoreComment::create([
            'Member_id'=>'1',
            'Store_id'=>'3',
            'content'=>'謝謝',
        ]);
        Push::create([
            'Store_id'=>'1',
            'Commodity_id'=>'74564685',
            'title'=>'義美小泡芙6/7-6/10只要半價喔!!!!',
            'discount'=>'15',
            'statue'=>'0',
            'date_start'=>'6/7',
            'date_end'=>'6/8',
            'time_start'=>'9:00',
            'time_end'=>'21:00',
        ]);
       
        Push::create([
            'Store_id'=>'1',
            'Commodity_id'=>'57891986',
            'title'=>'即日起~6/30 日本超夯零食"梅片"特價70!!!',
            'discount'=>'30',
            'statue'=>'0',
            'date_start'=>'6/7',
            'date_end'=>'6/30',
            'time_start'=>'9:00',
            'time_end'=>'21:00',
        ]);
        Push::create([
            'Store_id'=>'2',
            'Commodity_id'=>'76876877',
            'title'=>'最夯百搭緊身黑褲，本週１５０！',
            'discount'=>'8',
            'statue'=>'0',
            'date_start'=>'6/4',
            'date_end'=>'6/10',
            'time_start'=>'9:00',
            'time_end'=>'21:00',
        ]);
        Push::create([
            'Store_id'=>'3',
            'Commodity_id'=>'56431461',
            'title'=>'Nike頭帶，本週100一條!',
            'discount'=>'50',
            'statue'=>'0',
            'date_start'=>'6/4',
            'date_end'=>'6/10',
            'time_start'=>'9:00',
            'time_end'=>'21:00',
        ]);


    }
}
