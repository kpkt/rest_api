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
bootstrap/
   --css/
      --bootstrap.min.css
   --js/
       --bootstrap.min.js
   --fonts/
       --glyphicons-halflings-regular.eot
       --glyphicons-halflings-regular.svg
       --glyphicons-halflings-regular.ttf
       --glyphicons-halflings-regular.woff
js/
   --jquery.min.js
css/
   --style.css
inc/
   --inc.dbconfig.php
   --inc.class.crud.php  
   --inc.footer.php
   --inc.header.php
index.php
add.php
edit.php
view.php


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

Fail inc.class.crud.php menempatkan fungsi asas CRUD dan fungsi memanggil semua data dan data terpilih.

```php

function get_all_data($query)

function create($param1, $param2, $param3, $paramN)

function read($id)

function update($id, $param1, $param2, $param3, $paramN)

function delete($id)

```

# Download

Download the script by clicking following link and try it in your projects.

[Download](https://github.com/kpkt/rest_api/archive/master.zip).
