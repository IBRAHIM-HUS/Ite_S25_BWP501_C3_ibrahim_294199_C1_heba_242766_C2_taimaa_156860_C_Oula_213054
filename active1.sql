-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 مايو 2026 الساعة 22:57
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `active1`
--

-- --------------------------------------------------------

--
-- بنية الجدول `evente`
--

CREATE TABLE `evente` (
  `id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` varchar(70) NOT NULL,
  `location` varchar(70) NOT NULL,
  `event_date` varchar(70) NOT NULL,
  `image` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `evente`
--

INSERT INTO `evente` (`id`, `title`, `description`, `category`, `location`, `event_date`, `image`) VALUES
(1, 'معرض دمشق', 'يعتبر معرض دمشق الدولي للكتاب تظاهرة ثقافية ومعرفية رائدة، تعود لتؤكد دور دمشق التاريخي كمنارة للعلم والأدب. في هذه الدورة الاستثنائية، يتحول المعرض إلى ملتقى فكري يجمع بين عبق التراث وتطلعات المستقبل، بمشاركة مئات دور النشر المحلية والعربية والدولية', 'تعلم', 'دار ابن كثير - سانا', '2026-06-02', 'bookfair'),
(2, 'مسابقة دمشق تقرأ', '\"دمشق تقرأ: مبادرة ثقافية تنطلق من قلب أقدم عاصمة مأهولة، لتعيد صياغة علاقتنا بالكتاب. في زوارق الحروف، نبحر معاً لنحيي طقوس القراءة في بيوتنا وشوارعنا العريقة. تهدف المسابقة إلى خلق جيلٍ قارئ، يحلل الأفكار ويبني المستقبل بالمعرفة. سواء كنت من محبي ا', 'ثقافة أدب', 'دمشق - جميع مدارس دمشق', '', 'read'),
(3, 'معرض HiTech 2026', 'عتبر معرض HiTech المنصة التكنولوجية الأبرز في سوريا، حيث يجتمع تحت سقفه نخبة من المبرمجين، المهندسين، الشركات الناشئة، وكبرى شركات الاتصالات وتكنولوجيا المعلومات. يهدف المعرض إلى تسليط الضوء على أحدث القفزات التقنية في مجالات البرمجيات، والحلول الذكي', 'تقني', 'مدينة المعارض القديمة (أو مدينة المعارض الجديدة على طريق المطار)', '2026-05-06', 'hitech'),
(4, 'ماراثون الياسمين الدولي', 'يعد ماراثون الياسمين الدولي تظاهرة رياضية واجتماعية كبرى تهدف إلى إعادة إحياء الروح الرياضية في قلب العاصمة السورية دمشق. يجمع هذا الحدث بين الرياضيين المحترفين والهواة من مختلف الفئات العمرية والجنسيات، ليرسموا معاً لوحة من الأمل والإصرار ', 'رياضة', 'الموقع: دمشق - مدينة الجلاء الرياضية\r\n\r\n', '2026-09-19', 'marathon'),
(6, 'بطولة سوريا غيمنغ (Syria Gaming Championship 2026)', 'تعتبر بطولة سوريا غيمنغ الحدث الأكبر والأضخم لمجتمع اللاعبين في المنطقة، حيث يتحول المكان إلى ساحة معارك رقمية مليئة بالإثارة والاحتراف. تهدف هذه الفعالية إلى جمع أفضل \"الغيمنز\" للتنافس في أشهر الألعاب العالمية على منصات الموبايل، الحاسوب، والكونسول.', 'ترفيهي', 'صالة الفيحاء الرياضية', '2026-05-27', 'digital'),
(7, 'أصالة الشهباء', 'تعتبر هذه الرحلة بمثابة سفر عبر الزمن داخل قلعة حلب، أقدم وأكبر القلاع في العالم. تهدف الفعالية إلى تسليط الضوء على العمارة العسكرية الإسلامية والبيزنطية، ومنح الزوار فرصة للتعرف على أسرار هذا الحصن الذي صمد لآلاف السنين.', 'سياحي', 'حلب', '2026-06-22', 'aleppo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evente`
--
ALTER TABLE `evente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evente`
--
ALTER TABLE `evente`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
