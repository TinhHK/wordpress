-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2014 at 06:57 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wordpress4`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp4_zendvn_mp_article`
--

CREATE TABLE IF NOT EXISTS `wp_mrk_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `wp4_zendvn_mp_article`
--

INSERT INTO `wp4_zendvn_mp_article` (`id`, `title`, `picture`, `content`, `status`) VALUES
(1, 'Hàn Quốc vô địch, Thái Lan trắng tay tại ASIAD 17', 'picture001.png', 'Bàn thắng vàng ở phút 120+2 giúp Hàn Quốc giành chiến thắng nghẹt thở 1-0 trước CHDCND Triều Tiên ở trận chung kết. Trong khi đó Iraq đánh bại Thái Lan với cùng tỷ số để đoạt HCĐ.', 0),
(2, 'Messi Hàn Quốc dẫn đầu bộ tứ siêu đẳng đối đầu U19 Việt Nam', 'picture002.png', 'Liên đoàn bóng đá Hàn Quốc (KFA) đã công bố đội hình 23 cầu thủ đội U19 chuẩn bị cho giải châu Á sắp tới. Họ tự tin cho rằng đây là đội hình mạnh nhất từ trước đến nay.', 1),
(3, 'Niềm vui nhân đôi của chàng thủ quân Olympic Việt Nam', 'picture003.png', 'Thi đấu ấn tượng tại Asian Games 17, được triệu tập vào đội tuyển Việt Nam tham dự chuyến tập huấn Nhật Bản, tiền vệ Ngô Hoàng Thịnh còn nhận thêm tin vui từ gia đình.', 1),
(4, 'ĐT U19 Việt Nam sẽ tạo bất ngờ cho đối thủ', 'picture004.png', 'Dù nằm ở bảng đấu được coi là “tử thần” tại VCK U19 châu Á 2014, nhưng U19 Việt Nam đã và đang chuẩn bị những món quà bất ngờ dành cho các “đại gia” đến từ Đông Á.', 1),
(5, 'Đối thủ của U19 VN chỉ cần 5 ngày chuẩn bị cho giải châu Á', 'picture005.png', 'Hôm 29/9 vừa qua, tuyển U19 Nhật Bản đã tập trung trở lại để chuẩn bị cho VCK U19 châu Á sẽ khởi tranh trong ít ngày tới tại Myanmar.', 1),
(6, ' Lịch thi đấu của U19 Việt Nam tại VCK châu Á 2014', 'picture006.png', 'Dù có được lịch thi đấu thuận lợi thì thầy trò HLV Graechen vẫn sẽ gặp rất nhiều khó khăn khi nằm ở bảng đấu tử thần cùng với U19 Hàn Quốc, Nhật Bản và Trung Quốc.', 1),
(7, 'U19 Australia nhắm vé dự giải U20 thế giới', 'picture007.png', 'HLV Paul Okon của U19 Australia đã chốt danh sách 23 cầu thủ dự VCK U19 châu Á diễn ra tại Myanmar tháng 10 tới với mục tiêu giành quyền tham dự giải U20 thế giới 2015.', 0),
(8, 'Tuấn Anh trở lại tập luyện, hoàn tất giáo án nặng', 'picture008.png', 'Chấn thương đầu gối của Tuấn Anh đã bình phục hoàn toàn, tiền vệ trụ cột trở lại tập luyện cùng các đồng đội U19 Việt Nam từ sáng qua (29/9).', 1),
(9, 'Bổ sung HLV ngoại chuyên về thể lực cho U19 Việt Nam', 'picture009.png', 'Các cầu thủ U19 VN liên tiếp gặp phải những chấn thương trên sân cỏ vì điểm yếu về thể lực. Bầu Đức sẽ tuyển thêm một HLV thể lực người Pháp làm trợ lý cho HLV Graechen.', 0),
(10, 'Công Phượng lập cú đúp vào lưới đội hình hai U19 VN', 'picture010.png', 'Để giảm bớt sự nhàm chán sau hơn 1 tuần tập luyện tại Hàm Rồng, HLV Graechen đã chia đội hình U19 Việt Nam làm đôi để tổ chức một trận thi đấu đối kháng.', 0),
(11, 'Bầu Đức tuyển sinh gà nòi tiếp bước đàn anh ở U19 Việt Nam', 'picture011.png', 'Học viện HAGL Arsenal-JMG của bầu Đức tiếp tục tuyển sinh cầu thủ nhí cho khóa 3 và 4 để tiếp nối các đàn anh Công Phượng, Tuấn Anh, Xuân Trường... đang thi đấu thành công ở U19 VN', 0),
(12, 'Cầu thủ người Gia Rai trở lại thi đấu cho U19 Việt Nam', 'picture012.png', 'Theo quy định của AFC, các đội tham dự VCK U19 châu Á sẽ được đăng ký thêm 3 cầu thủ so với số lượng đăng ký tại giải U19 Đông Nam Á vừa diễn ra tại Hà Nội.', 1),
(13, 'Thầy Giôm đi học để dẫn dắt sao U19 dự V.League 2015', 'picture013.png', 'HLV Guillaume Greachen sẽ theo học lớp HLV bằng A, để có chứng chỉ đủ điều kiện dẫn dắt đội HAGL với nòng cốt là cầu thủ đang thuộc biên chế đội U19 Việt Nam dự V.League 2015.', 0),
(14, 'HLV Graechen: ''Học trò của tôi đủ sức đá V.League''', 'picture014.png', 'HLV Guillaume Graechen tự tin nói rằng các học trò của ông luôn biết cách để tránh xa những cám dỗ, đứng vững trên con đường trở thành cầu thủ chuyên nghiệp', 0),
(17, 'Harriet''s Adages', 'tmp.png', 'WordPress'' database interface is like Sunday Morning: Easy.', 1),
(18, 'This is a test 123', 'abc123.jpg', 'This is a content 123', 0),
(20, 'This is a test 246', 'abc123.jpg', 'This is a content 246', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
