# REST API
Mobile aplikasi dan API (Application Programming Interface)

Dalam tutorial ini, kita akan lihat bagaimana mewujudkan operasi 
Pangkalan Data CRUD (CREATE, READ, UPDATE, DELETE) MySQL dengan menggunakan konsep Berorientasikan Objek (_OO - Object Oriented_) PHP dan PDO.
Dalam menghasilkan rekaan _front-end_, tutorial ini menggunakan _Bootstrap framework_.



# Database & Table 

Wujudkan _database_ dan _table_ seperti dibawah

```php
--
-- Database: `db_api`
--

--
CREATE DATABASE IF NOT EXISTS db_api;
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;


-- 
-- Dumping data for table `users`
--


INSERT INTO `users` VALUES (1, 'Nur Azyani bin Abdul Manaf','azyani@gmail.com','0113456789');
INSERT INTO `users` VALUES (2, 'Nurul Annisa Anuar','annisa@gmail.com','0123456789');
INSERT INTO `users` VALUES (3, 'Saifullah Poniman','saifullah@gmail.com','0133456789');
INSERT INTO `users` VALUES (4, 'Mohd Salleh Daim','salled.daim@gmail.com','0143456789');

```

# Directory

Direktori fail projek seperti dibawah 

```php
inc/
   --inc.config.php
   --inc.class.api.php   
api/
   --api_add.php
   --api_edit.php
   --api_get.php
   --api_index.php

```

# Config

Fail inc.config.php menyimpan parameter yang kekal atau perlu diubah mengikut konfigurasi komputer anda

```php

/**
 * Set Setting 
 * Please change this parameter follow yourselft setting
 */
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "password";
$dbName = "db_php_sample";

```

# CRUD Class

Fail inc.class.api.php menempatkan fungsi asas CRUD dan fungsi memanggil semua data dan data terpilih.

```php

function api_get_all_data($query)

function api_get_data($id)

function api_create($param1, $param2, $param3, $paramN)

function api_update($id, $param1, $param2, $param3, $paramN)


```

# Download

Download the script by clicking following link and try it in your projects.

[Download](https://github.com/kpkt/rest_api/archive/api.zip).
