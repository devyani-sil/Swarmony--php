-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 06:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swarmony`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `artistType` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `sdes` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `experience` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `artistType`, `name`, `location`, `sdes`, `description`, `image`, `experience`, `email`) VALUES
(1, 'Singers', 'Shreya Ghoshal', 'Mumbai', 'A renowned Indian playback singer known for her versatile voice and exceptional talent.', 'As an artist, I am incredibly humbled and grateful for the opportunities and accolades that have adorned my musical journey. One of the pivotal moments in my career was emerging victorious in the esteemed singing reality show \"Sa Re Ga Ma Pa.\" This platform not only served as a launchpad for my career,  but also as a testament to my dedication and passion for music. Winning \"Sa Re Ga Ma Pa\" opened doors to the music industry, allowing me to showcase my talent on a larger stage.\r\n\r\nSince then, my journey has been nothing short of exhilarating. I\'ve had the privilege of collaborating with some of the most talented composers and musicians in the industry. Each project has been a learning experience, pushing me to explore new genres and styles while staying true to my roots.\r\nMy journey as a musician is far from over, and I am eager to see where it takes me next.\r\n', 'assets/images/dish/1.jpeg', '20+ years of experience.', 'ghoshal@gmail.com'),
(2, 'Singers', 'Darshan Raval', 'Gujrat', 'A dynamic Indian playback singer who has captivated audiences with his .voice and emotive performances.', 'In the grand symphony of life, my journey as a singer and songwriter has been a melodic adventure filled with passion, dedication, and endless moments of inspiration. Over the past decade, I\'ve had the incredible privilege of sharing my of experiences and growth.voice with the world, and it\'s been a breathtaking whirlwind .From the moment I first discovered my love for music, I knew that it was my calling. It was like finding a piece of myself that had been missing all along. With each note I sang and each lyric I penned, I felt a sense of fulfillment and purpose that I couldn\'t find anywhere else.\r\n\r\nOne of the milestones in my career came with my participation in a reality singing competition. Though I didn\'t win, the experience taught me valuable lessons and helped me hone my craft. ', 'assets/images/dish/7.jpeg', '15+ years of experience', 'raval18@gmail.com'),
(3, 'Singers', 'Shankar mahadevan', 'Mumbai', 'A Grammy-winning Indian singer and composer who is part of the Shankar–Ehsaan–Loy trio that writes music for Indian films', 'In the grand orchestra of life, my journey as a musician has been a harmonious blend of passion, dedication, and relentless pursuit of excellence. For over three decades, I have been privileged to immerse myself in the mesmerizing world of music, exploring its depths, and sharing its beauty with a myriad of listeners around the globe.From the moment I first discovered the magic of music, I knew that it would be my lifelong calling. It was as if the melodies and rhythms spoke to a part of my soul, igniting a fire within me that could not be extinguished.', 'assets/images/dish/3.jpeg\r\n', '25+ years of experience', 'sm4@gmail.com'),
(4, 'Guitarists', 'Prasanna', 'Chennai', 'A pioneer in performing Carnatic music on the guitar.', 'From the moment I picked up the guitar, I knew that it would be my lifelong companion, my muse, and my greatest love. Guided by the wisdom of my gurus and fueled by an insatiable hunger for knowledge, I immersed myself in the rich traditions of Indian classical music, mastering the intricacies of me odies and rhythms that have captivated audiences for centuries. My journey as a guitarist has been a tapestry woven with threads of passion, dedication, and relentless pursuit of excellence. I spent countless hours honing my craft, practicing tirelessly to perfect my technique and develop my own unique voice on the instrument.\r\n\r\nOne of the pivotal moments in my career came when I had the opportunity to collaborate with some of the most esteemed musicians in the industry.', 'assets/images/GuitarD.jpeg', '15+ years of experience', 'prassanna@gmail.com'),
(5, 'Guitarists', 'Susmit Sen', 'Indore', 'An Indian guitarist formerly part of Indian Ocean, an Indian fusion rock band.', 'From the bustling streets of Kolkata to the global stage, Susmit Sen has carved a niche for himself as one of India\'s most iconic guitarists. he has captivated audiences around the world, transcending genres and boundaries with ease.\r\nOur music was more than just a sound; it was a reflection of the world around us, a commentary on society, politics, and the human condition. With songs like \"Kandisa\" and \"Ma Rewa,\" we struck a chord with audiences across generations, inspiring them to think, to feel, and to question the status quo.\r\n\r\nBut for me, the true joy of being a musician lies not in the fame or recognition, I strive to create moments of pure magic, where time stands still and the only thing that matters is the music.', 'assets/images/GuitarA.png', '25+ years experience', 'sen@gmail.com'),
(6, 'Guitarists', 'Baiju Dharmajan', 'Bangalore', 'Particularly noted for his winding, Carnatic-inspired progressive rock and enduring guitar solos.', 'Baiju\'s musical journey began at a young age, fueled by a deep passion for music and a burning desire to push the boundaries of what was possible on the guitar. Guided by his innate talent and an unwavering dedication to his craft, he honed his skills, mastering a wide range of techniques and styles', 'assets/images/GuitarB.jpg', '30+ years of experience', 'baiju@gmail.com'),
(7, 'Rappers', 'Badshah', 'Mumbai', 'Badshah\'s music blending elements of hip-hop, rap, pop, and Punjabi folk to create a sound that is uniquely his own.', 'Badshah, the iconic rapper and music producer, has carved a niche for himself in the vibrant landscape of Indian hip-hop with his unique style, infectious beats, and dynamic stage presence. Born Aditya Prateek Singh Sisodia, Badshah\'s journey from the streets of Delhi to the pinnacle of the music in', '\r\nassets/images/rapper1.jpeg', '8+ years of experience', 'badshah@gmail.com'),
(8, 'Rappers', 'Raftar', 'Delhi', 'The prolific rapper and lyricist, has emerged as a formidable force in the Indian music industry.', 'With his distinctive style, rapid-fire delivery, and captivating stage presence, Raftaar burst onto the scene, captivating audiences with his raw authenticity and unapologetic attitude. From underground cyphers to mainstream success, he has carved a niche for himself with his unique blend of Hindi a', 'assets/images/rapper2.png', '8+ years experience', 'speed@gmail.com'),
(9, 'Rappers', 'Arpan Kumar', 'Indore', 'Also known as King Rocco, the man born Arpan Kumar in 1997 made his first waves in India\'s hip-hop community.', 'Arpan Kumar Chandel, known professionally as King or King Rocco, is a prominent Indian singer, rapper, and songwriter. He gained widespread recognition as one of the top five finalists on the MTV reality show ‘MTV Hustle’ in 20191. Born on October 10, 1998, in Uttar Pradesh, King later moved to Delh', 'assets/images/rapper3.png', '5+ years of experience', 'king@gmail.com'),
(10, 'Songwriters', 'Javed Akhtar', 'Bangalore', 'A legendary Indian lyricist, poet, and screenwriter who has made an indelible mark on the Indian film industry.', 'With a career spanning several decades, Javed Akhtar has penned some of the most iconic songs and dialogues in Indian cinema, earning him widespread acclaim and recognition as one of the greatest lyricists and screenwriters of all time. His lyrics, known for their poetic beauty, social relevance, an', 'assets/images/sw2.jpeg', '30+ years of experience', 'akhtar@gmail.com'),
(11, 'Songwriters', 'Prateek Kuhaad', 'Bhopal', 'A talented singer-songwriter who has acclaimed for his soulful melodies, poignant lyrics, and captivating performances.', 'With his distinctive voice and introspective songwriting, Prateek Kuhad has captured the hearts of audiences around the globe. His music transcends borders and genres, blending elements of indie folk, pop, and acoustic rock to create a sound that is both timeless and contemporary.\r\n\r\nPrateek\'s lyric', 'assets/images/sw1.jpeg', '8+ years of experience', 'kuhaad@gmail.com'),
(12, 'Songwriters', 'Jasleen Royal', 'Delhi', 'A talented singer-songwriter who has made a significant impact on the Indian music scene with her distinctive voice.', 'With her unique blend of folk, indie, and contemporary pop influences, Jasleen Royal\'s music is both refreshing and deeply emotive. Her lyrics are often introspective and poetic, exploring themes of love, longing, self-discovery, and the beauty of everyday life. Whether she\'s singing about the joys ', 'assets/images/sw.jpeg', '10+ years experience', 'royal@gmail.com'),
(13, 'Songwriters', 'Anwesshaa', 'Delhi', 'An Indian singer and composer in Hindi, Bengali, Kannada, Tamil, Marathi and other Indian languages.', 'She started her career as a playback singer with the song \"Ek Je Achhe Raja\" in the Bengali film Khela (2008). Anwesshaa\'s first breakthrough in Bollywood was in Golmaal Returns for Pritam Chakraborty at the age of 14. She has recorded songs for many films including \'I am 24, Raanjhanaa\', \'Revolver ', 'assets/images/sw3.jpeg', '15+years of experience', 'anwesshaa1@gmail.com'),
(14, 'Singers', 'Chirag', 'Ujjain', 'I an Indian singer par excellence, is a harmonious blend of tradition and innovation. ', 'From intimate gatherings to grand concerts, Chirag\'s enchanting voice adds an unforgettable touch to every occasion. Whether you\'re planning a wedding, corporate event, or cultural festival, Chirag\'s live performances promise to elevate the ambiance and create lasting memories.\r\n\r\nInvite Chirag to b', 'assets/images/s5.jpeg', '5+ Year Of Experiences', 'cchandorikar@gmail.com'),
(15, 'Singers', 'Arijit Singh', 'Mumbai', 'Experience the mesmerizing melodies of Arijit Singh, India\'s soulful voice.', 'Arijit Singh, born in 1987, rose to prominence through reality television before becoming a sensation in Bollywood. His breakthrough came with \"Tum Hi Ho\" from \"Aashiqui 2,\" cementing his status as the industry\'s go-to vocalist. With numerous awards, including National Film Awards, his discography boasts hits across languages, showcasing his versatility and enduring appeal. Singh\'s ability to convey raw emotion through his velvety voice has garnered him a global fanbase, solidifying his position as one of India\'s most beloved singers.', 'assets/images/S7.jpg', '10+ Years', 'arijitsingh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ruhi', 'ruhi@gmail.com', 'Ruhi#123'),
(2, 'Khushi', 'khushi4@gmail.com', '$2y$10$C9U.HLetPFTpheFPrZKHMuKCqCJa0mgD99g/KbmO..7hn.9cvYXAC'),
(3, 'Chirag Chandorikar', 'cchandorikar@gmail.com', '$2y$10$8oTdOXrayUNEnE8Zw5o9SeZxbjfHY/QLPcsI8FppLl4eEukCIkjzC'),
(4, 'Devraj Gehlot', 'gehlotdevraj1@gmail.com', '$2y$10$0LqUiJ6IoKpdtY3JdsrvD.xQJ7qabEqRCkmZWQYohMFA2Wgbj4Zfm'),
(5, 'Devyani Sil', 'devyanisil04@gmail.com', '$2y$10$a1XeKesMl5g5ROhkStnsje3EZK7MPS9.E0dNO.cSwGlXL3gB9gZ8u'),
(6, 'Mirth Pawar', 'mp@gmail.com', '$2y$10$eX242qbbu4LpHiieRqanxe.DlVDW/cMpQju9NEJ0/U9unEZb0gmPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
