-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 12-09-2015 a las 06:35:08
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `inventario`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `config`
-- 

CREATE TABLE `config` (
  `clave` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `insumo`
-- 

CREATE TABLE `insumo` (
  `insumoid` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `fecharegistro` date NOT NULL,
  `unidad` varchar(50) NOT NULL,
  PRIMARY KEY  (`insumoid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `transaccion`
-- 

CREATE TABLE `transaccion` (
  `transaccionid` int(11) NOT NULL auto_increment,
  `tipo` varchar(20) NOT NULL,
  `insumoid` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL,
  PRIMARY KEY  (`transaccionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;
