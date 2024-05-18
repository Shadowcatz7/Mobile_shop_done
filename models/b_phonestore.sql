-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2024 at 01:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_phonestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet`
--

CREATE TABLE `bai_viet` (
  `ma_bv` int NOT NULL,
  `tieu_de` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_tieu_de` text COLLATE utf8mb4_unicode_ci,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `trang_thai` tinyint NOT NULL DEFAULT '0',
  `ngay_tao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bai_viet`
--

INSERT INTO `bai_viet` (`ma_bv`, `tieu_de`, `anh_tieu_de`, `noi_dung`, `trang_thai`, `ngay_tao`) VALUES
(4, 'Bài 12', 'public/posts/adf0d037cf82c4f75b8a26d9ae667e24.jpg', '<p>public/posts/Thiết kế chưa có tên.png</p>', 1, '2024-05-14 21:27:36'),
(6, 'Bài 1', 'public/posts/Thiết kế chưa có tên.png', '<p>public/posts/Thiết kế chưa có tên.png</p>', 1, '2024-05-14 22:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int NOT NULL,
  `ma_sp` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_bv` int DEFAULT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoi_tao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `ma_sp`, `ma_bv`, `noi_dung`, `nguoi_tao`, `ngay_tao`) VALUES
(1, 'SP1', NULL, '132', '13', '2024-05-15 08:08:27'),
(2, 'SP1', NULL, '123', '13', '2024-05-15 08:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `ct_don_hang`
--

CREATE TABLE `ct_don_hang` (
  `ma_dh` int NOT NULL,
  `ma_sp` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ct_don_hang`
--

INSERT INTO `ct_don_hang` (`ma_dh`, `ma_sp`, `so_luong`) VALUES
(6532, 'SP1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int NOT NULL,
  `ma_kh` int NOT NULL,
  `tong_tien` int NOT NULL,
  `phuong_thuc_thanh_toan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_lap_dh` date NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '0' COMMENT '0:ChuaThanhToan 1:DaThanhToan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`ma_dh`, `ma_kh`, `tong_tien`, `phuong_thuc_thanh_toan`, `ngay_lap_dh`, `trang_thai`) VALUES
(6532, 13, 2349000, 'Chuyển khoản', '2024-04-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loai_sp`
--

CREATE TABLE `loai_sp` (
  `ma_loai` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_loai_sp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_sp`
--

INSERT INTO `loai_sp` (`ma_loai`, `ten_loai_sp`) VALUES
('TH1', 'Samsung'),
('TH10', 'Masstel'),
('TH2', 'Xiaomi'),
('TH3', 'Realme'),
('TH4', 'Nokia'),
('TH5', 'Asus'),
('TH6', 'Apple'),
('TH7', 'Oppo'),
('TH8', 'Honor'),
('TH9', 'Vivo');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int NOT NULL,
  `ten_dang_nhap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ngay_sinh` date DEFAULT NULL,
  `so_dien_thoai` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioi_tinh` tinyint(1) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '1' COMMENT '1:customer; 0:admin',
  `trang_thai` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ten_dang_nhap`, `email`, `mat_khau`, `ho_ten`, `dia_chi`, `ngay_sinh`, `so_dien_thoai`, `gioi_tinh`, `role`, `trang_thai`) VALUES
(5, 'admin', 'hoamon146@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, 0, 1),
(13, 'khach1', 'khach1@gmail.com', '202cb962ac59075b964b07152d234b70', 'Khách', ' Việt Nam', '2024-04-05', '0987654321', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_loai_sp` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int DEFAULT NULL,
  `gia_ban` int DEFAULT NULL,
  `thong_tin_them` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai_sp` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_sp`, `ma_loai_sp`, `ten_sp`, `hinh_anh`, `so_luong`, `gia_ban`, `thong_tin_them`, `trang_thai_sp`) VALUES
('SP1', 'TH1', 'Điện Thoại AI - Samsung Galaxy S24 Plus - 12GB/512GB - Chính hãng', 's24-plus-den.jpg', 9, 2349000, ' Điện thoại Samsung Galaxy S24 Plus - Chính hãng được trang bị chipset Exynos 2400 for Galaxy, đảm bảo hiệu suất mạnh mẽ và ổn định. Bên cạnh đó, với màn hình 6.7 inch Dynamic AMOLED 2X QHD+ và tần số quét 120Hz, S24 Plus hứa hẹn mang lại trải nghiệm xem phim và chơi game mượt mà và sống động. Camera chính của điện thoại lên đến 50MP, cùng camera trước 12MP, tối ưu cho nhiếp ảnh và quay video chất lượng cao. Ngoài ra, pin của thiết bị ở mức dung lượng 4.900 mAh, đủ sức chơi game và lướt web cả ngày mà không lo hết pin.\r\n\r\nĐánh giá chi tiết Điện thoại Samsung Galaxy S24 Plus - Chính hãng\r\nSamsung Galaxy S24 Plus với những thông số cấu hình mạnh mẽ hứa hẹn sẽ đáp ứng mọi nhu cầu từ giải trí đến công việc của người dùng. Hãy cùng xem chi tiết những thông số cũng như đặc điểm của chiếc smartphone thế hệ mới này nhé', 1),
('SP2', 'TH1', 'Điện Thoại AI - Samsung Galaxy S24 Ultra - 12GB/1TB - Chính hãng', 's24-ultra-vang_638409930027889246.jpg', 9, 379900, ' Điện thoại Samsung Galaxy S24 Ultra - Chính hãng sở hữu màn hình 6.8 inch với độ phân giải QHD+, sử dụng công nghệ màn hình Dynamic AMOLED 2X. Đáng chú ý, S24 Ultra được trang bị con chip Snapdragon® 8 Gen 3 for Galaxy mạnh mẽ, hỗ trợ nhu cầu hiệu suất cao và quản lý nhiệt độ hiệu quả. Về camera, chiếc điện thoại này có thể sẽ có camera chính 200MP cùng camera trước 12MP và camera góc siêu rộng 12MP. Pin của thiết bị có dung lượng 5.000mAh.\r\n\r\nĐánh giá chi tiết Điện thoại Samsung Galaxy S24 Ultra - Chính hãng\r\nNhìn chung, phiên bản Ultra của S24 hứa hẹn sẽ trở thành lựa chọn hấp dẫn trong phân khúc smartphone cao cấp với các cải tiến đáng chú ý cả về màn hình, hiệu suất, camera và thời lượng PIN. Hãy cùng đi vào chi tiết nhé.\r\n\r\nThông số cấu hình chi tiết của Samsung Galaxy S24 Ultra\r\nChip: Snapdragon® 8 Gen 3 for Galaxy\r\n\r\nMàn hình: 6.8 inch, độ phân giải QHD+, Dynamic AMOLED 2X, 120Hz\r\n\r\nRAM: 12GB\r\n\r\nBộ nhớ trong: 256GB/512GB/1TB\r\n\r\nCamera: 200MP\r\n\r\nDung lượng PIN: 5.000mAh', 1),
('SP3', 'TH1', 'Điện thoại Samsung Galaxy A55 - 8GB/128GB - Chính hãng', 'a55-den-navy-7.jpg', 10, 8890000, 'Sở hữu ngay Samsung Galaxy A55 - Chính hãng, đẳng cấp cho mọi trải nghiệm với vẻ ngoài là khung viền kim loại sang trọng, tạo nên phong cách thời thượng cho người dùng. Hệ thống camera sau ấn tượng với camera chính 50MP sắc nét, camera góc siêu rộng 12MP bao trọn mọi khung cảnh, camera macro 5MP khám phá thế giới vi mô và camera trước 32MP cho ảnh selfie lung linh. Hiệu năng mạnh mẽ nhờ chip Exynos 1480 8 nhân, bên cạnh màn hình Super AMOLED cùng độ phân giải Full HD+ 1080 x 2400 cho trải nghiệm giải trí đỉnh cao. Cuối cùng là dung lượng pin lớn lên tới 5000mAh cho thời gian sử dụng thoải mái cả ngày dài.', 1),
('SP4', 'TH10', 'Điện thoại di động Masstel izi T2 4G - Chính hãng', 'masstel-izi-t2-4g.jpg', 10, 8890000, ' Sở hữu ngay Samsung Galaxy A55 - Chính hãng, đẳng cấp cho mọi trải nghiệm với vẻ ngoài là khung viền kim loại sang trọng, tạo nên phong cách thời thượng cho người dùng. Hệ thống camera sau ấn tượng với camera chính 50MP sắc nét, camera góc siêu rộng 12MP bao trọn mọi khung cảnh, camera macro 5MP khám phá thế giới vi mô và camera trước 32MP cho ảnh selfie lung linh. Hiệu năng mạnh mẽ nhờ chip Exynos 1480 8 nhân, bên cạnh màn hình Super AMOLED cùng độ phân giải Full HD+ 1080 x 2400 cho trải nghiệm giải trí đỉnh cao. Cuối cùng là dung lượng pin lớn lên tới 5000mAh cho thời gian sử dụng thoải mái cả ngày dài.', 1),
('SP5', 'TH10', 'Điện thoại di động Masstel Fami 12S 4G - Chính hãng', 'masstel-fami-12s-4g-2.jpg', 10, 8890000, ' Điện thoại di động Masstel izi T2 4G - Chính hãng', 1),
('SP6', 'TH2', 'Điện thoại Xiaomi 14 (12GB/256GB) - Chính hãng', 'xiaomi-14-black-7.jpg', 10, 20990000, ' Vào tháng 2 vừa qua, Xiaomi đã chính thức trình làng Xiaomi 14 series tại Trung Quốc với hai phiên bản quốc tế sở hữu nhiều thông số ấn tượng. Vậy hai phiên bản này là gì, có những màu sắc nào và có điểm gì nổi bật? Liệu đây có phải là hai mẫu smartphone đáng mua nhất trong phân khúc của năm nay không? Hãy cùng tìm hiểu ngay nhé.', 1),
('SP7', 'TH2', 'Điện thoại POCO X6 5G (8GB/256GB) - Chính hãng', 'poco-x6-5g-blue-3.jpg', 10, 6990000, ' Mang đến những cải tiến mới, POCO X6 5G 8GB/256GB sẽ khiến bạn trầm trồ trước sự hài hòa của thiết kế cổ điển và công nghệ hiện đại. Điện thoại được trang bị chipset Qualcomm Snapdragon 7s Gen 2 mạnh mẽ, cho hiệu suất ấn tượng cùng khả năng đa nhiệm hiệu quả. RAM 8GB cùng bộ nhớ 256GB vừa tăng tốc thiết bị với các thao tác vuốt mượt mà, vừa cho không gian lưu trữ rộng lớn. Trải nghiệm người dùng sẽ được nâng tầm cùng màn hình Flow AMOLED 6.67 inch, hỗ trợ hình ảnh với chất lượng 1.5K CrystalRes vô cùng sắc nét. Bộ ba camera 64MP tích hợp công nghệ cố định kép OIS & EIS hứa hẹn bắt trọn từng khoảnh khắc, cho các tấm hình nghệ thuật và bắt mắt.', 1),
('SP8', 'TH2', 'Điện thoại Redmi A3 (4GB/128GB) - Chính hãng', 'redmi-a3-green-7.jpg', 10, 2999000, ' Chỉ mới được ra mắt vào đầu năm nay nhưng Redmi A3 (4GB/128GB) - Chính hãng đã sớm được lòng người yêu công nghệ và cả những người dùng phổ thông. Điều này có được là nhờ vào bộ xử lý MediaTek Helio G36 đạt tốc độ đến 2.2 GHz trên thiết bị đi cùng với đó là RAM 4GB và bộ nhớ trong 128GB. Ngoài ra, chiếc điện thoại này còn sở hữu màn hình có tấm nền IPS LCD hiện đại với độ phân giải 720x1650 px và độ sáng 500 nits. Những ưu điểm này đã đủ đáp ứng tốt người dùng trong tầm giá 3 triệu đồng. Sự ưu việt chưa dừng lại ở đó mà còn thể hiện qua hệ thống camera kép cho phép quay phim đạt độ phân giải đến 1080p. Chính vì những điểm kể trên mà Redmi A3 đã chiếm trọn sự yêu thích người dùng trong phân khúc bình dân. ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`ma_bv`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`);

--
-- Indexes for table `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD PRIMARY KEY (`ma_dh`,`ma_sp`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_loai_sp` (`ma_loai_sp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `ma_bv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_dh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6708;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD CONSTRAINT `ct_don_hang_ibfk_1` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ct_don_hang_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `nguoi_dung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_loai_sp`) REFERENCES `loai_sp` (`ma_loai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
