-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 24, 2020 lúc 05:01 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_1` int(11) NOT NULL,
  `id_2` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `message`
--

INSERT INTO `message` (`id`, `id_1`, `id_2`, `text`) VALUES
(12, 2, 1, 'iiiiii'),
(13, 2, 1, 'sao thế'),
(15, 1, 2, 'haaaaaa'),
(16, 2, 3, 'ê'),
(17, 3, 2, 'j'),
(18, 1, 2, 'hào'),
(20, 1, 2, 'alo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `link` varchar(300) NOT NULL,
  `ex` varchar(300) NOT NULL,
  `type` int(11) NOT NULL,
  `users` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `upload`
--

INSERT INTO `upload` (`id`, `link`, `ex`, `type`, `users`) VALUES
(5, 'Báo cáo AI.docx', '', 0, 'Phương'),
(9, 'Chuong1_CacKhaiNiemCoBan2.pdf', '', 0, 'Huấn'),
(11, 'Chuong2.pdf', '', 0, 'Phương'),
(12, 'Chuong3.pdf', '', 0, 'Phương'),
(13, 'Chuong6.pdf', '5', 1, 'Anh Hào'),
(14, 'Chuong5.pdf', '9', 1, 'Anh Hào');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contactno` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `email`, `contactno`, `position`) VALUES
(1, 'Phương', 'Kiều', 'admin', '123456', 'phuongktn@gmail.com', '123456789', 'Teacher'),
(2, 'Anh Hào', 'Lê', 'hocsinh1', '111111', 'haotwentynine@gmail.com', '0337468877', 'Student'),
(3, 'Tiến Dũng', 'Nguyễn', 'hocsinh2', '123456', 'dungnt@gmail.com', '12345678', 'Student'),
(4, 'Huấn', 'Lê', 'admin2', '123456', 'huanle@gmail.com', '0123456789', 'Teacher'),
(9, 'Đức Phi', 'Bùi', 'hocsinh3', '123456', 'phibd@gmail.com', '2311313131', 'Student');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
