/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.24 : Database - ecommerce_website
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ecommerce_website` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ecommerce_website`;

/*Table structure for table `admin_users` */

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_users` */

insert  into `admin_users`(`id`,`name`,`email`,`password`,`created_at`,`updated_at`) values (1,'Abdul Mozid Admin','mozid.it@gmail.com','$2y$10$h.62dh9UZhb5LS9oWvc4iurinc9tIvRnKBcIHyaflminj5C3D/ANu',NULL,NULL),(2,'Samira Bithi Admin','samirabithi0648@gmail.com','$2y$10$uTAL9OzJlENul0N9UjZmzurNVJwe5XwP3aWJhBib6CdZP4uaYO.Pa',NULL,NULL);

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cart` */

insert  into `cart`(`id`,`product_id`,`user_id`,`created_at`,`updated_at`) values (1,6,1,'2021-05-29 06:37:50','2021-05-29 06:37:50'),(2,6,1,'2021-05-29 06:37:57','2021-05-29 06:37:57');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2014_10_12_100000_create_password_resets_table',1),(5,'2019_08_19_000000_create_failed_jobs_table',1),(6,'2021_05_19_140611_create_users_table',1),(7,'2021_05_21_061300_create_products_table',2),(8,'2021_05_23_140517_create_cart_table',3),(14,'2021_05_24_170524_create_orders_table',4),(15,'2021_05_24_172142_create_order_details_table',4),(16,'2021_05_27_024505_create_admin_users_table',5);

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_details` */

insert  into `order_details`(`id`,`order_id`,`product_id`,`product_name`,`quantity`,`price`,`created_at`,`updated_at`) values (1,1,2,'Walton Mobile',3,18000,NULL,NULL),(2,1,7,'Toshiba Laptop',1,62000,NULL,NULL),(3,1,8,'Acer Laptop',1,63500,NULL,NULL),(4,2,5,'One Plus Mobile',2,17000,NULL,NULL),(5,2,7,'Toshiba Laptop',1,62000,NULL,NULL),(6,2,8,'Acer Laptop',1,63500,NULL,NULL),(7,3,1,'LG Mobile',2,20000,NULL,NULL),(8,3,3,'Oppo Mobile',1,16000,NULL,NULL),(9,3,6,'LG Laptop',3,65000,NULL,NULL),(10,4,2,'Walton Mobile',2,18000,NULL,NULL),(11,4,5,'One Plus Mobile',1,17000,NULL,NULL),(12,4,7,'Toshiba Laptop',1,62000,NULL,NULL),(13,5,5,'One Plus Mobile',3,17000,NULL,NULL),(14,5,7,'Toshiba Laptop',2,62000,NULL,NULL),(15,6,5,'One Plus Mobile',2,17000,NULL,NULL),(16,6,7,'Toshiba Laptop',2,62000,NULL,NULL),(17,7,4,'Samsung Mobile',5,25000,NULL,NULL);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`user_id`,`address`,`order_status`,`payment_status`,`payment_method`,`created_at`,`updated_at`) values (1,1,'51/1, West Rajabazar, Dhaka','Pending','Pending','Payment Gateway','2021-05-25 18:28:41','2021-05-25 18:28:41'),(2,1,'51/1, West Rajabazar, Dhaka','Pending','Pending','Payment Gateway','2021-05-26 02:01:47','2021-05-26 02:01:47'),(3,1,'51/1, West Rajabazar, Dhaka','Approved','Approved','Check','2021-05-26 02:02:18','2021-05-30 17:14:23'),(4,2,'Dinajpur, Rangpur','Approved','Approved','Payment Gateway','2021-05-26 02:02:55','2021-05-30 17:12:27'),(5,2,'Dinajpur, Rangpur','Approved','Pending','Payment Gateway','2021-05-26 02:03:28','2021-05-30 17:03:16'),(6,2,'51/1, West Rajabazar, Dhaka','Pending','Pending','Payment Gateway','2021-05-26 06:26:55','2021-05-26 06:26:55'),(7,1,'51/1, West Rajabazar, Dhaka','Pending','Pending','Check','2021-05-27 15:32:57','2021-05-27 15:32:57');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`price`,`category`,`description`,`gallery`,`created_at`,`updated_at`) values (1,'LG Mobile 30','18000','Mobile','LG Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://www.lg.com/us/images/cell-phones/md07518563/gallery/zoom-01.jpg',NULL,'2021-05-30 02:45:15'),(2,'Walton Mobile','18000','Mobile','Walton Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://i2.wp.com/www.mobilebd.co/wp-content/uploads/2020/12/Walton-Primo-RM4-Official-Image--500x500.png',NULL,NULL),(3,'Abdul Mozid','654321','ma.mozid26@gmail.com','','',NULL,'2021-05-30 15:05:04'),(4,'Samsung Mobile','25000','Mobile','Samsung Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://www.mobiledokan.com/wp-content/uploads/2021/04/Samsung-Galaxy-M62-image.jpg',NULL,NULL),(5,'One Plus Mobile','17000','Mobile','One Plus Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://www.gizmochina.com/wp-content/uploads/2019/10/oneplus_8_pro-.png',NULL,NULL),(6,'LG Laptop','65000','Laptop','LG Laptop = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://www.lg.com/us/images/laptops/md07500001/gallery/desktop-01.jpg',NULL,NULL),(7,'Toshiba Laptop','62000','Laptop','Toshiba Laptop = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://static.toiimg.com/photo/54236775/Toshiba-Satellite-C50-A-I0110t-Laptop.jpg',NULL,NULL),(8,'Acer Laptop','63500','Laptop','Acer Laptop = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://4.imimg.com/data4/SH/KE/MY-28174815/acer-laptop-500x500.jpg',NULL,NULL),(12,'OPPO A20','12562','Mobile','This is good.','https://www.gizmochina.com/wp-content/uploads/2019/02/Noa-F10-Pro-280x280.jpg','2021-05-29 17:05:19','2021-05-29 17:05:19'),(13,'Samsung Mobile','25000','Mobile','Samsung Mobile = Versatile Multi-Screen Form Factor with Swivel Mode 6.8\" OLED FullVision Main Display; 3.9\" OLED Secondary Display Triple Rear Cameras: 64MP Main, 13MP Ultra-Wide, 12MP Ultra-Wide Angle with Hexa Motion Sensors','https://www.mobiledokan.com/wp-content/uploads/2021/04/Samsung-Galaxy-M62-image.jpg','2021-05-29 17:19:13','2021-05-29 17:19:13'),(17,'MI Redmi 8','123000','Mobile','This is very good phone.','https://fdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-8.jpg','2021-05-30 02:56:31','2021-05-30 02:56:31');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`is_active`,`created_at`,`updated_at`) values (1,'Abdul Mozid','mozid.it@gmail.com','$2y$10$RSUrHwmYfNpwjJXIbadL..j8UdjyMDrDXUEOslQ0e7oqnBp4CFEui',1,NULL,NULL),(2,'Samira Bithi','samirabithi0648@gmail.com','$2y$10$RSUrHwmYfNpwjJXIbadL..j8UdjyMDrDXUEOslQ0e7oqnBp4CFEui',1,NULL,NULL),(4,'Samira Bithi','onlinelicense2021@gmail.com','$2y$10$2MSUfeMRB8ABZXFeKaWDhON.EOnd6ANlKgS9nqvH/FDE7ydFrZx.y',1,'2021-05-30 14:59:54','2021-05-30 14:59:54'),(5,'Ayon','ayon@gmail.com','$2y$10$34vgDfVi7Oq/hFa6UpgBWe.VjiLXvNbfTVx89/EnILBw60ano/7O.',1,'2021-05-30 17:51:22','2021-05-30 17:51:22'),(6,'Labik','labik@gmail.com','$2y$10$S2mjRlMhEhkBdPcWAV6lWO2/WfcOUF2avWasLFkhmy9kEDEY4SWMC',1,'2021-05-30 17:59:00','2021-05-30 17:59:00'),(9,'Polash','polas@gmail.com','$2y$10$zSsPF64ZmiBDwJs7owOO8OtfPWYBeaZx6l5INwtCABSmzG.rUS./2',1,'2021-05-30 18:00:05','2021-05-30 18:00:05'),(10,'sdfsfsfd','sdfsdf@dkf.com','$2y$10$ViXBqpv2iPQRSi3dXEQ1N.SnBiBB/M1d.SLVYbkXboZ.jWgyAd.fy',1,'2021-05-30 18:02:09','2021-05-30 18:02:09'),(11,'sfdsfsdfsdfsf','sfsdsdf@dkfc.com','$2y$10$EpuuwWmduEdwd3DDGI.P6Om5aQJw3evE4XTVCJInRZXgDtZNmJEeO',1,'2021-05-30 18:03:38','2021-05-30 18:03:38');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
