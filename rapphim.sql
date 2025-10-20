-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2025 lúc 10:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `rapphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datghe`
--

CREATE TABLE `datghe` (
  `maDat` int(11) NOT NULL,
  `maXuatChieu` varchar(50) NOT NULL,
  `maGhe` varchar(10) NOT NULL,
  `trangThai` enum('trong','dat') NOT NULL DEFAULT 'trong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datghe`
--

INSERT INTO `datghe` (`maDat`, `maXuatChieu`, `maGhe`, `trangThai`) VALUES
(101, 'XC001', 'A1', 'trong'),
(102, 'XC001', 'A10', 'trong'),
(103, 'XC001', 'A2', 'trong'),
(104, 'XC001', 'A3', 'trong'),
(105, 'XC001', 'A4', 'trong'),
(106, 'XC001', 'A5', 'trong'),
(107, 'XC001', 'A6', 'trong'),
(108, 'XC001', 'A7', 'trong'),
(109, 'XC001', 'A8', 'trong'),
(110, 'XC001', 'A9', 'trong'),
(111, 'XC001', 'B1', 'trong'),
(112, 'XC001', 'B10', 'trong'),
(113, 'XC001', 'B2', 'trong'),
(114, 'XC001', 'B3', 'trong'),
(115, 'XC001', 'B4', 'trong'),
(116, 'XC001', 'B5', 'trong'),
(117, 'XC001', 'B6', 'trong'),
(118, 'XC001', 'B7', 'trong'),
(119, 'XC001', 'B8', 'trong'),
(120, 'XC001', 'B9', 'trong'),
(121, 'XC001', 'C1', 'trong'),
(122, 'XC001', 'C10', 'trong'),
(123, 'XC001', 'C2', 'trong'),
(124, 'XC001', 'C3', 'trong'),
(125, 'XC001', 'C4', 'trong'),
(126, 'XC001', 'C5', 'trong'),
(127, 'XC001', 'C6', 'trong'),
(128, 'XC001', 'C7', 'trong'),
(129, 'XC001', 'C8', 'trong'),
(130, 'XC001', 'C9', 'trong'),
(131, 'XC001', 'D1', 'trong'),
(132, 'XC001', 'D10', 'trong'),
(133, 'XC001', 'D2', 'trong'),
(134, 'XC001', 'D3', 'trong'),
(135, 'XC001', 'D4', 'trong'),
(136, 'XC001', 'D5', 'trong'),
(137, 'XC001', 'D6', 'trong'),
(138, 'XC001', 'D7', 'trong'),
(139, 'XC001', 'D8', 'trong'),
(140, 'XC001', 'D9', 'trong'),
(141, 'XC001', 'E1', 'trong'),
(142, 'XC001', 'E10', 'trong'),
(143, 'XC001', 'E2', 'trong'),
(144, 'XC001', 'E3', 'trong'),
(145, 'XC001', 'E4', 'trong'),
(146, 'XC001', 'E5', 'trong'),
(147, 'XC001', 'E6', 'trong'),
(148, 'XC001', 'E7', 'trong'),
(149, 'XC001', 'E8', 'trong'),
(150, 'XC001', 'E9', 'trong'),
(151, 'XC001', 'F1', 'trong'),
(152, 'XC001', 'F10', 'trong'),
(153, 'XC001', 'F2', 'trong'),
(154, 'XC001', 'F3', 'trong'),
(155, 'XC001', 'F4', 'trong'),
(156, 'XC001', 'F5', ''),
(157, 'XC001', 'F6', 'trong'),
(158, 'XC001', 'F7', 'trong'),
(159, 'XC001', 'F8', 'trong'),
(160, 'XC001', 'F9', 'trong'),
(161, 'XC001', 'G1', 'trong'),
(162, 'XC001', 'G10', 'trong'),
(163, 'XC001', 'G2', ''),
(164, 'XC001', 'G3', 'trong'),
(165, 'XC001', 'G4', 'trong'),
(166, 'XC001', 'G5', 'trong'),
(167, 'XC001', 'G6', 'trong'),
(168, 'XC001', 'G7', 'trong'),
(169, 'XC001', 'G8', 'trong'),
(170, 'XC001', 'G9', 'trong'),
(171, 'XC001', 'H1', 'trong'),
(172, 'XC001', 'H10', 'trong'),
(173, 'XC001', 'H2', 'trong'),
(174, 'XC001', 'H3', 'trong'),
(175, 'XC001', 'H4', 'trong'),
(176, 'XC001', 'H5', 'trong'),
(177, 'XC001', 'H6', 'trong'),
(178, 'XC001', 'H7', 'trong'),
(179, 'XC001', 'H8', 'trong'),
(180, 'XC001', 'H9', 'trong'),
(181, 'XC001', 'I1', 'trong'),
(182, 'XC001', 'I10', 'trong'),
(183, 'XC001', 'I2', 'trong'),
(184, 'XC001', 'I3', 'trong'),
(185, 'XC001', 'I4', 'trong'),
(186, 'XC001', 'I5', 'trong'),
(187, 'XC001', 'I6', 'trong'),
(188, 'XC001', 'I7', 'dat'),
(189, 'XC001', 'I8', 'dat'),
(190, 'XC001', 'I9', 'trong'),
(191, 'XC001', 'J1', 'trong'),
(192, 'XC001', 'J10', 'trong'),
(193, 'XC001', 'J2', 'trong'),
(194, 'XC001', 'J3', 'trong'),
(195, 'XC001', 'J4', 'trong'),
(196, 'XC001', 'J5', 'trong'),
(197, 'XC001', 'J6', 'trong'),
(198, 'XC001', 'J7', 'trong'),
(199, 'XC001', 'J8', 'trong'),
(200, 'XC001', 'J9', 'trong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghe`
--

CREATE TABLE `ghe` (
  `maGhe` varchar(10) NOT NULL,
  `maPhong` varchar(50) NOT NULL,
  `hang` char(1) NOT NULL,
  `cot` int(11) NOT NULL,
  `loai` enum('thuong','vip','sweetbox') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ghe`
--

INSERT INTO `ghe` (`maGhe`, `maPhong`, `hang`, `cot`, `loai`) VALUES
('A1', 'P001', 'A', 1, 'thuong'),
('A10', 'P001', 'A', 10, 'thuong'),
('A2', 'P001', 'A', 2, 'thuong'),
('A3', 'P001', 'A', 3, 'thuong'),
('A4', 'P001', 'A', 4, 'thuong'),
('A5', 'P001', 'A', 5, 'thuong'),
('A6', 'P001', 'A', 6, 'thuong'),
('A7', 'P001', 'A', 7, 'thuong'),
('A8', 'P001', 'A', 8, 'thuong'),
('A9', 'P001', 'A', 9, 'thuong'),
('B1', 'P001', 'B', 1, 'thuong'),
('B10', 'P001', 'B', 10, 'thuong'),
('B2', 'P001', 'B', 2, 'thuong'),
('B3', 'P001', 'B', 3, 'thuong'),
('B4', 'P001', 'B', 4, 'thuong'),
('B5', 'P001', 'B', 5, 'thuong'),
('B6', 'P001', 'B', 6, 'thuong'),
('B7', 'P001', 'B', 7, 'thuong'),
('B8', 'P001', 'B', 8, 'thuong'),
('B9', 'P001', 'B', 9, 'thuong'),
('C1', 'P001', 'C', 1, 'vip'),
('C10', 'P001', 'C', 10, 'vip'),
('C2', 'P001', 'C', 2, 'vip'),
('C3', 'P001', 'C', 3, 'vip'),
('C4', 'P001', 'C', 4, 'vip'),
('C5', 'P001', 'C', 5, 'vip'),
('C6', 'P001', 'C', 6, 'vip'),
('C7', 'P001', 'C', 7, 'vip'),
('C8', 'P001', 'C', 8, 'vip'),
('C9', 'P001', 'C', 9, 'vip'),
('D1', 'P001', 'D', 1, 'vip'),
('D10', 'P001', 'D', 10, 'vip'),
('D2', 'P001', 'D', 2, 'vip'),
('D3', 'P001', 'D', 3, 'vip'),
('D4', 'P001', 'D', 4, 'vip'),
('D5', 'P001', 'D', 5, 'vip'),
('D6', 'P001', 'D', 6, 'vip'),
('D7', 'P001', 'D', 7, 'vip'),
('D8', 'P001', 'D', 8, 'vip'),
('D9', 'P001', 'D', 9, 'vip'),
('E1', 'P001', 'E', 1, 'vip'),
('E10', 'P001', 'E', 10, 'vip'),
('E2', 'P001', 'E', 2, 'vip'),
('E3', 'P001', 'E', 3, 'vip'),
('E4', 'P001', 'E', 4, 'vip'),
('E5', 'P001', 'E', 5, 'vip'),
('E6', 'P001', 'E', 6, 'vip'),
('E7', 'P001', 'E', 7, 'vip'),
('E8', 'P001', 'E', 8, 'vip'),
('E9', 'P001', 'E', 9, 'vip'),
('F1', 'P001', 'F', 1, 'vip'),
('F10', 'P001', 'F', 10, 'vip'),
('F2', 'P001', 'F', 2, 'vip'),
('F3', 'P001', 'F', 3, 'vip'),
('F4', 'P001', 'F', 4, 'vip'),
('F5', 'P001', 'F', 5, 'vip'),
('F6', 'P001', 'F', 6, 'vip'),
('F7', 'P001', 'F', 7, 'vip'),
('F8', 'P001', 'F', 8, 'vip'),
('F9', 'P001', 'F', 9, 'vip'),
('G1', 'P001', 'G', 1, 'vip'),
('G10', 'P001', 'G', 10, 'vip'),
('G2', 'P001', 'G', 2, 'vip'),
('G3', 'P001', 'G', 3, 'vip'),
('G4', 'P001', 'G', 4, 'vip'),
('G5', 'P001', 'G', 5, 'vip'),
('G6', 'P001', 'G', 6, 'vip'),
('G7', 'P001', 'G', 7, 'vip'),
('G8', 'P001', 'G', 8, 'vip'),
('G9', 'P001', 'G', 9, 'vip'),
('H1', 'P001', 'H', 1, 'vip'),
('H10', 'P001', 'H', 10, 'vip'),
('H2', 'P001', 'H', 2, 'vip'),
('H3', 'P001', 'H', 3, 'vip'),
('H4', 'P001', 'H', 4, 'vip'),
('H5', 'P001', 'H', 5, 'vip'),
('H6', 'P001', 'H', 6, 'vip'),
('H7', 'P001', 'H', 7, 'vip'),
('H8', 'P001', 'H', 8, 'vip'),
('H9', 'P001', 'H', 9, 'vip'),
('I1', 'P001', 'I', 1, 'vip'),
('I10', 'P001', 'I', 10, 'vip'),
('I2', 'P001', 'I', 2, 'vip'),
('I3', 'P001', 'I', 3, 'vip'),
('I4', 'P001', 'I', 4, 'vip'),
('I5', 'P001', 'I', 5, 'vip'),
('I6', 'P001', 'I', 6, 'vip'),
('I7', 'P001', 'I', 7, 'vip'),
('I8', 'P001', 'I', 8, 'vip'),
('I9', 'P001', 'I', 9, 'vip'),
('J1', 'P001', 'J', 1, 'sweetbox'),
('J10', 'P001', 'J', 10, 'sweetbox'),
('J2', 'P001', 'J', 2, 'sweetbox'),
('J3', 'P001', 'J', 3, 'sweetbox'),
('J4', 'P001', 'J', 4, 'sweetbox'),
('J5', 'P001', 'J', 5, 'sweetbox'),
('J6', 'P001', 'J', 6, 'sweetbox'),
('J7', 'P001', 'J', 7, 'sweetbox'),
('J8', 'P001', 'J', 8, 'sweetbox'),
('J9', 'P001', 'J', 9, 'sweetbox');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maThanhvien` varchar(50) NOT NULL,
  `soDienthoai` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `tenThanhvien` varchar(50) NOT NULL,
  `matKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maThanhvien`, `soDienthoai`, `Email`, `tenThanhvien`, `matKhau`) VALUES
('1', 822320902, 'duc12@gmail.com', 'Bùi Việt Đức', '2'),
('TV_68e4d4b663512', 1, 'dat@gmail.com', 'Lê Tuấn Đạt', '$2y$10$8MjKpQFymGEFzQ8E69NFN.jKVXLWOqjoTXxVDER9JQGH56YP7DXOS'),
('TV_68ed1b772df87', 1, 'anh@gmail.com', 'Trần Tuấn Anh', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNhanvien` varchar(50) NOT NULL,
  `tenNhanvien` varchar(50) NOT NULL,
  `soDienthoai` int(11) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`maNhanvien`, `tenNhanvien`, `soDienthoai`, `diaChi`, `matKhau`, `Email`) VALUES
('1', 'Bùi Việt Đức', 822320902, 'Lạng Sơn', '1', 'duc@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `maPhim` varchar(50) NOT NULL,
  `tenPhim` varchar(50) NOT NULL,
  `hinhAnh` varchar(255) NOT NULL,
  `maLoai` varchar(50) NOT NULL,
  `maXuatchieu` varchar(50) NOT NULL,
  `ngayChieu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`maPhim`, `tenPhim`, `hinhAnh`, `maLoai`, `maXuatchieu`, `ngayChieu`) VALUES
('MP001', 'hill', 'hill.png', 'ML001', 'XC001', '1111-11-11'),
('MP002', 'parrot', 'parrot.png', 'ML002', 'XC001', '1111-11-11'),
('MP003', 'Tranh Giành Quyền Lực', '547857626_813476674548817_6096266279182237597_n.jpg', 'ML002', 'XC002', '2025-11-11'),
('MP004', 'Tết Ở Làng Địa Ngục', '486099888_1063647409122859_1252407638629859400_n.jpg', 'ML001', 'XC001', '2025-10-08'),
('MP005', 'Tử Chiến Trên Không', '522919041_1174611668037785_4808148504690933272_n.jpg', 'ML001', 'XC001', '2025-10-08'),
('MP006', 'CHAINSAW MAN - THE MOVIE: CHƯƠNG REZE', 'Chainsawman.png', 'ML001', 'XC003', '2025-10-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `maPhong` varchar(50) NOT NULL,
  `tenPhong` varchar(100) NOT NULL,
  `soHang` int(11) NOT NULL,
  `soCot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`maPhong`, `tenPhong`, `soHang`, `soCot`) VALUES
('P001', 'Phòng 1', 10, 10),
('P002', 'Phòng 2', 10, 10),
('P003', 'Phòng 3', 10, 10),
('P004', 'Phòng 4', 10, 10),
('P005', 'Phòng 5', 10, 10),
('P006', 'Phòng 6', 10, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `maQuanly` varchar(50) NOT NULL,
  `tenQuanly` varchar(50) NOT NULL,
  `soDienthoai` int(11) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`maQuanly`, `tenQuanly`, `soDienthoai`, `diaChi`, `matKhau`, `Email`) VALUES
('QL001', 'Bùi Việt Đức', 822320902, 'Lạng Sơn', '1', 'ducbui@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `maLoai` varchar(50) NOT NULL,
  `tenLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`maLoai`, `tenLoai`) VALUES
('ML001', 'kinh dị'),
('ML002', 'hài hước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `maTin` varchar(50) NOT NULL,
  `tenTin` varchar(50) NOT NULL,
  `ngayDang` date NOT NULL,
  `noiDung` text NOT NULL,
  `hinhAnh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`maTin`, `tenTin`, `ngayDang`, `noiDung`, `hinhAnh`) VALUES
('TT001', '1', '2025-12-10', '1', '1760528390_1760467887_images.jpg'),
('TT002', '123', '2025-11-11', '123', '1760528383_350x495_11_.jpg'),
('TT003', '3', '2025-10-31', '3333', '1760528411_1760463280_membership_cgv.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve`
--

CREATE TABLE `ve` (
  `maVe` int(11) NOT NULL,
  `maGhe` varchar(50) NOT NULL,
  `tongTien` double NOT NULL,
  `maXuatchieu` varchar(50) NOT NULL,
  `maPhim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ve`
--

INSERT INTO `ve` (`maVe`, `maGhe`, `tongTien`, `maXuatchieu`, `maPhim`) VALUES
(4, 'I7', 70000, 'XC001', 'MP001'),
(5, 'I8', 70000, 'XC001', 'MP001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatchieu`
--

CREATE TABLE `xuatchieu` (
  `maXuatchieu` varchar(50) NOT NULL,
  `ngayChieu` date NOT NULL,
  `thoiGianchieu` time NOT NULL,
  `maPhong` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xuatchieu`
--

INSERT INTO `xuatchieu` (`maXuatchieu`, `ngayChieu`, `thoiGianchieu`, `maPhong`) VALUES
('XC001', '2025-10-25', '23:30:00', 'P001'),
('XC002', '2025-10-25', '12:00:00', 'P002'),
('XC003', '2025-10-25', '12:30:00', 'P006');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `datghe`
--
ALTER TABLE `datghe`
  ADD PRIMARY KEY (`maDat`),
  ADD KEY `maXuatChieu` (`maXuatChieu`),
  ADD KEY `maGhe` (`maGhe`);

--
-- Chỉ mục cho bảng `ghe`
--
ALTER TABLE `ghe`
  ADD PRIMARY KEY (`maGhe`),
  ADD KEY `maPhong` (`maPhong`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maThanhvien`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNhanvien`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`maPhim`),
  ADD KEY `maLoai` (`maLoai`),
  ADD KEY `maXuatChieu` (`maXuatchieu`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maPhong`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`maQuanly`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`maTin`);

--
-- Chỉ mục cho bảng `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`maVe`),
  ADD KEY `maXuatChieu1` (`maXuatchieu`),
  ADD KEY `maPhim` (`maPhim`);

--
-- Chỉ mục cho bảng `xuatchieu`
--
ALTER TABLE `xuatchieu`
  ADD PRIMARY KEY (`maXuatchieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `datghe`
--
ALTER TABLE `datghe`
  MODIFY `maDat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT cho bảng `ve`
--
ALTER TABLE `ve`
  MODIFY `maVe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `datghe`
--
ALTER TABLE `datghe`
  ADD CONSTRAINT `datghe_ibfk_1` FOREIGN KEY (`maXuatChieu`) REFERENCES `xuatchieu` (`maXuatchieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `datghe_ibfk_2` FOREIGN KEY (`maGhe`) REFERENCES `ghe` (`maGhe`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ghe`
--
ALTER TABLE `ghe`
  ADD CONSTRAINT `ghe_ibfk_1` FOREIGN KEY (`maPhong`) REFERENCES `phong` (`maPhong`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `maLoai` FOREIGN KEY (`maLoai`) REFERENCES `theloai` (`maLoai`),
  ADD CONSTRAINT `maXuatChieu` FOREIGN KEY (`maXuatchieu`) REFERENCES `xuatchieu` (`maXuatchieu`);

--
-- Các ràng buộc cho bảng `ve`
--
ALTER TABLE `ve`
  ADD CONSTRAINT `maPhim` FOREIGN KEY (`maPhim`) REFERENCES `phim` (`maPhim`),
  ADD CONSTRAINT `maXuatChieu1` FOREIGN KEY (`maXuatchieu`) REFERENCES `xuatchieu` (`maXuatchieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
