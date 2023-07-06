-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2022 lúc 06:52 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangluong`
--

CREATE TABLE `bangluong` (
  `ID` int(11) NOT NULL,
  `IDNV` int(11) DEFAULT NULL,
  `heSoLuong` float DEFAULT NULL,
  `tienThuong` float DEFAULT NULL,
  `soGioLam` float DEFAULT NULL,
  `tongLuong` float DEFAULT NULL,
  `batDau` datetime NOT NULL,
  `ketThuc` datetime NOT NULL,
  `ngayLam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgianhanvien`
--

CREATE TABLE `danhgianhanvien` (
  `ID` int(11) NOT NULL,
  `IDNV` int(11) DEFAULT NULL,
  `diemTL` int(11) DEFAULT NULL,
  `xepLoai` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `ID` int(11) NOT NULL,
  `IDKH` int(11) DEFAULT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `binhLuan` varchar(999) DEFAULT NULL,
  `ngayBinhLuan` date DEFAULT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhgiasanpham`
--

INSERT INTO `danhgiasanpham` (`ID`, `IDKH`, `IDSP`, `binhLuan`, `ngayBinhLuan`, `star`) VALUES
(1, 1, 5, 'Sản phẩm rất Tốt', '2022-05-06', 0),
(2, 1, 5, 'Sản phẩm rất Tốt', '2022-05-06', 0),
(3, 1, 4, 'Sản phẩm rất Tốt', '2022-05-06', 0),
(4, 1, 5, 'Sản phẩm rất Tốt', '2022-05-06', 0),
(5, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(6, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(7, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(8, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(9, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(10, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(11, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(12, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(13, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(14, 1, 8, 'vải mịn mang rất mát, chất liệu rất tốt', '2022-05-02', 0),
(24, 1, 7, 'ZXCXZCZC', '2022-05-02', 0),
(25, 1, 7, 'zxvzxvz', '2022-05-02', 0),
(26, 1, 7, 'zxvzxvz', '2022-05-02', 0),
(27, 1, 7, 'zxvzxvz', '2022-05-02', 0),
(28, 1, 7, 'zxvzxvz', '2022-05-02', 0),
(32, 1, 11, 'zxcxzc', '2022-05-02', 0),
(33, 1, 6, 'ádasd', '2022-05-02', 0),
(34, 1, 6, 'ádasd', '2022-05-02', 0),
(35, 1, 6, 'ádasd', '2022-05-02', 0),
(36, 1, 6, 'ádasd', '2022-05-02', 0),
(37, 1, 9, 'zxczxc', '2022-05-02', 0),
(38, 1, 9, 'zxczxc', '2022-05-02', 0),
(39, 1, 9, 'zxczxc', '2022-05-02', 0),
(62, 1, 11, 'gdfgfdgdfgdfgdgdg', '2022-05-02', 0),
(63, 1, 11, 'sdfsdfsdfdsfsfdsfdsfs', '2022-05-02', 0),
(64, 1, 3, 'bi', '2022-05-02', 0),
(65, 1, 3, 'bi', '2022-05-02', 0),
(66, 1, 3, 'ádasdasdasd', '2022-05-02', 0),
(67, 1, 3, '', '2022-05-02', 0),
(68, 1, 92, 'ádasdasd', '2022-05-02', 0),
(69, 1, 92, '', '2022-05-02', 0),
(70, 1, 92, '', '2022-05-02', 0),
(71, 1, 92, 'mbnmnbmbnmb', '2022-05-02', 0),
(72, 1, 92, '', '2022-05-02', 0),
(73, 1, 92, '', '2022-05-02', 0),
(74, 1, 92, 'bvcbdfbdfbdbdfb', '2022-05-02', 0),
(76, 1, 52, 'bxbxbvvbx', '2022-05-02', 0),
(77, 1, 52, '', '2022-05-02', 0),
(78, 1, 52, '', '2022-05-02', 0),
(79, 1, 52, 'zxcvzxvzvzx', '2022-05-02', 0),
(80, 1, 52, 'eyeryeyeyerry', '2022-05-02', 0),
(81, 1, 84, 'ẻyeryeyeyeye', '2022-05-02', 0),
(82, 1, 84, 'ẻyeryeyeyeye', '2022-05-02', 0),
(83, 1, 84, 'ẻyeryeyeyeye', '2022-05-02', 0),
(84, 1, 84, 'bxcbxcbxcb', '2022-05-02', 0),
(85, 1, 84, 'bbcxbxcbxbc', '2022-05-02', 0),
(86, 1, 84, 'bbcxbxcbxbc', '2022-05-02', 0),
(87, 1, 84, 'bbcxbxcbxbc', '2022-05-02', 0),
(88, 1, 84, 'bbcxbxcbxbc', '2022-05-02', 0),
(89, 1, 84, 'bbcxbxcbxbc', '2022-05-02', 0),
(90, 1, 53, 'zbvxbv', '2022-05-02', 0),
(91, 1, 53, 'zbvxbv', '2022-05-02', 0),
(92, 1, 53, 'xcvcxv', '2022-05-02', 0),
(93, 1, 53, 'cvbcvbvc', '2022-05-02', 0),
(94, 1, 53, 'zxczxc', '2022-05-02', 0),
(95, 1, 53, 'sản phẩm tót', '2022-05-02', 0),
(96, 1, 53, 'bikunte', '2022-05-02', 0),
(97, 1, 53, 'zcvbzv', '2022-05-02', 0),
(98, 1, 53, 'anhdeptroai', '2022-05-02', 0),
(99, 1, 67, 'vải tốt sản phầm mềm', '2022-05-02', 0),
(100, 1, 82, 'Sản phẩm chất liệu tốt', '2022-05-02', 0),
(101, 6, 2, 'sản phẩm tốt', '2022-05-02', 0),
(102, 1, 2, 'đồ tốt', '2022-05-02', 0),
(103, 1, 26, 'Chất Liệu Tốt', '2022-05-02', 0),
(104, 1, 84, 'xcvxcvxcv', '2022-05-03', 0),
(105, 1, 84, 'ádadasdad', '2022-05-03', 0),
(106, 1, 84, 'bi', '2022-05-03', 0),
(107, 1, 84, 'bi', '2022-05-03', 0),
(108, 1, 54, 'zxczx', '2022-05-03', 0),
(109, 1, 54, 'zxczxczc', '2022-05-03', 0),
(110, 1, 54, 'zxczxczczxcz', '2022-05-03', 0),
(111, 1, 84, 'zxczxc', '2022-05-03', 0),
(112, 1, 84, 'zcvzcv', '2022-05-03', 0),
(113, 1, 84, 'zxczxczxcz', '2022-05-03', 0),
(114, 1, 82, 'bi', '2022-05-03', 0),
(115, 1, 82, 'zxczxc', '2022-05-03', 0),
(116, 1, 82, 'vxcbxb', '2022-05-03', 0),
(117, 1, 82, 'adsasdad', '2022-05-03', 0),
(118, 1, 54, 'xcvxcvxvxv', '2022-05-03', 0),
(119, 1, 2, 'rỷyr', '2022-05-07', 0),
(120, 1, 91, 'cvcxv', '2022-05-13', 0),
(121, 1, 5, 'zxczxc', '2022-05-15', 3),
(122, 1, 4, 'zxczxczxc', '2022-05-15', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ID` int(11) NOT NULL,
  `IDSanPham` int(11) DEFAULT NULL,
  `IDKhachHang` int(11) DEFAULT NULL,
  `soLuongDat` int(11) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `ThoiGianDH` date DEFAULT NULL,
  `trangThai` varchar(30) DEFAULT NULL,
  `nhanHang` varchar(30) DEFAULT NULL,
  `tongTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID`, `IDSanPham`, `IDKhachHang`, `soLuongDat`, `size`, `ThoiGianDH`, `trangThai`, `nhanHang`, `tongTien`) VALUES
(137, 6, 1, 5, 'x', '0000-00-00', 'Đã Hủy', '[value-8]', 0),
(277, 3, 1, 1, 'S', '2022-05-06', 'Đang Duyệt', 'Chưa Nhận', 25000),
(278, 3, 1, 1, 'S', '2022-05-06', 'Đang Duyệt', 'Chưa Nhận', 25000),
(279, 3, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 60000),
(281, 3, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 25000),
(282, 3, 1, 3, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 75000),
(283, 11, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 60000),
(284, 52, 1, 2, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 1100000),
(285, 10, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 60000),
(286, 5, 1, 2, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 1318000),
(287, 3, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 25000),
(288, 3, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 25000),
(289, 3, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 25000),
(290, 7, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 32000),
(291, 7, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 32000),
(292, 7, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 32000),
(293, 7, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 32000),
(294, 7, 1, 7, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 224000),
(295, 4, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 65000),
(296, 4, 1, 1, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 65000),
(297, 6, 1, 6, 'S', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 150000),
(298, 6, 1, 6, 'XL', '2022-05-15', 'Đang Duyệt', 'Chưa Nhận', 150000),
(299, 9, 1, 1, 'S', '2022-05-17', 'Đang Duyệt', 'Chưa Nhận', 60000),
(300, 9, 1, 3, 'S', '2022-05-17', 'Đang Duyệt', 'Chưa Nhận', 180000),
(301, 4, 1, 1, 'S', '2022-05-17', 'Đang Duyệt', 'Chưa Nhận', 65000),
(302, 4, 1, 1, 'S', '2022-05-17', 'Đang Duyệt', 'Chưa Nhận', 65000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID` int(11) NOT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `IDKH` int(11) DEFAULT NULL,
  `soLuongDat` int(11) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `tongTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`ID`, `IDSP`, `IDKH`, `soLuongDat`, `size`, `tongTien`) VALUES
(714, 64, 1, 1, 'S', 650000),
(715, 29, 1, 1, 'S', 450000),
(716, 29, 1, 1, 'S', 450000),
(717, 29, 1, 1, 'S', 450000),
(718, 29, 1, 1, 'S', 450000),
(719, 29, 1, 1, 'S', 450000),
(720, 29, 1, 1, 'S', 450000),
(721, 29, 1, 1, 'S', 450000),
(722, 29, 1, 1, 'S', 450000),
(723, 29, 1, 1, 'S', 450000),
(724, 29, 1, 1, 'S', 450000),
(725, 29, 1, 1, 'S', 450000),
(726, 29, 1, 1, 'S', 450000),
(727, 29, 1, 1, 'S', 450000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` int(11) NOT NULL,
  `tenDangNhap` varchar(50) DEFAULT NULL,
  `hoTen` varchar(30) DEFAULT NULL,
  `gioiTinh` varchar(10) DEFAULT NULL,
  `ngaySinh` date DEFAULT NULL,
  `SDT` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `diaChi` varchar(50) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `diemTL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID`, `tenDangNhap`, `hoTen`, `gioiTinh`, `ngaySinh`, `SDT`, `email`, `diaChi`, `avatar`, `diemTL`) VALUES
(1, 'nguyenquocanh', 'Nguyễn Quốc Anh', 'Nam', '2002-03-11', '01206241590', 'bikunte@gmail.com', '96/7 Nguyễn Huệ', 'Image/avatar/QA.jpg', NULL),
(6, 'ADMIN', 'Nguyễn Quốc Em', NULL, '0000-00-00', '01206241590', 'nguyenquocanh@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khohang`
--

CREATE TABLE `khohang` (
  `ID` int(11) NOT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `IDSize` int(11) DEFAULT NULL,
  `soLuongSP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khohang`
--

INSERT INTO `khohang` (`ID`, `IDSP`, `IDSize`, `soLuongSP`) VALUES
(2, 2, 1, 13),
(3, 2, 2, 15),
(4, 2, 3, 5),
(5, 2, 4, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsumuahang`
--

CREATE TABLE `lichsumuahang` (
  `ID` int(11) NOT NULL,
  `IDKH` int(11) DEFAULT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `soLuongDat` int(11) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `thoiGianNhanHang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichsumuahang`
--

INSERT INTO `lichsumuahang` (`ID`, `IDKH`, `IDSP`, `soLuongDat`, `size`, `thoiGianNhanHang`) VALUES
(1, 1, 5, 10, 'S', '2002-05-05'),
(2, 1, 5, 10, 'S', '2002-05-05'),
(3, 1, 6, 10, 'S', '2002-05-05'),
(4, 1, 7, 10, 'S', '2002-05-05'),
(5, 1, 7, 10, 'S', '2002-05-05'),
(6, 1, 9, 10, 'S', '2002-05-05'),
(7, 1, 11, 10, 'S', '2002-05-05'),
(8, 1, 12, 10, 'S', '2002-05-05'),
(9, 1, 76, 10, 'S', '2002-05-05'),
(10, 1, 55, 10, 'S', '2002-05-05'),
(11, 1, 77, 10, 'S', '2002-05-05'),
(12, 1, 25, 10, 'S', '2002-05-05'),
(13, 1, 27, 10, 'S', '2002-05-05'),
(14, 1, 28, 10, 'S', '2002-05-05'),
(15, 1, 29, 10, 'S', '2002-05-05'),
(16, 1, 30, 10, 'S', '2002-05-05'),
(17, 1, 30, 33, 'S', '2002-05-05'),
(18, 1, 32, 33, 'S', '2002-05-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `ID` int(11) NOT NULL,
  `tenMau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`ID`, `tenMau`) VALUES
(1, 'white'),
(2, 'aliceblue'),
(3, 'black'),
(4, 'bisque'),
(5, 'burlywood'),
(6, 'lightblue'),
(7, 'cadetblue'),
(8, 'cornflowerblue'),
(9, 'darkturquoise'),
(10, 'blue'),
(11, 'darkcyan'),
(12, 'green'),
(13, 'darkslateblue'),
(14, 'blueviolet'),
(15, 'hotpink'),
(16, 'darkorange'),
(17, 'coral'),
(18, 'gold'),
(19, 'red');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ID` int(11) NOT NULL,
  `hoTen` varchar(30) DEFAULT NULL,
  `gioiTinh` varchar(10) DEFAULT NULL,
  `ngaySinh` date DEFAULT NULL,
  `SDT` varchar(13) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `diaChi` varchar(50) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `chucVu` varchar(30) DEFAULT NULL,
  `tenDangNhap` varchar(50) DEFAULT NULL,
  `matKhau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `IDLoai` int(11) NOT NULL,
  `tenSP` varchar(50) NOT NULL,
  `giaSP` float DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `mieuTaSP` varchar(200) DEFAULT NULL,
  `imageSP` varchar(200) DEFAULT NULL,
  `giaGiam` float NOT NULL,
  `brand` text NOT NULL,
  `IDMau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `IDLoai`, `tenSP`, `giaSP`, `soLuong`, `mieuTaSP`, `imageSP`, `giaGiam`, `brand`, `IDMau`) VALUES
(2, 20, 'Áo Đỏ', 50000, 0, 'Không có', '\\QuanLyShop\\Image\\Ao Khoac\\1.png', 0, 'Nike', 0),
(3, 20, 'Pikachu', 60000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\2.png', 0, 'Nike', 0),
(4, 20, 'Pikachu', 65000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\3.png', 0, 'Nike', 0),
(5, 20, 'Pikachu', 759000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\4.png', 0, 'Nike', 0),
(6, 20, 'Pikachu', 25000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\5.png', 0, 'Nike', 18),
(7, 20, 'Pokemon', 32000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\6.png', 0, 'Nike', 0),
(8, 20, 'Pikachu', 123456, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\7.png', 0, '', 0),
(9, 20, 'Pikachu', 60000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\8.png', 0, '', 0),
(10, 20, 'Pikachu', 60000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\9.png', 0, '', 18),
(11, 20, 'Pikachu', 60000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\10.png', 0, '', 0),
(12, 20, 'Pikachu', 60000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\11.png', 0, '', 0),
(13, 20, 'Pikachu', 60000, 5, 'không có', '\\QuanLyShop\\Image\\Ao Khoac\\12.png', 0, '', 0),
(14, 1, 'Raichu', 500000, 6, '', '\\QuanLyShop\\Image\\Ao Nam\\7.png', 250000, '', 0),
(15, 1, 'Raichu', 32000, 6, '', '\\QuanLyShop\\Image\\Ao Nam\\2.png', 16000, '', 0),
(16, 1, 'Raichu', 55000, 6, '', '\\QuanLyShop\\Image\\Ao Nam\\3.png', 27500, '', 0),
(17, 1, 'Raichu', 42000, 6, '', '\\QuanLyShop\\Image\\Ao Nam\\4.png', 21000, '', 0),
(18, 1, 'Raichu', 15000, 6, '', '\\QuanLyShop\\Image\\Ao Nam\\5.png', 7500, '', 0),
(19, 1, 'Raichu', 500000, 6, '', '\\QuanLyShop\\Image\\Ao Nam\\6.png', 250000, '', 0),
(21, 1, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Ao Nam\\8.png', 225000, '', 0),
(22, 1, 'Kityy', 5500, 5, '', '\\QuanLyShop\\Image\\Ao Nam\\9.png', 2750, '', 0),
(23, 1, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Ao Nam\\10.png', 225000, '', 0),
(24, 1, 'Kityy', 35000, 5, '', '\\QuanLyShop\\Image\\Ao Nam\\11.png', 17500, '', 0),
(25, 1, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Ao Nam\\12.png', 225000, '', 0),
(26, 1, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Ao Nam\\13.png', 225000, '', 20),
(27, 1, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Ao Nam\\14.png', 225000, '', 0),
(28, 6, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\1.png', 0, '', 0),
(29, 6, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\2.png', 0, '', 0),
(30, 6, 'Kityy', 450000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\3.png', 0, '', 0),
(31, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\4.png', 0, '', 0),
(32, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\5.png', 0, '', 0),
(33, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\6.png', 0, '', 0),
(34, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\7.png', 0, '', 0),
(35, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\8.png', 0, '', 0),
(36, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\9.png', 0, '', 0),
(37, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\10.png', 0, '', 20),
(38, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\11.png', 0, '', 0),
(39, 6, 'Nice', 700000, 5, '', '\\QuanLyShop\\Image\\Áo Nữ\\12.png', 0, '', 0),
(40, 6, 'Raider', 220000, 7, '', '\\QuanLyShop\\Image\\Áo Nữ\\13.png', 0, '', 20),
(48, 17, 'Raider', 220000, 7, '', '\\QuanLyShop\\Image\\Aocaro\\1.png', 0, '', 0),
(49, 17, 'Raider', 220000, 7, '', '\\QuanLyShop\\Image\\Aocaro\\2.png', 0, '', 0),
(50, 17, 'Summer 1', 520000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\3.png', 0, '', 0),
(51, 17, 'Summer 2', 480000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\4.png', 0, '', 0),
(52, 17, 'Summer 2', 550000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\5.png', 0, '', 0),
(53, 17, 'Summer 2', 620000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\6.png', 0, '', 0),
(54, 17, 'Summer 4', 320000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\7.png', 0, '', 20),
(55, 17, 'Summer 5', 340000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\8.png', 0, '', 0),
(56, 17, 'Summer 5', 340000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\9.png', 0, '', 20),
(58, 17, 'Summer 5', 750000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\10.png', 0, '', 20),
(59, 17, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\11.png', 0, '', 0),
(61, 17, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Aocaro\\12.png', 0, '', 0),
(62, 2, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanNam\\1.png', 0, '', 0),
(64, 2, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanNam\\2.png', 0, '', 0),
(65, 2, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanNam\\3.png', 0, '', 0),
(66, 2, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanNam\\4.png', 0, '', 0),
(67, 2, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanNam\\5.png', 0, '', 0),
(68, 2, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanNam\\6.png', 0, '', 0),
(70, 25, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanKaki\\1.png', 0, '', 0),
(71, 25, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanKaki\\2.png', 0, '', 0),
(72, 25, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanKaki\\3.png', 0, '', 0),
(74, 25, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanKaki\\4.png', 0, '', 0),
(75, 25, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanKaki\\5.png', 0, '', 0),
(76, 25, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanKaki\\6.png', 0, '', 0),
(77, 25, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\QuanKaki\\7.png', 0, '', 0),
(78, 26, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Quanngan\\1.png', 0, '', 0),
(79, 26, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Quanngan\\2.png', 0, '', 0),
(80, 26, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Quanngan\\3.png', 0, '', 0),
(82, 26, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Quanngan\\4.png', 0, '', 0),
(83, 26, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Quanngan\\5.png', 0, '', 20),
(84, 26, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Quanngan\\6.png', 0, '', 0),
(85, 26, 'Summer 5', 650000, 5, 'Summer Elegant Floral Print Dress Women Kawaii Korean Sweet Style Lace Up Slimming Dress Female Puff Sleeve Party Dress 2021 - floral short dress / S', '\\QuanLyShop\\Image\\Quanngan\\7.png', 0, '', 0),
(87, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\1.png', 96000, 'Adidas', 0),
(91, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\2.png', 96000, 'Adidas', 0),
(92, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\3.png', 96000, 'Adidas', 0),
(93, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\4.png', 96000, 'Adidas', 0),
(94, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\5.png', 96000, 'Adidas', 0),
(95, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\6.png', 96000, 'Adidas', 0),
(96, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\7.png', 96000, 'Adidas', 0),
(97, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\8.png', 96000, 'Adidas', 0),
(98, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\9.png', 96000, 'Adidas', 20),
(99, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\10.png', 96000, 'Adidas', 0),
(100, 28, 'Winter', 320000, 6, 'Do you know how to style a sweater? No worries, seize this opportunity to learn how to style your favourite knit 10 different ways! Read more on LLEGANCE', '\\QuanLyShop\\Image\\Adidas\\11.png', 96000, 'Adidas', 0),
(101, 28, 'Adidas thể thao', 500000, 7, '[value-6]', '\\QuanLyShop\\Image\\Adidas\\12.png', 150000, 'Adidas', 20),
(102, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\1.png', 0, 'Nike', 20),
(103, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\2.png', 0, 'Nike', 0),
(104, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\3.png', 0, 'Nike', 20),
(105, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\4.png', 0, 'Nike', 0),
(106, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\5.png', 0, 'Nike', 20),
(107, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\6.png', 0, 'Nike', 0),
(108, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\7.png', 0, 'Nike', 0),
(109, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\8.png', 0, 'Nike', 0),
(110, 29, 'Nike', 650000, 5, '[value-6]', '\\QuanLyShop\\Image\\Nike\\9.png', 0, 'Nike', 0),
(111, 28, 'Nike', 570000, 0, '[value-6]', '\\QuanLyShop\\Image\\Nike\\10.png', 171000, 'Nike', 0),
(112, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\1.png', 0, '[value-9]', 0),
(113, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\2.png', 0, '[value-9]', 0),
(114, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\3.png', 0, '[value-9]', 0),
(115, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\4.png', 0, '[value-9]', 0),
(116, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\5.png', 0, '[value-9]', 0),
(117, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\6.png', 0, '[value-9]', 0),
(118, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\7.png', 0, '[value-9]', 0),
(119, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\8.png', 0, '[value-9]', 0),
(120, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\9.png', 0, '[value-9]', 0),
(121, 12, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Mu\\10.png', 0, '[value-9]', 0),
(122, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\1.jpg', 0, '[value-9]', 0),
(123, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\2.jpg', 0, '[value-9]', 20),
(124, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\3.jpg', 0, '[value-9]', 0),
(125, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\4.jpg', 0, '[value-9]', 0),
(126, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\5.jpg', 0, '[value-9]', 20),
(127, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\6.jpg', 0, '[value-9]', 0),
(128, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\7.jpg', 0, '[value-9]', 0),
(129, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\8.jpg', 0, '[value-9]', 0),
(130, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\9.jpg', 0, '[value-9]', 0),
(131, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\10.jpg', 0, '[value-9]', 0),
(132, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\11.jpg', 0, '[value-9]', 0),
(133, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\1.png', 0, '[value-9]', 0),
(134, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\2.png', 0, '[value-9]', 0),
(135, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\3.png', 0, '[value-9]', 0),
(136, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\4.png', 0, '[value-9]', 0),
(137, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\5.png', 0, '[value-9]', 0),
(138, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\6.png', 0, '[value-9]', 0),
(139, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\7.png', 0, '[value-9]', 20),
(140, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\10.png', 0, '[value-9]', 0),
(141, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\11.png', 0, '[value-9]', 20),
(142, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\12.png', 0, '[value-9]', 0),
(143, 14, 'Mũ', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Balo\\13.png', 0, '[value-9]', 0),
(144, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\1.png', 0, '[value-9]', 0),
(145, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\2.png', 0, '[value-9]', 0),
(146, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\3.png', 0, '[value-9]', 0),
(147, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\4.png', 0, '[value-9]', 0),
(148, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\5.png', 0, '[value-9]', 0),
(149, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\6.png', 0, '[value-9]', 0),
(150, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\7.png', 0, '[value-9]', 0),
(151, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\8.png', 0, '[value-9]', 0),
(152, 34, 'Kính', 57000, 5, '[value-6]', '\\QuanLyShop\\Image\\Kinh\\9.png', 0, '[value-9]', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `ID` int(11) NOT NULL,
  `Size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`ID`, `Size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukien`
--

CREATE TABLE `sukien` (
  `ID` int(11) NOT NULL,
  `IDTL` int(11) DEFAULT NULL,
  `tienGiam` float DEFAULT NULL,
  `ngayBatDau` date DEFAULT NULL,
  `ngayKetThuc` date DEFAULT NULL,
  `tenSK` text NOT NULL,
  `image` text NOT NULL,
  `noiDungSK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sukien`
--

INSERT INTO `sukien` (`ID`, `IDTL`, `tienGiam`, `ngayBatDau`, `ngayKetThuc`, `tenSK`, `image`, `noiDungSK`) VALUES
(3, 1, 50, '2022-05-17', '2022-05-21', 'Sinh nhật 1 tuổi Wibugangz', '\\QuanLyShop\\Image\\SuKien\\1.png', 'mừng sinh nhật sale tung bừng'),
(4, 28, 70, '2022-05-17', '2022-05-19', 'Va lung tung mông lung cùng Wibugangz', '\\QuanLyShop\\Image\\SuKien\\2.png', 'mừng sinh nhật sale tung bừng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(11) NOT NULL,
  `tenDangNhap` varchar(50) DEFAULT NULL,
  `matKhau` varchar(50) DEFAULT NULL,
  `kiemTra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `tenDangNhap`, `matKhau`, `kiemTra`) VALUES
(1, 'nguyenquocanh', '3747267', 0),
(6, 'ADMIN', '3747267', 2);

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `thanhvien`
--
CREATE TABLE `thanhvien` (
  `ID` int(11) NOT NULL,
  `tenDangNhap` varchar(50) DEFAULT NULL,
  `hoTen` varchar(50) DEFAULT NULL,
  `ngayCapNhat` date DEFAULT NULL,
  `ngayTao` date DEFAULT NULL,
  `matKhau` varchar(50) DEFAULT NULL,
  `kiemTra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

------------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `ID` int(11) NOT NULL,
  `tenTL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`ID`, `tenTL`) VALUES
(1, 'Áo Nam'),
(2, 'Quần Nam'),
(3, 'Giày'),
(4, 'Ba Lô'),
(5, 'Mũ'),
(6, 'Áo Nữ'),
(7, 'Quần Nữ'),
(8, 'Áo Khoác Nam'),
(9, 'Áo Khoác Nữ'),
(10, 'Đồ Đôi'),
(11, 'Dây Nịt'),
(12, 'Mũ'),
(13, 'Áo Vest'),
(14, 'Bộ Nam'),
(15, 'Bộ Nữ'),
(16, 'Áo sơ mi'),
(17, 'Áo ca rô'),
(18, 'Áo tay ngắn'),
(19, 'Áo tay dài'),
(20, 'Áo khoác'),
(23, 'Quần Jean'),
(24, 'Quần Jogger'),
(25, 'Quần Kaki'),
(26, 'Quần Ngắn'),
(27, 'Quần dài'),
(28, 'Giày Adidas'),
(29, 'Giày Nike'),
(30, 'Giày Converse'),
(31, 'Giày Balenciaga'),
(32, 'Giày new Balance'),
(33, 'Giày Puma'),
(34, 'Giày Vans'),
(35, 'Kính'),
(36, 'Ví da'),
(37, 'Đồng hồ'),
(38, 'Dây chuyền'),
(39, 'Nhẫn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDNV` (`IDNV`);

--
-- Chỉ mục cho bảng `danhgianhanvien`
--
ALTER TABLE `danhgianhanvien`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDNV` (`IDNV`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDKH` (`IDKH`),
  ADD KEY `IDSP` (`IDSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDSanPham` (`IDSanPham`),
  ADD KEY `IDKhachHang` (`IDKhachHang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDSP` (`IDSP`),
  ADD KEY `IDKH` (`IDKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDSP` (`IDSP`),
  ADD KEY `IDSize` (`IDSize`);

--
-- Chỉ mục cho bảng `lichsumuahang`
--
ALTER TABLE `lichsumuahang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDKH` (`IDKH`),
  ADD KEY `IDSP` (`IDSP`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDLoai` (`IDLoai`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDTL` (`IDTL`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgianhanvien`
--
ALTER TABLE `danhgianhanvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=728;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khohang`
--
ALTER TABLE `khohang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lichsumuahang`
--
ALTER TABLE `lichsumuahang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sukien`
--
ALTER TABLE `sukien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangluong`
--
ALTER TABLE `bangluong`
  ADD CONSTRAINT `bangluong_ibfk_1` FOREIGN KEY (`IDNV`) REFERENCES `nhanvien` (`ID`);

--
-- Các ràng buộc cho bảng `danhgianhanvien`
--
ALTER TABLE `danhgianhanvien`
  ADD CONSTRAINT `danhgianhanvien_ibfk_1` FOREIGN KEY (`IDNV`) REFERENCES `nhanvien` (`ID`);

--
-- Các ràng buộc cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `danhgiasanpham_ibfk_1` FOREIGN KEY (`IDKH`) REFERENCES `khachhang` (`ID`),
  ADD CONSTRAINT `danhgiasanpham_ibfk_2` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`ID`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`IDSanPham`) REFERENCES `sanpham` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`IDKhachHang`) REFERENCES `khachhang` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`ID`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`IDKH`) REFERENCES `khachhang` (`ID`);

--
-- Các ràng buộc cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD CONSTRAINT `khohang_ibfk_1` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`ID`),
  ADD CONSTRAINT `khohang_ibfk_2` FOREIGN KEY (`IDSize`) REFERENCES `size` (`ID`);

--
-- Các ràng buộc cho bảng `lichsumuahang`
--
ALTER TABLE `lichsumuahang`
  ADD CONSTRAINT `lichsumuahang_ibfk_1` FOREIGN KEY (`IDKH`) REFERENCES `khachhang` (`ID`),
  ADD CONSTRAINT `lichsumuahang_ibfk_2` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`ID`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDLoai`) REFERENCES `theloai` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD CONSTRAINT `sukien_ibfk_1` FOREIGN KEY (`IDTL`) REFERENCES `theloai` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
