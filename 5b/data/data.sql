-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2020 lúc 09:35 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.3.22

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
-- Cấu trúc bảng cho bảng `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `suggest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `challenge`
--

INSERT INTO `challenge` (`id`, `suggest`) VALUES
(10, 'Bạn dùng mạng xã hội gì?'),
(11, 'Bạn tên gì?');

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
(27, 2, 1, 'alo ha'),
(28, 1, 17, 'abc'),
(29, 1, 2, 'alo'),
(30, 1, 2, 'hahahaha'),
(35, 2, 1, 'alo'),
(38, 1, 2, 'hello');

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
(29, 'Báo cáo.docx', '0', 0, 'Kiều Phương'),
(30, 'hào.docx', '29', 1, 'Anh Hào'),
(31, 'bài-tập-lý-thuyết-chương-1.docx', '0', 0, 'Kiều Phương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contactno` varchar(300) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `contactno`, `position`) VALUES
(1, 'Kiều Phương', 'admin', '$2y$10$DQDHgN7YADnr.UUZkHgJ2uoM7tlroQFVE42FALJPieck0iPXjYwfK', 'phuongktn@gmail.com', '123456789', 1),
(2, 'Anh Hào', 'sinhvien', '$2y$10$A6r5QWfh8R6LzMOY4oLOW.DVYEuhnK7.ChAeXcakgN0V8mDic0gwC', 'haola@gmail.com', '0337468877', 0),
(17, 'Đức Phi', 'sinhvien1', '$2y$10$QNETBjAwIYEmvk0wy5yvIueoI2QlV0ct2nN6y6HaqZpnbtsCoPxXW', 'phibd@gmail.com', '0374250872', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
