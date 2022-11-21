CREATE TABLE `about_us` (
  `content_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `language_id` varchar(255) NOT NULL,
  `headline` text NOT NULL,
  `icon` text NOT NULL,
  `details` text NOT NULL,
  `status` int(11) NOT NULL
);
--sep
CREATE TABLE `about_us_v2` (
  `content_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `language_id` varchar(255) NOT NULL,
  `headline` text NOT NULL,
  `icon` text NOT NULL,
  `details` text NOT NULL,
  `status` int(11) NOT NULL
);
