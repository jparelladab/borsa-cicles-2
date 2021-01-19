-- MySQL dump 10.13  Distrib 8.0.22, for osx10.16 (x86_64)
--
-- Host: localhost    Database: borsa_cicles_2
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admins_user_id_foreign` (`user_id`),
  CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Maria Serra',1,'2021-01-19 14:36:16','2021-01-19 14:36:16');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumne_offer`
--

DROP TABLE IF EXISTS `alumne_offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumne_offer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `alumne_id` bigint unsigned NOT NULL,
  `offer_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumne_offer_alumne_id_offer_id_unique` (`alumne_id`,`offer_id`),
  KEY `alumne_offer_offer_id_foreign` (`offer_id`),
  CONSTRAINT `alumne_offer_alumne_id_foreign` FOREIGN KEY (`alumne_id`) REFERENCES `alumnes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alumne_offer_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumne_offer`
--

LOCK TABLES `alumne_offer` WRITE;
/*!40000 ALTER TABLE `alumne_offer` DISABLE KEYS */;
INSERT INTO `alumne_offer` VALUES (1,1,17,NULL,NULL),(2,1,29,NULL,NULL),(3,1,40,NULL,NULL),(4,2,24,NULL,NULL),(5,2,36,NULL,NULL),(6,2,42,NULL,NULL),(7,3,9,NULL,NULL),(8,3,18,NULL,NULL),(9,3,21,NULL,NULL),(10,4,32,NULL,NULL);
/*!40000 ALTER TABLE `alumne_offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumne_study`
--

DROP TABLE IF EXISTS `alumne_study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumne_study` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `study_id` bigint unsigned NOT NULL,
  `alumne_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumne_study_study_id_foreign` (`study_id`),
  KEY `alumne_study_alumne_id_foreign` (`alumne_id`),
  CONSTRAINT `alumne_study_alumne_id_foreign` FOREIGN KEY (`alumne_id`) REFERENCES `alumnes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alumne_study_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumne_study`
--

LOCK TABLES `alumne_study` WRITE;
/*!40000 ALTER TABLE `alumne_study` DISABLE KEYS */;
INSERT INTO `alumne_study` VALUES (1,1,1,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(2,5,2,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(3,8,3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(4,9,4,'2021-01-19 14:36:17','2021-01-19 14:36:17');
/*!40000 ALTER TABLE `alumne_study` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnes`
--

DROP TABLE IF EXISTS `alumnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNI` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valoracio` mediumtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint unsigned NOT NULL,
  `study_end` int NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pending_survey` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumnes_user_id_foreign` (`user_id`),
  CONSTRAINT `alumnes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnes`
--

LOCK TABLES `alumnes` WRITE;
/*!40000 ALTER TABLE `alumnes` DISABLE KEYS */;
INSERT INTO `alumnes` VALUES (1,'Carlie','Carter','Kassulke','39726995','2017-03-27','4648 Heidenreich Haven Apt. 635\nPort Adelleport, SC 25549-8182','Twilaburgh','74997-5119','+2791938333376',NULL,'Non velit dolorem fuga. Fugiat officia laboriosam sit nemo modi aut. Officiis corrupti ducimus dolor. Et dolorem deleniti et fugit quia sapiente dolorem.',4,2016,NULL,NULL,0,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(2,'Clark','Robel','Ortiz','84540126','1993-01-14','81291 Dickens Court\nEast Shaniaborough, MN 21405','Port Ianville','22043-3462','+6988163590708',NULL,'Nam consequatur enim eum. Debitis tempore quis et excepturi.',5,2020,NULL,NULL,0,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(3,'Amparo','Rolfson','Borer','33583914','2005-04-30','12367 Christiansen Crossroad Suite 125\nMosciskitown, MT 57209-6060','Floymouth','33939-9461','+1228402731385',NULL,'Aspernatur ut dolor sint voluptates est. In aut accusamus ut laboriosam soluta quasi consectetur numquam. Consequatur consequatur ut repellendus ipsum quia natus quae.',7,2017,NULL,NULL,0,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(4,'Dallas','Brown','Jenkins','40954042','1970-03-23','8862 Barton Meadow Apt. 042\nMichealview, ME 87637','Lucianoview','46049','+3410232755569',NULL,'Aut earum in esse est rerum voluptas. Ea dolor ut ipsam quas vel. Est est aut in consequatur. Delectus aut voluptatum nulla vero fugiat.',8,2020,NULL,NULL,0,'2021-01-19 14:36:17','2021-01-19 14:36:17');
/*!40000 ALTER TABLE `alumnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empreses`
--

DROP TABLE IF EXISTS `empreses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empreses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `pending_survey` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empreses_user_id_foreign` (`user_id`),
  CONSTRAINT `empreses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empreses`
--

LOCK TABLES `empreses` WRITE;
/*!40000 ALTER TABLE `empreses` DISABLE KEYS */;
INSERT INTO `empreses` VALUES (1,'Mitchell-Breitenberg','aufderhar.com','Christ Quigley','+7829514819438','Omnis qui eaque non corporis aut quo ut. Maxime deserunt et itaque sapiente. Ea qui nam adipisci officiis consequatur.',2,0,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(2,'Predovic Inc','schoen.com','Prof. Daija Roberts','+9487153914377','Consequatur explicabo labore illo totam aut perspiciatis. Ullam ea occaecati ut ipsum. Quaerat et sunt eos quo deserunt eum nesciunt. Nam eius impedit assumenda facilis temporibus.',3,0,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(3,'Mosciski Inc','leffler.com','Danny Carter','+5272486908881','Architecto iusto eos est earum. Voluptatibus fuga molestiae earum quisquam. Molestiae aut sed sunt ut occaecati iusto qui.',6,0,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(4,'Veum and Sons','jacobson.com','Dax Thiel','+1475454896683','Adipisci quod et harum modi cumque est. Repudiandae suscipit rerum blanditiis ea voluptate mollitia. Et ab autem dolores est et non nihil tempora.',9,0,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(5,'Russel Inc','mcdermott.com','Jonathon Connelly','+1310706952803','Consequatur quas velit voluptas ut soluta. Voluptate natus officiis earum corporis reprehenderit odio voluptatibus.',10,0,'2021-01-19 14:36:17','2021-01-19 14:36:17');
/*!40000 ALTER TABLE `empreses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_10_19_140551_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2015_10_26_170317_create_studies_table',1),(5,'2019_08_19_000000_create_failed_jobs_table',1),(6,'2020_10_20_110805_create_alumnes_table',1),(7,'2020_10_20_110911_create_empreses_table',1),(8,'2020_10_20_124928_create_admins_table',1),(9,'2020_10_26_170318_create_offers_table',1),(10,'2020_10_27_150105_create_studies_alumnes_table',1),(11,'2020_11_01_131438_create_alumne_offer_table',1),(12,'2020_11_04_210939_create_survey_alumnes_table',1),(13,'2020_11_04_210955_create_survey_empresas_table',1),(14,'2020_11_16_094947_create_study_alumne_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `jornada` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offers_empresa_id_foreign` (`empresa_id`),
  KEY `offers_study_id_foreign` (`study_id`),
  CONSTRAINT `offers_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empreses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `offers_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (1,3,'Electrical Sales Representative','Saepe aut commodi neque. Quod qui reprehenderit fugit laudantium sunt. Dolor voluptas corrupti est occaecati qui. Quo accusamus maiores est similique optio accusamus animi. Fugiat voluptas eum perspiciatis perspiciatis et est et. Natus rem ut corrupti harum modi enim. Consectetur molestiae et hic praesentium expedita sit voluptas blanditiis. Libero recusandae aut natus natus voluptates recusandae. Amet odio hic nulla ex quis dolor omnis. Et vitae et qui. Itaque nihil est autem error est.','Quod dolorem et vel aut animi. Quam architecto consequuntur nihil quia et quaerat maiores ullam. Totam impedit et et iure esse.','Flexible','Pràctiques','3946 euros/mes',5,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(2,5,'Legal Secretary','Sed sunt dolores explicabo autem suscipit neque facilis. Consequuntur voluptas veniam qui inventore et debitis iste. Doloremque et praesentium pariatur inventore. Provident modi laboriosam adipisci deleniti ipsam et. Maiores error illo autem enim. Possimus dolorum tenetur in repellendus molestiae. Sint quae dolorum minima fuga ab adipisci tempore incidunt.','Reprehenderit saepe maiores eveniet earum odit vel qui. Minima quo autem ab minus quidem laborum. Dolore quia facere quia perferendis aut odit odit.','Parcial','Voluntari','5519 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(3,2,'Agricultural Science Technician','Sed autem eaque atque eos vel quaerat tempora. Possimus ut et magnam doloremque consequuntur. Eum non odio labore saepe. Ducimus qui deserunt autem aut itaque sit. Temporibus illum suscipit minus neque. Reiciendis quaerat soluta sit eum sunt ipsa et. Magnam accusantium sint sed praesentium. Occaecati exercitationem debitis repellat aut quae. Ratione deserunt error non cum voluptatem minus voluptatem suscipit. Nihil similique aut ut neque repellendus omnis sed.','Voluptate consequuntur sed iure aut dicta. Porro possimus voluptatem vel maxime blanditiis non velit. Sunt quia eligendi possimus.','Parcial','Conveni','4648 euros/mes',2,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(4,4,'Tool and Die Maker','Laboriosam illo neque culpa enim quam ullam cumque. Eius doloremque aut accusamus natus suscipit vel laborum. Sapiente quidem qui magni sint molestiae temporibus ab. Quia repellat repudiandae aut maiores sed temporibus eos atque. Aperiam ipsam perferendis iste. Id ut facilis ipsam. Sed et id sunt pariatur. Eveniet sequi laborum qui labore. Optio tempora quo quia et. Rerum ea saepe itaque veniam qui. Non atque est aut ea sunt sit iste autem.','Quia harum non eos ut. Modi ipsa rerum voluptas. Quia qui corrupti aperiam laudantium repellat. Dolor quia sit quibusdam.','Parcial','Voluntari','5084 euros/mes',4,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(5,4,'Advertising Sales Agent','Rerum deserunt animi sapiente veniam. Nihil quae sequi maxime veniam reiciendis quos. Odio distinctio impedit maxime perspiciatis iste ut ratione. Quia cumque vitae maxime dignissimos. Atque eos esse aut ad quia. In neque et sit sequi sed totam expedita. Non voluptatum quam possimus animi dolorem sed. Reiciendis reiciendis voluptatem est quod. Blanditiis iure sit non illo consequatur occaecati aliquid. Delectus animi est debitis nostrum dolores ut.','Voluptatem tempora repudiandae autem labore ut consequatur. Non ratione reprehenderit omnis nostrum.','Flexible','Indefinit','6859 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(6,2,'Private Sector Executive','Perspiciatis iure esse ipsum. Laborum soluta distinctio aspernatur veritatis quae reiciendis et. Impedit error omnis autem quas tempore ex odio. Aliquid autem quo sit perspiciatis sunt sit. Labore voluptatibus et ut et consequatur autem eum. Magnam laboriosam vel maiores excepturi. Est consequatur doloremque non dolores. Earum rerum dolor omnis. Laudantium natus quod et ad explicabo est assumenda voluptatem. Eaque fugiat suscipit impedit aut reiciendis est.','Odit id inventore sed. Perferendis repellendus rerum nam. Laboriosam occaecati nostrum voluptate et optio laborum dolorum.','Parcial','Voluntari','841 euros/mes',6,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(7,4,'Dispatcher','Nobis voluptates distinctio dolores neque. At temporibus nemo tenetur nihil tempore ullam et ut. Non aut temporibus doloremque qui qui dignissimos. Doloribus harum dolorum itaque odio non ducimus consequatur. Voluptas maxime consequatur quia ipsum. Iure quo aut suscipit aliquam nulla quia esse. Asperiores neque qui ad libero eum. Odit laudantium qui animi quibusdam architecto ipsa impedit. Et consequatur magni nesciunt.','Voluptatibus architecto dolor consequuntur eius. Eaque aut perferendis voluptatem error consectetur et fuga. Aperiam nihil voluptas alias distinctio. Totam autem esse vero sunt vel.','Flexible','Conveni','1371 euros/mes',11,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(8,3,'Fitness Trainer','Necessitatibus ea minus corrupti odit quia iure ab. Est facere porro facilis rerum. Dolorem pariatur nemo nesciunt. Qui ducimus optio aspernatur qui ut. Voluptas adipisci quas et aut. At praesentium ut nobis ratione est ab. Officia doloremque nemo iure doloribus facere sit architecto. Illo ea autem nisi labore pariatur alias. Rerum voluptate tempore doloribus et aut assumenda eaque. Enim aut voluptatem voluptatem suscipit. Sit nihil quia amet aut delectus odio ab.','Itaque est adipisci at voluptatem voluptatem doloribus. Eum iure sint dignissimos quae. Sit accusantium repellat molestiae blanditiis est aut.','Parcial','Voluntari','8639 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(9,2,'Material Movers','Harum fugit eos vel nobis ea voluptas perferendis. Quidem quidem aut atque non. Atque voluptatem vitae rem laborum doloribus illo eos praesentium. Non et iure tenetur soluta molestiae adipisci. Error aliquid velit possimus consequatur optio quam. Quis porro et cum dicta quaerat eum. Perspiciatis aut mollitia provident. Qui aspernatur perferendis odit earum cupiditate rerum sapiente. Aut cupiditate eligendi odit voluptas neque debitis ut. Voluptas tempore nam quis incidunt vero repellat.','Accusantium dolores est mollitia in. Vero est quo alias quisquam aliquid perferendis est. Vel ea praesentium in nesciunt dolor occaecati officiis.','Complerta','Voluntari','6952 euros/mes',8,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(10,1,'Physics Teacher','Nisi consectetur odit blanditiis nisi. Sit adipisci laborum pariatur cum et quod. Magnam labore eius commodi temporibus. Alias odit deserunt perferendis ut. Culpa nihil et placeat laborum ut aperiam excepturi. Nulla quas aut culpa et saepe minima. Incidunt vel qui qui eum magnam esse et est. Voluptas eligendi quia et.','Ad neque rerum qui. Deleniti autem cumque molestias deleniti et esse. Beatae dolorum debitis quo deleniti ab voluptate. Eum eum magni voluptas nemo eum quibusdam amet porro.','Flexible','Indefinit','4121 euros/mes',4,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(11,2,'Construction Laborer','Beatae et rem neque. Et consequatur saepe optio veritatis non. Dolorum cupiditate facilis aut saepe quia ut. Soluta in aut nulla et. Nostrum enim eius ut totam officia dolorem. Maxime porro impedit nam sit. Quidem aliquid omnis quo similique vel. Eum illum eos esse. Molestias quos corrupti maiores. Et saepe deleniti natus dicta eum voluptatem. Quia consequatur placeat sed deserunt.','Id iste qui perspiciatis est. Quam consequuntur enim fuga non consequuntur optio. Fugit aut voluptatibus perferendis laborum cupiditate doloremque eos cumque.','Flexible','Conveni','5774 euros/mes',7,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(12,3,'Astronomer','Tempora architecto odit sequi provident numquam omnis voluptas. Et aut itaque voluptas aut aperiam. Optio animi repellat id labore aut ex corrupti. Architecto maiores quia iste. Totam rerum consequuntur non odit facilis et et totam. Ut ut magnam hic quam eius. Sit inventore consequatur et eaque tenetur illo earum. Corrupti error magni illum doloribus consectetur. Rem quidem enim eaque magni sunt. Facere quia possimus rerum odit dignissimos.','Provident sed voluptatem est beatae nesciunt non quibusdam. Ipsam sed voluptatem exercitationem quis dolores. Quod doloribus quis vel cupiditate dicta.','Flexible','Voluntari','5814 euros/mes',4,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(13,4,'Cultural Studies Teacher','Assumenda consequatur enim enim sit aliquam eum. Praesentium in et sunt sed nulla omnis. Perferendis blanditiis dolor enim aut recusandae magni. Quis odit similique sunt et et quia consectetur. Quae a est omnis maiores voluptas nesciunt velit. Et et nemo voluptatum nam autem eos velit. Doloribus doloribus inventore eveniet harum eligendi non quia.','Numquam iure aspernatur minima perspiciatis. Ut nesciunt et suscipit accusantium. Itaque vero vitae impedit aut hic placeat.','Complerta','Indefinit','2075 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(14,1,'Health Practitioner','Facilis saepe pariatur velit animi est qui. Voluptatem ea quidem et libero cumque. Velit quae voluptatem aut provident. In velit dolores temporibus dolores quod velit. Est rem dicta tenetur sint ut quas. Ut eius nobis nam eius. Nulla deserunt aut autem deleniti. Velit mollitia atque rerum repellat in qui. Explicabo quia aut nesciunt consectetur quo quia. Suscipit debitis perspiciatis sunt veniam a qui.','Saepe explicabo aperiam distinctio sit. Repudiandae rerum qui nam quis et cum. Minima autem aspernatur voluptatem minus officia laboriosam sit. Quod at sint sed itaque aut reiciendis.','Complerta','Voluntari','9441 euros/mes',10,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(15,3,'Motorcycle Mechanic','Eos quod ullam dolore molestias numquam molestiae. Architecto magni consequatur eos et illum dolorem qui. Iusto in officia dolor ut. Vitae et aperiam ut ducimus velit possimus soluta. Sed sequi aut tempora quod alias beatae. Tempore vero eaque enim commodi in aut. Ipsum quos inventore debitis eum. Nobis dolor dolor rerum. Ipsam qui itaque deserunt minus. Ex voluptates fuga aperiam nisi. Sit non alias beatae perspiciatis.','Rerum voluptatem voluptatem aut commodi id. Et excepturi aspernatur odit. Qui minus qui aliquid non quasi est. Enim excepturi qui error sed quod.','Parcial','Indefinit','1712 euros/mes',5,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(16,3,'Data Processing Equipment Repairer','Repellat voluptatibus rerum et illum ut possimus inventore enim. Et qui omnis ipsam saepe totam et aut. Officiis voluptatibus blanditiis et et tempore laboriosam sit. Doloribus explicabo voluptatem enim illum voluptas neque nobis dolor. Doloribus quis minus commodi eos. Odit molestiae est est in quia. Reprehenderit minus nihil odio.','Quod autem facere facilis repellendus est deserunt sit molestiae. Numquam quis perspiciatis reprehenderit ipsum. Accusantium quia est dolorem et sint nisi mollitia.','Flexible','Voluntari','3574 euros/mes',7,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(17,2,'Executive Secretary','Veritatis consequuntur ab qui temporibus qui. Enim architecto a voluptatem omnis quasi dolores temporibus. Voluptas temporibus nostrum maiores doloremque est. Minus quaerat quo voluptate porro assumenda. Corporis cumque eum soluta modi deserunt voluptate illum. Aut deserunt quod deserunt delectus. Qui ab mollitia odit. Non rerum molestias quaerat sed alias molestias quisquam. Veniam rem quibusdam sint in molestiae quo consequuntur tenetur.','Non officiis aut quos delectus. Ut sunt ut neque error laborum.','Parcial','Voluntari','6442 euros/mes',1,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(18,3,'Communication Equipment Worker','Eum eveniet debitis veniam nostrum sed ut. Aut sequi non earum. Voluptatum sit eaque totam hic laudantium et. Error aut nihil et. Optio temporibus ducimus magni dolorum et cumque. Suscipit dolor voluptas doloremque quaerat labore dolorum. Voluptatem quas ut laboriosam aliquam dolore quia ut. Incidunt repudiandae voluptas libero expedita ab quia. Quo et esse perferendis amet eaque et. Dicta labore sint fugiat sunt autem ab aut consequatur. Officiis eius vitae rerum minus consequatur.','Totam et et illum eos dolore quo. Non libero laudantium aspernatur est. Fuga harum et aut rerum aperiam alias voluptatem. Facere aliquam magni et sit mollitia.','Flexible','Conveni','8979 euros/mes',8,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(19,3,'Economics Teacher','Hic ipsa voluptate sit sit minus alias blanditiis exercitationem. Nostrum ut optio qui possimus magnam et. Totam molestias eos dolor aut. Praesentium itaque voluptate eum optio ullam culpa aut. Quo tenetur odit ea qui fuga. Ad mollitia et dignissimos molestiae. Sit voluptatem aut veritatis consectetur aut amet non. Voluptatibus eaque aut repudiandae et aut. Vel sunt sit culpa quasi dolorem sit sed ut. Et non voluptate facere expedita in aliquid laborum. Voluptatum non quasi id voluptas.','Id distinctio nostrum voluptatem. Ut ut et eaque nemo rerum itaque tempore culpa. Libero qui officiis quae vel accusantium.','Parcial','Voluntari','968 euros/mes',6,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(20,2,'Irradiated-Fuel Handler','Nemo qui mollitia enim vitae. Occaecati deleniti enim qui eligendi. Eum ut incidunt porro nihil soluta expedita voluptatem. Delectus et a velit. Asperiores doloribus est provident. Accusantium culpa hic autem omnis optio qui. Placeat fuga atque doloribus quisquam. Sequi iure nulla est voluptas modi. A aliquid possimus a commodi quae omnis animi in. Dicta asperiores atque sapiente et dolor. Minima dicta minima fugiat sequi aut ipsum reiciendis.','Quis quidem fuga non nobis quia. Eius iusto sit omnis suscipit reprehenderit et. Explicabo rerum laborum dolor aut ut.','Parcial','Conveni','8855 euros/mes',9,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(21,1,'Shear Machine Set-Up Operator','Consequuntur quibusdam dolor assumenda perferendis nobis enim nesciunt. Quidem omnis recusandae numquam rerum excepturi. Aut laboriosam incidunt harum. Eaque molestias iure qui unde earum. Natus quasi mollitia ex et eaque enim tenetur. Cumque ut quidem nostrum nihil nam. Hic eveniet nihil ut explicabo modi. Aut aut et facilis aut repellat fugiat. Aliquid quos enim porro nemo eaque ut sit aut.','Est quia debitis numquam hic ipsum ut. Tenetur ut fugit nam aut et autem nemo. Quidem et quod ut laudantium dolor libero voluptas.','Complerta','Pràctiques','4221 euros/mes',8,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(22,1,'Transit Police OR Railroad Police','Commodi autem molestiae omnis alias maxime quia quod. Delectus et ut saepe ad facere voluptatibus. Illum quos quae iste iusto. Placeat in ad provident ducimus dignissimos repellat soluta. Quia tempore et tenetur exercitationem voluptates nulla veritatis. Fuga provident et voluptas distinctio voluptatum reiciendis qui. Labore ipsum voluptas et. Illo id ut aut voluptates quasi. Est nobis qui dolore porro sed. Iure eius nostrum autem est ratione quia. Iusto qui animi molestiae molestias.','Quo commodi sunt dolorem ut dolore placeat expedita. Et sint minus sapiente repudiandae. Quo quae cumque tempore ratione. Quisquam amet unde qui.','Flexible','Indefinit','1947 euros/mes',6,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(23,3,'Wellhead Pumper','Laudantium non aut nulla in consequuntur ipsum. Tenetur eligendi doloremque harum rerum quia. Repellat consequuntur sed et. Quasi minus error assumenda voluptate. Laborum dolores voluptatem necessitatibus odit. Quia ullam nulla qui officia ea maiores. Quis ut non amet vel nobis eaque dolorum. Et blanditiis ad repellendus quia sed enim dignissimos. Natus suscipit aut nemo incidunt tenetur perferendis.','Eos qui qui tempora ipsum dolor molestiae. Dolores soluta deleniti quisquam omnis dolore. Vel sapiente rerum voluptates sint dolores sint. Itaque quasi magni ratione enim non.','Flexible','Conveni','3887 euros/mes',2,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(24,3,'Nuclear Technician','Quod quisquam animi magni architecto repellat dolor ipsum. Expedita hic optio aut aut. Non voluptatem quaerat qui sunt. Et dolores in nam quaerat earum. Voluptate praesentium sint nostrum velit nostrum. Quasi facilis molestias magnam. Cum et nam eligendi blanditiis. Rerum et deleniti numquam aspernatur. Dignissimos et amet odio reprehenderit.','Consequatur aut enim et odit delectus. Nostrum aut maxime aut necessitatibus corporis sit commodi.','Complerta','Voluntari','1908 euros/mes',5,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(25,2,'Molding and Casting Worker','Quasi dolorum omnis ipsum molestiae autem enim. Delectus tempore sed labore neque excepturi cum deleniti. Ex non aperiam nihil. Modi magni placeat rerum saepe temporibus. Exercitationem minima eos sed velit. Porro aut eum inventore. Corrupti ullam nulla molestiae. Aut at ad error ut molestiae sunt nisi. Molestias vitae est quia earum. Suscipit et quibusdam libero atque eum autem numquam. Qui debitis eligendi soluta aut accusamus. Id sed ut magnam et ab. Velit in dolores illum.','Alias et voluptatem esse omnis in vitae voluptas. Dolorem soluta asperiores maiores atque. Quaerat iste nulla eos et voluptas. Eius odit aliquid voluptatem fugit animi quo.','Complerta','Voluntari','2127 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(26,1,'Dot Etcher','Modi quidem qui at nemo atque tenetur. Accusantium ut nemo quidem voluptatem laborum velit. Occaecati voluptates necessitatibus aut beatae aliquid earum. Ut unde accusantium neque ut nihil rerum labore voluptas. Repudiandae voluptatem quidem facere. Sunt explicabo sunt sit provident modi. Ut ipsum nobis rerum consequatur quas numquam dolores. Deserunt sequi voluptates ipsum dolorum fuga. Qui quo doloribus quam aut. Esse eum et ut provident. Et rerum eius est quos numquam.','Vel molestias doloremque quod voluptatem ea nemo voluptas provident. Rerum sint sapiente aut est perferendis veritatis. Error vel dolores iusto enim. Perferendis sed ducimus possimus voluptas soluta.','Flexible','Pràctiques','6873 euros/mes',4,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(27,4,'Network Systems Analyst','Aut aut voluptatem ut officia fuga enim magni. Deleniti cumque aut fugit dolor deleniti quaerat distinctio dolor. Consequuntur exercitationem explicabo eveniet fugiat perferendis illum porro. Quae sapiente omnis quia ut officia. Est officiis quia aliquid quas dolores. Aut molestiae inventore modi deleniti. Repudiandae optio repudiandae eum dolorem iusto rerum voluptate soluta. Beatae ut molestiae nostrum commodi quisquam.','Excepturi id quia est eveniet quae repudiandae. Est asperiores velit deserunt reiciendis sint. Facere molestiae illo ullam aut ipsum. Autem excepturi totam possimus.','Parcial','Pràctiques','5136 euros/mes',8,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(28,4,'Tank Car','Ea cumque aut quo perspiciatis ducimus earum sequi distinctio. Ut labore animi et ipsa et est. Voluptatem qui nulla corrupti et. Deserunt maiores ipsam dolorum et non voluptates. Autem sit doloremque nobis enim culpa est. Dolores et sed qui sint. Eos quis dolores nam voluptas autem occaecati aut cupiditate. Omnis rerum reprehenderit esse exercitationem. Repellendus deserunt neque voluptatem ut eveniet. Eveniet sunt voluptatem explicabo.','Odio optio reiciendis eaque rerum. Minima consequatur officiis et ut. Est cupiditate nobis delectus atque itaque.','Complerta','Pràctiques','8921 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(29,5,'Logging Tractor Operator','Ad praesentium nemo officia sunt. Excepturi excepturi sunt quis molestiae nulla fugit laborum enim. Doloremque numquam qui qui sequi. Doloribus quia non harum. Quisquam saepe eveniet quas et voluptas. Dolores omnis quibusdam dolores aut quasi numquam. Rerum ea dolorem eos iste est. Quis aut id dolor facere quibusdam temporibus. Amet minus omnis aut maxime repellat hic. Temporibus est voluptatem explicabo est est consectetur sint. Aperiam vero et aperiam facere esse dolor facilis eveniet.','Quia sunt sed suscipit cum ex temporibus. Est quo placeat in ut molestias omnis provident. Excepturi dignissimos sed maiores numquam.','Parcial','Conveni','9200 euros/mes',1,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(30,5,'Human Resources Assistant','Quidem nostrum deserunt ipsa eius incidunt expedita nesciunt sapiente. Et eum deleniti ut commodi. Perferendis quaerat repellendus culpa optio corrupti. Delectus reiciendis nulla voluptatem sunt deleniti. At minima aut enim repellat modi. Pariatur maiores dignissimos eaque. Veniam distinctio eaque sunt nostrum ab id. Ea culpa debitis nemo ipsam. Aut vel eveniet totam nulla.','Ut aut dignissimos odit quae modi quibusdam illo sed. Omnis ut sed voluptates fugit non porro. Expedita odio ex atque dolor et dolorem doloremque consequatur. Molestiae facere facere et et illo.','Parcial','Voluntari','5454 euros/mes',4,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(31,5,'Production Manager','Et et est sequi. Voluptatibus libero nihil explicabo est voluptate. Doloribus iure incidunt repudiandae dolorem non. Aspernatur qui corrupti magni dolor dolor. Sit optio et velit minus. Quos voluptas nesciunt vel quos sint provident quasi commodi. Laboriosam aut dolore sit autem. Tempora ut eum qui ea autem tenetur. Expedita a et culpa voluptatem necessitatibus. Iste laboriosam magni error fuga voluptas et quibusdam. Ut eum sit officiis inventore fuga ipsum.','Provident occaecati dolorem possimus nisi voluptatem magni est. Consectetur harum quis alias qui nemo nam. Tempora rerum laborum et similique molestiae sit molestiae.','Flexible','Conveni','9263 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(32,5,'Accountant','Sapiente aliquam sequi necessitatibus in suscipit eaque. Aut doloribus sapiente corrupti voluptas quia. Temporibus fugit ducimus molestias quia laboriosam possimus. Non aut aut facere consectetur est qui corporis. Enim fuga excepturi qui. Facilis qui animi atque nobis ut. Eos laudantium consequatur omnis assumenda reiciendis minus. Dolor laborum repellendus voluptatem tempore.','Esse vitae aut sapiente. Itaque iure quo dolore in aliquid. Officia et blanditiis suscipit aperiam perspiciatis magnam.','Flexible','Voluntari','9990 euros/mes',9,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(33,5,'Slot Key Person','Sed reprehenderit recusandae voluptatem. Dicta dolorem voluptas harum nulla. Repellendus voluptas ea ullam accusamus eos. Non aliquid accusantium deleniti dolor vel. Voluptates iusto necessitatibus sit accusamus iste aut esse. Aut dolores modi autem est. Consequatur voluptatem neque facere et maxime est aliquam. Repellat amet maiores voluptatem error repellat. Magnam qui praesentium delectus at. Itaque sunt quibusdam optio dicta qui ratione.','Sed quasi voluptas ut quo eum praesentium. Repellendus iste fuga ut sequi voluptatem ullam. Quis aut tenetur recusandae quis quidem et eaque.','Complerta','Voluntari','8401 euros/mes',2,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(34,3,'Claims Examiner','Voluptatem voluptatem rerum deleniti consequuntur illo. Sapiente aliquam dolorum adipisci optio voluptas. Placeat optio dolor et ut. Quia voluptatem perspiciatis eos aut. Omnis ut dolores sit qui maxime praesentium. Et quas fugiat sed tempore et nihil laudantium. Quibusdam aspernatur earum pariatur laborum aut perferendis sed quos. Ea natus et consequuntur aspernatur ut autem nulla. Deleniti iste vel ea quos impedit quidem. Aspernatur inventore veniam id sint neque quidem.','Saepe aut corrupti ratione dolor et. Possimus nemo aut exercitationem itaque autem nemo. Ut rerum ipsam beatae omnis dolores.','Complerta','Pràctiques','7449 euros/mes',1,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(35,1,'Animal Care Workers','In unde adipisci quas tempora illo. Commodi eum nobis sapiente. Incidunt voluptatum et corporis beatae. Sapiente in sit ea vero eos. Modi molestiae reiciendis reiciendis quo ratione rerum labore quaerat. Optio at odit ratione repellat natus. Ut voluptates et sit animi delectus maxime corporis. Porro expedita quaerat non natus. Ipsum commodi fugit iusto consequuntur quis omnis rerum. Aut omnis est corrupti eos et.','Sed et necessitatibus accusamus ut earum ea. Veniam nesciunt non optio hic saepe eveniet. Sed omnis suscipit tempore maxime nihil neque ratione dolorem.','Complerta','Voluntari','7098 euros/mes',10,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(36,4,'Law Enforcement Teacher','Ut cumque illum rerum hic. Magni ad voluptatem asperiores aspernatur commodi. Sit et eligendi maxime voluptates similique et. Ipsam tempore consequatur voluptas omnis sit ea est. Magni neque nisi ut officia ut aliquid non. Corrupti molestiae velit nostrum exercitationem sed asperiores. Voluptatem voluptatem eum sed fuga. Minus corporis amet sunt sit sit. In explicabo quia et in odit. Voluptas ab et eveniet iure dolorum dicta.','Est quod laborum dolorum voluptatem. Beatae illo qui dolores et ex officia. Placeat dolores reiciendis molestiae exercitationem occaecati dolorem. Non quis corporis quo suscipit eaque quia et aut.','Flexible','Conveni','8518 euros/mes',5,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(37,2,'Illustrator','Non eius voluptas assumenda adipisci. Blanditiis eius qui quisquam eum et. Consectetur facere esse nihil consequuntur nisi. Accusamus accusamus ea laboriosam dolor consequuntur modi. Non laboriosam laudantium fuga maxime ullam rerum. Temporibus ullam odio tempore. Vitae unde architecto officia laborum. Et fugiat numquam qui et laborum ex deserunt repellendus. Ut ducimus id facere est enim. Voluptatum dolorum delectus in dolorem nemo omnis fugit.','Eius qui voluptas ut qui ullam. Molestias dolore aut libero et quam est fuga. Praesentium exercitationem quis consequuntur tenetur recusandae est et.','Flexible','Conveni','1704 euros/mes',10,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(38,4,'Environmental Science Teacher','Modi modi cupiditate commodi voluptates dolorum. Et officiis dicta ipsa qui culpa ut est nostrum. Voluptatum illo incidunt tempora nobis. Magnam itaque architecto omnis soluta nam ullam. Blanditiis sunt reiciendis vel quidem aut fugit sint. Omnis sit deleniti rerum minima. Est animi velit quo. Natus est repudiandae similique adipisci et. Adipisci ipsam dolore hic fugit numquam. Et nostrum necessitatibus voluptatem itaque praesentium.','Dolorem pariatur omnis excepturi consequatur sit beatae. Sunt exercitationem enim architecto fuga. Officia at sunt eaque qui quisquam.','Flexible','Conveni','6811 euros/mes',4,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(39,4,'Farm Equipment Mechanic','Ea in voluptas culpa quia aut ea. Voluptates tenetur voluptatem nulla esse. Amet ad rerum id delectus facere amet. Temporibus quas ad illum. Ullam praesentium magnam et qui blanditiis commodi. Molestiae sint est quia quia. Molestias deleniti quia est ipsa ut ipsa aut voluptas. Quia deserunt provident et qui optio labore consequatur. Fugit ipsa exercitationem voluptas quam. Consequatur saepe maxime voluptates aut. Et et voluptatem nulla rem in doloremque.','Repellendus incidunt corrupti possimus doloremque qui molestias. Reiciendis a odio dolorum voluptatibus sapiente velit. Et non id laborum et.','Flexible','Indefinit','7111 euros/mes',5,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(40,5,'Oil and gas Operator','Odio eos est reiciendis voluptatem. Sunt quos perspiciatis quia in modi voluptatibus. Sint voluptate non voluptates et aut. Sapiente blanditiis dolor eligendi velit repellendus. Ea eius aut illo eum. Perspiciatis corporis hic ullam quibusdam iste in omnis voluptatibus. Culpa quis et blanditiis aliquam reiciendis consectetur rerum repellat. Quo sed ut dolores aperiam quos ullam et. Sed exercitationem consectetur sit sunt aliquam inventore corporis.','Incidunt ut repudiandae tempore tempora deleniti. Illo minima odio a voluptates. Aut rerum nam et et ex omnis. At tempora dolor fugit omnis. Quis consequuntur expedita ut nihil est quidem.','Complerta','Pràctiques','4491 euros/mes',1,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(41,2,'Calibration Technician OR Instrumentation Technician','Expedita sint voluptatem quaerat autem dicta tenetur. A eligendi est earum minus cumque. Magnam molestiae asperiores eum sed consequuntur. Soluta vero et reiciendis mollitia omnis. Velit deserunt unde praesentium dolorem soluta tempore. Natus nihil eos eos maiores labore voluptatem voluptas mollitia. Eius tenetur aut occaecati labore unde iusto. Et delectus explicabo qui a velit nobis. Est et voluptas dolores rerum assumenda. Alias provident sint nihil pariatur iusto enim molestiae.','Eligendi est beatae reprehenderit eligendi dolorum. Et magnam ex animi aperiam commodi. Ipsa consequatur quo voluptates maxime qui. Consectetur quis labore fuga. Facilis et in totam consequuntur non.','Parcial','Indefinit','2451 euros/mes',3,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(42,5,'Legal Secretary','Sit consequuntur quibusdam ut modi voluptas. Totam voluptate ex est ipsam aut qui sit. Quis impedit id aspernatur est cumque. Consequatur dignissimos dolor aspernatur asperiores temporibus impedit ducimus est. Numquam perferendis soluta quam inventore. Rerum fugiat sed dolor. Debitis rem quas corporis dicta reiciendis aut commodi. Blanditiis porro officiis recusandae non illum enim.','Qui molestiae assumenda perferendis. Porro esse est earum odio. Quia beatae sequi molestiae enim.','Flexible','Pràctiques','2688 euros/mes',5,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(43,3,'Substation Maintenance','Totam laudantium illum deleniti et sed. Animi sunt officiis exercitationem vitae tempora. Similique rerum aut ut magnam. Dolores qui quod aperiam maiores deserunt. Praesentium assumenda ipsam ut quasi consequatur. Autem quasi enim sit molestiae molestiae commodi voluptas omnis. Autem officia eum et aut perspiciatis et. Accusantium voluptas nihil est expedita possimus.','In mollitia quos dignissimos. Ut sed minima reiciendis qui. Ut perspiciatis quos aspernatur.','Complerta','Voluntari','7924 euros/mes',9,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(44,3,'Biochemist or Biophysicist','Delectus earum saepe omnis quia ipsam. Quis sunt maiores eum ad. Ab ea est tenetur at autem magni debitis. Velit qui sed ab fuga reiciendis saepe. Possimus sequi iure saepe et et aliquam dignissimos. Fugiat mollitia tempore voluptas quo et et nam. Dolor veniam dolores repellat deserunt delectus numquam. Odio natus consequatur illo delectus. Perspiciatis placeat omnis beatae commodi est ea qui. Sint numquam quidem magni ipsam libero tempora voluptas.','Provident modi neque et pariatur inventore eos odio. Quae aut quaerat ut dolores minus. Ut nobis non molestiae cumque aut placeat. Esse dolorem iste nihil repellendus id delectus dolore.','Parcial','Indefinit','4648 euros/mes',7,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(45,3,'Materials Scientist','Unde aliquam aliquam eaque voluptatem eum omnis dicta vel. Dolor fugit dolor suscipit doloribus magni ipsam. Explicabo consequuntur eveniet placeat repellat. Ut eveniet excepturi tempora possimus. Facere rem aspernatur quam occaecati delectus et. Et quaerat tenetur ullam odit similique aliquam magni. Ea autem culpa et hic harum architecto mollitia.','Voluptatibus quos et qui quam et. Quibusdam qui nemo magni possimus amet saepe dicta. Consectetur perspiciatis quo id soluta ipsam. Ut voluptatem sit eligendi eligendi.','Parcial','Indefinit','9232 euros/mes',10,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(46,2,'Network Systems Analyst','Quod iure quae fuga. Laudantium quisquam fugiat necessitatibus rerum. Eos eum et ut qui mollitia neque. Repudiandae velit architecto sapiente. Est vitae adipisci ut voluptatibus deserunt molestiae a. Occaecati fugit esse quaerat vel quis. Soluta asperiores accusantium eos. Repudiandae adipisci est atque. Eligendi et sed accusantium amet. Tempore hic facere explicabo illo repudiandae. Reiciendis non dignissimos sed.','Odio nobis ut quo accusamus voluptatem tempora doloribus. Quis consectetur est porro qui. Consectetur aperiam facere dolorem qui. Incidunt magnam vel accusamus molestias omnis saepe.','Parcial','Indefinit','7943 euros/mes',7,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(47,2,'Board Of Directors','Atque sed aliquid distinctio sunt. Exercitationem ea repellat cum. Veniam praesentium est qui saepe nulla iure. Dolorem omnis expedita reiciendis et aliquam illo. Qui tenetur accusamus tempore non deleniti. Modi libero non omnis laudantium placeat et. Corporis molestiae architecto sed voluptas. Dolor aliquid est non. Non veniam inventore beatae commodi vel omnis expedita. Earum nihil aspernatur aut veniam et. Repellendus sapiente non ipsa necessitatibus aut nihil amet.','Cupiditate unde nihil commodi maiores nihil omnis optio. Minus saepe culpa consequatur dignissimos enim. Dolorum qui et quo odit non eum.','Parcial','Indefinit','8951 euros/mes',4,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(48,4,'Talent Director','Repellendus suscipit voluptate porro ducimus natus nesciunt. Et iste ipsa illum. Natus excepturi amet dolorem. Omnis nihil ducimus soluta magni. Accusamus error quasi rerum cum minima quis. Aliquam exercitationem quis occaecati eaque vel et. Nulla eos possimus aut ut. Consectetur assumenda asperiores cum officia aut consequatur. Neque quia quia sapiente voluptas.','Ex cumque incidunt natus porro. Ex aut libero exercitationem aut perferendis nesciunt reprehenderit. Praesentium est impedit molestiae accusantium sapiente.','Flexible','Conveni','5934 euros/mes',7,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(49,1,'Materials Scientist','Nostrum debitis aut qui eveniet nesciunt. Laborum odit consequatur ut placeat perferendis quasi ratione. Facere est sequi molestiae ullam placeat sed quibusdam. Velit saepe harum eos magni omnis itaque et. Voluptate nisi id voluptates laborum eveniet voluptatem voluptatem. Ratione aspernatur cupiditate commodi error aperiam voluptatem sunt. Ipsa ut eveniet reiciendis. Sint inventore corporis earum ut velit sed autem. Sed vel nulla at unde dolores.','Veniam itaque deleniti dolore exercitationem. Numquam eum ut qui eos. Ea veniam rerum facere distinctio veritatis quos voluptate. Totam et quaerat qui nam et et error.','Flexible','Conveni','3 euros/mes',7,'2021-01-19 14:36:17','2021-01-19 14:36:17');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `other_studies_alumnes`
--

DROP TABLE IF EXISTS `other_studies_alumnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `other_studies_alumnes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumne_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `other_studies_alumnes_alumne_id_foreign` (`alumne_id`),
  CONSTRAINT `other_studies_alumnes_alumne_id_foreign` FOREIGN KEY (`alumne_id`) REFERENCES `alumnes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `other_studies_alumnes`
--

LOCK TABLES `other_studies_alumnes` WRITE;
/*!40000 ALTER TABLE `other_studies_alumnes` DISABLE KEYS */;
/*!40000 ALTER TABLE `other_studies_alumnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2021-01-19 14:36:16','2021-01-19 14:36:16'),(2,'alumne','2021-01-19 14:36:16','2021-01-19 14:36:16'),(3,'empresa','2021-01-19 14:36:16','2021-01-19 14:36:16');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studies`
--

DROP TABLE IF EXISTS `studies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studies`
--

LOCK TABLES `studies` WRITE;
/*!40000 ALTER TABLE `studies` DISABLE KEYS */;
INSERT INTO `studies` VALUES (1,'Assistència al Producte Gràfic Interactiu (APGI)','2021-01-19 14:36:17','2021-01-19 14:36:17'),(2,'Autoedició','2021-01-19 14:36:17','2021-01-19 14:36:17'),(3,'Conducció d\'Activitats FísicoEsportives en el Medi Natural (CAFEMN)','2021-01-19 14:36:17','2021-01-19 14:36:17'),(4,'Gràfica Interactiva (GI)','2021-01-19 14:36:17','2021-01-19 14:36:17'),(5,'Gràfica Publicitària (GP)','2021-01-19 14:36:17','2021-01-19 14:36:17'),(6,'Condicionament Físic (CF) / AAFE Fitness & Wellness','2021-01-19 14:36:17','2021-01-19 14:36:17'),(7,'Ensenyament i Animació Socioesportiva (EAS) / AAFE Outdoor','2021-01-19 14:36:17','2021-01-19 14:36:17'),(8,'Projectes i Direcció d\'Obres de Decoració','2021-01-19 14:36:17','2021-01-19 14:36:17'),(9,'ASI','2021-01-19 14:36:17','2021-01-19 14:36:17'),(10,'DAI','2021-01-19 14:36:17','2021-01-19 14:36:17'),(11,'Secretariat','2021-01-19 14:36:17','2021-01-19 14:36:17');
/*!40000 ALTER TABLE `studies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_alumnes`
--

DROP TABLE IF EXISTS `survey_alumnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_alumnes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Q1_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q1_text` text COLLATE utf8mb4_unicode_ci,
  `Q2_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q2_text` text COLLATE utf8mb4_unicode_ci,
  `Q3_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q3_text` text COLLATE utf8mb4_unicode_ci,
  `Q4_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q4_text` text COLLATE utf8mb4_unicode_ci,
  `Q5` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_alumnes`
--

LOCK TABLES `survey_alumnes` WRITE;
/*!40000 ALTER TABLE `survey_alumnes` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_alumnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_empresas`
--

DROP TABLE IF EXISTS `survey_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `survey_empresas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Q1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q2_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q2_text` text COLLATE utf8mb4_unicode_ci,
  `Q3_Coneixements` int NOT NULL,
  `Q3_Experience` int NOT NULL,
  `Q3_Soft_skills` int NOT NULL,
  `Q3_text` text COLLATE utf8mb4_unicode_ci,
  `Q4_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q4_text` text COLLATE utf8mb4_unicode_ci,
  `Q5_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Q5_Si_text` text COLLATE utf8mb4_unicode_ci,
  `Q5_No_text` text COLLATE utf8mb4_unicode_ci,
  `Q6` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_empresas`
--

LOCK TABLES `survey_empresas` WRITE;
/*!40000 ALTER TABLE `survey_empresas` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin@test.com',NULL,NULL,1,'$2y$10$t7QWVR7bJSWvT0ftsGImHefB8DIl4Vb5VUejg.ttTCucABb/ZMdAO',NULL,'2021-01-19 14:36:16','2021-01-19 14:36:16'),(2,3,'brad67@yahoo.com',NULL,NULL,1,'$2y$10$zEqenyjMX4rkho1KRXyVV.qNKuz1P15P88BU9xBRePSZJVQoiT.Fy',NULL,'2021-01-19 14:36:16','2021-01-19 14:36:16'),(3,3,'jankunding@hotmail.com',NULL,NULL,1,'$2y$10$OTKvU4X0/EzCopAySAsBJuADAsAmD.aqRx69aTUZKTTT05LwP1COK',NULL,'2021-01-19 14:36:16','2021-01-19 14:36:16'),(4,2,'domenic29@hotmail.com',NULL,NULL,1,'$2y$10$N6nYi8FSf/fpZNv4/K/kvuf4BmJ/zunoqbjpWs6ktCkF/99pYCDcG',NULL,'2021-01-19 14:36:16','2021-01-19 14:36:16'),(5,2,'major61@hotmail.com',NULL,NULL,1,'$2y$10$yql4n1h4PhGtKqu3YmjoHeoOLqMYEh56Wg5oG8rhcZgtsMjSogeoK',NULL,'2021-01-19 14:36:16','2021-01-19 14:36:16'),(6,3,'krystel18@bechtelar.info',NULL,NULL,1,'$2y$10$IHwMLkCWyHChGbBTxw81DOEt8NzHv64SxsqPtd17Kknvh/8nlzcoy',NULL,'2021-01-19 14:36:16','2021-01-19 14:36:16'),(7,2,'marcellus.volkman@hotmail.com',NULL,NULL,1,'$2y$10$7BEdiQxUxHVNe5aIEigI4eFWfB50pxHJR29IzmRzXiTcC7qmlDpXu',NULL,'2021-01-19 14:36:16','2021-01-19 14:36:16'),(8,2,'brielle.kemmer@yahoo.com',NULL,NULL,1,'$2y$10$gbhE40jNY1EvuEBq51JzieGNpoTz35TKyB/A5jYBPUlGcoLRgOOUW',NULL,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(9,3,'qkohler@carter.com',NULL,NULL,1,'$2y$10$myh/jbY0xx12iUHH/G0UzeX7gMLjxuAnq2VU03.HCcYC2aG8eYKdW',NULL,'2021-01-19 14:36:17','2021-01-19 14:36:17'),(10,3,'vrodriguez@bergnaum.biz',NULL,NULL,1,'$2y$10$1Z1PkdS.9lociZR9K6Hlg.gx/JAfKrQtMpH24WzhoR/bWroGYcC0i',NULL,'2021-01-19 14:36:17','2021-01-19 14:36:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-19 16:38:43
