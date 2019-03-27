ALTER TABLE `CubeCart_email_content` ADD `status` ENUM('1','0') NOT NULL DEFAULT '1' AFTER `content_id`; #EOQ
ALTER TABLE `CubeCart_email_content` ADD INDEX(`status`); #EOQ