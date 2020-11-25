-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2020 lúc 04:19 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `oe35_fdf`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `categories_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Đồ Uống', NULL, '2020-08-27 22:12:09', '2020-08-27 22:12:09'),
(2, 'Thức Ăn', NULL, '2020-08-27 22:12:16', '2020-08-27 22:12:16'),
(7, 'Trà Sữa', 1, '2020-10-04 23:37:45', '2020-10-04 23:37:45'),
(8, 'Bánh Tráng Trộn', 2, '2020-10-04 23:40:19', '2020-10-04 23:40:19'),
(9, 'Bánh Ngọt', 2, '2020-10-13 12:15:39', '2020-10-13 12:15:39');

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
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(62, 36, 4, '2020-10-14 17:45:00', '2020-10-14 17:45:00'),
(67, 34, 4, '2020-10-14 17:47:23', '2020-10-14 17:47:23'),
(68, 33, 4, '2020-10-14 17:49:46', '2020-10-14 17:49:46');

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2020_08_19_210917_create_categories', 1),
(19, '2020_08_23_182343_create_product', 1),
(20, '2020_08_26_030509_create_suggest', 1),
(21, '2020_08_27_204430_create_favorite', 1),
(22, '2020_08_27_151053_create_order_table', 2),
(23, '2020_08_27_151857_create_order_detail_table', 2),
(24, '2020_09_10_003146_create_notifications_table', 3),
(25, '2020_10_13_180300_vp_kho', 4),
(26, '2020_10_15_015423_categories_id', 5),
(27, '2020_10_15_063506_status', 6),
(28, '2020_10_15_064242_warehouse', 7),
(29, '2020_10_15_064747_status', 8),
(30, '2020_10_20_015719_status', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00675b02-d14d-4fa9-bd6c-1a2ac27bdf1e', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:25:06', '2020-09-09 18:25:06'),
('57c0f564-b45c-4639-9243-3d9ddb30ff87', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:20:03', '2020-09-09 18:20:03'),
('73105796-1fcf-4483-961d-0f89e07fc694', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:23:46', '2020-09-09 18:23:46'),
('7714b856-991c-487d-8c8d-3dc2bb340875', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:23:46', '2020-09-09 18:23:46'),
('9f252e10-fba9-4820-9dbb-c315fb91dc48', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:25:17', '2020-09-09 18:25:17'),
('a2408b16-c45b-470f-86db-dbe1962a181f', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:25:17', '2020-09-09 18:25:17'),
('d3713c11-183c-4cbe-a425-de5dad586e0e', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:20:06', '2020-09-09 18:20:06'),
('f056c5dc-e555-4622-9b83-9b5368ac544a', 'App\\Notifications\\OrderApproval', 'App\\User', 1, '{\"order_id\":101}', NULL, '2020-09-09 18:25:06', '2020-09-09 18:25:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_price` double NOT NULL,
  `status` enum('Ordered','Being transported') COLLATE utf8mb4_unicode_ci DEFAULT 'Ordered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `user_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(77, 4, 50000, 'Ordered', '2020-10-14 19:29:31', '2020-10-14 19:29:31'),
(78, 4, 50000, 'Being transported', '2020-10-14 21:45:54', '2020-10-19 18:23:34'),
(79, 4, 150000, 'Being transported', '2020-10-14 23:18:34', '2020-10-19 18:21:27'),
(80, 4, 50000, 'Ordered', '2020-10-19 18:33:14', '2020-10-19 18:33:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_product_totalprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  `status` enum('Đã Xuất Kho','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `order_id`, `order_product_name`, `order_product_totalprice`, `quantity`, `created_at`, `updated_at`, `categories_id`, `status`) VALUES
(49, 31, 77, 'TRÀ SỮA CHANH', '50000', 1, '2020-10-14 19:29:31', '2020-10-14 19:29:31', 7, ''),
(50, 29, 78, 'TRÀ SỮA TRÂN CHÂU', '50000', 1, '2020-10-14 21:45:54', '2020-10-14 21:45:54', 7, ''),
(51, 31, 79, 'TRÀ SỮA CHANH', '150000', 3, '2020-10-14 23:18:34', '2020-10-14 23:18:34', 7, ''),
(52, 31, 80, 'TRÀ SỮA CHANH', '50000', 1, '2020-10-19 18:33:14', '2020-10-19 18:33:14', 7, 'Đã Xuất Kho');

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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_img`, `description`, `price`, `categories_id`, `created_at`, `updated_at`) VALUES
(29, 'TRÀ SỮA TRÂN CHÂU', '5f7aa8807c143_eee.jpg', 'Ngon lắm!', 50000, 7, '2020-10-04 22:00:48', '2020-10-13 12:16:27'),
(30, 'BÁNH MỨC DÂU', '5f7aa8b79eebb_eeeeeea.jpg', 'Ngon lắm!', 35000, 2, '2020-10-04 22:01:43', '2020-10-04 22:01:43'),
(31, 'TRÀ SỮA CHANH', '5f7aab47cffb4_tra.jpg', 'Ngon lắm!', 50000, 7, '2020-10-04 22:12:39', '2020-10-13 12:16:36'),
(32, 'Bánh GATO', '5f7aabc0235b5_wwwwwww.jpg', 'Ngon lắm!', 150000, 2, '2020-10-04 22:14:40', '2020-10-04 22:14:40'),
(33, 'TRÀ SỮA SOCOLA', '5f7aacf7da18c_sua.jpg', 'Ngon lắm!', 75000, 7, '2020-10-04 22:19:51', '2020-10-05 13:01:17'),
(34, 'TRÀ SỮA THÁI XANH', '5f7aad0da6e50_reeee.jpg', 'Ngon lắm!', 50000, 7, '2020-10-04 22:20:13', '2020-10-05 13:00:03'),
(35, 'Bánh GATO SOCOLA', '5f7aad44b4ac0_ere.jpg', 'Ngon lắm!', 250000, 9, '2020-10-04 22:21:08', '2020-10-13 12:16:15'),
(36, 'Bánh Kem', '5f7aae0eb930a_qwww.jpg', 'Ngon lắm!', 200000, 9, '2020-10-04 22:24:30', '2020-10-13 12:16:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suggest`
--

CREATE TABLE `suggest` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Admin','Customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_original` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name_user`, `google_id`, `facebook_id`, `email`, `password`, `address`, `phone`, `level`, `email_verified_at`, `avatar`, `avatar_original`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Nguyễn Đình Huân', NULL, NULL, 'nguyendinhhuan200799@gmail.com', '$2y$10$I96kzZfRs1zQNizoVsuTAOWiIeR.nXR3WkNtEWsAvVIQH/enbBltC', 'nguyendinhhuan200799@gmail.com', '1312312312', 'Admin', NULL, NULL, NULL, NULL, '2020-09-09 00:36:53', '2020-09-09 00:36:53'),
(5, 'Huân DZ', NULL, NULL, 'nguyendinhhuan20071999@gmail.com', '$2y$10$aIhWQVqRPDelypNdXm/gb.IoHL4JZIoPhJeAx2OeU8pQeQRuNQRYS', 'nguyendinhhuan200799@gmail.com', '0776230169', 'Customer', NULL, NULL, NULL, NULL, '2020-09-14 06:12:58', '2020-09-14 06:12:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_kho`
--

CREATE TABLE `vp_kho` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_kho`
--

INSERT INTO `vp_kho` (`id`, `total`, `categories_id`, `created_at`, `updated_at`) VALUES
(2, 105, 7, '2020-10-13 11:50:48', '2020-10-19 19:16:19'),
(3, 11, 8, '2020-10-13 12:10:38', '2020-10-13 12:10:38'),
(4, 12, 9, '2020-10-13 12:15:51', '2020-10-13 12:15:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_product_id_foreign` (`product_id`),
  ADD KEY `favorite_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_product_id_foreign` (`product_id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_id_foreign` (`categories_id`);

--
-- Chỉ mục cho bảng `suggest`
--
ALTER TABLE `suggest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggest_categories_id_foreign` (`categories_id`),
  ADD KEY `suggest_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vp_kho`
--
ALTER TABLE `vp_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vp_kho_categories_id_foreign` (`categories_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `suggest`
--
ALTER TABLE `suggest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vp_kho`
--
ALTER TABLE `vp_kho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `suggest`
--
ALTER TABLE `suggest`
  ADD CONSTRAINT `suggest_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `suggest_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_kho`
--
ALTER TABLE `vp_kho`
  ADD CONSTRAINT `vp_kho_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
