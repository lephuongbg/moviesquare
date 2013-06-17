-- DROP DATABASE `MovieSquare`;
CREATE DATABASE `MovieSquare` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `MovieSquare`;

CREATE TABLE `Movies` (
	`id` INT AUTO_INCREMENT PRIMARY KEY ,
	`alias` VARCHAR(64) UNIQUE NOT NULL ,
	`title` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`short_description` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci ,
	`description` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci ,
	/*`poster_portrait` VARCHAR(255) NULL ,
	`poster_landscape` VARCHAR(255) NULL ,
	`trailer_mp4` VARCHAR(255) NULL ,
	`trailer_webm` VARCHAR(255) NULL ,*/
	`class` VARCHAR(32) DEFAULT 'movie_coming_soon'
		CHECK (`class` = 'movie_coming_soon' OR `class` = 'movie_now_showing' 
			OR `class` = 'movie_featured movie_coming_soon'
			OR `class` = 'movie_featured movie_now_showing') -- class nay de su dung loc noi dung trong trang html
	/*`Link` VARCHAR(100) NULL -- Cai nay dung lam gi ? */
) ENGINE = INNODB ;

CREATE TABLE `Rooms` (
	`id` VARCHAR(5) PRIMARY KEY ,
	`description` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci ,
	`map` VARCHAR(10) DEFAULT 'big' CHECK (`map` = 'small' OR `map` = 'left_wing'
							OR `map` = 'right_wing' OR `map` = 'big') -- De don gian co the su dung 1 map duy nhat va bo cot nay di
) ENGINE = INNODB ;

CREATE TABLE `Shows` (
	`id` INT AUTO_INCREMENT PRIMARY KEY,
	`movie_id` INT NOT NULL ,
	`room_id` VARCHAR(5) NOT NULL ,
	`show_time` DATETIME NOT NULL ,
	`booked` TEXT DEFAULT '',  -- Thong tin nay se duoc luu duoi dang G6|G7|G8 de co the phan tich xem ghe nao da dat hay ghe nao chua
	UNIQUE (`room_id`, `show_time`)
) ENGINE = INNODB  ;

CREATE TABLE `Orders` (
	`id` INT AUTO_INCREMENT PRIMARY KEY,
	`status` VARCHAR(10) CHECK (`status` = 'pending' OR `status` = 'confirmed' OR `status` = 'canceled' OR `status` = 'done'),
	`show_id` INT NOT NULL ,
	`seats` TEXT NOT NULL , -- Thong tin nay se duoc luu duoi dang json
	`price` DECIMAL(10, 2) DEFAULT 0 NOT NULL , -- Thong tin nay co the tinh duoc nhung can luu lai de khong phai quay lai bang
												-- rooms de tinh lai gia tien theo ghe vip/ ghe thuong. Viec tinh toan se duoc
												-- thuc hien ngay khi luu vao db
	`customer` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
	`email` VARCHAR(64) NOT NULL ,
	`tel` VARCHAR(64) NOT NULL ,
	`payment` VARCHAR(10) CHECK (`payment` = 'visa' OR `payment` = 'ticket_booth' OR `payment` = 'delivery' OR `payment` = 'internet'),
	`card_no` VARCHAR(32) , -- Nhung thong tin nay co the NULL, chi bat buoc khi `payment` = 'visa'
	`card_name` VARCHAR(32) ,
	`card_cvv`  VARCHAR(32) ,
	`card_expired_date` DATE 
) ENGINE = INNODB ;


-- ALTER TABLE `show` ADD INDEX ( `FilmId` ); -- Khong nen add index o bang nay vi minh se insert rat nhieu data
-- ALTER TABLE `show` ADD INDEX ( `RoomNo` ); -- chi can PK la du
/*ALTER TABLE `Rooms` ADD FOREIGN KEY (`id`) REFERENCES `show` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE ;
ALTER TABLE `Movies` ADD FOREIGN KEY (`id`) REFERENCES `show` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE ;
ALTER TABLE `Shows` 
ADD FOREIGN KEY (`movie_id`, `room_id`, `time`) 
REFERENCES `Orders`(`movie_id`, `room_id`, `time`) 
ON DELETE CASCADE ON UPDATE CASCADE ;*/
-- Viec thuc su tao ra cac FOREIGN KEY cung nen can nhac vi tren thuc te co the bo cac cau lenh nay 
-- de giam chi phi duy tri db. 
-- Minh se tu them cac check rang buoc trong khi luu lai du lieu bang php.