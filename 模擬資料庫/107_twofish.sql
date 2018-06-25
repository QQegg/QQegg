-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_account_unique` (`account`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `account`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1,	'sh980932',	'admin@gmail.com',	'$2y$10$F16zRSUoY68LOPB10ykAoO6C47Mb7uTle75i6iJccxhhEjrVK9hc2',	'2018-06-24 19:49:36',	'2018-06-24 19:49:36');

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE `categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Store_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categorys` (`id`, `Store_id`, `name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	'日本零食',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(2,	1,	'傳統美食',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(3,	1,	'沖泡飲品',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(4,	2,	'長褲',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(5,	2,	'上衣',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(6,	2,	'裙子',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(7,	2,	'短褲',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(8,	3,	'摺疊傘',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(9,	3,	'旅行收納',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(10,	3,	'瑜珈器材',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(11,	3,	'運動毛巾',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(12,	3,	'露營',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Member_id` int(11) DEFAULT NULL,
  `Store_id` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `Member_id`, `Store_id`, `content`, `rate`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'店家販售種類蠻多的，價格也很親民',	'5',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(2,	2,	1,	'店員看起來臉有點臭',	'3',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(3,	3,	1,	'不定期有即期品便宜販售，覺得很棒，蠻划算的!',	'5',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(4,	3,	2,	'店長態度不佳，一副要賣不賣的，傻眼',	'1',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(5,	2,	2,	'明明是韓國服飾，為什麼店長穿著隨便，像個土鳳梨',	'3',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(6,	3,	3,	'一進門就看見店長在做伏地挺身?????????? Excuse me??',	'2',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(7,	1,	3,	'店員很親切，很用心地介紹，一定會再來光顧！',	'5',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38');

DROP TABLE IF EXISTS `comment_store`;
CREATE TABLE `comment_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Member_id` int(11) DEFAULT NULL,
  `Store_id` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comment_store` (`id`, `Member_id`, `Store_id`, `content`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'謝謝您的支持，歡迎再度光臨!',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(2,	2,	1,	'我們會再進行員工教育，謝謝您的包容!',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(3,	3,	1,	'謝謝您的支持，歡迎再度光臨!!',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(4,	3,	2,	'不買就不要買阿',	NULL,	'2018-06-24 19:49:39',	'2018-06-24 19:49:39'),
(5,	2,	2,	'你才土鳳梨，你全家都土鳳梨',	NULL,	'2018-06-24 19:49:39',	'2018-06-24 19:49:39'),
(6,	3,	3,	'你沒有感受到我的運動魂嗎?',	NULL,	'2018-06-24 19:49:39',	'2018-06-24 19:49:39'),
(7,	1,	3,	'謝謝',	NULL,	'2018-06-24 19:49:39',	'2018-06-24 19:49:39');

DROP TABLE IF EXISTS `commoditys`;
CREATE TABLE `commoditys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `commoditys` (`id`, `Category_id`, `store_id`, `name`, `specification`, `price`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(25353446,	8,	3,	'大傘面摺疊自動傘',	'黑',	230,	'自動傘.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(41254944,	6,	2,	'牛仔短裙',	'XL',	299,	'短裙.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(44287654,	5,	2,	'棒球T恤',	'S',	290,	'T恤.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(45241264,	10,	3,	'多功能止滑瑜珈墊',	'一般',	299,	'瑜珈墊.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(45546488,	7,	2,	'運動短褲',	'S',	150,	'短褲.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(45551129,	2,	1,	'寒天蒟蒻條 300G',	'胡椒',	180,	'蒟蒻條.JPG',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(45621654,	4,	2,	'百搭鉛筆褲',	'S',	290,	'鉛筆褲.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(45645628,	9,	3,	'磨砂防水收納袋',	'大',	35,	'收納袋.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(45655444,	12,	3,	'露營遮陽帳篷',	'黑',	400,	'帳篷.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(45687985,	5,	2,	'童趣塗鴉短袖上衣',	'S',	390,	'上衣.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(54656512,	9,	3,	'旅行整理收納包六件套',	'黑',	199,	'旅行包.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(56431461,	11,	3,	'NIKE 頭帶',	'黑',	150,	'頭帶.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(57891986,	1,	1,	'梅片',	'大',	100,	'梅乾片.JPG',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(63645424,	3,	1,	'發泡錠',	'檸檬',	69,	'發泡錠.JPG',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(74564685,	2,	1,	'義美小泡芙',	'草莓',	30,	'泡芙.JPG',	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(76876877,	4,	2,	'百搭緊身黑褲',	'S',	158,	'緊身褲.JPG',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38');

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Store_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lowestprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `coupons` (`id`, `Store_id`, `title`, `start`, `end`, `discount`, `lowestprice`, `picture`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	'會員好康$600折價券',	'20180706',	'20190808',	'600',	'1800',	'eatfoodfood600.jpg',	0,	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(2,	1,	'會員好康$200折價券',	'20180706',	'20190808',	'200',	'600',	'eatfoodfood600.jpg',	0,	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(3,	2,	'會員專屬$350折價券',	'20180706',	'20190808',	'350',	'1500',	'富山350.jpg',	0,	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37'),
(4,	3,	'會員好康100折價券',	'20180706',	'20190808',	'100',	'1000',	'青年100.jpg',	0,	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37');

DROP TABLE IF EXISTS `coupon_status`;
CREATE TABLE `coupon_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Coupon_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Member_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `dealmatchs`;
CREATE TABLE `dealmatchs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tran_id` int(11) NOT NULL,
  `Commodity_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `dislike categorys`;
CREATE TABLE `dislike categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `M_id` int(11) NOT NULL,
  `Cate_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2018_01_12_083219_pushs',	1),
(4,	'2018_01_12_091327_categorys',	1),
(5,	'2018_01_12_091357_commoditys',	1),
(6,	'2018_01_12_091435_comments',	1),
(7,	'2018_01_12_091537_dislike_categorys',	1),
(8,	'2018_01_12_091551_coupons',	1),
(9,	'2018_01_12_091629_posts',	1),
(10,	'2018_01_12_091721_Stores_account_passwords',	1),
(11,	'2018_02_05_045459_coupon_status',	1),
(12,	'2018_03_07_061146_dealmatch',	1),
(13,	'2018_03_07_061146_transactions',	1),
(14,	'2018_03_08_061530_create_stores_table',	1),
(15,	'2018_03_26_073611_create_admins_table',	1),
(16,	'2018_04_25_072046_comment_store',	1),
(17,	'2018_05_28_072639_user_coupons',	1),
(18,	'2018_06_03_105434_user_pushs',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `Admin_id`, `title`, `content`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'1',	'系統維修公告',	'親愛的店家戶您好﹕為提昇網路服務品質，本系統將於107年06月17日 上午04:00 ~ 10:00 進行系統維護，敬請見諒。    祝您 身體健康 萬事如意  雙魚商圈 敬上',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38'),
(2,	'1',	'2018年雙魚商圈優良店家',	'2018年雙魚商圈優良店家票選活動開跑拉~\r\n即日起至06月15日開始進行優良店家票選活動\r\n',	NULL,	'2018-06-24 19:49:38',	'2018-06-24 19:49:38');

DROP TABLE IF EXISTS `pushs`;
CREATE TABLE `pushs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Store_id` int(11) NOT NULL,
  `Commodity_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statue` int(11) NOT NULL DEFAULT '0',
  `date_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pushs` (`id`, `Store_id`, `Commodity_id`, `title`, `discount`, `statue`, `date_start`, `date_end`, `time_start`, `time_end`, `created_at`, `updated_at`, `remember_token`) VALUES
(1,	1,	74564685,	'義美小泡芙6/7-6/10只要半價喔!!!!',	'15',	0,	'6/7',	'6/8',	'9:00',	'21:00',	'2018-06-24 19:49:39',	'2018-06-24 19:49:39',	NULL),
(2,	1,	57891986,	'即日起~6/30 日本超夯零食\"梅片\"特價70!!!',	'30',	0,	'6/7',	'6/30',	'9:00',	'21:00',	'2018-06-24 19:49:39',	'2018-06-24 19:49:39',	NULL),
(3,	2,	76876877,	'最夯百搭緊身黑褲，本週１５０！',	'8',	0,	'6/4',	'6/10',	'9:00',	'21:00',	'2018-06-24 19:49:39',	'2018-06-24 19:49:39',	NULL),
(4,	3,	56431461,	'Nike頭帶，本週100一條!',	'50',	0,	'6/4',	'6/10',	'9:00',	'21:00',	'2018-06-24 19:49:39',	'2018-06-24 19:49:39',	NULL);

DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stores_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `stores` (`id`, `name`, `contact`, `email`, `password`, `phone`, `address`, `picture`, `right`, `created_at`, `updated_at`) VALUES
(1,	'EatFoodFood 小吃貨 - 美食、伴手禮',	'陳地瓜妤',	'mimi@gmail.com',	'$2y$10$qaCQCWpSbm/GydL/53fg.eWqgrSJouGJPt9gk/p22vDLTeByAuC26',	'0988045436',	'台中市',	'EatFoodFood.png',	0,	'2018-06-24 19:49:36',	'2018-06-24 19:49:36'),
(2,	'富山韓國服飾',	'王志揚',	'gigi@gmail.com',	'$2y$10$cDK3A.9fmUB8GLyZyZIhu.fA/4RhhXm8TzOV/S926zBZ5G8qjkRmS',	'0785155622',	'台中市',	'富山韓國服飾.png',	0,	'2018-06-24 19:49:36',	'2018-06-24 19:49:36'),
(3,	'青年戶外休閒用品專賣店',	'許漢昌',	'riri@gmail.com',	'$2y$10$JIbOFgHdIeSP/BfikFIv4.vgJ.Fzm7bPRx2Qk5XgtJhfGHW99hH/i',	'0785155622',	'台中市',	'青年戶外休閒用品專賣店.png',	0,	'2018-06-24 19:49:36',	'2018-06-24 19:49:36');

DROP TABLE IF EXISTS `stores account passwords`;
CREATE TABLE `stores account passwords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `S_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Store_id` int(11) NOT NULL,
  `Member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Coupon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_account_unique` (`account`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `account`, `password`, `point`, `birthday`, `phone`, `email`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'李玉娟',	'sh980932',	'$2y$10$kyX9ZdVKLostLo7swBskY.jOxMlZeAdNT4bior84NzIP9euzp9v/e',	500,	'19970730',	'0988045436',	'mimi@gmail.com',	NULL,	NULL,	'2018-06-24 19:49:36',	'2018-06-24 19:49:36'),
(2,	'王建志',	'sh980933',	'$2y$10$698IMjNuJxkPj2Qc517/Fu6pDat2YMqJfBASFnhKicJm34E6nzLDO',	1000,	'19970730',	'0988045436',	'gigi@gmail.com',	NULL,	NULL,	'2018-06-24 19:49:36',	'2018-06-24 19:49:36'),
(3,	'陳小妤',	'sh980934',	'$2y$10$K1L63LSlchiZlV0ntf9yn.z9Ho0.lkz8lDX4qzJgauQ2JRrYG7B5u',	500,	'19970730',	'0988045436',	'riri@gmail.com',	NULL,	NULL,	'2018-06-24 19:49:37',	'2018-06-24 19:49:37');

DROP TABLE IF EXISTS `user_coupons`;
CREATE TABLE `user_coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `Store_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Coupon_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `user_pushs`;
CREATE TABLE `user_pushs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `Store_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Push_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2018-06-25 03:50:01
