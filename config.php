<?php
/**
 * Database configuration
 */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "evotemipa");

/* Creating Database for EvoteMipa
 *
create database evote_mipa
 
use evote_mipa
 
create table users(
   uid int(11) primary key auto_increment,
   unique_id varchar(23) not null unique,
   nim varchar(100) not null unique,
   encrypted_password varchar(80) not null,
   salt varchar(10) not null,
   status varchar(50) not null,
   created_at datetime,
   updated_at datetime null
);
 */

?>