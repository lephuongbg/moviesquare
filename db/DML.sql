USE `MovieSquare`;

SELECT * FROM `movies`;
SELECT * FROM `rooms`;
SELECT * FROM `shows`;
SELECT * FROM `orders`;

-- Insert 2 rooms B1 and B2
INSERT INTO `rooms`(`id`) VALUES ('B1');
INSERT INTO `rooms`(`id`) VALUES ('B2');
INSERT INTO `rooms`(`id`) VALUES ('B3');
INSERT INTO `rooms`(`id`) VALUES ('B4');
INSERT INTO `rooms`(`id`) VALUES ('B5');

-- Insert data for movies
INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('A Good Day to Die Hard', 'die_hard', 'movie_featured movie_now_showing', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Man of Steel', 'man_of_steel',  'movie_coming_soon', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Fast & Furious 6', 'fast_and_furious_6',  'movie_featured movie_coming_soon', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Iron Man 3', 'iron_man_3', 'movie_featured movie_coming_soon', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Jack the Giant Slayer', 'jack_the_giant_slayer', 'movie_now_showing',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Lincoln', 'lincoln', 'movie_featured movie_now_showing',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Silver Linings Playbook', 'silver_linings_playbook', 'movie_now_showing',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('The Last Stand', 'the_last_stand', 'movie_coming_soon',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Despicable Me 2', 'despicable_me_2', 'movie_featured movie_coming_soon',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('G.I. Joe Retaliation', 'gi_joe_retaliation', 'movie_featured movie_now_showing', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Les Miserables', 'les_miserables', 'movie_featured movie_now_showing', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Oblivion', 'oblivion', 'movie_featured movie_now_showing', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

INSERT INTO `movies`(`title`, `alias`, `class`, `short_description`, `description`)
VALUES ('Snitch', 'snitch', 'movie_coming_soon', 
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mi eget urna aliquet feugiat. Mauris dictum neque interdum elit interdum rhoncus. Nulla eros ante, venenatis vitae facilisis non, ultrices a lacus. Fusce malesuada metus volutpat quam congue fringilla sodales nulla ornare.', 
		' Nam at eros sit amet urna sagittis rutrum eu at nibh. Proin nec eros lorem. Maecenas vitae risus lectus, in dapibus turpis. Duis adipiscing malesuada libero, vitae viverra purus placerat et. Vestibulum sit amet euismod purus. Mauris eget lacus tortor. Donec id tellus ut elit tincidunt placerat sit amet ac libero. Morbi arcu sem, pulvinar id aliquam vitae, commodo nec nisi.
<br/>Ut in eleifend erat. Suspendisse est leo, volutpat ullamcorper tristique nec, malesuada non dolor. Proin diam elit, ultrices porttitor vulputate ac, tristique id turpis. Curabitur quis velit elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin sagittis nunc a mi placerat eget consectetur metus suscipit. Proin ac quam quis orci molestie vulputate. Vivamus faucibus urna sed urna ullamcorper gravida. Ut ornare condimentum massa, at sagittis ligula suscipit sed. ');

-- Insert data for show
-- 15/3
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B1','2013-3-15 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B1','2013-3-15 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B1','2013-3-15 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B2','2013-3-15 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B2','2013-3-15 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B2','2013-3-15 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B3','2013-3-15 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B3','2013-3-15 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B3','2013-3-15 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B4','2013-3-15 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B4','2013-3-15 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B4','2013-3-15 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B5','2013-3-15 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B5','2013-3-15 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B5','2013-3-15 20:00:00');


-- 16/3
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B1','2013-3-16 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B1','2013-3-16 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B2','2013-3-16 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B2','2013-3-16 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B2','2013-3-16 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B3','2013-3-16 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B3','2013-3-16 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B3','2013-3-16 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B4','2013-3-16 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B4','2013-3-16 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B4','2013-3-16 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B5','2013-3-16 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B5','2013-3-16 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B5','2013-3-16 20:00:00');

-- 17/3
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B1','2013-3-17 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B1','2013-3-17 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B1','2013-3-17 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B2','2013-3-17 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B2','2013-3-17 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B2','2013-3-17 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B3','2013-3-17 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B3','2013-3-17 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B3','2013-3-17 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B4','2013-3-17 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B4','2013-3-17 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B4','2013-3-17 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B5','2013-3-17 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B5','2013-3-17 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B5','2013-3-17 20:00:00');

-- 18/3
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B1','2013-3-18 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B1','2013-3-18 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B1','2013-3-18 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B2','2013-3-18 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B2','2013-3-18 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B2','2013-3-18 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B3','2013-3-18 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B3','2013-3-18 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B3','2013-3-18 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B4','2013-3-18 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B4','2013-3-18 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B4','2013-3-18 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B5','2013-3-18 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B5','2013-3-18 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B5','2013-3-18 20:00:00');

-- 19/3
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B1','2013-3-19 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B1','2013-3-19 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B1','2013-3-19 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B2','2013-3-19 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B2','2013-3-19 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B2','2013-3-19 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B3','2013-3-19 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B3','2013-3-19 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B3','2013-3-19 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B4','2013-3-19 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B4','2013-3-19 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B4','2013-3-19 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B5','2013-3-19 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B5','2013-3-19 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B5','2013-3-19 20:00:00');

-- 20/3
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B1','2013-3-20 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B1','2013-3-20 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B1','2013-3-20 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B2','2013-3-20 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B2','2013-3-20 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B2','2013-3-20 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B3','2013-3-20 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B3','2013-3-20 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B3','2013-3-20 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B4','2013-3-20 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B4','2013-3-20 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B4','2013-3-20 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B5','2013-3-20 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B5','2013-3-20 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B5','2013-3-20 20:00:00');

-- 21/3
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B1','2013-3-21 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B1','2013-3-21 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B1','2013-3-21 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B2','2013-3-21 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B2','2013-3-21 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B2','2013-3-21 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('12','B3','2013-3-21 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('11','B3','2013-3-21 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('5','B3','2013-3-21 20:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B4','2013-3-21 11:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('10','B4','2013-3-21 16:45:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B4','2013-3-21 21:30:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('7','B5','2013-3-21 10:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('1','B5','2013-3-21 14:00:00');
INSERT INTO `shows` (`movie_id`,`room_id`,`show_time`)
VALUES ('6','B5','2013-3-21 20:00:00');
