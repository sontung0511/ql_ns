-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2022 lúc 02:37 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_nhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bang_cap`
--

CREATE TABLE `bang_cap` (
  `id` int(11) NOT NULL,
  `ma_bang_cap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_bang_cap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bang_cap`
--

INSERT INTO `bang_cap` (`id`, `ma_bang_cap`, `ten_bang_cap`, `ghi_chu`, `nguoi_tao`, `ngay_tao`, `nguoi_sua`, `ngay_sua`) VALUES
(0, 'MBC1569664716', 'Không', '', 'Hà Sơn Tùng', '2021-12-28 16:58:36', 'Hà Sơn Tùng', '2021-12-28 16:58:36'),
(1, 'MBC1569651987', 'Bằng cử nhân', '', 'Hà Sơn Tùng', '2021-12-28 13:26:27', 'Hà Sơn Tùng', '2021-12-28 13:26:27'),
(2, 'MBC1569652012', 'Bằng thạc sĩ', '', 'Hà Sơn Tùng', '2021-12-28 13:26:52', 'Hà Sơn Tùng', '2021-12-28 13:26:52'),
(3, 'MBC1569652035', 'Bằng tiến sĩ', '', 'Hà Sơn Tùng', '2021-12-28 13:27:15', 'Hà Sơn Tùng', '2021-12-28 13:27:15'),
(4, 'MBC1569652169', 'Cử nhân khoa học xã hội', '', 'Hà Sơn Tùng', '2021-12-28 13:29:29', 'Hà Sơn Tùng', '2021-12-28 13:29:29'),
(5, 'MBC1569652180', 'Cử nhân khoa học tự nhiên', '', 'Hà Sơn Tùng', '2021-12-28 13:29:40', 'Hà Sơn Tùng', '2021-12-28 13:29:40'),
(8, 'MBC1569652431', 'Cử nhân quản trị kinh doanh', '', 'Hà Sơn Tùng', '2021-12-28 13:33:51', 'Hà Sơn Tùng', '2021-12-28 13:33:51'),
(9, 'MBC1569652436', 'Cử nhân thương mại và quản trị', '', 'Hà Sơn Tùng', '2021-12-28 13:33:56', 'Hà Sơn Tùng', '2021-12-28 13:33:56'),
(10, 'MBC1569652441', 'Cử nhân kế toán', '', 'Hà Sơn Tùng', '2021-12-28 13:34:01', 'Hà Sơn Tùng', '2021-12-28 13:34:01'),
(11, 'MBC1569652448', 'Cử nhân luật', '', 'Hà Sơn Tùng', '2021-12-28 13:34:08', 'Hà Sơn Tùng', '2021-12-28 13:34:08'),
(12, 'MBC1569652456', 'Cử nhân ngành quản trị và chính sách công', '', 'Hà Sơn Tùng', '2021-12-28 13:34:16', 'Hà Sơn Tùng', '2021-12-28 13:34:16'),
(13, 'MBC1569652463', 'Thạc sĩ khoa học xã hội', '', 'Hà Sơn Tùng', '2021-12-28 13:34:23', 'Hà Sơn Tùng', '2021-12-28 13:34:23'),
(14, 'MBC1569652469', 'Thạc sĩ khoa học tự nhiên', '', 'Hà Sơn Tùng', '2021-12-28 13:34:29', 'Hà Sơn Tùng', '2021-12-28 13:34:29'),
(15, 'MBC1569652475', 'Thạc sĩ quản trị kinh doanh', '', 'Hà Sơn Tùng', '2021-12-28 13:34:35', 'Hà Sơn Tùng', '2021-12-28 13:34:35'),
(16, 'MBC1569652481', 'Thạc sĩ kế toán', '', 'Hà Sơn Tùng', '2021-12-28 13:34:41', 'Hà Sơn Tùng', '2021-12-28 13:56:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id` int(11) NOT NULL,
  `ma_chuc_vu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_chuc_vu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `luong_ngay` double NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`id`, `ma_chuc_vu`, `ten_chuc_vu`, `luong_ngay`, `ghi_chu`, `nguoi_tao`, `ngay_tao`, `nguoi_sua`, `ngay_sua`) VALUES
(16, 'MCV1569203762', 'Phó giám đốc', 560000, '', 'Hà Sơn Tùng', '2021-12-23 08:56:02', 'Hà Sơn Tùng', '2021-10-01 16:33:10'),
(17, 'MCV1569203773', 'Giám đốc', 600000, '', 'Hà Sơn Tùng', '2021-12-23 08:56:13', 'Hà Sơn Tùng', '2021-10-02 12:59:00'),
(33, 'MCV1569204007', 'employee', 230000, '', 'Hà Sơn Tùng', '2021-12-23 12:00:07', 'Hà Sơn Tùng', '2021-10-01 16:20:43'),
(37, 'MCV1569985216', 'Trưởng phòng', 310000, '', 'Hà Sơn Tùng', '2021-10-02 10:00:16', 'Hà Sơn Tùng', '2021-10-02 10:00:16'),
(38, 'MCV1569985261', 'Phó phòng', 280000, '', 'Hà Sơn Tùng', '2021-10-02 10:01:01', 'Hà Sơn Tùng', '2021-10-02 10:01:01'),
(39, 'MCV1571105797', 'Marketing', 285000, '<p>Quảng b&aacute;, k&ecirc;u gọi kh&aacute;ch h&agrave;ng tham gia.</p>\r\n', 'Hà Sơn Tùng', '2021-10-15 12:16:37', 'Hà Sơn Tùng', '2021-10-15 12:16:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyen_mon`
--

CREATE TABLE `chuyen_mon` (
  `id` int(11) NOT NULL,
  `ma_chuyen_mon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_chuyen_mon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyen_mon`
--

INSERT INTO `chuyen_mon` (`id`, `ma_chuyen_mon`, `ten_chuyen_mon`, `ghi_chu`, `nguoi_tao`, `ngay_tao`, `nguoi_sua`, `ngay_sua`) VALUES
(0, 'MCM1569664640', 'Không', '', 'Hà Sơn Tùng', '2021-12-28 16:57:20', 'Hà Sơn Tùng', '2021-12-28 16:57:20'),
(2, 'MCM1569208526', 'Kế toán', '', 'Hà Sơn Tùng', '2021-12-23 10:15:26', 'Hà Sơn Tùng', '2021-12-23 10:15:26'),
(3, 'MCM1569208539', 'Công nghệ thông tin', '', 'Hà Sơn Tùng', '2021-12-23 10:15:39', 'Hà Sơn Tùng', '2021-12-23 10:15:39'),
(4, 'MCM1569208553', 'Quản trị nhà hàng - khách sạn', '', 'Hà Sơn Tùng', '2021-12-23 10:15:53', 'Hà Sơn Tùng', '2021-12-23 10:15:53'),
(5, 'MCM1569208562', 'Tiếp tân', '', 'Hà Sơn Tùng', '2021-12-23 10:16:02', 'Hà Sơn Tùng', '2021-12-23 10:16:02'),
(6, 'MCM1569208577', 'Sale', '', 'Hà Sơn Tùng', '2021-12-23 10:16:17', 'Hà Sơn Tùng', '2021-12-23 10:16:17'),
(7, 'MCM1569208618', 'Hành chính văn phòng', '', 'Hà Sơn Tùng', '2021-12-23 10:16:58', 'Hà Sơn Tùng', '2021-12-23 10:16:58'),
(8, 'MCM1569208631', 'Quản lý chất lượng', '', 'Hà Sơn Tùng', '2021-12-23 10:17:11', 'Hà Sơn Tùng', '2021-12-23 10:17:11'),
(9, 'MCM1569208648', 'Thương mại điện tử', '', 'Hà Sơn Tùng', '2021-12-23 10:17:28', 'Hà Sơn Tùng', '2021-12-23 10:17:28'),
(10, 'MCM1569208673', 'Tài chính', '', 'Hà Sơn Tùng', '2021-12-23 10:17:53', 'Hà Sơn Tùng', '2021-12-23 10:17:53'),
(11, 'MCM1569208680', 'Quản lý', '', 'Hà Sơn Tùng', '2021-12-23 10:18:00', 'Hà Sơn Tùng', '2021-12-23 10:18:00'),
(12, 'MCM1569208698', 'Maketing', '', 'Hà Sơn Tùng', '2021-12-23 10:18:18', 'Hà Sơn Tùng', '2021-12-28 13:05:19'),
(13, 'MCM1569208705', 'Khởi nghiệp', '', 'Hà Sơn Tùng', '2021-12-23 10:18:25', 'Hà Sơn Tùng', '2021-12-23 10:18:25'),
(14, 'MCM1569208731', 'Quản lý nguồn nhân lực', '', 'Hà Sơn Tùng', '2021-12-23 10:18:51', 'Hà Sơn Tùng', '2021-12-23 10:18:51'),
(15, 'MCM1569208740', 'Kinh doanh', '', 'Hà Sơn Tùng', '2021-12-23 10:19:00', 'Hà Sơn Tùng', '2021-12-23 10:19:00'),
(16, 'MCM1569208758', 'Vận tải và hậu cần', '', 'Hà Sơn Tùng', '2021-12-23 10:19:18', 'Hà Sơn Tùng', '2021-12-23 10:19:18'),
(17, 'MCM1569208771', 'Kinh doanh', '', 'Hà Sơn Tùng', '2021-12-23 10:19:31', 'Hà Sơn Tùng', '2021-12-23 10:19:31'),
(18, 'MCM1569208782', 'Bán lẻ', '', 'Hà Sơn Tùng', '2021-12-23 10:19:42', 'Hà Sơn Tùng', '2021-12-23 10:19:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_tac`
--

CREATE TABLE `cong_tac` (
  `id` int(11) NOT NULL,
  `ma_cong_tac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `dia_diem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `muc_dich` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cong_tac`
--

INSERT INTO `cong_tac` (`id`, `ma_cong_tac`, `nhanvien_id`, `ngay_bat_dau`, `ngay_ket_thuc`, `dia_diem`, `muc_dich`, `ghi_chu`, `nguoi_tao`, `ngay_tao`, `nguoi_sua`, `ngay_sua`) VALUES
(8, 'MCT1641438687', 14, '2022-01-06', '2186-03-12', '1111111111111', '<p>1111111111111111</p>\r\n', '111111111111111', 'Account Admin', '2022-01-06 10:11:27', '', '0000-00-00 00:00:00'),
(9, 'MCT1641476240', 15, '2022-01-06', '2022-02-21', 'adađâ', '<p>ad&acirc;d</p>\r\n', 'dâd', ' Admin', '2022-01-06 20:37:20', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dan_toc`
--

CREATE TABLE `dan_toc` (
  `id` int(11) NOT NULL,
  `ten_dan_toc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dan_toc`
--

INSERT INTO `dan_toc` (`id`, `ten_dan_toc`) VALUES
(1, 'Kinh'),
(2, 'Khơ-me'),
(3, 'Mường'),
(4, 'Thổ'),
(5, 'H\'Mông'),
(6, 'Ê-đê'),
(7, 'Bố Y'),
(8, 'Lào'),
(9, 'Tày'),
(10, 'Thái'),
(11, 'Nùng'),
(12, 'Khơ-mú'),
(13, 'M\'Nông'),
(14, 'Xơ Đăng'),
(15, 'Chăm'),
(16, 'Gia Rai'),
(17, 'Hoa'),
(18, 'Lô Lô'),
(19, 'Phù Lá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_nv`
--

CREATE TABLE `loai_nv` (
  `id` int(11) NOT NULL,
  `ma_loai_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_nv`
--

INSERT INTO `loai_nv` (`id`, `ma_loai_nv`, `ten_loai_nv`, `ghi_chu`, `nguoi_tao`, `ngay_tao`, `nguoi_sua`, `ngay_sua`) VALUES
(2, 'LNV1569654834', 'employee chính thức', '', 'Hà Sơn Tùng', '2021-12-28 14:13:54', 'Hà Sơn Tùng', '2021-12-28 14:13:54'),
(3, 'LNV1569654844', 'employee thực tập', '', 'Hà Sơn Tùng', '2021-12-28 14:14:04', 'Hà Sơn Tùng', '2021-12-28 14:14:04'),
(4, 'LNV1569654850', 'employee thời vụ', '', 'Hà Sơn Tùng', '2021-12-28 14:14:10', 'Hà Sơn Tùng', '2021-12-28 14:14:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `ma_nv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `biet_danh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `noi_sinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hon_nhan_id` int(11) NOT NULL,
  `so_cmnd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noi_cap_cmnd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_cap_cmnd` date NOT NULL,
  `nguyen_quan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quoc_tich_id` int(11) NOT NULL,
  `ton_giao_id` int(11) NOT NULL,
  `dan_toc_id` int(11) NOT NULL,
  `ho_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tam_tru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai_nv_id` int(11) NOT NULL,
  `trinh_do_id` int(11) NOT NULL,
  `chuyen_mon_id` int(11) NOT NULL,
  `bang_cap_id` int(11) NOT NULL,
  `phong_ban_id` int(11) NOT NULL,
  `chuc_vu_id` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `nguoi_tao_id` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua_id` int(11) NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ma_nv`, `hinh_anh`, `ten_nv`, `biet_danh`, `gioi_tinh`, `ngay_sinh`, `noi_sinh`, `hon_nhan_id`, `so_cmnd`, `noi_cap_cmnd`, `ngay_cap_cmnd`, `nguyen_quan`, `quoc_tich_id`, `ton_giao_id`, `dan_toc_id`, `ho_khau`, `tam_tru`, `loai_nv_id`, `trinh_do_id`, `chuyen_mon_id`, `bang_cap_id`, `phong_ban_id`, `chuc_vu_id`, `trang_thai`, `nguoi_tao_id`, `ngay_tao`, `nguoi_sua_id`, `ngay_sua`) VALUES
(14, 'MNV1641438624', '1641438624.jpg', 'tran hien van', 'van tho ngoc', 1, '2022-01-06', 'adâdâda', 2, '12122131313', 'Hue', '2022-01-06', 'dâdâd', 24, 0, 13, '123adâđâ', 'adâđa', 2, 12, 17, 16, 20, 33, 1, 1, '2022-01-06 10:10:24', 1, '2022-01-06 10:10:24'),
(15, 'MNV1641476050', 'demo-3x4.jpg', 'hasontung', '', 1, '2022-01-06', '1111', 1, '12122131313', 'Quy Nhơn', '2022-01-06', '1212', 2, 0, 18, '121', '212', 2, 17, 17, 14, 20, 17, 1, 1, '2022-01-06 20:34:10', 1, '2022-01-06 20:34:10'),
(16, 'MNV1641522863', 'demo-3x4.jpg', 'DaoHuyHoang', 'Hoang Dao', 1, '2001-01-01', 'quy nhon', 2, '21747755', 'Quy Nhơn', '2022-01-07', 'quy nhon', 17, 4, 1, 'quy nhon', 'quy nhon', 2, 17, 16, 16, 20, 17, 1, 1, '2022-01-07 09:34:23', 1, '2022-01-07 09:34:23'),
(17, 'MNV1641535996', 'demo-3x4.jpg', 'phạm ngọc tuân', 'Tùng đẹp', 1, '2022-01-07', 'aaaâ', 1, '21747755', 'Quy Nhơn', '2022-01-07', 'a', 16, 3, 3, 'a', 'a', 2, 16, 15, 15, 20, 16, 1, 1, '2022-01-07 13:13:16', 1, '2022-01-07 13:13:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_ban`
--

CREATE TABLE `phong_ban` (
  `id` int(11) NOT NULL,
  `ma_phong_ban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten_phong_ban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_sua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_ban`
--

INSERT INTO `phong_ban` (`id`, `ma_phong_ban`, `ten_phong_ban`, `ghi_chu`, `nguoi_tao`, `ngay_tao`, `nguoi_sua`, `ngay_sua`) VALUES
(20, 'MBP1569204111', 'Phòng tổ chức - hành chính', '', 'Hà Tùng', '2021-12-23 12:01:51', 'Hà Sơn Tùng', '2021-12-23 12:03:00'),
(22, 'MBP1569204129', 'Phòng tài chính - kế toán', '', 'Hà Tùng', '2021-12-23 12:02:12', 'Hà Sơn Tùng', '2021-12-23 12:03:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quoc_tich`
--

CREATE TABLE `quoc_tich` (
  `id` int(11) NOT NULL,
  `ten_quoc_tich` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quoc_tich`
--

INSERT INTO `quoc_tich` (`id`, `ten_quoc_tich`) VALUES
(1, 'Danish'),
(2, 'Đan Mạch'),
(3, 'British / English'),
(4, 'Anh'),
(5, 'Estonian'),
(6, 'Estonia'),
(7, 'Finnish'),
(8, 'Phần Lan'),
(9, 'Icelandic'),
(10, 'Irish'),
(11, 'Ireland'),
(12, 'Latvian'),
(13, 'Latvia'),
(14, 'Lithuanian'),
(15, 'Norwegian'),
(16, 'Na Uy'),
(17, 'Canada'),
(18, 'Scotland'),
(19, 'Thụy Điển'),
(20, 'Tây Ban Nha'),
(21, 'Séc'),
(22, 'Ba Lan'),
(23, 'Mỹ'),
(24, 'Việt Nam'),
(25, 'Ấn Độ'),
(26, 'Trung Quốc'),
(27, 'Mông Cổ'),
(28, 'Triều Tiên'),
(29, 'Đài Loan'),
(30, 'Campuchia'),
(31, 'Indonesia'),
(32, 'Lào'),
(33, 'Philipin'),
(34, 'Thái Lan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ho` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` tinyint(1) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `truy_cap` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `ten`, `ho`, `hinh_anh`, `email`, `mat_khau`, `so_dt`, `quyen`, `trang_thai`, `truy_cap`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'Admin', '', 'admin.png', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '129999999999', 1, 1, 65, '2021-12-12 00:00:00', '2021-12-17 06:32:36'),
(23, 'hasontung', '', 'admin.png', 'hasontung', '2e0a0c023919bf0961b3284e85547300', '0911420295', 1, 1, 1, '2022-01-07 12:59:51', '2022-01-07 12:59:51'),
(24, 'tran hien van', '', 'admin.png', 'tran hien van', '8741d247ec56d6076ed5ead249733957', '0911420295', 0, 1, 1, '2022-01-07 13:00:44', '2022-01-07 13:00:44'),
(25, 'phạm ngọc tuân', '', 'admin.png', 'phạm ngọc tuân', 'fa698bdd6feb41c0a30d9c94a422a1af', '0911420295', 0, 1, 1, '2022-01-07 13:13:38', '2022-01-07 13:13:38'),
(26, 'DaoHuyHoang', '', 'admin.png', 'DaoHuyHoang@gmail.com', 'fb05bec33c63c2a22d86c46850269bdc', '0981138845', 1, 1, 0, '2022-01-07 20:05:29', '2022-01-07 20:05:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_register`
--

CREATE TABLE `tb_register` (
  `id` int(11) NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `songaynghi` int(11) NOT NULL,
  `lydo` text NOT NULL,
  `chitiet` varchar(50) NOT NULL,
  `tennhanvien` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_trang_hon_nhan`
--

CREATE TABLE `tinh_trang_hon_nhan` (
  `id` int(11) NOT NULL,
  `ten_tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_trang_hon_nhan`
--

INSERT INTO `tinh_trang_hon_nhan` (`id`, `ten_tinh_trang`) VALUES
(1, 'Độc thân'),
(2, 'Đính hôn'),
(3, 'Có gia đình'),
(4, 'Ly thân'),
(5, 'Ly hôn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ton_giao`
--

CREATE TABLE `ton_giao` (
  `id` int(11) NOT NULL,
  `ten_ton_giao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ton_giao`
--

INSERT INTO `ton_giao` (`id`, `ten_ton_giao`) VALUES
(0, 'Không'),
(1, 'Phật giáo'),
(2, 'Thiên chúa giáo'),
(3, 'Đạo tin lành'),
(4, 'Hồi giáo'),
(5, 'Do Thái giáo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinh_do`
--

CREATE TABLE `trinh_do` (
  `id` int(11) NOT NULL,
  `ma_trinh_do` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten_trinh_do` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `nguoi_sua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trinh_do`
--

INSERT INTO `trinh_do` (`id`, `ma_trinh_do`, `ten_trinh_do`, `ghi_chu`, `nguoi_tao`, `ngay_tao`, `nguoi_sua`, `ngay_sua`) VALUES
(1, 'MTD1569206480', '1/12', '<p>Tr&igrave;nh độ lớp 1/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:41:20', 'Hà Sơn Tùng', '2021-12-23 12:41:20'),
(2, 'MTD1569206546', '2/12', '<p>Tr&igrave;nh độ lớp 2/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:42:26', 'Hà Sơn Tùng', '2021-12-23 12:42:26'),
(3, 'MTD1569206555', '3/12', '<p>Tr&igrave;nh độ lớp 3/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:42:35', 'Hà Sơn Tùng', '2021-12-23 12:42:35'),
(4, 'MTD1569206570', '4/12', '<p>Tr&igrave;nh độ lớp 4/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:42:50', 'Hà Sơn Tùng', '2021-12-23 12:42:50'),
(5, 'MTD1569206579', '5/12', '<p>Tr&igrave;nh độ lớp 5/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:42:59', 'Hà Sơn Tùng', '2021-12-23 12:42:59'),
(6, 'MTD1569206590', '6/12', '<p>Tr&igrave;nh độ lớp 6/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:43:10', 'Hà Sơn Tùng', '2021-12-23 12:43:10'),
(7, 'MTD1569206604', '7/12', '<p>Tr&igrave;nh độ lớp 7/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:43:24', 'Hà Sơn Tùng', '2021-12-23 12:57:12'),
(8, 'MTD1569206616', '8/12', '<p>Tr&igrave;nh độ lớp 8/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:43:36', 'Hà Sơn Tùng', '2021-12-23 12:43:36'),
(9, 'MTD1569206628', '9/12', '<p>Tr&igrave;nh độ lớp 9/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:43:48', 'Hà Sơn Tùng', '2021-12-23 12:43:48'),
(10, 'MTD1569206638', '10/12', '<p>Tr&igrave;nh độ lớp 10/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:43:58', 'Hà Sơn Tùng', '2021-12-23 12:43:58'),
(11, 'MTD1569206649', '11/12', '<p>Tr&igrave;nh độ lớp 11/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:44:12', 'Hà Sơn Tùng', '2021-12-23 12:56:56'),
(12, 'MTD1569206662', '12/12', '<p>Tr&igrave;nh độ lớp 12/12</p>\r\n', 'Hà Sơn Tùng', '2021-12-23 12:44:22', 'Hà Sơn Tùng', '2021-12-23 10:51:16'),
(15, 'MTD1569651298', 'Trung cấp', '', 'Hà Sơn Tùng', '2021-12-28 13:14:58', 'Hà Sơn Tùng', '2021-12-28 13:14:58'),
(16, 'MTD1569651304', 'Cao đẳng', '', 'Hà Sơn Tùng', '2021-12-28 13:15:04', 'Hà Sơn Tùng', '2021-12-28 13:15:04'),
(17, 'MTD1569651310', 'Đại học', '', 'Hà Sơn Tùng', '2021-12-28 13:15:10', 'Hà Sơn Tùng', '2021-12-28 13:15:10'),
(18, 'MTD1569651317', 'Cao học', '', 'Hà Sơn Tùng', '2021-12-28 13:15:17', 'Hà Sơn Tùng', '2021-12-28 13:15:26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bang_cap`
--
ALTER TABLE `bang_cap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuyen_mon`
--
ALTER TABLE `chuyen_mon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cong_tac`
--
ALTER TABLE `cong_tac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`);

--
-- Chỉ mục cho bảng `dan_toc`
--
ALTER TABLE `dan_toc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_nv`
--
ALTER TABLE `loai_nv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quoc_tich_id` (`quoc_tich_id`),
  ADD KEY `ton_giao_id` (`ton_giao_id`),
  ADD KEY `dan_toc_id` (`dan_toc_id`),
  ADD KEY `loai_nv_id` (`loai_nv_id`),
  ADD KEY `chuyen_mon_id` (`chuyen_mon_id`),
  ADD KEY `trinh_do_id` (`trinh_do_id`),
  ADD KEY `bang_cap_id` (`bang_cap_id`),
  ADD KEY `phong_ban_id` (`phong_ban_id`),
  ADD KEY `chuc_vu_id` (`chuc_vu_id`),
  ADD KEY `nguoi_tao_id` (`nguoi_tao_id`),
  ADD KEY `nguoi_sua_id` (`nguoi_sua_id`);

--
-- Chỉ mục cho bảng `phong_ban`
--
ALTER TABLE `phong_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quoc_tich`
--
ALTER TABLE `quoc_tich`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinh_trang_hon_nhan`
--
ALTER TABLE `tinh_trang_hon_nhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ton_giao`
--
ALTER TABLE `ton_giao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trinh_do`
--
ALTER TABLE `trinh_do`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bang_cap`
--
ALTER TABLE `bang_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `chuyen_mon`
--
ALTER TABLE `chuyen_mon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `cong_tac`
--
ALTER TABLE `cong_tac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dan_toc`
--
ALTER TABLE `dan_toc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `loai_nv`
--
ALTER TABLE `loai_nv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `phong_ban`
--
ALTER TABLE `phong_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `quoc_tich`
--
ALTER TABLE `quoc_tich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tinh_trang_hon_nhan`
--
ALTER TABLE `tinh_trang_hon_nhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ton_giao`
--
ALTER TABLE `ton_giao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `trinh_do`
--
ALTER TABLE `trinh_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cong_tac`
--
ALTER TABLE `cong_tac`
  ADD CONSTRAINT `cong_tac_ibfk_1` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`quoc_tich_id`) REFERENCES `quoc_tich` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`ton_giao_id`) REFERENCES `ton_giao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_3` FOREIGN KEY (`dan_toc_id`) REFERENCES `dan_toc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_4` FOREIGN KEY (`loai_nv_id`) REFERENCES `loai_nv` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_5` FOREIGN KEY (`trinh_do_id`) REFERENCES `trinh_do` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_6` FOREIGN KEY (`chuyen_mon_id`) REFERENCES `chuyen_mon` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_7` FOREIGN KEY (`bang_cap_id`) REFERENCES `bang_cap` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_8` FOREIGN KEY (`phong_ban_id`) REFERENCES `phong_ban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_9` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
