-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 24, 2023 at 12:45 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

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
-- Table structure for table `Bag`
--

CREATE TABLE `Bag` (
  `bag_item_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `book_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `user_id` int(20) NOT NULL,
  `book_id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `year` int(20) NOT NULL,
  `price` decimal(30,2) NOT NULL,
  `category` varchar(20) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `stock` int(20) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`user_id`, `book_id`, `title`, `author`, `year`, `price`, `category`, `cover`, `stock`, `description`) VALUES
(0, 1849137300, 'A Clash of Kings', 'George R.R. Martin', 1998, '20.99', 'Collections', 'book_covers/clashofkings.jpg', 20, 'Game of Thrones Book 2: A Clash of Kings continues the gripping tale of power struggles in Westeros. As new claimants to the throne emerge and war engulfs the realm, the characters face escalating threats from rival factions and mystical creatures that dwell beyond the Wall.'),
(0, 1849137301, 'A Tale of Two Cities', 'Charles Dickens', 1859, '11.99', 'Classic', 'book_covers/taleoftwocities.jpg', 20, 'The novel tells the story of the French Doctor Manette, his 18-year-long imprisonment in the Bastille in Paris, and his release to live in London with his daughter Lucie whom he had never met. The story is set against the conditions that led up to the French Revolution and the Reign of Terror.'),
(1, 1849137302, 'A Walk to Reuser', 'Nicholas Sparks', 1999, '15.99', 'Fiction', 'book_covers/walktoreuser.jpg', 20, 'Set in a small town during the 1950s, A Walk to Reuser is the story of an only son of a wealthy family that finds true love with the most unexpected person. The daughter of a minister (Mandy Moore) meets the only son (Shane West) and the story takes us through hard times, love and bitter sweet passion.'),
(0, 1849137303, 'American Dirt', 'Jeanine Cummins', 2020, '17.99', 'Fiction', 'book_covers/americandirt.jpg', 20, 'Lydia lives in Acapulco. She has a son, Luca, the love of her life, and a wonderful husband who is a journalist. And while cracks are beginning to show in Acapulco because of the Bagels, the life of Lydia is, by and large, fairly comfortable. But after the husbands tell-all profile of the newest drug lord is published, none of their lives will ever be the same.'),
(0, 1849137304, 'An Ordinary Age', 'Rainesford Stauffer', 2021, '11.99', 'Nonfiction', 'book_covers/anordinaryage.jpg', 20, 'From chronic burnout to the loneliness epidemic to the strictures of social media, An Ordinary Age leads with empathy in exploring the myriad challenges facing young adults, while also advocating for a better path forward: one where young people can live authentic lives filled with love, community, and self-knowledge.\r\n'),
(0, 1849137305, 'Apples Never Fall', 'Liane Moriarty', 2021, '28.99', 'Fiction', 'book_covers/applesneverfall.jpg', 20, 'Apples Never Fall follows the four Delaney siblings after the disappearance of their mother, Joy Delaney. The police soon identify their father, Stan, as a possible person of interest in her case. As they try to unravel the mystery of what happened to her or where she went, the four siblings -- Troy, Brooke, Logan and Amy -- are forced to confront truths about their relationships with each other, with their significant others, with their parents and about their parents marriage.\r\n'),
(0, 1849137306, 'Bleak House', 'Charles Dickens', 1852, '19.99', 'Nonfiction', 'book_covers/bleakhouse.jpg', 20, 'Bleak House is the story of the Jarndyce family, who wait in vain to inherit money from a disputed fortune in the settlement of the extremely long-running lawsuit of Jarndyce and Jarndyce.'),
(0, 1849137307, 'Crying in H Mart', 'Michelle Zauner', 2021, '21.99', 'Nonfiction', 'book_covers/cryinginhmart.jpg', 20, 'In this exquisite story of family, food, grief, and endurance, Michelle Zauner proves herself far more than a dazzling singer, songwriter, and guitarist. With humor and heart, she tells of growing up one of the few Asian American kids at her school in Eugene, Oregon; of struggling with her mothers particular, high expectations of her; of a painful adolescence; of treasured months spent in her grandmothers tiny apartment in Seoul, where she and her mother would bond, late at night, over heaping plates of food.'),
(1, 1849137309, 'Dear John', 'Nicholas Sparks', 2006, '16.99', 'Nonfiction', 'book_covers/dearjohn.jpg', 20, 'An angry rebel, John dropped out of school and enlisted in the Army, not knowing what else to do with his life--until he meets the girl of his dreams, Savannah. Their mutual attraction quickly grows into the kind of love that leaves Savannah waiting for John to finish his tour of duty, and John wanting to settle down with the woman who has captured his heart.'),
(0, 1849137310, 'Great Expectations', 'Charles Dickens', 1861, '10.99', 'Classic', 'book_covers/greatexpectations.jpg', 20, 'Humble, orphaned Pip is apprenticed to the dirty work of the forge but dares to dream of becoming a gentleman — and one day, under sudden and enigmatic circumstances, he finds himself in possession of \"great expectations.\" In this gripping tale of crime and guilt, revenge and reward, the compelling characters include Magwitch, the fearful and fearsome convict; Estella, whose beauty is excelled only by her haughtiness; and the embittered Miss Havisham, an eccentric jilted bride.'),
(0, 1849137311, 'Hostage', 'Clare Mackintosh', 2021, '16.99', 'Nonfiction', 'book_covers/hostage.jpg', 20, 'Mina is trying to focus on her job as a flight attendant, not the problems of her five-year-old daughter back home, or the fissures in her marriage. But the plane has barely taken off when Mina receives a chilling note from an anonymous passenger, someone intent on ensuring the plane never reaches its destination. Someone who needs Minas assistance and who knows exactly how to make her comply.'),
(0, 1849137312, 'In Cold Blood', 'Truman Capote', 1966, '15.99', 'Nonfiction', 'book_covers/incoldblood.jpg', 20, 'On November 15, 1959, in the small town of Holcomb, Kansas, four users of the Clutter family were savagely murdered by blasts from a shotgun held a few inches from their faces. There was no apparent motive for the crime, and there were almost no clues. As Truman Capote reconstructs the murder and the investigation that led to the capture, trial, and execution of the killers, he generates both mesmerizing suspense and astonishing empathy. At the center of his study are the amoral young killers Perry Smith and Dick Hickcock, who, vividly drawn by Capote, are shown to be reprehensible yet entirely and frighteningly human.'),
(0, 1849137313, 'Little Dorrit', 'Charles Dickens', 1855, '15.99', 'Nonfiction', 'book_covers/littledorrit.jpg', 20, 'The novel attacks the injustices of the contemporary English legal system, particularly the institution of debtors prison. Amy Dorrit, referred to as Little Dorrit, is born in and lives much of her life at the Marshalsea prison, where her father is imprisoned for debt.'),
(0, 1849137314, 'Malibu Rising', 'Taylor Jenkins Reid', 2021, '27.99', 'New', 'book_covers/maliburising.jpg', 20, 'Four famous siblings throw an epic party to celebrate the end of the summer. But over the course of twenty-four hours, the family drama that ensues will change their lives will change forever.'),
(0, 1849137315, 'Of Mice and Men', 'John Steinbeck', 1937, '10.99', 'Classic', 'book_covers/ofmiceandmen.jpg', 20, 'Of Mice and Men narrates the experiences of George Milton and Lennie Small, two displaced migrant ranch workers, who move from place to place in California in search of new job opportunities during the Great Depression in the United States.'),
(0, 1849137317, 'One By One', 'Ruth Ware', 2020, '16.99', 'Fiction', 'book_covers/onebyone.jpg', 20, 'A group of employees on a corporate retreat to a picturesque ski lodge in the French Alps find their getaway horribly disrupted when an avalanche cuts off their access to the outside world.'),
(0, 1849137318, 'People We Meet On Vacation', 'Emily Henry', 2021, '15.99', 'Bestseller', 'book_covers/peoplewemeetonvacation.jpg', 20, 'People We Meet on Vacation is a collection of in-joke travel memories. It is equal parts hilarious and shockingly tender. Poppy and Alex are complete opposites. But miraculously, they are also best friends, and ever since college, they have taken an annual summer vacation together.'),
(0, 1849137319, 'Pride and Prejudice', 'Jane Austen', 1813, '13.99', 'Classic', 'book_covers/prideandprejudice.jpg', 20, 'Pride and Prejudice follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love and marry.'),
(0, 1849137320, 'Project Hail Mary', 'Andy Weir', 2021, '28.99', 'Fiction', 'book_covers/hailmary.jpg', 20, 'Ryland Grace is the sole survivor on a desperate, last-chance mission—and if he fails, humanity and the Earth itself will perish. Except that right now, he does not know that. He cannot even reuser his own name, let alone the nature of his assignment or how to complete it.'),
(0, 1849137321, 'Ready Player Two', 'Ernest Cline', 2020, '16.99', 'Fiction', 'book_covers/readyplayertwo.jpg', 20, 'Days after winning Oasis founder James Hallidays contest, Wade Watts makes a discovery that changes everything. Hidden within Hallidays vaults, waiting for his heir to find, lies a technological advancement that will once again change the world and make the Oasis a thousand times more wondrous—and addictive—than even Wade dreamed possible.'),
(0, 1849137322, 'Run, Rose, Run', 'Dolly Parton', 2022, '29.99', 'New', 'book_covers/runroserun.jpg', 20, 'The New York Times bestseller, which features details from Parton’s long career in country music, follows a promising country music star who is on the run from her past.'),
(0, 1849137323, 'Shadows Reel', 'C.J. Box', 2021, '17.99', 'Nonfiction', 'book_covers/shadowsreel.jpg', 20, 'Wyoming Game Warden Joe Picketts job has many times put his wife and daughters in harms way. Now the tables turn as his wife discovers something that puts the Pickett family in a killers crosshairs in this thrilling new novel in the bestselling series.'),
(0, 1849137324, 'Silent Spring', 'Rachel Carson', 1962, '13.99', 'Nonfiction', 'book_covers/silentspring.jpg', 20, 'Silent Spring is an environmental science book. The book documents the adverse environmental effects caused by the indiscriminate use of pesticides. Carson accused the chemical industry of spreading disinformation, and public officials of accepting the industrys marketing claims unquestioningly.'),
(0, 1849137325, 'The Alchemist', 'Paulo Coelho', 1988, '16.99', 'Nonfiction', 'book_covers/thealchemist.jpg', 20, 'This story, dazzling in its powerful simplicity and soul-stirring wisdom, is about an Andalusian shepherd boy named Santiago, who travels from his homeland in Spain to the Egyptian desert in search of a treasure buried near the Pyramids. Along the way, he meets a Romany woman, a man who calls himself a king, and an alchemist, all of whom point Santiago in the right direction for his quest. No one knows what the treasure is, or whether Santiago will be able to surmount the obstacles in his path; but what starts out as a journey to find worldly goods turns into a discovery of treasure within.'),
(0, 1849137326, 'The Call of the Wild', 'Jack London', 1903, '15.99', 'Classic', 'book_covers/thecallofthewild.jpg', 20, 'Based on London\'s experiences as a gold prospector in the Canadian wilderness and his ideas about nature and the struggle for existence, The Call of the Wild is a tale about unbreakable spirit and the fight for survival in the frozen Alaskan Klondike.'),
(0, 1849137327, 'The Catcher in the Rye', 'J.D. Salinger', 1951, '15.99', 'Classic', 'book_covers/thecatcherintherye.jpg', 20, 'It is Christmas time and Holden Caulfield has just been expelled from yet another school. Fleeing the crooks at Pencey Prep, he pinballs around New York City seeking solace in fleeting encounters - shooting the bull with strangers in dive hotels, wandering alone round Central Park, getting beaten up by pimps and cut down by erstwhile girlfriends. The city is beautiful and terrible, in all its neon loneliness and seedy glamour, its mingled sense of possibility and emptiness. Holden passes through it like a ghost, thinking always of his kid sister Phoebe, the only person who really understands him, and his determination to escape the phonies and find a life of true meaning.'),
(1, 1849137328, 'The Choice', 'Nicholas Sparks', 2007, '15.99', 'Fiction', 'book_covers/thechoice.jpg', 20, 'Travis Parker has everything a man could want: a good job, loyal friends, even a waterfront home in small-town North Carolina. In full pursuit of the good life - boating, swimming, and barbecues with his good-natured buddies -- he holds the vague conviction that a serious relationship with a woman would only cramp his style. That is, until Gabby Holland moves in next door. Spanning the eventful years of young love, marriage, and family, THE CHOICE ultimately confronts us with the most heartwrenching question of all: how far would you go to keep the hope of love alive?'),
(0, 1849137329, 'The Diary of a Young Girl', 'Anne Frank', 1947, '14.99', 'Nonfiction', 'book_covers/thediaryofayounggirl.jpg', 20, 'In 1942, with the Nazis occupying Holland, a thirteen-year-old Jewish girl and her family fled their home in Amsterdam and went into hiding. For the next two years, until their whereabouts were betrayed to the Gestapo, the Franks and another family lived cloistered in the “Secret Annexe” of an old office building. Cut off from the outside world, they faced hunger, boredom, the constant cruelties of living in confined quarters, and the ever-present threat of discovery and death. In her diary, Anne Frank recorded vivid impressions of her experiences during this period. By turns thoughtful, moving, and surprisingly humorous, her account offers a fascinating commentary on human courage and frailty and a compelling self-portrait of a sensitive and spirited young woman whose promise was tragically cut short.'),
(0, 1849137330, 'The Four Winds', 'Kristin Hannah', 2021, '28.99', 'Fiction', 'book_covers/thefourwinds.jpg', 20, 'Millions are out of work and a drought has broken the Great Plains. Farmers are fighting to keep their land and their livelihoods as the crops are failing, the water is drying up, and dust threatens to bury them all. One of the darkest periods of the Great Depression, the Dust Bowl era, has arrived with a vengeance. In this uncertain and dangerous time, Elsa Martinelli—like so many of her neighbors—must make an agonizing choice: fight for the land she loves or go west, to California, in search of a better life. The Four Winds is an indelible portrait of America and the American Dream, as seen through the eyes of one indomitable woman whose courage and sacrifice will come to define a generation.'),
(0, 1849137331, 'The Glass Hotel', 'Emily St. John Mandel', 2020, '16.99', 'Bestseller', 'book_covers/theglasshotel.jpg', 20, 'Vincent is a bartender at the Hotel Caiette, a five-star lodging on the northernmost tip of Vancouver Island. On the night she meets Jonathan Alkaitis, a hooded figure scrawls a message on the lobby\'s glass wall: \"Why don\'t you swallow broken glass.\" High above Manhattan, a greater crime is committed: Alkaitis is running an international Ponzi scheme, moving imaginary sums of money through clients\' accounts. When the financial empire collapses, it obliterates countless fortunes and devastates lives. Vincent, who had been posing as Jonathan\'s wife, walks away into the night. Years later, a victim of the fraud is hired to investigate a strange occurrence: a woman has seemingly vanished from the deck of a container ship between ports of call.'),
(0, 1849137332, 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, '16.99', 'Classic', 'book_covers/thegreatgatsby.jpg', 20, 'The story is of the fabulously wealthy Jay Gatsby and his new love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted \"gin was the national drink and sex the national obsession,\" it is an exquisitely crafted tale of America in the 1920s.'),
(0, 1849137333, 'The Guest List', 'Lucy Foley', 2020, '16.99', 'Fiction', 'book_covers/theguestlist.jpg', 20, 'On an island off the coast of Ireland, guests gather to celebrate two people joining their lives together as one. The groom: handsome and charming, a rising television star. The bride: smart and ambitious, a magazine author. It’s a wedding for a magazine, or for a celebrity: the designer dress, the remote location, the luxe party favors, the boutique whiskey. The cell phone service may be spotty and the waves may be rough, but every detail has been expertly planned and will be expertly executed.'),
(0, 1849137335, 'The Last Thing He Told Me', 'Laura Dave', 2021, '26.99', 'Fiction', 'book_covers/thelastthinghetoldme.jpg', 20, 'Before Owen Michaels disappears, he manages to smuggle a note to his beloved wife of one year: \"Protect her.\" Despite her confusion and fear, Hannah Hall knows exactly to whom the note refers: Owen’s sixteen-year-old daughter, Bailey. Bailey, who lost her mother tragically as a child. Bailey, who wants absolutely nothing to do with her new stepmother. Hannah and Bailey set out to discover the truth, together. But as they start putting together the pieces of Owen’s past, they soon realize they are also building a new future. One neither Hannah nor Bailey could have anticipated.'),
(0, 1849137336, 'The Lightning Rod', 'Brad Meltzer', 2021, '19.99', 'Fiction', 'book_covers/thelightningrod.jpg', 20, 'Archie Mint has led a charmed life--he has got a beautiful wife, two impressive kids, and a successful military career. When he is killed while trying to stop a robbery in his own home, his family is shattered--and then shocked when the other shoe drops. Mint\'s charmed life, so perfect on the surface, held criminal secrets none of them could have imagined.'),
(0, 1849137337, 'The Maid', 'Nita Prose', 2021, '26.99', 'Fiction', 'book_covers/themaid.jpg', 20, 'Molly Gray is not like everyone else. She struggles with social skills and misreads the intentions of others. Her gran used to interpret the world for her, codifying it into simple rules that Molly could live by. A Clue-like, locked-room mystery and a heartwarming journey of the spirit, The Maid explores what it means to be the same as everyone else and yet entirely different—and reveals that all mysteries can be solved through connection to the human heart.'),
(0, 1849137338, 'The Midnight Library', 'Matt Haig', 2020, '25.99', 'Fiction', 'book_covers/themidnightlibrary.jpg', 20, 'Nora Seed finds herself faced with this decision. Faced with the possibility of changing her life for a new one, following a different career, undoing old breakups, realizing her dreams of becoming a glaciologist; she must search within herself as she travels through the Midnight Library to decide what is truly fulfilling in life, and what makes it worth living in the first place.'),
(0, 1849137339, 'The Outsiders', 'S.E. Hinton', 1967, '19.99', 'Classic', 'book_covers/theoutsiders.jpg', 20, 'The Outsiders is about two weeks in the life of a 14-year-old boy. The novel tells the story of Ponyboy Curtis and his struggles with right and wrong in a society in which he believes that he is an outsider. According to Ponyboy, there are two kinds of people in the world: greasers and socs. A soc (short for \"social\") has money, can get away with just about anything, and has an attitude longer than a limousine. A greaser, on the other hand, always lives on the outside and needs to watch his back. Ponyboy is a greaser, and he has always been proud of it, even willing to rumble against a gang of socs for the sake of his fellow greasers--until one terrible night when his friend Johnny kills a soc.'),
(0, 1849137341, 'The Push', 'Ashley Audrain', 2021, '14.99', 'Fiction', 'book_covers/thepush.jpg', 20, 'Blythe Connor is determined that she will be the warm, comforting mother to her new baby Violet that she herself never had. The Push is a tour de force you will read in a sitting, an utterly immersive novel that will challenge everything you think you know about motherhood, about what we owe our children, and what it feels like when women are not believed.'),
(1, 1849137342, 'The Return', 'Nicholas Sparks', 2021, '16.99', 'Fiction', 'book_covers/thereturn.jpg', 20, 'Trevor Benson never intended to move back to New Bern, NC. But when a mortar blast outside the hospital where he worked as an orthopedic surgeon sent him home from Afghanistan with devastating injuries, the dilapidated cabin he inherited from his grandfather seemed as good a place to regroup as any. Tending to his grandfather\'s beloved bee hives while gearing up for a second stint in medical school, Trevor is not prepared to fall in love with a local . . . and yet, from their very first encounter, his connection with Natalie Masterson cannot be ignored. But even as she seems to reciprocate his feelings, she remains frustratingly distant, making Trevor wonder what she is hiding.'),
(0, 1849137344, 'The Wolf Den', 'Elodie Harper', 2021, '16.99', 'Fiction', 'book_covers/thewolfden.jpg', 20, 'Amara was once a beloved daughter, until her father\'s death plunged her family into penury. Now she is a slave in Pompeii\'s infamous brothel, owned by a man she despises. Sharp, clever, and resourceful, Amara is forced to hide her talents. For as a she-wolf, her only value lies in the desire she can stir in others. Set in Pompeii\'s lupanar, The Wolf Den reimagines the lives of women who have long been overlooked.'),
(0, 1849137346, 'To Kill A Mockingbird', 'Harper Lee', 1960, '19.99', 'Classic', 'book_covers/tokillamockingbird.jpg', 20, 'Set in the small Southern town of Maycomb, Alabama, during the Depression, To Kill a Mockingbird follows three years in the life of 8-year-old Scout Finch, her brother, Jem, and their father, Atticus--three years punctuated by the arrest and eventual trial of a young black man accused of raping a white woman.'),
(0, 1849137347, 'Verity', 'Colleen Hoover', 2018, '16.99', 'Bestseller', 'book_covers/verity.jpg', 5, 'Lowen Ashleigh is a struggling writer on the brink of financial ruin when she accepts the job offer of a lifetime. Jeremy Crawford, husband of bestselling author Verity Crawford, has hired Lowen to complete the remaining books in a successful series his injured wife is unable to finish. Lowen decides to keep the manuscript hidden from Jeremy, knowing its contents could devastate the already grieving father. But as Lowen’s feelings for Jeremy begin to intensify, she recognizes all the ways she could benefit if he were to read his wife’s words. After all, no matter how devoted Jeremy is to his injured wife, a truth this horrifying would make it impossible for him to continue loving her.'),
(0, 1849137348, 'Walden', 'Henry David Thoreau', 1854, '15.99', 'Fiction', 'book_covers/walden.jpg', 20, 'Walden details Henry David Thoreau\'s two-year stay in a self-built cabin by a lake in the woods, sharing what he learned about solitude, nature, work, thinking, and fulfillment during his break from modern city life.'),
(0, 1849137349, 'When No One Is Watching', 'Alyssa Cole', 2020, '13.99', 'Fiction', 'book_covers/whennooneiswatching.jpg', 20, 'Sydney Green is Brooklyn born and raised, but her beloved neighborhood seems to change every time she blinks. Condos are sprouting like weeds, FOR SALE signs are popping up overnight, and the neighbors she’s known all her life are disappearing. To hold onto her community’s past and present, Sydney channels her frustration into a walking tour and finds an unlikely and unwanted assistant in one of the new arrivals to the block—her neighbor Theo. But Sydney and Theo’s deep dive into history quickly becomes a dizzying descent into paranoia and fear. Their neighbors may not have moved to the suburbs after all, and the push to revitalize the community may be more deadly than advertised.'),
(0, 1849137350, 'Where The Crawdads Sing', 'Delia Owens', 2018, '20.99', 'Bestseller', 'book_covers/wherethecrawdadssing.jpg', 5, 'For years, rumors of the “Marsh Girl” haunted Barkley Cove, a quiet fishing village. Kya Clark is barefoot and wild; unfit for polite society. So in late 1969, when the popular Chase Andrews is found dead, locals immediately suspect her. In Where the Crawdads Sing, Owens juxtaposes an exquisite ode to the natural world against a profound coming of age story and haunting mystery. Thought-provoking, wise, and deeply moving, Owens’s debut novel reminds us that we are forever shaped by the child within us, while also subject to the beautiful and violent secrets that nature keeps.'),
(30, 1849137351, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 1997, '15.99', 'Collections', 'book_covers/philosophersstone.jpg', 20, 'Harry Potter Book 1: Join young Harry Potter as he discovers he is a wizard and attends the magical Hogwarts School of Witchcraft and Wizardry. Follow his adventures as he faces challenges, makes friends, and confronts the dark wizard, Lord Voldemort.'),
(30, 1849137352, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 1998, '15.99', 'Collections', 'book_covers/chamberofsecrets.jpg', 20, 'Harry Potter Book 2: Harry returns to Hogwarts for his second year, only to find mysterious happenings that threaten the safety of the students. With the help of his friends, he must uncover the secrets of the Chamber of Secrets and its deadly monster.'),
(30, 1849137353, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', 1999, '15.99', 'Collections', 'book_covers/prisonerofazkaban.jpg', 20, 'Harry Potter Book 3: In his third year at Hogwarts, Harry discovers that an escaped prisoner, Sirius Black, is after him. As he unravels the truth about Sirius and a dangerous traitor, Harry faces new challenges, encounters magical creatures, and learns the power of friendship.'),
(30, 1849137354, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 2000, '16.99', 'Collections', 'book_covers/gobletoffire.jpg', 20, 'Harry Potter Book 4: Harry competes in the Triwizard Tournament, a perilous contest between three schools of magic. As dark forces rise, Harry finds himself entangled in a web of deception, facing unimaginable challenges and a return of Lord Voldemort.'),
(30, 1849137355, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', 2003, '16.99', 'Collections', 'book_covers/orderofthephoenix.jpg', 20, 'Harry Potter Book 5: In his fifth year, Harry encounters a secret group called the Order of the Phoenix, as he struggles against an oppressive government and the revival of Lord Voldemort\'s forces. As friendships are tested, Harry must gather allies to prepare for the ultimate battle.'),
(30, 1849137356, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling', 2005, '18.99', 'Collections', 'book_covers/half-bloodprince.jpg', 20, 'Harry Potter Book 6: As Voldemort and his Death Eaters grow stronger, Dumbledore guides Harry in his sixth year at Hogwarts, revealing crucial information about Voldemort\'s past and the Horcruxes. Dark times lie ahead as the battle between good and evil intensifies.'),
(30, 1849137357, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 2007, '18.99', 'Collections', 'book_covers/deathlyhallows.jpg', 20, 'Harry Potter Book 7: The epic conclusion to the Harry Potter series. Harry, Ron, and Hermione embark on a dangerous quest to find and destroy Voldemort\'s remaining Horcruxes. As they face sacrifices, loss, and the ultimate battle, the fate of the wizarding world hangs in the balance.'),
(0, 1849137365, 'Twilight', 'Stephenie Meyer', 2005, '18.99', 'Collections', 'book_covers/twilight.jpg', 20, 'Twilight Book 1: Twilight tells the story of Bella Swan, a teenage girl who falls in love with Edward Cullen, a vampire. As their forbidden love blossoms, they face challenges from their supernatural worlds and must protect their relationship from the dangers that surround them.'),
(0, 1849137366, 'New Moon', 'Stephenie Meyer', 2006, '18.99', 'Collections', 'book_covers/newmoon.jpg', 20, 'Twilight Book 2: In New Moon, Bella faces deep heartbreak when Edward leaves her. She finds solace in her friendship with Jacob Black, who harbors his own supernatural secret. As Bella navigates a world without Edward, she discovers more about the mythical creatures that exist.'),
(0, 1849137367, 'Eclipse', 'Stephenie Meyer', 2007, '18.99', 'Collections', 'book_covers/eclipse.jpg', 20, 'Twilight Book 3: Eclipse explores the ongoing love triangle between Bella, Edward, and Jacob. As Bella is torn between her love for a vampire and her friendship with a werewolf, an army of newborn vampires threatens their peaceful existence. Bella must make choices that will impact her life forever.'),
(0, 1849137368, 'Breaking Dawn', 'Stephenie Meyer', 2008, '18.99', 'Collections', 'book_covers/breakingdawn.jpg', 20, 'Twilight Book 4: In Breaking Dawn, Bella and Edward face the consequences of their choices as they become husband and wife. Bella discovers unexpected complications in her pregnancy, leading to a perilous situation that tests the loyalties of their vampire and werewolf allies.'),
(0, 1849137369, 'The Hunger Games', 'Suzanne Collins', 2008, '16.99', 'Collections', 'book_covers/hungergames.jpg', 20, 'The Hunger Games Book 1: The Hunger Games is set in a dystopian world where children from twelve districts are forced to participate in a televised fight to the death. Follow Katniss Everdeen as she becomes the symbol of hope and rebellion against the oppressive Capitol.'),
(0, 1849137370, 'Catching Fire', 'Suzanne Collins', 2009, '16.99', 'Collections', 'book_covers/catchingfire.jpg', 20, 'The Hunger Games Book 2: Catching Fire continues Katniss Everdeen\'s journey as she faces the aftermath of winning the Hunger Games. The Capitol seeks revenge, and Katniss finds herself thrust into another deadly competition that challenges her loyalty and puts her loved ones in danger.'),
(0, 1849137371, 'Mockingjay', 'Suzanne Collins', 2010, '17.99', 'Collections', 'book_covers/mockingjay.jpg', 20, 'The Hunger Games Book 3: In Mockingjay, Katniss becomes the face of the rebellion against the Capitol. As the districts unite in a fight for freedom, she must make difficult choices and confront the harsh realities of war to bring an end to the Hunger Games once and for all.'),
(0, 1849137372, 'A Game of Thrones', 'George R.R. Martin', 1996, '19.99', 'Collections', 'book_covers/gameofthrones.jpg', 20, 'A Game of Thrones is the first book in the epic fantasy series A Song of Ice and Fire. Set in the fictional land of Westeros, the story follows noble families as they vie for control of the Iron Throne. Intrigue, political maneuvering, and supernatural forces shape the fate of the Seven Kingdoms.'),
(0, 1849137374, 'A Storm of Swords', 'George R.R. Martin', 2000, '21.99', 'Collections', 'book_covers/stormofswords.jpg', 20, 'Game of Thrones Book 3: A Storm of Swords is a thrilling installment in the A Song of Ice and Fire series. Loyalties shift, alliances form and crumble, and the fate of Westeros hangs in the balance as rival houses clash, battles are fought, and secrets are revealed.'),
(0, 1849137375, 'Gone Girl', 'Gillian Flynn', 2012, '15.99', 'Bestseller', 'book_covers/gonegirl.jpg', 20, 'Gone Girl is a psychological thriller by Gillian Flynn. When Amy Dunne goes missing on her wedding anniversary, her husband Nick becomes the prime suspect. The book delves into themes of marriage, trust, and the dark complexities of human relationships.'),
(0, 1849137376, 'A Little Life', 'Hanya Yanagihara', 2015, '16.99', 'Nonfiction', 'book_covers/alittlelife.jpg', 5, 'A Little Life is a novel by Hanya Yanagihara that follows the lives of four college friends as they navigate their careers, relationships, and personal struggles in New York City. It delves into themes of friendship, trauma, love, and the lasting impact of past experiences. The book offers a deeply emotional and immersive reading experience.'),
(0, 1849137377, 'It Ends with Us', 'Colleen Hoover', 2016, '14.99', 'Bestseller', 'book_covers/itendswithus.jpg', 5, 'It Ends with Us is a contemporary romance novel by Colleen Hoover. It explores themes of love, relationships, and the complexities of making difficult choices. The book offers an emotional and thought-provoking reading experience.'),
(1, 1849137378, 'The Last Song', 'Nicholas Sparks', 2009, '12.99', 'Fiction', 'book_covers/thelastsong.jpg', 20, 'The Last Song is a novel by Nicholas Sparks. It tells the story of a teenage girl named Ronnie who spends a summer in a small coastal town, where she finds love and discovers the healing power of music. The book explores themes of family, forgiveness, and self-discovery.'),
(1, 1849137379, 'The Notebook', 'Nicholas Sparks', 1996, '11.99', 'Fiction', 'book_covers/thenotebook.jpg', 5, 'The Notebook is a romantic novel by Nicholas Sparks. It follows the love story of Noah and Allie, two young people from different social backgrounds who fall in love during the summer of 1940. The book explores themes of love, fate, and the enduring power of memories.'),
(0, 1849137380, 'It Starts with Us', 'Colleen Hoover', 2016, '13.99', 'Bestseller', 'book_covers/itstartswithus.jpg', 20, 'It Starts with Us is a contemporary romance novel by Colleen Hoover. It explores themes of love, friendship, and the impact of past traumas on present relationships. The book offers a compelling and emotionally charged reading experience.'),
(0, 1849137381, 'Icebreaker', 'Hannah Grace', 2017, '9.99', 'New', 'book_covers/icebreaker.jpg', 5, 'Anastasia Allen has worked her entire life for a shot at Team USA. A competitive figure skater since she was five years old, a full college scholarship thanks to her place on the Maple Hills skating team, and a schedule that would make even the most driven person weep, Stassie comes to win. No exceptions.'),
(0, 1849137382, 'The Spanish Love Deception', 'Elena Armas', 2021, '15.99', 'New', 'book_covers/thespanishlovedeception.jpg', 20, 'The Spanish Love Deception is a contemporary romance novel by Elena Armas. It tells the story of Vera, a young woman who embarks on a fake relationship with a charming stranger while on a trip to Spain. The book is filled with witty banter, steamy moments, and unexpected twists.'),
(0, 1849137383, 'The American Roommate Experiment', 'Talia Hibbert', 2022, '14.99', 'New', 'book_covers/theamericanroommateexperiment.jpg', 20, 'The American Roommate Experiment is a standalone novel that follows The Spanish Love Deception and tells the love story of Rosie Graham, Catalina\'s best friends. The book is filled with humor, relatable characters, and swoon-worthy moments.'),
(0, 1849137384, 'Ugly Love', 'Colleen Hoover', 2014, '12.99', 'Bestseller', 'book_covers/uglylove.jpg', 20, 'Ugly Love is a contemporary romance novel by Colleen Hoover. It explores the complicated relationship between Tate and Miles, two individuals with emotional baggage and a mutual attraction. The book delves into themes of love, vulnerability, and the power of healing.'),
(0, 1849137385, 'I\'m Glad My Mom Died', 'Jeanette McCurdy', 2021, '16.99', 'Nonfiction', 'book_covers/imgladmymomdied.jpg', 5, 'I’m Glad My Mom Died, a memoir by Jennette McCurdy, details the author’s experiences as a child star on Nickelodeon and her relationship with her mother. Jennette’s first book explores complex experiences with body image, love, family, religion, and the child acting industry.'),
(0, 1849137386, 'Love, Pamela', 'Pamela Anderson', 2021, '13.99', 'Nonfiction', 'book_covers/lovepamela.jpg', 20, 'The actress, activist, and once infamous Playboy Playmate reclaims the narrative of her life in a memoir that defies expectation in both content and approach, blending searing prose with snippets of original poetry.'),
(0, 1849137387, 'Becoming', 'Michelle Obama', 2018, '19.99', 'Nonfiction', 'book_covers/becoming.jpg', 20, 'Becoming is a memoir by former First Lady Michelle Obama. It offers a personal and inspiring account of her childhood, career, and time in the White House. The book explores themes of identity, perseverance, and the power of hope.'),
(0, 1849137388, 'Anne of Green Gables', 'Lucy Maud Montgomery', 1908, '10.99', 'Classic', 'book_covers/anneofgreengables.jpg', 20, 'Anne of Green Gables is a classic novel by Lucy Maud Montgomery. It follows the story of Anne Shirley, an imaginative and spirited orphan who is mistakenly sent to live with an elderly brother and sister on Prince Edward Island. The book explores themes of friendship, love, and the joys and challenges of growing up.'),
(0, 1849137389, 'Wuthering Heights', 'Emily Bronte', 1847, '11.99', 'Classic', 'book_covers/wutheringheights.jpg', 20, 'Wuthering Heights is a classic novel by Emily Bronte. It tells the story of the passionate and tumultuous love between Catherine Earnshaw and Heathcliff, set against the backdrop of the Yorkshire moors. The book delves into themes of love, revenge, and the destructive power of unresolved emotions.'),
(0, 1849137390, 'Lord of the Flies', 'William Golding', 1954, '9.99', 'Classic', 'book_covers/lordoftheflies.jpg', 20, 'Lord of the Flies is a classic novel by William Golding. It follows a group of young boys stranded on an uninhabited island and explores the breakdown of societal order and the inherent darkness of human nature. The book raises thought-provoking questions about power, morality, and the nature of civilization.'),
(0, 1849137391, 'Charlotte\'s Web', 'E.B. White', 1952, '8.99', 'Classic', 'book_covers/charlottesweb.jpg', 20, 'Charlotte\'s Web is a beloved children\'s novel by E.B. White. It tells the story of Wilbur, a pig who befriends a spider named Charlotte, and their efforts to save Wilbur from becoming bacon. The book explores themes of friendship, loyalty, and the circle of life.'),
(0, 1849137392, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 2005, '13.99', 'Fiction', 'book_covers/thegirlwiththedragontattoo.jpg', 20, 'The Girl with the Dragon Tattoo is a gripping mystery novel by Stieg Larsson. It follows the story of Mikael Blomkvist, a journalist, and Lisbeth Salander, a computer hacker, as they investigate a decades-old disappearance and unravel a complex web of intrigue and crime. The book is filled with suspense, twists, and unforgettable characters.'),
(21, 1849137393, 'The Summer I Turned Pretty', 'Jenny Han', 2009, '12.99', 'Collections', 'book_covers/thesummeriturnedpretty.jpg', 5, 'The Summer I Turned Pretty is a young adult romance series by Jenny Han. It follows the story of Belly Conklin and her summer experiences at the beach house with the Fisher boys, Conrad and Jeremiah. The series explores themes of love, friendship, and coming of age.'),
(21, 1849137394, 'It\'s Not Summer Without You', 'Jenny Han', 2010, '13.99', 'Collections', 'book_covers/itsnotsummerwithoutyou.jpg', 20, 'It\'s Not Summer Without You is the second book in the \"The Summer I Turned Pretty\" series by Jenny Han. It continues the story of Belly and her summer adventures with the Fisher boys, as they navigate love, heartbreak, and the complexities of growing up.'),
(21, 1849137395, 'We\'ll Always Have Summer', 'Jenny Han', 2011, '13.99', 'Collections', 'book_covers/wellalwayshavesummer.jpg', 20, 'We\'ll Always Have Summer is the third and final book in the \"The Summer I Turned Pretty\" series by Jenny Han. It concludes the story of Belly, Conrad, and Jeremiah as they face the challenges of adulthood, making decisions that will shape their futures and test their relationships.'),
(0, 1849137396, 'Normal People', 'Sally Rooney', 2018, '12.99', 'Bestseller', 'book_covers/normalpeople.jpg', 20, 'Normal People is a novel by Sally Rooney that explores the complex relationship between Marianne and Connell as they navigate love, friendship, and the challenges of growing up. The book offers an intimate and honest portrayal of young adulthood.'),
(0, 1849137397, 'Milk and Honey', 'Rupi Kaur', 2014, '9.99', 'Fiction', 'book_covers/milkandhoney.jpg', 20, 'Milk and Honey is a collection of poetry and prose by Rupi Kaur. It delves into themes of love, loss, trauma, and healing. The book is divided into four chapters, each exploring different aspects of life and emotions.'),
(0, 1849137398, 'The Woman in Me', 'Britney Spears', 2023, '20.99', 'New', 'book_covers/thewomaninme.jpg', 20, 'Britney Spears: The Woman in Me is a biography of the iconic pop star Britney Spears. It offers an intimate look at her life, career, and the challenges she faced in the public eye. The book explores her journey to fame, personal struggles, and ultimate resilience.'),
(0, 1849137399, 'The Handmaid\'s Tale', 'Margaret Atwood', 1985, '15.99', 'Bestseller', 'book_covers/thehandmaidstale.jpg', 20, 'The Handmaid\'s Tale is a dystopian novel by Margaret Atwood. It is set in a future society where women are subjugated and used for reproductive purposes. The book follows the story of Offred as she navigates the oppressive regime and seeks to reclaim her freedom.'),
(0, 1849137400, 'Rich Dad Poor Dad', 'Robert T. Kiyosaki', 1997, '14.99', 'Nonfiction', 'book_covers/richdadpoordad.jpg', 5, 'Rich Dad Poor Dad is a personal finance classic by Robert T. Kiyosaki. It explores the differences in mindset and financial strategies between two father figures and offers valuable insights on building wealth and achieving financial independence.'),
(0, 1849137401, 'A Good Girl\'s Guide to Murder', 'Holly Jackson', 2019, '12.99', 'Fiction', 'book_covers/agoodgirlsguidetomurder.jpg', 20, 'A Good Girl\'s Guide to Murder is a mystery novel by Holly Jackson. It follows the story of Pippa Fitz-Amobi as she investigates a closed murder case for a school project and uncovers shocking truths and dangerous secrets.'),
(0, 1849137402, 'Alice in Wonderland', 'Lewis Carroll', 1865, '8.99', 'Classic', 'book_covers/aliceinwonderland.jpg', 20, 'Alice in Wonderland is a beloved children\'s classic by Lewis Carroll. It tells the whimsical and fantastical adventures of Alice as she falls down a rabbit hole and encounters peculiar creatures and strange worlds.'),
(0, 1849137403, 'The Picture of Dorian Gray', 'Oscar Wilde', 1890, '11.99', 'Classic', 'book_covers/thepictureofdoriangray.jpg', 20, 'The Picture of Dorian Gray is a Gothic novel by Oscar Wilde. It follows the story of Dorian Gray, a young man who remains young and beautiful while a portrait of him ages and reflects his hidden sins. The book delves into themes of vanity, decadence, and morality.'),
(0, 1849137405, 'Emma', 'Jane Austen', 1815, '9.99', 'Classic', 'book_covers/emma.jpg', 5, 'Emma is a classic novel by Jane Austen. It follows the story of Emma Woodhouse, a young woman with a penchant for matchmaking. The book explores themes of love, social status, and the consequences of meddling in others\' lives.'),
(0, 1849137406, 'Adventures of Huckleberry Finn', 'Mark Twain', 1884, '8.99', 'Classic', 'book_covers/adventuresofhuckleberryfinn.jpg', 20, 'Adventures of Huckleberry Finn is a classic novel by Mark Twain. It follows the journey of Huck Finn and Jim, a runaway slave, as they travel along the Mississippi River and encounter various challenges and adventures.'),
(0, 1849137407, 'The Adventures of Tom Sawyer', 'Mark Twain', 1876, '8.99', 'Classic', 'book_covers/theadventuresoftomsawyer.jpg', 20, 'The Adventures of Tom Sawyer is a classic novel by Mark Twain. It follows the mischievous and adventurous escapades of Tom Sawyer, a young boy living in a small town on the banks of the Mississippi River.'),
(0, 1849137408, 'Pet Sematary', 'Stephen King', 1983, '14.99', 'Fiction', 'book_covers/petsematary.jpg', 20, 'Pet Sematary is a horror novel by Stephen King. It follows the story of Dr. Louis Creed as he discovers a mysterious burial ground in the woods near his new home. The book explores themes of grief, loss, and the consequences of tampering with death.'),
(0, 1849137409, 'Carrie', 'Stephen King', 1974, '12.99', 'Fiction', 'book_covers/carrie.jpg', 20, 'Carrie White, a friendless, bullied high-school girl from an abusive religious household discovers she has telekinetic powers. Repressed by her mother and tormented by her peers at school, her efforts to fit in lead to a horrific events during prom.'),
(0, 1849137410, 'Where\'d You Go, Bernadette', 'Maria Semple', 2012, '13.99', 'Fiction', 'book_covers/wheredyougobernadette.jpg', 20, 'Where\'d You Go, Bernadette is a novel by Maria Semple. It follows the story of Bernadette Fox, an eccentric and reclusive woman who goes missing, and her daughter Bee\'s efforts to find her. The book is a mix of comedy, drama, and mystery.'),
(0, 1849137411, 'The Adventures of Sherlock Holmes', 'Arthur Conan Doyle', 1887, '11.99', 'Fiction', 'book_covers/theadventuresofsherlockholmes.jpg', 20, 'Sherlock Holmes is a collection of detective stories featuring the famous sleuth Sherlock Holmes and his friend Dr. John Watson. The stories are filled with intrigue, deduction, and memorable characters.'),
(0, 1849137412, 'Bridge to Terabithia', 'Katherine Paterson', 1977, '9.99', 'Fiction', 'book_covers/bridgetoterabithia.jpg', 20, 'Bridge to Terabithia is a beloved children\'s novel by Katherine Paterson. It tells the story of the friendship between Jess and Leslie, who create an imaginary kingdom called Terabithia in the woods near their homes.'),
(0, 1849137413, 'Everything, Everything', 'Nicola Yoon', 2015, '12.99', 'Fiction', 'book_covers/everythingeverything.jpg', 20, 'Everything, Everything is a young adult novel by Nicola Yoon. It follows the story of Madeline, a girl with a rare condition that confines her to her home, and her blossoming relationship with her new neighbor Olly.'),
(0, 1849137414, 'Girl, Interrupted', 'Susanna Kaysen', 1993, '11.99', 'Nonfiction', 'book_covers/girlinterrupted.jpg', 20, 'Girl, Interrupted is a memoir by Susanna Kaysen. It offers a candid account of her experiences in a psychiatric hospital in the 1960s and explores themes of mental health, identity, and societal norms.'),
(0, 1849137415, 'Gone with the Wind', 'Margaret Mitchell', 1936, '15.99', 'Classic', 'book_covers/gonewiththewind.jpg', 20, 'Gone with the Wind is a historical fiction novel by Margaret Mitchell. It is set during the American Civil War and Reconstruction era and follows the life of Scarlett O\'Hara as she navigates love, loss, and the changing social landscape.'),
(0, 1849137416, 'Jane Eyre', 'Charlotte Bronte', 1847, '10.99', 'Classic', 'book_covers/janeeyre.jpg', 20, 'Jane Eyre is a classic novel by Charlotte Bronte. It follows the story of Jane Eyre, an orphaned and mistreated young woman, as she becomes a governess and finds love, independence, and her own identity.'),
(0, 1849137417, 'The Princess Bride', 'William Goldman', 1973, '9.99', 'Classic', 'book_covers/theprincessbride.jpg', 20, 'The Princess Bride is a fantasy novel by William Goldman. It is a delightful and humorous tale of adventure, romance, and swashbuckling pirates.'),
(0, 1849137419, 'Daisy Jones & The Six', 'Taylor Jenkins Reid', 2019, '14.99', 'New', 'book_covers/daisyjonesandthesix.jpg', 5, 'Daisy Jones & The Six is a novel by Taylor Jenkins Reid. It tells the story of a rock band in the 1970s and the rise to fame of its enigmatic lead singer, Daisy Jones. The book is presented in an oral history format, offering a unique and immersive reading experience.'),
(0, 1849137420, 'Divergent', 'Veronica Roth', 2011, '12.99', 'Collections', 'book_covers/divergent.jpg', 20, 'Divergent is the first book in the Divergent trilogy by Veronica Roth. It introduces readers to a dystopian Chicago where society is divided into factions based on virtues. The story follows Tris Prior as she discovers she is Divergent, possessing qualities of multiple factions.'),
(0, 1849137421, 'Insurgent', 'Veronica Roth', 2012, '13.99', 'Collections', 'book_covers/insurgent.jpg', 20, 'Insurgent is the second book in the Divergent trilogy. Tris and her friends find themselves in the midst of a growing conflict between factions, and they must face new challenges to uncover the truth about their society.'),
(0, 1849137422, 'Allegiant', 'Veronica Roth', 2013, '14.99', 'Collections', 'book_covers/allegiant.jpg', 20, 'Allegiant is the third and final book in the Divergent trilogy. Tris and her friends venture beyond the walls of Chicago and discover shocking truths about their city and its history.'),
(0, 1849137423, 'The Maze Runner', 'James Dashner', 2009, '15.99', 'Collections', 'book_covers/themazerunner.jpg', 20, 'The Maze Runner is the first book in The Maze Runner series. It follows Thomas, who wakes up in a mysterious maze with no memory of how he got there. As he and the other Gladers try to escape, they uncover dark secrets about their situation.'),
(0, 1849137424, 'The Scorch Trials', 'James Dashner', 2010, '16.99', 'Collections', 'book_covers/thescorchtrials.jpg', 20, 'The Scorch Trials is the second book in The Maze Runner series. After escaping the maze, Thomas and the others face a new set of challenges in a desolate and dangerous landscape called the Scorch.'),
(0, 1849137425, 'The Death Cure', 'James Dashner', 2011, '16.99', 'Collections', 'book_covers/thedeathcure.jpg', 20, 'The Death Cure is the third book in The Maze Runner series. Thomas embarks on a mission to save his friends from the organization known as WICKED, which has been conducting deadly experiments on them.'),
(0, 1849137426, 'Redeeming Love', 'Francine Rivers', 2005, '12.99', 'Fiction', 'book_covers/redeeminglove.jpg', 20, 'Redeeming Love is a powerful romance novel by Francine Rivers. Set in 1850s California, it retells the biblical story of Hosea and Gomer in a historical context. The book explores themes of love, redemption, and forgiveness.'),
(0, 1849137427, 'Crazy Rich Asians', 'Kevin Kwan', 2013, '15.99', 'Collections', 'book_covers/crazyrichasians.jpg', 20, 'Crazy Rich Asians is the first book in the Crazy Rich Asians series. It follows the extravagant and drama-filled lives of wealthy Asian families in Singapore and beyond.');
INSERT INTO `Books` (`user_id`, `book_id`, `title`, `author`, `year`, `price`, `category`, `cover`, `stock`, `description`) VALUES
(0, 1849137428, 'China Rich Girlfriend', 'Kevin Kwan', 2015, '16.99', 'Collections', 'book_covers/chinarichgirlfriend.jpg', 20, 'China Rich Girlfriend is the second book in the Crazy Rich Asians series. It continues the story of Rachel Chu as she delves deeper into the opulent and sometimes treacherous world of the Chinese elite.'),
(0, 1849137429, 'Rich People Problems', 'Kevin Kwan', 2017, '14.99', 'Collections', 'book_covers/richpeopleproblems.jpg', 20, 'Rich People Problems is the third and final book in the Crazy Rich Asians series. It concludes the saga of the wealthy and powerful families in Asia as they face personal and family challenges, all while living in extreme luxury.'),
(0, 1849137430, 'All the Light We Cannot See', 'Anthony Doerr', 2014, '12.99', 'Fiction', 'book_covers/allthelightwecannotsee.jpg', 20, 'All the Light We Cannot See is a historical fiction novel by Anthony Doerr. Set during World War II, the book follows the parallel stories of a blind French girl and a German soldier whose paths eventually intersect.'),
(0, 1849137431, 'Making It So', 'Patrick Stewart', 2021, '14.99', 'Nonfiction', 'book_covers/makingitso.jpg', 20, 'Patrick Stewart: Making It So is a biography of the iconic actor Patrick Stewart. It offers a glimpse into his life, career, and the experiences that shaped him as an actor and as a person.'),
(0, 1849137435, 'Life of Pi', 'Yann Martel', 2001, '10.99', 'Fiction', 'book_covers/lifeofpi.jpg', 20, 'A captivating tale of survival at sea with a Bengal tiger.'),
(0, 1849137436, 'The Giver', 'Lois Lowry', 1993, '9.99', 'Collections', 'book_covers/thegiver.jpg', 20, 'Jonas is a boy living in a community based on Sameness, and he is selected as the Receiver of Memory, and The Giver (the old Receiver) begins giving Jonas ancient memories. The Receiver acts as a source of wisdom for the community. As Jonas gets more memories, he begins to question his society.'),
(0, 1849137437, 'Gathering Blue', 'Lois Lowry', 2000, '9.99', 'Collections', 'book_covers/gatheringblue.jpg', 20, 'The second book of The Giver Quartet follows the journey of Kira, a young woman with a physical disability living in a community that shuns those with \"imperfections\". When she\'s called to the Council of Guardians, she\'s surprised to find they have an important job for her to undertake.'),
(0, 1849137438, 'Messenger', 'Lois Lowry', 2004, '9.99', 'Collections', 'book_covers/messenger.jpg', 20, 'The third book of The Giver Quartet is set in an isolated community known simply as Village, the novel focuses on a boy, Matty, who serves as message-bearer through the ominous and lethal Forest that surrounds the community.'),
(0, 1849137439, 'Son', 'Lois Lowry', 2012, '9.99', 'Collections', 'book_covers/son.jpg', 20, 'The fourth and final book of The Giver Quartet follows Claire, the birth mother of Gabriel, who was marked for \"release\" in The Giver before being taken out of the community by Jonas. Claire, obsessed with finding her son, embarks on a journey out of the community in an attempt to follow and find him.'),
(0, 1849137440, 'Duma Key', 'Stephen King', 2008, '15.99', 'Fiction', 'book_covers/dumakey.jpg', 20, 'A gripping supernatural thriller set in the Florida Keys.'),
(0, 1849137441, 'It Happened One Summer', 'Tessa Bailey', 2021, '17.99', 'Bestseller', 'book_covers/ithappenedonesummer.jpg', 5, 'It Happened One Summer is a contemporary romance about socialite Piper Bellinger reeling after a fall from grace. Following some bad choices, Piper finds herself stuck for the summer in the small town where she was born, where she might find more than she bargained for.');

-- --------------------------------------------------------

--
-- Table structure for table `Browse`
--

CREATE TABLE `Browse` (
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Browse`
--

INSERT INTO `Browse` (`name`, `category`, `description`) VALUES
('Bestsellers', 'Bestseller', 'Our most popular books. Your next read.'),
('Classics', 'Classic', 'Historical favorites. All right here.'),
('Collections', 'Collections', 'Books made just for each other.'),
('Fiction', 'Fiction', 'Let your imagination lead.'),
('New In', 'New', 'Read them before your friends spoil them.'),
('Nonfiction', 'Nonfiction', 'Memoirs, autobiographies, business, and more.');

-- --------------------------------------------------------

--
-- Table structure for table `Ordered_Items`
--

CREATE TABLE `Ordered_Items` (
  `ordered_item_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `book_id` int(20) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ordered_Items`
--

INSERT INTO `Ordered_Items` (`ordered_item_id`, `order_id`, `book_id`, `price`) VALUES
(1, 1, 1849137374, 22),
(2, 1, 1849137372, 20),
(3, 1, 1849137300, 21);

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
(1, 30, 1689876274, '2022-05-02', 63);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(20) NOT NULL,
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
(1, 1, 'Nicholas Sparks', 'nicholassparks@email.com', '123 Main St.', 'Omaha', 'NE', 68007, '2022', '$2y$10$xXhkoeuNxeusJs3cU8kKauJ8NVYJFA.gTMyN8nBxzFgYT0U33evhS'),
(2, 2, 'Lysanne Scheider', 'lysanne_schneider1@hotmail.com', '8729 Railroad St.', 'Mahwah', 'NJ', 7430, '1985-03-13', '$2y$10$FCG1TiYsKuvyQYvu60sYMO/GOD1bJAThB.rTi22OsqLk7WRNPp.Ga'),
(3, 2, 'Lucas Anderson', 'lucas@example.com', '8765 Redwood Drive', 'New York', 'NY', 10001, '1997-05-21', '$2y$10$WLS9hF/n8hyZjgQyCQdIPeNWU.1iB9QZ9TSWuIOt5.AIVlEqZZyma'),
(4, 2, 'Mia White', 'mia@example.com', '4321 Elm Court', 'Chicago', 'IL', 60601, '1984-11-10', '$2y$10$fH2/lXaSYrQnpD3oiV4B.uPlcI3J1zIbRmY5x0Ib1ODnGLuKCOiIK'),
(5, 2, 'Jane Doe', 'jane_doe@yahoo.com', '72 West Amerige Ave.', 'Oswego', 'NY', 13126, '1973-08-05', '$2y$10$ASJ1QQdAmyLo8ewK9VsFM.J2YQlrU4SOg1aiqqgS/nCp5Th7YvClK'),
(6, 2, 'Ethan Brown', 'alayna81@hotmail.com', '7265 N. Roosevelt Circle', 'Muncie', 'IN', 47302, '1993-10-11', '$2y$10$mO9CSbCwIc/hzE0/gnZx5u..RfIoFjLpzwadDLZ8f1uz7SWN/GiKK'),
(7, 2, 'John Parker', 'johnny25@gmail.com', '162 Pineknoll St.', 'Thibodaux', 'LA', 70301, '1963-03-11', '$2y$10$GV01TO.kytrJYkhPTOuNreaRKpgtLTMslwO3mREm/PK8.zOi5F9sO'),
(8, 2, 'Janet Smith', 'jan14@gmail.com', '537 Green Swamp Dr.', 'Minneapolis', 'MN', 55406, '2022', '$2y$10$McRCk1xx65dK.U2.ghjCx.2v3ytMd9m/ZzdbEfY1GBmhlwZNxjZ9q'),
(9, 2, 'Aiden Wallas', 'aiden.spinka@yahoo.com', '4 South Charles St.', 'Fredricksburg', 'VA', 22405, '2022', '$2y$10$t7H7twBRb/bpFKjsLhUYZuSYSTFfx9kCwmaTTWEOkXqLaxiH/Uxa6'),
(10, 2, 'Michael Johnson', 'michael@example.com', '1234 Elm Street', 'Springfield', 'IL', 62701, '1988-05-15', '$2y$10$rgHZKT9NHPgzQ7Bkt7dpluWU1vca2vjnlMW/rId/X9P7hvqAqAAGC'),
(11, 2, 'Emily Davis', 'emily@example.com', '5678 Oak Avenue', 'Riverside', 'CA', 92501, '1992-09-22', '$2y$10$Pk4NrBb5goO2tRvESez.xOXvCOCohuWgSM6nIT/gmsbP.8iQ5yS/W'),
(12, 2, 'Daniel Brown', 'daniel@example.com', '9012 Maple Drive', 'Portland', 'OR', 97201, '1985-12-01', '$2y$10$KPZLHWW/.IFbOP3CG36nbOb46IGL1IYMC3bhNtVJ7eWYU2Yr3mkq2'),
(13, 2, 'Olivia Wilson', 'olivia@example.com', '3456 Pine Lane', 'Birmingham', 'AL', 35201, '1995-02-14', '$2y$10$44o3K9SN7MhepmP6ToJXVe7rGQRgBj8ECRFP3uvqf0y0LmkKrS68K'),
(14, 2, 'James Lee', 'james@example.com', '7890 Cedar Road', 'Seattle', 'WA', 98101, '1980-11-30', '$2y$10$bjYICW.j5G2j6hAC3invtuNyfbP6NJsQPMWWNpSC1C8CZG.fQ1kKy'),
(15, 2, 'Sophia Martinez', 'sophia@example.com', '2345 Birch Street', 'Miami', 'FL', 33101, '1998-07-11', '$2y$10$grvD9C2HS2htQQ6Z.vc.aOx.ji4U7S20cFkXxzyrX4uNwrw6VHUSa'),
(16, 2, 'William Anderson', 'william@example.com', '6789 Sycamore Avenue', 'Dallas', 'TX', 75201, '1990-04-19', '$2y$10$ie8os7sAlJagfb9gHfNUyOb8gUVvtmb6uOrJk5v5f9h9AmEB33ynG'),
(17, 2, 'Ava Thomas', 'ava@example.com', '8765 Redwood Drive', 'New York', 'NY', 10001, '1994-10-08', '$2y$10$B9JmqfDrcMRQ8fr7DP6YOOXMrtMH.JD1mz.RdXHr0NpC/LT69Q.sO'),
(18, 2, 'Oliver White', 'oliver@example.com', '4321 Elm Court', 'Chicago', 'IL', 60601, '1983-06-27', '$2y$10$6ZVpmY.CZxHWZmuft.wylOKrSC5jtVAP5Seokkk3frBIMX1gC.1oi'),
(19, 2, 'Isabella Lopez', 'isabella@example.com', '1357 Maple Avenue', 'San Francisco', 'CA', 94101, '1991-03-03', '$2y$10$d6bsds15i6Frtwjgq0T5a.wS5r8.a6sFh6nXqemjsMAqsbzNtvYeO'),
(20, 1, 'Molly Smith', 'molly@mail.com', '178 Sandy Springs Lane', 'Bufurd', 'GA', 12345, '1965-07-31', '$2y$10$B3laa5ynEsk7lN.Ht4Qojuf.wI55KDGJOdyedpA5z7Z09aXa7rLSK'),
(21, 1, 'Jenny Han', 'jennyhan@example.com', '7890 Cherry Avenue', 'New York', 'NY', 10001, '1980-09-03', '$2y$10$9nXnU7E8DqxzVT9U2LzRKeTgf1p3W2ZZoE.CcUD3ctScU3ms4ZnTm'),
(22, 2, 'Emma Johnson', 'emma@example.com', '9876 Elm Street', 'Springfield', 'IL', 62701, '1992-08-17', '$2y$10$JN6Z/04wSy3ovl95IKyjZeq7QpHL9F12emolK7DO6Iu1zIiY3aASG'),
(23, 2, 'Noah Williams', 'noah@example.com', '5432 Oak Avenue', 'Riverside', 'CA', 92501, '1990-11-25', '$2y$10$17bShy77Gv1dJHKT8dSZQeN/gYDC8uRhfy12fgQaASRvpl7exP4Di'),
(24, 2, 'Olivia Davis', 'olivia.davis@example.com', '9012 Maple Drive', 'Portland', 'OR', 97201, '1987-06-08', '$2y$10$E.34mElJHb76SmlbciHBlu2PCzhK8DlbMlhHt8LSOXWXor0KFvVQa'),
(25, 2, 'Liam Brown', 'liam@example.com', '3456 Pine Lane', 'Birmingham', 'AL', 35201, '1996-04-03', '$2y$10$MeoXX7gpgOhqD7OTFuJ8YeM0ExFSH.M0a1QH.o9wcdW9eGzU/7uWq'),
(26, 2, 'Ava Martinez', 'ava.martinez@example.com', '7890 Cedar Road', 'Seattle', 'WA', 98101, '1989-02-12', '$2y$10$G33XT7ldGnxylZqJG2kbUu7CndFvbIO5ch3g9R0kvThrtu7nFsvDe'),
(27, 2, 'Jamie Lee', 'jamie@example.com', '2345 Birch Street', 'Miami', 'FL', 33101, '1993-09-29', '$2y$10$y4BMmtoeOgIAnUOMs9uoXuQebPMKXs81ewFW9E20FPPTyF9t1o0iC'),
(28, 2, 'Amelia Taylor', 'amelia.taylor@example.com', '6789 Sycamore Avenue', 'Dallas', 'TX', 75201, '1991-12-14', '$2y$10$.7XFm6CFJIAq2aXY/K4t1.rk77sFP.BAA23zTgIkKkz5lZQ1YdAau'),
(29, 2, 'Benjamin Lopez', 'benjamin@example.com', '1357 Maple Avenue', 'San Francisco', 'CA', 94101, '1999-03-28', '$2y$10$R/1T4p0fwF/tiFf1m9PdquLEhko3IfITJemFPVEYU2FCBKU6gPpVi'),
(30, 1, 'J. K. Rowling', 'jkrowling@email.com', '4567 Willow Lane', 'London', 'AL', 12345, '2022', '$2y$10$lX8YmiuZR/YzuPC4BakCnOMrHlM40j3DJ1EzN92LbThYgl90fZu/C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bag`
--
ALTER TABLE `Bag`
  ADD PRIMARY KEY (`bag_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Ordered_Items`
--
ALTER TABLE `Ordered_Items`
  ADD PRIMARY KEY (`ordered_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

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
-- AUTO_INCREMENT for table `Bag`
--
ALTER TABLE `Bag`
  MODIFY `bag_item_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1849137442;

--
-- AUTO_INCREMENT for table `Ordered_Items`
--
ALTER TABLE `Ordered_Items`
  MODIFY `ordered_item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
