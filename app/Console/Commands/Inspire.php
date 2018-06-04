<?php
/**
 * Created by PhpStorm.
 * User: SKILL573
 * Date: 2018/6/4
 * Time: 下午 08:31
 */
namespace App\Console\Commands;

use Illuminate\Console\Command;

class Inspire extends Command
{
    // 命令名稱
    protected $signature = 'test:Log';

    // 說明文字
    protected $description = '[測試] Log 檔案';

    public function __construct()
    {
        parent::__construct();
    }
}