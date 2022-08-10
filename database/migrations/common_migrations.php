15-07-2020
ALTER TABLE teachers ADD experience varchar(11) COMMENT 'in years' AFTER user_id;

ALTER TABLE teachers ADD achievements varchar(500) AFTER experience;
ALTER TABLE `teachers` CHANGE `achievements` `achievements` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

17-07-2020

ALTER TABLE `product_language` CHANGE `product_id` `product_id` INT(11) NULL DEFAULT NULL COMMENT 'PK product';
ALTER TABLE `product_language` DROP `product_type_id`;
ALTER TABLE `product` ADD `fast_forward` ENUM('yes', 'no') NOT NULL DEFAULT 'yes' AFTER `subject_id`;
ALTER TABLE `product` ADD `no_of_views` ENUM('unlimited', 'limited') NOT NULL DEFAULT 'unlimited' AFTER `fast_forward`;
ALTER TABLE `product` CHANGE `no_of_views` `no_of_views` ENUM('unlimited','limited') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT 		NULL DEFAULT 'unlimited' COMMENT 'unlimited or limited';
ALTER TABLE `product` ADD `views_per_video` INT NULL DEFAULT NULL AFTER `no_of_views`;
ALTER TABLE `product` ADD `validity_type` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Days or Month' AFTER `views_per_video`;
ALTER TABLE `product` ADD `validity_value` INT NULL DEFAULT NULL AFTER `validity_type`;

ALTER TABLE `videos`
  DROP `fast_forward`,
  DROP `no_of_views`,
  DROP `views_per_video`,
  DROP `validity_type`,
  DROP `validity_value`;

ALTER TABLE `video_device` CHANGE `video_id` `product_id` INT(11) NULL DEFAULT NULL COMMENT 'PK product';
ALTER TABLE `product_doubt_resolution` CHANGE `product_id` `product_id` INT(11) NULL DEFAULT NULL COMMENT 'PK Product';
ALTER TABLE `product_language` ADD `product_type_id` INT NULL DEFAULT NULL COMMENT 'PK Product' AFTER `product_id`;
ALTER TABLE `product_language` CHANGE `product_type_id` `product_type_id` INT(11) NULL DEFAULT NULL COMMENT 'PK mst_product_type';
ALTER TABLE `product_language` CHANGE `product_id` `product_id` INT(11) NULL DEFAULT NULL COMMENT 'PK product if type is 3 , PK book if type is 1 or 2';

20-07-2020

ALTER TABLE cart
ADD deleted_at TIMESTAMP
AFTER price;

ALTER TABLE `cart` CHANGE `deleted_at` `deleted_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `cart` CHANGE `deleted_at` `deleted_at` TIMESTAMP NULL DEFAULT NULL;

21-07-2020

ALTER TABLE cart
ADD video_delivery_id INT(11) COMMENT 'PK of mst_delivery_type'
AFTER product_id;

ALTER TABLE cart
ADD book_delivery_id INT(11) COMMENT 'PK of mst_delivery_type'
AFTER video_delivery_id;

ALTER TABLE cart
ADD attempt_id INT(11) COMMENT 'PK of mst_attempt'
AFTER book_delivery_id;

ALTER TABLE `cart` CHANGE `product_id` `product_id` INT(11) NULL DEFAULT NULL COMMENT 'PK of product';

ALTER TABLE orders
ADD order_no INT(11)
AFTER user_id;

ALTER TABLE address
ADD apartment TEXT NULL
AFTER address;

ALTER TABLE address
ADD city TEXT NULL
AFTER apartment;

ALTER TABLE address
ADD state_id INT(11) NULL COMMENT 'PK of mst_region'
AFTER city;

ALTER TABLE address
ADD country_id INT(11) NULL COMMENT 'PK of mst_region'
AFTER state_id;

22-07-2020

ALTER TABLE address
ADD type ENUM('normal','shipping') NOT NULL
AFTER pin_code;

ALTER TABLE orders
ADD address_id INT(11) NOT NULL
AFTER payment_status;

ALTER TABLE `orders` CHANGE `address_id` `address_id` INT(11) NULL DEFAULT NULL;
ALTER TABLE `orders` CHANGE `address_id` `address_id` INT(11) NULL DEFAULT NULL AFTER `user_id`


25-07-2020
ALTER TABLE `users` ADD `is_product_mail_sent` TINYINT NOT NULL DEFAULT '0' COMMENT '\'0 - not sent, 1- sent\'' AFTER `photo`;

import table dummy_videos
import tabl mst_region

27-07-2020
UPDATE `mst_subject` SET `name` = 'Paper-12 Company Accounts & Audit' WHERE `mst_subject`.`id` = 12;

-- 29-07-2020--
ALTER TABLE `orders` ADD `rzp_order_id` VARCHAR(255) NULL DEFAULT NULL AFTER `payment_status`;

ALTER TABLE `orders` CHANGE `total_amount` `original_amount` DECIMAL(10,2) NULL DEFAULT NULL;
ALTER TABLE `orders` ADD `discounted_amount` DECIMAL(10,2) NULL DEFAULT NULL AFTER `original_amount`;
ALTER TABLE `orders` ADD `discount` DECIMAL(10,2) NULL DEFAULT NULL AFTER `discounted_amount`;

ALTER TABLE `order_details` ADD `attempt_id` INT NULL DEFAULT NULL AFTER `product_id`, ADD `video_delivery_type_id` INT NULL DEFAULT NULL AFTER `attempt_id`, ADD `book_delivery_type_id` INT NULL DEFAULT NULL AFTER `video_delivery_type_id`;
ALTER TABLE `orders` CHANGE `order_no` `order_no` VARCHAR(255) NULL DEFAULT NULL;

31-7-2020

ALTER TABLE users
ADD is_teacher_password_mail_sent tinyint(4) COMMENT '0-not sent,1-sent'
AFTER is_product_mail_sent;

ALTER TABLE `users` CHANGE `is_teacher_password_mail_sent` `is_teacher_password_mail_sent` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '0-not sent,1-sent';

05-08-2020
ALTER TABLE `address` DROP `type`;
  ALTER TABLE `address` ADD `is_primary` TINYINT NOT NULL DEFAULT '0' COMMENT '0-no, 1-yes' AFTER `pin_code`;

  ALTER TABLE `address` DROP `is_primary`;
  ALTER TABLE `address` ADD `type` ENUM('shipping', 'billing') NULL DEFAULT NULL AFTER `pin_code`;
  ALTER TABLE `address` ADD `deleted_at` TIMESTAMP NULL DEFAULT NULL AFTER `type`;
  ALTER TABLE `address` ADD `same_as_billing` TINYINT NOT NULL DEFAULT '0' COMMENT '\'1- yes, 0- no| for shipping address to be same as billing address\'' AFTER `type`;
  ALTER TABLE `address` DROP `same_as_billing`;
  ALTER TABLE `address` ADD `different_ship_address` TINYINT NOT NULL DEFAULT '1' COMMENT '1- yes different, 0- not different | is the ship address different from billing address' AFTER `type`;


  05-08-2020
  ALTER TABLE `cart` DROP `price`;
  ALTER TABLE `cart` ADD `quantity` INT NULL DEFAULT NULL AFTER `attempt_id`;

  07-08-2020
  ALTER TABLE `users` ADD `dob` DATE NULL AFTER phone;

  10-08-2020
  ALTER TABLE `orders`  ADD `bill_address` TEXT NULL DEFAULT NULL  AFTER `rzp_order_id`,  ADD `bill_address_apartment` VARCHAR(255) NULL DEFAULT NULL  AFTER `bill_address`,  ADD `bill_address_city` VARCHAR(255) NULL DEFAULT NULL  AFTER `bill_address_apartment`,  ADD `bill_address_pincode` VARCHAR(10) NULL DEFAULT NULL  AFTER `bill_address_city`,  ADD `bill_address_state_id` INT NULL DEFAULT NULL  AFTER `bill_address_pincode`,  ADD `bill_address_country_id` INT NULL DEFAULT NULL  AFTER `bill_address_state_id`,  ADD `ship_address` TEXT NULL DEFAULT NULL  AFTER `bill_address_country_id`,  ADD `ship_address_apartment` VARCHAR(255) NULL DEFAULT NULL  AFTER `ship_address`,  ADD `ship_address_city` VARCHAR(255) NULL DEFAULT NULL  AFTER `ship_address_apartment`,  ADD `ship_address_pincode` VARCHAR(10) NULL DEFAULT NULL  AFTER `ship_address_city`,  ADD `ship_address_state_id` INT NULL DEFAULT NULL  AFTER `ship_address_pincode`,  ADD `ship_address_country_id` INT NULL DEFAULT NULL  AFTER `ship_address_state_id`;

  ALTER TABLE `order_details` ADD `product_name` VARCHAR(255) NULL DEFAULT NULL AFTER `price`, ADD `attempt_name` VARCHAR(100) NULL DEFAULT NULL AFTER `product_name`;

  ALTER TABLE `orders` DROP `address_id`;

  ALTER TABLE `orders` ADD `bill_address_id` INT NULL DEFAULT NULL AFTER `user_id`, ADD `ship_address_id` INT NULL DEFAULT NULL AFTER `bill_address_id`;


  ALTER TABLE `users` CHANGE `is_teacher_password_mail_sent` `is_teacher_password_mail_sent` TINYINT(4) NULL DEFAULT '0' COMMENT '0-not sent,1-sent';

  07-08-2020


  ALTER TABLE `dummy_videos` ADD `embed_link` TEXT NULL DEFAULT NULL AFTER `link`;
11-08-2020

ALTER TABLE address
ADD landmark TEXT NULL
AFTER pin_code;

UPDATE `mst_delivery_type` SET `name` = 'Google Drive Link' WHERE `mst_delivery_type`.`id` = 1;
UPDATE `mst_delivery_type` SET `name` = 'Pen Drive' WHERE `mst_delivery_type`.`id` = 2;
// done on server
UPDATE `mst_delivery_type` SET `name` = 'Printed Book' WHERE `mst_delivery_type`.`id` = 3;
ALTER TABLE `address` DROP `apartment`;

14-08-2020
UPDATE `mst_product_type` SET `name` = 'Printed Book' WHERE `mst_product_type`.`id` = 1;


ALTER TABLE `dummy_videos` CHANGE `product_id` `product_id` INT NULL DEFAULT NULL COMMENT 'PK of Product';
ALTER TABLE `mst_subject` ADD `image` TEXT NULL DEFAULT NULL AFTER `name`;

ALTER TABLE `orders`
  DROP `bill_address_apartment`,
  DROP `ship_address_apartment`;

  ALTER TABLE `orders` CHANGE `bill_address_state_id` `bill_address_state` VARCHAR(100) NULL DEFAULT NULL, CHANGE `bill_address_country_id` `bill_address_country` VARCHAR(100) NULL DEFAULT NULL, CHANGE `ship_address_state_id` `ship_address_state` VARCHAR(100) NULL DEFAULT NULL, CHANGE `ship_address_country_id` `ship_address_country_i` VARCHAR(100) NULL DEFAULT NULL;
  ALTER TABLE `orders` CHANGE `ship_address_country_i` `ship_address_country` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

  ALTER TABLE `orders` ADD `student_invoice_mail_sent` TINYINT NOT NULL DEFAULT '0' AFTER `ship_address_country`, ADD `teacher_invoice_mail_sent` TINYINT NOT NULL DEFAULT '0' AFTER `student_invoice_mail_sent`;
  ALTER TABLE `orders` CHANGE `student_invoice_mail_sent` `student_invoice_mail_sent` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '0-No, 1-Yes', CHANGE `teacher_invoice_mail_sent` `teacher_invoice_mail_sent` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '0-No, 1-Yes';

  ALTER TABLE `orders` ADD `invoice_number` VARCHAR(50) NULL DEFAULT NULL AFTER `ship_address_country`;

21-08-2020
ALTER TABLE orders
ADD bill_address_landmark VARCHAR(255)
AFTER bill_address_pincode;

ALTER TABLE orders
ADD ship_address_landmark VARCHAR(255)
AFTER ship_address_pincode;

24-08-2020
ALTER TABLE `users` CHANGE `role` `role` ENUM('super-admin','student','teacher') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'student';

ALTER TABLE orders
ADD different_ship_address TINYINT(4) DEFAULT 1 COMMENT "1- yes different, 0- not different | is the ship address different from billing address"
AFTER bill_address_country;

ALTER TABLE `orders` CHANGE `different_ship_address` `different_ship_address` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '1- yes different, 0- not different | is the ship address different from billing address';

25-08-2020
ALTER TABLE `coupons` CHANGE `expiry_date` `expiry_date` DATE NULL DEFAULT NULL;



ALTER TABLE `books` ADD `is_printed` BOOLEAN NULL DEFAULT NULL AFTER `name`, ADD `is_ebook` BOOLEAN NULL DEFAULT NULL AFTER `is_printed`;

12-10-2020
ALTER TABLE order_details
ADD user_id INT(11) NULL COMMENT 'PK of users, also known as teacher id'
AFTER order_id;

22-10-2020
ALTER TABLE mst_subject
ADD paper_overview TEXT NULL
AFTER sort_order;

ALTER TABLE mst_subject
ADD paper_syllabus TEXT NULL
AFTER paper_overview;