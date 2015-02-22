--
-- Seo Panel 3.7.0 changes
--

ALTER TABLE `searchresults` ADD `result_date` DATE NULL , ADD INDEX ( `result_date` );
UPDATE `searchresults` SET `result_date` = FROM_UNIXTIME(time, '%Y-%m-%d'); 

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) 
VALUES ('Maximum number of proxies used in single execution', 'CHECK_MAX_PROXY_COUNT_IF_FAILED', '3', 'proxy', 'small', '1');

INSERT INTO `settings` (`set_label`, `set_name`, `set_val`, `set_category`, `set_type`, `display`) 
VALUES ('API Secret', 'API_SECRET', '', 'api', 'medium', '1');

UPDATE `settings` SET `set_category` = 'proxy' WHERE set_name='SP_ENABLE_PROXY';
UPDATE `settings` SET `set_category` = 'report' WHERE set_name='SP_CRAWL_DELAY';
UPDATE `settings` SET `set_category` = 'report' WHERE set_name='SP_USER_GEN_REPORT';
UPDATE `settings` SET `set_category` = 'report' WHERE set_name='SP_USER_AGENT';

UPDATE `settings` SET `set_category` = 'api' WHERE set_name='SP_API_KEY';

UPDATE `settings` SET `set_val` = '0' WHERE set_name='SP_USER_REGISTRATION';

INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES 
('en', 'settings', 'CHECK_MAX_PROXY_COUNT_IF_FAILED', 'Maximum number of proxies used in single execution');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES 
('en', 'settings', 'API_SECRET', 'API Secret');


INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES 
('en', 'panel', 'API Settings', 'API Settings');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES 
('en', 'panel', 'API Manager', 'API Manager');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES 
('en', 'panel', 'API Connection', 'API Connection');

INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES 
('en', 'api', 'API Url', 'API Url');

INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'panel', 'User Type Manager', 'User Type Manager');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'panel', 'New User Type', 'New User Type');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'common', 'User Type', 'User Type');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'common', 'Keywords Count', 'Keywords Count');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'common', 'Websites Count', 'Websites Count');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'common', 'Price', 'Price');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'common', 'New User Type', 'New User Type');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'common', 'Edit User Type', 'Edit User Type');
INSERT INTO texts(`lang_code`, `category`, `label`, `content`) VALUES  ('en', 'website', 'User Type already exist', 'User Type already exist');

ALTER TABLE usertypes ADD num_websites int(4), ADD num_keywords int(4), ADD price float, ADD status tinyint(4) DEFAULT 1;

ALTER TABLE `directories`  ADD `is_reciprocal` TINYINT(1) NOT NULL DEFAULT '0';