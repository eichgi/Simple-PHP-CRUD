/*
Navicat MySQL Data Transfer

Source Server         : conexion
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : crud

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-10-16 11:44:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cursos
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `lenguaje` varchar(255) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES ('1', 'POO', 'PHP', '500', '2016-10-09 13:14:33');
INSERT INTO `cursos` VALUES ('2', 'Arreglos', 'Javascript', '300', '2016-10-09 13:14:43');
INSERT INTO `cursos` VALUES ('3', 'Android', 'Java', '700', '2016-10-09 13:16:15');
INSERT INTO `cursos` VALUES ('4', 'Frontend', 'Javascript', '400', '2016-10-09 13:16:31');
INSERT INTO `cursos` VALUES ('5', 'Backend', 'PHP', '500', '2016-10-09 13:16:36');

-- ----------------------------
-- Table structure for cursos_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `cursos_usuarios`;
CREATE TABLE `cursos_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cursos_usuarios
-- ----------------------------
INSERT INTO `cursos_usuarios` VALUES ('1', '1', '1');
INSERT INTO `cursos_usuarios` VALUES ('2', '1', '2');
INSERT INTO `cursos_usuarios` VALUES ('3', '1', '3');
INSERT INTO `cursos_usuarios` VALUES ('4', '1', '5');
INSERT INTO `cursos_usuarios` VALUES ('5', '1', '4');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Pedro', 'Castillo', '20');
INSERT INTO `usuarios` VALUES ('2', 'Luisa', 'Rodriguez', '40');
INSERT INTO `usuarios` VALUES ('3', 'Alberto', 'Hernández', '28');
