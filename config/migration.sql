#r133
ALTER TABLE `newsletters` ADD `is_approved` TINYINT(1) NOT NULL default 0 AFTER `language_id`;

ALTER TABLE `newsletter_mailings` ADD `external_mail_group_id` VARCHAR( 40 ) NULL DEFAULT NULL AFTER `subscriber_group_id` ;
ALTER TABLE `newsletter_mailings` CHANGE `subscriber_group_id` `subscriber_group_id` INT UNSIGNED NULL DEFAULT NULL ;

#r171
ALTER TABLE `newsletters` DROP `date_published`;

#220
ALTER TABLE `subscribers` ADD `updated_by` INT UNSIGNED NOT NULL ,
ADD `updated_at` DATETIME NOT NULL;