-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-22 15:56:31
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umldb`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `article_id` int(32) NOT NULL,
  `article_num` int(32) DEFAULT NULL,
  `article_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_editor` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文',
  `zan_num` int(32) DEFAULT NULL,
  `grade` float(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`article_id`, `article_num`, `article_title`, `article_editor`, `url`, `create_time`, `update_time`, `language`, `zan_num`, `grade`) VALUES
(1, NULL, '·Genome sequence of the nematode C. elegans: a platform for investigating biology.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/9851916', '2016-11-18 00:00:00', '2016-11-18 00:00:00', 0, 7, 0),
(2, NULL, '·Genome sequence of the metazoan plant-parasitic nematode Meloidogyne incognita.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/18660804', '2016-11-18 00:00:00', '2016-11-18 00:00:00', 0, 2, 0),
(3, NULL, '·A lover and a fighter: the genome sequence of an entomopathogenic nematode Heterorhabditis bacteriophora.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/23874975', '2016-11-18 00:00:00', '2016-11-18 00:00:00', 0, 20, 0),
(4, NULL, '·The genome of the blood fluke Schistosoma mansoni.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/19606141', '2016-11-18 00:00:00', '2016-11-18 00:00:00', 0, 0, 0),
(5, NULL, '·Soil-transmitted helminth infections: ascariasis, trichuriasis, and hookworm.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/16679166', '2015-11-18 00:00:00', '2015-11-18 00:00:00', 0, 0, 0),
(6, NULL, '·The genome and life-stage specific transcriptomes of Globodera pallida elucidate key aspects of plant parasitism by a cyst nematode.', NULL, 'www.ncbi.nlm.nih.gov/pubmed/24580726', '2015-11-18 00:00:00', '2015-11-18 00:00:00', 0, 0, 0),
(7, NULL, '·How to become a parasite –lessons from the genomes of nematodes.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/19361881', '2015-11-18 00:00:00', '2015-11-18 00:00:00', 0, 1, 0),
(8, NULL, '·Draft genome of the filarial nematode parasite Brugia malayi.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/17885136', '2015-11-18 00:00:00', '2015-11-18 00:00:00', 0, 1, 0),
(9, NULL, '·Impact of Leishmania metalloprotease GP63 on macrophage signaling.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/22919663', '2015-11-18 00:00:00', '2015-11-18 00:00:00', 0, 0, 0),
(10, NULL, '·Large, rapidly evolving gene families are at the forefront of host-parasite interactions in Apicomplexa.', NULL, 'http://www.ncbi.nlm.nih.gov/pubmed/25257746', '2015-11-18 00:00:00', '2015-11-18 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `biology`
--

CREATE TABLE `biology` (
  `biology_id` int(32) NOT NULL,
  `biology_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `info` text COLLATE utf8_unicode_ci,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `biology`
--

INSERT INTO `biology` (`biology_id`, `biology_name`, `info`, `language`) VALUES
(1, '螺', '螺科是软体动物门腹足纲之下的一个科，前腮亚目原始腹足目的一个科。贝壳近球形或半球形，壳质较厚，螺旋部低小，体螺层膨大，表面具螺肋或平滑。壳口半月形或卵圆形，内唇滑层宽厚，中部常具齿刻或平滑无齿;厣石灰质，半圆形。主要分布于热带和亚热带，栖息于潮间带岩礁质海底，有的种类栖息于少量海水注入的河口区或小溪中。主要以海藻为食，也吃食其他小动物。在中国已发现40种左右，分布于东南部海域。', 0),
(2, '蚊媒', '按蚊属通称按蚊。广布全世界，已知近450种和亚种，分归于6个亚属，但中国仅有按蚊亚属和塞蚊亚属，共约60种和亚种。中国按蚊在疾病传播上较为重要的有按蚊亚属的雷氏嗜人按蚊和中华按蚊，以及塞蚊亚属的微小按蚊和大劣按蚊。', 0),
(3, '病原体', '病原体（pathogens）指可造成人或动植物感染疾病的微生物（包括细菌、病毒、立克次氏体、寄生虫、真菌）或其他媒介（微生物重组体包括杂交体或突变体）。', 0),
(4, 'Spiral Shell', 'A seashell or sea shell, also known simply as a shell, is a hard, protective outer layer created by an animal that lives in the sea. The shell is part of the body of the animal. Empty seashells are often found washed up on beaches by beachcombers. The shells are empty because the animal has died and the soft parts have been eaten by another animal or have rotted out.\r\n\r\nThe term seashell usually refers to the exoskeleton of an invertebrate (an animal without a backbone). Most shells that are found on beaches are the shells of marine mollusks, partly because many of these shells endure better than other seashells.\r\n\r\nApart from mollusk shells, other shells that can be found on beaches are those of barnacles, horseshoe crabs and brachiopods. Marine annelid worms in the family Serpulidae create shells which are tubes made of calcium carbonate that are cemented onto other surfaces. The shells of sea urchins are called tests, and the moulted shells of crabs and lobsters are called exuviae. While most seashells are external, some cephalopods have internal shells.\r\n\r\nSeashells have been used by humans for many different purposes throughout history and pre-history. However, seashells are not the only kind of shells; in various habitats, there are shells from freshwater animals such as freshwater mussels and freshwater snails, and shells of land snails.', 1),
(5, 'Mosquito', 'Mosquitoes are small, midge-like flies that constitute the family Culicidae. Females of most species are ectoparasites, whose tube-like mouthparts (called a proboscis) pierce the hosts'' skin to consume blood. The word "mosquito" (formed by mosca and diminutive -ito)[2] is Spanish for "little fly".[3] Thousands of species feed on the blood of various kinds of hosts, mainly vertebrates, including mammals, birds, reptiles, amphibians, and even some kinds of fish. Some mosquitoes also attack invertebrates, mainly other arthropods. Though the loss of blood is seldom of any importance to the victim, the saliva of the mosquito often causes an irritating rash that is a serious nuisance. Much more serious though, are the roles of many species of mosquitoes as vectors of diseases. In passing from host to host, some transmit extremely harmful infections such as malaria, yellow fever, Chikungunya, West Nile virus, dengue fever, filariasis, Zika virus and other arboviruses, rendering it the deadliest animal family in the world.', 1),
(6, 'Pathogen', 'In biology, a pathogen (Greek: πάθος pathos "suffering, passion" and -γενής -genēs "producer of") in the oldest and broadest sense is anything that can produce disease; the term came into use in the 1880s.[1][2] Typically the term is used to describe an infectious agent such as a virus, bacterium, prion, a fungus, or even another micro-organism.[3][4]\r\n\r\nThere are several substrates including pathways where the pathogens can invade a host. The principal pathways have different episodic time frames, but soil contamination has the longest or most persistent potential for harboring a pathogen. Diseases caused by organisms in humans are known as pathogenic diseases.', 1);

-- --------------------------------------------------------

--
-- 表的结构 `inform`
--

CREATE TABLE `inform` (
  `inform_id` int(32) NOT NULL,
  `inform_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `inform_content` text COLLATE utf8_unicode_ci,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `inform`
--

INSERT INTO `inform` (`inform_id`, `inform_title`, `create_time`, `update_time`, `inform_content`, `language`) VALUES
(1, '通知1', '2016-11-17 05:24:24', '2016-11-17 06:00:00', '通知内容1', 0),
(2, '通知22', '2016-11-19 08:52:36', '2016-11-19 08:52:36', '通知通知通知通知通知通知通知通知通知通知2222222222222222222', 0);

-- --------------------------------------------------------

--
-- 表的结构 `item_team`
--

CREATE TABLE `item_team` (
  `item_id` int(32) NOT NULL,
  `team_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `meeting`
--

CREATE TABLE `meeting` (
  `meeting_id` int(32) NOT NULL,
  `meeting_year` date NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `meeting_name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meeting_info` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic_url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `news_id` int(32) NOT NULL,
  `news_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime NOT NULL,
  `news_content` text COLLATE utf8_unicode_ci,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文',
  `zan_num` int(32) DEFAULT NULL,
  `grade` float(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `create_time`, `update_time`, `news_content`, `language`, `zan_num`, `grade`) VALUES
(47, '新闻1', '2016-11-19 09:13:23', '2016-11-19 09:13:23', '新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1新闻1', 0, 8, 0),
(48, '新闻2', '2016-11-19 09:13:35', '2016-11-19 09:13:35', '新闻2新闻2新闻2新闻2新闻2新闻2新闻2新闻2新闻2新闻2新闻2新闻2', 0, 4, 0),
(49, '新闻3', '2016-11-19 09:16:26', '2016-11-19 09:16:26', '新闻3新闻3新闻3新闻3新闻3新闻3新闻3新闻3新闻3新闻3新闻3新闻3新闻3新闻3', 0, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `person`
--

CREATE TABLE `person` (
  `person_id` int(32) NOT NULL,
  `person_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `person_info` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `person_direction` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `person_achievement` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `project_id` int(32) NOT NULL,
  `info` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `pic_url` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `species`
--

CREATE TABLE `species` (
  `species_id` int(32) NOT NULL,
  `species_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `biology_id` int(32) NOT NULL,
  `info` text COLLATE utf8_unicode_ci,
  `pic_url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `species`
--

INSERT INTO `species` (`species_id`, `species_name`, `biology_id`, `info`, `pic_url`, `language`) VALUES
(1, '藁杆双脐螺', 1, '藁杆双脐螺（学名：Biomphalaria straminea）为扁蜷螺科双脐螺属的动物。分布于巴西以及中国大陆的香港、深圳等地，一般生活于池塘、小水渠以及水流较缓的河流沿岸。', 'pics/species/1.jpg', 0),
(2, '福寿螺', 1, '福寿螺，瓶螺科瓶螺属软体动物，外观与田螺极其相似，个体大、食性广、适应性强、生长繁殖快、产量高。食用未充分加热的福寿螺，可能引起广州管圆线虫等寄生虫在人体内感染。1981年引入中国，目前已被列入中国首批外来入侵物种。', 'pics/species/2.jpg', 0),
(3, '褐云玛瑙螺', 1, '非洲大蜗牛（学名：Achatina fulica）是中大型的陆栖蜗牛。成体壳长一般为7～8厘米，最大则可长到超过20厘米。夜行性，杂食性，大多是在潮湿环境中活动，喜欢在下雨及夜间出没。平时躲在阴凉的地方，且在壳口上做一层白膜（假口盖），只余一个小孔来呼吸，将螺肉缩入壳内以防脱水，等到环境转好后再出来。', 'pics/species/3.jpg', 0),
(4, '白纹伊蚊', 2, '白纹伊蚊（学名：Aedes albopictus，英文名称：Aedes albopictus）也被称为亚洲虎蚊，属于长角亚目蚊科，中等大小的黑色蚊虫，上面并具由白色鳞片形成的斑纹，白纹伊蚊源于东南亚，是东南亚和中国的常见蚊种。', 'pics/species/4.jpg', 0),
(5, '埃及伊蚊', 2, '埃及伊蚊是引发“登革热”的祸首。2006年9月，海口港检验检疫办事处人员在对一艘入境的越南籍船舶实施卫生监督时，发现船尾甲板上的一只旧铁桶内有积水，里头有大量幼蚊、虫卵及幼虫。工作人员及时对这些幼蚊进行蚊种技术鉴定，证实了这些虫子是传播“登革热”的主要生物媒介。', 'pics/species/5.jpg', 0),
(6, '锥虫', 3, '锥虫是一种血鞭毛原虫，约有20几种。寄生于鱼类、两栖类、爬虫类、鸟类、哺乳类以及人的血液或组织细胞内。寄生于人的锥虫依其感染途径可分为两大类，即通过唾液传播的涎源性锥虫与通过粪便传播的粪源性锥虫。由锥虫属的原虫引起的一种鞭毛虫病。', 'pics/species/6.jpg', 0),
(7, '疟原虫', 3, '疟原虫为按蚊传播的孢子虫，是疟疾（malaria）的病原体。寄生于人体的疟原虫有四种，即间日疟原虫（Plasmodium vivax Grassi & Feletti,1890）、三日疟原虫（Plasmodium malariae Laveran,1881）、恶性疟原虫（Plasmodium falciparum Welch,1897）和卵形疟原虫（Plasmodium ovale Stephens，1922）。', 'pics/species/7.jpg', 0),
(8, '血吸虫', 3, '血吸虫也称裂体吸虫（schistosoma）。血吸虫寄生于多数脊椎动物，卵穿过静脉壁进入膀胱，随尿排出。幼虫在中间宿主螺类(主要为Bulinus属和Physopsis属)体内发育。成熟幼虫通过皮肤或口进入终宿主体内。', 'pics/species/8.jpg', 0),
(9, 'Biomphalaria straminea', 4, 'Biomphalaria straminea is a species of air-breathing freshwater snail, an aquatic pulmonate gastropod mollusk in the family Planorbidae, the ram''s horn snails.\r\n\r\nThis snail is a medically important pest, because an intermediate host for the parasite Schistosoma mansoni and a vector of schistosomiasis.\r\n\r\nThe history of these discoveries was summarized by Paraense (2001).\r\n\r\nThe shell of this species, like all planorbids is sinistral in coiling, but is carried upside down and thus appears to be dextral.\r\n', 'pics/species/1.jpg', 1),
(10, 'Pomacea', 4, 'Pomacea is a genus of freshwater snails with gills and an operculum, aquatic gastropod mollusks in the family Ampullariidae, the apple snails. The genus is native to the Americas; most species in this genus are restricted to South America.\r\n\r\nin the aquarium trade these snails are sometimes called Pomacea or incorrectly Ampullarius, and in English as "[color] mystery snail" or "apple snail".\r\n\r\nSome species have been introduced outside their native range and are considered invasive because of their voracious appetite for plants. Because of this, imports involving this genus are restricted in some regions (including the United States) and are entirely banned in others (including the EU).\r\n', 'pics/species/2.jpg', 1),
(11, 'Achatina fulica', 4, 'Achatina fulica is a species of large land snail that belong in the Achatinidae family. It is also famously known as the giant African snail or giant African land snail. This snail species has been considered a significant cause in pest issues around the world. Internationally, it is the most frequently occurring type of snail invasive species.\r\n\r\nOutside of its native range this snail thrives in many types of habitat in areas with mild climates. It feeds voraciously and is a vector for plant pathogens, causing severe damage to agricultural crops and native plants. It competes with native snail taxa, is a nuisance pest of urban areas, and spreads human disease. This snail is listed as one of the top 100 invasive species in the world.\r\n', 'pics/species/3.jpg', 1),
(12, 'Aedes albopictus', 5, 'Aedes albopictus (Stegomyia albopicta), from the mosquito (Culicidae) family, also known as (Asian) tiger mosquito or forest mosquito, is a mosquito native to the tropical and subtropical areas of Southeast Asia; however, in the past few decades, this species has spread to many countries through the transport of goods and international travel. It is characterized by its black-and-white-striped legs, and small black-and-white-striped body.\r\n\r\nThis mosquito has become a significant pest in many communities because it closely associates with humans (rather than living in wetlands), and typically flies and feeds in the daytime in addition to at dusk and dawn. The insect is called a tiger mosquito for its striped appearance, which resembles that of the tiger. Ae. albopictus is an epidemiologically important vector for the transmission of many viral pathogens, including the yellow fever virus, dengue fever, and Chikungunya fever, as well as several filarial nematodes such as Dirofilaria immitis. Aedes albopictus is capable of hosting the Zika virus and is considered a potential vector for Zika transmission among humans.\r\n', 'pics/species/4.jpg', 1),
(13, 'Aedes aegypti', 5, 'Aedes aegypti, the yellow fever mosquito, is a mosquito that can spread dengue fever, chikungunya, Zika fever, and yellow fever viruses, and other diseases. The mosquito can be recognized by white markings on its legs and a marking in the form of a lyre on the upper surface of its thorax. This mosquito originated in Africa, but is now found in tropical and subtropical regions throughout the world. The average wing length of female Ae. aegypti mosquitoes varies greatly (1.67–3.83 mm in a Peruvian habitat).', 'pics/species/5.jpg', 1),
(14, 'Trypanosomatida', 6, 'Trypanosomatida is a group of kinetoplastid protozoans distinguished by having only a single flagellum. The name is derived from the Greek trypano (borer) and soma (body) because of the corkscrew-like motion of some trypanosomatid species. All members are exclusively parasitic, found primarily in insects. A few genera have life-cycles involving a secondary host, which may be a vertebrate, invertebrate or plant. These include several species that cause major diseases in humans.', 'pics/species/6.jpg', 1),
(15, 'Plasmodium', 6, 'Plasmodium is a genus of parasitic protozoa, many of which cause malaria in their hosts. The parasite always has two hosts in its life cycle: a Dipteran insect host and a vertebrate host. Sexual reproduction always occurs in the insect, making it the definitive host.\r\n\r\nThe life-cycles of Plasmodium species involve several different stages both in the insect and the vertebrate host. These stages include sporozoites, which are injected by the insect vector into the vertebrate host''s blood. Sporozoites infect the host liver, giving rise to merozoites and (in some species) hypnozoites. These move into the blood where they infect red blood cells. In the red blood cells, the parasites can either form more merozoites to infect more red blood cells, or produce gametocytes which are taken up by insects which feed on the vertebrate host. In the insect host, gametocytes merge to sexually reproduce. After sexual reproduction, parasites grow into new sporozoites, which move to the insect''s salivary glands, from which they can infect a vertebrate host bitten by the insect.\r\n\r\nThe genus Plasmodium was first described in 1885. It now contains about 200 species, which are spread across the world where both the insect and vertebrate hosts are present. Five species regularly infect humans, while many others infect birds, reptiles, rodents, and various primates.\r\n', 'pics/species/7.jpg', 1),
(16, 'Schistosomiasis', 6, 'Schistosomiasis, also known as snail fever and bilharzia, is a disease caused by parasitic flatworms called schistosomes. The urinary tract or the intestines may be infected. Signs and symptoms may include abdominal pain, diarrhea, bloody stool, or blood in the urine. Those who have been infected a long time may experience liver damage, kidney failure, infertility, or bladder cancer (squamous cell carcinoma). In children, it may cause poor growth and learning difficulty.\r\n\r\nThe disease is spread by contact with fresh water contaminated with the parasites. These parasites are released from infected freshwater snails. The disease is especially common among children in developing countries as they are more likely to play in contaminated water. Other high risk groups include farmers, fishermen, and people using unclean water during daily living. It belongs to the group of helminth infections. Diagnosis is by finding eggs of the parasite in a person''s urine or stool. It can also be confirmed by finding antibodies against the disease in the blood.\r\n\r\nMethods to prevent the disease include improving access to clean water and reducing the number of snails. In areas where the disease is common, the medication praziquantel may be given once a year to the entire group. This is done to decrease the number of people infected and, consequently, the spread of the disease. Praziquantel is also the treatment recommended by the World Health Organization (WHO) for those who are known to be infected.\r\n\r\nSchistosomiasis affected almost 210 million people worldwide as of 2012. An estimated 12,000[to 200,000 people die from it each year. The disease is most commonly found in Africa, as well as Asia and South America. Around 700 million people, in more than 70 countries, live in areas where the disease is common. In tropical countries, schistosomiasis is second only to malaria among parasitic diseases with the greatest economic impact. Schistosomiasis is listed as a neglected tropical disease.\r\n', 'pics/species/8.jpg', 1);

-- --------------------------------------------------------

--
-- 表的结构 `species_article`
--

CREATE TABLE `species_article` (
  `species_id` int(32) NOT NULL,
  `article_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `species_project`
--

CREATE TABLE `species_project` (
  `species_id` int(32) NOT NULL,
  `project_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `team`
--

CREATE TABLE `team` (
  `team_id` int(32) NOT NULL,
  `team_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `direction` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `team_article`
--

CREATE TABLE `team_article` (
  `team_id` int(32) NOT NULL,
  `article_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `team_person`
--

CREATE TABLE `team_person` (
  `team_id` int(32) NOT NULL,
  `person_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `think_data`
--

CREATE TABLE `think_data` (
  `id` int(32) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `think_data`
--

INSERT INTO `think_data` (`id`, `name`) VALUES
(1, 'thinkphp'),
(2, 'ouwj'),
(3, '骚猪');

-- --------------------------------------------------------

--
-- 表的结构 `tool`
--

CREATE TABLE `tool` (
  `tool_id` int(32) NOT NULL,
  `tool_url` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tool_class` int(32) NOT NULL,
  `language` int(8) NOT NULL COMMENT '语言：1为中文，2为英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` int(32) NOT NULL,
  `user_account` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_pwd` varchar(256) CHARACTER SET utf8 NOT NULL,
  `user_class` int(32) NOT NULL,
  `flag` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_name`, `user_pwd`, `user_class`, `flag`) VALUES
(1, 'ouwjouwj', 'ouwjouwj', '123456', 1, 1),
(2, 'ouwjadmin', 'ouwjadmin', '123456', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `biology`
--
ALTER TABLE `biology`
  ADD PRIMARY KEY (`biology_id`);

--
-- Indexes for table `inform`
--
ALTER TABLE `inform`
  ADD PRIMARY KEY (`inform_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `think_data`
--
ALTER TABLE `think_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`user_account`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `biology`
--
ALTER TABLE `biology`
  MODIFY `biology_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `inform`
--
ALTER TABLE `inform`
  MODIFY `inform_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meeting_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- 使用表AUTO_INCREMENT `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `think_data`
--
ALTER TABLE `think_data`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `tool`
--
ALTER TABLE `tool`
  MODIFY `tool_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
