USE `MovieSquare`;

DELIMITER //
CREATE PROCEDURE selectMovies()
BEGIN
SELECT `id`, `title`, `alias`, `class` FROM `movies`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectMovieById(IN movie_id INT)
BEGIN
SELECT * FROM `movies` WHERE `id` = movie_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectMoviesNowShowing()
BEGIN
SELECT `id`, `title`, `alias`, `class` FROM `movies` WHERE `class` LIKE '%movie_now_showing%';
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectSchedules()
BEGIN
SELECT s.`movie_id`, m.`title` AS `movie_title`, s.`room_id`, s.`show_time` FROM `shows` AS s
JOIN `movies` AS m ON s.`movie_id` = m.`id`
WHERE m.`class` LIKE '%movie_now_showing%'
ORDER BY s.`movie_id`, s.`room_id`, s.`show_time`;
END //
DELIMITER ;
-- DROP PROCEDURE selectShow;
DELIMITER //
CREATE PROCEDURE selectShow(IN movie_id INT, IN room_id VARCHAR(5), IN show_time DATETIME)
BEGIN
SELECT m.`title` AS `movie_title`, m.`alias` AS `movie_alias`, s.* FROM `shows` AS s
JOIN `movies` AS m ON s.`movie_id` = m.`id`
WHERE m.`class` LIKE '%movie_now_showing%' AND m.`id` = movie_id AND s.`room_id` = room_id AND s.`show_time` = show_time
ORDER BY s.`movie_id`, s.`room_id`, s.`show_time`
LIMIT 1;
END //
DELIMITER ;

-- DROP PROCEDURE selectShowsByMovieId;
DELIMITER //
CREATE PROCEDURE selectShowsByMovieId(IN movie_id INT)
BEGIN
/*SELECT  m.`id`, m.`title`, m.`alias`, DATE(s0.`show_time`) AS `show_date`, 
		s1.`room_id` AS `10:00`, s2.`room_id` AS `11:30`
FROM `movies` AS m
LEFT JOIN `shows` AS s0
ON m.`id` = s0.`movie_id`

LEFT JOIN `shows` AS s1
ON m.`id` = s1.`movie_id` AND s1.`show_time` LIKE '%10:00%'
LEFT JOIN `shows` AS s2
ON m.`id` = s2.`movie_id` AND s2.`show_time` LIKE '%11:30%';*/
-- "10:00", "11:30", "14:00", "16:45", "20:00", "21:30"
SELECT m.`id`, m.`title`, m.`alias`, DATE(s0.`show_time`) AS `show_date`,
s1.`room_id` AS `10:00`, s2.`room_id` AS `11:30`, s3.`room_id` AS `14:00`, s4.`room_id` AS `16:45`, s5.`room_id` AS `20:00`, s6.`room_id` AS `21:30` 
FROM `movies` AS m
LEFT JOIN `shows` AS s0
ON m.`id` = s0.`movie_id`

LEFT JOIN `shows` AS s1
ON m.`id` = s1.`movie_id` AND s1.`show_time` LIKE '%10:00%' AND DATE(s1.`show_time`) = DATE(s0.`show_time`)
LEFT JOIN `shows` AS s2
ON m.`id` = s2.`movie_id` AND s2.`show_time` LIKE '%11:30%' AND DATE(s2.`show_time`) = DATE(s0.`show_time`)
LEFT JOIN `shows` AS s3
ON m.`id` = s3.`movie_id` AND s3.`show_time` LIKE '%14:00%' AND DATE(s3.`show_time`) = DATE(s0.`show_time`)
LEFT JOIN `shows` AS s4
ON m.`id` = s4.`movie_id` AND s4.`show_time` LIKE '%16:45%' AND DATE(s4.`show_time`) = DATE(s0.`show_time`)
LEFT JOIN `shows` AS s5
ON m.`id` = s5.`movie_id` AND s5.`show_time` LIKE '%20:00%' AND DATE(s5.`show_time`) = DATE(s0.`show_time`)
LEFT JOIN `shows` AS s6
ON m.`id` = s6.`movie_id` AND s6.`show_time` LIKE '%21:30%' AND DATE(s6.`show_time`) = DATE(s0.`show_time`)

WHERE m.`class` LIKE '%movie_now_showing%' AND m.`id` = movie_id
GROUP BY `show_date`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectRooms()
BEGIN
SELECT * FROM `rooms`;
END //
DELIMITER ;

CALL selectMovies;
CALL selectMovieById(1);
CALL selectMoviesNowShowing;

CALL selectSchedules;
CALL selectShow(5, 'B2', '2013-03-15 20:00:00'); 
CALL selectShowsByMovieId(5);

CALL selectRooms;