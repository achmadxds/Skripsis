/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : db_skripsi

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 06/03/2022 08:59:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tauth
-- ----------------------------
DROP TABLE IF EXISTS `tauth`;
CREATE TABLE `tauth`  (
  `Iduser` int(11) NULL DEFAULT NULL,
  `Namalevel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tauth
-- ----------------------------
INSERT INTO `tauth` VALUES (1, 'dosen');
INSERT INTO `tauth` VALUES (15, 'dosen');
INSERT INTO `tauth` VALUES (14, 'dosen');
INSERT INTO `tauth` VALUES (16, 'dosen');
INSERT INTO `tauth` VALUES (2, 'dosen');
INSERT INTO `tauth` VALUES (3, 'dosen');
INSERT INTO `tauth` VALUES (4, 'dosen');
INSERT INTO `tauth` VALUES (5, 'dosen');
INSERT INTO `tauth` VALUES (6, 'dosen');
INSERT INTO `tauth` VALUES (7, 'dosen');
INSERT INTO `tauth` VALUES (8, 'dosen');
INSERT INTO `tauth` VALUES (9, 'dosen');
INSERT INTO `tauth` VALUES (10, 'dosen');
INSERT INTO `tauth` VALUES (11, 'dosen');
INSERT INTO `tauth` VALUES (12, 'dosen');
INSERT INTO `tauth` VALUES (13, 'dosen');
INSERT INTO `tauth` VALUES (17, 'operator');
INSERT INTO `tauth` VALUES (5, 'kaprodi');
INSERT INTO `tauth` VALUES (16, 'koordinator');

-- ----------------------------
-- Table structure for tbimbingans
-- ----------------------------
DROP TABLE IF EXISTS `tbimbingans`;
CREATE TABLE `tbimbingans`  (
  `BimbingansId` int(11) NOT NULL AUTO_INCREMENT,
  `BimbingansPeriodeId` int(11) NULL DEFAULT NULL,
  `BimbingansDosbingsId` int(11) NULL DEFAULT NULL,
  `BimbingansMhsNim` int(11) NULL DEFAULT NULL,
  `BimbingansBab` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `BimbingansKet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `BimbingansFile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `BimbingansTgl` date NULL DEFAULT NULL,
  `BimbingansDosenId` int(11) NULL DEFAULT NULL,
  `BimbingansBalasanFile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `BimbingansBalasanKet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `BimbingansBalasanTgl` date NULL DEFAULT NULL,
  `BimbingansStatus` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`BimbingansId`) USING BTREE,
  INDEX `bim_dosen_id`(`BimbingansDosbingsId`) USING BTREE,
  CONSTRAINT `tbimbingans_ibfk_1` FOREIGN KEY (`BimbingansDosbingsId`) REFERENCES `tdosbings` (`DosbingsId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbimbingans
-- ----------------------------
INSERT INTO `tbimbingans` VALUES (1, 1, 1, 201553001, 'judul', '123', '75c949c78cebca7656a8d64a05ba4d6a.docx', '2022-02-22', 15, '8b4884b8eee07d80e0dcea66aa09d01f.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (2, 1, 1, 201553001, 'judul', '123', '1e3bdd66706bb53a6e3c69d44bae87ad.docx', '2022-02-22', 14, '42ffd7d800c4835d8ec1c3a44c9e10da.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (3, 1, 1, 201553001, 'proposal', '123', '555ed20f1863810461253f9ec8f9d8a8.docx', '2022-02-22', 15, 'd3b0d223c97db68f202294d0919ea2c0.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (4, 1, 1, 201553001, 'proposal', '123', '34015909626cbb698134fcaca246286c.docx', '2022-02-22', 14, '26b330f389a287f7eddb8ef70086d8f9.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (5, 1, 1, 201553001, '5', '123', '50cc7fb8c12a170648ec51867e1e0c22.docx', '2022-02-22', 15, 'add08a575a579d83e7733397f55354c1.docx', 'acc sidang', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (6, 1, 1, 201553001, '5', '123', '309c4627dfd676cd14abe987e0afe020.docx', '2022-02-22', 14, '6915ec2dc5811350ffb6ab02925f7b76.docx', 'siap sidang', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (7, 1, 2, 201553004, 'judul', '123', 'f33ef2f274089c7d4075ff3f9a667f23.docx', '2022-02-22', 8, '16d8197f677254e3c5b6cdfbabab369d.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (8, 1, 2, 201553004, 'judul', 'judul', '1dc55d9eb15e93ac53e309253e81f078.docx', '2022-02-22', 16, '6c1dad0798d676e592a452242889f351.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (9, 1, 2, 201553004, 'proposal', 'proposal\r\n', '2f2817b99dcea7437c04e467b4b00d47.docx', '2022-02-22', 8, 'd19c51212a4665acca86153014fefbec.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (10, 1, 2, 201553004, 'proposal', 'proposal', '54b566018acf8b25f9e0139145c20e73.docx', '2022-02-22', 16, '91a8538ac6be6f698ef575bee1d140c2.docx', 'proposal', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (11, 1, 2, 201553004, '5', 'BAB 1-5', '7a42cadad92f77276d2fe77e03f06a7f.docx', '2022-02-22', 8, '5815e0230defb431efa2ee4f46859126.docx', 'acc sidang', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (12, 1, 2, 201553004, '5', 'bab 1 -5', 'acc648e4fa4708bc5dbb09ef270294c6.docx', '2022-02-22', 16, 'dcf88ccc54ba27b1497fe9997b94086d.docx', 'acc ya ', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (13, 2, 4, 201653002, 'judul', 'bimbingan judul', 'b4ea6c60d3ecb4d1102bd746daa9daff.docx', '2022-02-22', 3, '15b0a6ad6402f2ca02390e27205851f0.docx', 'acc judul', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (14, 2, 4, 201653002, 'judul', 'judul', '62d92bda5cc0d4848c15434ccfa424fe.docx', '2022-02-22', 10, '32b8c6c3cf2732de059d8742882f9d61.docx', 'perkuat latar belakang', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (15, 2, 4, 201653002, 'proposal', 'acc proposal', '2862f03452e483331b13d222df9a6095.docx', '2022-02-22', 10, 'a16b56dd3b33c88bb5e016a1f40a33a5.docx', 'lanjutkan', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (16, 2, 4, 201653002, 'proposal', 'acc proposal', '56a172215a47fa71448acd7b54d38944.docx', '2022-02-22', 3, '6a4d2f5d96ff5e50e0e6e06aa5ec1040.docx', 'acc proposal\r\n', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (17, 2, 4, 201653002, '5', 'bab 1 -5', 'fc6c0f69cea0131c6394b14756e8cbe6.docx', '2022-02-22', 3, '9879f2e000a378c74953cb8446d7e793.docx', 'acc siap sidang', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (18, 2, 4, 201653002, '5', '1 - 5', 'cc091438705517b6ed9643f274b95a1d.docx', '2022-02-22', 10, '57ee2356b59fd35f485cdbadcc0fa0c1.docx', 'acc mas', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (19, 2, 5, 201653004, 'judul', 'judul', '6aeab7f4fc4fb97111cd0efa96cda015.docx', '2022-02-22', 2, 'cf9b7affef9e23aff964def61b6bd946.docx', 'acc mas', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (20, 2, 5, 201653004, 'judul', 'judul', 'c9fa17bb6d7d8a81a62107e2eae96498.docx', '2022-02-22', 12, '5e05b142e96e7dfff4762f032b0a6642.docx', 'acc ', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (21, 2, 5, 201653004, 'proposal', 'proposal', 'ae93833ba4a73c343067e3719b1f3432.docx', '2022-02-22', 2, '64c5d38a9831716257f4c9f0bff82854.docx', 'dirapikan', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (22, 2, 5, 201653004, 'proposal', 'proposal', 'ee96cf7eba5a3a77736144dec68f311b.docx', '2022-02-22', 12, '03694d14cf032099be9bbba80f29f931.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (23, 3, 8, 201753018, 'judul', 'judul', 'ffbf0367913a1cc96bc6ff4ffee9223f.docx', '2022-02-22', 4, '29fe9d5e2aab4ffb8d1d90973deb5206.docx', 'silahkan diperjelas latar belakangnya', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (24, 3, 8, 201753018, 'judul', 'bimbingan judul', 'a841cd768f123c9172bbcc3f995864a2.docx', '2022-02-22', 12, '587df5e92976adc51623264260b07f6d.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (25, 3, 8, 201753018, 'proposal', 'proposal', 'ada15d392788297c78eecba9f1b09d20.docx', '2022-02-22', 4, '0560c2cacd5c5269cd92912fdbea3910.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (26, 3, 8, 201753018, 'proposal', 'proposal', 'cea4291d8f03318f86df263faa9b8e6e.docx', '2022-02-22', 12, 'b9c2f6881e0683dc72bd197f6fd9a5b0.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (27, 3, 10, 201853009, 'judul', 'SI Penyewaan Apartemen Berbasis Android', '4a03ce3533de1c424a350fa55aaa3777.docx', '2022-02-22', 5, 'fcbcf4684a26b1a680ebbad95384a2e2.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (28, 3, 10, 201853009, 'judul', 'judul', '4c799d01058db5cc6b965f5e42c9d04d.docx', '2022-02-22', 9, 'ef4e33c12e7e749ac084e1a34cfed80e.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (29, 3, 10, 201853009, 'proposal', 'proposal', 'a552f6393a771971afb9659fe0bcdeb7.docx', '2022-02-22', 5, '35bc46a20ce93a8a1abe50f79fc53345.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (30, 3, 10, 201853009, 'proposal', 'proposal', '89aebac40f8aa7c067968b9e8e0a2e9d.docx', '2022-02-22', 9, 'e2e1f07822a4ee04f9543281e0cb3173.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (31, 3, 10, 201853009, '5', '1-5', 'f04d4323900e5368d215403d0e685b45.docx', '2022-02-22', 5, '253e7a1f2b0c0da56d1ff72a4952679b.docx', 'acc sidang', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (32, 3, 10, 201853009, '5', '1-5', '2cf4dddd2f2a055dc95bd030d34baacd.docx', '2022-02-22', 9, 'cc3b622199e74b4c9f97814930b56f8d.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (33, 3, 11, 201653019, 'judul', 'judul', '2cacc9771219faef698bcf2785859ec1.docx', '2022-02-22', 9, 'ade0383a399b4c7bdb9218838556ac92.docx', 'judul', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (34, 3, 11, 201653019, 'judul', '123', '0f5ccd0aa39845549286062352ed27aa.docx', '2022-02-22', 15, '1e5f9aca16cfe9473ff8523fe2696347.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (35, 3, 11, 201653019, 'proposal', 'proposal', 'ebb404b14322e6aae32d948bce0cd28f.docx', '2022-02-22', 15, '479542edc42e5b6959e55d2136e5aed1.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (36, 3, 11, 201653019, 'proposal', 'proposal', '8a0ea40eef42b4df83481764d5a446d5.docx', '2022-02-22', 9, '4ee737f6c6d08137e40832097baace8e.docx', '123', '2022-02-22', '2');
INSERT INTO `tbimbingans` VALUES (37, 3, 12, 202053027, 'judul', 'judul', '76fb34af8442ebe955a848a3f4b60cb8.docx', '2022-02-22', 6, '913836116feede6ee42ef339f2fb5a4e.docx', '123', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (38, 3, 12, 202053027, 'judul', '123', '291efffde257abfc2bd16ee1afe93b57.docx', '2022-02-22', 10, '67c3776aef8d1dba1fb09e0e3261ef16.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (39, 3, 12, 202053027, 'proposal', 'proposal', 'b2f3311fe1120a79c19235b94be8899e.docx', '2022-02-22', 6, '6fab117cc8c39b6b14a8cdeaeab94363.docx', 'acc proposal', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (40, 3, 12, 202053027, 'proposal', 'acc', '68dd7d71195862eb72e6a514016b8ac0.docx', '2022-02-22', 10, '9ba775a7ec43333614f694894b0a229a.docx', 'acc poposal\r\n', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (41, 3, 12, 202053027, '5', '123', '3a021692da07970acb7cedfe0d98e61f.docx', '2022-02-22', 6, 'c74f94f331226f774e2baf65801189d4.docx', 'acc sidang', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (42, 3, 12, 202053027, '5', '1-5', '8553931303a54e3594221f9a33b12f95.docx', '2022-02-22', 10, '9cf430d8a73a382cc3dc60abb42d1de8.docx', 'acc', '2022-02-22', '1');
INSERT INTO `tbimbingans` VALUES (43, 3, 13, 201953027, 'judul', 'mohon maaf pak wiwit saya ingin bimbingan judul skripsi', '1c53d4855548ec015fbe8adad88ecf49.docx', '2022-02-23', 15, 'b880d2286e1de3bee40ad4e175a12b19.docx', 'lanjut proposal', '2022-02-23', '1');
INSERT INTO `tbimbingans` VALUES (44, 3, 13, 201953027, 'proposal', 'bimbingan proposal', '6a4fe8cc1e2c8d90c64dd472bb8118f4.docx', '2022-02-23', 15, '62994f907a0aeae0617e7ff34c23f58b.docx', 'lanjut ', '2022-02-23', '1');
INSERT INTO `tbimbingans` VALUES (45, 3, 13, 201953027, 'judul', 'judul', 'cedcfbdf071b86d12f8684b789db8930.docx', '2022-02-23', 14, '89825b6ed29deedc81f8a58df235bbf8.docx', 'acc', '2022-02-23', '1');
INSERT INTO `tbimbingans` VALUES (46, 3, 13, 201953027, 'proposal', 'proposal', 'e391cb6864fa4752efc6a26552fe75c8.docx', '2022-02-23', 14, '4e799f2f8f48b0c206a6f830f422e5f6.docx', 'acc', '2022-02-23', '1');
INSERT INTO `tbimbingans` VALUES (47, 3, 13, 201953027, '1', 'bimbingan bab 1', '4b0185a848af1d514a23d520332cdfa5.docx', '2022-02-23', 15, '2c96505aa1c87f67bb5b7ed6e2dbb273.docx', 'revisi bab 1', '2022-02-23', '2');
INSERT INTO `tbimbingans` VALUES (48, 3, 13, 201953027, '1', 'bab 1', 'dc42a06ea67be2feb119b3314967ded6.docx', '2022-02-23', 15, '9a56e63529b0c0c7cd9f8d4bb456956d.docx', 'acc bab 1', '2022-02-23', '1');
INSERT INTO `tbimbingans` VALUES (49, 3, 13, 201953027, '5', '123', '0a2f2b2c3f41f55a879f42d4af8b4f91.docx', '2022-02-23', 15, 'c3a1cee906b79bc32d932c96caf3bf0f.docx', 'acc bab 5', '2022-02-23', '1');
INSERT INTO `tbimbingans` VALUES (50, 3, 13, 201953027, '5', 'acc', '4d64db00600b6302ff6d9d9f250a00a7.docx', '2022-02-23', 14, '1289c79a0113f4f38f15b4d4ce0ae99d.docx', 'acc bab 5', '2022-02-23', '1');
INSERT INTO `tbimbingans` VALUES (51, 3, 14, 123, 'judul', 'bab 1', 'cc9f5751a3f273dadbb2e507b13f9da5.docx', '2022-02-25', 16, 'b665ade0a15b32132a5e4f7f72e41b49.pdf', 'acc', '2022-02-25', '1');
INSERT INTO `tbimbingans` VALUES (52, 3, 14, 123, 'proposal', '123', '0253873adc3071e20f651c6f4ff21800.pdf', '2022-02-25', 16, '75eb9982910fecd0ef1e31711bb08080.pdf', '123', '2022-02-25', '1');
INSERT INTO `tbimbingans` VALUES (53, 3, 14, 123, 'judul', '123', 'bc84666fef835bb4ac8410adc3531421.pdf', '2022-02-25', 14, 'f5f37e9a9320a71a88fd996f480c7222.pdf', 'acc', '2022-02-25', '1');
INSERT INTO `tbimbingans` VALUES (54, 3, 14, 123, 'proposal', '123', 'b262f96f6b533ba21d8362331881af2b.pdf', '2022-02-25', 14, '9ebdbf23e92dd95d22233c70beeba6b8.pdf', 'accc', '2022-02-25', '1');
INSERT INTO `tbimbingans` VALUES (55, 3, 14, 123, '5', '123', '1e3784a38d0a890e9c54a0c564f75d76.pdf', '2022-02-25', 16, '0b0403273154f0bd67df1964cb0bab24.pdf', '123', '2022-02-25', '1');
INSERT INTO `tbimbingans` VALUES (56, 3, 14, 123, '5', '123', '802e693172cb5c30cb136473c08c67e6.pdf', '2022-02-25', 14, 'b08b8acd2f541545a9ddf01f66bd4f8b.pdf', 'acc', '2022-02-25', '1');
INSERT INTO `tbimbingans` VALUES (57, 3, 14, 123, 'revisi', 'bimbingan revisi', 'b4b4012762d8090b4d1b3c6853e3ded9.pdf', '2022-02-27', 8, 'ae75e1a5ad8fa586513d32425131ddd0.pdf', 'acc revisi', '2022-02-27', '1');
INSERT INTO `tbimbingans` VALUES (58, 3, 14, 123, 'revisi', 'revisi sidang', '', '2022-02-27', 15, '9a1151ce7454cd5f2b72353598daf004.pdf', 'acc', '2022-02-27', '1');
INSERT INTO `tbimbingans` VALUES (59, 3, 14, 123, 'revisi', 'revisi sidang', '51a7916c1f5b6f4a80abffbb3cc89c23.pdf', '2022-02-27', 16, 'd3af2bf506330b844123e024c9ca25a1.pdf', '123', '2022-02-27', '1');

-- ----------------------------
-- Table structure for tdaftars
-- ----------------------------
DROP TABLE IF EXISTS `tdaftars`;
CREATE TABLE `tdaftars`  (
  `DaftarsId` int(11) NOT NULL AUTO_INCREMENT,
  `DaftarsTgl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DaftarsNIM` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DaftarsFileKrs` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DaftarsFileTranskrip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DaftarsFileSlip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DaftarsStatus` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DaftarsKeterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `DaftarsPeriodesId` int(11) NULL DEFAULT NULL,
  `DaftarsPeriodesId2` int(11) NULL DEFAULT NULL,
  `DaftarsStatusAkhir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DaftarsTglSelesai` date NULL DEFAULT NULL,
  PRIMARY KEY (`DaftarsId`) USING BTREE,
  INDEX `daftar_periode_id`(`DaftarsPeriodesId`) USING BTREE,
  INDEX `DaftarsNIM`(`DaftarsNIM`) USING BTREE,
  CONSTRAINT `tdaftars_ibfk_1` FOREIGN KEY (`DaftarsNIM`) REFERENCES `tmhs` (`MhsNim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdaftars
-- ----------------------------
INSERT INTO `tdaftars` VALUES (1, '22-04-2016', '201553001', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '1', NULL, 1, NULL, '1', '2017-09-21');
INSERT INTO `tdaftars` VALUES (2, '22-04-2016', '201553004', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '1', NULL, 1, NULL, '1', '2017-09-28');
INSERT INTO `tdaftars` VALUES (3, '22-04-2016', '201553006', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '1', NULL, 1, 2, '2', '2018-04-22');
INSERT INTO `tdaftars` VALUES (4, '22-04-2018', '201653002', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '1', NULL, 2, NULL, '1', '2020-09-21');
INSERT INTO `tdaftars` VALUES (5, '22-04-2018', '201653004', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '1', NULL, 2, 3, '2', '0000-00-00');
INSERT INTO `tdaftars` VALUES (6, '22-02-2022', '201653014', '321c6c2854f62af6e0f40bf52db3b4d1.pdf', NULL, NULL, '1', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (7, '22-02-2022', '201653016', '097992411d2672db2bf007cdc3fbecab.pdf', NULL, NULL, '1', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (8, '22-02-2022', '201653018', 'c40bdfca09e909ddcff6134b5c58400c.pdf', NULL, NULL, '0', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (9, '22-02-2022', '201753018', '6701ef86bdc900ab127b4dd114a0a42d.pdf', NULL, NULL, '1', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (10, '22-02-2022', '201653030', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '0', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (11, '22-02-2022', '201653006', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '0', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (12, '22-02-2022', '201853002', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '1', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (13, '22-04-2018', '201653021', 'c1110690b569d221e1a24c48f0414535.pdf', 'b9f572f08492db97400540db104e723d.pdf', '4109b2cfd147e20585e4482c107e9146.pdf', '0', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (14, '22-04-2018', '201853009', '49f0073db6854fd6596f174d43a66c30.pdf', NULL, NULL, '1', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (15, '22-09-2018', '201653019', '91576e2a0ac6aa21d705087a2fa9c8a4.pdf', NULL, NULL, '1', NULL, 3, 4, '0', NULL);
INSERT INTO `tdaftars` VALUES (16, '22-04-2018', '202053027', 'a11fbd9fd177d73f6f24982b2c7dfdb0.pdf', NULL, NULL, '1', NULL, 3, NULL, '1', '2020-09-18');
INSERT INTO `tdaftars` VALUES (17, '23-02-2022', '201753027', '197ed9b670bdff4254bd8650da94bc79.pdf', 'f67e13463d199b9796d036147e4c5faa.pdf', '0193f7928dd97ff7e9ac6f149fb1dd2f.pdf', '1', NULL, 3, NULL, '1', '2022-02-23');
INSERT INTO `tdaftars` VALUES (18, '25-02-2022', '123', '32abb40b89c313046e84160a1e58920a.pdf', '1d88e0fdd2662db23bde9809383366c4.pdf', '30fa4c2602805f6c2871c9fca5dd2fd6.pdf', '1', 'kurang lengkap\r\n', 3, NULL, '0', NULL);

-- ----------------------------
-- Table structure for tdaftarsempro
-- ----------------------------
DROP TABLE IF EXISTS `tdaftarsempro`;
CREATE TABLE `tdaftarsempro`  (
  `DafsemId` int(11) NOT NULL AUTO_INCREMENT,
  `DafsemDaftarsId` int(11) NULL DEFAULT NULL,
  `DafsemPeriodeId` int(11) NULL DEFAULT NULL,
  `DafsemFileTranskrip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemFilePengesahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemFileBukubimbingan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemFileKWKomputer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemFileKWInggris` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemFileKWKewirausahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemFileSlip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemFilePlagiasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemTgl` date NULL DEFAULT NULL,
  `DafsemCekTgl` date NULL DEFAULT NULL,
  `DafsemKet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsemStatus` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DafsemId`) USING BTREE,
  INDEX `DafsemDaftarsId`(`DafsemDaftarsId`) USING BTREE,
  INDEX `DafsemPeriodeId`(`DafsemPeriodeId`) USING BTREE,
  CONSTRAINT `tdaftarsempro_ibfk_1` FOREIGN KEY (`DafsemDaftarsId`) REFERENCES `tdaftars` (`DaftarsId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tdaftarsempro_ibfk_2` FOREIGN KEY (`DafsemPeriodeId`) REFERENCES `tperiodes` (`PeriodesId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdaftarsempro
-- ----------------------------
INSERT INTO `tdaftarsempro` VALUES (1, 1, 1, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (2, 2, 1, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (3, 4, 2, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (4, 5, 2, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (5, 9, 3, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (6, 14, 3, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (7, 15, 3, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (8, 16, 3, '98732ff353df2cc2bbfabebc857d1b7c.pdf', '193e51aa689e46ebef258446ec90691b.pdf', 'ec6b02ea4cf43e79859f595d8a9ea86f.pdf', '4f06ed57c34510bf64d7fa3e5383c781.pdf', '010268dc8aed33880c21fc858af1b9d4.pdf', '5e8da11b0fc7438c08ff2e7fab0580ce.pdf', 'fc77f4293a713d0871152ee115946a91.pdf', 'ed4863d6c3e8a8604e463afdce19a9f1.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (9, 17, 3, 'c4232b6e1387d33ff4d498bb48df8d2e.pdf', '2a61346977a41c7b6bc186d407fbc125.pdf', '99b3b362b767aca658aafc340474843c.pdf', '0c4f7a964e6025b5f7e88c4056625199.pdf', '818ccc66cbb7744964557b47f9369f1d.pdf', '6def968870859faeeaab9eba7a336bc9.pdf', '30314cf53ed6d4254dc3f3460066b4f5.pdf', '60c007dfdc9c452b8da97c34c5c3b18e.pdf', '2023-02-22', '2023-02-22', NULL, '1');
INSERT INTO `tdaftarsempro` VALUES (10, 18, 3, '0ca172781206c47789c4d612c9f0406a.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-22', '2025-02-22', NULL, '1');

-- ----------------------------
-- Table structure for tdaftarsidang
-- ----------------------------
DROP TABLE IF EXISTS `tdaftarsidang`;
CREATE TABLE `tdaftarsidang`  (
  `DafsidId` int(11) NOT NULL AUTO_INCREMENT,
  `DafsidDaftarsId` int(11) NULL DEFAULT NULL,
  `DafsidPeriodeId` int(11) NULL DEFAULT NULL,
  `DafsidFileProposal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileBukubimbingan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileSuratBalasan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileKWKomputer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileKWInggris` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileKWKewirausahaan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileSlip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileBeritaAcara` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileTranskrip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFilePlagiasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidFileEsq` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidTgl` date NULL DEFAULT NULL,
  `DafsidCekTgl` date NULL DEFAULT NULL,
  `DafsidKet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DafsidStatus` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DafsidId`) USING BTREE,
  INDEX `DafsidDaftarsId`(`DafsidDaftarsId`) USING BTREE,
  INDEX `DafsidPeriodeId`(`DafsidPeriodeId`) USING BTREE,
  CONSTRAINT `tdaftarsidang_ibfk_1` FOREIGN KEY (`DafsidDaftarsId`) REFERENCES `tdaftars` (`DaftarsId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tdaftarsidang_ibfk_2` FOREIGN KEY (`DafsidPeriodeId`) REFERENCES `tperiodes` (`PeriodesId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdaftarsidang
-- ----------------------------
INSERT INTO `tdaftarsidang` VALUES (1, 1, 1, '6edfa14db19ec28bb0e90a5125520b8c.pdf', '9bc74f279c9e53213a04a3c96421be45.pdf', '4d1ee5e29bb426c86f0c459a93544de4.pdf', '51c62440cdc9918f05d9544c81688e6f.pdf', 'd394906b3619789d0a0e92125dca5eb6.pdf', '34f99e2e323c013b727e9a3c8fcef7cc.pdf', '271f7aaa0ee1e19dc52d3a89d6e891ad.pdf', '457cad2def53112858a3cecf4cfed03c.pdf', '106f2ec6bdab89a1998e472b07921237.pdf', 'ac932a92fc3806a7d9c74aaf707ba746.pdf', '9a6111db81f7a5295be269f20b1ecbb8.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsidang` VALUES (2, 2, 1, '6edfa14db19ec28bb0e90a5125520b8c.pdf', '9bc74f279c9e53213a04a3c96421be45.pdf', '4d1ee5e29bb426c86f0c459a93544de4.pdf', '51c62440cdc9918f05d9544c81688e6f.pdf', 'd394906b3619789d0a0e92125dca5eb6.pdf', '34f99e2e323c013b727e9a3c8fcef7cc.pdf', '271f7aaa0ee1e19dc52d3a89d6e891ad.pdf', '457cad2def53112858a3cecf4cfed03c.pdf', '106f2ec6bdab89a1998e472b07921237.pdf', 'ac932a92fc3806a7d9c74aaf707ba746.pdf', '9a6111db81f7a5295be269f20b1ecbb8.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsidang` VALUES (3, 4, 2, '6edfa14db19ec28bb0e90a5125520b8c.pdf', '9bc74f279c9e53213a04a3c96421be45.pdf', '4d1ee5e29bb426c86f0c459a93544de4.pdf', '51c62440cdc9918f05d9544c81688e6f.pdf', 'd394906b3619789d0a0e92125dca5eb6.pdf', '34f99e2e323c013b727e9a3c8fcef7cc.pdf', '271f7aaa0ee1e19dc52d3a89d6e891ad.pdf', '457cad2def53112858a3cecf4cfed03c.pdf', '106f2ec6bdab89a1998e472b07921237.pdf', 'ac932a92fc3806a7d9c74aaf707ba746.pdf', '9a6111db81f7a5295be269f20b1ecbb8.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsidang` VALUES (4, 14, 3, '6edfa14db19ec28bb0e90a5125520b8c.pdf', '9bc74f279c9e53213a04a3c96421be45.pdf', '4d1ee5e29bb426c86f0c459a93544de4.pdf', '51c62440cdc9918f05d9544c81688e6f.pdf', 'd394906b3619789d0a0e92125dca5eb6.pdf', '34f99e2e323c013b727e9a3c8fcef7cc.pdf', '271f7aaa0ee1e19dc52d3a89d6e891ad.pdf', '457cad2def53112858a3cecf4cfed03c.pdf', '106f2ec6bdab89a1998e472b07921237.pdf', 'ac932a92fc3806a7d9c74aaf707ba746.pdf', '9a6111db81f7a5295be269f20b1ecbb8.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsidang` VALUES (5, 16, 3, '6edfa14db19ec28bb0e90a5125520b8c.pdf', '9bc74f279c9e53213a04a3c96421be45.pdf', '4d1ee5e29bb426c86f0c459a93544de4.pdf', '51c62440cdc9918f05d9544c81688e6f.pdf', 'd394906b3619789d0a0e92125dca5eb6.pdf', '34f99e2e323c013b727e9a3c8fcef7cc.pdf', '271f7aaa0ee1e19dc52d3a89d6e891ad.pdf', '457cad2def53112858a3cecf4cfed03c.pdf', '106f2ec6bdab89a1998e472b07921237.pdf', 'ac932a92fc3806a7d9c74aaf707ba746.pdf', '9a6111db81f7a5295be269f20b1ecbb8.pdf', '2022-02-22', '2022-02-22', NULL, '1');
INSERT INTO `tdaftarsidang` VALUES (6, 17, 3, 'b51e079672f4727db5a28052dbcaadd7.pdf', '8e0e360e4f0db53baffaec3e534a9ff8.pdf', 'dada8fa67bfc262c3ea443454b378bad.pdf', 'c9c665467b1495bb4ca68aab4713eabf.pdf', 'c8c4b5e04936dae6d48460b1fcf1ed0a.pdf', 'a626642bbf2f75790afbe704f623edf9.pdf', '3e39b848eaab8d96b528af26229ba215.pdf', '549daf4b6c951e361442008f57b395aa.pdf', 'ea4e26fa85939242b8cc92c6d247c0dc.pdf', '34c5610e5d044fc64314bee36dc2e6a5.pdf', '3d1bde635a3075d027939a3b7ff3caf9.pdf', '2023-02-22', '2023-02-22', NULL, '1');
INSERT INTO `tdaftarsidang` VALUES (7, 18, 3, '1a5d3c80160f8798f03af6c71daff93e.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-22', '2025-02-22', NULL, '1');

-- ----------------------------
-- Table structure for tdetailsempro
-- ----------------------------
DROP TABLE IF EXISTS `tdetailsempro`;
CREATE TABLE `tdetailsempro`  (
  `DetsemId` int(11) NOT NULL AUTO_INCREMENT,
  `DetsemDafsemId` int(11) NULL DEFAULT NULL,
  `DetsemSemproId` int(11) NULL DEFAULT NULL,
  `DetsemDosenId` int(11) NULL DEFAULT NULL,
  `DetsemLevelDosen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DetsemKetRevisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DetsemTgl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DetsemId`) USING BTREE,
  INDEX `cat_sempro_id`(`DetsemSemproId`) USING BTREE,
  CONSTRAINT `tdetailsempro_ibfk_1` FOREIGN KEY (`DetsemSemproId`) REFERENCES `tsempro` (`SemproId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdetailsempro
-- ----------------------------
INSERT INTO `tdetailsempro` VALUES (1, 1, 1, 8, '1', 'penulisan', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (2, 1, 1, 14, '3', 'program', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (3, 1, 1, 15, '2', 'revisi program\r\n', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (4, 2, 2, 5, '1', 'Program', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (5, 2, 2, 8, '2', 'Latar belakang di perjelas', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (6, 2, 2, 16, '3', 'perjelas latarbelakang', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (7, 3, 3, 9, '1', 'latar belakang', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (8, 3, 3, 3, '2', 'latar belankang', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (9, 3, 3, 10, '3', 'beri notifikasi', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (10, 5, 5, 7, '1', 'Latar belakang', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (11, 5, 5, 4, '2', 'latar belakang juga', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (12, 6, 6, 2, '1', 'penulisan', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (13, 6, 6, 5, '2', 'latar belakamg', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (14, 6, 6, 9, '3', 'tinjauan', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (15, 8, 8, 13, '1', 'latarbelakang', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (16, 8, 8, 6, '2', 'proposal', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (17, 8, 8, 10, '3', 'proposal', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (18, 4, 4, 10, '1', 'beri notifikasi', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (19, 4, 4, 2, '2', 'tambah notifikasi', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (20, 4, 4, 12, '3', 'latar belakang', '22-02-22');
INSERT INTO `tdetailsempro` VALUES (21, 9, 9, 8, '1', 'latar belakang', '23-02-22');
INSERT INTO `tdetailsempro` VALUES (22, 9, 9, 15, '2', 'tinjauan pustaka', '23-02-22');
INSERT INTO `tdetailsempro` VALUES (23, 9, 9, 14, '3', 'latar belakang dan notifikasi', '23-02-22');
INSERT INTO `tdetailsempro` VALUES (24, 10, 10, 8, '1', 'aaa', '25-02-22');
INSERT INTO `tdetailsempro` VALUES (25, 10, 10, 14, '3', 'bbb', '25-02-22');

-- ----------------------------
-- Table structure for tdetailsidang
-- ----------------------------
DROP TABLE IF EXISTS `tdetailsidang`;
CREATE TABLE `tdetailsidang`  (
  `DetsidId` int(11) NOT NULL AUTO_INCREMENT,
  `DetsidDafsidId` int(11) NULL DEFAULT NULL,
  `DetsidSidangId` int(11) NULL DEFAULT NULL,
  `DetsidDosenId` int(11) NULL DEFAULT NULL,
  `DetsidLevelDosen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DetsidKetRevisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DetsidTgl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DetsidId`) USING BTREE,
  INDEX `cat_sempro_id`(`DetsidSidangId`) USING BTREE,
  CONSTRAINT `tdetailsidang_ibfk_1` FOREIGN KEY (`DetsidSidangId`) REFERENCES `tsidang` (`SidangId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdetailsidang
-- ----------------------------
INSERT INTO `tdetailsidang` VALUES (1, 1, 1, 8, '1', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (2, 1, 1, 16, '3', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (3, 1, 1, 15, '2', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (4, 2, 2, 5, '1', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (5, 2, 2, 8, '2', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (6, 2, 2, 14, '3', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (7, 3, 3, 9, '1', 'program di benahi', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (8, 3, 3, 3, '2', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (9, 3, 3, 11, '3', 'perancangan di perbaiki', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (10, 4, 4, 2, '1', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (11, 4, 4, 5, '2', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (12, 4, 4, 13, '3', 'program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (13, 5, 5, 13, '1', 'bagus mas', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (14, 5, 5, 6, '2', 'program dibenahi lagi', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (15, 5, 5, 14, '3', 'revisi program', '22-02-22');
INSERT INTO `tdetailsidang` VALUES (16, 6, 6, 8, '1', 'acc', '23-02-22');
INSERT INTO `tdetailsidang` VALUES (17, 6, 6, 15, '2', 'acc ', '23-02-22');
INSERT INTO `tdetailsidang` VALUES (18, 6, 6, 16, '3', '123', '23-02-22');
INSERT INTO `tdetailsidang` VALUES (27, 7, 7, 8, '1', 'aaa', '27-02-22');
INSERT INTO `tdetailsidang` VALUES (30, 7, 7, 16, '2', 'bbb', '27-02-22');
INSERT INTO `tdetailsidang` VALUES (31, 7, 7, 15, '3', 'ccc', '27-02-22');

-- ----------------------------
-- Table structure for tdosbings
-- ----------------------------
DROP TABLE IF EXISTS `tdosbings`;
CREATE TABLE `tdosbings`  (
  `DosbingsId` int(11) NOT NULL AUTO_INCREMENT,
  `DosbingsPeriodeId` int(11) NULL DEFAULT NULL,
  `DosbingsDaftarsId` int(11) NULL DEFAULT NULL,
  `DosbingsDosenId1` int(11) NULL DEFAULT NULL,
  `DosbingsDosenId2` int(11) NULL DEFAULT NULL,
  `DosbingsKetua` int(11) NULL DEFAULT NULL,
  `DosbingsTamu` int(11) NULL DEFAULT NULL,
  `DosbingsTgl` date NULL DEFAULT NULL,
  PRIMARY KEY (`DosbingsId`) USING BTREE,
  INDEX `dosbingdaftarid`(`DosbingsDaftarsId`) USING BTREE,
  INDEX `dosbingdosenid`(`DosbingsDosenId1`) USING BTREE,
  INDEX `DosbingsPeriodeId`(`DosbingsPeriodeId`) USING BTREE,
  CONSTRAINT `tdosbings_ibfk_1` FOREIGN KEY (`DosbingsDaftarsId`) REFERENCES `tdaftars` (`DaftarsId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tdosbings_ibfk_2` FOREIGN KEY (`DosbingsPeriodeId`) REFERENCES `tperiodes` (`PeriodesId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdosbings
-- ----------------------------
INSERT INTO `tdosbings` VALUES (1, 1, 1, 15, 14, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (2, 1, 2, 8, 16, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (3, 1, 3, 6, 11, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (4, 2, 4, 3, 10, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (5, 2, 5, 2, 12, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (6, 3, 6, 8, 14, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (7, 3, 7, 7, 13, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (8, 3, 9, 4, 12, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (10, 3, 14, 5, 9, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (11, 3, 15, 9, 15, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (12, 3, 16, 6, 10, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (13, 3, 17, 15, 14, NULL, NULL, '0000-00-00');
INSERT INTO `tdosbings` VALUES (14, 3, 18, 16, 14, 8, 15, '2025-02-22');

-- ----------------------------
-- Table structure for tdosen
-- ----------------------------
DROP TABLE IF EXISTS `tdosen`;
CREATE TABLE `tdosen`  (
  `DosenId` int(11) NOT NULL AUTO_INCREMENT,
  `DosenNidn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DosenNama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DosenAlamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DosenNohp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DosenFoto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DosenEmail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DosenId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tdosen
-- ----------------------------
INSERT INTO `tdosen` VALUES (1, '0618058301', 'Andy Prasetyo Utomo, S.Kom, M.T', 'Desa Ploso RT. 5 RW. 5 No. 5, Kec.Jati, Kudus', '6289539726844', NULL, 'andy.prasetyo@umk.ac.id');
INSERT INTO `tdosen` VALUES (2, '0628017501', 'Anteng Widodo, ST., M.Kom', 'Kudus', '62895397268443', NULL, 'anteng.widodo@umk.ac.id');
INSERT INTO `tdosen` VALUES (3, '0623018201', 'Arif Setiawan, S.Kom, M.Cs', 'Perum Grand Purwosari Regency B3 Ganesha Kudus', '62895397268443', NULL, 'arif.setiawan@umk.ac.id');
INSERT INTO `tdosen` VALUES (4, '0627018502', 'Diana Laily Fithri, S.Kom, M.Kom', 'Kandang Mas RT.03 RW 1, Dawe, Kudus', '62895397268443', NULL, 'diana.laily@umk.ac.id');
INSERT INTO `tdosen` VALUES (5, '0608047901', 'Dr. Eko Darmanto, S.Kom, M.Cs', 'Tanjungkarang RT. 04 RW. 01. Jati, Kudus', '62895397268443', NULL, 'eko.darmanto@umk.ac.id');
INSERT INTO `tdosen` VALUES (6, '0606058201', 'Fajar Nugraha, S.Kom, M.Kom', 'Jl. Muria Raya II/47 RT.13 RW. 07, Gondang Manis, Bae, Kudus', '62895397268443', NULL, 'fajar.nugraha@umk.ac.id');
INSERT INTO `tdosen` VALUES (7, '0621048301', 'Muhammad Arifin, S.Kom, M.Kom', 'Gondangmanis RT. 07 RW. 11, Bae, Kudus', '62895397268443', NULL, 'arifin.m@umk.ac.id');
INSERT INTO `tdosen` VALUES (8, '0608088201', 'Nanik Susanti, S.Kom, M.Kom', 'Desa Gulang RT.01 Rw. 03, Mejobo, Kudus', '62895397268443', NULL, 'nanik.susanti@umk.ac.id');
INSERT INTO `tdosen` VALUES (9, '0618098701', 'Noor Latifah, S.Kom, M.Kom', 'Janggalan No. 140 RT. 3 RW. 2, Kudus 59316', '62895397268443', NULL, 'noor.latifah@umk.ac.id');
INSERT INTO `tdosen` VALUES (10, '0619067802', 'Pratomo Setiaji, S.Kom, M.Kom', 'Jl.Muria Raya II/34, RT.13 RW.07 Gondangmanis, Bae, Kudus', '62895397268443', NULL, 'pratomo.setiaji@umk.ac.id');
INSERT INTO `tdosen` VALUES (11, '0610128601', 'Putri Kurnia Handayani, S.Kom, M.Kom', 'Kramat Rejo No. 391 Barongan, Kudus', '62895397268443', NULL, 'putri.kurnia@umk.ac.id');
INSERT INTO `tdosen` VALUES (12, '0607067001', 'R. Rhoedy Setiawan, S.Kom, M.Kom', 'Jl. Getas Pejaten no. 94 RT. 06 RW. 01, Kec. Jati, Kudus', '62895397268443', NULL, 'rhoedy.setiawan@umk.ac.id');
INSERT INTO `tdosen` VALUES (13, '0602017901', 'Supriyono, S.Kom, M.Kom', 'Perumahan Megawon Indah Blok E 51-52, Kudus', '62895397268443', NULL, 'supriyono.si@umk.ac.id');
INSERT INTO `tdosen` VALUES (14, '0623068301', 'Syafiul Muzid, ST, M.Cs', 'Teluk Weten RT. 25 RW. 03, Welahan, Jepara', '62895397268443', NULL, 'syafiul.muzid@umk.ac.id');
INSERT INTO `tdosen` VALUES (15, '0631088901', 'Wiwit Agus Triyanto, S.Kom, M.Kom', 'Prambatan Kidul RT. 01 RW. 1, Klaiwungu, Kudus', '62895397268443', NULL, 'at.wiwit@umk.ac.id');
INSERT INTO `tdosen` VALUES (16, '0004047501', 'Yudie Irawan, S.Kom, M.Kom', 'Mlatinorowito Gg. III No. 93', '62895397268443', 'eadfd5c516ab59ad7db5346d283c6a63.jpg', 'yudie.irawan@umk.ac.id');
INSERT INTO `tdosen` VALUES (17, '201753001', 'Safira', 'Kudus', '62895397268443', NULL, 'safira@gmail.com');

-- ----------------------------
-- Table structure for tjadwalbimbingan
-- ----------------------------
DROP TABLE IF EXISTS `tjadwalbimbingan`;
CREATE TABLE `tjadwalbimbingan`  (
  `JadwalId` int(11) NOT NULL AUTO_INCREMENT,
  `JadwalDosenId` int(11) NULL DEFAULT NULL,
  `JadwalHari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `JadwalJamMulai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `JadwalJamSelesai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `JadwalRuangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`JadwalId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tjadwalbimbingan
-- ----------------------------

-- ----------------------------
-- Table structure for tmhs
-- ----------------------------
DROP TABLE IF EXISTS `tmhs`;
CREATE TABLE `tmhs`  (
  `MhsId` int(11) NOT NULL AUTO_INCREMENT,
  `MhsNim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MhsNama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MhsPassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MhsNohp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MhsAlamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `MhsEmail` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MhsFoto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MhsStatus` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`MhsId`) USING BTREE,
  INDEX `MhsNim`(`MhsNim`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tmhs
-- ----------------------------
INSERT INTO `tmhs` VALUES (1, '201553001', 'Farih Daroini', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567890', 'Kudus', '201553001@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (2, '201553002', 'Rusyana Sari', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567891', 'Jepara', '201553002@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (3, '201553003', 'Mohammad Kamal Al Fitra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567892', 'Demak', '201553003@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (4, '201553004', 'Bela Herwati Ningsih', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567893', 'Pati', '201553004@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (5, '201553006', 'Erlina Nofianti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567894', 'Grobogan', '201553006@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (6, '201653001', 'Jihan Nisrina', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567895', 'Porwodadi', '201553007@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (7, '201653002', 'Yusiana Rahma', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567896', 'Semarang', '201553008@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (8, '201653003', 'Indi Kurnia Atmaja', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '62895397268443', 'Kudus', '201553009@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (9, '201653004', 'Abdul Rouf', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567898', 'Jepara', '201553010@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (10, '201653005', 'Arsya Yoga Pratama', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567899', 'Demak', '201553011@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (11, '201653006', 'Bayu Afrian', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567900', 'Pati', '201553012@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (12, '201653007', 'Iman Ardhi Prabowo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567901', 'Grobogan', '201553013@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (13, '201653008', 'Farid Yuliyanto', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567902', 'Porwodadi', '201553014@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (14, '201653009', 'Toni Alfiyan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567903', 'Semarang', '201553015@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (15, '201653010', 'Abi Andreanto', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567904', 'Kudus', '201553016@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (16, '201653011', 'Novita Dwi Andriyani', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567905', 'Jepara', '201553017@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (17, '201653012', 'Fiyyalailatun Nayyiroh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567906', 'Demak', '201553018@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (18, '201653013', 'Achmad Rizal Hafidzin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567907', 'Pati', '201553019@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (19, '201653014', 'Triya Adzani Maulidina', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567908', 'Grobogan', '201553020@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (20, '201653015', 'Agung Dwi Ariyanto', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567909', 'Porwodadi', '201553021@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (21, '201653016', 'Dessy Muharfianti Putri', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567910', 'Semarang', '201553022@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (22, '201653017', 'Fita Choiyanti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567911', 'Kudus', '201553023@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (23, '201653018', 'Fidiana Sekar Rizqi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567912', 'Jepara', '201553024@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (24, '201653019', 'Luqman Rosid', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567913', 'Demak', '201553025@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (25, '201653020', 'Rina Khoirunnisa\'', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567914', 'Pati', '201553026@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (26, '201653021', 'Muhammad Ilham', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567915', 'Grobogan', '201553027@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (27, '201653022', 'Anisa Ulya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567916', 'Porwodadi', '201553028@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (28, '201653023', 'Risa Erlinawati', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567917', 'Semarang', '201553030@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (29, '201653024', 'Nur Arief Yufrizal Prasetyo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567918', 'Kudus', '201553031@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (30, '201653025', 'Labib Ashrori', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567919', 'Jepara', '201553032@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (31, '201653026', 'Syaiful Bahri Bayuda Pradani', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567920', 'Demak', '201553033@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (33, '201653028', 'Muhammad Azka Darojat', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567922', 'Grobogan', '201553035@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (34, '201653029', 'Lina Noviana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567923', 'Porwodadi', '201553036@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (35, '201653030', 'Yuli Irmawati', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567924', 'Semarang', '201553037@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (36, '201753001', 'Bevi Maulida Khasanah', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567925', 'Kudus', '201553038@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (37, '201753002', 'Muhammad Afham Fikri', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567926', 'Jepara', '201553040@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (38, '201753003', 'Nurul Mashfufah', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567927', 'Demak', '201553041@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (39, '201753004', 'Faiz Faishol Majid', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567928', 'Pati', '201553042@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (40, '201753005', 'Muh Suhartomi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567929', 'Grobogan', '201553043@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (41, '201753006', 'Agus Dwi Ismawan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567930', 'Porwodadi', '201553044@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (42, '201753007', 'Fredo Maulana Putra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567931', 'Semarang', '201553045@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (43, '201753008', 'Anin Dita Widyastuti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567932', 'Kudus', '201553046@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (44, '201753009', 'Rofiyatun', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567933', 'Jepara', '201553047@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (45, '201753010', 'Adi Nugroho', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567934', 'Demak', '201553048@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (46, '201753011', 'Shinta Ulfiana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567935', 'Pati', '201553049@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (47, '201753012', 'Rita Suryana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567936', 'Grobogan', '201553050@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (48, '201753013', 'Fat\'hul Umam', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567937', 'Porwodadi', '201553051@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (49, '201753014', 'Ahmad Luthfi Hakim', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567938', 'Semarang', '201553052@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (50, '201753015', 'Galih Eka Nugraha', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567939', 'Kudus', '201553054@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (51, '201753016', 'Dhimas Aji Wicaksono', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567940', 'Jepara', '201553056@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (52, '201753017', 'Fahrul Anas Mandasari', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567941', 'Demak', '201553057@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (53, '201753018', 'Sovia', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567942', 'Pati', '201553060@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (54, '201753019', 'Subekti Nur Wahyudi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567943', 'Grobogan', '201553061@std.umk.ac.id', NULL, '0');
INSERT INTO `tmhs` VALUES (55, '201853001', 'Pristina Dwita Soraya', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567944', 'Porwodadi', '201553062@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (56, '201853002', 'Oktova Aulia Chasan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567945', 'Semarang', '201553063@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (57, '201853003', 'Ahmad Isnan Wahyudi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567946', 'Kudus', '201553064@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (58, '201853004', 'Nisrina Ainiyatul Munawaroh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567947', 'Jepara', '201553065@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (59, '201853005', 'Erna Zulianti', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567948', 'Demak', '201553066@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (60, '201853006', 'Umi Rahayu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567949', 'Pati', '201553067@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (61, '201853007', 'Yulimar Astutik Widyaningsih', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567950', 'Grobogan', '201553068@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (62, '201853008', 'Nauval Sa\'ieduddin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567951', 'Porwodadi', '201553069@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (63, '201853009', 'Muhammad Nafi\'uddin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567952', 'Semarang', '201553071@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (64, '2018530010', 'Milasita Mangesthiningtyas', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1234567953', 'Kudus', '201553072@std.umk.ac.id', NULL, '1');
INSERT INTO `tmhs` VALUES (72, '202053027', 'Fahmi Setiawan ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '098987625412', 'KUDUS', 'A@gmail.com', NULL, '1');
INSERT INTO `tmhs` VALUES (73, '123', 'Andrew Anto', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '6285641199790', 'jepara', 'andrew@g.com', '5adc5ced5812dbf643be0eeb33a7fe9e.jpg', '1');
INSERT INTO `tmhs` VALUES (74, '201753027', 'Andrew Anto', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '6285726170948', 'JPR', 'A@gmail', '1ba9ca54ca264f565692fee200487ff2.jpg', '1');

-- ----------------------------
-- Table structure for tnilaiakhir
-- ----------------------------
DROP TABLE IF EXISTS `tnilaiakhir`;
CREATE TABLE `tnilaiakhir`  (
  `NaId` int(11) NOT NULL AUTO_INCREMENT,
  `NaSidangId` int(11) NULL DEFAULT NULL,
  `NaPenguji1` int(11) NULL DEFAULT NULL,
  `NaPenguji2` int(11) NULL DEFAULT NULL,
  `NaPenguji3` int(11) NULL DEFAULT NULL,
  `NaAngka` float(11, 0) NULL DEFAULT NULL,
  `NaHuruf` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`NaId`) USING BTREE,
  INDEX `nilai_sidang_id`(`NaSidangId`) USING BTREE,
  CONSTRAINT `tnilaiakhir_ibfk_1` FOREIGN KEY (`NaSidangId`) REFERENCES `tsidang` (`SidangId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tnilaiakhir
-- ----------------------------
INSERT INTO `tnilaiakhir` VALUES (1, 1, 87, 77, 76, 90, 'A');
INSERT INTO `tnilaiakhir` VALUES (2, 2, 67, 64, 78, 69, 'B');
INSERT INTO `tnilaiakhir` VALUES (3, 3, 51, 83, 77, 68, 'B');
INSERT INTO `tnilaiakhir` VALUES (4, 4, 73, 82, 80, 78, 'AB-');
INSERT INTO `tnilaiakhir` VALUES (5, 5, 71, 81, 75, 75, 'AB-');
INSERT INTO `tnilaiakhir` VALUES (6, 6, 82, 88, 83, 84, 'A');

-- ----------------------------
-- Table structure for tnilaikonversi
-- ----------------------------
DROP TABLE IF EXISTS `tnilaikonversi`;
CREATE TABLE `tnilaikonversi`  (
  `NikonId` int(11) NOT NULL AUTO_INCREMENT,
  `NikonK1` float NULL DEFAULT NULL,
  `NikonK2` float NULL DEFAULT NULL,
  `NikonK3` float NULL DEFAULT NULL,
  `NikonK4` float NULL DEFAULT NULL,
  `NikonA` int(11) NULL DEFAULT NULL,
  `NikonAB` int(11) NULL DEFAULT NULL,
  `NikonB` int(11) NULL DEFAULT NULL,
  `NikonBC` int(11) NULL DEFAULT NULL,
  `NikonC` int(11) NULL DEFAULT NULL,
  `NikonNaPenguji1` float NULL DEFAULT NULL,
  `NikonNaPenguji2` float NULL DEFAULT NULL,
  `NikonNaPenguji3` float NULL DEFAULT NULL,
  PRIMARY KEY (`NikonId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnilaikonversi
-- ----------------------------
INSERT INTO `tnilaikonversi` VALUES (1, 0.3, 0.2, 0.2, 0.3, 80, 72, 64, 56, 48, 0.4, 0.3, 0.3);

-- ----------------------------
-- Table structure for tnilaikriteria
-- ----------------------------
DROP TABLE IF EXISTS `tnilaikriteria`;
CREATE TABLE `tnilaikriteria`  (
  `NiketId` int(11) NOT NULL AUTO_INCREMENT,
  `NiketSidangId` int(11) NULL DEFAULT NULL,
  `NiketDosenId` int(11) NULL DEFAULT NULL,
  `NiketDosenLevel` int(11) NULL DEFAULT NULL,
  `NiketK1` int(11) NULL DEFAULT NULL,
  `NiketK2` int(11) NULL DEFAULT NULL,
  `NiketK3` int(11) NULL DEFAULT NULL,
  `NiketK4` int(11) NULL DEFAULT NULL,
  `NiketTotal` float NULL DEFAULT NULL,
  PRIMARY KEY (`NiketId`) USING BTREE,
  INDEX `tnilaikriteria_ibfk_1`(`NiketSidangId`) USING BTREE,
  CONSTRAINT `tnilaikriteria_ibfk_1` FOREIGN KEY (`NiketSidangId`) REFERENCES `tsidang` (`SidangId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tnilaikriteria
-- ----------------------------
INSERT INTO `tnilaikriteria` VALUES (1, 1, 8, 1, 87, 87, 87, 87, 87);
INSERT INTO `tnilaikriteria` VALUES (2, 1, 16, 3, 76, 76, 76, 76, 76);
INSERT INTO `tnilaikriteria` VALUES (3, 1, 15, 2, 80, 90, 77, 66, 77.2);
INSERT INTO `tnilaikriteria` VALUES (4, 2, 5, 1, 88, 55, 66, 55, 67.1);
INSERT INTO `tnilaikriteria` VALUES (5, 2, 8, 2, 66, 66, 55, 66, 63.8);
INSERT INTO `tnilaikriteria` VALUES (6, 2, 14, 3, 77, 77, 66, 88, 78.1);
INSERT INTO `tnilaikriteria` VALUES (7, 3, 9, 1, 45, 56, 66, 44, 51.1);
INSERT INTO `tnilaikriteria` VALUES (8, 3, 3, 2, 78, 88, 76, 88, 82.6);
INSERT INTO `tnilaikriteria` VALUES (9, 3, 11, 3, 67, 77, 77, 88, 77.3);
INSERT INTO `tnilaikriteria` VALUES (10, 4, 2, 1, 78, 67, 66, 78, 73.4);
INSERT INTO `tnilaikriteria` VALUES (11, 4, 5, 2, 67, 88, 88, 88, 81.7);
INSERT INTO `tnilaikriteria` VALUES (12, 4, 13, 3, 88, 77, 77, 77, 80.3);
INSERT INTO `tnilaikriteria` VALUES (13, 5, 13, 1, 78, 88, 66, 55, 70.7);
INSERT INTO `tnilaikriteria` VALUES (14, 5, 6, 2, 77, 87, 88, 77, 81.2);
INSERT INTO `tnilaikriteria` VALUES (15, 5, 14, 3, 77, 80, 81, 66, 75.1);
INSERT INTO `tnilaikriteria` VALUES (16, 6, 8, 1, 80, 86, 86, 78, 81.8);
INSERT INTO `tnilaikriteria` VALUES (17, 6, 15, 2, 89, 88, 87, 88, 88.1);
INSERT INTO `tnilaikriteria` VALUES (18, 6, 16, 3, 78, 80, 88, 88, 83.4);

-- ----------------------------
-- Table structure for tperiodes
-- ----------------------------
DROP TABLE IF EXISTS `tperiodes`;
CREATE TABLE `tperiodes`  (
  `PeriodesId` int(11) NOT NULL AUTO_INCREMENT,
  `PeriodesSemester` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PeriodesTahunakademik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PeriodesSelesai` date NULL DEFAULT NULL,
  `PeriodesKaprodi` int(11) NULL DEFAULT NULL,
  `PeriodesKoordinator` int(11) NULL DEFAULT NULL,
  `PeriodesStatusAktif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PeriodesId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tperiodes
-- ----------------------------
INSERT INTO `tperiodes` VALUES (1, 'ganjil', '2017/2018', '2017-10-19', 5, 15, '0');
INSERT INTO `tperiodes` VALUES (2, 'genap', '2018/2019', '2018-04-22', 5, 15, '0');
INSERT INTO `tperiodes` VALUES (3, 'ganjil', '2021/2022', '2022-06-30', 5, 15, '1');
INSERT INTO `tperiodes` VALUES (4, 'genap', '2020/2021', '2022-09-23', 5, 16, '0');

-- ----------------------------
-- Table structure for truang
-- ----------------------------
DROP TABLE IF EXISTS `truang`;
CREATE TABLE `truang`  (
  `RuangId` int(11) NOT NULL AUTO_INCREMENT,
  `RuangNama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`RuangId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of truang
-- ----------------------------
INSERT INTO `truang` VALUES (1, 'LAB MULTIMEDIA');
INSERT INTO `truang` VALUES (2, 'LAB RPL');
INSERT INTO `truang` VALUES (3, 'LAB PEMROGRAMAN');
INSERT INTO `truang` VALUES (4, 'LAB HARDWARE');

-- ----------------------------
-- Table structure for tsempro
-- ----------------------------
DROP TABLE IF EXISTS `tsempro`;
CREATE TABLE `tsempro`  (
  `SemproId` int(11) NOT NULL AUTO_INCREMENT,
  `SemproDafsemId` int(11) NULL DEFAULT NULL,
  `SemproRuangId` int(11) NULL DEFAULT NULL,
  `SemproJam` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SemproTgl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SemproPenguji1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SemproPenguji2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SemproPenguji3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SemproHasil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SemproStatusRevisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`SemproId`) USING BTREE,
  INDEX `sempro_ruang_id`(`SemproRuangId`) USING BTREE,
  INDEX `daftar_sempro_id`(`SemproDafsemId`) USING BTREE,
  CONSTRAINT `tsempro_ibfk_1` FOREIGN KEY (`SemproDafsemId`) REFERENCES `tdaftarsempro` (`DafsemId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tsempro
-- ----------------------------
INSERT INTO `tsempro` VALUES (1, 1, 1, '9:00 PM', '2016-06-22', '8', '15', '14', '1', '1');
INSERT INTO `tsempro` VALUES (2, 2, 1, '9:15 PM', '2016-06-23', '5', '8', '16', '1', '1');
INSERT INTO `tsempro` VALUES (3, 3, 3, '9:30 PM', '2016-06-24', '9', '3', '10', '1', '2');
INSERT INTO `tsempro` VALUES (4, 4, 2, '10:00 PM', '2022-02-22', '10', '2', '12', '1', '1');
INSERT INTO `tsempro` VALUES (5, 5, 1, '10:30 PM', '2022-02-22', '7', '4', '12', '1', '1');
INSERT INTO `tsempro` VALUES (6, 6, 1, '10:45 PM', '2022-02-22', '2', '5', '9', '1', '1');
INSERT INTO `tsempro` VALUES (7, 7, 2, '11:30 PM', '2022-02-22', '13', '9', '15', '0', NULL);
INSERT INTO `tsempro` VALUES (8, 8, 3, '11:30 PM', '2018-06-24', '13', '6', '10', '1', '2');
INSERT INTO `tsempro` VALUES (9, 9, 1, '9:00 AM', '2022-02-23', '8', '15', '14', '1', '1');
INSERT INTO `tsempro` VALUES (10, 10, 3, '10:45 PM', '2022-02-25', '8', '16', '14', '1', '1');

-- ----------------------------
-- Table structure for tsidang
-- ----------------------------
DROP TABLE IF EXISTS `tsidang`;
CREATE TABLE `tsidang`  (
  `SidangId` int(11) NOT NULL AUTO_INCREMENT,
  `SidangDafsidId` int(11) NULL DEFAULT NULL,
  `SidangRuangId` int(11) NULL DEFAULT NULL,
  `SidangJam` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SidangTgl` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SidangPenguji1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SidangPenguji2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SidangPenguji3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SidangHasil` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`SidangId`) USING BTREE,
  INDEX `sidang_ruang_id`(`SidangRuangId`) USING BTREE,
  INDEX `daftar_sidang_id`(`SidangDafsidId`) USING BTREE,
  CONSTRAINT `tsidang_ibfk_1` FOREIGN KEY (`SidangDafsidId`) REFERENCES `tdaftarsidang` (`DafsidId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tsidang
-- ----------------------------
INSERT INTO `tsidang` VALUES (1, 1, 4, '9:00 PM', '2016-10-21', '8', '15', '16', '1');
INSERT INTO `tsidang` VALUES (2, 2, 3, '9:15 PM', '2016-10-22', '5', '8', '14', '1');
INSERT INTO `tsidang` VALUES (3, 3, 3, '9:45 PM', '2016-10-23', '9', '3', '11', '1');
INSERT INTO `tsidang` VALUES (4, 4, 1, '10:45 PM', '2020-08-21', '2', '5', '13', '1');
INSERT INTO `tsidang` VALUES (5, 5, 3, '11:45 PM', '2020-08-22', '13', '6', '14', '1');
INSERT INTO `tsidang` VALUES (6, 6, 1, '9:30 AM', '2022-02-23', '8', '15', '16', '1');
INSERT INTO `tsidang` VALUES (7, 7, 1, '11:00 PM', '2022-02-25', '8', '16', '15', '1');

-- ----------------------------
-- Table structure for tskripsi
-- ----------------------------
DROP TABLE IF EXISTS `tskripsi`;
CREATE TABLE `tskripsi`  (
  `SkripsiId` int(11) NOT NULL AUTO_INCREMENT,
  `SkripsiMhsNim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SkripsiPeriodeId` int(11) NULL DEFAULT NULL,
  `SkripsiDaftarsId` int(11) NULL DEFAULT NULL,
  `SkripsiJudul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SkripsiBebasProdi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SkripsiKeterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SkripsiStatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`SkripsiId`) USING BTREE,
  INDEX `SkripsiPeriodeId`(`SkripsiPeriodeId`) USING BTREE,
  CONSTRAINT `tskripsi_ibfk_1` FOREIGN KEY (`SkripsiPeriodeId`) REFERENCES `tperiodes` (`PeriodesId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tskripsi
-- ----------------------------
INSERT INTO `tskripsi` VALUES (1, '201553001', 1, 1, 'Sipenjualan tas', '32a8b57481721b1c97ea4d4f7601769a.rar', NULL, '1');
INSERT INTO `tskripsi` VALUES (2, '201553004', 1, 2, 'Si penjualan alat Kebun', '3dcd2751af74b273937ead786cf14077.rar', NULL, '1');
INSERT INTO `tskripsi` VALUES (3, '201653002', 2, 4, 'SI pelayanan terpadu', '1490cf6cabd9e5430be4c032b7f4d719.rar', NULL, '1');
INSERT INTO `tskripsi` VALUES (4, '201653004', NULL, 5, 'SI managemen pengelolaan limbah pabrik', NULL, NULL, NULL);
INSERT INTO `tskripsi` VALUES (5, '201753018', NULL, 9, 'SI Penyewan bus berbasis android', NULL, NULL, NULL);
INSERT INTO `tskripsi` VALUES (6, '201853009', NULL, 14, 'SI Penyewaan Apartemen Berbasis Android', NULL, NULL, NULL);
INSERT INTO `tskripsi` VALUES (7, '201653019', NULL, 15, 'SI Peminjaman online berbasis web responsif', NULL, NULL, NULL);
INSERT INTO `tskripsi` VALUES (8, '202053027', 3, 16, 'SI penjualan laptop gaming berbasis android', '9903927e57baf785556ae73d7f324db0.rar', NULL, '1');
INSERT INTO `tskripsi` VALUES (9, '201953027', 3, 17, 'DIGITALISASI PROSES BISNIS PENGELOLAAN SKRIPSI MENGGUNAKAN NOTIFIKASI WHATSAPP PADA PROGRAM STUDI SISTEM INFORMASI', '9374d9e1310065d14960e02d7bdc9c71.rar', NULL, '1');
INSERT INTO `tskripsi` VALUES (10, '123', NULL, 18, 'DIGITALISASI PROSES BISNIS PENGELOLAAN SKRIPSI MENGGUNAKAN NOTIFIKASI WHATSAPP PADA PROGRAM STUDI SISTEM INFORMASI', NULL, NULL, NULL);
INSERT INTO `tskripsi` VALUES (11, '201853002', NULL, 12, 'ini judul', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tuser
-- ----------------------------
DROP TABLE IF EXISTS `tuser`;
CREATE TABLE `tuser`  (
  `UserId` int(11) NOT NULL,
  `UserUsername` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `UserPassword` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `UserLevelAktif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `UserStatus` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`UserId`) USING BTREE,
  INDEX `dosenid`(`UserUsername`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tuser
-- ----------------------------
INSERT INTO `tuser` VALUES (1, 'andy', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (2, 'anteng', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (3, 'arif', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (4, 'diana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (5, 'eko', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kaprodi', '1');
INSERT INTO `tuser` VALUES (6, 'fajar', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (7, 'arifin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (8, 'nanik', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (9, 'latifah', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (10, 'aji', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (11, 'putri', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (12, 'rudi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (13, 'supri', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (14, 'muzid', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (15, 'wiwit', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dosen', '1');
INSERT INTO `tuser` VALUES (16, 'yudi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'koordinator', '1');
INSERT INTO `tuser` VALUES (17, 'safira', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'operator', '1');

SET FOREIGN_KEY_CHECKS = 1;
