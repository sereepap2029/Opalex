/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 80016
Source Host           : localhost:3306
Source Database       : opalex

Target Server Type    : MYSQL
Target Server Version : 80016
File Encoding         : 65001

Date: 2019-07-01 22:06:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `lastname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `username` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `prefix` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1234567890', 'sadmin', 'sadmin', 'sadmin', 'sadmin', 'ddd', 'นาย', null);

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8_unicode_ci,
  `sort_order` bigint(11) DEFAULT '999',
  `main_pic` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('0fabae23f4', 'Tate no Yuusha no Nariagari', 'เที่ยงคืน ฮิปฮอปซามูไร โครนาแชมเปญเวิร์ค สเปค ซินโดรมสันทนาการ บุ๋นเมเปิลอิกัวนา ฮิปโปอุด้ง เจ็ตไฮบริดหมั่นโถวแต๋วแรงดูดจู เนียร์อีโรติก ถูกต้องคีตปฏิภาณศากยบุตร', '999', '0fabae23f4-1561974638_main.jpg');
INSERT INTO `banner` VALUES ('3b529164f2', 'The Warlord', 'เที่ยงคืน ฮิปฮอปซามูไร โครนาแชมเปญเวิร์ค สเปค ซินโดรมสันทนาการ บุ๋นเมเปิลอิกัวนา ฮิปโปอุด้ง เจ็ตไฮบริดหมั่นโถวแต๋วแรงดูดจู เนียร์อีโรติก ถูกต้องคีตปฏิภาณศากยบุตร', '999', '3b529164f2-1561974622_main.jpg');
INSERT INTO `banner` VALUES ('58a0521fa4', 'Mob Psycho 100 II', 'admin/admin/admin/admin/admin/admin/admin/admin/admin/admin/admin/\r\nadmin/admin/admin/\r\nadmin/admin/admin/admin/admin/admin/admin/', '999', '58a0521fa4-1561991352_main.jpg');
INSERT INTO `banner` VALUES ('5ad3ea8f75', 'Sword Art Online - Alicization ', 'เที่ยงคืน ฮิปฮอปซามูไร โครนาแชมเปญเวิร์ค สเปค ซินโดรมสันทนาการ บุ๋นเมเปิลอิกัวนา ฮิปโปอุด้ง เจ็ตไฮบริดหมั่นโถวแต๋วแรงดูดจู เนียร์อีโรติก ถูกต้องคีตปฏิภาณศากยบุตร', '999', '5ad3ea8f75-1561974651_main.jpg');

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `contact`
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gal_header` text COLLATE utf8_unicode_ci,
  `gal_des` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `mobile` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `facebook` text COLLATE utf8_unicode_ci,
  `twister` text COLLATE utf8_unicode_ci,
  `lat` text COLLATE utf8_unicode_ci,
  `lon` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('1234567890', 'LOREM IPSUM LOREM IPSUM LOREM IPSUM', 'ทอล์คเบลอเซลส์ รุสโซตรวจสอบ อีโรติกลีกสเต็ปซิลเวอร์ บ๊วยแดนซ์ไฮเปอร์ รองรับช็อปนายแบบ ฟลุกเอสเปรสโซ ล็อบบี้ร็อคกลาสตรวจสอบราชานุญาต บร็อกโคลีวิลล์ครัวซอง โกะเคลียร์แกสโซฮอล์ สตริงเทวาไรเฟิลบูติคแฮปปี้ ว้อดก้าซิลเวอร์เพรสรอยัลตี้เฟรช ติวแฟรีเปเปอร์สป็อตจ๊าบ เซาท์โพลล์สหัชญาณโทรโข่งแอปพริคอท', '080-403-2819', '080-403-2819', 'sereepap2029@gmail.com', 'https://www.facebook.com/', 'https://twitter.com/twister', '13.700279075214086', '100.59176445007324');

-- ----------------------------
-- Table structure for `gallery`
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` bigint(11) DEFAULT NULL,
  `filepath` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES ('00f6139902', '1', '00f6139902.jpg');
INSERT INTO `gallery` VALUES ('60ee5eb3a3', '2', '60ee5eb3a3.jpg');
INSERT INTO `gallery` VALUES ('9490f2ba2b', '3', '9490f2ba2b.jpg');
INSERT INTO `gallery` VALUES ('d0cd9e6c4a', '4', 'd0cd9e6c4a.jpg');

-- ----------------------------
-- Table structure for `maid`
-- ----------------------------
DROP TABLE IF EXISTS `maid`;
CREATE TABLE `maid` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `maid_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maid_list_des` text COLLATE utf8_unicode_ci,
  `maid_description` text COLLATE utf8_unicode_ci,
  `maid_short_des` text COLLATE utf8_unicode_ci,
  `thumb_pic` text COLLATE utf8_unicode_ci,
  `main_pic` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of maid
-- ----------------------------
INSERT INTO `maid` VALUES ('afd86770c6', 'Lorem Ipsum', 'รับดูแลความสะอาด ภายในบ้าน ห้องนอน-and-ปัดกวาด บริเวณโดยรอบบ้าน ภายนอก-and-แยกชนิดผ้าซัก อบแห้งและตากแดด-and-เตรียมอาหาร จัดโต๊ะอาหาร เก็บโต๊ะและจานชาม-and-รดน้ำต้นไม้ เก็บกวาดใบไม้ นำขยะไปทิ้งให้เป็นที่-and-คอยเปิด - ปิด ประตูบ้าน รอรับเจ้านาย-and-รับใช้เมื่อผู้เป็นเจ้านายเรียกใช้งาน ไม่ใช้โทรศัพท์ มือถือส่วนตัวในเวลาทำงาน', 'อินดอร์มิลค์ฮองเฮาดีพาร์ตเมนต์ซิม สไตล์ เอ๊าะคอนโดมิเนียม รากหญ้าลีก วาทกรรมดีมานด์ วัคค์ธุรกรรมเทรดยูวีคอลเล็ก ชั่น ฟลุกฟอร์มแกรนด์แชมพู แบล็ก โคโยตี้อัตลักษณ์ดิสเครดิตทับซ้อนดั๊มพ์ ควิก บลูเบอร์รีอริยสงฆ์เวิร์กช็อปโปรเจกต์แทงกั๊ก นอมิ นีโชห่วย แฟกซ์แอโรบิคเวิลด์คอลัมนิสต์มยุราภิรมย์ ศิลปวัฒนธรรมมหาอุปราชาสังโฆไมค์วอลล์ ดีพาร์ตเมนต์แฟรี่ มลภาวะ\r\n\r\nอึมครึมแฟร์ทริปสตาร์ทแมคเคอเรล โปรเจกต์โปลิศผู้นำ ดีลเลอร์เอ็นจีโอคันถธุระบ๊อบดาวน์ อีสเตอร์โมเต็ล ดาวน์ออดิทอเรียมแบน เนอร์เทคโนแครตเนอะ ไทม์วัคค์รีเสิร์ช โซลาร์แดรี่มอคค่า สะบึมส์อวอร์ดแพทเทิร์นชะโนด สัมนา ฮัลโลวีนวาไรตี้ดีเจฟาสต์ฟู้ดยาวี อาร์ ติสต์หลวงตาแคร์ภควัมบดีซีน แรลลี่ เคลมโอเละ์ต คอนเซปต์เมคอัพมอคคาแมคเคอเรล พิซซ่าล็อบบี้คีตปฏิภาณ โชห่วยพะเรอ อัลบัมแอปพริคอท', 'ว้อดก้าซิลเวอร์เพรสรอยัลตี้เฟรช	ติวแฟรีเปเปอร์สป็อตจ๊าบ เซาท์ โพลล์สหัชญาณโทรโข่ง', 'afd86770c6-1561975076_thumb.jpg', 'afd86770c6-1561975076_main.jpg');
INSERT INTO `maid` VALUES ('afd86770cf', 'Lorem Ipsum', 'รับดูแลความสะอาด ภายในบ้าน ห้องนอน-and-ปัดกวาด บริเวณโดยรอบบ้าน ภายนอก-and-แยกชนิดผ้าซัก อบแห้งและตากแดด-and-เตรียมอาหาร จัดโต๊ะอาหาร เก็บโต๊ะและจานชาม-and-รดน้ำต้นไม้ เก็บกวาดใบไม้ นำขยะไปทิ้งให้เป็นที่-and-คอยเปิด - ปิด ประตูบ้าน รอรับเจ้านาย-and-รับใช้เมื่อผู้เป็นเจ้านายเรียกใช้งาน ไม่ใช้โทรศัพท์ มือถือส่วนตัวในเวลาทำงาน', 'อินดอร์มิลค์ฮองเฮาดีพาร์ตเมนต์ซิม สไตล์ เอ๊าะคอนโดมิเนียม รากหญ้าลีก วาทกรรมดีมานด์ วัคค์ธุรกรรมเทรดยูวีคอลเล็ก ชั่น ฟลุกฟอร์มแกรนด์แชมพู แบล็ก โคโยตี้อัตลักษณ์ดิสเครดิตทับซ้อนดั๊มพ์ ควิก บลูเบอร์รีอริยสงฆ์เวิร์กช็อปโปรเจกต์แทงกั๊ก นอมิ นีโชห่วย แฟกซ์แอโรบิคเวิลด์คอลัมนิสต์มยุราภิรมย์ ศิลปวัฒนธรรมมหาอุปราชาสังโฆไมค์วอลล์ ดีพาร์ตเมนต์แฟรี่ มลภาวะ\r\n\r\nอึมครึมแฟร์ทริปสตาร์ทแมคเคอเรล โปรเจกต์โปลิศผู้นำ ดีลเลอร์เอ็นจีโอคันถธุระบ๊อบดาวน์ อีสเตอร์โมเต็ล ดาวน์ออดิทอเรียมแบน เนอร์เทคโนแครตเนอะ ไทม์วัคค์รีเสิร์ช โซลาร์แดรี่มอคค่า สะบึมส์อวอร์ดแพทเทิร์นชะโนด สัมนา ฮัลโลวีนวาไรตี้ดีเจฟาสต์ฟู้ดยาวี อาร์ ติสต์หลวงตาแคร์ภควัมบดีซีน แรลลี่ เคลมโอเละ์ต คอนเซปต์เมคอัพมอคคาแมคเคอเรล พิซซ่าล็อบบี้คีตปฏิภาณ โชห่วยพะเรอ อัลบัมแอปพริคอท', 'ว้อดก้าซิลเวอร์เพรสรอยัลตี้เฟรช	ติวแฟรีเปเปอร์สป็อตจ๊าบ เซาท์ โพลล์สหัชญาณโทรโข่ง', 'afd86770cf-1561974917_thumb.jpg', 'afd86770cf-1561974917_main.jpg');
INSERT INTO `maid` VALUES ('asweqwsxa', 'Lorem Ipsum', 'รับดูแลความสะอาด ภายในบ้าน ห้องนอน-and-ปัดกวาด บริเวณโดยรอบบ้าน ภายนอก-and-แยกชนิดผ้าซัก อบแห้งและตากแดด-and-เตรียมอาหาร จัดโต๊ะอาหาร เก็บโต๊ะและจานชาม-and-รดน้ำต้นไม้ เก็บกวาดใบไม้ นำขยะไปทิ้งให้เป็นที่-and-คอยเปิด - ปิด ประตูบ้าน รอรับเจ้านาย-and-รับใช้เมื่อผู้เป็นเจ้านายเรียกใช้งาน ไม่ใช้โทรศัพท์ มือถือส่วนตัวในเวลาทำงาน', 'อินดอร์มิลค์ฮองเฮาดีพาร์ตเมนต์ซิม สไตล์ เอ๊าะคอนโดมิเนียม รากหญ้าลีก วาทกรรมดีมานด์ วัคค์ธุรกรรมเทรดยูวีคอลเล็ก ชั่น ฟลุกฟอร์มแกรนด์แชมพู แบล็ก โคโยตี้อัตลักษณ์ดิสเครดิตทับซ้อนดั๊มพ์ ควิก บลูเบอร์รีอริยสงฆ์เวิร์กช็อปโปรเจกต์แทงกั๊ก นอมิ นีโชห่วย แฟกซ์แอโรบิคเวิลด์คอลัมนิสต์มยุราภิรมย์ ศิลปวัฒนธรรมมหาอุปราชาสังโฆไมค์วอลล์ ดีพาร์ตเมนต์แฟรี่ มลภาวะ\r\n\r\n\r\n\r\nอึมครึมแฟร์ทริปสตาร์ทแมคเคอเรล โปรเจกต์โปลิศผู้นำ ดีลเลอร์เอ็นจีโอคันถธุระบ๊อบดาวน์ อีสเตอร์โมเต็ล ดาวน์ออดิทอเรียมแบน เนอร์เทคโนแครตเนอะ ไทม์วัคค์รีเสิร์ช โซลาร์แดรี่มอคค่า สะบึมส์อวอร์ดแพทเทิร์นชะโนด สัมนา ฮัลโลวีนวาไรตี้ดีเจฟาสต์ฟู้ดยาวี อาร์ ติสต์หลวงตาแคร์ภควัมบดีซีน แรลลี่ เคลมโอเละ์ต คอนเซปต์เมคอัพมอคคาแมคเคอเรล พิซซ่าล็อบบี้คีตปฏิภาณ โชห่วยพะเรอ อัลบัมแอปพริคอท', 'ว้อดก้าซิลเวอร์เพรสรอยัลตี้เฟรช	ติวแฟรีเปเปอร์สป็อตจ๊าบ เซาท์ โพลล์สหัชญาณโทรโข่ง', 'asweqwsxa-1561975089_thumb.jpg', 'asweqwsxa-1561975089_main.jpg');

-- ----------------------------
-- Table structure for `perm`
-- ----------------------------
DROP TABLE IF EXISTS `perm`;
CREATE TABLE `perm` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` enum('delete','data','account','req_withdraw','approve_withdraw','report','send_data','select_adjuster','super_data','inform','verify') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of perm
-- ----------------------------
INSERT INTO `perm` VALUES ('1', '1234567890', 'account');
INSERT INTO `perm` VALUES ('109', '1234567890', 'data');
INSERT INTO `perm` VALUES ('110', '1234567890', 'delete');
