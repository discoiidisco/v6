ALTER TABLE `CubeCart_email_content` ADD `status` ENUM('1','0') NOT NULL DEFAULT '1' AFTER `content_id`; #EOQ
ALTER TABLE `CubeCart_email_content` ADD INDEX(`status`); #EOQ
ALTER TABLE `CubeCart_seo_urls` ADD `redirect` ENUM('0','301','302') NOT NULL DEFAULT '0' AFTER `custom`; #EOQ
ALTER TABLE `CubeCart_seo_urls` ADD INDEX(`redirect`); #EOQ