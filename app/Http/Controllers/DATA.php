<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Store;
use App\Category;
use App\Coupon;
use App\User;
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
                'email' =>'test1@gmail.com',
                'name' => '文具店',
                'contact' => '小王',
                'phone' => '0988045436',
                'address' => '台中市',
                'password'=>Hash::make('123456'),
                'title'=>'test1',
            ]);
        Store::create([
                'email' =>'test2@gmail.com',
                'name' => '零食店',
                'contact' => '小李',
                'phone' => '0785155622',
                'address' => '台中市',
                'password'=>Hash::make('123456'),
                'title'=>'test2',
            ]);
        User::create([
        'name' => '我愛貓咪',
        'account' => 'sh980932',
        'email' =>'mimi@gmail.com',
        'password'=>Hash::make('123456'),
        'point' => '500',
        'birthday' => '19970730',
        'phone' => '0988045436',

    ]);
        User::create([
            'name' => '貓咪好可愛',
            'account' => 'sh980933',
            'email' =>'gigi@gmail.com',
            'password'=>Hash::make('123456'),
            'point' => '500',
            'birthday' => '19970730',
            'phone' => '0988045436',

        ]);
        User::create([
            'name' => '貓咪咪咪',
            'account' => 'sh980934',
            'email' =>'nini@gmail.com',
            'password'=>Hash::make('123456'),
            'point' => '500',
            'birthday' => '19970730',
            'phone' => '0988045436',

        ]);
        Category::create([
           'store_id'=>'1',
           'name'=>'筆'
        ]);
        Category::create([
            'store_id'=>'1',
            'name'=>'書'
        ]);
        Category::create([
            'store_id'=>'1',
            'name'=>'其他'
        ]);
        Category::create([
            'store_id'=>'2',
            'name'=>'巧克力'
        ]);
        Category::create([
            'store_id'=>'2',
            'name'=>'糖'
        ]);
        Category::create([
            'store_id'=>'2',
            'name'=>'其他'
        ]);
        Coupon::create([
            'Store_id'=>'1',
            'title'=>'小折價券',
            'content'=>'95折',
            'discount'=>'0.95',
        ]);
        Coupon::create([
            'Store_id'=>'1',
            'title'=>'中折價券',
            'content'=>'85折',
            'discount'=>'0.85',
        ]);
        Coupon::create([
            'Store_id'=>'1',
            'title'=>'大折價券',
            'content'=>'75折',
            'discount'=>'0.75',
        ]);
        Coupon::create([
            'Store_id'=>'2',
            'title'=>'小折價券',
            'content'=>'95折',
            'discount'=>'0.95',
        ]);
        Coupon::create([
            'Store_id'=>'2',
            'title'=>'中折價券',
            'content'=>'85折',
            'discount'=>'0.85',
        ]);
        Coupon::create([
            'Store_id'=>'2',
            'title'=>'大折價券',
            'content'=>'75折',
            'discount'=>'0.75',
        ]);
        User::create([
            'name'=>'user1',
            'account'=>'test1',
            'password'=>Hash::make('skill573'),
            'point'=>'500',
            'phone'=>'012345679',
            'email'=>'test1@gmail.com',
        ]);
        User::create([
            'name'=>'user2',
            'account'=>'test2',
            'password'=>Hash::make('skill573'),
            'point'=>'500',
            'phone'=>'012345679',
            'email'=>'test2@gmail.com',
        ]);
        User::create([
            'name'=>'user3',
            'account'=>'test3',
            'password'=>Hash::make('skill573'),
            'point'=>'500',
            'phone'=>'012345679',
            'email'=>'test3@gmail.com',
        ]);
        User::create([
            'name'=>'user4',
            'account'=>'test4',
            'password'=>Hash::make('skill573'),
            'point'=>'500',
            'phone'=>'012345679',
            'email'=>'test4@gmail.com',
        ]);
        User::create([
        'name'=>'user5',
        'account'=>'test5',
        'password'=>Hash::make('skill573'),
        'point'=>'500',
        'phone'=>'012345679',
        'email'=>'test5@gmail.com',
    ]);
    }
}
