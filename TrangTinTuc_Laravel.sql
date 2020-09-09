-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 08, 2020 lúc 06:01 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trangtintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `idNguoiDung` int(10) UNSIGNED NOT NULL,
  `idTinTuc` int(10) UNSIGNED NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `id` int(10) UNSIGNED NOT NULL,
  `idTheLoai` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`id`, `idTheLoai`, `Ten`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(28, 11, 'Chính trị', 'chinh-tri', '2020-09-08 03:54:39', '2020-09-08 03:54:39'),
(29, 11, 'Giao thông', 'giao-thong', '2020-09-08 03:55:53', '2020-09-08 03:55:53'),
(30, 11, 'MeKong', 'mekong', '2020-09-08 03:56:46', '2020-09-08 03:56:46'),
(31, 11, 'Tuyến đầu chống dịch', 'tuyen-dau-chong-dich', '2020-09-08 03:56:56', '2020-09-08 03:56:56'),
(32, 13, 'Tư liệu', 'tu-lieu', '2020-09-08 03:58:21', '2020-09-08 03:58:21'),
(33, 13, 'Phân tích', 'phan-tich', '2020-09-08 03:58:30', '2020-09-08 03:58:30'),
(34, 13, 'Người Việt năm châu', 'nguoi-viet-nam-chau', '2020-09-08 03:58:49', '2020-09-08 03:58:49'),
(35, 13, 'Cuộc sống đó đây', 'cuoc-song-do-day', '2020-09-08 03:59:06', '2020-09-08 03:59:06'),
(36, 13, 'Quân sự', 'quan-su', '2020-09-08 03:59:14', '2020-09-08 03:59:14'),
(37, 14, 'Quốc tế', 'quoc-te', '2020-09-08 04:00:41', '2020-09-08 04:00:41'),
(38, 14, 'Doanh nghiệp', 'doanh-nghiep', '2020-09-08 04:00:51', '2020-09-08 04:00:51'),
(39, 14, 'Chứng khoán', 'chung-khoan', '2020-09-08 04:01:06', '2020-09-08 04:01:06'),
(40, 14, 'Bất động sản', 'bat-dong-san', '2020-09-08 04:01:16', '2020-09-08 04:01:16'),
(41, 14, 'Ebank', 'ebank', '2020-09-08 04:01:34', '2020-09-08 04:01:34'),
(42, 14, 'Vĩ mô', 'vi-mo', '2020-09-08 04:01:42', '2020-09-08 04:01:42'),
(43, 14, 'Tiền của tôi', 'tien-cua-toi', '2020-09-08 04:01:53', '2020-09-08 04:01:53'),
(44, 14, 'Hàng hóa', 'hang-hoa', '2020-09-08 04:02:09', '2020-09-08 04:02:09'),
(45, 14, 'Start up', 'start-up', '2020-09-08 04:02:19', '2020-09-08 04:02:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_resets_table', 2),
(48, '2019_08_19_000000_create_failed_jobs_table', 2),
(49, '2020_08_17_043352_create_slide_table', 2),
(50, '2020_08_17_044021_create_theloai_table', 2),
(51, '2020_08_17_050523_create_loaitin_table', 2),
(52, '2020_08_17_051308_create_tintuc_table', 2),
(53, '2020_09_03_144833_create_users_table', 2),
(54, '2020_09_03_151106_create_comment_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `Ten`, `Hinh`, `NoiDung`, `Link`, `created_at`, `updated_at`) VALUES
(5, 'Thời sự', 'sj02_000-1WZ9E2-2862-1599463490.jpg', '<p>slide thời sự</p>', 'vinhpt.com', '2020-09-08 04:23:34', '2020-09-08 04:23:34'),
(6, 'slide ảnh', 'LC8z_arne-cheyenne-johnson-in-sucu-4768-3207-1599260436.jpg', '<p>hh</p>', 'fff', '2020-09-08 06:04:47', '2020-09-08 06:04:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenKhongDau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `Ten`, `TenKhongDau`, `created_at`, `updated_at`) VALUES
(11, 'Thời sự', 'thoi-su', '2020-09-08 03:49:54', '2020-09-08 03:49:54'),
(12, 'Góc nhìn', 'goc-nhin', '2020-09-08 03:50:40', '2020-09-08 03:50:40'),
(13, 'Thế giới', 'the-gioi', '2020-09-08 03:50:50', '2020-09-08 03:50:50'),
(14, 'Kinh Doanh', 'kinh-doanh', '2020-09-08 03:51:00', '2020-09-08 03:51:00'),
(15, 'Thể thao', 'the-thao', '2020-09-08 03:51:21', '2020-09-08 03:51:21'),
(16, 'Pháp luật', 'phap-luat', '2020-09-08 03:51:31', '2020-09-08 03:51:31'),
(17, 'Giáo dục', 'giao-duc', '2020-09-08 03:51:50', '2020-09-08 03:51:50'),
(18, 'Sức khỏe', 'suc-khoe', '2020-09-08 03:52:05', '2020-09-08 03:52:05'),
(19, 'Đời sống', 'doi-song', '2020-09-08 03:52:18', '2020-09-08 03:52:18'),
(20, 'Du lịch', 'du-lich', '2020-09-08 03:52:24', '2020-09-08 03:52:24'),
(21, 'Khoa học', 'khoa-hoc', '2020-09-08 03:52:31', '2020-09-08 03:52:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TieuDeKhongDau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT 0,
  `SoLuotXem` int(11) NOT NULL DEFAULT 0,
  `idLoaiTin` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `idLoaiTin`, `created_at`, `updated_at`) VALUES
(5, 'Nguyên Chủ tịch tỉnh Quảng Ngãi bị cảnh cáo', 'nguyen-chu-tich-tinh-quang-ngai-bi-canh-cao', '<p><a href=\"https://vnexpress.net/nguyen-chu-tich-tinh-quang-ngai-bi-canh-cao-4158812.html\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: optimizelegibility; color: inherit; text-decoration-line: none; font-family: arial; font-size: 14px; background-color: rgb(247, 247, 247);\" title=\"Nguyên Chủ tịch tỉnh Quảng Ngãi bị cảnh cáo\">Ông Trần Ngọc Căng, nguyên Chủ tịch UBND tỉnh Quảng Ngãi, bị cảnh cáo do có những vi phạm, khuyết điểm nghiêm trọng trong công tác.&nbsp;</a></p>', '<p>Ông Trần Ngọc Căng, nguyên Chủ tịch UBND tỉnh Quảng Ngãi, bị cảnh cáo do có những vi phạm, khuyết điểm nghiêm trọng trong công tác.</p>\r\n\r\n<p>Thủ tướng ký quyết định trên ngày 4/9. Trước đó, tháng 6/2020, Ủy ban Kiểm tra Trung ương đã cảnh cáo ông Trần Ngọc Căng vì có nhiều vi phạm, khuyết điểm nghiêm trọng trong lãnh đạo, chỉ đạo, thực hiện công tác quản lý, sử dụng đất đai, tài chính ngân sách, dự án đầu tư và công tác cán bộ, ảnh hưởng xấu đến uy tín của cấp ủy, chính quyền địa phương.</p>\r\n\r\n<p>Sau đó, ông Căng có đơn xin thôi chức và đã nhận quyết định nghỉ công tác, nghỉ hưu trước tuổi từ 1/7.</p>\r\n\r\n<p>&nbsp;</p>', 'AmTZ_Chu-tich-Quang-Ngai-Tran-Ngoc-7442-7108-1599555309.jpg', 1, 0, 28, '2020-09-08 04:07:07', '2020-09-08 04:07:07'),
(6, '40 năm Biden thay đổi quan điểm với Trung Quốc', '40-nam-biden-thay-doi-quan-diem-voi-trung-quoc', '<p><span style=\"background-color:rgb(252, 250, 246); color:rgb(34, 34, 34); font-family:arial; font-size:18px\">Tháng 8/2001, trong chuyến công du nước ngoài đầu tiên với tư cách chủ tịch Ủy Đối Ngoại Thượng viện Mỹ, Joe Biden đã tới Bắc Đới Hà, Trung Quốc.</span></p>', '<p>Mục tiêu của Biden khi tham dự một loạt cuộc họp với giới lãnh đạo Trung Quốc khi đó là giúp mở ra kỷ nguyên quan trọng trong quan hệ hai nước, bao gồm tạo dựng kết nối thương mại cho phép Bắc Kinh gia nhập Tổ chức Thương mại Thế giới (WTO).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '9umm_000-1WZ9E2-2862-1599463490.jpg', 1, 0, 32, '2020-09-08 04:21:19', '2020-09-08 04:21:19'),
(15, 'Hàn Quốc chật vật hút nhà máy quay về từ Trung Quốc', 'han-quoc-chat-vat-hut-nha-may-quay-ve-tu-trung-quoc', '<p><span style=\"background-color:rgb(252, 250, 246); color:rgb(34, 34, 34); font-family:arial; font-size:18px\">Chính sách ưu đãi của chính phủ Hàn Quốc chưa đủ bù đắp chênh lệch về lương, thị trường xuất khẩu và nền tảng sản xuất so với Trung Quốc.</span></p>', '<p>Chính sách ưu đãi của chính phủ Hàn Quốc chưa đủ bù đắp chênh lệch về lương, thị trường xuất khẩu và nền tảng sản xuất so với Trung Quốc.</p>\r\n\r\n<p>Bộ trưởng phụ trách doanh nghiệp vừa và nhỏ và công ty khởi nghiệp Hàn Quốc Park Young-sun cho biết trên&nbsp;<em>Financial Times</em>&nbsp;rằng chính phủ nước này đang tăng cường chính sách khuyến khích công ty quay về. Hàn Quốc đang đối mặt với thất nghiệp tăng cao và tăng trưởng kinh tế chậm do đại dịch.</p>\r\n\r\n<p>\"Chúng tôi vẫn cần quan sát liệu xu hướng quay về có tăng tốc hay không. Nhưng tôi cho rằng chính sách ưu đãi sẽ tác động đến các hãng sản xuất có giá trị gia tăng cao\", bà cho biết.</p>\r\n\r\n<p>Tuy vậy, giới phân tích và doanh nghiệp cho biết hầu hết công ty Hàn Quốc vẫn lưỡng lự trong việc chuyển sản xuất, do chênh lệch lớn về lương nhân công, khả năng tiếp cận các thị trường xuất khẩu lớn và chính sách bảo vệ lao động tại Hàn Quốc.</p>', 'hdOu_s-korea-1599560362-4890-1599560379.jpg', 1, 0, 37, '2020-09-08 08:15:38', '2020-09-08 08:15:38'),
(16, 'Đề nghị ASEAN hợp tác phát triển vaccine ngừa Covid-19', 'de-nghi-asean-hop-tac-phat-trien-vaccine-ngua-covid-19', '<p><a href=\"https://vnexpress.net/de-nghi-asean-hop-tac-phat-trien-vaccine-ngua-covid-19-4158789.html\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; text-rendering: optimizelegibility; color: inherit; text-decoration-line: none; font-family: arial; font-size: 14px; background-color: rgb(247, 247, 247);\" title=\"Đề nghị ASEAN hợp tác phát triển vaccine ngừa Covid-19\">Phó chủ tịch Quốc hội Tòng Thị Phóng đề xuất các thành viên Liên nghị viện ASEAN (AIPA) hợp tác phát triển vaccine, đoàn kết vượt qua thách thức trước đại dịch.&nbsp;</a></p>', '<p>Phó chủ tịch Quốc hội Tòng Thị Phóng đề xuất các thành viên Liên nghị viện ASEAN (AIPA) hợp tác phát triển vaccine, đoàn kết vượt qua thách thức trước đại dịch.</p>\r\n\r\n<p>Phát biểu tại phiên họp toàn thể Đại hội đồng liên nghị viện ASEAN lần thứ 41 (AIPA 41) ngày 8/9, Phó chủ tịch thường trực Quốc hội Việt Nam Tòng Thị Phóng cho rằng, các nghị viện cần chung tay ủng hộ cộng đồng văn hóa xã hội AIPA trong việc ứng phó với Covid-19 trên mọi lĩnh vực. Đó là bao phủ y tế toàn dân, mạng lưới ứng phó các tình huống khẩn cấp về y tế, bảo vệ môi trường, đa dạng sinh học, quản lý rác thải.</p>\r\n\r\n<p>\"Một trong những việc cần làm ngay là hợp tác để phát triển vaccine ngừa Covid-19 và bảo đảm quyền tiếp cận vaccine của người dân\", bà Phóng nói.</p>', 'j8Ky_2d6c9baebb8044de1d91-8743-1599564842.jpg', 1, 0, 28, '2020-09-08 08:24:10', '2020-09-08 08:24:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `quyen`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'VINH123', 'vinh@gmail.com', '$2y$10$gfiJxQXN7wQO96S/gssONe0fQ2PgH3sHNoNMjUwVZ.p8z4wNAi9t.', 2, NULL, NULL, '2020-09-03 09:22:35', '2020-09-03 09:22:35'),
(4, 'vinh1', 'vinhpt72@gmail.com', '$2y$10$fDdnQMDPMQIPwB8HjU12GeEYkriNB4Nu3N8WA11f2tp00VWCMGFK6', 1, NULL, NULL, '2020-09-05 06:40:00', '2020-09-08 02:06:20'),
(5, 'ptv2', 'vinhpt73@gmail.com', '$2y$10$AwpQq1knTnkbJkUB.VIcM.x4XniAoXQ4luR0/k1xhwtrwcemn7Rw.', 1, NULL, NULL, '2020-09-08 01:58:45', '2020-09-08 02:18:48'),
(6, 'nva', 'vinhpt78@gmail.com', '$2y$10$nmz5fPdP29flrzQrEv8UDeHb8Zxc2gZPrnnele6Bw/piGyAf5HOka', 0, NULL, NULL, '2020-09-08 02:42:34', '2020-09-08 02:42:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_idnguoidung_foreign` (`idNguoiDung`),
  ADD KEY `comment_idtintuc_foreign` (`idTinTuc`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaitin_idtheloai_foreign` (`idTheLoai`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tintuc_idloaitin_foreign` (`idLoaiTin`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_idnguoidung_foreign` FOREIGN KEY (`idNguoiDung`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_idtintuc_foreign` FOREIGN KEY (`idTinTuc`) REFERENCES `tintuc` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `loaitin_idtheloai_foreign` FOREIGN KEY (`idTheLoai`) REFERENCES `theloai` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_idloaitin_foreign` FOREIGN KEY (`idLoaiTin`) REFERENCES `loaitin` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
