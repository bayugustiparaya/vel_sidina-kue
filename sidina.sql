/*
 Navicat Premium Data Transfer

 Source Server         : 7.3
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : sidina

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 16/09/2023 23:35:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for berita_comments
-- ----------------------------
DROP TABLE IF EXISTS `berita_comments`;
CREATE TABLE `berita_comments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `berita_id` bigint UNSIGNED NULL DEFAULT NULL,
  `parent_id` int NULL DEFAULT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `berita_comments_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `berita_comments_berita_id_foreign`(`berita_id`) USING BTREE,
  CONSTRAINT `berita_comments_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `beritas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `berita_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `penduduk_akuns` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berita_comments
-- ----------------------------

-- ----------------------------
-- Table structure for berita_kategoris
-- ----------------------------
DROP TABLE IF EXISTS `berita_kategoris`;
CREATE TABLE `berita_kategoris`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `berita_kategoris_slug_unique`(`slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berita_kategoris
-- ----------------------------
INSERT INTO `berita_kategoris` VALUES (1, 'Pengumuman', 'pengumuman');
INSERT INTO `berita_kategoris` VALUES (2, 'Event', 'event');
INSERT INTO `berita_kategoris` VALUES (3, 'Pemerintahan', 'pemerintahan');

-- ----------------------------
-- Table structure for beritas
-- ----------------------------
DROP TABLE IF EXISTS `beritas`;
CREATE TABLE `beritas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint UNSIGNED NULL DEFAULT NULL,
  `bigimage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `posted_by` bigint UNSIGNED NULL DEFAULT NULL,
  `edited_by` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `beritas_slug_unique`(`slug`) USING BTREE,
  INDEX `beritas_kategori_id_foreign`(`kategori_id`) USING BTREE,
  INDEX `beritas_posted_by_foreign`(`posted_by`) USING BTREE,
  INDEX `beritas_edited_by_foreign`(`edited_by`) USING BTREE,
  CONSTRAINT `beritas_edited_by_foreign` FOREIGN KEY (`edited_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `beritas_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `berita_kategoris` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `beritas_posted_by_foreign` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beritas
-- ----------------------------

-- ----------------------------
-- Table structure for bidang
-- ----------------------------
DROP TABLE IF EXISTS `bidang`;
CREATE TABLE `bidang`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bidang
-- ----------------------------
INSERT INTO `bidang` VALUES (1, 'Bidang 2', '2023-09-12 15:48:51', '2023-09-16 22:49:56');
INSERT INTO `bidang` VALUES (2, 'Bidang 1', '2023-09-12 15:50:13', '2023-09-12 15:50:13');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jabatan_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `jabatan_has_permissions`;
CREATE TABLE `jabatan_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `jabatan_id`) USING BTREE,
  INDEX `jabatan_has_permissions_jabatan_id_foreign`(`jabatan_id`) USING BTREE,
  CONSTRAINT `jabatan_has_permissions_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `jabatan_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan_has_permissions
-- ----------------------------
INSERT INTO `jabatan_has_permissions` VALUES (1, 1);
INSERT INTO `jabatan_has_permissions` VALUES (2, 1);
INSERT INTO `jabatan_has_permissions` VALUES (3, 1);
INSERT INTO `jabatan_has_permissions` VALUES (4, 1);
INSERT INTO `jabatan_has_permissions` VALUES (5, 1);
INSERT INTO `jabatan_has_permissions` VALUES (6, 1);
INSERT INTO `jabatan_has_permissions` VALUES (7, 1);
INSERT INTO `jabatan_has_permissions` VALUES (8, 1);
INSERT INTO `jabatan_has_permissions` VALUES (9, 1);
INSERT INTO `jabatan_has_permissions` VALUES (10, 1);
INSERT INTO `jabatan_has_permissions` VALUES (11, 1);
INSERT INTO `jabatan_has_permissions` VALUES (12, 1);
INSERT INTO `jabatan_has_permissions` VALUES (13, 1);
INSERT INTO `jabatan_has_permissions` VALUES (14, 1);
INSERT INTO `jabatan_has_permissions` VALUES (15, 1);
INSERT INTO `jabatan_has_permissions` VALUES (16, 1);
INSERT INTO `jabatan_has_permissions` VALUES (17, 1);
INSERT INTO `jabatan_has_permissions` VALUES (18, 1);
INSERT INTO `jabatan_has_permissions` VALUES (19, 1);
INSERT INTO `jabatan_has_permissions` VALUES (20, 1);
INSERT INTO `jabatan_has_permissions` VALUES (21, 1);
INSERT INTO `jabatan_has_permissions` VALUES (22, 1);
INSERT INTO `jabatan_has_permissions` VALUES (23, 1);
INSERT INTO `jabatan_has_permissions` VALUES (24, 1);
INSERT INTO `jabatan_has_permissions` VALUES (25, 1);
INSERT INTO `jabatan_has_permissions` VALUES (26, 1);
INSERT INTO `jabatan_has_permissions` VALUES (27, 1);
INSERT INTO `jabatan_has_permissions` VALUES (28, 1);
INSERT INTO `jabatan_has_permissions` VALUES (29, 1);
INSERT INTO `jabatan_has_permissions` VALUES (30, 1);
INSERT INTO `jabatan_has_permissions` VALUES (31, 1);
INSERT INTO `jabatan_has_permissions` VALUES (32, 1);
INSERT INTO `jabatan_has_permissions` VALUES (33, 1);
INSERT INTO `jabatan_has_permissions` VALUES (34, 1);
INSERT INTO `jabatan_has_permissions` VALUES (35, 1);
INSERT INTO `jabatan_has_permissions` VALUES (36, 1);
INSERT INTO `jabatan_has_permissions` VALUES (37, 1);
INSERT INTO `jabatan_has_permissions` VALUES (38, 1);
INSERT INTO `jabatan_has_permissions` VALUES (39, 1);
INSERT INTO `jabatan_has_permissions` VALUES (40, 1);
INSERT INTO `jabatan_has_permissions` VALUES (41, 1);
INSERT INTO `jabatan_has_permissions` VALUES (42, 1);
INSERT INTO `jabatan_has_permissions` VALUES (43, 1);
INSERT INTO `jabatan_has_permissions` VALUES (44, 1);
INSERT INTO `jabatan_has_permissions` VALUES (45, 1);
INSERT INTO `jabatan_has_permissions` VALUES (46, 1);
INSERT INTO `jabatan_has_permissions` VALUES (47, 1);
INSERT INTO `jabatan_has_permissions` VALUES (48, 1);
INSERT INTO `jabatan_has_permissions` VALUES (49, 1);
INSERT INTO `jabatan_has_permissions` VALUES (50, 1);
INSERT INTO `jabatan_has_permissions` VALUES (51, 1);
INSERT INTO `jabatan_has_permissions` VALUES (52, 1);
INSERT INTO `jabatan_has_permissions` VALUES (53, 1);
INSERT INTO `jabatan_has_permissions` VALUES (54, 1);
INSERT INTO `jabatan_has_permissions` VALUES (55, 1);
INSERT INTO `jabatan_has_permissions` VALUES (56, 1);
INSERT INTO `jabatan_has_permissions` VALUES (57, 1);
INSERT INTO `jabatan_has_permissions` VALUES (58, 1);
INSERT INTO `jabatan_has_permissions` VALUES (59, 1);
INSERT INTO `jabatan_has_permissions` VALUES (60, 1);
INSERT INTO `jabatan_has_permissions` VALUES (61, 1);
INSERT INTO `jabatan_has_permissions` VALUES (62, 1);
INSERT INTO `jabatan_has_permissions` VALUES (63, 1);
INSERT INTO `jabatan_has_permissions` VALUES (64, 1);
INSERT INTO `jabatan_has_permissions` VALUES (65, 1);
INSERT INTO `jabatan_has_permissions` VALUES (66, 1);
INSERT INTO `jabatan_has_permissions` VALUES (67, 1);
INSERT INTO `jabatan_has_permissions` VALUES (68, 1);
INSERT INTO `jabatan_has_permissions` VALUES (69, 1);
INSERT INTO `jabatan_has_permissions` VALUES (70, 1);
INSERT INTO `jabatan_has_permissions` VALUES (71, 1);
INSERT INTO `jabatan_has_permissions` VALUES (72, 1);
INSERT INTO `jabatan_has_permissions` VALUES (73, 1);
INSERT INTO `jabatan_has_permissions` VALUES (74, 1);
INSERT INTO `jabatan_has_permissions` VALUES (75, 1);
INSERT INTO `jabatan_has_permissions` VALUES (76, 1);
INSERT INTO `jabatan_has_permissions` VALUES (77, 1);
INSERT INTO `jabatan_has_permissions` VALUES (78, 1);
INSERT INTO `jabatan_has_permissions` VALUES (79, 1);
INSERT INTO `jabatan_has_permissions` VALUES (80, 1);
INSERT INTO `jabatan_has_permissions` VALUES (81, 1);
INSERT INTO `jabatan_has_permissions` VALUES (82, 1);
INSERT INTO `jabatan_has_permissions` VALUES (83, 1);
INSERT INTO `jabatan_has_permissions` VALUES (84, 1);
INSERT INTO `jabatan_has_permissions` VALUES (85, 1);
INSERT INTO `jabatan_has_permissions` VALUES (86, 1);
INSERT INTO `jabatan_has_permissions` VALUES (87, 1);
INSERT INTO `jabatan_has_permissions` VALUES (88, 1);
INSERT INTO `jabatan_has_permissions` VALUES (89, 1);
INSERT INTO `jabatan_has_permissions` VALUES (90, 1);
INSERT INTO `jabatan_has_permissions` VALUES (91, 1);
INSERT INTO `jabatan_has_permissions` VALUES (92, 1);
INSERT INTO `jabatan_has_permissions` VALUES (93, 1);
INSERT INTO `jabatan_has_permissions` VALUES (94, 1);
INSERT INTO `jabatan_has_permissions` VALUES (95, 1);
INSERT INTO `jabatan_has_permissions` VALUES (96, 1);
INSERT INTO `jabatan_has_permissions` VALUES (97, 1);
INSERT INTO `jabatan_has_permissions` VALUES (98, 1);
INSERT INTO `jabatan_has_permissions` VALUES (99, 1);
INSERT INTO `jabatan_has_permissions` VALUES (100, 1);
INSERT INTO `jabatan_has_permissions` VALUES (101, 1);
INSERT INTO `jabatan_has_permissions` VALUES (102, 1);
INSERT INTO `jabatan_has_permissions` VALUES (103, 1);
INSERT INTO `jabatan_has_permissions` VALUES (104, 1);
INSERT INTO `jabatan_has_permissions` VALUES (105, 1);
INSERT INTO `jabatan_has_permissions` VALUES (106, 1);
INSERT INTO `jabatan_has_permissions` VALUES (107, 1);
INSERT INTO `jabatan_has_permissions` VALUES (108, 1);
INSERT INTO `jabatan_has_permissions` VALUES (109, 1);
INSERT INTO `jabatan_has_permissions` VALUES (110, 1);
INSERT INTO `jabatan_has_permissions` VALUES (111, 1);
INSERT INTO `jabatan_has_permissions` VALUES (112, 1);
INSERT INTO `jabatan_has_permissions` VALUES (113, 1);
INSERT INTO `jabatan_has_permissions` VALUES (114, 1);
INSERT INTO `jabatan_has_permissions` VALUES (115, 1);
INSERT INTO `jabatan_has_permissions` VALUES (116, 1);
INSERT INTO `jabatan_has_permissions` VALUES (117, 1);
INSERT INTO `jabatan_has_permissions` VALUES (118, 1);
INSERT INTO `jabatan_has_permissions` VALUES (119, 1);
INSERT INTO `jabatan_has_permissions` VALUES (120, 1);
INSERT INTO `jabatan_has_permissions` VALUES (121, 1);
INSERT INTO `jabatan_has_permissions` VALUES (122, 1);
INSERT INTO `jabatan_has_permissions` VALUES (123, 1);
INSERT INTO `jabatan_has_permissions` VALUES (124, 1);
INSERT INTO `jabatan_has_permissions` VALUES (125, 1);
INSERT INTO `jabatan_has_permissions` VALUES (126, 1);
INSERT INTO `jabatan_has_permissions` VALUES (127, 1);
INSERT INTO `jabatan_has_permissions` VALUES (128, 1);
INSERT INTO `jabatan_has_permissions` VALUES (129, 1);
INSERT INTO `jabatan_has_permissions` VALUES (130, 1);
INSERT INTO `jabatan_has_permissions` VALUES (131, 1);
INSERT INTO `jabatan_has_permissions` VALUES (132, 1);
INSERT INTO `jabatan_has_permissions` VALUES (133, 1);
INSERT INTO `jabatan_has_permissions` VALUES (134, 1);
INSERT INTO `jabatan_has_permissions` VALUES (135, 1);
INSERT INTO `jabatan_has_permissions` VALUES (136, 1);

-- ----------------------------
-- Table structure for jabatans
-- ----------------------------
DROP TABLE IF EXISTS `jabatans`;
CREATE TABLE `jabatans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `jabatans_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatans
-- ----------------------------
INSERT INTO `jabatans` VALUES (1, 'Developer', 'admin', '2023-09-12 15:08:26', '2023-09-12 15:08:26');
INSERT INTO `jabatans` VALUES (2, 'Administrator', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');
INSERT INTO `jabatans` VALUES (3, 'Wali Nagari', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');
INSERT INTO `jabatans` VALUES (4, 'Sektetaris', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');
INSERT INTO `jabatans` VALUES (5, 'Bendahara', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');
INSERT INTO `jabatans` VALUES (6, 'Kasi', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');
INSERT INTO `jabatans` VALUES (7, 'Kaur', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');
INSERT INTO `jabatans` VALUES (8, 'Wali Korong', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');
INSERT INTO `jabatans` VALUES (9, 'Staff', 'admin', '2023-09-12 15:08:27', '2023-09-12 15:08:27');

-- ----------------------------
-- Table structure for korongs
-- ----------------------------
DROP TABLE IF EXISTS `korongs`;
CREATE TABLE `korongs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nagari_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `korongs_nagari_id_foreign`(`nagari_id`) USING BTREE,
  CONSTRAINT `korongs_nagari_id_foreign` FOREIGN KEY (`nagari_id`) REFERENCES `nagaris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of korongs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_07_07_151106_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (7, '2023_07_08_120003_add_jabatan_id_to_users_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_07_08_130003_create_wil_provinces_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_07_08_130004_create_wil_regencies_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_07_08_130005_create_wil_districts_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_07_08_130006_create_wil_villages_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_07_08_130007_create_nagaris_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_07_08_130008_create_korongs_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_07_08_140003_create_pdk_jekels_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_07_08_140004_create_pdk_agamas_table', 1);
INSERT INTO `migrations` VALUES (16, '2023_07_08_140005_create_pdk_pendidikans_table', 1);
INSERT INTO `migrations` VALUES (17, '2023_07_08_140006_create_pdk_pekerjaans_table', 1);
INSERT INTO `migrations` VALUES (18, '2023_07_08_140007_create_pdk_darahs_table', 1);
INSERT INTO `migrations` VALUES (19, '2023_07_08_140008_create_pdk_kawins_table', 1);
INSERT INTO `migrations` VALUES (20, '2023_07_08_140009_create_pdk_hubungans_table', 1);
INSERT INTO `migrations` VALUES (21, '2023_07_08_140010_create_pdk_warganegaras_table', 1);
INSERT INTO `migrations` VALUES (22, '2023_07_08_140011_create_pdk_etnis_table', 1);
INSERT INTO `migrations` VALUES (23, '2023_07_08_150003_create_penduduk_akuns_table', 1);
INSERT INTO `migrations` VALUES (24, '2023_07_08_150004_create_penduduk_keluargas_table', 1);
INSERT INTO `migrations` VALUES (25, '2023_07_08_150006_create_penduduks_table', 1);
INSERT INTO `migrations` VALUES (26, '2023_07_08_150007_add_penduduk_id_to_users_table', 1);
INSERT INTO `migrations` VALUES (27, '2023_07_08_150008_add_penduduk_id_to_penduduk_akuns_table', 1);
INSERT INTO `migrations` VALUES (28, '2023_07_08_150009_add_kepkel_to_penduduk_keluargas_table', 1);
INSERT INTO `migrations` VALUES (29, '2023_07_15_280003_create_surat_syarats_table', 1);
INSERT INTO `migrations` VALUES (30, '2023_07_15_280004_create_surat_jenis_table', 1);
INSERT INTO `migrations` VALUES (31, '2023_07_15_280005_create_surat_has_syarat_table', 1);
INSERT INTO `migrations` VALUES (32, '2023_07_15_280006_create_surat_permohonans_table', 1);
INSERT INTO `migrations` VALUES (33, '2023_07_15_378007_create_penduduk_dokuments_table', 1);
INSERT INTO `migrations` VALUES (34, '2023_07_20_180003_add_columns_penduduks_table', 1);
INSERT INTO `migrations` VALUES (35, '2023_07_20_192333_add_korong_id_to_penduduk_keluargas_table', 1);
INSERT INTO `migrations` VALUES (36, '2023_07_20_192423_add_nomor_to_penduduks_table', 1);
INSERT INTO `migrations` VALUES (37, '2023_07_23_083003_create_berita_kategoris_table', 1);
INSERT INTO `migrations` VALUES (38, '2023_07_23_083004_create_beritas_table', 1);
INSERT INTO `migrations` VALUES (39, '2023_07_23_083005_create_berita_comments_table', 1);
INSERT INTO `migrations` VALUES (40, '2023_08_02_030003_add_columns_to_surat_permohonans_table', 1);
INSERT INTO `migrations` VALUES (41, '2023_08_07_223427_add_file_to_surat_permohonans_table', 1);
INSERT INTO `migrations` VALUES (42, '2023_09_12_150705_manajemen_keuangan', 1);

-- ----------------------------
-- Table structure for model_has_jabatans
-- ----------------------------
DROP TABLE IF EXISTS `model_has_jabatans`;
CREATE TABLE `model_has_jabatans`  (
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`jabatan_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_jabatans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_jabatans
-- ----------------------------
INSERT INTO `model_has_jabatans` VALUES (1, 'App\\Models\\User', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for nagaris
-- ----------------------------
DROP TABLE IF EXISTS `nagaris`;
CREATE TABLE `nagaris`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `provinsi_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kota_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kecamatan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kelurahan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_kantor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int NOT NULL,
  `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `visi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `misi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `batas_utara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `batas_selatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `batas_barat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `batas_timur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `komoditas_unggulan_luas_tanam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `komoditas_unggulan_nilai_ekonomi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `luas_sawah` decimal(10, 3) NULL DEFAULT 0.000,
  `luas_tanah_kering` decimal(10, 3) NULL DEFAULT 0.000,
  `luas_tanah_basah` decimal(10, 3) NULL DEFAULT 0.000,
  `luas_perkebunan` decimal(10, 3) NULL DEFAULT 0.000,
  `luas_fasilitas_umum` decimal(10, 3) NULL DEFAULT 0.000,
  `luas_hutan` decimal(10, 3) NULL DEFAULT 0.000,
  `jarak_ke_provinsi` decimal(10, 3) NULL DEFAULT 0.000,
  `jarak_ke_kabupaten` decimal(10, 3) NULL DEFAULT 0.000,
  `jarak_ke_kecamatan` decimal(10, 3) NULL DEFAULT 0.000,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `nagaris_provinsi_id_foreign`(`provinsi_id`) USING BTREE,
  INDEX `nagaris_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `nagaris_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `nagaris_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `nagaris_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `nagaris_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `nagaris_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `nagaris_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `wil_districts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `nagaris_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `wil_villages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `nagaris_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `wil_regencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `nagaris_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `wil_provinces` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `nagaris_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nagaris
-- ----------------------------

-- ----------------------------
-- Table structure for pagu_anggaran
-- ----------------------------
DROP TABLE IF EXISTS `pagu_anggaran`;
CREATE TABLE `pagu_anggaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pagu_anggaran` int NOT NULL,
  `bidang_id` bigint UNSIGNED NOT NULL,
  `sub_bidang_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pagu_anggaran_bidang_id_foreign`(`bidang_id`) USING BTREE,
  INDEX `pagu_anggaran_sub_bidang_id_foreign`(`sub_bidang_id`) USING BTREE,
  CONSTRAINT `pagu_anggaran_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pagu_anggaran_sub_bidang_id_foreign` FOREIGN KEY (`sub_bidang_id`) REFERENCES `sub_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pagu_anggaran
-- ----------------------------
INSERT INTO `pagu_anggaran` VALUES (3, 8500, 1, 1, '2023-09-15 13:20:01', '2023-09-15 13:21:17');
INSERT INTO `pagu_anggaran` VALUES (4, 10000, 1, 2, '2023-09-15 13:20:25', '2023-09-15 13:20:25');
INSERT INTO `pagu_anggaran` VALUES (5, 50000, 2, 3, '2023-09-16 22:59:49', '2023-09-16 22:59:49');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pdk_agamas
-- ----------------------------
DROP TABLE IF EXISTS `pdk_agamas`;
CREATE TABLE `pdk_agamas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_agamas
-- ----------------------------
INSERT INTO `pdk_agamas` VALUES (1, 'ISLAM');
INSERT INTO `pdk_agamas` VALUES (2, 'KRISTEN');
INSERT INTO `pdk_agamas` VALUES (3, 'KATHOLIK');
INSERT INTO `pdk_agamas` VALUES (4, 'HINDU');
INSERT INTO `pdk_agamas` VALUES (5, 'BUDHA');
INSERT INTO `pdk_agamas` VALUES (6, 'KHONGHUCU');
INSERT INTO `pdk_agamas` VALUES (7, 'Kepercayaan Terhadap Tuhan YME / Lainnya');

-- ----------------------------
-- Table structure for pdk_darahs
-- ----------------------------
DROP TABLE IF EXISTS `pdk_darahs`;
CREATE TABLE `pdk_darahs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_darahs
-- ----------------------------
INSERT INTO `pdk_darahs` VALUES (1, 'A');
INSERT INTO `pdk_darahs` VALUES (2, 'B');
INSERT INTO `pdk_darahs` VALUES (3, 'AB');
INSERT INTO `pdk_darahs` VALUES (4, 'O');
INSERT INTO `pdk_darahs` VALUES (5, 'A+');
INSERT INTO `pdk_darahs` VALUES (6, 'A-');
INSERT INTO `pdk_darahs` VALUES (7, 'B+');
INSERT INTO `pdk_darahs` VALUES (8, 'B-');
INSERT INTO `pdk_darahs` VALUES (9, 'AB+');
INSERT INTO `pdk_darahs` VALUES (10, 'AB-');
INSERT INTO `pdk_darahs` VALUES (11, 'O+');
INSERT INTO `pdk_darahs` VALUES (12, 'O-');
INSERT INTO `pdk_darahs` VALUES (13, 'TIDAK TAHU');

-- ----------------------------
-- Table structure for pdk_etnis
-- ----------------------------
DROP TABLE IF EXISTS `pdk_etnis`;
CREATE TABLE `pdk_etnis`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_etnis
-- ----------------------------
INSERT INTO `pdk_etnis` VALUES (1, 'Minang');
INSERT INTO `pdk_etnis` VALUES (2, 'Minahasa');
INSERT INTO `pdk_etnis` VALUES (3, 'Busami');
INSERT INTO `pdk_etnis` VALUES (4, 'Jawa');

-- ----------------------------
-- Table structure for pdk_hubungans
-- ----------------------------
DROP TABLE IF EXISTS `pdk_hubungans`;
CREATE TABLE `pdk_hubungans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_hubungans
-- ----------------------------
INSERT INTO `pdk_hubungans` VALUES (1, 'KEPALA KELUARGA');
INSERT INTO `pdk_hubungans` VALUES (2, 'SUAMI');
INSERT INTO `pdk_hubungans` VALUES (3, 'ISTRI');
INSERT INTO `pdk_hubungans` VALUES (4, 'ANAK KANDUNG');
INSERT INTO `pdk_hubungans` VALUES (5, 'ANAK TIRI');
INSERT INTO `pdk_hubungans` VALUES (6, 'MENANTU');
INSERT INTO `pdk_hubungans` VALUES (7, 'CUCU');
INSERT INTO `pdk_hubungans` VALUES (8, 'ORANGTUA');
INSERT INTO `pdk_hubungans` VALUES (9, 'MERTUA');
INSERT INTO `pdk_hubungans` VALUES (10, 'FAMILI LAIN');
INSERT INTO `pdk_hubungans` VALUES (11, 'PEMBANTU');
INSERT INTO `pdk_hubungans` VALUES (12, 'LAINNYA');

-- ----------------------------
-- Table structure for pdk_jekels
-- ----------------------------
DROP TABLE IF EXISTS `pdk_jekels`;
CREATE TABLE `pdk_jekels`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_jekels
-- ----------------------------
INSERT INTO `pdk_jekels` VALUES (1, 'LAKI-LAKI');
INSERT INTO `pdk_jekels` VALUES (2, 'PEREMPUAN');

-- ----------------------------
-- Table structure for pdk_kawins
-- ----------------------------
DROP TABLE IF EXISTS `pdk_kawins`;
CREATE TABLE `pdk_kawins`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_kawins
-- ----------------------------
INSERT INTO `pdk_kawins` VALUES (1, 'BELUM KAWIN');
INSERT INTO `pdk_kawins` VALUES (2, 'KAWIN');
INSERT INTO `pdk_kawins` VALUES (3, 'CERAI HIDUP');
INSERT INTO `pdk_kawins` VALUES (4, 'CERAI MATI');

-- ----------------------------
-- Table structure for pdk_pekerjaans
-- ----------------------------
DROP TABLE IF EXISTS `pdk_pekerjaans`;
CREATE TABLE `pdk_pekerjaans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_pekerjaans
-- ----------------------------
INSERT INTO `pdk_pekerjaans` VALUES (1, 'BELUM/TIDAK BEKERJA');
INSERT INTO `pdk_pekerjaans` VALUES (2, 'MENGURUS RUMAH TANGGA');
INSERT INTO `pdk_pekerjaans` VALUES (3, 'PELAJAR/MAHASISWA');
INSERT INTO `pdk_pekerjaans` VALUES (4, 'PENSIUNAN');
INSERT INTO `pdk_pekerjaans` VALUES (5, 'PEGAWAI NEGERI SIPIL (PNS)');
INSERT INTO `pdk_pekerjaans` VALUES (6, 'TENTARA NASIONAL INDONESIA (TNI)');
INSERT INTO `pdk_pekerjaans` VALUES (7, 'KEPOLISIAN RI (POLRI)');
INSERT INTO `pdk_pekerjaans` VALUES (8, 'PERDAGANGAN');
INSERT INTO `pdk_pekerjaans` VALUES (9, 'PETANI/PEKEBUN');
INSERT INTO `pdk_pekerjaans` VALUES (10, 'PETERNAK');
INSERT INTO `pdk_pekerjaans` VALUES (11, 'NELAYAN/PERIKANAN');
INSERT INTO `pdk_pekerjaans` VALUES (12, 'INDUSTRI');
INSERT INTO `pdk_pekerjaans` VALUES (13, 'KONSTRUKSI');
INSERT INTO `pdk_pekerjaans` VALUES (14, 'TRANSPORTASI');
INSERT INTO `pdk_pekerjaans` VALUES (15, 'KARYAWAN SWASTA');
INSERT INTO `pdk_pekerjaans` VALUES (16, 'KARYAWAN BUMN');
INSERT INTO `pdk_pekerjaans` VALUES (17, 'KARYAWAN BUMD');
INSERT INTO `pdk_pekerjaans` VALUES (18, 'KARYAWAN HONORER');
INSERT INTO `pdk_pekerjaans` VALUES (19, 'BURUH HARIAN LEPAS');
INSERT INTO `pdk_pekerjaans` VALUES (20, 'BURUH TANI/PERKEBUNAN');
INSERT INTO `pdk_pekerjaans` VALUES (21, 'BURUH NELAYAN/PERIKANAN');
INSERT INTO `pdk_pekerjaans` VALUES (22, 'BURUH PETERNAKAN');
INSERT INTO `pdk_pekerjaans` VALUES (23, 'PEMBANTU RUMAH TANGGA');
INSERT INTO `pdk_pekerjaans` VALUES (24, 'TUKANG CUKUR');
INSERT INTO `pdk_pekerjaans` VALUES (25, 'TUKANG LISTRIK');
INSERT INTO `pdk_pekerjaans` VALUES (26, 'TUKANG BATU');
INSERT INTO `pdk_pekerjaans` VALUES (27, 'TUKANG KAYU');
INSERT INTO `pdk_pekerjaans` VALUES (28, 'TUKANG SOL SEPATU');
INSERT INTO `pdk_pekerjaans` VALUES (29, 'TUKANG LAS/PANDAI BESI');
INSERT INTO `pdk_pekerjaans` VALUES (30, 'TUKANG JAHIT');
INSERT INTO `pdk_pekerjaans` VALUES (31, 'TUKANG GIGI');
INSERT INTO `pdk_pekerjaans` VALUES (32, 'PENATA RIAS');
INSERT INTO `pdk_pekerjaans` VALUES (33, 'PENATA BUSANA');
INSERT INTO `pdk_pekerjaans` VALUES (34, 'PENATA RAMBUT');
INSERT INTO `pdk_pekerjaans` VALUES (35, 'MEKANIK');
INSERT INTO `pdk_pekerjaans` VALUES (36, 'SENIMAN');
INSERT INTO `pdk_pekerjaans` VALUES (37, 'TABIB');
INSERT INTO `pdk_pekerjaans` VALUES (38, 'PARAJI');
INSERT INTO `pdk_pekerjaans` VALUES (39, 'PERANCANG BUSANA');
INSERT INTO `pdk_pekerjaans` VALUES (40, 'PENTERJEMAH');
INSERT INTO `pdk_pekerjaans` VALUES (41, 'IMAM MASJID');
INSERT INTO `pdk_pekerjaans` VALUES (42, 'PENDETA');
INSERT INTO `pdk_pekerjaans` VALUES (43, 'PASTOR');
INSERT INTO `pdk_pekerjaans` VALUES (44, 'WARTAWAN');
INSERT INTO `pdk_pekerjaans` VALUES (45, 'USTADZ/MUBALIGH');
INSERT INTO `pdk_pekerjaans` VALUES (46, 'JURU MASAK');
INSERT INTO `pdk_pekerjaans` VALUES (47, 'PROMOTOR ACARA');
INSERT INTO `pdk_pekerjaans` VALUES (48, 'ANGGOTA DPR-RI');
INSERT INTO `pdk_pekerjaans` VALUES (49, 'ANGGOTA DPD');
INSERT INTO `pdk_pekerjaans` VALUES (50, 'ANGGOTA BPK');
INSERT INTO `pdk_pekerjaans` VALUES (51, 'PRESIDEN');
INSERT INTO `pdk_pekerjaans` VALUES (52, 'WAKIL PRESIDEN');
INSERT INTO `pdk_pekerjaans` VALUES (53, 'ANGGOTA MAHKAMAH KONSTITUSI');
INSERT INTO `pdk_pekerjaans` VALUES (54, 'ANGGOTA KABINET KEMENTERIAN');
INSERT INTO `pdk_pekerjaans` VALUES (55, 'DUTA BESAR');
INSERT INTO `pdk_pekerjaans` VALUES (56, 'GUBERNUR');
INSERT INTO `pdk_pekerjaans` VALUES (57, 'WAKIL GUBERNUR');
INSERT INTO `pdk_pekerjaans` VALUES (58, 'BUPATI');
INSERT INTO `pdk_pekerjaans` VALUES (59, 'WAKIL BUPATI');
INSERT INTO `pdk_pekerjaans` VALUES (60, 'WALIKOTA');
INSERT INTO `pdk_pekerjaans` VALUES (61, 'WAKIL WALIKOTA');
INSERT INTO `pdk_pekerjaans` VALUES (62, 'ANGGOTA DPRD PROVINSI');
INSERT INTO `pdk_pekerjaans` VALUES (63, 'ANGGOTA DPRD KABUPATEN/KOTA');
INSERT INTO `pdk_pekerjaans` VALUES (64, 'DOSEN');
INSERT INTO `pdk_pekerjaans` VALUES (65, 'GURU');
INSERT INTO `pdk_pekerjaans` VALUES (66, 'PILOT');
INSERT INTO `pdk_pekerjaans` VALUES (67, 'PENGACARA');
INSERT INTO `pdk_pekerjaans` VALUES (68, 'NOTARIS');
INSERT INTO `pdk_pekerjaans` VALUES (69, 'ARSITEK');
INSERT INTO `pdk_pekerjaans` VALUES (70, 'AKUNTAN');
INSERT INTO `pdk_pekerjaans` VALUES (71, 'KONSULTAN');
INSERT INTO `pdk_pekerjaans` VALUES (72, 'DOKTER');
INSERT INTO `pdk_pekerjaans` VALUES (73, 'BIDAN');
INSERT INTO `pdk_pekerjaans` VALUES (74, 'PERAWAT');
INSERT INTO `pdk_pekerjaans` VALUES (75, 'APOTEKER');
INSERT INTO `pdk_pekerjaans` VALUES (76, 'PSIKIATER/PSIKOLOG');
INSERT INTO `pdk_pekerjaans` VALUES (77, 'PENYIAR TELEVISI');
INSERT INTO `pdk_pekerjaans` VALUES (78, 'PENYIAR RADIO');
INSERT INTO `pdk_pekerjaans` VALUES (79, 'PELAUT');
INSERT INTO `pdk_pekerjaans` VALUES (80, 'PENELITI');
INSERT INTO `pdk_pekerjaans` VALUES (81, 'SOPIR');
INSERT INTO `pdk_pekerjaans` VALUES (82, 'PIALANG');
INSERT INTO `pdk_pekerjaans` VALUES (83, 'PARANORMAL');
INSERT INTO `pdk_pekerjaans` VALUES (84, 'PEDAGANG');
INSERT INTO `pdk_pekerjaans` VALUES (85, 'PERANGKAT DESA');
INSERT INTO `pdk_pekerjaans` VALUES (86, 'KEPALA DESA');
INSERT INTO `pdk_pekerjaans` VALUES (87, 'BIARAWATI');
INSERT INTO `pdk_pekerjaans` VALUES (88, 'WIRASWASTA');
INSERT INTO `pdk_pekerjaans` VALUES (89, 'TIDAK MEMPUNYAI PEKERJAAN TETAP');
INSERT INTO `pdk_pekerjaans` VALUES (90, 'PEDAGANG KELILING');
INSERT INTO `pdk_pekerjaans` VALUES (91, 'KONTRAKTOR');
INSERT INTO `pdk_pekerjaans` VALUES (92, 'MONTIR');
INSERT INTO `pdk_pekerjaans` VALUES (93, 'PEMUKA AGAMA');
INSERT INTO `pdk_pekerjaans` VALUES (94, 'KARYAWAN PERUSAHAAN PEMERINTAH');
INSERT INTO `pdk_pekerjaans` VALUES (95, 'GURU SWASTA');
INSERT INTO `pdk_pekerjaans` VALUES (96, 'PENGUSAHA PERDAGANGAN HASIL BUMI');
INSERT INTO `pdk_pekerjaans` VALUES (97, 'PENGUSAHA KECIL, MENENGAH DAN BESAR');
INSERT INTO `pdk_pekerjaans` VALUES (98, 'PEMILIK USAHA WARUNG, RUMAH MAKAN DAN RESTORAN');
INSERT INTO `pdk_pekerjaans` VALUES (99, 'PEDAGANG BARANG KELONTONG');
INSERT INTO `pdk_pekerjaans` VALUES (100, 'LAINNYA');

-- ----------------------------
-- Table structure for pdk_pendidikans
-- ----------------------------
DROP TABLE IF EXISTS `pdk_pendidikans`;
CREATE TABLE `pdk_pendidikans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_pendidikans
-- ----------------------------
INSERT INTO `pdk_pendidikans` VALUES (1, 'TIDAK / BELUM SEKOLAH');
INSERT INTO `pdk_pendidikans` VALUES (2, 'BELUM TAMAT SD/SEDERAJAT');
INSERT INTO `pdk_pendidikans` VALUES (3, 'TAMAT SD / SEDERAJAT');
INSERT INTO `pdk_pendidikans` VALUES (4, 'SLTP/SEDERAJAT');
INSERT INTO `pdk_pendidikans` VALUES (5, 'SLTA / SEDERAJAT');
INSERT INTO `pdk_pendidikans` VALUES (6, 'DIPLOMA I / II');
INSERT INTO `pdk_pendidikans` VALUES (7, 'AKADEMI/ DIPLOMA III/S. MUDA');
INSERT INTO `pdk_pendidikans` VALUES (8, 'DIPLOMA IV/ STRATA I');
INSERT INTO `pdk_pendidikans` VALUES (9, 'STRATA II');
INSERT INTO `pdk_pendidikans` VALUES (10, 'STRATA III');

-- ----------------------------
-- Table structure for pdk_warganegaras
-- ----------------------------
DROP TABLE IF EXISTS `pdk_warganegaras`;
CREATE TABLE `pdk_warganegaras`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pdk_warganegaras
-- ----------------------------
INSERT INTO `pdk_warganegaras` VALUES (1, 'WNI');
INSERT INTO `pdk_warganegaras` VALUES (2, 'WNA');
INSERT INTO `pdk_warganegaras` VALUES (3, 'DUA KEWARGANEGARAAN');

-- ----------------------------
-- Table structure for penduduk_akuns
-- ----------------------------
DROP TABLE IF EXISTS `penduduk_akuns`;
CREATE TABLE `penduduk_akuns`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `penduduk_id` bigint UNSIGNED NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nomor_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `penduduk_akuns_email_unique`(`email`) USING BTREE,
  INDEX `penduduk_akuns_penduduk_id_foreign`(`penduduk_id`) USING BTREE,
  CONSTRAINT `penduduk_akuns_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penduduk_akuns
-- ----------------------------

-- ----------------------------
-- Table structure for penduduk_dokuments
-- ----------------------------
DROP TABLE IF EXISTS `penduduk_dokuments`;
CREATE TABLE `penduduk_dokuments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `penduduk_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `surat_syarat_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `penduduk_dokuments_penduduk_id_foreign`(`penduduk_id`) USING BTREE,
  INDEX `penduduk_dokuments_surat_syarat_id_foreign`(`surat_syarat_id`) USING BTREE,
  CONSTRAINT `penduduk_dokuments_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penduduk_dokuments_surat_syarat_id_foreign` FOREIGN KEY (`surat_syarat_id`) REFERENCES `surat_syarats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penduduk_dokuments
-- ----------------------------

-- ----------------------------
-- Table structure for penduduk_keluargas
-- ----------------------------
DROP TABLE IF EXISTS `penduduk_keluargas`;
CREATE TABLE `penduduk_keluargas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepkel_id` bigint UNSIGNED NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rt` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rw` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kode_pos` int NULL DEFAULT NULL,
  `provinsi_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kota_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kecamatan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kelurahan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `korongs_id` bigint UNSIGNED NULL DEFAULT NULL,
  `tgl_cetak` date NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `penduduk_keluargas_nomor_kk_unique`(`nomor_kk`) USING BTREE,
  INDEX `penduduk_keluargas_provinsi_id_foreign`(`provinsi_id`) USING BTREE,
  INDEX `penduduk_keluargas_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `penduduk_keluargas_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `penduduk_keluargas_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `penduduk_keluargas_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `penduduk_keluargas_updated_by_foreign`(`updated_by`) USING BTREE,
  INDEX `penduduk_keluargas_kepkel_id_foreign`(`kepkel_id`) USING BTREE,
  INDEX `penduduk_keluargas_korongs_id_foreign`(`korongs_id`) USING BTREE,
  CONSTRAINT `penduduk_keluargas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduk_keluargas_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `wil_districts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduk_keluargas_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `wil_villages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduk_keluargas_kepkel_id_foreign` FOREIGN KEY (`kepkel_id`) REFERENCES `penduduks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduk_keluargas_korongs_id_foreign` FOREIGN KEY (`korongs_id`) REFERENCES `korongs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduk_keluargas_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `wil_regencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduk_keluargas_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `wil_provinces` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduk_keluargas_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penduduk_keluargas
-- ----------------------------

-- ----------------------------
-- Table structure for penduduks
-- ----------------------------
DROP TABLE IF EXISTS `penduduks`;
CREATE TABLE `penduduks`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor` int NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluarga_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jekel_id` bigint UNSIGNED NULL DEFAULT NULL,
  `tpt_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama_id` bigint UNSIGNED NULL DEFAULT NULL,
  `pendidikan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `pekerjaan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `darah_id` bigint UNSIGNED NULL DEFAULT NULL,
  `kawin_id` bigint UNSIGNED NULL DEFAULT NULL,
  `tgl_perkawinan` date NULL DEFAULT NULL,
  `hubungan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `warganegara_id` bigint UNSIGNED NULL DEFAULT NULL,
  `no_paspor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_kitap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `penduduks_nik_unique`(`nik`) USING BTREE,
  INDEX `penduduks_keluarga_id_foreign`(`keluarga_id`) USING BTREE,
  INDEX `penduduks_jekel_id_foreign`(`jekel_id`) USING BTREE,
  INDEX `penduduks_agama_id_foreign`(`agama_id`) USING BTREE,
  INDEX `penduduks_pendidikan_id_foreign`(`pendidikan_id`) USING BTREE,
  INDEX `penduduks_pekerjaan_id_foreign`(`pekerjaan_id`) USING BTREE,
  INDEX `penduduks_darah_id_foreign`(`darah_id`) USING BTREE,
  INDEX `penduduks_kawin_id_foreign`(`kawin_id`) USING BTREE,
  INDEX `penduduks_hubungan_id_foreign`(`hubungan_id`) USING BTREE,
  INDEX `penduduks_warganegara_id_foreign`(`warganegara_id`) USING BTREE,
  INDEX `penduduks_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `penduduks_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `penduduks_agama_id_foreign` FOREIGN KEY (`agama_id`) REFERENCES `pdk_agamas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_darah_id_foreign` FOREIGN KEY (`darah_id`) REFERENCES `pdk_darahs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_hubungan_id_foreign` FOREIGN KEY (`hubungan_id`) REFERENCES `pdk_hubungans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_jekel_id_foreign` FOREIGN KEY (`jekel_id`) REFERENCES `pdk_jekels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_kawin_id_foreign` FOREIGN KEY (`kawin_id`) REFERENCES `pdk_kawins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_keluarga_id_foreign` FOREIGN KEY (`keluarga_id`) REFERENCES `penduduk_keluargas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pdk_pekerjaans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_pendidikan_id_foreign` FOREIGN KEY (`pendidikan_id`) REFERENCES `pdk_pendidikans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `penduduks_warganegara_id_foreign` FOREIGN KEY (`warganegara_id`) REFERENCES `pdk_warganegaras` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penduduks
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 137 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'view_berita::berita', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (2, 'view_any_berita::berita', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (3, 'create_berita::berita', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (4, 'update_berita::berita', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (5, 'delete_berita::berita', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (6, 'view_berita::kategori', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (7, 'view_any_berita::kategori', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (8, 'create_berita::kategori', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (9, 'update_berita::kategori', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (10, 'delete_berita::kategori', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (11, 'view_kenagarian::nagari', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (12, 'view_any_kenagarian::nagari', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (13, 'create_kenagarian::nagari', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (14, 'update_kenagarian::nagari', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (15, 'delete_kenagarian::nagari', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (16, 'view_penduduk::penduduk', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (17, 'view_any_penduduk::penduduk', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (18, 'create_penduduk::penduduk', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (19, 'update_penduduk::penduduk', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (20, 'delete_penduduk::penduduk', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (21, 'view_penduduk::penduduk::keluarga', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (22, 'view_any_penduduk::penduduk::keluarga', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (23, 'create_penduduk::penduduk::keluarga', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (24, 'update_penduduk::penduduk::keluarga', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (25, 'delete_penduduk::penduduk::keluarga', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (26, 'view_penduduk::ref::agama', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (27, 'view_any_penduduk::ref::agama', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (28, 'create_penduduk::ref::agama', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (29, 'update_penduduk::ref::agama', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (30, 'delete_penduduk::ref::agama', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (31, 'view_penduduk::ref::darah', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (32, 'view_any_penduduk::ref::darah', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (33, 'create_penduduk::ref::darah', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (34, 'update_penduduk::ref::darah', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (35, 'delete_penduduk::ref::darah', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (36, 'view_penduduk::ref::etnis', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (37, 'view_any_penduduk::ref::etnis', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (38, 'create_penduduk::ref::etnis', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (39, 'update_penduduk::ref::etnis', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (40, 'delete_penduduk::ref::etnis', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (41, 'view_penduduk::ref::hubungan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (42, 'view_any_penduduk::ref::hubungan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (43, 'create_penduduk::ref::hubungan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (44, 'update_penduduk::ref::hubungan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (45, 'delete_penduduk::ref::hubungan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (46, 'view_penduduk::ref::jekel', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (47, 'view_any_penduduk::ref::jekel', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (48, 'create_penduduk::ref::jekel', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (49, 'update_penduduk::ref::jekel', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (50, 'delete_penduduk::ref::jekel', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (51, 'view_penduduk::ref::kawin', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (52, 'view_any_penduduk::ref::kawin', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (53, 'create_penduduk::ref::kawin', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (54, 'update_penduduk::ref::kawin', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (55, 'delete_penduduk::ref::kawin', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (56, 'view_penduduk::ref::pekerjaan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (57, 'view_any_penduduk::ref::pekerjaan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (58, 'create_penduduk::ref::pekerjaan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (59, 'update_penduduk::ref::pekerjaan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (60, 'delete_penduduk::ref::pekerjaan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (61, 'view_penduduk::ref::pendidikan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (62, 'view_any_penduduk::ref::pendidikan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (63, 'create_penduduk::ref::pendidikan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (64, 'update_penduduk::ref::pendidikan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (65, 'delete_penduduk::ref::pendidikan', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (66, 'view_penduduk::ref::warganegara', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (67, 'view_any_penduduk::ref::warganegara', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (68, 'create_penduduk::ref::warganegara', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (69, 'update_penduduk::ref::warganegara', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (70, 'delete_penduduk::ref::warganegara', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (71, 'view_shield::role', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (72, 'view_any_shield::role', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (73, 'create_shield::role', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (74, 'update_shield::role', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (75, 'delete_shield::role', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (76, 'delete_any_shield::role', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (77, 'view_surat::menunggu::ttd', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (78, 'view_any_surat::menunggu::ttd', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (79, 'create_surat::menunggu::ttd', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (80, 'update_surat::menunggu::ttd', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (81, 'delete_surat::menunggu::ttd', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (82, 'view_surat::siap::didownload', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (83, 'view_any_surat::siap::didownload', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (84, 'create_surat::siap::didownload', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (85, 'update_surat::siap::didownload', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (86, 'delete_surat::siap::didownload', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (87, 'view_surat::surat::ditolak', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (88, 'view_any_surat::surat::ditolak', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (89, 'create_surat::surat::ditolak', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (90, 'update_surat::surat::ditolak', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (91, 'delete_surat::surat::ditolak', 'admin', '2023-09-12 15:08:59', '2023-09-12 15:08:59');
INSERT INTO `permissions` VALUES (92, 'view_surat::surat::jenis', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (93, 'view_any_surat::surat::jenis', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (94, 'create_surat::surat::jenis', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (95, 'update_surat::surat::jenis', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (96, 'delete_surat::surat::jenis', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (97, 'view_surat::surat::masuk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (98, 'view_any_surat::surat::masuk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (99, 'create_surat::surat::masuk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (100, 'update_surat::surat::masuk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (101, 'delete_surat::surat::masuk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (102, 'view_surat::surat::syarat', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (103, 'view_any_surat::surat::syarat', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (104, 'create_surat::surat::syarat', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (105, 'update_surat::surat::syarat', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (106, 'delete_surat::surat::syarat', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (107, 'view_user::pegawai', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (108, 'view_any_user::pegawai', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (109, 'create_user::pegawai', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (110, 'update_user::pegawai', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (111, 'delete_user::pegawai', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (112, 'view_user::penduduk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (113, 'view_any_user::penduduk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (114, 'create_user::penduduk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (115, 'update_user::penduduk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (116, 'delete_user::penduduk', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (117, 'view_wilayah::district', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (118, 'view_any_wilayah::district', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (119, 'create_wilayah::district', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (120, 'update_wilayah::district', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (121, 'delete_wilayah::district', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (122, 'view_wilayah::province', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (123, 'view_any_wilayah::province', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (124, 'create_wilayah::province', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (125, 'update_wilayah::province', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (126, 'delete_wilayah::province', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (127, 'view_wilayah::regency', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (128, 'view_any_wilayah::regency', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (129, 'create_wilayah::regency', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (130, 'update_wilayah::regency', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (131, 'delete_wilayah::regency', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (132, 'view_wilayah::village', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (133, 'view_any_wilayah::village', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (134, 'create_wilayah::village', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (135, 'update_wilayah::village', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');
INSERT INTO `permissions` VALUES (136, 'delete_wilayah::village', 'admin', '2023-09-12 15:09:00', '2023-09-12 15:09:00');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for pmk
-- ----------------------------
DROP TABLE IF EXISTS `pmk`;
CREATE TABLE `pmk`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint UNSIGNED NOT NULL,
  `sub_bidang_id` bigint UNSIGNED NOT NULL,
  `sumber_anggaran_id` bigint UNSIGNED NOT NULL,
  `pagu_anggaran_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pmk_bidang_id_foreign`(`bidang_id`) USING BTREE,
  INDEX `pmk_sub_bidang_id_foreign`(`sub_bidang_id`) USING BTREE,
  INDEX `pmk_sumber_anggaran_id_foreign`(`sumber_anggaran_id`) USING BTREE,
  INDEX `pmk_pagu_anggaran_id_foreign`(`pagu_anggaran_id`) USING BTREE,
  CONSTRAINT `pmk_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pmk_pagu_anggaran_id_foreign` FOREIGN KEY (`pagu_anggaran_id`) REFERENCES `pagu_anggaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pmk_sub_bidang_id_foreign` FOREIGN KEY (`sub_bidang_id`) REFERENCES `sub_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pmk_sumber_anggaran_id_foreign` FOREIGN KEY (`sumber_anggaran_id`) REFERENCES `sumber_anggaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmk
-- ----------------------------

-- ----------------------------
-- Table structure for pmk_status
-- ----------------------------
DROP TABLE IF EXISTS `pmk_status`;
CREATE TABLE `pmk_status`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pmk_status
-- ----------------------------
INSERT INTO `pmk_status` VALUES (1, 'Dikirim', '2023-09-12 17:59:55', '2023-09-12 17:59:52');
INSERT INTO `pmk_status` VALUES (2, 'Ditinjau', '2023-09-12 18:00:03', '2023-09-12 18:00:00');
INSERT INTO `pmk_status` VALUES (3, 'Diterima', '2023-09-12 18:00:11', '2023-09-12 18:00:07');
INSERT INTO `pmk_status` VALUES (4, 'Ditolak', '2023-09-12 18:00:20', '2023-09-12 18:00:16');
INSERT INTO `pmk_status` VALUES (5, 'Invalid', '2023-09-12 18:02:30', '2023-09-12 18:02:27');

-- ----------------------------
-- Table structure for spp
-- ----------------------------
DROP TABLE IF EXISTS `spp`;
CREATE TABLE `spp`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `pmk_status_id` bigint UNSIGNED NOT NULL,
  `bidang_id` bigint UNSIGNED NOT NULL,
  `sub_bidang_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `spp_pmk_status_id_foreign`(`pmk_status_id`) USING BTREE,
  INDEX `spp_bidang_id_foreign`(`bidang_id`) USING BTREE,
  INDEX `spp_sub_bidang_id_foreign`(`sub_bidang_id`) USING BTREE,
  CONSTRAINT `spp_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `spp_pmk_status_id_foreign` FOREIGN KEY (`pmk_status_id`) REFERENCES `pmk_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `spp_sub_bidang_id_foreign` FOREIGN KEY (`sub_bidang_id`) REFERENCES `sub_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spp
-- ----------------------------
INSERT INTO `spp` VALUES (2, '1', 'gerak jalan', 2023, 1, 1, 1, '2023-09-12 18:10:51', '2023-09-15 08:07:56');
INSERT INTO `spp` VALUES (3, '1', 'asd', 2023, 1, 1, 1, '2023-09-15 14:16:52', '2023-09-15 08:40:01');
INSERT INTO `spp` VALUES (4, '2', 'jalan santuy', 2023, 1, 1, 1, '2023-09-15 10:26:18', '2023-09-15 10:28:15');
INSERT INTO `spp` VALUES (6, '2', 'Lomba Lari', 2023, 5, 2, 3, '2023-09-16 23:01:18', '2023-09-16 23:01:18');

-- ----------------------------
-- Table structure for spp_keperluan
-- ----------------------------
DROP TABLE IF EXISTS `spp_keperluan`;
CREATE TABLE `spp_keperluan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `spp_id` bigint UNSIGNED NOT NULL,
  `keperluan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengambilan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `spp_keperluan_spp_id_foreign`(`spp_id`) USING BTREE,
  CONSTRAINT `spp_keperluan_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spp_keperluan
-- ----------------------------
INSERT INTO `spp_keperluan` VALUES (1, 2, 'Makan', 1000, '2023-09-12 18:19:49', '2023-09-12 18:19:49');
INSERT INTO `spp_keperluan` VALUES (2, 2, 'Minum', 1000, '2023-09-12 18:20:09', '2023-09-12 18:20:09');
INSERT INTO `spp_keperluan` VALUES (3, 3, 'makan', 5000, '2023-09-15 14:17:54', '2023-09-15 14:17:54');
INSERT INTO `spp_keperluan` VALUES (4, 4, 'makan', 10000, '2023-09-15 10:26:51', '2023-09-15 10:26:51');
INSERT INTO `spp_keperluan` VALUES (5, 4, 'Minum', 5000, '2023-09-15 10:27:02', '2023-09-15 10:27:02');
INSERT INTO `spp_keperluan` VALUES (6, 6, 'makan', 30000, '2023-09-16 23:05:56', '2023-09-16 23:05:56');
INSERT INTO `spp_keperluan` VALUES (7, 6, 'minum', 15000, '2023-09-16 23:07:15', '2023-09-16 23:07:15');

-- ----------------------------
-- Table structure for sub_bidang
-- ----------------------------
DROP TABLE IF EXISTS `sub_bidang`;
CREATE TABLE `sub_bidang`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sub_bidang_bidang_id_foreign`(`bidang_id`) USING BTREE,
  CONSTRAINT `sub_bidang_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_bidang
-- ----------------------------
INSERT INTO `sub_bidang` VALUES (1, 'Sub bidang 1', 1, '2023-09-12 15:55:22', '2023-09-15 13:15:31');
INSERT INTO `sub_bidang` VALUES (2, 'Sub bidang 2', 1, '2023-09-12 15:55:42', '2023-09-15 13:18:27');
INSERT INTO `sub_bidang` VALUES (3, 'Sub 1', 2, '2023-09-16 22:50:30', '2023-09-16 22:50:30');
INSERT INTO `sub_bidang` VALUES (4, 'Sub 2', 2, '2023-09-16 22:50:43', '2023-09-16 22:50:43');

-- ----------------------------
-- Table structure for sumber_anggaran
-- ----------------------------
DROP TABLE IF EXISTS `sumber_anggaran`;
CREATE TABLE `sumber_anggaran`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sumber_anggaran
-- ----------------------------
INSERT INTO `sumber_anggaran` VALUES (1, 'Sumber anggaran pribadi', '2023-09-12 16:48:51', '2023-09-12 16:48:51');

-- ----------------------------
-- Table structure for surat_has_syarat
-- ----------------------------
DROP TABLE IF EXISTS `surat_has_syarat`;
CREATE TABLE `surat_has_syarat`  (
  `surat_jenis_id` bigint UNSIGNED NOT NULL,
  `surat_syarat_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`surat_jenis_id`, `surat_syarat_id`) USING BTREE,
  INDEX `surat_has_syarat_surat_syarat_id_foreign`(`surat_syarat_id`) USING BTREE,
  CONSTRAINT `surat_has_syarat_surat_jenis_id_foreign` FOREIGN KEY (`surat_jenis_id`) REFERENCES `surat_jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `surat_has_syarat_surat_syarat_id_foreign` FOREIGN KEY (`surat_syarat_id`) REFERENCES `surat_syarats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of surat_has_syarat
-- ----------------------------

-- ----------------------------
-- Table structure for surat_jenis
-- ----------------------------
DROP TABLE IF EXISTS `surat_jenis`;
CREATE TABLE `surat_jenis`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nf_singkatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nf_wilayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nf_romawi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_template` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `custom_template` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form_isian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kode_isian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `syarat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_available` tinyint(1) NOT NULL DEFAULT 0,
  `ikon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` bigint UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `surat_jenis_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `surat_jenis_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `surat_jenis_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `surat_jenis_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of surat_jenis
-- ----------------------------

-- ----------------------------
-- Table structure for surat_permohonans
-- ----------------------------
DROP TABLE IF EXISTS `surat_permohonans`;
CREATE TABLE `surat_permohonans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `surat_jenis_id` bigint UNSIGNED NULL DEFAULT NULL,
  `nomor_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemohon_id` bigint UNSIGNED NULL DEFAULT NULL,
  `isian_form` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu Diperiksa',
  `alasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alasan_ditolak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hp_aktif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_ttd` tinyint(1) NOT NULL DEFAULT 0,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permohonan_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `checked_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  `download_at` timestamp NULL DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checked_by` bigint UNSIGNED NULL DEFAULT NULL,
  `approved_by` bigint UNSIGNED NULL DEFAULT NULL,
  `rejected_by` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `surat_permohonans_surat_jenis_id_foreign`(`surat_jenis_id`) USING BTREE,
  INDEX `surat_permohonans_pemohon_id_foreign`(`pemohon_id`) USING BTREE,
  INDEX `surat_permohonans_checked_by_foreign`(`checked_by`) USING BTREE,
  INDEX `surat_permohonans_approved_by_foreign`(`approved_by`) USING BTREE,
  INDEX `surat_permohonans_rejected_by_foreign`(`rejected_by`) USING BTREE,
  CONSTRAINT `surat_permohonans_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `surat_permohonans_checked_by_foreign` FOREIGN KEY (`checked_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `surat_permohonans_pemohon_id_foreign` FOREIGN KEY (`pemohon_id`) REFERENCES `penduduks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `surat_permohonans_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `surat_permohonans_surat_jenis_id_foreign` FOREIGN KEY (`surat_jenis_id`) REFERENCES `surat_jenis` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of surat_permohonans
-- ----------------------------

-- ----------------------------
-- Table structure for surat_syarats
-- ----------------------------
DROP TABLE IF EXISTS `surat_syarats`;
CREATE TABLE `surat_syarats`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of surat_syarats
-- ----------------------------
INSERT INTO `surat_syarats` VALUES (1, 'Surat Pengantar RT/RW');
INSERT INTO `surat_syarats` VALUES (2, 'Fotokopi KK');
INSERT INTO `surat_syarats` VALUES (3, 'Fotokopi KTP');
INSERT INTO `surat_syarats` VALUES (4, 'Fotokopi Surat Nikah/Akta Nikah/Kutipan Akta Perkawinan');
INSERT INTO `surat_syarats` VALUES (5, 'Fotokopi Akta Kelahiran/Surat Kelahiran bagi keluarga yang mempunyai anak');
INSERT INTO `surat_syarats` VALUES (6, 'Surat Pindah Datang dari tempat asal');
INSERT INTO `surat_syarats` VALUES (7, 'Surat Keterangan Kematian dari Rumah Sakit, Rumah Bersalin Puskesmas, atau visum Dokter');
INSERT INTO `surat_syarats` VALUES (8, 'Surat Keterangan Cerai');
INSERT INTO `surat_syarats` VALUES (9, 'Fotokopi Ijasah Terakhir');
INSERT INTO `surat_syarats` VALUES (10, 'SK. PNS/KARIP/SK. TNI – POLRI');
INSERT INTO `surat_syarats` VALUES (11, 'Surat Keterangan Kematian dari Kepala Desa/Kelurahan');
INSERT INTO `surat_syarats` VALUES (12, 'Surat imigrasi / STMD (Surat Tanda Melapor Diri)');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `penduduk_id` bigint UNSIGNED NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan_id` bigint UNSIGNED NULL DEFAULT NULL,
  `nomor_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_jabatan_id_foreign`(`jabatan_id`) USING BTREE,
  INDEX `users_penduduk_id_foreign`(`penduduk_id`) USING BTREE,
  CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `users_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, NULL, 'superman@gmail.com', 'IT Suport', 1, NULL, NULL, '$2y$10$8A/nO7MzxOhQ.uFb.ivbGOwOcqdTcC4tMkqgvMatqZjToPd8eCNaW', 1, 1, NULL, '2023-09-12 15:08:26', '2023-09-12 15:08:26');
INSERT INTO `users` VALUES (2, NULL, NULL, 'bendahara@bendahara.com', 'Benadahara', 5, NULL, NULL, '$2y$10$8A/nO7MzxOhQ.uFb.ivbGOwOcqdTcC4tMkqgvMatqZjToPd8eCNaW', 1, 1, 'un0lWcCwATgJtGALh1L30yy89RCzEwIC5eDpmXu1eZJag4f3nZTwGsk4noOb', '2023-09-15 10:12:46', '2023-09-15 10:12:49');

-- ----------------------------
-- Table structure for wil_districts
-- ----------------------------
DROP TABLE IF EXISTS `wil_districts`;
CREATE TABLE `wil_districts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `regency_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wil_districts_regency_id_foreign`(`regency_id`) USING BTREE,
  CONSTRAINT `wil_districts_regency_id_foreign` FOREIGN KEY (`regency_id`) REFERENCES `wil_regencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 130714 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wil_districts
-- ----------------------------
INSERT INTO `wil_districts` VALUES (130501, 1305, 'LUBUK ALUNG');
INSERT INTO `wil_districts` VALUES (130502, 1305, 'BATANG ANAI');
INSERT INTO `wil_districts` VALUES (130503, 1305, 'NAN SABARIS');
INSERT INTO `wil_districts` VALUES (130504, 1305, '2 X 11 ENAM LINGKUNG');
INSERT INTO `wil_districts` VALUES (130505, 1305, 'VII KOTO SUNGAI SARIAK');
INSERT INTO `wil_districts` VALUES (130506, 1305, 'V KOTO KP DALAM');
INSERT INTO `wil_districts` VALUES (130507, 1305, 'SUNGAI GERINGGING');
INSERT INTO `wil_districts` VALUES (130508, 1305, 'SUNGAI LIMAU');
INSERT INTO `wil_districts` VALUES (130509, 1305, 'IV KOTO AUR MALINTANG');
INSERT INTO `wil_districts` VALUES (130510, 1305, 'ULAKAN TAPAKIS');
INSERT INTO `wil_districts` VALUES (130511, 1305, 'SINTUK TOBOH GADANG');
INSERT INTO `wil_districts` VALUES (130512, 1305, 'PADANG SAGO');
INSERT INTO `wil_districts` VALUES (130513, 1305, 'BATANG GASAN');
INSERT INTO `wil_districts` VALUES (130514, 1305, 'V KOTO TIMUR');
INSERT INTO `wil_districts` VALUES (130515, 1305, '2 X 11 KAYU TANAM');
INSERT INTO `wil_districts` VALUES (130516, 1305, 'PATAMUAN');
INSERT INTO `wil_districts` VALUES (130517, 1305, 'ENAM LINGKUNG');
INSERT INTO `wil_districts` VALUES (130701, 1307, 'SULIKI');
INSERT INTO `wil_districts` VALUES (130702, 1307, 'GUGUAK');
INSERT INTO `wil_districts` VALUES (130703, 1307, 'PAYAKUMBUH');
INSERT INTO `wil_districts` VALUES (130704, 1307, 'LUAK');
INSERT INTO `wil_districts` VALUES (130705, 1307, 'HARAU');
INSERT INTO `wil_districts` VALUES (130706, 1307, 'PANGKALAN KOTO BARU');
INSERT INTO `wil_districts` VALUES (130707, 1307, 'KAPUR IX');
INSERT INTO `wil_districts` VALUES (130708, 1307, 'GUNUANG OMEH');
INSERT INTO `wil_districts` VALUES (130709, 1307, 'LAREH SAGO HALABAN');
INSERT INTO `wil_districts` VALUES (130710, 1307, 'SITUJUAH LIMO NAGARI');
INSERT INTO `wil_districts` VALUES (130711, 1307, 'MUNGKA');
INSERT INTO `wil_districts` VALUES (130712, 1307, 'BUKIK BARISAN');
INSERT INTO `wil_districts` VALUES (130713, 1307, 'AKABILURU');

-- ----------------------------
-- Table structure for wil_provinces
-- ----------------------------
DROP TABLE IF EXISTS `wil_provinces`;
CREATE TABLE `wil_provinces`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 95 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wil_provinces
-- ----------------------------
INSERT INTO `wil_provinces` VALUES (11, 'ACEH');
INSERT INTO `wil_provinces` VALUES (12, 'SUMATERA UTARA');
INSERT INTO `wil_provinces` VALUES (13, 'SUMATERA BARAT');
INSERT INTO `wil_provinces` VALUES (14, 'RIAU');
INSERT INTO `wil_provinces` VALUES (15, 'JAMBI');
INSERT INTO `wil_provinces` VALUES (16, 'SUMATERA SELATAN');
INSERT INTO `wil_provinces` VALUES (17, 'BENGKULU');
INSERT INTO `wil_provinces` VALUES (18, 'LAMPUNG');
INSERT INTO `wil_provinces` VALUES (19, 'KEPULAUAN BANGKA BELITUNG');
INSERT INTO `wil_provinces` VALUES (21, 'KEPULAUAN RIAU');
INSERT INTO `wil_provinces` VALUES (31, 'DKI JAKARTA');
INSERT INTO `wil_provinces` VALUES (32, 'JAWA BARAT');
INSERT INTO `wil_provinces` VALUES (33, 'JAWA TENGAH');
INSERT INTO `wil_provinces` VALUES (34, 'DI YOGYAKARTA');
INSERT INTO `wil_provinces` VALUES (35, 'JAWA TIMUR');
INSERT INTO `wil_provinces` VALUES (36, 'BANTEN');
INSERT INTO `wil_provinces` VALUES (51, 'BALI');
INSERT INTO `wil_provinces` VALUES (52, 'NUSA TENGGARA BARAT');
INSERT INTO `wil_provinces` VALUES (53, 'NUSA TENGGARA TIMUR');
INSERT INTO `wil_provinces` VALUES (61, 'KALIMANTAN BARAT');
INSERT INTO `wil_provinces` VALUES (62, 'KALIMANTAN TENGAH');
INSERT INTO `wil_provinces` VALUES (63, 'KALIMANTAN SELATAN');
INSERT INTO `wil_provinces` VALUES (64, 'KALIMANTAN TIMUR');
INSERT INTO `wil_provinces` VALUES (65, 'KALIMANTAN UTARA');
INSERT INTO `wil_provinces` VALUES (71, 'SULAWESI UTARA');
INSERT INTO `wil_provinces` VALUES (72, 'SULAWESI TENGAH');
INSERT INTO `wil_provinces` VALUES (73, 'SULAWESI SELATAN');
INSERT INTO `wil_provinces` VALUES (74, 'SULAWESI TENGGARA');
INSERT INTO `wil_provinces` VALUES (75, 'GORONTALO');
INSERT INTO `wil_provinces` VALUES (76, 'SULAWESI BARAT');
INSERT INTO `wil_provinces` VALUES (81, 'MALUKU');
INSERT INTO `wil_provinces` VALUES (82, 'MALUKU UTARA');
INSERT INTO `wil_provinces` VALUES (91, 'PAPUA BARAT');
INSERT INTO `wil_provinces` VALUES (94, 'PAPUA');

-- ----------------------------
-- Table structure for wil_regencies
-- ----------------------------
DROP TABLE IF EXISTS `wil_regencies`;
CREATE TABLE `wil_regencies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `province_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wil_regencies_province_id_foreign`(`province_id`) USING BTREE,
  CONSTRAINT `wil_regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `wil_provinces` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1378 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wil_regencies
-- ----------------------------
INSERT INTO `wil_regencies` VALUES (1301, 13, 'KABUPATEN PESISIR SELATAN');
INSERT INTO `wil_regencies` VALUES (1302, 13, 'KABUPATEN SOLOK');
INSERT INTO `wil_regencies` VALUES (1303, 13, 'KABUPATEN SIJUNJUNG');
INSERT INTO `wil_regencies` VALUES (1304, 13, 'KABUPATEN TANAH DATAR');
INSERT INTO `wil_regencies` VALUES (1305, 13, 'KABUPATEN PADANG PARIAMAN');
INSERT INTO `wil_regencies` VALUES (1306, 13, 'KABUPATEN AGAM');
INSERT INTO `wil_regencies` VALUES (1307, 13, 'KABUPATEN LIMA PULUH KOTA');
INSERT INTO `wil_regencies` VALUES (1308, 13, 'KABUPATEN PASAMAN');
INSERT INTO `wil_regencies` VALUES (1309, 13, 'KABUPATEN KEPULAUAN MENTAWAI');
INSERT INTO `wil_regencies` VALUES (1310, 13, 'KABUPATEN DHARMASRAYA');
INSERT INTO `wil_regencies` VALUES (1311, 13, 'KABUPATEN SOLOK SELATAN');
INSERT INTO `wil_regencies` VALUES (1312, 13, 'KABUPATEN PASAMAN BARAT');
INSERT INTO `wil_regencies` VALUES (1371, 13, 'KOTA PADANG');
INSERT INTO `wil_regencies` VALUES (1372, 13, 'KOTA SOLOK');
INSERT INTO `wil_regencies` VALUES (1373, 13, 'KOTA SAWAH LUNTO');
INSERT INTO `wil_regencies` VALUES (1374, 13, 'KOTA PADANG PANJANG');
INSERT INTO `wil_regencies` VALUES (1375, 13, 'KOTA BUKITTINGGI');
INSERT INTO `wil_regencies` VALUES (1376, 13, 'KOTA PAYAKUMBUH');
INSERT INTO `wil_regencies` VALUES (1377, 13, 'KOTA PARIAMAN');

-- ----------------------------
-- Table structure for wil_villages
-- ----------------------------
DROP TABLE IF EXISTS `wil_villages`;
CREATE TABLE `wil_villages`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wil_villages_district_id_foreign`(`district_id`) USING BTREE,
  CONSTRAINT `wil_villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `wil_districts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1305172006 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wil_villages
-- ----------------------------
INSERT INTO `wil_villages` VALUES (1305012001, 130501, 'LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012002, 130501, 'PUNGGUNG KASIAK LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012003, 130501, 'PASIE LAWEH LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012004, 130501, 'AIE TAJUN LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012005, 130501, 'SIKABU LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012006, 130501, 'SUNGAI ABANG LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012007, 130501, 'SINGGULING LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012008, 130501, 'SALIBUTAN LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305012009, 130501, 'BALAH HILIA LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305022001, 130502, 'KATAPIANG');
INSERT INTO `wil_villages` VALUES (1305022002, 130502, 'KASANG');
INSERT INTO `wil_villages` VALUES (1305022003, 130502, 'SUNGAI BULUH');
INSERT INTO `wil_villages` VALUES (1305022004, 130502, 'BUAYAN LUBUK ALUNG');
INSERT INTO `wil_villages` VALUES (1305022005, 130502, 'SUNGAI BULUH TIMUR');
INSERT INTO `wil_villages` VALUES (1305022006, 130502, 'SUNGAI BULUH BARAT');
INSERT INTO `wil_villages` VALUES (1305022007, 130502, 'SUNGAI BULUH UTARA');
INSERT INTO `wil_villages` VALUES (1305022008, 130502, 'SUNGAI BULUH SELATAN');
INSERT INTO `wil_villages` VALUES (1305032001, 130503, 'KAPALO KOTO');
INSERT INTO `wil_villages` VALUES (1305032002, 130503, 'PAUAH KAMBA');
INSERT INTO `wil_villages` VALUES (1305032003, 130503, 'PADANG BINTUNGAN');
INSERT INTO `wil_villages` VALUES (1305032004, 130503, 'KURAI TAJI');
INSERT INTO `wil_villages` VALUES (1305032005, 130503, 'SUNUA');
INSERT INTO `wil_villages` VALUES (1305032006, 130503, 'PADANG KANDANG PULAU AIR PADANG BINTUNGAN');
INSERT INTO `wil_villages` VALUES (1305032007, 130503, 'SUNUR TENGAH');
INSERT INTO `wil_villages` VALUES (1305032008, 130503, 'SUNUR BARAT');
INSERT INTO `wil_villages` VALUES (1305032009, 130503, 'KURAI TAJI TIMUR');
INSERT INTO `wil_villages` VALUES (1305042002, 130504, 'SICINCIN');
INSERT INTO `wil_villages` VALUES (1305042003, 130504, 'LUBUK PANDAN');
INSERT INTO `wil_villages` VALUES (1305042004, 130504, 'SUNGAI ASAM');
INSERT INTO `wil_villages` VALUES (1305052001, 130505, 'BALAH AIA');
INSERT INTO `wil_villages` VALUES (1305052002, 130505, 'SUNGAI SARIAK');
INSERT INTO `wil_villages` VALUES (1305052003, 130505, 'LURAH AMPALU');
INSERT INTO `wil_villages` VALUES (1305052004, 130505, 'LAREH NAN PANJANG');
INSERT INTO `wil_villages` VALUES (1305052005, 130505, 'LAREH NAN PANJANG SELATAN');
INSERT INTO `wil_villages` VALUES (1305052006, 130505, 'LAREH NAN PANJANG BARAT');
INSERT INTO `wil_villages` VALUES (1305052007, 130505, 'BISATI SUNGAI SARIAK');
INSERT INTO `wil_villages` VALUES (1305052008, 130505, 'AMBUANG KAPUA SUNGAI SARIAK');
INSERT INTO `wil_villages` VALUES (1305052009, 130505, 'LAREH NAN PANJANG SUNGAI SARIAK');
INSERT INTO `wil_villages` VALUES (1305052010, 130505, 'LIMPATO SUNGAI SARIAK');
INSERT INTO `wil_villages` VALUES (1305052011, 130505, 'BALAH AIE UTARA');
INSERT INTO `wil_villages` VALUES (1305052012, 130505, 'BALAH AIE TIMUR');
INSERT INTO `wil_villages` VALUES (1305062001, 130506, 'CAMPAGO');
INSERT INTO `wil_villages` VALUES (1305062002, 130506, 'SIKUCUR');
INSERT INTO `wil_villages` VALUES (1305062003, 130506, 'CAMPAGO BARAT');
INSERT INTO `wil_villages` VALUES (1305062004, 130506, 'CAMPAGO SELATAN');
INSERT INTO `wil_villages` VALUES (1305062005, 130506, 'SIKUCUR UTARA');
INSERT INTO `wil_villages` VALUES (1305062006, 130506, 'SIKUCUR TIMUR');
INSERT INTO `wil_villages` VALUES (1305062007, 130506, 'SIKUCUR TENGAH');
INSERT INTO `wil_villages` VALUES (1305062008, 130506, 'SIKUCUR BARAT');
INSERT INTO `wil_villages` VALUES (1305072001, 130507, 'KURANJI HULU');
INSERT INTO `wil_villages` VALUES (1305072002, 130507, 'MALAI III KOTO');
INSERT INTO `wil_villages` VALUES (1305072003, 130507, 'BATU GADANG KURANJI HULU');
INSERT INTO `wil_villages` VALUES (1305072004, 130507, 'SUNGAI SIRAH KURANJI HULU');
INSERT INTO `wil_villages` VALUES (1305082001, 130508, 'KURANJI HILIR');
INSERT INTO `wil_villages` VALUES (1305082002, 130508, 'PILUBANG');
INSERT INTO `wil_villages` VALUES (1305082003, 130508, 'GUGUAK KURANJI HILIR');
INSERT INTO `wil_villages` VALUES (1305082004, 130508, 'KOTO TINGGI KURANJI HILIR');
INSERT INTO `wil_villages` VALUES (1305092001, 130509, 'III KOTO AUR MALINTANG');
INSERT INTO `wil_villages` VALUES (1305092002, 130509, 'III KOTO AUR MALINTANG UTARA');
INSERT INTO `wil_villages` VALUES (1305092003, 130509, 'III KOTO AUR MALINTANG TIMUR');
INSERT INTO `wil_villages` VALUES (1305092004, 130509, 'III KOTO AUR MALINTANG SELATAN');
INSERT INTO `wil_villages` VALUES (1305092005, 130509, 'BALAI BAIK MALAI III KOTO');
INSERT INTO `wil_villages` VALUES (1305102001, 130510, 'TAPAKIS');
INSERT INTO `wil_villages` VALUES (1305102002, 130510, 'ULAKAN');
INSERT INTO `wil_villages` VALUES (1305102003, 130510, 'PADANG TOBOH ULAKAN');
INSERT INTO `wil_villages` VALUES (1305102004, 130510, 'SUNGAI GIMBA ULAKAN');
INSERT INTO `wil_villages` VALUES (1305102005, 130510, 'SEULAYAT ULAKAN');
INSERT INTO `wil_villages` VALUES (1305102006, 130510, 'MANGGOPOH PALAK GADANG ULAKAN');
INSERT INTO `wil_villages` VALUES (1305102007, 130510, 'SANDI ULAKAN');
INSERT INTO `wil_villages` VALUES (1305102008, 130510, 'KAMPUANG GALAPUANG ULAKAN');
INSERT INTO `wil_villages` VALUES (1305112001, 130511, 'SINTUK');
INSERT INTO `wil_villages` VALUES (1305112002, 130511, 'TOBOH GADANG');
INSERT INTO `wil_villages` VALUES (1305112003, 130511, 'TOBOH GADANG SELATAN');
INSERT INTO `wil_villages` VALUES (1305112004, 130511, 'TOBOH GADANG BARAT');
INSERT INTO `wil_villages` VALUES (1305112005, 130511, 'TOBOH GADANG TIMUR');
INSERT INTO `wil_villages` VALUES (1305122001, 130512, 'KOTO BARU');
INSERT INTO `wil_villages` VALUES (1305122002, 130512, 'KOTO DALAM');
INSERT INTO `wil_villages` VALUES (1305122003, 130512, 'BATU KALANG');
INSERT INTO `wil_villages` VALUES (1305122004, 130512, 'KOTO DALAM BARAT');
INSERT INTO `wil_villages` VALUES (1305122005, 130512, 'KOTO DALAM SELATAN');
INSERT INTO `wil_villages` VALUES (1305122006, 130512, 'BATU KALANG UTARA');
INSERT INTO `wil_villages` VALUES (1305132001, 130513, 'MALAI V SUKU');
INSERT INTO `wil_villages` VALUES (1305132002, 130513, 'GASAN GADANG');
INSERT INTO `wil_villages` VALUES (1305132003, 130513, 'MALAI V SUKU TIMUR');
INSERT INTO `wil_villages` VALUES (1305142001, 130514, 'KUDU GANTIANG');
INSERT INTO `wil_villages` VALUES (1305142002, 130514, 'LIMAU PURUIK');
INSERT INTO `wil_villages` VALUES (1305142003, 130514, 'GUNUNG PADANG ALAI');
INSERT INTO `wil_villages` VALUES (1305142004, 130514, 'KUDU GANTIANG BARAT');
INSERT INTO `wil_villages` VALUES (1305152001, 130515, 'KAYU TANAM');
INSERT INTO `wil_villages` VALUES (1305152002, 130515, 'GUGUAK');
INSERT INTO `wil_villages` VALUES (1305152003, 130515, 'ANDURING');
INSERT INTO `wil_villages` VALUES (1305152004, 130515, 'KAPALO HILALANG');
INSERT INTO `wil_villages` VALUES (1305162001, 130516, 'SUNGAI DURIAN');
INSERT INTO `wil_villages` VALUES (1305162002, 130516, 'TANDIKEK');
INSERT INTO `wil_villages` VALUES (1305162003, 130516, 'TANDIKEK UTARA');
INSERT INTO `wil_villages` VALUES (1305162004, 130516, 'TANDIKEK SELATAN');
INSERT INTO `wil_villages` VALUES (1305162005, 130516, 'TANDIKEK BARAT');
INSERT INTO `wil_villages` VALUES (1305162006, 130516, 'KAMPUANG TANJUANG KOTO MAMBANG SUNGAI DURIAN');
INSERT INTO `wil_villages` VALUES (1305172001, 130517, 'PAKANDANGAN');
INSERT INTO `wil_villages` VALUES (1305172002, 130517, 'KOTO TINGGI');
INSERT INTO `wil_villages` VALUES (1305172003, 130517, 'TOBOH KETEK');
INSERT INTO `wil_villages` VALUES (1305172004, 130517, 'PARIK MALINTANG');
INSERT INTO `wil_villages` VALUES (1305172005, 130517, 'GADUA');

SET FOREIGN_KEY_CHECKS = 1;
