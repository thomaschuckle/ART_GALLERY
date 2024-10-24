CREATE DATABASE IF NOT EXISTS `paintingportal`;
USE `paintingportal`;

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genreName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `genre` (`id`, `genreName`) VALUES
(1, 'Art Nouveau'),
(2, 'Cubism'),
(3, 'Fauvism'),
(4, 'Impressionism'),
(5, 'Post-Impressionism'),
(6, 'Romanticism');

CREATE TABLE `paintings` (
  `pid` int(11) NOT NULL,
  `genreID` int(11) NOT NULL,
  `artistID` int(11) DEFAULT NULL, 
  `artistName` varchar(255) DEFAULT NULL,  
  `paintingTitle` varchar(255) DEFAULT NULL,  
  `paintingDescription` longtext,
  `paintingImage` varchar(255) DEFAULT NULL,
  `paintingPrice` int(11) NOT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `paintingYear` int(11) DEFAULT NULL,
   PRIMARY KEY (`pid`)  
);

INSERT INTO `paintings` (`pid`, `genreID`,`artistID`, `artistName`,`paintingTitle`,`paintingDescription`,
`paintingImage`,`paintingPrice`, `shippingCharge`,`paintingYear` ) VALUES
(29010, 1, 29,'Klimt','The Kiss','<em>The Kiss</em> (original <em>Der Kuss</em>) was painted by Gustav Klimt, and is probably his most famous work. He began work on it in 1907 and it is the highpoint of his so-called Golden Period, when he painted a number of works in a similar style.',
'29010.jpg', 320.00,20,1907),
(29040, 1, 29,'Klimt','Portrait of Adele Bloch-Bauer I','This painting, which took three years to complete,was commissioned by the wealthy industrialist Ferdinand Bloch-Bauer, who made his money in the sugar industry. Ferdinand Bloch-Bauer favored the arts, especially Klimt, and commissioned him to complete another portrait of his wife Adele in 1912.',
'29040.jpg', 5000.00,0.00,1907),
(01220, 2, 1,'Picasso','Portrait of Dora Maar','The canvas was one of many portraits of Dora Maar painted by Pablo Picasso over their nearly decade-long relationship. Picasso fell in love with the 29-year old Maar at the age of 55 and soon began living with her.',
'01220.jpg', 500.00,20.00,1937),
(01260, 2, 1,'Picasso','Three Musicians','<em>Three Musicians</em> is the title of two similar collage and oil paintings by Spanish artist Pablo Picasso. They were both completed in 1921 in Fontainebleau near Paris, France, and exemplify the Synthetic Cubist style. Each painting features a Harlequin, a Pierrot, and a monk, who are generally believed to represent Picasso, Guillaume Apollinaire, and Max Jacob, respectively.',
'01260.jpg', 500.00,20.00,1921),
(02010, 3, 2,'Matisse','Woman With Hat','<em>Woman with a Hat</em> (La femme au chapeau) is a painting by Henri Matisse from 1905. It is believed that the woman in the painting was Matisses wife, Amelie.',
'02010.jpg', 340.00,20.00,1905),
(02030, 3, 2,'Matisse','Joy of Life','<em>Le bonheur de vivre</em> (The joy of Life), is a painting by Henri Matisse. In the central background of the piece is a group of figures that is similar to the group depicted in his painting The Dance (second version).',
'02030.jpg', 340.00,20.00,1905),
(02070, 3, 2,'Matisse','The Red Madras Headdress','(<em>The Red Madras Headress</em>) is a painting by Henri Matisse from 1907. The woman depicted is the painters wife, Amélie Noellie Parayre Matisse.',
'02070.jpg', 400.00,20.00,1907),
(14010, 4, 14,'Renoir','Dance at Le Moulin de la Galette','<em>Dance at Moulin de la Galette</em> is one of Impressionism’s most highly revered masterpieces. The scene is of a Sunday afternoon at Moulin de la Galette, where Parisians would typically dress up and spend all day dancing, drinking, and eating galettes, or flat cakes.',
'14010.jpg', 4550.00,0.00,1876),
(14020, 4, 14,'Renoir','Luncheon Boating Party','The painting depicts a group of Renoirs friends relaxing on a balcony at the Maison Fournaise along the Seine river in Chatou, France. The painter and art patron, Gustave Caillebotte, is seated in the lower right. Renoirs future wife, Aline Charigot, is in the foreground playing with a small dog.',
'14020.jpg', 380.00,20.00,1881),
(17010, 4, 17,'Monet','Impression Sunrise','In 1872, Monet painted <em>Impression, Sunrise</em> (Impression, soleil levant) depicting a Le Havre port landscape. It hung in the first Impressionist exhibition in 1874.',
'17010.jpg', 130.00,20.00,1872),
(17020, 4, 17,'Monet','Women in the Garden','Monet’s technique of “en plein air” painting was hard at work on this painting. Because it necessitated that he work from the same point of view as he painted, he dug a trench for the bottom half of the painting to sit in while he painted the top, due to its large size.',
'17020.jpg', 1050.00,20.00,1866),
(13010, 4, 13,'Whistler','Symphony in White, No. 1: The White Girl','<em>Symphony in White, No. 1</em>, also known as <em>The White Girl</em>, is a painting by James Abbott McNeill Whistler. The work shows a woman in full figure standing on a wolf skin in front of a white curtain with a lily in her hand.',
'13010.jpg', 300.00,20,1862),
(13030, 4, 13,'Whistler','Arrangement in Grey and Black: Portrait of the Painters Mother','<em>Arrangement in Grey and Black: The Artists Mother</em>, famous under its colloquial name Whistlers Mother, is an 1871 oil-on-canvas painting by American-born painter James McNeill Whistler.  It occasionally tours worldwide. Although an icon of American art, it rarely appears in the United States.',
'13030.jpg', 300.00,20.00,1871),
(01070, 5, 1,'Picasso','The Actor','Picasso painted <em>The Actor</em> over another painting, because he could not afford new canvases at the time. He created the painting over the winter of 1904–1905, at the age of 23. This was during the artists Rose Period, when he changed his painting style from the downbeat tones of his Blue Period to warmer and more romantic hues.',
'01070.jpg', 200.00,20.00,1904),
(01080, 5, 1,'Picasso','Family of Saltimbanques','<em>Family of Saltimbanques</em> (La famille de saltimbanques) is a 1905 painting by Pablo Picasso. It is considered the masterpiece of Picassos circus period.',
'01080.jpg', 160.00,20.00,1905),
(19030, 5, 19,'Van Gogh','Sidewalk Café at Night','<em>Café Terrace at Night</em>, also known as The Cafe Terrace on the Place du Forum, is an coloured oil painting on an industrially primed canvas of size 25 (Toile de 25 figure) in Arles, France, mid September 1888.',
'19030.jpg', 300.00,20.00,1888),
(19040, 5, 19,'Van Gogh','Décoration for the Yellow House','<em>Sunflowers</em> (original title, in French: Tournesols) are the subject of two series of still life paintings by the Dutch painter Vincent van Gogh. The earlier series executed in Paris in 1887 gives the flowers lying on the ground, while the second set executed a year later in Arles shows bouquets of sunflowers in a vase.',
'19040.jpg', 340.00,20.00,1888),
(19050, 5, 19,'Van Gogh','Sunflowers','<em>Sunflowers</em> (original title, in French: Tournesols) are the subject of two series of still life paintings by the Dutch painter Vincent van Gogh. The earlier series executed in Paris in 1887 gives the flowers lying on the ground, while the second set executed a year later in Arles shows bouquets of sunflowers in a vase.',
'19050.jpg', 400.00,20.00,1888),
(19070, 5, 19,'Van Gogh','Starry Night','In the later part of his life, Van Gogh committed himself to an asylum in Saint Remy de Provence. <em>The Starry Night</em> was the view from the window in Van Gogh’s sanitarium bedroom. Although it is a night scene, it was painted during the day.',
'19070.jpg', 410.00,20.00,1889),
(19100, 5, 19,'Van Gogh','The Night Café','<em>The Night Café</em> (original French title: <em>Le Café de nuit</em>) is an oil painting created in Arles in September 1888, by Vincent van Gogh. Its title is inscribed lower right beneath the signature.',
'19100.jpg', 360.00,20.00,1888),
(05010, 6, 5,'David','The Oath of the Horatii','<em>Oath of the Horatii</em> (French: Le Serment des Horaces), is a work by French artist Jacques-Louis David painted in 1784. It depicts a scene from a Roman legend about a dispute between two warring cities; Rome and Alba Longa, when three brothers from a Roman family, the Horatii, agree to end the war by fighting three brothers from an Alba Longa family, the Curiatii.',
'05010.jpg', 800.00,20.00,1784),
(05030, 6, 5,'David','The Death of Marat','<em>The Death of Marat</em> (French: <em>La Mort de Marat</em>) is a 1793 painting in the Neoclassical style by Jacques-Louis David, and is one of the most famous images of the French Revolution.',
'05030.jpg', 450.00,20.00,1793),
(05050, 6, 5,'David','Napoleon Crossing the Alps','<em>Napoleon Crossing the Alps</em> (also known as <em>Napoleon at the Saint-Bernard Pass</em> or <em>Bonaparte Crossing the Alps</em>) is the title given to the five versions of an oil on canvas equestrian portrait of Napoleon Bonaparte painted by the French artist Jacques-Louis David between 1801 and 1805.',
'05050.jpg', 250.00,20.00,1800),
(06010, 6, 6,'Ingres','Mademoiselle Caroline Riviere','The portrait of Mademoiselle Caroline Rivière was painted in 1806 by the French Neoclassical artist Jean Auguste Dominique Ingres, and today hangs in the Louvre. It is the third of three portraits of the Rivière family the artist painted that year.',
'06010.jpg', 400.00,20.00,1806),
(06020, 6, 6,'Ingres','Betty de Rothschild, Baronne de Rothschild','<em>Baronne de Rothschild</em> is a 1848 oil and canvas portrait by the French Neoclassical artist Jean Auguste Dominique Ingres. The sitter, Betty de Rothschild (1805-1886) had married banker James Mayer de Rothschild and was one of the wealthiest women in northern Europe, and one of the foremost Parisian patrons of the arts.',
'06020.jpg', 550.00,20.00,1848),
(06030, 6, 6,'Ingres','La Grande Odalisque','<em>Grande Odalisque</em>, also known as Une Odalisque or La Grande Odalisque, is an oil painting of 1814 by Jean Auguste Dominique Ingres depicting an odalisque, or concubine. Ingres contemporaries considered the work to signify Ingres break from Neoclassicism, indicating a shift toward exotic Romanticism.',
'06030.jpg', 175.00,20.00,1814);

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,  
  `billingAddress` longtext,  
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id) 
);

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `paintingId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) DEFAULT NULL,
  `userIP` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
   PRIMARY KEY (id)
);