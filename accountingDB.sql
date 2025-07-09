/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 8.0.31 : Database - accountingdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`accountingdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `accountingdb`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2025_06_18_130354_create_user_models_table',1),(2,'2025_06_19_055038_create_user_contact_numbers_table',1),(3,'2025_06_30_052203_sp_accounts',1),(4,'2025_06_30_070523_create_products_table',1),(5,'2025_06_30_073445_create_user_roles_table',1),(6,'2025_07_01_051709_create_product_categories_table',1),(7,'2025_07_02_074907_create_product_brands_table',1),(8,'2025_07_04_071331_create_product_units_table',1),(9,'2025_07_04_073610_sp_product_brand',1),(10,'2025_07_04_073814_sp_product_category',1),(11,'2025_07_04_073931_sp_role',1),(12,'2025_07_07_063022_create_employees_table',2),(22,'2025_07_09_060214_modify_employees',4),(24,'2025_07_09_061900_sp_employees',5),(21,'2025_07_08_052754_sp_csutomers',3),(25,'2025_07_09_064013_create_salaries_table',6);

/*Table structure for table `tbl_product_brand` */

DROP TABLE IF EXISTS `tbl_product_brand`;

CREATE TABLE `tbl_product_brand` (
  `BrandID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`BrandID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_product_brand` */

/*Table structure for table `tbl_product_category` */

DROP TABLE IF EXISTS `tbl_product_category`;

CREATE TABLE `tbl_product_category` (
  `CategoryID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_product_category` */

insert  into `tbl_product_category`(`CategoryID`,`Category`,`CreatedBy`,`created_at`,`updated_at`) values (1,'Gadgets',0,'2025-07-05 09:58:25',NULL),(2,'Phone Accessories',0,'2025-07-05 09:58:50',NULL),(3,'Phones',0,'2025-07-05 09:59:00',NULL);

/*Table structure for table `tbl_product_unit` */

DROP TABLE IF EXISTS `tbl_product_unit`;

CREATE TABLE `tbl_product_unit` (
  `UnitID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `UnitName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UnitShortName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Created_by` int DEFAULT NULL,
  `Updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`UnitID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_product_unit` */

insert  into `tbl_product_unit`(`UnitID`,`UnitName`,`UnitShortName`,`Created_by`,`Updated_by`,`created_at`,`updated_at`) values (1,'Meter','m',NULL,NULL,'2025-07-04 07:41:31',NULL),(2,'Kilogram','kg',NULL,NULL,'2025-07-04 07:41:31',NULL),(3,'Second','s',NULL,NULL,'2025-07-04 07:41:31',NULL),(4,'Ampere','A',NULL,NULL,'2025-07-04 07:41:31',NULL),(5,'Kelvin','K',NULL,NULL,'2025-07-04 07:41:31',NULL),(6,'Mole','mol',NULL,NULL,'2025-07-04 07:41:31',NULL),(7,'Candela','cd',NULL,NULL,'2025-07-04 07:41:31',NULL),(8,'Liter','L',NULL,NULL,'2025-07-04 07:41:31',NULL);

/*Table structure for table `tbl_products` */

DROP TABLE IF EXISTS `tbl_products`;

CREATE TABLE `tbl_products` (
  `ProductID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ProductCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProductName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Quantity` int NOT NULL DEFAULT '0',
  `Amount` decimal(10,2) DEFAULT NULL,
  `ProductDesctiption` text COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `update_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_products` */

/*Table structure for table `tbl_user_role` */

DROP TABLE IF EXISTS `tbl_user_role`;

CREATE TABLE `tbl_user_role` (
  `RoleID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` int NOT NULL DEFAULT '0',
  `UpdatedBy` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_user_role` */

insert  into `tbl_user_role`(`RoleID`,`Role`,`CreatedBy`,`UpdatedBy`,`created_at`,`updated_at`) values (1,'Administrator',0,0,NULL,NULL),(2,'Staff',0,0,NULL,NULL),(3,'User',0,0,NULL,NULL);

/*Table structure for table `tblcustomers` */

DROP TABLE IF EXISTS `tblcustomers`;

CREATE TABLE `tblcustomers` (
  `CustomerID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CustomerNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CustomerName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GenderID` int NOT NULL DEFAULT '0',
  `Province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Municipality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CompleteAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RegistrationDate` date DEFAULT NULL,
  `BranchRegistered` int NOT NULL DEFAULT '0',
  `CreatedBy` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tblcustomers` */

insert  into `tblcustomers`(`CustomerID`,`CustomerNumber`,`CustomerName`,`GenderID`,`Province`,`Municipality`,`Barangay`,`CompleteAddress`,`RegistrationDate`,`BranchRegistered`,`CreatedBy`,`created_at`,`updated_at`) values (1,'TAL202507080001','Aaron Pichollo Mangahas Talens',1,'asdasd','asdasd','asdaad','sdasd','2025-07-08',0,0,'2025-07-08 14:28:01',NULL);

/*Table structure for table `tblemployees` */

DROP TABLE IF EXISTS `tblemployees`;

CREATE TABLE `tblemployees` (
  `EmployeeID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT '0',
  `ContactNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SalaryID` int NOT NULL DEFAULT '0',
  `GenderID` int NOT NULL DEFAULT '0',
  `Province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Municipality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CompleteAdddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Datehired` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tblemployees` */

/*Table structure for table `tblgender` */

DROP TABLE IF EXISTS `tblgender`;

CREATE TABLE `tblgender` (
  `GenderID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`GenderID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tblgender` */

insert  into `tblgender`(`GenderID`,`Gender`,`created_at`,`updated_at`) values (1,'Male',NULL,NULL),(2,'Female',NULL,NULL);

/*Table structure for table `tblsalary` */

DROP TABLE IF EXISTS `tblsalary`;

CREATE TABLE `tblsalary` (
  `SalaryID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Salary` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SalaryID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tblsalary` */

insert  into `tblsalary`(`SalaryID`,`Salary`,`created_at`,`updated_at`) values (1,'10000.00',NULL,NULL),(2,'15000.00',NULL,NULL),(3,'25000.00',NULL,NULL),(4,'18000.00',NULL,NULL),(5,'20000.00',NULL,NULL);

/*Table structure for table `tbluser_accounts` */

DROP TABLE IF EXISTS `tbluser_accounts`;

CREATE TABLE `tbluser_accounts` (
  `UserID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `PasswordExpiration` date DEFAULT NULL,
  `AcountStatus` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `tbluser_accounts_userid_unique` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbluser_accounts` */

insert  into `tbluser_accounts`(`UserID`,`Username`,`Password`,`FName`,`MName`,`LName`,`Birthday`,`PasswordExpiration`,`AcountStatus`,`created_at`,`updated_at`) values (1,'Aaron','$2y$10$k48ZYKB/vj.GHYvcaxRqAu0N/O6aEwpxA6OJngfUQsrVyzTIEL8xO','Aaron','Mangahas','Talens','1998-09-03','2025-10-04',1,'2025-07-04 07:41:31',NULL);

/*Table structure for table `tbluser_contact_numbers` */

DROP TABLE IF EXISTS `tbluser_contact_numbers`;

CREATE TABLE `tbluser_contact_numbers` (
  `ContactID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL DEFAULT '0',
  `CellPhoneNumber` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ContactID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbluser_contact_numbers` */

/* Procedure structure for procedure `sp_accounts` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_accounts` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_accounts`(
                IN xUserID INT, 
                IN xUsername VARCHAR(250),
                IN xPassword VARCHAR(250),
                IN xNewPassword VARCHAR(250),
                IN xFName VARCHAR(250),
                IN xMName VARCHAR(250),
                IN xLName VARCHAR(250),
                IN xBirthday DATE,
                IN xCellphone VARCHAR(250),
                IN xAction INT
            )
BEGIN
                IF xAction = 1 THEN
                    UPDATE tbluser_accounts 
                        SET `Password` = xNewPassword, `PasswordExpiration` = DATE_ADD(CURRENT_DATE, INTERVAL 3 MONTH), `AcountStatus` = 1
                    WHERE Username COLLATE utf8mb4_unicode_ci = xUsername COLLATE utf8mb4_unicode_ci;
                    SELECT 'You have successfully updated your password. You can now login to the system' AS SuccessMessage;
                ELSEIF xAction = 0 THEN
                    IF EXISTS (SELECT 1 FROM tbluser_accounts WHERE `Username` COLLATE utf8mb4_unicode_ci = xUsername COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The username you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO `accountingdb`.`tbluser_accounts`(`Username`, `Password`, `FName`, `MName`, `LName`, `Birthday`, `PasswordExpiration`, `created_at`) 
                            VALUES(xUsername, xPassword, xFName, xMName, xLName, xBirthday, DATE_ADD(CURRENT_DATE, INTERVAL 3 MONTH), CURRENT_TIMESTAMP());
                        SET @lastInsertedUserID = LAST_INSERT_ID();
                        INSERT INTO `accountingdb`.`tbluser_contact_numbers`(`UserID`, `CellPhoneNumber`, `created_at`) 
                            VALUES(@lastInsertedUserID, xCellphone, CURRENT_TIMESTAMP());
                        SELECT 'You have successfully registered to the system. Wait a few minutes to activate your account before login.' AS SuccessMessage;
                    END IF;
                END IF;
            END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_customers` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_customers` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_customers`(
                IN xCustomerID INT, 
                IN xCustomerNumber VARCHAR(255),
                IN xCustomerName VARCHAR(255), 
                IN xGender INT, 
                IN xPermanentAddress VARCHAR(255),
                IN xProvince VARCHAR(255),
                IN xMunicipality VARCHAR(255),
                IN xBarangay VARCHAR(255),
                IN xAction VARCHAR(200)
            )
BEGIN
                 IF xAction = 'Create' THEN 
                    IF EXISTS (SELECT 1 FROM tblcustomers WHERE `CustomerName` COLLATE utf8mb4_unicode_ci = xCustomerName COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The customer you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO tblcustomers(`CustomerNumber`,`CustomerName`,`GenderID`,`CompleteAddress`,`Province`,`Municipality`,`Barangay`,`RegistrationDate`, `created_at`) 
                        VALUES (xCustomerNumber,xCustomerName,xGender, xPermanentAddress, xProvince, xMunicipality, xBarangay, CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());
                        SELECT 'You have successfully register customer in the system.' AS SuccessMessage;
                    END IF;
                ELSEIF  xAction = 'Update' THEN 
                    IF EXISTS (SELECT 1 FROM tblcustomers WHERE `CustomerName` COLLATE utf8mb4_unicode_ci = xCustomerName COLLATE utf8mb4_unicode_ci
                     AND `GenderID` COLLATE utf8mb4_unicode_ci = xGender COLLATE utf8mb4_unicode_ci
                     AND `CompleteAddress` COLLATE utf8mb4_unicode_ci = xPermanentAddress COLLATE utf8mb4_unicode_ci 
                     AND `Province` COLLATE utf8mb4_unicode_ci = xProvince COLLATE utf8mb4_unicode_ci
                     AND `Municipality` COLLATE utf8mb4_unicode_ci= xMunicipality COLLATE utf8mb4_unicode_ci
                     AND `Barangay` COLLATE utf8mb4_unicode_ci= xBarangay COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'No change were made.' AS ErrorMessage;
                    ELSE
                        UPDATE tblcustomers SET CustomerName = xCustomerName, GenderID = xGender, CompleteAddress = xPermanentAddress
                                                ,Province = xProvince, Municipality = xMunicipality, Barangay = xBarangay
                        WHERE CustomerID  COLLATE utf8mb4_unicode_ci = xCustomerID  COLLATE utf8mb4_unicode_ci;
                        SELECT 'You have successfully updated customer in the system.' AS SuccessMessage;
                    END IF;
                ELSE
                    DELETE FROM tblcustomers WHERE CustomerID  COLLATE utf8mb4_unicode_ci = xCustomerID  COLLATE utf8mb4_unicode_ci;
                    SELECT 'You have successfully deleted customer in the system.' AS SuccessMessage;
                END IF;
            END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_employees` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_employees` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_employees`(
                IN xEmployeeID INT,
                IN xUserID INT, 
                IN xContactNumber VARCHAR(255), 
                IN xSalary INT, 
                IN xGender INT, 
                IN xProvince VARCHAR(255),
                IN xMunicipality VARCHAR(255),
                IN xBarangay VARCHAR(255),
                IN xCompleteAddress VARCHAR(255),
                IN xAction VARCHAR(150)
            )
BEGIN
                    IF xAction = 'Update' THEN
                    
                            -- Check if the data is exists or have any changes
                        IF EXISTS (SELECT 1 FROM tblemployees WHERE `UserID` COLLATE utf8mb4_unicode_ci = xUserID COLLATE utf8mb4_unicode_ci
                                AND `ContactNumber` COLLATE utf8mb4_unicode_ci = xContactNumber COLLATE utf8mb4_unicode_ci
                                AND `SalaryID` COLLATE utf8mb4_unicode_ci = xSalary COLLATE utf8mb4_unicode_ci 
                                AND `GenderID` COLLATE utf8mb4_unicode_ci = xSalary COLLATE utf8mb4_unicode_ci 
                                AND `Province` COLLATE utf8mb4_unicode_ci = xProvince COLLATE utf8mb4_unicode_ci
                                AND `Municipality` COLLATE utf8mb4_unicode_ci= xMunicipality COLLATE utf8mb4_unicode_ci
                                AND `Barangay` COLLATE utf8mb4_unicode_ci= xBarangay COLLATE utf8mb4_unicode_ci
                                AND `CompleteAddress` COLLATE utf8mb4_unicode_ci= xCompleteAddress COLLATE utf8mb4_unicode_ci) THEN
                                
                            -- Error Handling
                            SELECT 'No change were made.' AS ErrorMessage;
                                    ELSE
                            -- Update query
                            UPDATE tblemployees SET  ContactNumber = xContactNumber, SalaryID = xSalary, GenderID = xGender
                                        ,Province = xProvince, Municipality = xMunicipality, Barangay = xBarangay, CompleteAddress = xCompleteAddress
                            WHERE EmployeeID  COLLATE utf8mb4_unicode_ci = xEmployeeID  COLLATE utf8mb4_unicode_ci;
                            
                            -- Error Handling
                            SELECT 'You have successfully updated employee in the system.' AS SuccessMessage;
                                END IF;
                    
                    ELSE  
                        -- Check if already exists
                        IF EXISTS (SELECT 1 FROM tblemployees WHERE `UserID` COLLATE utf8mb4_unicode_ci = xUserID COLLATE utf8mb4_unicode_ci) THEN
                        
                            -- Error Handling
                            SELECT 'The employee you entered already exists.' AS ErrorMessage;
                        ELSE
                            INSERT INTO tblemployees(`UserID`,`ContactNumber`,`SalaryID`,`GenderID`,`Province`,`Municipality`,`Barangay`,`CompleteAddress`, `DateHired`,`created_at`) 
                            VALUES (xUserID,xContactNumber,xSalary, xGender, xProvince, xMunicipality, xBarangay,xCompleteAddress,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());

                            -- Error Handling
                            SELECT 'You have successfully added employee in the system.' AS SuccessMessage;
                        END IF;
                    END IF;
                END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_product_brand` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_product_brand` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_product_brand`(IN xBrandID INT, IN xBrand VARCHAR(255), IN xAction VARCHAR(150))
BEGIN
                IF xAction = 'Update' THEN
                    UPDATE tbl_product_brand
                     SET `Brand` = xBrand, updated_at = CURRENT_TIMESTAMP()
                    WHERE BrandID  = xBrandID;
                    SELECT 'You have successfully updated product brand in the system.' AS SuccessMessage;
                ELSEIF xAction = 'Create' THEN
                    IF EXISTS (SELECT 1 FROM tbl_product_brand WHERE `Brand` COLLATE utf8mb4_unicode_ci = xBrand COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The product brand you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO tbl_product_brand(`Brand`, `created_at`) VALUES (xBrand, CURRENT_TIMESTAMP());
                        SELECT 'You have successfully added new product brand in the system.' AS SuccessMessage;
                    END IF;
                ELSE
                    DELETE FROM tbl_product_brand WHERE BrandID = xBrandID;
                    SELECT 'You have successfully deleted product brand in the system.' AS SuccessMessage;
                END IF;
            END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_product_category` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_product_category` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_product_category`(IN xCategoryID INT, in xCategory varchar(255), in xAction varchar(150))
BEGIN
	   IF xAction = 'Update' THEN
	   
		UPDATE tbl_product_category
			SET `Category` = xCategory, updated_at = CURRENT_TIMESTAMP()
		WHERE CategoryID  = xCategoryID;
		SELECT 'You have successfully updated product category in the system.' AS SuccessMessage;
		
	    ELSEIF xAction = 'Create' THEN
	    
		IF EXISTS (SELECT 1 FROM tbl_product_category WHERE `Category` COLLATE utf8mb4_unicode_ci = xCategory COLLATE utf8mb4_unicode_ci) THEN
		    SELECT 'The product category you entered already exists.' AS ErrorMessage;
		ELSE
		    INSERT INTO tbl_product_category(`Category`, `created_at`) VALUES (xCategory, CURRENT_TIMESTAMP());
		    
		    SELECT 'You have successfully added new product category in the system.' AS SuccessMessage;
		END IF;
		
	    ELSE
			DELETE FROM tbl_product_category WHERE CategoryID = xCategoryID;
			
			SELECT 'You have successfully deleted product category in the system.' AS SuccessMessage;
	    END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_role` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_role` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_role`(
    IN xRoleID INT, 
    IN xRole VARCHAR(255), 
    IN xAction VARCHAR(200)
)
BEGIN
    IF xAction = 'Update' THEN
        UPDATE tbl_user_role 
            SET Role = xRole, updated_at = CURRENT_TIMESTAMP()
        WHERE RoleID = xRoleID;
        SELECT 'You have successfully updated role in the system.' AS SuccessMessage;
    ELSEIF xAction = 'Create' THEN
        IF EXISTS (SELECT 1 FROM tbl_user_role WHERE Role COLLATE utf8mb4_unicode_ci = xRole COLLATE utf8mb4_unicode_ci) THEN
            SELECT 'The role you entered already exists.' AS ErrorMessage;
        ELSE
            INSERT INTO tbl_user_role(Role, created_at) 
            VALUES (xRole, CURRENT_TIMESTAMP());
            SELECT 'You have successfully added new role in the system.' AS SuccessMessage;
        END IF;
    ELSE
        DELETE FROM tbl_user_role WHERE RoleID = xRoleID;
        SELECT 'You have successfully deleted role in the system.' AS SuccessMessage;
    END IF;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
