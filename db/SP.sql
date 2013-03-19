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
SELECT s.`movie_id`, s.`room_id`, s.`show_time` FROM `shows` AS s
JOIN `movies` AS m ON s.`movie_id` = m.`id`
WHERE m.`class` LIKE '%movie_now_showing%'
ORDER BY s.`movie_id`, s.`room_id`, s.`show_time`;
END //
DELIMITER ;
-- DROP PROCEDURE selectShow;
DELIMITER //
CREATE PROCEDURE selectShow(IN movie_id INT, IN room_id VARCHAR(5), IN show_time DATETIME)
BEGIN
SELECT s.`movie_id`, m.`title` AS `movie_title`, m.`alias` AS `movie_alias`, s.`room_id`, s.`show_time` FROM `shows` AS s
JOIN `movies` AS m ON s.`movie_id` = m.`id`
WHERE m.`class` LIKE '%movie_now_showing%' AND m.`id` = movie_id AND s.`room_id` = room_id AND s.`show_time` = show_time
ORDER BY s.`movie_id`, s.`room_id`, s.`show_time`
LIMIT 1;
END //
DELIMITER ;

CALL selectMovies;
CALL selectMovieById(1);
CALL selectMoviesNowShowing;

CALL selectSchedules;
call selectShow(5, 'B1', '2013-03-16 10:00:00'); 

