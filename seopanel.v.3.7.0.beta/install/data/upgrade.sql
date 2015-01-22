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

