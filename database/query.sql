-- creating database
create DATABASE blog2;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `age` INT NOT NULL,
    `email` varchar(255) NOT NULL unique,
    `password` varchar(255) NOT NULL
);


--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `image` text ,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);


--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `post_id` INT UNSIGNED NOT NULL
);

--
-- Table structure for table `likes_comment`
--

CREATE TABLE `likes_comment` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `comment_id` INT UNSIGNED NOT NULL
);

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `post_id` INT UNSIGNED NOT NULL,
    `content` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);


--
-- Constraints for table `posts`
--
ALTER TABLE `posts` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD  FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD  FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);


--
-- Constraints for table `likes_comment`
--
ALTER TABLE `likes_comment`
  ADD  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD  FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);

--
-- add image to table `users`
--
ALTER TABLE `users`
  ADD user_image text;


-- insert data
--INSERT INTO `users`(`id`, `first_name`, `last_name`, `age`, `email`, `password`) VALUES (null,'elham','samir','5','elham@gmail.com','123456');
--k2INSERT INTO `users`(`id`, `first_name`, `last_name`, `age`, `email`, `password`) VALUES (null,'mahmoud','ali','20','mahmoud@gmail.com','123456');


--INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `image`, `created_at`) VALUES (NULL, 't1', 'cont1', '1', NULL, current_timestamp());

--INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES (NULL, '1', '1');

--INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`, `created_at`) VALUES (NULL, '2', '1', 'comment contenet 1', current_timestamp());

--INSERT INTO `likes_comment` (`id`, `user_id`, `comment_id`) VALUES (NULL, '1', '1');


-- mokaroo --

insert into users (id, first_name, last_name, email, age, password) values (1, 'Homer', 'Barthelmes', 'hbarthelmes0@admin.ch', 1, '750098');
insert into users (id, first_name, last_name, email, age, password) values (2, 'Lorelei', 'Everingham', 'leveringham1@state.gov', 2, '567398');
insert into users (id, first_name, last_name, email, age, password) values (3, 'Raymond', 'Deetlof', 'rdeetlof2@slideshare.net', 3, '987417');
insert into users (id, first_name, last_name, email, age, password) values (4, 'Ana', 'Franzettoini', 'afranzettoini3@smugmug.com', 4, '409388');
insert into users (id, first_name, last_name, email, age, password) values (5, 'Veronike', 'Boswell', 'vboswell4@freewebs.com', 5, '138250');
insert into users (id, first_name, last_name, email, age, password) values (6, 'Thibaut', 'Vannoort', 'tvannoort5@auda.org.au', 6, '137941');
insert into users (id, first_name, last_name, email, age, password) values (7, 'Letty', 'Idell', 'lidell6@sitemeter.com', 7, '034592');
insert into users (id, first_name, last_name, email, age, password) values (8, 'Rea', 'Vondracek', 'rvondracek7@printfriendly.com', 8, '802313');
insert into users (id, first_name, last_name, email, age, password) values (9, 'Waylan', 'Lammerich', 'wlammerich8@businessinsider.com', 9, '612961');
insert into users (id, first_name, last_name, email, age, password) values (10, 'Derril', 'Brasier', 'dbrasier9@illinois.edu', 10, '311026');
insert into users (id, first_name, last_name, email, age, password) values (11, 'Salmon', 'Danelet', 'sdaneleta@blog.com', 11, '531607');
insert into users (id, first_name, last_name, email, age, password) values (12, 'Murdoch', 'Hardware', 'mhardwareb@illinois.edu', 12, '864159');
insert into users (id, first_name, last_name, email, age, password) values (13, 'Merry', 'Vedyasov', 'mvedyasovc@google.com.br', 13, '720157');
insert into users (id, first_name, last_name, email, age, password) values (14, 'Hamish', 'Adolthine', 'hadolthined@wikia.com', 14, '610392');
insert into users (id, first_name, last_name, email, age, password) values (15, 'Massimo', 'Delgado', 'mdelgadoe@webs.com', 15, '237993');
insert into users (id, first_name, last_name, email, age, password) values (16, 'Lianne', 'Vaggs', 'lvaggsf@merriam-webster.com', 16, '657092');
insert into users (id, first_name, last_name, email, age, password) values (17, 'Sher', 'Houltham', 'shoulthamg@bbb.org', 17, '402690');
insert into users (id, first_name, last_name, email, age, password) values (18, 'Cherilynn', 'Tournie', 'ctournieh@google.co.jp', 18, '844015');
insert into users (id, first_name, last_name, email, age, password) values (19, 'Clint', 'Reynoollds', 'creynoolldsi@yale.edu', 19, '720132');
insert into users (id, first_name, last_name, email, age, password) values (20, 'Orelee', 'Buglar', 'obuglarj@jimdo.com', 20, '037961');





insert into posts (id, title, content, user_id) values (1, 'Dental Hygienist', 'Nondisp seg fx shaft of l tibia, 7thF', 10);
insert into posts (id, title, content, user_id) values (2, 'Structural Analysis Engineer', 'Unspecified subluxation of left hip, initial encounter', 8);
insert into posts (id, title, content, user_id) values (3, 'Senior Quality Engineer', 'Burn first degree of unsp mult fngr, not inc thumb, sqla', 1);
insert into posts (id, title, content, user_id) values (4, 'Compensation Analyst', 'Complete lesion at C4 level of cervical spinal cord', 6);
insert into posts (id, title, content, user_id) values (5, 'Associate Professor', 'Burn due to unspecified watercraft on fire, subs encntr', 14);
insert into posts (id, title, content, user_id) values (6, 'Occupational Therapist', 'Occup of bus injured in collision w ped/anml nontraf, subs', 19);
insert into posts (id, title, content, user_id) values (7, 'Clinical Specialist', 'Other subluxation of right knee, subsequent encounter', 6);
insert into posts (id, title, content, user_id) values (8, 'Occupational Therapist', 'Inj extensor musc/fasc/tend l rng fngr at forarm lv, subs', 8);
insert into posts (id, title, content, user_id) values (9, 'VP Sales', 'Disloc of distal interphaln joint of left thumb, sequela', 10);
insert into posts (id, title, content, user_id) values (10, 'Senior Developer', 'Displaced bimalleolar fracture of unsp lower leg, init', 3);
insert into posts (id, title, content, user_id) values (11, 'Social Worker', 'Fx unsp part of scapula, l shoulder, init for opn fx', 14);
insert into posts (id, title, content, user_id) values (12, 'Quality Control Specialist', 'Other specified nonscarring hair loss', 10);
insert into posts (id, title, content, user_id) values (13, 'Nurse Practicioner', 'Chronic osteomyelitis with draining sinus, left shoulder', 9);
insert into posts (id, title, content, user_id) values (14, 'Analog Circuit Design manager', 'Disp fx of intermediate cuneiform of left foot, sequela', 3);
insert into posts (id, title, content, user_id) values (15, 'Mechanical Systems Engineer', 'Oth fx fifth MC bone, right hand, subs for fx w malunion', 8);
insert into posts (id, title, content, user_id) values (16, 'Structural Engineer', 'Other injury of uterus, sequela', 6);
insert into posts (id, title, content, user_id) values (17, 'Marketing Assistant', 'Displaced transverse fracture of shaft of unsp ulna, sequela', 14);
insert into posts (id, title, content, user_id) values (18, 'Professor', 'Maternal care for (suspected) cnsl malform in fetus, oth', 2);
insert into posts (id, title, content, user_id) values (19, 'General Manager', 'Unstable burst fracture of T7-T8 vertebra', 12);
insert into posts (id, title, content, user_id) values (20, 'Payment Adjustment Coordinator', 'Burn 1st deg mult sites of right lower limb, ex ank/ft, init', 3);
insert into posts (id, title, content, user_id) values (21, 'Computer Systems Analyst I', 'Sltr-haris Type III physeal fx lower end of humer, right arm', 19);
insert into posts (id, title, content, user_id) values (22, 'Staff Scientist', 'Nondisp commnt fx shaft of l femr, 7thR', 1);
insert into posts (id, title, content, user_id) values (23, 'Statistician I', 'Unspecified disorder of synovium and tendon, right forearm', 8);
insert into posts (id, title, content, user_id) values (24, 'Research Nurse', 'Displ bimalleol fx l low leg, subs for clos fx w nonunion', 9);
insert into posts (id, title, content, user_id) values (25, 'Environmental Specialist', 'Inj unsp musc/fasc/tend at wrs/hnd lv, left hand, init', 12);
insert into posts (id, title, content, user_id) values (26, 'Speech Pathologist', 'Corrosion of second degree of right ankle', 9);
insert into posts (id, title, content, user_id) values (27, 'Editor', 'Burn of first degree of right knee, initial encounter', 10);
insert into posts (id, title, content, user_id) values (28, 'Project Manager', 'Myositis ossificans progressiva, unspecified site', 2);
insert into posts (id, title, content, user_id) values (29, 'Civil Engineer', 'Person outsd 3-whl mv inj in clsn w 2/3-whl mv nontraf, init', 4);
insert into posts (id, title, content, user_id) values (30, 'Desktop Support Technician', 'Maternal care for prolapse of gravid uterus, third trimester', 2);


insert into comments (id, post_id, content, user_id) values (1, 4, 'Driver of snowmobile injured in nontraffic accident, init', 9);
insert into comments (id, post_id, content, user_id) values (2, 7, 'Infect/inflm reaction due to int fix of left fibula, sequela', 9);
insert into comments (id, post_id, content, user_id) values (3, 4, 'Disp fx of trapezium, unsp wrist, subs for fx w nonunion', 12);
insert into comments (id, post_id, content, user_id) values (4, 19, 'Laceration of musc/tend the rotator cuff of left shoulder', 3);
insert into comments (id, post_id, content, user_id) values (5, 7, 'Nondisp fx of capitate bone, r wrist, subs for fx w malunion', 4);
insert into comments (id, post_id, content, user_id) values (6, 12, 'Intermittent monocular esotropia, left eye', 12);
insert into comments (id, post_id, content, user_id) values (7, 2, 'Poisn by antivaric drugs, inc scler agents, self-harm, subs', 8);
insert into comments (id, post_id, content, user_id) values (8, 12, 'Toxic effect of venom of black widow spider, self-harm, init', 1);
insert into comments (id, post_id, content, user_id) values (9, 1, 'Mtrcy driver injured in collision w 2/3-whl mv nontraf, init', 2);
insert into comments (id, post_id, content, user_id) values (10, 3, 'Chronic gout due to renal impairment, vertebrae, with tophus', 3);
insert into comments (id, post_id, content, user_id) values (11, 8, 'Legal intervnt w oth gas, law enforc offl injured, subs', 9);
insert into comments (id, post_id, content, user_id) values (12, 2, 'Primary optic atrophy, right eye', 9);
insert into comments (id, post_id, content, user_id) values (13, 6, 'Traum subrac hem w LOC of 6 hours to 24 hours, sequela', 19);
insert into comments (id, post_id, content, user_id) values (14, 12, 'Unspecified superficial injury of hip and thigh', 2);
insert into comments (id, post_id, content, user_id) values (15, 19, 'Paratyphoid fever, unspecified', 8);
insert into comments (id, post_id, content, user_id) values (16, 8, 'Tuberculosis of genitourinary system', 14);
insert into comments (id, post_id, content, user_id) values (17, 5, 'Passngr off-road veh injured in traffic accident', 5);
insert into comments (id, post_id, content, user_id) values (18, 3, 'Displ seg fx shaft of ulna, l arm, init for opn fx type I/2', 8);
insert into comments (id, post_id, content, user_id) values (19, 7, 'Sltr-haris Type III physl fx low end humer, right arm, sqla', 7);
insert into comments (id, post_id, content, user_id) values (20, 14, 'Traum rupture of unsp ligmt of r little finger at MCP/IP jt', 12);
insert into comments (id, post_id, content, user_id) values (21, 3, 'Unsp pedl cyclst inj in clsn w rail trn/veh nontraf, init', 2);
insert into comments (id, post_id, content, user_id) values (22, 3, 'Unsp foreign body in trachea causing other injury, sequela', 1);
insert into comments (id, post_id, content, user_id) values (23, 9, 'Pasngr on bus injured pick-up truck, pk-up/van nontraf, init', 9);
insert into comments (id, post_id, content, user_id) values (24, 2, 'Mycetoma', 5);
insert into comments (id, post_id, content, user_id) values (25, 5, 'Partial traumatic amputation of right midfoot, sequela', 3);
insert into comments (id, post_id, content, user_id) values (26, 19, 'Benign neoplasm of liver', 14);
insert into comments (id, post_id, content, user_id) values (27, 6, 'Leakage of unspecified vascular graft, initial encounter', 9);
insert into comments (id, post_id, content, user_id) values (28, 5, 'Burn of unsp degree of right hand, unspecified site, sequela', 12);
insert into comments (id, post_id, content, user_id) values (29, 6, 'Infection and inflammatory reaction due to insulin pump', 12);
insert into comments (id, post_id, content, user_id) values (30, 14, 'Malocclusion, Angle''s class, unspecified', 2);
insert into comments (id, post_id, content, user_id) values (31, 10, 'Rheumatoid polyneuropathy with rheumatoid arthritis of elbow', 8);
insert into comments (id, post_id, content, user_id) values (32, 4, 'Corrosion of unsp degree of shldr/up lmb, except wrs/hnd', 14);
insert into comments (id, post_id, content, user_id) values (33, 19, 'Disp fx of low epiphy (separation) of unsp femr, 7thQ', 12);
insert into comments (id, post_id, content, user_id) values (34, 7, 'Crepitant synovitis (acute) (chronic), left hand', 14);
insert into comments (id, post_id, content, user_id) values (35, 9, 'Occup of dune buggy injured in nontraffic accident, sequela', 3);
insert into comments (id, post_id, content, user_id) values (36, 8, 'Superficial foreign body of unsp back wall of thorax, init', 10);
insert into comments (id, post_id, content, user_id) values (37, 10, 'Laceration with foreign body of unspecified forearm, sequela', 14);
insert into comments (id, post_id, content, user_id) values (38, 6, 'Nondisp fx of coronoid pro of unsp ulna, 7thB', 12);
insert into comments (id, post_id, content, user_id) values (39, 10, 'Corneal staphyloma, bilateral', 19);
insert into comments (id, post_id, content, user_id) values (40, 8, 'Other mechanical complication of other urinary catheter', 8);


insert into likes (id, post_id, user_id) values (1, 9, 4);
insert into likes (id, post_id, user_id) values (2, 10, 6);
insert into likes (id, post_id, user_id) values (3, 4, 8);
insert into likes (id, post_id, user_id) values (4, 5, 12);
insert into likes (id, post_id, user_id) values (5, 7, 7);
insert into likes (id, post_id, user_id) values (6, 19, 6);
insert into likes (id, post_id, user_id) values (7, 4, 8);
insert into likes (id, post_id, user_id) values (8, 14, 3);
insert into likes (id, post_id, user_id) values (9, 6, 2);
insert into likes (id, post_id, user_id) values (10, 5, 4);
insert into likes (id, post_id, user_id) values (11, 4, 2);
insert into likes (id, post_id, user_id) values (12, 12, 5);
insert into likes (id, post_id, user_id) values (13, 8, 19);
insert into likes (id, post_id, user_id) values (14, 10, 8);
insert into likes (id, post_id, user_id) values (15, 2, 7);
insert into likes (id, post_id, user_id) values (16, 7, 4);
insert into likes (id, post_id, user_id) values (17, 12, 19);
insert into likes (id, post_id, user_id) values (18, 2, 14);
insert into likes (id, post_id, user_id) values (19, 2, 5);
insert into likes (id, post_id, user_id) values (20, 8, 2);
insert into likes (id, post_id, user_id) values (21, 2, 2);
insert into likes (id, post_id, user_id) values (22, 10, 4);
insert into likes (id, post_id, user_id) values (23, 9, 7);
insert into likes (id, post_id, user_id) values (24, 10, 3);
insert into likes (id, post_id, user_id) values (25, 1, 3);
insert into likes (id, post_id, user_id) values (26, 6, 2);
insert into likes (id, post_id, user_id) values (27, 19, 3);
insert into likes (id, post_id, user_id) values (28, 19, 6);
insert into likes (id, post_id, user_id) values (29, 3, 6);
insert into likes (id, post_id, user_id) values (30, 9, 4);
insert into likes (id, post_id, user_id) values (31, 5, 6);
insert into likes (id, post_id, user_id) values (32, 4, 19);
insert into likes (id, post_id, user_id) values (33, 8, 1);
insert into likes (id, post_id, user_id) values (34, 6, 9);
insert into likes (id, post_id, user_id) values (35, 7, 3);
insert into likes (id, post_id, user_id) values (36, 6, 12);
insert into likes (id, post_id, user_id) values (37, 7, 6);
insert into likes (id, post_id, user_id) values (38, 2, 14);
insert into likes (id, post_id, user_id) values (39, 7, 1);
insert into likes (id, post_id, user_id) values (40, 4, 4);







insert into likes_comment (id, comment_id, user_id) values (1, 9, 1);
insert into likes_comment (id, comment_id, user_id) values (2, 19, 8);
insert into likes_comment (id, comment_id, user_id) values (3, 2, 2);
insert into likes_comment (id, comment_id, user_id) values (4, 12, 3);
insert into likes_comment (id, comment_id, user_id) values (5, 1, 2);
insert into likes_comment (id, comment_id, user_id) values (6, 8, 12);
insert into likes_comment (id, comment_id, user_id) values (7, 3, 6);
insert into likes_comment (id, comment_id, user_id) values (8, 12, 10);
insert into likes_comment (id, comment_id, user_id) values (9, 14, 1);
insert into likes_comment (id, comment_id, user_id) values (10, 10, 7);
insert into likes_comment (id, comment_id, user_id) values (11, 9, 4);
insert into likes_comment (id, comment_id, user_id) values (12, 3, 14);
insert into likes_comment (id, comment_id, user_id) values (13, 10, 12);
insert into likes_comment (id, comment_id, user_id) values (14, 12, 4);
insert into likes_comment (id, comment_id, user_id) values (15, 1, 12);
insert into likes_comment (id, comment_id, user_id) values (16, 5, 2);
insert into likes_comment (id, comment_id, user_id) values (17, 6, 19);
insert into likes_comment (id, comment_id, user_id) values (18, 2, 2);
insert into likes_comment (id, comment_id, user_id) values (19, 7, 6);
insert into likes_comment (id, comment_id, user_id) values (20, 19, 12);
insert into likes_comment (id, comment_id, user_id) values (21, 1, 14);
insert into likes_comment (id, comment_id, user_id) values (22, 8, 5);
insert into likes_comment (id, comment_id, user_id) values (23, 4, 10);
insert into likes_comment (id, comment_id, user_id) values (24, 8, 1);
insert into likes_comment (id, comment_id, user_id) values (25, 6, 5);
insert into likes_comment (id, comment_id, user_id) values (26, 4, 8);
insert into likes_comment (id, comment_id, user_id) values (27, 8, 14);
insert into likes_comment (id, comment_id, user_id) values (28, 12, 7);
insert into likes_comment (id, comment_id, user_id) values (29, 5, 2);
insert into likes_comment (id, comment_id, user_id) values (30, 7, 7);
insert into likes_comment (id, comment_id, user_id) values (31, 14, 7);
insert into likes_comment (id, comment_id, user_id) values (32, 8, 4);
insert into likes_comment (id, comment_id, user_id) values (33, 6, 7);
insert into likes_comment (id, comment_id, user_id) values (34, 12, 14);
insert into likes_comment (id, comment_id, user_id) values (35, 5, 6);
insert into likes_comment (id, comment_id, user_id) values (36, 12, 1);
insert into likes_comment (id, comment_id, user_id) values (37, 14, 6);
insert into likes_comment (id, comment_id, user_id) values (38, 5, 14);
insert into likes_comment (id, comment_id, user_id) values (39, 12, 10);
insert into likes_comment (id, comment_id, user_id) values (40, 7, 7);
