-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 11:38 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nongsancantho`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) UNSIGNED NOT NULL,
  `binhluan_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_trang_thai` int(11) NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `chitietdonhang_so_luong` int(11) NOT NULL,
  `chitietdonhang_thanh_tien` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_nguoi_nhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_ghi_chu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `donhang_tong_tien` decimal(10,2) NOT NULL,
  `khachhang_id` int(10) UNSIGNED NOT NULL,
  `tinhtranghd_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donvitinh`
--

CREATE TABLE `donvitinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `donvitinh_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `donvitinh_mo_ta` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvitinh`
--

INSERT INTO `donvitinh` (`id`, `donvitinh_ten`, `donvitinh_mo_ta`, `created_at`, `updated_at`) VALUES
(1, 'VNĐ', '<p>Gi&aacute; sản phẩm t&iacute;nh theo đơn vị tiền tệ Việt Nam l&agrave; VNĐ</p>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinhsanpham_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`id`, `hinhsanpham_ten`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(1, 'J0001-1.jpg', 1, NULL, NULL),
(2, 'J0001-2.jpg', 1, NULL, NULL),
(3, 'J0001-3.jpg', 1, NULL, NULL),
(4, 'J0001-4.jpg', 1, NULL, NULL),
(5, 'J0001-5.jpg', 1, NULL, NULL),
(15, 'J0002-5.jpg', 3, NULL, NULL),
(14, 'J0002-4.jpg', 3, NULL, NULL),
(13, 'J0002-3.jpg', 3, NULL, NULL),
(12, 'J0002-2.jpg', 3, NULL, NULL),
(11, 'J0002-1.jpg', 3, NULL, NULL),
(16, 'D0001-1.jpg', 4, NULL, NULL),
(17, 'D0001-2.jpg', 4, NULL, NULL),
(18, 'D0001-3.jpg', 4, NULL, NULL),
(19, 'D0001-4.jpg', 4, NULL, NULL),
(20, 'D0001-4.jpg', 4, NULL, NULL),
(21, 'D0002-1.jpg', 5, NULL, NULL),
(22, 'D0002-2.jpg', 5, NULL, NULL),
(23, 'D0002-3.jpg', 5, NULL, NULL),
(24, 'D0002-4.jpg', 5, NULL, NULL),
(25, 'D0002-5.jpg', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `khachhang_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `khachhang_ten`, `khachhang_email`, `khachhang_sdt`, `khachhang_dia_chi`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'thientamnguyen', 'nguyenthientamduchoalongan@gmail.com', '935734548', '50 man thiện, tăng nhơn phú a, quận 9', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(10) UNSIGNED NOT NULL,
  `khuyenmai_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_phan_tram` int(11) NOT NULL,
  `khuyenmai_thoi_gian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `loainguoidung_ten` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `loaisanpham_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_mo_ta` longtext COLLATE utf8_unicode_ci,
  `loaisanpham_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_da_xoa` int(11) NOT NULL,
  `nhom_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `loaisanpham_ten`, `loaisanpham_url`, `loaisanpham_mo_ta`, `loaisanpham_anh`, `loaisanpham_da_xoa`, `nhom_id`, `created_at`, `updated_at`) VALUES
(1, 'Quần Jeans Nam', 'quan-jeans-nam', '<p style="text-align:start"><span style="font-size:12px"><strong>Quần jeans nam</strong><span style="font-size:12px"> </span>mới &nbsp;được thiết kế mới nhất<span style="font-size:12px">,<span style="font-size:12px">&nbsp;</span></span>c&oacute; kiểu d&aacute;ng đơn giản mang đến cho bạn nam sự năng động, trẻ trung. Chiếc<span style="font-size:12px">&nbsp;</span><strong><a href="http://thoitrangmessi.vn/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/quan-jeans-781.html" style="margin: 0px; cursor: pointer; text-decoration: none; color: rgb(229, 16, 29); border: medium none; font-size: 12px; outline: 0px; padding: 0px;" title="Quần jean, quan jeans">quần<span style="font-size:12px">&nbsp;</span></a></strong><span style="font-size:12px"><strong><a href="http://thoitrangmessi.vn/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/quan-jeans-781.html" style="margin: 0px; cursor: pointer; text-decoration: none; color: rgb(229, 16, 29); border: medium none; font-size: 12px; outline: 0px; padding: 0px;" title="Quần jean, quan jeans">jeans</a></strong><span style="font-size:12px">&nbsp;</span></span>được may từ chất liệu đẹp 100% cotton, th&ocirc;ng tho&aacute;ng vừa tạo n&eacute;t sang trọng cho trang phục<span style="font-size:12px">&nbsp;</span><strong><a href="http://thoitrangmessi.vn/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/san-pham/thoi-trang-nam-11.html" style="margin: 0px; cursor: pointer; text-decoration: none; color: rgb(229, 16, 29); border: medium none; font-size: 12px; outline: 0px; padding: 0px;" title="thời trang nam, thoi trang nam">thời trang nam</a></strong>, vừa tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Bạn c&oacute; thể mặc chiếc quần n&agrave;y trong nhiều dịp như: đi học, đi l&agrave;m, đi chơi&hellip;<span style="font-size:12px"> </span></span></p>\r\n\r\n<p style="text-align:start"><span style="font-size:12px">Size: 28 - 29 - 30 - 31 - 32 - 33 - 34</span></p>\r\n\r\n<p style="text-align:start">M&agrave;u: Đậm Trung b&igrave;nh Nhạt (48,45,42)</p>\r\n\r\n<p style="text-align:start"><span style="font-size:12px">- Sản phẩm được bảo h&agrave;nh miễn ph&iacute; trọn đời: thay n&uacute;t, l&ecirc;n lai, chỉnh sửa theo y&ecirc;u cầu ... tr&ecirc;n to&agrave;n quốc<br />\r\n- Được đổi h&agrave;ng trong v&ograve;ng 7 ng&agrave;y nếu kh&ocirc;ng vừa size&nbsp;<br />\r\n- Được đổi lại h&agrave;ng trong trường hợp sản phẩm bị lỗi trong qu&aacute; tr&igrave;nh sản xuất.</span></p>\r\n', 'jeans-nam-1.jpg', 0, 2, NULL, NULL),
(2, 'Đầm Xòe', 'dam-xoe', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">V&aacute;y&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;hot girl&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;dạ hội&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;dự tiệc đi chơi, v&aacute;y&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;ngủ</span></p>\r\n', 'dam.png', 0, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lohang`
--

CREATE TABLE `lohang` (
  `id` int(10) UNSIGNED NOT NULL,
  `lohang_ky_hieu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lohang_gia_mua_vao` decimal(10,2) NOT NULL,
  `lohang_gia_ban_ra` decimal(10,2) NOT NULL,
  `lohang_so_luong_nhap` int(11) NOT NULL,
  `lohang_so_luong_da_ban` int(11) NOT NULL,
  `lohang_so_luong_hien_tai` int(11) NOT NULL,
  `lohang_so_luong_doi_tra` int(11) NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `nhacungcap_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lohang`
--

INSERT INTO `lohang` (`id`, `lohang_ky_hieu`, `lohang_gia_mua_vao`, `lohang_gia_ban_ra`, `lohang_so_luong_nhap`, `lohang_so_luong_da_ban`, `lohang_so_luong_hien_tai`, `lohang_so_luong_doi_tra`, `sanpham_id`, `size_id`, `nhacungcap_id`, `created_at`, `updated_at`) VALUES
(2, 'J4321', '100000.00', '200000.00', 20, 0, 20, 0, 3, 2, 1, NULL, NULL),
(3, 'D1234', '400000.00', '999000.00', 10, 0, 10, 0, 4, 2, 1, NULL, NULL),
(4, 'D4321', '300000.00', '699000.00', 10, 0, 10, 0, 5, 2, 1, NULL, NULL),
(1, 'J1234', '100000.00', '200000.00', 20, 0, 20, 0, 1, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2016_04_14_110951_create_nhacungcap_table', 1),
('2016_04_28_141651_create-donvitinh-table', 1),
('2016_05_01_023512_create_nhom_table', 1),
('2016_05_01_023719_create_loaisanpham_table', 1),
('2016_05_13_102657_create_sanpham_table', 1),
('2016_05_13_103740_create_lohang_table', 1),
('2016_05_13_105811_create_hinhsanpham_table', 1),
('2016_05_13_162644_create_monngon_table', 1),
('2016_05_14_073949_create_nguyenlieu_table', 1),
('2016_05_17_075014_create_tuyendung_table', 1),
('2016_05_19_093429_create_khuyenmai_table', 1),
('2016_05_19_093815_create_sanphamkhuyenmai_table', 1),
('2016_05_20_091554_craete_pages_table', 1),
('2016_05_23_092444_create_loainguoidung_table', 1),
('2016_05_23_094448_create_nhanvien_table', 1),
('2016_06_01_081813_create_khachhang_table', 1),
('2016_06_01_084422_create_donhang_table', 1),
('2016_06_01_085225_create_tinhtranghd_table', 1),
('2016_06_01_090918_create_chitietdonhang_table', 1),
('2016_06_01_151838_create_binhluan_table', 1),
('2016_06_22_215955_create_quangcao_table', 1),
('2017_02_24_205724_create_sizes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monngon`
--

CREATE TABLE `monngon` (
  `id` int(10) UNSIGNED NOT NULL,
  `monngon_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monngon_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monngon_tom_tat` longtext COLLATE utf8_unicode_ci NOT NULL,
  `monngon_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `monngon_luot_xem` int(11) NOT NULL,
  `monngon_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monngon_da_xoa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `monngon_id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhacungcap_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_da_xoa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `nhacungcap_ten`, `nhacungcap_dia_chi`, `nhacungcap_sdt`, `nhacungcap_da_xoa`, `created_at`, `updated_at`) VALUES
(1, 'JeansKT', '<p>50 man thiện, phường tăng nhơn ph&uacute; a, quận 9</p>\r\n', '0935734548', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhanvien_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_cmnd` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_ngay_vao_lam` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhom`
--

CREATE TABLE `nhom` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhom_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_mo_ta` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhom`
--

INSERT INTO `nhom` (`id`, `nhom_ten`, `nhom_url`, `nhom_anh`, `nhom_mo_ta`, `created_at`, `updated_at`) VALUES
(2, 'Quần Jeans', 'quan-jeans', 'jeans-nam-1.jpg', '<p>Jeans (Miền Bắc Việt Nam gọi l&agrave; quần b&ograve;) l&agrave; một loại quần xuất xứ từ c&aacute;c nước phương T&acirc;y, v&agrave; l&agrave; một trong những biểu tượng của x&atilde; hội phương t&acirc;y v&agrave;o thế kỷ 20. Cụ thể, n&oacute; đ&atilde; từng l&agrave; biểu tượng cho tuổi trẻ, sự phản kh&aacute;ng, tự do v&agrave; cho chủ nghĩa c&aacute; nh&acirc;n của mọi tầng lớp nh&acirc;n d&acirc;n ở phương t&acirc;y. Đ&acirc;y l&agrave; phần y phục được b&aacute;n nhiều nhất tr&ecirc;n thế giới. Cả hai giới t&iacute;nh v&agrave; mọi tầng lớp x&atilde; hội, thuộc nhiều nền văn h&oacute;a đều c&oacute; thể mặc jeans.</p>\r\n', NULL, NULL),
(3, 'Đầm', 'dam', 'dam.png', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">V&aacute;y&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;hot girl&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;dạ hội&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;dự tiệc đi chơi, v&aacute;y&nbsp;</span><strong>đầm</strong><span style="background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:arial,helvetica,sans-serif; font-size:13px">&nbsp;ngủ</span></p>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quangcao`
--

CREATE TABLE `quangcao` (
  `id` int(10) UNSIGNED NOT NULL,
  `quangcao_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quangcao_trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quangcao`
--

INSERT INTO `quangcao` (`id`, `quangcao_anh`, `quangcao_trang_thai`, `created_at`, `updated_at`) VALUES
(7, 'jeans-nam.jpg', 1, NULL, NULL),
(4, 'jeans-nu.jpg', 1, NULL, NULL),
(6, 'dam.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `sanpham_ky_hieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_mo_ta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_luot_xem` int(11) NOT NULL,
  `sanpham_khuyenmai` int(11) NOT NULL,
  `sanpham_da_xoa` int(11) NOT NULL,
  `loaisanpham_id` int(10) UNSIGNED NOT NULL,
  `donvitinh_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `sanpham_ky_hieu`, `sanpham_ten`, `sanpham_url`, `sanpham_anh`, `sanpham_mo_ta`, `sanpham_luot_xem`, `sanpham_khuyenmai`, `sanpham_da_xoa`, `loaisanpham_id`, `donvitinh_id`, `created_at`, `updated_at`) VALUES
(1, 'J0001', 'Quần Jeans Nam Denim', 'quan-jeans-nam-denim', 'J0001.jpg', '<h2 style="font-style:normal; text-align:justify">Quần jeans nam Denim thời trang mẫu 2013 - Cho bạn th&ecirc;m trẻ trung, năng động, nam t&iacute;nh c&ugrave;ng phong c&aacute;ch thật mạnh mẽ</h2>\r\n', 0, 0, 0, 1, 1, '2017-03-12 06:45:04', '2017-03-12 13:07:50'),
(3, 'J0002', 'Quần Jean Nam Blue', 'quan-jean-nam-blue', 'J0002.jpg', '<p style="text-align:start">- Quần jeans nam blue thời trang thiết kế đơn giản, c&oacute; 2 t&uacute;i trước v&agrave; 2 t&uacute;i sau, form d&aacute;ng chuẩn.</p>\r\n\r\n<p style="text-align:start">- Chất liệu jean bền đẹp, kh&ocirc;ng phai m&agrave;u, đường may sắc sảo, cho thời gian sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p style="text-align:start">- Kết hợp dễ d&agrave;ng với nhiều kiểu &aacute;o thun, sơ mi để đi chơi, đến c&ocirc;ng sở&hellip;</p>\r\n\r\n<p style="text-align:start">- Mang đến cho ph&aacute;i mạnh vẻ năng động, trẻ trung v&agrave; gu thời trang đầy phong c&aacute;ch.</p>\r\n', 0, 0, 0, 1, 1, '2017-03-12 13:01:39', '2017-03-12 13:01:39'),
(4, 'D0001', 'Đầm Xoè Xếp Ly Sát Nách', 'dam-xoe-xep-ly-sat-nach', 'D0001.jpg', '<p><span style="background-color:rgb(255, 255, 255); color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">Đầm xo&egrave; s&aacute;t n&aacute;ch nhẹ nh&agrave;ng, tinh tế</span><br />\r\n<span style="background-color:rgb(255, 255, 255); color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất vải H&agrave;n Quốc cao cấp</span><br />\r\n<span style="background-color:rgb(255, 255, 255); color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- D&aacute;ng xo&egrave; xếp li trẻ trung</span><br />\r\n<span style="background-color:rgb(255, 255, 255); color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- C&oacute; l&oacute;t trong</span></p>\r\n', 0, 0, 0, 2, 1, '2017-03-12 13:27:05', '2017-03-12 13:27:05'),
(5, 'D0002', 'Đầm Xòe Cổ Phối Dây Kéo', 'dam-xoe-co-phoi-day-keo', 'D0002.jpg', '<div style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; background: 0px 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 20.8px;"><span style="font-size:16px">Một trong những sản phẩm cần phải c&oacute; của c&aacute;c bạn g&aacute;i - Đầm x&ograve;e c&ocirc;ng sở&nbsp;- sang chảnh v&agrave; thanh lịch&nbsp;cho mọi sự kiện đấy ạ.&nbsp;</span></div>\r\n\r\n<div style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; background: 0px 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 20.8px;"><br />\r\n<span style="color:rgb(0, 0, 0); font-family:roboto,arial,helvetica,sans-serif; font-size:16px">✔&nbsp;Chất liệu:&nbsp;</span><span style="color:rgb(0, 0, 0); font-size:16px">C&aacute;t len</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:roboto,arial,helvetica,sans-serif; font-size:16px">✔&nbsp;M&agrave;u sắc: Đỏ&nbsp;</span></div>\r\n\r\n<div style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; background: 0px 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 20.8px;"><span style="color:rgb(0, 0, 0); font-family:roboto,arial,helvetica,sans-serif; font-size:16px">✔ Kiểu d&aacute;ng: Đầm x&ograve;e, phối d&acirc;y k&eacute;o. &nbsp;</span></div>\r\n\r\n<div style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; background: 0px 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 20.8px;"><span style="color:rgb(0, 0, 0); font-family:roboto,arial,helvetica,sans-serif; font-size:16px">✔ Mục đ&iacute;ch sử dụng: C&ocirc;ng sở, dạo phố.</span></div>\r\n\r\n<div style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; background: 0px 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 20.8px;"><span style="color:rgb(0, 0, 0); font-family:roboto,arial,helvetica,sans-serif; font-size:16px">✔ Xuất xứ: Việt nam</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:roboto,arial,helvetica,sans-serif; font-size:16px">✔&nbsp;Sản phẩm Đầm nữ x&ograve;e freesize d&agrave;nh cho c&aacute;c bạn g&aacute;i từ 52kg trở xuống (t&ugrave;y chiều cao).&nbsp;</span></div>\r\n\r\n<div style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; background: 0px 0px; vertical-align: baseline; color: rgb(0, 0, 0); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 17px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 20.8px;"><span style="color:rgb(0, 0, 0); font-family:roboto,arial,helvetica,sans-serif; font-size:15px">- Đầm X&ograve;e Cổ Phối D&acirc;y K&eacute;o nổi bật v&agrave; trẻ trung hơn với thiết kế thanh lịch</span></div>\r\n', 0, 0, 0, 2, 1, '2017-03-12 13:41:34', '2017-03-12 13:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `sanphamkhuyenmai`
--

CREATE TABLE `sanphamkhuyenmai` (
  `khuyenmai_id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_ten` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_ten`) VALUES
(1, 's'),
(2, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtranghd`
--

CREATE TABLE `tinhtranghd` (
  `id` int(10) UNSIGNED NOT NULL,
  `tinhtranghd_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtranghd_mo_ta` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id` int(10) UNSIGNED NOT NULL,
  `tuyendung_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_mo_ta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_lien_he` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_thoi_gian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loainguoidung_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `loainguoidung_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sa', 'nguyenthientamduchoalongan@gmail.com', '$2y$10$AIoEkx4wwhZHFbEFHYryVeaRkmJP7H5ATsggycZUNZ4utXq2raqfS', 1, 'Yy7PnZwOQgvOLOfMov1hwhQTUMHA1B0PhPkF8sygR0rtiVo30dBW1UUypHM5', '2017-03-03 14:14:16', '2017-03-14 02:37:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_sanpham_id_foreign` (`sanpham_id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `chitietdonhang_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `chitietdonhang_donhang_id_foreign` (`donhang_id`),
  ADD KEY `chitietdonhang_size_id_foreign` (`size_id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_khachhang_id_foreign` (`khachhang_id`),
  ADD KEY `donhang_tinhtranghd_id_foreign` (`tinhtranghd_id`);

--
-- Indexes for table `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhsanpham_sanpham_id_foreign` (`sanpham_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khachhang_khachhang_email_unique` (`khachhang_email`),
  ADD KEY `khachhang_user_id_foreign` (`user_id`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaisanpham_nhom_id_foreign` (`nhom_id`);

--
-- Indexes for table `lohang`
--
ALTER TABLE `lohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lohang_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `lohang_size_id_foreign` (`size_id`),
  ADD KEY `lohang_nhacungcap_id_foreign` (`nhacungcap_id`);

--
-- Indexes for table `monngon`
--
ALTER TABLE `monngon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD KEY `nguyenlieu_monngon_id_foreign` (`monngon_id`),
  ADD KEY `nguyenlieu_sanpham_id_foreign` (`sanpham_id`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhanvien_nhanvien_cmnd_unique` (`nhanvien_cmnd`),
  ADD KEY `nhanvien_user_id_foreign` (`user_id`);

--
-- Indexes for table `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_loaisanpham_id_foreign` (`loaisanpham_id`),
  ADD KEY `sanpham_donvitinh_id_foreign` (`donvitinh_id`);

--
-- Indexes for table `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD KEY `sanphamkhuyenmai_khuyenmai_id_foreign` (`khuyenmai_id`),
  ADD KEY `sanphamkhuyenmai_sanpham_id_foreign` (`sanpham_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinhtranghd`
--
ALTER TABLE `tinhtranghd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_loainguoidung_id_foreign` (`loainguoidung_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lohang`
--
ALTER TABLE `lohang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `monngon`
--
ALTER TABLE `monngon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhom`
--
ALTER TABLE `nhom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tinhtranghd`
--
ALTER TABLE `tinhtranghd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
