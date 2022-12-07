-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 07:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `idSanPham` int(11) NOT NULL,
  `idNguoiDung` int(11) NOT NULL,
  `noiDung` text NOT NULL,
  `ngayBinhLuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `idSanPham`, `idNguoiDung`, `noiDung`, `ngayBinhLuan`) VALUES
(1, 42, 4, '', '07-12-2022'),
(2, 42, 4, 'hàng giả hàng kém chất lượng', '07-12-2022'),
(3, 42, 4, 'treo đầu dê bán thịt chó', '07-12-2022');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id` int(11) NOT NULL,
  `idSanPham` int(11) NOT NULL,
  `idHoaDon` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id`, `idSanPham`, `idHoaDon`, `soLuong`, `tenSanPham`, `hinh`, `gia`) VALUES
(12, 44, 9, 3, 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị', 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị.png', 211),
(13, 44, 10, 1, 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị', 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị.png', 211),
(14, 43, 11, 1, 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Hot Trend 1', 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Hot Trend 1.jpeg', 532),
(15, 43, 12, 1, 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Hot Trend 1', 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Hot Trend 1.jpeg', 532),
(16, 45, 13, 1, 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp – Mẫu Dynamic', 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp – Mẫu Dynamic.jpg', 421),
(17, 45, 14, 1, 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp – Mẫu Dynamic', 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp – Mẫu Dynamic.jpg', 421),
(18, 44, 15, 1, 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị', 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị.png', 211),
(19, 44, 16, 1, 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị', 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị.png', 211),
(20, 44, 17, 1, 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị', 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị.png', 211),
(21, 42, 18, 1, 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Ấn Tượng', 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Ấn Tượng.png', 308);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `soDT` varchar(255) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `idNguoiDung` int(11) NOT NULL,
  `pttt` int(11) NOT NULL DEFAULT 0 COMMENT '0: chuyển khoản, 1: khi nhận hàng',
  `ngayDatHang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `hoTen`, `email`, `soDT`, `diaChi`, `idNguoiDung`, `pttt`, `ngayDatHang`) VALUES
(9, '3r43t', 'rwe', '466546', 'fsfdfsd', 4, 0, '07-12-2022'),
(10, 'w5435', '435435', '4353453', '435435', 4, 0, '07-12-2022'),
(11, '345345', '43534', '4353', '43534', 4, 0, '07-12-2022'),
(12, 'dsafsgd', '54y6rh', '567', '356475u', 4, 0, '07-12-2022'),
(13, '5434', '4546', '856756', 'rthgfd', 4, 0, '07-12-2022'),
(14, '3443ter', 'ergregre', '4676543', 'wefsvcdwsd', 4, 0, '07-12-2022'),
(15, '43564', '56', '546756', '3567', 4, 0, '07-12-2022'),
(16, '45erf', '5645y', '546', '543345', 4, 0, '07-12-2022'),
(17, '43745', '65yhtrg', '345435', '4567uj', 4, 0, '07-12-2022'),
(18, '543t4erg', 'trgfdvc', '3464565443', '5ythgbv', 4, 0, '07-12-2022');

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `id` int(11) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `tenLoaiHang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`id`, `hinh`, `tenLoaiHang`) VALUES
(15, 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Ấn Tượng.png', 'Bánh Kem Sinh Nhật'),
(16, 'bánh cupcake.jpg', 'Bánh Ngọt'),
(17, 'Cheese Cake Japan.jpg', 'Bánh Ngọt Mini'),
(18, 'Bánh mì sốt gà nấm.jpg', 'Bánh Teabreak'),
(19, 'Red Velvet.jpg', 'Teabrea Box'),
(20, 'Bưởi da xanh.jpg', 'Trái Cây Tươi');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `tenTaiKhoan` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `soDienThoai` varchar(255) DEFAULT NULL,
  `vaiTro` int(11) NOT NULL DEFAULT 1 COMMENT 'o = admin, 1 = guest',
  `hinh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `tenTaiKhoan`, `matKhau`, `email`, `soDienThoai`, `vaiTro`, `hinh`) VALUES
(4, 'huy123123', '123123', 'testmail1@gmail.com', '345678790', 1, 'Sakura_Nene_CPP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `idLoaiHang` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL DEFAULT '',
  `gia` int(11) NOT NULL,
  `moTa` text NOT NULL DEFAULT '',
  `luotXem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `idLoaiHang`, `tenSanPham`, `hinh`, `gia`, `moTa`, `luotXem`) VALUES
(42, 15, 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Ấn Tượng', 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Ấn Tượng.png', 308, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm. ', 14),
(43, 15, 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Hot Trend 1', 'Bánh Cheese & Mousse Mix 4 Vị – Mẫu Hot Trend 1.jpeg', 532, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 8),
(44, 15, 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị', 'Bánh Kem Sinh Nhật – Bánh Cheese & Mousse Mix 6 Vị.png', 211, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 2),
(45, 15, 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp – Mẫu Dynamic', 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp – Mẫu Dynamic.jpg', 421, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(46, 15, 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp', 'Bánh Kem Sinh Nhật – Bánh Mousse Bắp.png', 211, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 11),
(47, 15, 'Bánh Kem Sinh Nhật – Bánh Mousse Chocolate', 'Bánh Kem Sinh Nhật – Bánh Mousse Chocolate.png', 231, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 14),
(48, 15, 'Bánh Sinh Nhật Kem Bắp – Mẫu Fancy', 'Bánh Sinh Nhật Kem Bắp – Mẫu Fancy.jpg', 111, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(49, 15, 'Bánh Sinh Nhật Kem Bắp – Mẫu Minimal', 'Bánh Sinh Nhật Kem Bắp – Mẫu Minimal.jpg', 422, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(50, 16, 'Bánh Cupcake', 'bánh cupcake.jpg', 211, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(51, 16, 'Bánh Ngọt Chery', 'bánh ngọt chery.jpg', 853, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 21),
(52, 16, 'Bánh Ngọt Hàn Quốc', 'bánh ngọt hàn quốc.jpg', 742, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(53, 16, 'Bánh Ngọt Kem', 'bánh ngọt kem.jpg', 112, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(54, 16, 'Bánh Ngọt Kem Vani', 'bánh ngọt kemvani.webp', 432, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(55, 16, 'Bánh Ngọt Kép', 'bánh ngọt kép.jpg', 123, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(56, 16, 'Bánh Ngọt Vị Dâu', 'bánh ngọt vị dâu.jpg', 642, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(57, 16, 'Bánh Ngọt Vị Matcha', 'bánh ngọt vị matcha.jpg', 565, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(58, 17, 'Cheese Cake Japan', 'Cheese Cake Japan.jpg', 211, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(59, 17, 'Fruit Tartlet', 'Fruit Tartlet.jpg', 742, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(60, 17, 'Green Tea Lemon', 'Green Tea Lemon.jpg', 212, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(61, 17, 'Matcha Redbean Rolls', 'Matcha Redbean Rolls.jpg', 775, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(62, 17, 'OC.Bông Lan Cuộn Trứng Muối', 'OC.bông lan cuộn trứng muối.jpg', 127, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(63, 17, 'Panna Cotta 3 Vị', 'Panna Cotta 3 vị.jpg', 211, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(64, 17, 'Red Velvet', 'Red Velvet.jpg', 276, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(65, 17, 'Redvelvet Tròn 2 Lớp', 'Redvelvet tròn 2 lớp.jpg', 754, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(66, 18, 'Bánh Mì Sốt Gà Nấm', 'Bánh mì sốt gà nấm.jpg', 264, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(67, 18, 'Chà Bông Gà Cay', 'Chà Bông Gà Cay.jpg', 864, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(68, 18, 'Danish Hamcheese', 'Danish hamcheese.jpg', 533, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(69, 18, 'Ham Basil Pastry Rolls', 'Ham Basil Pastry Rolls.jpeg', 752, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(70, 18, 'Pizza Delizi', 'Pizza Delizi.jpg', 222, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(71, 18, 'Sandwich Bacon Cheese Roll', 'Sandwich bacon cheese roll.jpeg', 234, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(72, 18, 'Spinach Pastry Rolls', 'Spinach Pastry Rolls.jpg', 211, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(73, 18, 'Xúc Xích Rắc Phô Mai', 'Xúc Xích Rắc Phô mai.jpg', 234, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(74, 19, 'Red Velvet', 'Red Velvet.jpg', 4353, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(75, 19, 'Redvelvet Tròn 2 Lớp', 'Redvelvet tròn 2 lớp.jpg', 235, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 1),
(76, 19, 'Teabreak Box 7', 'Teabreak box 7.jpg', 211, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(77, 15, 'Teabreak Box 20', 'Teabreak box 20.jpg', 213, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(78, 19, 'Teabreak Box 21', 'Teabreak box 21.jpg', 345, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(79, 19, 'Teabreak Box 34', 'Teabreak box 34.jpg', 212, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(80, 19, 'Teabreak Box Giáng Sinh 1', 'Teabreak box Giáng Sinh 1.jpeg', 268, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(81, 19, 'Teabreak Box Giáng Sinh 2', 'Teabreak Box Giáng Sinh 2.jpg', 421, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(82, 20, 'Bưởi Da Xanh', 'Bưởi da xanh.jpg', 322, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(83, 20, 'Cam Mỹ', 'Cam Mỹ.jpg', 754, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(84, 20, 'Happy Fruit', 'Happy Fruit.jpeg', 543, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(85, 20, 'KIWI', 'KIWI.jpg', 342, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(86, 20, 'Meeting Fruit', 'Meeting Fruit.jpeg', 221, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(87, 20, 'Nho Mỹ Đen', 'Nho Mỹ Đen.jpg', 321, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(88, 20, 'Táo Gala', 'Táo Gala.jpg', 742, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0),
(89, 20, 'Trái Cây Thập Cẩm', 'Trái cây thập cẩm.jpg', 753, 'Socola là một sản phẩm từ hạt ca cao được thu hoạch từ cây ca cao. Sau đây chúng ta sẽ cùng nghe câu chuyện về cách cacao được thu hoạch, vận chuyển và chế biến để biết sự kỳ diệu của sô cô la, hương vị và nghệ thuật của nó. Hạt của cây ca cao có vị đắng và trước tiên nó phải được lên men để phát triển hương vị. Sô cô la đến từ cây cacao, được biết đến với tên chính thức là Theobroma Cacao. Cây ca cao rất tinh tế và nhạy cảm cần được bảo vệ khỏi gió và cần có bóng râm, đặc biệt là trong những năm đầu. Vì vậy nó thường được trồng dưới tán của các cây khác. Một số chủng loại cây ca cao có thể cho quả sau 3 hoặc 4 năm.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk1_bl_sp` (`idSanPham`),
  ADD KEY `lk1_bl_nd` (`idNguoiDung`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk1_cthd_hd` (`idHoaDon`),
  ADD KEY `lk1_cthd_sp` (`idSanPham`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk1_nd_hd` (`idNguoiDung`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenTaiKhoan` (`tenTaiKhoan`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk1_sp_lh` (`idLoaiHang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk1_bl_nd` FOREIGN KEY (`idNguoiDung`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lk1_bl_sp` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `lk1_cthd_hd` FOREIGN KEY (`idHoaDon`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lk1_cthd_sp` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `lk1_nd_hd` FOREIGN KEY (`idNguoiDung`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk1_sp_lh` FOREIGN KEY (`idLoaiHang`) REFERENCES `loaihang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
