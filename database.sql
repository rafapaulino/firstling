-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.35-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para firstling
CREATE DATABASE IF NOT EXISTS `firstling` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `firstling`;

-- Copiando estrutura para tabela firstling.ftwp_commentmeta
CREATE TABLE IF NOT EXISTS `ftwp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_commentmeta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ftwp_commentmeta` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_comments
CREATE TABLE IF NOT EXISTS `ftwp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_comments: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_comments` DISABLE KEYS */;
INSERT INTO `ftwp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
	(1, 1, 'Um comentarista do WordPress', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2019-03-18 10:00:06', '2019-03-18 13:00:06', 'Olá, isso é um comentário.\nPara começar a moderar, editar e excluir comentários, visite a tela de Comentários no painel.\nAvatares de comentaristas vêm a partir do <a href="https://gravatar.com">Gravatar</a>.', 0, '1', '', '', 0, 0);
/*!40000 ALTER TABLE `ftwp_comments` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_links
CREATE TABLE IF NOT EXISTS `ftwp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_links: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `ftwp_links` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_options
CREATE TABLE IF NOT EXISTS `ftwp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_options: ~142 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_options` DISABLE KEYS */;
INSERT INTO `ftwp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
	(1, 'siteurl', 'http://localhost:81/firstling', 'yes'),
	(2, 'home', 'http://localhost:81/firstling', 'yes'),
	(3, 'blogname', 'FirstLing', 'yes'),
	(4, 'blogdescription', 'Só mais um site WordPress', 'yes'),
	(5, 'users_can_register', '0', 'yes'),
	(6, 'admin_email', 'rafaclasses@gmail.com', 'yes'),
	(7, 'start_of_week', '0', 'yes'),
	(8, 'use_balanceTags', '0', 'yes'),
	(9, 'use_smilies', '1', 'yes'),
	(10, 'require_name_email', '1', 'yes'),
	(11, 'comments_notify', '1', 'yes'),
	(12, 'posts_per_rss', '10', 'yes'),
	(13, 'rss_use_excerpt', '0', 'yes'),
	(14, 'mailserver_url', 'mail.example.com', 'yes'),
	(15, 'mailserver_login', 'login@example.com', 'yes'),
	(16, 'mailserver_pass', 'password', 'yes'),
	(17, 'mailserver_port', '110', 'yes'),
	(18, 'default_category', '1', 'yes'),
	(19, 'default_comment_status', 'open', 'yes'),
	(20, 'default_ping_status', 'open', 'yes'),
	(21, 'default_pingback_flag', '1', 'yes'),
	(22, 'posts_per_page', '10', 'yes'),
	(23, 'date_format', 'j \\d\\e F \\d\\e Y', 'yes'),
	(24, 'time_format', 'H:i', 'yes'),
	(25, 'links_updated_date_format', 'j \\d\\e F \\d\\e Y, H:i', 'yes'),
	(26, 'comment_moderation', '0', 'yes'),
	(27, 'moderation_notify', '1', 'yes'),
	(28, 'permalink_structure', '/%postname%/', 'yes'),
	(29, 'rewrite_rules', 'a:86:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"([^/]+)/embed/?$";s:37:"index.php?name=$matches[1]&embed=true";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:24:"([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:22:"[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";}', 'yes'),
	(30, 'hack_file', '0', 'yes'),
	(31, 'blog_charset', 'UTF-8', 'yes'),
	(32, 'moderation_keys', '', 'no'),
	(33, 'active_plugins', 'a:1:{i:0;s:47:"regenerate-thumbnails/regenerate-thumbnails.php";}', 'yes'),
	(34, 'category_base', '', 'yes'),
	(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
	(36, 'comment_max_links', '2', 'yes'),
	(37, 'gmt_offset', '0', 'yes'),
	(38, 'default_email_category', '1', 'yes'),
	(39, 'recently_edited', '', 'no'),
	(40, 'template', 'firstling', 'yes'),
	(41, 'stylesheet', 'firstling', 'yes'),
	(42, 'comment_whitelist', '1', 'yes'),
	(43, 'blacklist_keys', '', 'no'),
	(44, 'comment_registration', '0', 'yes'),
	(45, 'html_type', 'text/html', 'yes'),
	(46, 'use_trackback', '0', 'yes'),
	(47, 'default_role', 'subscriber', 'yes'),
	(48, 'db_version', '44719', 'yes'),
	(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
	(50, 'upload_path', '', 'yes'),
	(51, 'blog_public', '1', 'yes'),
	(52, 'default_link_category', '2', 'yes'),
	(53, 'show_on_front', 'posts', 'yes'),
	(54, 'tag_base', '', 'yes'),
	(55, 'show_avatars', '1', 'yes'),
	(56, 'avatar_rating', 'G', 'yes'),
	(57, 'upload_url_path', '', 'yes'),
	(58, 'thumbnail_size_w', '150', 'yes'),
	(59, 'thumbnail_size_h', '150', 'yes'),
	(60, 'thumbnail_crop', '1', 'yes'),
	(61, 'medium_size_w', '300', 'yes'),
	(62, 'medium_size_h', '300', 'yes'),
	(63, 'avatar_default', 'mystery', 'yes'),
	(64, 'large_size_w', '1024', 'yes'),
	(65, 'large_size_h', '1024', 'yes'),
	(66, 'image_default_link_type', 'none', 'yes'),
	(67, 'image_default_size', '', 'yes'),
	(68, 'image_default_align', '', 'yes'),
	(69, 'close_comments_for_old_posts', '0', 'yes'),
	(70, 'close_comments_days_old', '14', 'yes'),
	(71, 'thread_comments', '1', 'yes'),
	(72, 'thread_comments_depth', '5', 'yes'),
	(73, 'page_comments', '0', 'yes'),
	(74, 'comments_per_page', '50', 'yes'),
	(75, 'default_comments_page', 'newest', 'yes'),
	(76, 'comment_order', 'asc', 'yes'),
	(77, 'sticky_posts', 'a:0:{}', 'yes'),
	(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:1;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
	(79, 'widget_text', 'a:0:{}', 'yes'),
	(80, 'widget_rss', 'a:0:{}', 'yes'),
	(81, 'uninstall_plugins', 'a:0:{}', 'no'),
	(82, 'timezone_string', 'America/Sao_Paulo', 'yes'),
	(83, 'page_for_posts', '0', 'yes'),
	(84, 'page_on_front', '0', 'yes'),
	(85, 'default_post_format', '0', 'yes'),
	(86, 'link_manager_enabled', '0', 'yes'),
	(87, 'finished_splitting_shared_terms', '1', 'yes'),
	(88, 'site_icon', '0', 'yes'),
	(89, 'medium_large_size_w', '768', 'yes'),
	(90, 'medium_large_size_h', '0', 'yes'),
	(91, 'wp_page_for_privacy_policy', '3', 'yes'),
	(92, 'show_comments_cookies_opt_in', '1', 'yes'),
	(93, 'initial_db_version', '44719', 'yes'),
	(94, 'ftwp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
	(95, 'fresh_site', '0', 'yes'),
	(96, 'WPLANG', 'pt_BR', 'yes'),
	(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
	(98, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
	(99, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
	(100, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
	(101, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
	(102, 'sidebars_widgets', 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:11:"top-sidebar";a:1:{i:0;s:16:"top-social-box-2";}s:12:"main-sidebar";a:5:{i:0;s:20:"social-sidebar-box-2";i:1;s:12:"search-box-2";i:2;s:18:"popular-news-box-2";i:3;s:16:"categories-box-2";i:4;s:10:"tags-box-2";}s:13:"array_version";i:3;}', 'yes'),
	(103, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(104, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(105, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(106, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(107, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(108, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(109, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(110, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(111, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(112, 'cron', 'a:6:{i:1555509610;a:1:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}}i:1555549210;a:1:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1555549211;a:2:{s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1555592418;a:2:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1555592421;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
	(113, 'theme_mods_twentynineteen', 'a:2:{s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1552914040;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes'),
	(115, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:65:"https://downloads.wordpress.org/release/pt_BR/wordpress-5.1.1.zip";s:6:"locale";s:5:"pt_BR";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:65:"https://downloads.wordpress.org/release/pt_BR/wordpress-5.1.1.zip";s:10:"no_content";b:0;s:11:"new_bundled";b:0;s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"5.1.1";s:7:"version";s:5:"5.1.1";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"5.0";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1555507427;s:15:"version_checked";s:5:"5.1.1";s:12:"translations";a:0:{}}', 'no'),
	(120, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1555507428;s:7:"checked";a:4:{s:9:"firstling";s:5:"2.3.0";s:14:"twentynineteen";s:3:"1.3";s:15:"twentyseventeen";s:3:"2.1";s:13:"twentysixteen";s:3:"1.9";}s:8:"response";a:0:{}s:12:"translations";a:0:{}}', 'no'),
	(128, 'can_compress_scripts', '1', 'no'),
	(143, 'current_theme', 'Odin', 'yes'),
	(144, 'theme_mods_firstling', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:2:{s:9:"main-menu";i:2;s:11:"footer-menu";i:3;}s:18:"custom_css_post_id";i:-1;}', 'yes'),
	(145, 'theme_switched', '', 'yes'),
	(146, 'widget_odin_facebook_like_box', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
	(182, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
	(219, '_site_transient_timeout_browser_eb9c1268a950e6eddb2708071f6b0d52', '1555529290', 'no'),
	(220, '_site_transient_browser_eb9c1268a950e6eddb2708071f6b0d52', 'a:10:{s:4:"name";s:6:"Chrome";s:7:"version";s:12:"73.0.3683.86";s:8:"platform";s:7:"Windows";s:10:"update_url";s:29:"https://www.google.com/chrome";s:7:"img_src";s:43:"http://s.w.org/images/browsers/chrome.png?1";s:11:"img_src_ssl";s:44:"https://s.w.org/images/browsers/chrome.png?1";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;s:6:"mobile";b:0;}', 'no'),
	(221, '_site_transient_timeout_php_check_20c231c3d6703efba5d948822e1d1da6', '1555529292', 'no'),
	(222, '_site_transient_php_check_20c231c3d6703efba5d948822e1d1da6', 'a:5:{s:19:"recommended_version";s:3:"7.3";s:15:"minimum_version";s:5:"5.2.4";s:12:"is_supported";b:1;s:9:"is_secure";b:1;s:13:"is_acceptable";b:1;}', 'no'),
	(232, 'widget_popular-news-box', 'a:2:{i:2;a:2:{s:18:"popular_news_total";s:1:"5";s:18:"popular_news_title";s:19:"Notícias Populares";}s:12:"_multiwidget";i:1;}', 'yes'),
	(239, 'category_children', 'a:0:{}', 'yes'),
	(243, 'widget_categories-box', 'a:2:{i:2;a:1:{s:16:"categories_title";s:10:"Categorias";}s:12:"_multiwidget";i:1;}', 'yes'),
	(248, 'widget_search-box', 'a:2:{i:2;a:1:{s:17:"search_form_title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
	(250, '_site_transient_timeout_browser_127868b9556d0b73282ae4585eb3c66a', '1555697094', 'no'),
	(251, '_site_transient_browser_127868b9556d0b73282ae4585eb3c66a', 'a:10:{s:4:"name";s:6:"Chrome";s:7:"version";s:13:"73.0.3683.103";s:8:"platform";s:7:"Windows";s:10:"update_url";s:29:"https://www.google.com/chrome";s:7:"img_src";s:43:"http://s.w.org/images/browsers/chrome.png?1";s:11:"img_src_ssl";s:44:"https://s.w.org/images/browsers/chrome.png?1";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;s:6:"mobile";b:0;}', 'no'),
	(252, 'widget_social-sidebar-box', 'a:2:{i:2;a:17:{s:20:"social_sidebar_title";s:13:"Redes Sociais";s:21:"social_sidebar_icon_1";s:8:"facebook";s:21:"social_sidebar_link_1";s:25:"https://www.facebook.com/";s:21:"social_sidebar_icon_2";s:7:"youtube";s:21:"social_sidebar_link_2";s:22:"http://www.youtube.com";s:21:"social_sidebar_icon_3";s:7:"twitter";s:21:"social_sidebar_link_3";s:22:"http://www.twitter.com";s:21:"social_sidebar_icon_4";s:9:"instagram";s:21:"social_sidebar_link_4";s:24:"http://www.instagram.com";s:21:"social_sidebar_icon_5";s:8:"whatsapp";s:21:"social_sidebar_link_5";s:26:"http://www.whatsapp.com.br";s:21:"social_sidebar_icon_6";s:9:"pinterest";s:21:"social_sidebar_link_6";s:24:"http://www.pinterest.com";s:21:"social_sidebar_icon_7";s:8:"linkedin";s:21:"social_sidebar_link_7";s:23:"http://www.linkedin.com";s:21:"social_sidebar_icon_8";s:3:"rss";s:21:"social_sidebar_link_8";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
	(257, 'widget_top-social-box', 'a:2:{i:2;a:28:{s:18:"top_social_link_11";s:0:"";s:24:"top_social_link_title_11";s:0:"";s:18:"top_social_link_22";s:0:"";s:24:"top_social_link_title_22";s:0:"";s:18:"top_social_link_33";s:0:"";s:24:"top_social_link_title_33";s:0:"";s:25:"top_social_sidebar_icon_1";s:8:"facebook";s:25:"top_social_sidebar_link_1";s:23:"http://www.facebook.com";s:25:"top_social_sidebar_icon_2";s:7:"twitter";s:25:"top_social_sidebar_link_2";s:22:"http://www.twitter.com";s:25:"top_social_sidebar_icon_3";s:7:"youtube";s:25:"top_social_sidebar_link_3";s:22:"http://www.youtube.com";s:25:"top_social_sidebar_icon_4";s:9:"instagram";s:25:"top_social_sidebar_link_4";s:24:"http://www.instagram.com";s:25:"top_social_sidebar_icon_5";s:8:"whatsapp";s:25:"top_social_sidebar_link_5";s:26:"http://www.whatsapp.com.br";s:25:"top_social_sidebar_icon_6";s:9:"pinterest";s:25:"top_social_sidebar_link_6";s:24:"http://www.pinterest.com";s:25:"top_social_sidebar_icon_7";s:8:"linkedin";s:25:"top_social_sidebar_link_7";s:23:"http://www.linkedin.com";s:25:"top_social_sidebar_icon_8";s:3:"rss";s:25:"top_social_sidebar_link_8";s:0:"";s:17:"top_social_link_1";s:0:"";s:17:"top_social_link_2";s:21:"http://www.bol.com.br";s:17:"top_social_link_3";s:26:"http://www.rafapaulino.com";s:23:"top_social_link_title_1";s:0:"";s:23:"top_social_link_title_2";s:3:"bol";s:23:"top_social_link_title_3";s:4:"rafa";}s:12:"_multiwidget";i:1;}', 'yes'),
	(262, 'widget_tags-box', 'a:2:{i:2;a:1:{s:10:"tags_title";s:4:"Tags";}s:12:"_multiwidget";i:1;}', 'yes'),
	(273, '_transient_timeout_plugin_slugs', '1555593832', 'no'),
	(274, '_transient_plugin_slugs', 'a:3:{i:0;s:19:"akismet/akismet.php";i:1;s:9:"hello.php";i:2;s:47:"regenerate-thumbnails/regenerate-thumbnails.php";}', 'no'),
	(275, 'recently_activated', 'a:0:{}', 'yes'),
	(276, '_site_transient_timeout_poptags_40cd750bba9870f18aada2478b24840a', '1555518198', 'no'),
	(277, '_site_transient_poptags_40cd750bba9870f18aada2478b24840a', 'O:8:"stdClass":100:{s:6:"widget";a:3:{s:4:"name";s:6:"widget";s:4:"slug";s:6:"widget";s:5:"count";i:4572;}s:11:"woocommerce";a:3:{s:4:"name";s:11:"woocommerce";s:4:"slug";s:11:"woocommerce";s:5:"count";i:3390;}s:4:"post";a:3:{s:4:"name";s:4:"post";s:4:"slug";s:4:"post";s:5:"count";i:2618;}s:5:"admin";a:3:{s:4:"name";s:5:"admin";s:4:"slug";s:5:"admin";s:5:"count";i:2487;}s:5:"posts";a:3:{s:4:"name";s:5:"posts";s:4:"slug";s:5:"posts";s:5:"count";i:1914;}s:9:"shortcode";a:3:{s:4:"name";s:9:"shortcode";s:4:"slug";s:9:"shortcode";s:5:"count";i:1724;}s:8:"comments";a:3:{s:4:"name";s:8:"comments";s:4:"slug";s:8:"comments";s:5:"count";i:1720;}s:7:"twitter";a:3:{s:4:"name";s:7:"twitter";s:4:"slug";s:7:"twitter";s:5:"count";i:1465;}s:6:"images";a:3:{s:4:"name";s:6:"images";s:4:"slug";s:6:"images";s:5:"count";i:1433;}s:8:"facebook";a:3:{s:4:"name";s:8:"facebook";s:4:"slug";s:8:"facebook";s:5:"count";i:1424;}s:6:"google";a:3:{s:4:"name";s:6:"google";s:4:"slug";s:6:"google";s:5:"count";i:1423;}s:5:"image";a:3:{s:4:"name";s:5:"image";s:4:"slug";s:5:"image";s:5:"count";i:1360;}s:3:"seo";a:3:{s:4:"name";s:3:"seo";s:4:"slug";s:3:"seo";s:5:"count";i:1300;}s:7:"sidebar";a:3:{s:4:"name";s:7:"sidebar";s:4:"slug";s:7:"sidebar";s:5:"count";i:1291;}s:7:"gallery";a:3:{s:4:"name";s:7:"gallery";s:4:"slug";s:7:"gallery";s:5:"count";i:1137;}s:5:"email";a:3:{s:4:"name";s:5:"email";s:4:"slug";s:5:"email";s:5:"count";i:1101;}s:4:"page";a:3:{s:4:"name";s:4:"page";s:4:"slug";s:4:"page";s:5:"count";i:1091;}s:6:"social";a:3:{s:4:"name";s:6:"social";s:4:"slug";s:6:"social";s:5:"count";i:1054;}s:9:"ecommerce";a:3:{s:4:"name";s:9:"ecommerce";s:4:"slug";s:9:"ecommerce";s:5:"count";i:993;}s:5:"login";a:3:{s:4:"name";s:5:"login";s:4:"slug";s:5:"login";s:5:"count";i:925;}s:5:"links";a:3:{s:4:"name";s:5:"links";s:4:"slug";s:5:"links";s:5:"count";i:852;}s:7:"widgets";a:3:{s:4:"name";s:7:"widgets";s:4:"slug";s:7:"widgets";s:5:"count";i:843;}s:5:"video";a:3:{s:4:"name";s:5:"video";s:4:"slug";s:5:"video";s:5:"count";i:831;}s:8:"security";a:3:{s:4:"name";s:8:"security";s:4:"slug";s:8:"security";s:5:"count";i:779;}s:4:"spam";a:3:{s:4:"name";s:4:"spam";s:4:"slug";s:4:"spam";s:5:"count";i:728;}s:7:"content";a:3:{s:4:"name";s:7:"content";s:4:"slug";s:7:"content";s:5:"count";i:725;}s:10:"buddypress";a:3:{s:4:"name";s:10:"buddypress";s:4:"slug";s:10:"buddypress";s:5:"count";i:721;}s:6:"slider";a:3:{s:4:"name";s:6:"slider";s:4:"slug";s:6:"slider";s:5:"count";i:709;}s:10:"e-commerce";a:3:{s:4:"name";s:10:"e-commerce";s:4:"slug";s:10:"e-commerce";s:5:"count";i:699;}s:3:"rss";a:3:{s:4:"name";s:3:"rss";s:4:"slug";s:3:"rss";s:5:"count";i:697;}s:9:"analytics";a:3:{s:4:"name";s:9:"analytics";s:4:"slug";s:9:"analytics";s:5:"count";i:682;}s:5:"pages";a:3:{s:4:"name";s:5:"pages";s:4:"slug";s:5:"pages";s:5:"count";i:680;}s:5:"media";a:3:{s:4:"name";s:5:"media";s:4:"slug";s:5:"media";s:5:"count";i:664;}s:4:"form";a:3:{s:4:"name";s:4:"form";s:4:"slug";s:4:"form";s:5:"count";i:651;}s:6:"jquery";a:3:{s:4:"name";s:6:"jquery";s:4:"slug";s:6:"jquery";s:5:"count";i:651;}s:6:"search";a:3:{s:4:"name";s:6:"search";s:4:"slug";s:6:"search";s:5:"count";i:649;}s:4:"feed";a:3:{s:4:"name";s:4:"feed";s:4:"slug";s:4:"feed";s:5:"count";i:628;}s:4:"ajax";a:3:{s:4:"name";s:4:"ajax";s:4:"slug";s:4:"ajax";s:5:"count";i:618;}s:4:"menu";a:3:{s:4:"name";s:4:"menu";s:4:"slug";s:4:"menu";s:5:"count";i:616;}s:8:"category";a:3:{s:4:"name";s:8:"category";s:4:"slug";s:8:"category";s:5:"count";i:614;}s:5:"embed";a:3:{s:4:"name";s:5:"embed";s:4:"slug";s:5:"embed";s:5:"count";i:584;}s:10:"javascript";a:3:{s:4:"name";s:10:"javascript";s:4:"slug";s:10:"javascript";s:5:"count";i:569;}s:6:"editor";a:3:{s:4:"name";s:6:"editor";s:4:"slug";s:6:"editor";s:5:"count";i:566;}s:3:"css";a:3:{s:4:"name";s:3:"css";s:4:"slug";s:3:"css";s:5:"count";i:560;}s:4:"link";a:3:{s:4:"name";s:4:"link";s:4:"slug";s:4:"link";s:5:"count";i:559;}s:7:"youtube";a:3:{s:4:"name";s:7:"youtube";s:4:"slug";s:7:"youtube";s:5:"count";i:551;}s:12:"contact-form";a:3:{s:4:"name";s:12:"contact form";s:4:"slug";s:12:"contact-form";s:5:"count";i:537;}s:5:"share";a:3:{s:4:"name";s:5:"share";s:4:"slug";s:5:"share";s:5:"count";i:534;}s:5:"theme";a:3:{s:4:"name";s:5:"theme";s:4:"slug";s:5:"theme";s:5:"count";i:528;}s:7:"comment";a:3:{s:4:"name";s:7:"comment";s:4:"slug";s:7:"comment";s:5:"count";i:525;}s:10:"responsive";a:3:{s:4:"name";s:10:"responsive";s:4:"slug";s:10:"responsive";s:5:"count";i:521;}s:9:"dashboard";a:3:{s:4:"name";s:9:"dashboard";s:4:"slug";s:9:"dashboard";s:5:"count";i:514;}s:6:"custom";a:3:{s:4:"name";s:6:"custom";s:4:"slug";s:6:"custom";s:5:"count";i:508;}s:9:"affiliate";a:3:{s:4:"name";s:9:"affiliate";s:4:"slug";s:9:"affiliate";s:5:"count";i:500;}s:3:"ads";a:3:{s:4:"name";s:3:"ads";s:4:"slug";s:3:"ads";s:5:"count";i:499;}s:10:"categories";a:3:{s:4:"name";s:10:"categories";s:4:"slug";s:10:"categories";s:5:"count";i:494;}s:4:"tags";a:3:{s:4:"name";s:4:"tags";s:4:"slug";s:4:"tags";s:5:"count";i:475;}s:6:"button";a:3:{s:4:"name";s:6:"button";s:4:"slug";s:6:"button";s:5:"count";i:471;}s:4:"user";a:3:{s:4:"name";s:4:"user";s:4:"slug";s:4:"user";s:5:"count";i:469;}s:7:"contact";a:3:{s:4:"name";s:7:"contact";s:4:"slug";s:7:"contact";s:5:"count";i:466;}s:7:"payment";a:3:{s:4:"name";s:7:"payment";s:4:"slug";s:7:"payment";s:5:"count";i:466;}s:3:"api";a:3:{s:4:"name";s:3:"api";s:4:"slug";s:3:"api";s:5:"count";i:462;}s:6:"mobile";a:3:{s:4:"name";s:6:"mobile";s:4:"slug";s:6:"mobile";s:5:"count";i:454;}s:5:"users";a:3:{s:4:"name";s:5:"users";s:4:"slug";s:5:"users";s:5:"count";i:447;}s:6:"events";a:3:{s:4:"name";s:6:"events";s:4:"slug";s:6:"events";s:5:"count";i:429;}s:5:"photo";a:3:{s:4:"name";s:5:"photo";s:4:"slug";s:5:"photo";s:5:"count";i:428;}s:9:"slideshow";a:3:{s:4:"name";s:9:"slideshow";s:4:"slug";s:9:"slideshow";s:5:"count";i:419;}s:6:"photos";a:3:{s:4:"name";s:6:"photos";s:4:"slug";s:6:"photos";s:5:"count";i:418;}s:5:"stats";a:3:{s:4:"name";s:5:"stats";s:4:"slug";s:5:"stats";s:5:"count";i:415;}s:15:"payment-gateway";a:3:{s:4:"name";s:15:"payment gateway";s:4:"slug";s:15:"payment-gateway";s:5:"count";i:409;}s:10:"navigation";a:3:{s:4:"name";s:10:"navigation";s:4:"slug";s:10:"navigation";s:5:"count";i:406;}s:10:"statistics";a:3:{s:4:"name";s:10:"statistics";s:4:"slug";s:10:"statistics";s:5:"count";i:396;}s:4:"chat";a:3:{s:4:"name";s:4:"chat";s:4:"slug";s:4:"chat";s:5:"count";i:389;}s:8:"calendar";a:3:{s:4:"name";s:8:"calendar";s:4:"slug";s:8:"calendar";s:5:"count";i:389;}s:9:"marketing";a:3:{s:4:"name";s:9:"marketing";s:4:"slug";s:9:"marketing";s:5:"count";i:389;}s:5:"popup";a:3:{s:4:"name";s:5:"popup";s:4:"slug";s:5:"popup";s:5:"count";i:384;}s:10:"shortcodes";a:3:{s:4:"name";s:10:"shortcodes";s:4:"slug";s:10:"shortcodes";s:5:"count";i:378;}s:4:"news";a:3:{s:4:"name";s:4:"news";s:4:"slug";s:4:"news";s:5:"count";i:377;}s:10:"newsletter";a:3:{s:4:"name";s:10:"newsletter";s:4:"slug";s:10:"newsletter";s:5:"count";i:373;}s:12:"social-media";a:3:{s:4:"name";s:12:"social media";s:4:"slug";s:12:"social-media";s:5:"count";i:367;}s:7:"plugins";a:3:{s:4:"name";s:7:"plugins";s:4:"slug";s:7:"plugins";s:5:"count";i:361;}s:5:"forms";a:3:{s:4:"name";s:5:"forms";s:4:"slug";s:5:"forms";s:5:"count";i:357;}s:4:"code";a:3:{s:4:"name";s:4:"code";s:4:"slug";s:4:"code";s:5:"count";i:357;}s:3:"url";a:3:{s:4:"name";s:3:"url";s:4:"slug";s:3:"url";s:5:"count";i:354;}s:9:"multisite";a:3:{s:4:"name";s:9:"multisite";s:4:"slug";s:9:"multisite";s:5:"count";i:353;}s:4:"meta";a:3:{s:4:"name";s:4:"meta";s:4:"slug";s:4:"meta";s:5:"count";i:346;}s:8:"redirect";a:3:{s:4:"name";s:8:"redirect";s:4:"slug";s:8:"redirect";s:5:"count";i:346;}s:4:"list";a:3:{s:4:"name";s:4:"list";s:4:"slug";s:4:"list";s:5:"count";i:344;}s:14:"contact-form-7";a:3:{s:4:"name";s:14:"contact form 7";s:4:"slug";s:14:"contact-form-7";s:5:"count";i:328;}s:11:"performance";a:3:{s:4:"name";s:11:"performance";s:4:"slug";s:11:"performance";s:5:"count";i:325;}s:12:"notification";a:3:{s:4:"name";s:12:"notification";s:4:"slug";s:12:"notification";s:5:"count";i:322;}s:11:"advertising";a:3:{s:4:"name";s:11:"advertising";s:4:"slug";s:11:"advertising";s:5:"count";i:321;}s:9:"gutenberg";a:3:{s:4:"name";s:9:"gutenberg";s:4:"slug";s:9:"gutenberg";s:5:"count";i:317;}s:16:"custom-post-type";a:3:{s:4:"name";s:16:"custom post type";s:4:"slug";s:16:"custom-post-type";s:5:"count";i:316;}s:6:"simple";a:3:{s:4:"name";s:6:"simple";s:4:"slug";s:6:"simple";s:5:"count";i:315;}s:16:"google-analytics";a:3:{s:4:"name";s:16:"google analytics";s:4:"slug";s:16:"google-analytics";s:5:"count";i:314;}s:8:"tracking";a:3:{s:4:"name";s:8:"tracking";s:4:"slug";s:8:"tracking";s:5:"count";i:310;}s:6:"author";a:3:{s:4:"name";s:6:"author";s:4:"slug";s:6:"author";s:5:"count";i:308;}s:7:"adsense";a:3:{s:4:"name";s:7:"adsense";s:4:"slug";s:7:"adsense";s:5:"count";i:308;}s:4:"html";a:3:{s:4:"name";s:4:"html";s:4:"slug";s:4:"html";s:5:"count";i:308;}}', 'no'),
	(279, '_site_transient_timeout_theme_roots', '1555509228', 'no'),
	(280, '_site_transient_theme_roots', 'a:4:{s:9:"firstling";s:7:"/themes";s:14:"twentynineteen";s:7:"/themes";s:15:"twentyseventeen";s:7:"/themes";s:13:"twentysixteen";s:7:"/themes";}', 'no'),
	(281, '_site_transient_update_plugins', 'O:8:"stdClass":5:{s:12:"last_checked";i:1555507431;s:7:"checked";a:3:{s:19:"akismet/akismet.php";s:5:"4.1.1";s:9:"hello.php";s:5:"1.7.1";s:47:"regenerate-thumbnails/regenerate-thumbnails.php";s:5:"3.1.0";}s:8:"response";a:0:{}s:12:"translations";a:1:{i:0;a:7:{s:4:"type";s:6:"plugin";s:4:"slug";s:21:"regenerate-thumbnails";s:8:"language";s:5:"pt_BR";s:7:"version";s:5:"2.3.1";s:7:"updated";s:19:"2016-06-11 04:43:44";s:7:"package";s:88:"https://downloads.wordpress.org/translation/plugin/regenerate-thumbnails/2.3.1/pt_BR.zip";s:10:"autoupdate";b:1;}}s:9:"no_update";a:3:{s:19:"akismet/akismet.php";O:8:"stdClass":9:{s:2:"id";s:21:"w.org/plugins/akismet";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"4.1.1";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.4.1.1.zip";s:5:"icons";a:2:{s:2:"2x";s:59:"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272";s:2:"1x";s:59:"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272";}s:7:"banners";a:1:{s:2:"1x";s:61:"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904";}s:11:"banners_rtl";a:0:{}}s:9:"hello.php";O:8:"stdClass":9:{s:2:"id";s:25:"w.org/plugins/hello-dolly";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:58:"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";s:5:"icons";a:2:{s:2:"2x";s:64:"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855";s:2:"1x";s:64:"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855";}s:7:"banners";a:1:{s:2:"1x";s:66:"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855";}s:11:"banners_rtl";a:0:{}}s:47:"regenerate-thumbnails/regenerate-thumbnails.php";O:8:"stdClass":9:{s:2:"id";s:35:"w.org/plugins/regenerate-thumbnails";s:4:"slug";s:21:"regenerate-thumbnails";s:6:"plugin";s:47:"regenerate-thumbnails/regenerate-thumbnails.php";s:11:"new_version";s:5:"3.1.0";s:3:"url";s:52:"https://wordpress.org/plugins/regenerate-thumbnails/";s:7:"package";s:64:"https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip";s:5:"icons";a:1:{s:2:"1x";s:74:"https://ps.w.org/regenerate-thumbnails/assets/icon-128x128.png?rev=1753390";}s:7:"banners";a:2:{s:2:"2x";s:77:"https://ps.w.org/regenerate-thumbnails/assets/banner-1544x500.jpg?rev=1753390";s:2:"1x";s:76:"https://ps.w.org/regenerate-thumbnails/assets/banner-772x250.jpg?rev=1753390";}s:11:"banners_rtl";a:0:{}}}}', 'no');
/*!40000 ALTER TABLE `ftwp_options` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_postmeta
CREATE TABLE IF NOT EXISTS `ftwp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_postmeta: ~115 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_postmeta` DISABLE KEYS */;
INSERT INTO `ftwp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
	(1, 2, '_wp_page_template', 'default'),
	(2, 3, '_wp_page_template', 'default'),
	(3, 4, '_menu_item_type', 'post_type'),
	(4, 4, '_menu_item_menu_item_parent', '0'),
	(5, 4, '_menu_item_object_id', '2'),
	(6, 4, '_menu_item_object', 'page'),
	(7, 4, '_menu_item_target', ''),
	(8, 4, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(9, 4, '_menu_item_xfn', ''),
	(10, 4, '_menu_item_url', ''),
	(12, 5, '_menu_item_type', 'custom'),
	(13, 5, '_menu_item_menu_item_parent', '0'),
	(14, 5, '_menu_item_object_id', '5'),
	(15, 5, '_menu_item_object', 'custom'),
	(16, 5, '_menu_item_target', ''),
	(17, 5, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(18, 5, '_menu_item_xfn', ''),
	(19, 5, '_menu_item_url', 'http://localhost:81/firstling/'),
	(21, 6, '_menu_item_type', 'custom'),
	(22, 6, '_menu_item_menu_item_parent', '0'),
	(23, 6, '_menu_item_object_id', '6'),
	(24, 6, '_menu_item_object', 'custom'),
	(25, 6, '_menu_item_target', ''),
	(26, 6, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(27, 6, '_menu_item_xfn', ''),
	(28, 6, '_menu_item_url', 'http://localhost:81/firstling/'),
	(30, 7, '_menu_item_type', 'custom'),
	(31, 7, '_menu_item_menu_item_parent', '0'),
	(32, 7, '_menu_item_object_id', '7'),
	(33, 7, '_menu_item_object', 'custom'),
	(34, 7, '_menu_item_target', ''),
	(35, 7, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(36, 7, '_menu_item_xfn', ''),
	(37, 7, '_menu_item_url', 'http://localhost:81/firstling/'),
	(39, 8, '_menu_item_type', 'custom'),
	(40, 8, '_menu_item_menu_item_parent', '0'),
	(41, 8, '_menu_item_object_id', '8'),
	(42, 8, '_menu_item_object', 'custom'),
	(43, 8, '_menu_item_target', ''),
	(44, 8, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(45, 8, '_menu_item_xfn', ''),
	(46, 8, '_menu_item_url', 'http://localhost:81/firstling/'),
	(48, 9, '_menu_item_type', 'custom'),
	(49, 9, '_menu_item_menu_item_parent', '0'),
	(50, 9, '_menu_item_object_id', '9'),
	(51, 9, '_menu_item_object', 'custom'),
	(52, 9, '_menu_item_target', ''),
	(53, 9, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(54, 9, '_menu_item_xfn', ''),
	(55, 9, '_menu_item_url', 'http://localhost:81/firstling/'),
	(57, 10, '_menu_item_type', 'custom'),
	(58, 10, '_menu_item_menu_item_parent', '0'),
	(59, 10, '_menu_item_object_id', '10'),
	(60, 10, '_menu_item_object', 'custom'),
	(61, 10, '_menu_item_target', ''),
	(62, 10, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(63, 10, '_menu_item_xfn', ''),
	(64, 10, '_menu_item_url', 'http://localhost:81/firstling/'),
	(66, 11, '_menu_item_type', 'custom'),
	(67, 11, '_menu_item_menu_item_parent', '0'),
	(68, 11, '_menu_item_object_id', '11'),
	(69, 11, '_menu_item_object', 'custom'),
	(70, 11, '_menu_item_target', ''),
	(71, 11, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(72, 11, '_menu_item_xfn', ''),
	(73, 11, '_menu_item_url', 'http://localhost:81/firstling/'),
	(75, 12, '_menu_item_type', 'custom'),
	(76, 12, '_menu_item_menu_item_parent', '0'),
	(77, 12, '_menu_item_object_id', '12'),
	(78, 12, '_menu_item_object', 'custom'),
	(79, 12, '_menu_item_target', ''),
	(80, 12, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(81, 12, '_menu_item_xfn', ''),
	(82, 12, '_menu_item_url', 'http://localhost:81/firstling/'),
	(84, 13, '_menu_item_type', 'custom'),
	(85, 13, '_menu_item_menu_item_parent', '11'),
	(86, 13, '_menu_item_object_id', '13'),
	(87, 13, '_menu_item_object', 'custom'),
	(88, 13, '_menu_item_target', ''),
	(89, 13, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(90, 13, '_menu_item_xfn', ''),
	(91, 13, '_menu_item_url', 'http://localhost:81/firstling/'),
	(93, 14, '_menu_item_type', 'custom'),
	(94, 14, '_menu_item_menu_item_parent', '11'),
	(95, 14, '_menu_item_object_id', '14'),
	(96, 14, '_menu_item_object', 'custom'),
	(97, 14, '_menu_item_target', ''),
	(98, 14, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(99, 14, '_menu_item_xfn', ''),
	(100, 14, '_menu_item_url', 'http://localhost:81/firstling/'),
	(102, 15, '_menu_item_type', 'custom'),
	(103, 15, '_menu_item_menu_item_parent', '11'),
	(104, 15, '_menu_item_object_id', '15'),
	(105, 15, '_menu_item_object', 'custom'),
	(106, 15, '_menu_item_target', ''),
	(107, 15, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
	(108, 15, '_menu_item_xfn', ''),
	(109, 15, '_menu_item_url', 'http://localhost:81/firstling/'),
	(110, 1, '_edit_lock', '1554990828:1'),
	(111, 16, '_wp_attached_file', '2019/03/4528409740_50ab685b76_b.jpg'),
	(112, 16, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1023;s:6:"height";i:685;s:4:"file";s:35:"2019/03/4528409740_50ab685b76_b.jpg";s:5:"sizes";a:5:{s:9:"carrossel";a:4:{s:4:"file";s:36:"4528409740_50ab685b76_b-1023x426.jpg";s:5:"width";i:1023;s:6:"height";i:426;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumbnail";a:4:{s:4:"file";s:35:"4528409740_50ab685b76_b-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:35:"4528409740_50ab685b76_b-300x201.jpg";s:5:"width";i:300;s:6:"height";i:201;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:35:"4528409740_50ab685b76_b-768x514.jpg";s:5:"width";i:768;s:6:"height";i:514;s:9:"mime-type";s:10:"image/jpeg";}s:12:"news-sidebar";a:4:{s:4:"file";s:35:"4528409740_50ab685b76_b-640x440.jpg";s:5:"width";i:640;s:6:"height";i:440;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:9:"DSLR-A300";s:7:"caption";s:8:"SONY DSC";s:17:"created_timestamp";s:10:"1271487447";s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"18";s:3:"iso";s:3:"400";s:13:"shutter_speed";s:9:"0.0015625";s:5:"title";s:8:"SONY DSC";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
	(115, 1, '_thumbnail_id', '16'),
	(118, 19, '_edit_lock', '1554990994:1'),
	(119, 20, '_wp_attached_file', '2019/04/7687852308_76640683ca_k.jpg'),
	(120, 20, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2048;s:6:"height";i:1371;s:4:"file";s:35:"2019/04/7687852308_76640683ca_k.jpg";s:5:"sizes";a:6:{s:9:"carrossel";a:4:{s:4:"file";s:36:"7687852308_76640683ca_k-1140x426.jpg";s:5:"width";i:1140;s:6:"height";i:426;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumbnail";a:4:{s:4:"file";s:35:"7687852308_76640683ca_k-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:35:"7687852308_76640683ca_k-300x201.jpg";s:5:"width";i:300;s:6:"height";i:201;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:35:"7687852308_76640683ca_k-768x514.jpg";s:5:"width";i:768;s:6:"height";i:514;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:36:"7687852308_76640683ca_k-1024x686.jpg";s:5:"width";i:1024;s:6:"height";i:686;s:9:"mime-type";s:10:"image/jpeg";}s:12:"news-sidebar";a:4:{s:4:"file";s:35:"7687852308_76640683ca_k-640x440.jpg";s:5:"width";i:640;s:6:"height";i:440;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:12:"PENTAX K200D";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1341499156";s:9:"copyright";s:0:"";s:12:"focal_length";s:4:"28.1";s:3:"iso";s:3:"100";s:13:"shutter_speed";s:17:"0.016666666666667";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
	(123, 19, '_thumbnail_id', '20'),
	(124, 22, '_edit_lock', '1555507390:1'),
	(125, 23, '_wp_attached_file', '2019/04/13503246354_de2a05f551_k.jpg'),
	(126, 23, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2048;s:6:"height";i:1262;s:4:"file";s:36:"2019/04/13503246354_de2a05f551_k.jpg";s:5:"sizes";a:6:{s:9:"carrossel";a:4:{s:4:"file";s:37:"13503246354_de2a05f551_k-1140x426.jpg";s:5:"width";i:1140;s:6:"height";i:426;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumbnail";a:4:{s:4:"file";s:36:"13503246354_de2a05f551_k-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:36:"13503246354_de2a05f551_k-300x185.jpg";s:5:"width";i:300;s:6:"height";i:185;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:36:"13503246354_de2a05f551_k-768x473.jpg";s:5:"width";i:768;s:6:"height";i:473;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:37:"13503246354_de2a05f551_k-1024x631.jpg";s:5:"width";i:1024;s:6:"height";i:631;s:9:"mime-type";s:10:"image/jpeg";}s:12:"news-sidebar";a:4:{s:4:"file";s:36:"13503246354_de2a05f551_k-640x440.jpg";s:5:"width";i:640;s:6:"height";i:440;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:19:"Canon EOS REBEL T2i";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1387953859";s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"22";s:3:"iso";s:3:"100";s:13:"shutter_speed";s:5:"0.008";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
	(129, 22, '_thumbnail_id', '23'),
	(132, 25, '_edit_lock', '1555507211:1'),
	(133, 26, '_wp_attached_file', '2019/04/13192297644_86c31ea0a9_k.jpg'),
	(134, 26, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2048;s:6:"height";i:1365;s:4:"file";s:36:"2019/04/13192297644_86c31ea0a9_k.jpg";s:5:"sizes";a:6:{s:9:"carrossel";a:4:{s:4:"file";s:37:"13192297644_86c31ea0a9_k-1140x426.jpg";s:5:"width";i:1140;s:6:"height";i:426;s:9:"mime-type";s:10:"image/jpeg";}s:9:"thumbnail";a:4:{s:4:"file";s:36:"13192297644_86c31ea0a9_k-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:36:"13192297644_86c31ea0a9_k-300x200.jpg";s:5:"width";i:300;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:36:"13192297644_86c31ea0a9_k-768x512.jpg";s:5:"width";i:768;s:6:"height";i:512;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:37:"13192297644_86c31ea0a9_k-1024x683.jpg";s:5:"width";i:1024;s:6:"height";i:683;s:9:"mime-type";s:10:"image/jpeg";}s:12:"news-sidebar";a:4:{s:4:"file";s:36:"13192297644_86c31ea0a9_k-640x440.jpg";s:5:"width";i:640;s:6:"height";i:440;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:11:"David Brown";s:6:"camera";s:27:"Canon EOS DIGITAL REBEL XTi";s:7:"caption";s:0:"";s:17:"created_timestamp";s:10:"1394986558";s:9:"copyright";s:0:"";s:12:"focal_length";s:2:"50";s:3:"iso";s:3:"100";s:13:"shutter_speed";s:5:"0.005";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:1:{i:0;s:4:"Cars";}}}'),
	(137, 25, '_thumbnail_id', '26'),
	(138, 28, '_edit_lock', '1554991459:1');
/*!40000 ALTER TABLE `ftwp_postmeta` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_posts
CREATE TABLE IF NOT EXISTS `ftwp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_posts: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_posts` DISABLE KEYS */;
INSERT INTO `ftwp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
	(1, 1, '2019-03-18 10:00:06', '2019-03-18 13:00:06', '<!-- wp:paragraph -->\n<p>Boas-vindas ao WordPress. Esse é o seu primeiro post. Edite-o ou exclua-o, e então comece a escrever!</p>\n<!-- /wp:paragraph -->', 'O que realmente interessa ao Brasil', '', 'publish', 'open', 'open', '', 'ola-mundo', '', '', '2019-04-11 10:55:42', '2019-04-11 13:55:42', '', 0, 'http://localhost:81/firstling/?p=1', 0, 'post', '', 1),
	(2, 1, '2019-03-18 10:00:06', '2019-03-18 13:00:06', '<!-- wp:paragraph -->\n<p>Esta é uma página de exemplo. É diferente de um post no blog porque ela permanecerá em um lugar e aparecerá na navegação do seu site na maioria dos temas. Muitas pessoas começam com uma página que as apresenta a possíveis visitantes do site. Ela pode dizer algo assim:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>Olá! Eu sou um mensageiro de bicicleta durante o dia, ator aspirante à noite, e este é o meu site. Eu moro em São Paulo, tenho um grande cachorro chamado Rex e gosto de tomar caipirinha (e banhos de chuva).</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...ou alguma coisa assim:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>A Companhia de Miniaturas XYZ foi fundada em 1971, e desde então tem fornecido miniaturas de qualidade ao público. Localizada na cidade de Itu, a XYZ emprega mais de 2.000 pessoas e faz coisas grandiosas para a comunidade da cidade.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>Como um novo usuário do WordPress, você deveria ir ao <a href="http://localhost:81/firstling/wp-admin/">painel</a> para excluir essa página e criar novas páginas para o seu conteúdo. Divirta-se!</p>\n<!-- /wp:paragraph -->', 'Página de exemplo', '', 'publish', 'closed', 'open', '', 'pagina-exemplo', '', '', '2019-03-18 10:00:06', '2019-03-18 13:00:06', '', 0, 'http://localhost:81/firstling/?page_id=2', 0, 'page', '', 0),
	(3, 1, '2019-03-18 10:00:06', '2019-03-18 13:00:06', '<!-- wp:heading --><h2>Quem somos</h2><!-- /wp:heading --><!-- wp:paragraph --><p>O endereço do nosso site é: http://localhost:81/firstling.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Quais dados pessoais coletamos e porque</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Comentários</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Quando os visitantes deixam comentários no site, coletamos os dados mostrados no formulário de comentários, além do endereço de IP e de dados do navegador do visitante, para auxiliar na detecção de spam.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Uma sequência anonimizada de caracteres criada a partir do seu e-mail (também chamada de hash) poderá ser enviada para o Gravatar para verificar se você usa o serviço. A política de privacidade do Gravatar está disponível aqui: https://automattic.com/privacy/. Depois da aprovação do seu comentário, a foto do seu perfil fica visível publicamente junto de seu comentário.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Mídia</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Se você envia imagens para o site, evite enviar as que contenham dados de localização incorporados (EXIF GPS). Visitantes podem baixar estas imagens do site e extrair delas seus dados de localização.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Formulários de contato</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Ao deixar um comentário no site, você poderá optar por salvar seu nome, e-mail e site nos cookies. Isso visa seu conforto, assim você não precisará preencher seus  dados novamente quando fizer outro comentário. Estes cookies duram um ano.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Se você tem uma conta e acessa este site, um cookie temporário será criado para determinar se seu navegador aceita cookies. Ele não contém nenhum dado pessoal e será descartado quando você fechar seu navegador.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Quando você acessa sua conta no site, também criamos vários cookies para salvar os dados da sua conta e suas escolhas de exibição de tela. Cookies de login são mantidos por dois dias e cookies de opções de tela por um ano. Se você selecionar &quot;Lembrar-me&quot;, seu acesso será mantido por duas semanas. Se você se desconectar da sua conta, os cookies de login serão removidos.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Se você editar ou publicar um artigo, um cookie adicional será salvo no seu navegador. Este cookie não inclui nenhum dado pessoal e simplesmente indica o ID do post referente ao artigo que você acabou de editar. Ele expira depois de 1 dia.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Mídia incorporada de outros sites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Artigos neste site podem incluir conteúdo incorporado como, por exemplo, vídeos, imagens, artigos, etc. Conteúdos incorporados de outros sites se comportam exatamente da mesma forma como se o visitante estivesse visitando o outro site.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Estes sites podem coletar dados sobre você, usar cookies, incorporar rastreamento adicional de terceiros e monitorar sua interação com este conteúdo incorporado, incluindo sua interação com o conteúdo incorporado se você tem uma conta e está conectado com o site.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Análises</h3><!-- /wp:heading --><!-- wp:heading --><h2>Com quem partilhamos seus dados</h2><!-- /wp:heading --><!-- wp:heading --><h2>Por quanto tempo mantemos os seus dados</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Se você deixar um comentário, o comentário e os seus metadados são conservados indefinidamente. Fazemos isso para que seja possível reconhecer e aprovar automaticamente qualquer comentário posterior ao invés de retê-lo para moderação.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Para usuários que se registram no nosso site (se houver), também guardamos as informações pessoais que fornecem no seu perfil de usuário. Todos os usuários podem ver, editar ou excluir suas informações pessoais a qualquer momento (só não é possível alterar o seu username). Os administradores de sites também podem ver e editar estas informações.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Quais os seus direitos sobre seus dados</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Se você tiver uma conta neste site ou se tiver deixado comentários, pode solicitar um arquivo exportado dos dados pessoais que mantemos sobre você, inclusive quaisquer dados que nos tenha fornecido. Também pode solicitar que removamos qualquer dado pessoal que mantemos sobre você. Isto não inclui nenhuns dados que somos obrigados a manter para propósitos administrativos, legais ou de segurança.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Para onde enviamos seus dados</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Comentários de visitantes podem ser marcados por um serviço automático de detecção de spam.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Suas informações de contato</h2><!-- /wp:heading --><!-- wp:heading --><h2>Informações adicionais</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Como protegemos seus dados</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Quais são nossos procedimentos contra violação de dados</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>De quais terceiros nós recebemos dados</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Quais tomadas de decisão ou análises de perfil automatizadas fazemos com os dados de usuários</h3><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Requisitos obrigatórios de divulgação para sua categoria profissional</h3><!-- /wp:heading -->', 'Política de privacidade', '', 'draft', 'closed', 'open', '', 'politica-de-privacidade', '', '', '2019-03-18 10:00:06', '2019-03-18 13:00:06', '', 0, 'http://localhost:81/firstling/?page_id=3', 0, 'page', '', 0),
	(4, 1, '2019-04-02 10:43:55', '2019-04-02 13:43:55', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 0, 'http://localhost:81/firstling/?p=4', 1, 'nav_menu_item', '', 0),
	(5, 1, '2019-04-02 10:43:56', '2019-04-02 13:43:56', '', 'About', '', 'publish', 'closed', 'closed', '', 'about', '', '', '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 0, 'http://localhost:81/firstling/?p=5', 2, 'nav_menu_item', '', 0),
	(6, 1, '2019-04-02 10:45:51', '2019-04-02 13:45:51', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home-2', '', '', '2019-04-02 10:45:51', '2019-04-02 13:45:51', '', 0, 'http://localhost:81/firstling/?p=6', 1, 'nav_menu_item', '', 0),
	(7, 1, '2019-04-02 10:45:51', '2019-04-02 13:45:51', '', 'Full-Width Page', '', 'publish', 'closed', 'closed', '', 'full-width-page', '', '', '2019-04-02 10:45:51', '2019-04-02 13:45:51', '', 0, 'http://localhost:81/firstling/?p=7', 2, 'nav_menu_item', '', 0),
	(8, 1, '2019-04-02 10:45:51', '2019-04-02 13:45:51', '', 'Sample Page', '', 'publish', 'closed', 'closed', '', 'sample-page', '', '', '2019-04-02 10:45:51', '2019-04-02 13:45:51', '', 0, 'http://localhost:81/firstling/?p=8', 3, 'nav_menu_item', '', 0),
	(9, 1, '2019-04-02 10:45:52', '2019-04-02 13:45:52', '', 'Languages', '', 'publish', 'closed', 'closed', '', 'languages', '', '', '2019-04-02 10:45:52', '2019-04-02 13:45:52', '', 0, 'http://localhost:81/firstling/?p=9', 4, 'nav_menu_item', '', 0),
	(10, 1, '2019-04-02 10:45:52', '2019-04-02 13:45:52', '', 'Contact us', '', 'publish', 'closed', 'closed', '', 'contact-us', '', '', '2019-04-02 10:45:52', '2019-04-02 13:45:52', '', 0, 'http://localhost:81/firstling/?p=10', 5, 'nav_menu_item', '', 0),
	(11, 1, '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 'Products', '', 'publish', 'closed', 'closed', '', 'products', '', '', '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 0, 'http://localhost:81/firstling/?p=11', 3, 'nav_menu_item', '', 0),
	(12, 1, '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 'Contact us', '', 'publish', 'closed', 'closed', '', 'contact-us-2', '', '', '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 0, 'http://localhost:81/firstling/?p=12', 7, 'nav_menu_item', '', 0),
	(13, 1, '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 'Tops', '', 'publish', 'closed', 'closed', '', 'tops', '', '', '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 0, 'http://localhost:81/firstling/?p=13', 4, 'nav_menu_item', '', 0),
	(14, 1, '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 'Bottoms', '', 'publish', 'closed', 'closed', '', 'bottoms', '', '', '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 0, 'http://localhost:81/firstling/?p=14', 5, 'nav_menu_item', '', 0),
	(15, 1, '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 'Footwear', '', 'publish', 'closed', 'closed', '', 'footwear', '', '', '2019-04-02 10:55:10', '2019-04-02 13:55:10', '', 0, 'http://localhost:81/firstling/?p=15', 6, 'nav_menu_item', '', 0),
	(16, 1, '2019-04-11 10:54:24', '2019-04-11 13:54:24', '', 'SONY DSC', 'SONY DSC', 'inherit', 'open', 'closed', '', 'sony-dsc', '', '', '2019-04-11 10:54:24', '2019-04-11 13:54:24', '', 1, 'http://localhost:81/firstling/wp-content/uploads/2019/03/4528409740_50ab685b76_b.jpg', 0, 'attachment', 'image/jpeg', 0),
	(17, 1, '2019-04-11 10:54:29', '2019-04-11 13:54:29', '<!-- wp:paragraph -->\n<p>Boas-vindas ao WordPress. Esse é o seu primeiro post. Edite-o ou exclua-o, e então comece a escrever!</p>\n<!-- /wp:paragraph -->', 'Olá, mundo!', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2019-04-11 10:54:29', '2019-04-11 13:54:29', '', 1, 'http://localhost:81/firstling/1-revision-v1/', 0, 'revision', '', 0),
	(18, 1, '2019-04-11 10:55:42', '2019-04-11 13:55:42', '<!-- wp:paragraph -->\n<p>Boas-vindas ao WordPress. Esse é o seu primeiro post. Edite-o ou exclua-o, e então comece a escrever!</p>\n<!-- /wp:paragraph -->', 'O que realmente interessa ao Brasil', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2019-04-11 10:55:42', '2019-04-11 13:55:42', '', 1, 'http://localhost:81/firstling/1-revision-v1/', 0, 'revision', '', 0),
	(19, 1, '2019-04-11 10:57:02', '2019-04-11 13:57:02', '', 'Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa', '', 'publish', 'open', 'open', '', 'hoje-nos-iremos-debater-experiencias-de-propriedade-intelectual-no-brasil-e-na-europa', '', '', '2019-04-11 10:57:02', '2019-04-11 13:57:02', '', 0, 'http://localhost:81/firstling/?p=19', 0, 'post', '', 0),
	(20, 1, '2019-04-11 10:56:57', '2019-04-11 13:56:57', '', '7687852308_76640683ca_k', '', 'inherit', 'open', 'closed', '', '7687852308_76640683ca_k', '', '', '2019-04-11 10:56:57', '2019-04-11 13:56:57', '', 19, 'http://localhost:81/firstling/wp-content/uploads/2019/04/7687852308_76640683ca_k.jpg', 0, 'attachment', 'image/jpeg', 0),
	(21, 1, '2019-04-11 10:57:02', '2019-04-11 13:57:02', '', 'Hoje nós iremos debater experiências de propriedade intelectual no Brasil e na Europa', '', 'inherit', 'closed', 'closed', '', '19-revision-v1', '', '', '2019-04-11 10:57:02', '2019-04-11 13:57:02', '', 19, 'http://localhost:81/firstling/19-revision-v1/', 0, 'revision', '', 0),
	(22, 1, '2019-04-11 11:02:35', '2019-04-11 14:02:35', '', 'This is how comments will be displayed on Sparkling WP Theme', '', 'publish', 'open', 'open', '', 'this-is-how-comments-will-be-displayed-on-sparkling-wp-theme', '', '', '2019-04-16 09:21:35', '2019-04-16 12:21:35', '', 0, 'http://localhost:81/firstling/?p=22', 0, 'post', '', 0),
	(23, 1, '2019-04-11 11:02:29', '2019-04-11 14:02:29', '', '13503246354_de2a05f551_k', '', 'inherit', 'open', 'closed', '', '13503246354_de2a05f551_k', '', '', '2019-04-11 11:02:29', '2019-04-11 14:02:29', '', 22, 'http://localhost:81/firstling/wp-content/uploads/2019/04/13503246354_de2a05f551_k.jpg', 0, 'attachment', 'image/jpeg', 0),
	(24, 1, '2019-04-11 11:02:35', '2019-04-11 14:02:35', '', 'This is how comments will be displayed on Sparkling WP Theme', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2019-04-11 11:02:35', '2019-04-11 14:02:35', '', 22, 'http://localhost:81/firstling/22-revision-v1/', 0, 'revision', '', 0),
	(25, 1, '2019-04-11 11:05:12', '2019-04-11 14:05:12', '', 'How to Use WordPress Pingbacks And Trackbacks', '', 'publish', 'open', 'open', '', 'how-to-use-wordpress-pingbacks-and-trackbacks', '', '', '2019-04-16 09:20:36', '2019-04-16 12:20:36', '', 0, 'http://localhost:81/firstling/?p=25', 0, 'post', '', 0),
	(26, 1, '2019-04-11 11:05:06', '2019-04-11 14:05:06', '', '13192297644_86c31ea0a9_k', '', 'inherit', 'open', 'closed', '', '13192297644_86c31ea0a9_k', '', '', '2019-04-11 11:05:06', '2019-04-11 14:05:06', '', 25, 'http://localhost:81/firstling/wp-content/uploads/2019/04/13192297644_86c31ea0a9_k.jpg', 0, 'attachment', 'image/jpeg', 0),
	(27, 1, '2019-04-11 11:05:12', '2019-04-11 14:05:12', '', 'How to Use WordPress Pingbacks And Trackbacks', '', 'inherit', 'closed', 'closed', '', '25-revision-v1', '', '', '2019-04-11 11:05:12', '2019-04-11 14:05:12', '', 25, 'http://localhost:81/firstling/25-revision-v1/', 0, 'revision', '', 0),
	(28, 1, '2019-04-11 11:05:46', '0000-00-00 00:00:00', '', 'Rascunho automático', '', 'auto-draft', 'open', 'open', '', '', '', '', '2019-04-11 11:05:46', '0000-00-00 00:00:00', '', 0, 'http://localhost:81/firstling/?p=28', 0, 'post', '', 0);
/*!40000 ALTER TABLE `ftwp_posts` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_termmeta
CREATE TABLE IF NOT EXISTS `ftwp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_termmeta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_termmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ftwp_termmeta` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_terms
CREATE TABLE IF NOT EXISTS `ftwp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_terms: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_terms` DISABLE KEYS */;
INSERT INTO `ftwp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
	(1, 'Teste de Categoria', 'teste-de-categoria', 0),
	(2, 'Menu Principal', 'menu-principal', 0),
	(3, 'Menu Rodapé', 'menu-rodape', 0),
	(4, 'Esportes', 'esportes', 0),
	(5, 'Online', 'online', 0),
	(6, 'novo', 'novo', 0),
	(7, 'ninja', 'ninja', 0),
	(8, 'brasil paralelo', 'brasil-paralelo', 0),
	(9, 'todo mundo gosta disso hoje em dia', 'todo-mundo-gosta-disso-hoje-em-dia', 0),
	(10, 'gool', 'gool', 0),
	(11, 'show', 'show', 0),
	(12, 'hahahaha', 'hahahaha', 0);
/*!40000 ALTER TABLE `ftwp_terms` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_term_relationships
CREATE TABLE IF NOT EXISTS `ftwp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_term_relationships: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_term_relationships` DISABLE KEYS */;
INSERT INTO `ftwp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
	(1, 1, 0),
	(4, 2, 0),
	(5, 2, 0),
	(6, 3, 0),
	(7, 3, 0),
	(8, 3, 0),
	(9, 3, 0),
	(10, 3, 0),
	(11, 2, 0),
	(12, 2, 0),
	(13, 2, 0),
	(14, 2, 0),
	(15, 2, 0),
	(19, 1, 0),
	(22, 5, 0),
	(22, 10, 0),
	(22, 11, 0),
	(22, 12, 0),
	(25, 4, 0),
	(25, 6, 0),
	(25, 7, 0),
	(25, 8, 0),
	(25, 9, 0);
/*!40000 ALTER TABLE `ftwp_term_relationships` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_term_taxonomy
CREATE TABLE IF NOT EXISTS `ftwp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_term_taxonomy: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `ftwp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
	(1, 1, 'category', '', 0, 2),
	(2, 2, 'nav_menu', '', 0, 7),
	(3, 3, 'nav_menu', '', 0, 5),
	(4, 4, 'category', '', 0, 1),
	(5, 5, 'category', '', 0, 1),
	(6, 6, 'post_tag', '', 0, 1),
	(7, 7, 'post_tag', '', 0, 1),
	(8, 8, 'post_tag', '', 0, 1),
	(9, 9, 'post_tag', '', 0, 1),
	(10, 10, 'post_tag', '', 0, 1),
	(11, 11, 'post_tag', '', 0, 1),
	(12, 12, 'post_tag', '', 0, 1);
/*!40000 ALTER TABLE `ftwp_term_taxonomy` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_usermeta
CREATE TABLE IF NOT EXISTS `ftwp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_usermeta: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_usermeta` DISABLE KEYS */;
INSERT INTO `ftwp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
	(1, 1, 'nickname', 'rafael'),
	(2, 1, 'first_name', ''),
	(3, 1, 'last_name', ''),
	(4, 1, 'description', ''),
	(5, 1, 'rich_editing', 'true'),
	(6, 1, 'syntax_highlighting', 'true'),
	(7, 1, 'comment_shortcuts', 'false'),
	(8, 1, 'admin_color', 'fresh'),
	(9, 1, 'use_ssl', '0'),
	(10, 1, 'show_admin_bar_front', 'true'),
	(11, 1, 'locale', ''),
	(12, 1, 'ftwp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
	(13, 1, 'ftwp_user_level', '10'),
	(14, 1, 'dismissed_wp_pointers', 'wp496_privacy'),
	(15, 1, 'show_welcome_panel', '1'),
	(17, 1, 'ftwp_dashboard_quick_press_last_post_id', '4'),
	(18, 1, 'session_tokens', 'a:1:{s:64:"020ed48378b457afbd5a8668cb9bc18117107d5de6fa7a6705a6e5d85e70f462";a:4:{s:10:"expiration";i:1555680005;s:2:"ip";s:3:"::1";s:2:"ua";s:115:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36";s:5:"login";i:1555507205;}}'),
	(19, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";i:4;s:15:"title-attribute";}'),
	(20, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:"add-post_tag";}'),
	(21, 1, 'ftwp_user-settings', 'libraryContent=browse'),
	(22, 1, 'ftwp_user-settings-time', '1554990925');
/*!40000 ALTER TABLE `ftwp_usermeta` ENABLE KEYS */;

-- Copiando estrutura para tabela firstling.ftwp_users
CREATE TABLE IF NOT EXISTS `ftwp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela firstling.ftwp_users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ftwp_users` DISABLE KEYS */;
INSERT INTO `ftwp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
	(1, 'rafael', '$P$BfON06/pRsFQDb0E99GO/9uHXqgWUf/', 'rafael', 'rafaclasses@gmail.com', '', '2019-03-18 13:00:04', '', 0, 'rafael');
/*!40000 ALTER TABLE `ftwp_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
