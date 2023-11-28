CREATE DATABASE IF NOT EXISTS portal;

USE portal;

CREATE TABLE `users` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `isadmin` tinyint(1) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `image` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp(),
  `work_hour` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
