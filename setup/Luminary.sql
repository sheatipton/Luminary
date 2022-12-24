-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2022 at 07:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Luminary`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `user_id` int(20) NOT NULL,
  `isbn` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `subject` varchar(15) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` decimal(30,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `stock` int(20) NOT NULL,
  `lowStock` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`user_id`, `isbn`, `title`, `author`, `subject`, `category`, `price`, `image`, `description`, `stock`, `lowStock`) VALUES
(0, 1849137301, 'A Tale of Two Cities', 'Charles Dickens', 'Fiction', 'Classic', '11.99', 'book_covers/tale.jpg', 'The novel tells the story of the French Doctor Manette, his 18-year-long imprisonment in the Bastille in Paris, and his release to live in London with his daughter Lucie whom he had never met. The story is set against the conditions that led up to the French Revolution and the Reign of Terror.', 20, 1),
(1, 1849137302, 'A Walk to Remember', 'Nicholas Sparks', 'Fiction', 'New', '15.99', 'book_covers/walk.jpg', 'Set in a small town during the 1950s, A Walk to Remember is the story of an only son of a wealthy family that finds true love with the most unexpected person. The daughter of a minister (Mandy Moore) meets the only son (Shane West) and the story takes us through hard times, love and bitter sweet passion.', 20, 0),
(0, 1849137303, 'American Dirt', 'Jeanine Cummins', 'Nonfiction', 'Bestseller', '17.99', 'book_covers/american.jpg', 'Lydia lives in Acapulco. She has a son, Luca, the love of her life, and a wonderful husband who is a journalist. And while cracks are beginning to show in Acapulco because of the cartels, the life of Lydia is, by and large, fairly comfortable. But after the husbands tell-all profile of the newest drug lord is published, none of their lives will ever be the same.', 20, 0),
(0, 1849137304, 'An Ordinary Age', 'Rainesford Stauffer', 'Nonfiction', 'Regular', '11.99', 'book_covers/age.jpg', 'From chronic burnout to the loneliness epidemic to the strictures of social media, An Ordinary Age leads with empathy in exploring the myriad challenges facing young adults, while also advocating for a better path forward: one where young people can live authentic lives filled with love, community, and self-knowledge.\r\n', 20, 0),
(0, 1849137305, 'Apples Never Fall', 'Liane Moriarty', 'Fiction', 'Regular', '28.99', 'book_covers/apples.jpg', 'Apples Never Fall follows the four Delaney siblings after the disappearance of their mother, Joy Delaney. The police soon identify their father, Stan, as a possible person of interest in her case. As they try to unravel the mystery of what happened to her or where she went, the four siblings -- Troy, Brooke, Logan and Amy -- are forced to confront truths about their relationships with each other, with their significant others, with their parents and about their parents marriage.\r\n', 20, 0),
(0, 1849137306, 'Bleak House', 'Charles Dickens', 'Fiction', 'Regular', '19.99', 'book_covers/bleak.jpg', 'Bleak House is the story of the Jarndyce family, who wait in vain to inherit money from a disputed fortune in the settlement of the extremely long-running lawsuit of Jarndyce and Jarndyce.', 20, 0),
(0, 1849137307, 'Crying in H Mart', 'Michelle Zauner', 'Nonfiction', 'Regular', '21.99', 'book_covers/crying.jpg', 'In this exquisite story of family, food, grief, and endurance, Michelle Zauner proves herself far more than a dazzling singer, songwriter, and guitarist. With humor and heart, she tells of growing up one of the few Asian American kids at her school in Eugene, Oregon; of struggling with her mothers particular, high expectations of her; of a painful adolescence; of treasured months spent in her grandmothers tiny apartment in Seoul, where she and her mother would bond, late at night, over heaping plates of food.', 20, 0),
(0, 1849137308, 'David Copperfield', 'Charles Dickens', 'Fiction', 'Classic', '12.99', 'book_covers/david.jpg', 'The story follows the life of David Copperfield from childhood to maturity. David was born in Blunderstone, Suffolk, England, six months after the death of his father. David spends his early years in relative happiness with his loving, childish mother and their kindly housekeeper, Clara Peggotty.', 20, 0),
(1, 1849137309, 'Dear John', 'Nicholas Sparks', 'Fiction', 'Regular', '16.99', 'book_covers/john.jpg', 'An angry rebel, John dropped out of school and enlisted in the Army, not knowing what else to do with his life--until he meets the girl of his dreams, Savannah. Their mutual attraction quickly grows into the kind of love that leaves Savannah waiting for John to finish his tour of duty, and John wanting to settle down with the woman who has captured his heart.', 20, 1),
(0, 1849137310, 'Great Expectations', 'Charles Dickens', 'Fiction', 'Classic', '10.99', 'book_covers/great.jpg', 'Humble, orphaned Pip is apprenticed to the dirty work of the forge but dares to dream of becoming a gentleman — and one day, under sudden and enigmatic circumstances, he finds himself in possession of \"great expectations.\" In this gripping tale of crime and guilt, revenge and reward, the compelling characters include Magwitch, the fearful and fearsome convict; Estella, whose beauty is excelled only by her haughtiness; and the embittered Miss Havisham, an eccentric jilted bride.', 20, 1),
(0, 1849137311, 'Hostage', 'Clare Mackintosh', 'Fiction', 'Regular', '16.99', 'book_covers/hostage.jpg', 'Mina is trying to focus on her job as a flight attendant, not the problems of her five-year-old daughter back home, or the fissures in her marriage. But the plane has barely taken off when Mina receives a chilling note from an anonymous passenger, someone intent on ensuring the plane never reaches its destination. Someone who needs Minas assistance and who knows exactly how to make her comply.', 20, 0),
(0, 1849137312, 'In Cold Blood', 'Truman Capote', 'Nonfiction', 'Regular', '15.99', 'book_covers/cold.jpg', 'On November 15, 1959, in the small town of Holcomb, Kansas, four members of the Clutter family were savagely murdered by blasts from a shotgun held a few inches from their faces. There was no apparent motive for the crime, and there were almost no clues. As Truman Capote reconstructs the murder and the investigation that led to the capture, trial, and execution of the killers, he generates both mesmerizing suspense and astonishing empathy. At the center of his study are the amoral young killers Perry Smith and Dick Hickcock, who, vividly drawn by Capote, are shown to be reprehensible yet entirely and frighteningly human.', 20, 0),
(0, 1849137313, 'Little Dorrit', 'Charles Dickens', 'Fiction', 'Regular', '15.99', 'book_covers/little.jpg', 'The novel attacks the injustices of the contemporary English legal system, particularly the institution of debtors prison. Amy Dorrit, referred to as Little Dorrit, is born in and lives much of her life at the Marshalsea prison, where her father is imprisoned for debt.', 20, 0),
(0, 1849137314, 'Malibu Rising', 'Taylor Jenkins Reid', 'Fiction', 'New', '27.99', 'book_covers/malibu.jpg', 'Four famous siblings throw an epic party to celebrate the end of the summer. But over the course of twenty-four hours, the family drama that ensues will change their lives will change forever.', 20, 0),
(0, 1849137315, 'Of Mice and Men', 'John Steinbeck', 'Fiction', 'Classic', '10.99', 'book_covers/mice.jpg', 'Of Mice and Men narrates the experiences of George Milton and Lennie Small, two displaced migrant ranch workers, who move from place to place in California in search of new job opportunities during the Great Depression in the United States.', 20, 0),
(0, 1849137316, 'On the Origin of Species', 'Charles Darwin', 'Nonfiction', 'Regular', '14.99', 'book_covers/species.jpg', 'This book introduced the scientific theory that populations evolve over the course of generations through a process of natural selection. The book presented a body of evidence that the diversity of life arose by common descent through a branching pattern of evolution.', 20, 0),
(0, 1849137317, 'One By One', 'Ruth Ware', 'Fiction', 'Bestseller', '16.99', 'book_covers/one.jpg', 'A group of employees on a corporate retreat to a picturesque ski lodge in the French Alps find their getaway horribly disrupted when an avalanche cuts off their access to the outside world.', 20, 0),
(0, 1849137318, 'People We Meet On Vacation', 'Emily Henry', 'Fiction', 'Bestseller', '15.99', 'book_covers/people.jpg', 'People We Meet on Vacation is a collection of in-joke travel memories. It is equal parts hilarious and shockingly tender. Poppy and Alex are complete opposites. But miraculously, they are also best friends, and ever since college, they have taken an annual summer vacation together.', 20, 0),
(0, 1849137319, 'Pride and Prejudice', 'Jane Austen', 'Fiction', 'Classic', '13.99', 'book_covers/pride.jpg', 'Pride and Prejudice follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love and marry.', 20, 0),
(0, 1849137320, 'Project Hail Mary', 'Andy Weir', 'Fiction', 'New', '28.99', 'book_covers/hail.jpg', 'Ryland Grace is the sole survivor on a desperate, last-chance mission—and if he fails, humanity and the Earth itself will perish. Except that right now, he does not know that. He cannot even remember his own name, let alone the nature of his assignment or how to complete it.', 20, 0),
(0, 1849137321, 'Ready Player Two', 'Ernest Cline', 'Fiction', 'Bestseller', '16.99', 'book_covers/player.jpg', 'Days after winning Oasis founder James Hallidays contest, Wade Watts makes a discovery that changes everything. Hidden within Hallidays vaults, waiting for his heir to find, lies a technological advancement that will once again change the world and make the Oasis a thousand times more wondrous—and addictive—than even Wade dreamed possible.', 20, 0),
(0, 1849137322, 'Run, Rose, Run', 'Dolly Parton', 'Fiction', 'Bestseller', '29.99', 'book_covers/run.jpg', 'Every song tells a story. She is a star on the rise, singing about the hard life behind her. She is also on the run. Find a future, lose a past.', 20, 0),
(0, 1849137323, 'Shadows Reel', 'C.J. Box', 'Fiction', 'Regular', '17.99', 'book_covers/shadows.jpg', 'Wyoming Game Warden Joe Picketts job has many times put his wife and daughters in harms way. Now the tables turn as his wife discovers something that puts the Pickett family in a killers crosshairs in this thrilling new novel in the bestselling series.', 20, 0),
(0, 1849137324, 'Silent Spring', 'Rachel Carson', 'Nonfiction', 'Regular', '13.99', 'book_covers/silent.jpg', 'Silent Spring is an environmental science book. The book documents the adverse environmental effects caused by the indiscriminate use of pesticides. Carson accused the chemical industry of spreading disinformation, and public officials of accepting the industrys marketing claims unquestioningly.', 20, 0),
(0, 1849137325, 'The Alchemist', 'Paulo Coelho', 'Fiction', 'Regular', '16.99', 'book_covers/alchemist.jpg', 'This story, dazzling in its powerful simplicity and soul-stirring wisdom, is about an Andalusian shepherd boy named Santiago, who travels from his homeland in Spain to the Egyptian desert in search of a treasure buried near the Pyramids. long the way he meets a Romany woman, a man who calls himself a king, and an alchemist, all of whom point Santiago in the right direction for his quest. No one knows what the treasure is, or whether Santiago will be able to surmount the obstacles in his path; but what starts out as a journey to find worldly goods turns into a discovery of treasure within.', 20, 0),
(0, 1849137326, 'The Call of the Wild', 'Jack London', 'Fiction', 'Classic', '15.99', 'book_covers/wild.jpg', 'Based on Londons experiences as a gold prospector in the Canadian wilderness and his ideas about nature and the struggle for existence, The Call of the Wild is a tale about unbreakable spirit and the fight for survival in the frozen Alaskan Klondike.', 20, 0),
(0, 1849137327, 'The Catcher in the Rye', 'J.D. Salinger', 'Fiction', 'Classic', '15.99', 'book_covers/catcher.jpg', 'It is Christmas time and Holden Caulfield has just been expelled from yet another school. Fleeing the crooks at Pencey Prep, he pinballs around New York City seeking solace in fleeting encounters - shooting the bull with strangers in dive hotels, wandering alone round Central Park, getting beaten up by pimps and cut down by erstwhile girlfriends. The city is beautiful and terrible, in all its neon loneliness and seedy glamour, its mingled sense of possibility and emptiness. Holden passes through it like a ghost, thinking always of his kid sister Phoebe, the only person who really understands him, and his determination to escape the phonies and find a life of true meaning.', 20, 0),
(1, 1849137328, 'The Choice', 'Nicholas Sparks', 'Fiction', 'Regular', '15.99', 'book_covers/choice.jpg', 'Travis Parker has everything a man could want: a good job, loyal friends, even a waterfront home in small-town North Carolina. In full pursuit of the good life - boating, swimming , and regular barbecues with his good-natured buddies -- he holds the vague conviction that a serious relationship with a woman would only cramp his style. That is, until Gabby Holland moves in next door. Spanning the eventful years of young love, marriage and family, THE CHOICE ultimately confronts us with the most heartwrenching question of all: how far would you go to keep the hope of love alive?', 20, 0),
(0, 1849137329, 'The Diary of a Young Girl', 'Anne Frank', 'Nonfiction', 'Regular', '14.99', 'book_covers/diary.jpg', 'In 1942, with the Nazis occupying Holland, a thirteen-year-old Jewish girl and her family fled their home in Amsterdam and went into hiding. For the next two years, until their whereabouts were betrayed to the Gestapo, the Franks and another family lived cloistered in the “Secret Annexe” of an old office building. Cut off from the outside world, they faced hunger, boredom, the constant cruelties of living in confined quarters, and the ever-present threat of discovery and death. In her diary Anne Frank recorded vivid impressions of her experiences during this period. By turns thoughtful, moving, and surprisingly humorous, her account offers a fascinating commentary on human courage and frailty and a compelling self-portrait of a sensitive and spirited young woman whose promise was tragically cut short.', 20, 0),
(0, 1849137330, 'The Four Winds', 'Kristin Hannah', 'Fiction', '28.99', '0.00', 'book_covers/winds.jpg', 'Millions are out of work and a drought has broken the Great Plains. Farmers are fighting to keep their land and their livelihoods as the crops are failing, the water is drying up, and dust threatens to bury them all. One of the darkest periods of the Great Depression, the Dust Bowl era, has arrived with a vengeance. In this uncertain and dangerous time, Elsa Martinelli—like so many of her neighbors—must make an agonizing choice: fight for the land she loves or go west, to California, in search of a better life. The Four Winds is an indelible portrait of America and the American Dream, as seen through the eyes of one indomitable woman whose courage and sacrifice will come to define a generation.', 20, 0),
(0, 1849137331, 'The Glass Hotel', 'Emily St.John Mandel', 'Fiction', 'Bestseller', '16.99', 'book_covers/glass.jpg', 'Vincent is a bartender at the Hotel Caiette, a five-star lodging on the northernmost tip of Vancouver Island. On the night she meets Jonathan Alkaitis, a hooded figure scrawls a message on the lobbys glass wall: Why do not you swallow broken glass. High above Manhattan, a greater crime is committed: Alkaitis is running an international Ponzi scheme, moving imaginary sums of money through clients accounts. When the financial empire collapses, it obliterates countless fortunes and devastates lives. Vincent, who had been posing as Jonathans wife, walks away into the night. Years later, a victim of the fraud is hired to investigate a strange occurrence: a woman has seemingly vanished from the deck of a container ship between ports of call.', 20, 0),
(0, 1849137332, 'The Great Gatsby', 'F.Scott Fitzgerald', 'Fiction', 'Classic', '16.99', 'book_covers/gatsby.jpg', 'The story is of the fabulously wealthy Jay Gatsby and his new love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted \"gin was the national drink and sex the national obsession,\" it is an exquisitely crafted tale of America in the 1920s.', 20, 0),
(0, 1849137333, 'The Guest List', 'Lucy Foley', 'Fiction', 'Regular', '16.99', 'book_covers/guest.jpg', 'On an island off the coast of Ireland, guests gather to celebrate two people joining their lives together as one. The groom: handsome and charming, a rising television star. The bride: smart and ambitious, a magazine publisher. It’s a wedding for a magazine, or for a celebrity: the designer dress, the remote location, the luxe party favors, the boutique whiskey. The cell phone service may be spotty and the waves may be rough, but every detail has been expertly planned and will be expertly executed.', 20, 0),
(0, 1849137334, 'The Interpretation of Dreams', 'Sigmund Freud', 'Nonfiction', 'Regular', '14.99', 'book_covers/dreams.jpg', 'Freuds discovery that the dream is the means by which the unconscious can be explored is undoubtedly the most revolutionary step forward in the entire history of psychology. Dreams, according to his theory, represent the hidden fulfillment of our unconscious wishes.', 20, 0),
(0, 1849137335, 'The Last Thing He Told Me', 'Laura Dave', 'Fiction', 'Bestseller', '26.99', 'book_covers/last.jpg', 'Before Owen Michaels disappears, he manages to smuggle a note to his beloved wife of one year: Protect her. Despite her confusion and fear, Hannah Hall knows exactly to whom the note refers: Owen’s sixteen-year-old daughter, Bailey. Bailey, who lost her mother tragically as a child. Bailey, who wants absolutely nothing to do with her new stepmother. Hannah and Bailey set out to discover the truth, together. But as they start putting together the pieces of Owen’s past, they soon realize they are also building a new future. One neither Hannah nor Bailey could have anticipated.', 20, 0),
(0, 1849137336, 'The Lightning Rod', 'Brad Meltzer', 'Fiction', 'New', '19.99', 'book_covers/lightning.jpg', 'Archie Mint has led a charmed life--he hass got a beautiful wife, two impressive kids, and a successful military career. When he is killed while trying to stop a robbery in his own home, his family is shattered--and then shocked when the other shoe drops. Mints charmed life, so perfect on the surface, held criminal secrets none of them could have imagined.', 20, 0),
(0, 1849137337, 'The Maid', 'Nita Prose', 'Fiction', 'Regular', '26.99', 'book_covers/maid.jpg', 'Molly Gray is not like everyone else. She struggles with social skills and misreads the intentions of others. Her gran used to interpret the world for her, codifying it into simple rules that Molly could live by. A Clue-like, locked-room mystery and a heartwarming journey of the spirit, The Maid explores what it means to be the same as everyone else and yet entirely different—and reveals that all mysteries can be solved through connection to the human heart.', 20, 0),
(0, 1849137338, 'The Midnight Library', 'Matt Haig', 'Fiction', 'Regular', '25.99', 'book_covers/midnight.jpg', 'Nora Seed finds herself faced with this decision. Faced with the possibility of changing her life for a new one, following a different career, undoing old breakups, realizing her dreams of becoming a glaciologist; she must search within herself as she travels through the Midnight Library to decide what is truly fulfilling in life, and what makes it worth living in the first place.', 20, 1),
(0, 1849137339, 'The Outsiders', 'S.E. Hinton', 'Fiction', 'Classic', '19.99', 'book_covers/outsiders.jpg', 'The Outsiders is about two weeks in the life of a 14-year-old boy. The novel tells the story of Ponyboy Curtis and his struggles with right and wrong in a society in which he believes that he is an outsider. According to Ponyboy, there are two kinds of people in the world: greasers and socs. A soc (short for \"social\") has money, can get away with just about anything, and has an attitude longer than a limousine. A greaser, on the other hand, always lives on the outside and needs to watch his back. Ponyboy is a greaser, and he is always been proud of it, even willing to rumble against a gang of socs for the sake of his fellow greasers--until one terrible night when his friend Johnny kills a soc.', 20, 0),
(0, 1849137340, 'The Prince', 'Niccolo Machiavelli', 'Nonfiction', 'Regular', '16.99', 'book_covers/prince.jpg', 'Machiavelli needs to be looked at as he really was. Hence: Can Machiavelli, who makes the following observations, be Machiavellian as we understand the disparaging term?\'', 20, 0),
(0, 1849137341, 'The Push', 'Ashley Audrain', 'Fiction', 'Bestseller', '14.99', 'book_covers/push.jpg', 'Blythe Connor is determined that she will be the warm, comforting mother to her new baby Violet that she herself never had. The Push is a tour de force you will read in a sitting, an utterly immersive novel that will challenge everything you think you know about motherhood, about what we owe our children, and what it feels like when women are not believed.', 20, 0),
(1, 1849137342, 'The Return', 'Nicholas Sparks', 'Fiction', 'Regular', '16.99', 'book_covers/return.jpg', 'Trevor Benson never intended to move back to New Bern, NC. But when a mortar blast outside the hospital where he worked as an orthopedic surgeon sent him home from Afghanistan with devastating injuries, the dilapidated cabin he inherited from his grandfather seemed as good a place to regroup as any. Tending to his grandfathers beloved bee hives while gearing up for a second stint in medical school, Trevor is not prepared to fall in love with a local . . . and yet, from their very first encounter, his connection with Natalie Masterson cannot be ignored. But even as she seems to reciprocate his feelings, she remains frustratingly distant, making Trevor wonder what she is hiding.\'', 20, 0),
(1, 1849137343, 'The Wish', 'Nicholas Sparks', 'Fiction', 'Regular', '14.99', 'book_covers/wish.jpg', '1996 was the year that changed everything for Maggie Dawes. Sent away at sixteen to live with an aunt she barely knew in Ocracoke, a remote village on North Carolina’s Outer Banks, she could think only of the friends and family she left behind . . . until she meets Bryce Trickett, one of the few teenagers on the island. Handsome, genuine, and newly admitted to West Point, Bryce gradually shows her how much there is to love about the wind-swept beach town—and introduces her to photography, a passion that will define the rest of her life. As they count down the last days of the season together, she begins to tell him the story of another Christmas, decades earlier—and the love that set her on a course she never could have imagined.', 20, 0),
(0, 1849137344, 'The Wolf Den', 'Elodie Harper', 'Fiction', 'New', '16.99', 'book_covers/wolf.jpg', 'Amara was once a beloved daughter, until her fathers death plunged her family into penury. Now she is a slave in Pompeiis infamous brothel, owned by a man she despises. Sharp, clever and resourceful, Amara is forced to hide her talents. For as a she-wolf, her only value lies in the desire she can stir in others. Set in Pompeiis lupanar, The Wolf Den reimagines the lives of women who have long been overlooked.', 20, 0),
(0, 1849137345, 'Then She Was Gone', 'Lisa Jewell', 'Fiction', 'New', '15.99', 'book_covers/gone.jpg', 'Ten years after her teenage daughter went missing, a mother begins a new relationship only to discover she cannot truly move on until she answers lingering questions about the past. Laurel Macks life stopped in many ways the day her 15-year-old daughter, Ellie, left the house to study at the library and never returned.', 20, 0),
(0, 1849137346, 'To Kill A Mockingbird', 'Harper Lee', 'Fiction', 'Classic', '19.99', 'book_covers/mockingbird.jpg', 'Set in the small Southern town of Maycomb, Alabama, during the Depression, To Kill a Mockingbird follows three years in the life of 8-year-old Scout Finch, her brother, Jem, and their father, Atticus--three years punctuated by the arrest and eventual trial of a young black man accused of raping a white woman.', 20, 0),
(0, 1849137347, 'Verity', 'Colleen Hoover', 'Fiction', 'Regular', '16.99', 'book_covers/verity.jpg', 'Lowen Ashleigh is a struggling writer on the brink of financial ruin when she accepts the job offer of a lifetime. Jeremy Crawford, husband of bestselling author Verity Crawford, has hired Lowen to complete the remaining books in a successful series his injured wife is unable to finish. Lowen decides to keep the manuscript hidden from Jeremy, knowing its contents could devastate the already grieving father. But as Lowen’s feelings for Jeremy begin to intensify, she recognizes all the ways she could benefit if he were to read his wife’s words. After all, no matter how devoted Jeremy is to his injured wife, a truth this horrifying would make it impossible for him to continue loving her.', 20, 0),
(0, 1849137348, 'Walden', 'Henry David Thoreau', 'Nonfiction', 'Regular', '15.99', 'book_covers/walden.jpg', 'Walden details Henry David Thoreaus two-year stay in a self-built cabin by a lake in the woods, sharing what he learned about solitude, nature, work, thinking and fulfillment during his break from modern city life.', 20, 0),
(0, 1849137349, 'When No One Is Watching', 'Alyssa Cole', 'Fiction', 'Regular', '13.99', 'book_covers/watching.jpg', 'Sydney Green is Brooklyn born and raised, but her beloved neighborhood seems to change every time she blinks. Condos are sprouting like weeds, FOR SALE signs are popping up overnight, and the neighbors she’s known all her life are disappearing. To hold onto her community’s past and present, Sydney channels her frustration into a walking tour and finds an unlikely and unwanted assistant in one of the new arrivals to the block—her neighbor Theo. But Sydney and Theo’s deep dive into history quickly becomes a dizzying descent into paranoia and fear. Their neighbors may not have moved to the suburbs after all, and the push to revitalize the community may be more deadly than advertised.', 20, 0),
(0, 1849137350, 'Where The Crawdads Sing', 'Delia Owens', 'Fiction', 'Bestseller', '20.99', 'book_covers/crawdads.jpg', 'For years, rumors of the “Marsh Girl” haunted Barkley Cove, a quiet fishing village. Kya Clark is barefoot and wild; unfit for polite society. So in late 1969, when the popular Chase Andrews is found dead, locals immediately suspect her. In Where the Crawdads Sing, Owens juxtaposes an exquisite ode to the natural world against a profound coming of age story and haunting mystery. Thought-provoking, wise, and deeply moving, Owens’s debut novel reminds us that we are forever shaped by the child within us, while also subject to the beautiful and violent secrets that nature keeps.', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `cart_item_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `isbn` int(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ordered_Items`
--

CREATE TABLE `Ordered_Items` (
  `ordered_item_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `isbn` int(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `confirmation_number` int(20) NOT NULL,
  `order_date` date NOT NULL,
  `subtotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `user_id`, `confirmation_number`, `order_date`, `subtotal`) VALUES
(1, 3, 1983478677, '2022-04-11', 20),
(2, 4, 1956723459, '2022-03-12', 42),
(3, 4, 1856384771, '2022-04-01', 78),
(4, 5, 1758683473, '2022-04-08', 54),
(5, 6, 1758456372, '2022-04-09', 18),
(6, 7, 1235676438, '2022-04-22', 34),
(7, 3, 1748397483, '2022-03-11', 37),
(8, 4, 1754385379, '2022-04-29', 88),
(9, 5, 1051705944, '2022-04-29', 127),
(10, 6, 1510350784, '2022-04-30', 453),
(11, 4, 1578749923, '2022-05-01', 157),
(12, 4, 1754799458, '2022-05-01', 323),
(13, 4, 1353453455, '2022-04-28', 89),
(14, 5, 1575757676, '2022-04-27', 75),
(15, 6, 1465657577, '2022-04-17', 65),
(16, 6, 1938485785, '2022-04-16', 15),
(17, 3, 1934955685, '2022-04-23', 15),
(18, 7, 1356766655, '2022-04-21', 15),
(19, 4, 1464665788, '2022-04-20', 16),
(20, 5, 2039485588, '2022-04-20', 16),
(21, 6, 1900044556, '2022-04-20', 29),
(22, 7, 1785737777, '2022-04-20', 39),
(23, 6, 1968585678, '2022-04-04', 49),
(24, 4, 1645656761, '2022-04-05', 55),
(25, 5, 1873465677, '2022-04-13', 44),
(26, 5, 1156464656, '2022-04-25', 33),
(27, 6, 1758789875, '2022-05-01', 32),
(28, 7, 1589683868, '2022-05-01', 31),
(29, 7, 1385368841, '2022-04-30', 30),
(30, 4, 1905450990, '2022-04-21', 233);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(40) NOT NULL,
  `type` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `type`, `name`, `email`, `address`, `city`, `state`, `zip`, `dob`, `password`) VALUES
(0, 0, 'Admin', 'admin@email.com', 'remote', 'any city', 'any state', 0, '0000-00-00', '$2y$10$/DbgfCM9OP1overJIhc5wOtgAglkiXNI7lD9Jsuk8GQPmU5pgNkbq'),
(1, 1, 'Nicholas Sparks', 'nicholas@email.com', '123 Main St.', 'Omaha', 'NE', 68007, '2022', '$2y$10$xXhkoeuNxeusJs3cU8kKauJ8NVYJFA.gTMyN8nBxzFgYT0U33evhS'),
(2, 2, 'Lysanne Scheider', 'lysanne_schneider1@hotmail.com', '8729 Railroad St.', 'Mahwah', 'NJ', 7430, '1985-03-13', '$2y$10$FCG1TiYsKuvyQYvu60sYMO/GOD1bJAThB.rTi22OsqLk7WRNPp.Ga'),
(3, 2, 'Jere Morehad', 'president@yahoo.com', '8555 Griffin Road', 'Athens', 'GA', 30605, '1956-07-16', '$2y$10$jkhci1ftvpd9xNbhemc3mOsWaJxMaQhse.Sn3SF/OHXuCKwPrRGku'),
(4, 2, 'Sachin Meena', 'meena@uga.edu', '200 D. W. Brooks Drive', 'Athens', 'GA', 30605, '2022', '$2y$10$dFmFzKRjgPKrJZWxTPxiquD.httZQt0eO2GjZpxuMbkgDxNJj23xi'),
(5, 2, 'Jane Doe', 'jane_doe@yahoo.com', '72 West Amerige Ave.', 'Oswego', 'NY', 13126, '1973-08-05', '$2y$10$ASJ1QQdAmyLo8ewK9VsFM.J2YQlrU4SOg1aiqqgS/nCp5Th7YvClK'),
(6, 2, 'Ethan Brown', 'alayna81@hotmail.com', '7265 N. Roosevelt Circle', 'Muncie', 'IN', 47302, '1993-10-11', '$2y$10$mO9CSbCwIc/hzE0/gnZx5u..RfIoFjLpzwadDLZ8f1uz7SWN/GiKK'),
(7, 2, 'John Parker', 'johnny25@gmail.com', '162 Pineknoll St.', 'Thibodaux', 'LA', 70301, '1963-03-11', '$2y$10$GV01TO.kytrJYkhPTOuNreaRKpgtLTMslwO3mREm/PK8.zOi5F9sO'),
(8, 1, 'Janet Smith', 'jan14@gmail.com', '537 Green Swamp Dr.', 'Minneapolis', 'MN', 55406, '2022', '$2y$10$McRCk1xx65dK.U2.ghjCx.2v3ytMd9m/ZzdbEfY1GBmhlwZNxjZ9q'),
(9, 1, 'Aiden Wallas', 'aiden.spinka@yahoo.com', '4 South Charles St.', 'Fredricksburg', 'VA', 22405, '2022', '$2y$10$t7H7twBRb/bpFKjsLhUYZuSYSTFfx9kCwmaTTWEOkXqLaxiH/Uxa6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `Ordered_Items`
--
ALTER TABLE `Ordered_Items`
  ADD PRIMARY KEY (`ordered_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `isbn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1849137351;

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cart_item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Ordered_Items`
--
ALTER TABLE `Ordered_Items`
  MODIFY `ordered_item_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Books`
--
ALTER TABLE `Books`
  ADD CONSTRAINT `Books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Cart_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `Books` (`isbn`);

--
-- Constraints for table `Ordered_Items`
--
ALTER TABLE `Ordered_Items`
  ADD CONSTRAINT `Ordered_Items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`),
  ADD CONSTRAINT `Ordered_Items_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `Cart` (`isbn`);

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
