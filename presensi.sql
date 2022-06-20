/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - presensi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`presensi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `presensi`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `lokasi` */

DROP TABLE IF EXISTS `lokasi`;

CREATE TABLE `lokasi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `lokasi` */

insert  into `lokasi`(`id`,`lokasi`,`longitude`,`latitude`,`created_at`,`updated_at`) values 
(1,'Kota Madiun','111.513702','-7.629714',NULL,NULL),
(2,'Kabupaten Madiun','111.505483','-7.627753',NULL,NULL),
(3,'Rumah VIKA','111.535997','-7.617510',NULL,NULL),
(4,'Kampus 1 Politeknik Negeri madiun','111.526756','-7.647394',NULL,NULL),
(5,'Kampus 2 Politeknik Negeri madiun','111.510618','-7.611962',NULL,NULL),
(6,'Kota Madiun','111.513702','-7.629714',NULL,NULL),
(7,'Kabupaten Madiun','111.505483','-7.627753',NULL,NULL),
(8,'Rumah VIKA','111.535997','-7.617510',NULL,NULL),
(9,'Kampus 1 Politeknik Negeri madiun','111.526756','-7.647394',NULL,NULL),
(10,'Kampus 2 Politeknik Negeri madiun','111.510618','-7.611962',NULL,NULL),
(11,'Kota Madiun','111.513702','-7.629714',NULL,NULL),
(12,'Kabupaten Madiun','111.505483','-7.627753',NULL,NULL),
(13,'Rumah VIKA','111.535997','-7.617510',NULL,NULL),
(14,'Kampus 1 Politeknik Negeri madiun','111.526756','-7.647394',NULL,NULL),
(15,'Kampus 2 Politeknik Negeri madiun','111.510618','-7.611962',NULL,NULL),
(16,'Kota Madiun','111.513702','-7.629714',NULL,NULL),
(17,'Kabupaten Madiun','111.505483','-7.627753',NULL,NULL),
(18,'Rumah VIKA','111.535997','-7.617510',NULL,NULL),
(19,'Kampus 1 Politeknik Negeri madiun','111.526756','-7.647394',NULL,NULL),
(20,'Kampus 2 Politeknik Negeri madiun','111.510618','-7.611962',NULL,NULL),
(21,'Kota Madiun','111.513702','-7.629714',NULL,NULL),
(22,'Kabupaten Madiun','111.505483','-7.627753',NULL,NULL),
(23,'Rumah VIKA','111.535997','-7.617510',NULL,NULL),
(24,'Kampus 1 Politeknik Negeri madiun','111.526756','-7.647394',NULL,NULL),
(25,'Kampus 2 Politeknik Negeri madiun','111.510618','-7.611962',NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(6,'2021_05_19_081354_create_perijinan_table',2),
(7,'2021_06_23_000105_create_lokasi_table',2),
(10,'2014_10_12_000000_create_users_table',4),
(12,'2021_04_24_042759_create_staf_table',5),
(13,'2021_04_24_043100_create_presensi_table',6);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('admin@gmail.com','$2y$10$D/zIobXB.I9rMCeH83D1Du/WPQydb5.Co45hjVlL/nsRvLNjamsc.','2021-07-14 05:17:37');

/*Table structure for table `perijinan` */

DROP TABLE IF EXISTS `perijinan`;

CREATE TABLE `perijinan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `izin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perijinan_user_id_foreign` (`user_id`),
  CONSTRAINT `perijinan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `perijinan` */

insert  into `perijinan`(`id`,`user_id`,`izin`,`tanggal_awal`,`tanggal_akhir`,`jam`,`tujuan`,`status`,`note`,`created_at`,`updated_at`) values 
(4,4,'Pribadi','2021-07-10',NULL,'08:00 - 17:00','cek up','DiIjinkan','cek kesehatan','2021-07-09 03:41:30','2021-07-09 11:11:11'),
(5,4,'Dinas','2021-07-12',NULL,'07:00 - 20:00','Jakarta','DiTolak','Mengurus Pajak','2021-07-09 03:43:20','2021-07-09 03:52:43'),
(6,5,'Dinas','2021-07-13',NULL,'07:00 - 21:00','Surabaya','DiIjinkan','Mubes Raker','2021-07-09 03:49:06','2021-07-09 03:52:30'),
(7,8,'Dinas','2021-07-12',NULL,'07:00 - 17:00','Jakarta','Menunggu','Raker Nasional','2021-07-09 11:22:04','2021-07-09 11:22:04'),
(8,4,'Dinas','2021-07-16',NULL,'07:00 - 17:00','Jakarta','DiIjinkan','Raker','2021-07-14 05:12:22','2021-07-14 05:18:51'),
(9,4,'Pribadi','2021-07-14',NULL,'08:00 - 24:00','cek up','DiTolak','Kontrol rutin','2021-07-14 05:14:28','2021-07-14 05:19:09');

/*Table structure for table `presensi` */

DROP TABLE IF EXISTS `presensi`;

CREATE TABLE `presensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rencana` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presensi_user_id_foreign` (`user_id`),
  CONSTRAINT `presensi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `presensi` */

insert  into `presensi`(`id`,`user_id`,`date`,`time_in`,`time_out`,`location`,`rencana`,`bukti`,`status`,`created_at`,`updated_at`) values 
(1,4,'2021-07-09','10:30:39','10:34:56','',NULL,'','pulang','2021-07-09 10:30:39','2021-07-09 10:34:56'),
(2,5,'2021-07-09','10:45:06','10:45:43','',NULL,'','pulang','2021-07-09 10:45:06','2021-07-09 10:45:43'),
(3,8,'2021-07-09','18:20:53','18:21:09','',NULL,'','pulang','2021-07-09 18:20:53','2021-07-09 18:21:09'),
(4,4,'2021-07-14','12:10:15','12:10:31','',NULL,'','pulang','2021-07-14 12:10:15','2021-07-14 12:10:31');

/*Table structure for table `staf` */

DROP TABLE IF EXISTS `staf`;

CREATE TABLE `staf` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staf_user_id_foreign` (`user_id`),
  CONSTRAINT `staf_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `staf` */

insert  into `staf`(`id`,`user_id`,`nama`,`nip`,`tanggal_lahir`,`alamat`,`jabatan`,`no_telp`,`email`,`created_at`,`updated_at`) values 
(1,3,'vika nor azizah','2345',NULL,'Jl. Imam Bonjo, Madiun','Pegawai',NULL,'kikok87654@gmail.com','2021-07-09 03:00:37','2021-07-09 03:00:37'),
(2,4,'Bella','111222',NULL,'Jl. Dumilah, Madiun','Pegawai',NULL,'bella@gmail.com','2021-07-09 03:24:41','2021-07-09 03:24:41'),
(3,5,'Azizah','333444',NULL,'Sri Rejeki, Sukosari','Pegawai',NULL,'azizah@gmail.com','2021-07-09 03:25:11','2021-07-09 03:25:11'),
(6,8,'Rudi','656565',NULL,'Jl. Rahayu, Madiun','Pegawai',NULL,'rudi@gmail.com','2021-07-09 11:19:47','2021-07-09 11:19:47');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar-8.jpg',
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nip`,`name`,`tanggal_lahir`,`role`,`email`,`email_verified_at`,`file`,`no_telp`,`password`,`alamat`,`jabatan`,`remember_token`,`created_at`,`updated_at`) values 
(1,121234,'Admin','1997-02-06','admin','admin@gmail.com',NULL,'avatar-8.jpg','0834672834','$2y$10$FOPnQjYPxFlpi6Au5qaBTuQpb3Uf3Uem1m1yCwU9QvVUdvf425Jvi','Jl. Pahlawan Madiun','Kepegawaian',NULL,NULL,'2021-07-14 05:27:28'),
(2,11112,'Anisa','1995-06-21','staf','anisa@gmail.com',NULL,'avatar-8.jpg','09876567898','$2y$10$t/HGG6JlXKB9tj/XoIBg7ucYqqtzzrxnhvmR9ROfgHe0OTJ6iaS.q','Jl. Usada Sari Madiun','Pegawai',NULL,'2021-07-06 06:40:38','2021-07-09 08:01:52'),
(3,2345,'vika nor azizah',NULL,'staf','kikok87654@gmail.com',NULL,'avatar-8.jpg',NULL,'$2y$10$UdzXzB3qhgNZgh3xAk7Zie7a3cRHWvsYos7EyLWpzhyJmWPcKnbAC','Jl. Imam Bonjo, Madiun','Pegawai',NULL,'2021-07-09 03:00:37','2021-07-09 03:00:37'),
(4,111222,'Bella',NULL,'staf','bella@gmail.com',NULL,'avatar-8.jpg',NULL,'$2y$10$M1/fD24yog2zaxNmXb7tw.4VdRj5FfA5CN1gE8vRolUxjA2AsGSea','Jl. Dumilah, Madiun','Pegawai',NULL,'2021-07-09 03:24:41','2021-07-09 03:24:41'),
(5,12345,'Azizah','1999-10-10','staf','azizah@gmail.com',NULL,'avatar-8.jpg','09878986435','$2y$10$VUmdhYjW9N4blNo0cGEAtOAVr9z9TMEYS/DeSfm8x1CDxlWVT6HfC','Sri Rejeki, Sukosari','Pegawai',NULL,'2021-07-09 03:25:11','2021-07-09 11:17:13'),
(6,333666,'Satrio',NULL,'staf','satrio@gmail.com',NULL,'avatar-8.jpg',NULL,'$2y$10$F5341U3/Nw3mhmMq14JS6evAlsmdfy78EVg/DaYqDATyrp45mZAqm','Kartoharjo','Pegawai',NULL,'2021-07-09 10:24:28','2021-07-09 10:24:28'),
(7,989898,'Nuri',NULL,'staf','nuri@gmail.com',NULL,'avatar-8.jpg',NULL,'$2y$10$8l0iajctYLqt1m/eNn7t9un4/hO82Lh/5z1o4VN0O50yXY2oX3hvC','Jl. Mulya Sari Madiun','Pegawai',NULL,'2021-07-09 11:13:28','2021-07-09 11:13:28'),
(8,656565,'Rudi',NULL,'staf','rudi@gmail.com',NULL,'avatar-8.jpg',NULL,'$2y$10$u.xcyOEEx9W3mCtaCGrVtu7ixlJ5CYFP4edMKz4fEqD6vaXjDey.y','Jl. Rahayu, Madiun','Pegawai',NULL,'2021-07-09 11:19:47','2021-07-09 11:19:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
