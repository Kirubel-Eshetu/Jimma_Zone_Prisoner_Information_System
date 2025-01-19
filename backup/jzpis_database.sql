

CREATE TABLE `cell_management` (
  `#` int(255) NOT NULL AUTO_INCREMENT,
  `cell_number` varchar(255) NOT NULL,
  `intake_capacity` int(255) NOT NULL,
  `allocated_prisoners` int(255) NOT NULL,
  `free_space` int(255) NOT NULL,
  PRIMARY KEY (`#`),
  UNIQUE KEY `cell_number` (`cell_number`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO cell_management VALUES("1","R0","10","2","8");
INSERT INTO cell_management VALUES("2","R1","5","1","4");
INSERT INTO cell_management VALUES("3","R2","10","2","8");
INSERT INTO cell_management VALUES("4","R3","4","1","3");
INSERT INTO cell_management VALUES("5","R4","15","5","10");
INSERT INTO cell_management VALUES("6","R5","40","30","10");



CREATE TABLE `comments` (
  `#` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(60) NOT NULL,
  `comments` varchar(1500) NOT NULL,
  PRIMARY KEY (`#`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO comments VALUES("1","ta.enfi2002@gmail.com","Your system was able to give me the information I was searching for about your facility. Keep up the good work.");
INSERT INTO comments VALUES("2","Kerimseidali@gmail.com","I can now look Jimma Zone Prison Administration from the comfort of my home.");
INSERT INTO comments VALUES("3","Melkamuabera@gmail.com","I wish I was part of the crew who designed and developed the system.");
INSERT INTO comments VALUES("4","Kirubelwinner@gmail.com","Hello.");



CREATE TABLE `prisoners` (
  `#` int(11) NOT NULL AUTO_INCREMENT,
  `prisoner_id` varchar(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `Zone` varchar(100) DEFAULT NULL,
  `Wereda` varchar(100) DEFAULT NULL,
  `Medical_status` varchar(400) NOT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `Reason_of_arrest` varchar(255) NOT NULL,
  `Criminal_record` varchar(1500) NOT NULL,
  `phone_of_contacting_people` varchar(150) NOT NULL,
  `prisoner_image` longblob DEFAULT NULL,
  `Entry_Date` date DEFAULT NULL,
  `Exit_Date` date DEFAULT NULL,
  `Cell_number` varchar(20) DEFAULT NULL,
  `Medical_appointment` date DEFAULT NULL,
  `Court_appointment` date DEFAULT NULL,
  `Material_Id` varchar(10) DEFAULT NULL,
  `parole_points` int(6) DEFAULT NULL,
  PRIMARY KEY (`#`),
  UNIQUE KEY `prisoner_id` (`prisoner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO prisoners VALUES("1","P00001","Adonai Desalegn Merga","In prison","M","2001-10-09","Oromia","Nekemte","Shambo","~Infected with Asthma.<br>
~Underweight.","A+","*Theft.","-Charged with theft 2 years ago.","+251708966963","20240302_102709.jpg","2024-01-07","2026-02-18","R0","","","M001","100");
INSERT INTO prisoners VALUES("2","P00002","Amanuel Daniel Mamo","In prison","F","2004-03-10","Gambella","Gambella","04","~Good.","A+","*Assault<br>
*Hate Crime","-No previous criminal records found.","+251912356674<br>
+251939806607","20240303_165955.jpg","2024-02-25","2024-07-04","R0","","","M002","120");
INSERT INTO prisoners VALUES("3","P00003","Chala Golicha Boru","In prison","M","2002-08-23","Addis Abeba","Addis Abeba Bole","09","~Fair","A+","*Burglary","-Kidnapping.<br> 
-Fraud.<br>","+251986212207","20240303_170648.jpg","2022-04-20","2025-04-20","R1","","","M003","8");
INSERT INTO prisoners VALUES("4","P00004","Kerim Seid Ali","In prison","M","2000-05-11","Amhara","Gonder","09","~Excellent","AB-","*Cyber crime","-No previous criminal records found.","+0984562213","20240303_165644.jpg","2021-12-28","2024-12-30","R2","","","","100");
INSERT INTO prisoners VALUES("5","P00005","Kirubel Eshetu Tefera","In prison","M","2002-02-12","Addis Abeba","Addis Abeba Akaki Kality","09","~Low insulin level.<br>
~Low blood pressure.","B-","*Nepotism ","-No previous criminal records found.","+0911146831<br>
+0912741754","20240302_102636.jpg","2023-06-06","2027-05-20","R2","0000-00-00","0000-00-00","M004","50");
INSERT INTO prisoners VALUES("6","P00006","Sintayehu Desalegn Hadro","In prison","M","2001-03-08","Southern Nations and","Kembata","06","~Infected with diabetes.","A+","*Political crime <br>*Nepotism","-Charged with corruption 7 years ago.<br>","+251911226539<br>
+251737306608","20240303_170725.jpg","2023-02-28","2028-04-11","R3","","","0015","2");



CREATE TABLE `report` (
  `#` int(200) NOT NULL AUTO_INCREMENT,
  `prisonerid` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `report` text NOT NULL,
  PRIMARY KEY (`#`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO report VALUES("1","P00005","Kirubel Eshetu Tefera","The prisoner stated above is showing very good progress on the improvements of his character. He is becoming a hardworking individual. If he continues by the character he has right now, he may get years of mercy soon.");
INSERT INTO report VALUES("2","P00001","Kirubel Eshetu Tefera","Good imperovements.");



CREATE TABLE `users` (
  `#` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(6) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `role` char(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`#`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES("1","PI0114","Kirubel Eshetu Tefera","Kirubelwinner@gmail.com","F6$;:63]nQ(Th7^x,H@i5#p","+251939806607","System Administrator","1");
INSERT INTO users VALUES("2","PI0137","Hikma Sadik Kedir","Hikma5846@gmail.com","M[4zH$c9,oXcNCM]lGjmQ)","+251921235647","Prison Inspector","1");
INSERT INTO users VALUES("3","PI2129","Kalab Girma Abera","Kalabegirma49@gmail.com","X}<6$W*>%pC,B?u=qM(7!r~","+251964342505","Security Manager","1");
INSERT INTO users VALUES("4","PI3486","Habtamu Gelana Diriba","Habtamugelana5@gmail.com","M8i>-1$W3Sa")gJ!dVd8{,#","+25183837365","Record Officer","1");
INSERT INTO users VALUES("5","PI5421","Biruk Manaye Ula","bedadir4@gmail.com","AT6sdjD{:F]Ra9Zx=C4E5wH","+251949411204","Discipline Officer","1");



CREATE TABLE `visitors` (
  `#` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` varchar(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `visiting` varchar(700) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `photo_of_idcard` longblob NOT NULL,
  `material_id` varchar(255) NOT NULL,
  PRIMARY KEY (`#`),
  UNIQUE KEY `visitor_id` (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO visitors VALUES("1","V0001","Almaz Tesfamaryam Debalke","Kirubel Eshetu Tefera","+251708966963","Almaztesfa231@gmail.com","id_Almaz_Tesfamaryam_Debalke.jpg","MV01");
INSERT INTO visitors VALUES("2","V0002","Beknesh Sleshi Tegene","Kirubel Eshetu Tefera","+251912356674","Berkneshtegu125@gmail.com","id_Breknesh_Sleshi_Tegene.jpg","MV02");
INSERT INTO visitors VALUES("3","V0003","Mubarek Alnaser Ali","Adonai Desalegn Merga","+251986212207","Mubarekalnaser@gmail.com","id_card_Mubarek_ANasir_Ali.jpg","");
INSERT INTO visitors VALUES("4","V0004","Elshalom Endrias Teriku","Amanuel Daniel Mamo","+251788886622","ElshalomEndrias25@gmail.com","id_Elshalom_Endrias_Tariku.jpg","");
INSERT INTO visitors VALUES("5","V0005","Fikadu Mengesha Alemu","Sintayehu Desalegn Hadro","+251911547620","Fikehappines@gmail.com","id_Fikadu_Menagesa_Alemu.jpg","");
INSERT INTO visitors VALUES("6","V0006","Teshome Abeba Teshager","Kirubel Eshetu Tefera","+2519639806607","","id_Kirubel_Eshetu_Tefera.jpg","MV03");
INSERT INTO visitors VALUES("7","V0007","Mella Gedda Feyesa","Adonai Desalegn Merga","+251963541210","Geddaethiopia@gmail.com","id_Mella_Geda_Feyessa.jpg","");
INSERT INTO visitors VALUES("8","V0008","Mihiret Tefera Aregahegn","Amanuel Daniel Mamo","+251966231041","Mercy22334@gmail.com","id_Mihiret_Tefera_Aregahegn.jpg","");
INSERT INTO visitors VALUES("9","V0009","Yazew  Kebebew Dubale","Kerim Seid Ali	","+251789912240","YazewKebe@gmail.com","id_Yazew_Kebebew_Dubale.jpg","MV04");
INSERT INTO visitors VALUES("10","V0010","Yirgu Teshome Techane","Kerim Seid Ali	","+251983221140","Yirgutechane@gmail.com","id_Yirgu_Teshome_Techane.jpg","");

