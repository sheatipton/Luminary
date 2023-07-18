-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 18, 2023 at 09:50 PM
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
  `isbn` int(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bag`
--

INSERT INTO `Bag` (`bag_item_id`, `user_id`, `isbn`, `quantity`) VALUES
(6, 0, 1849137314, 1);

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
(0, 849137373, 'A Clash of Kings', 'George R.R. Martin', 1998, '20.99', 'Collections', 'book_covers/clashofkings.jpg', 20, 'A Clash of Kings continues the gripping tale of power struggles in Westeros. As new claimants to the throne emerge and war engulfs the realm, the characters face escalating threats from rival factions and mystical creatures that dwell beyond the Wall.'),
(0, 1849137301, 'A Tale of Two Cities', 'Charles Dickens', 1859, '11.99', 'Classic', 'book_covers/taleoftwocities.jpg', 20, 'The novel tells the story of the French Doctor Manette, his 18-year-long imprisonment in the Bastille in Paris, and his release to live in London with his daughter Lucie whom he had never met. The story is set against the conditions that led up to the French Revolution and the Reign of Terror.'),
(1, 1849137302, 'A Walk to Remember', 'Nicholas Sparks', 1999, '15.99', 'New', 'book_covers/walktoremember.jpg', 20, 'Set in a small town during the 1950s, A Walk to Remember is the story of an only son of a wealthy family that finds true love with the most unexpected person. The daughter of a minister (Mandy Moore) meets the only son (Shane West) and the story takes us through hard times, love and bitter sweet passion.'),
(0, 1849137303, 'American Dirt', 'Jeanine Cummins', 2020, '17.99', 'Fiction', 'book_covers/americandirt.jpg', 20, 'Lydia lives in Acapulco. She has a son, Luca, the love of her life, and a wonderful husband who is a journalist. And while cracks are beginning to show in Acapulco because of the Bagels, the life of Lydia is, by and large, fairly comfortable. But after the husbands tell-all profile of the newest drug lord is published, none of their lives will ever be the same.'),
(0, 1849137304, 'An Ordinary Age', 'Rainesford Stauffer', 2021, '11.99', 'Nonfiction', 'book_covers/anordinaryage.jpg', 20, 'From chronic burnout to the loneliness epidemic to the strictures of social media, An Ordinary Age leads with empathy in exploring the myriad challenges facing young adults, while also advocating for a better path forward: one where young people can live authentic lives filled with love, community, and self-knowledge.\r\n'),
(0, 1849137305, 'Apples Never Fall', 'Liane Moriarty', 2021, '28.99', 'Fiction', 'book_covers/applesneverfall.jpg', 20, 'Apples Never Fall follows the four Delaney siblings after the disappearance of their mother, Joy Delaney. The police soon identify their father, Stan, as a possible person of interest in her case. As they try to unravel the mystery of what happened to her or where she went, the four siblings -- Troy, Brooke, Logan and Amy -- are forced to confront truths about their relationships with each other, with their significant others, with their parents and about their parents marriage.\r\n'),
(0, 1849137306, 'Bleak House', 'Charles Dickens', 1852, '19.99', 'Nonfiction', 'book_covers/bleakhouse.jpg', 20, 'Bleak House is the story of the Jarndyce family, who wait in vain to inherit money from a disputed fortune in the settlement of the extremely long-running lawsuit of Jarndyce and Jarndyce.'),
(0, 1849137307, 'Crying in H Mart', 'Michelle Zauner', 2021, '21.99', 'Nonfiction', 'book_covers/cryinginhmart.jpg', 20, 'In this exquisite story of family, food, grief, and endurance, Michelle Zauner proves herself far more than a dazzling singer, songwriter, and guitarist. With humor and heart, she tells of growing up one of the few Asian American kids at her school in Eugene, Oregon; of struggling with her mothers particular, high expectations of her; of a painful adolescence; of treasured months spent in her grandmothers tiny apartment in Seoul, where she and her mother would bond, late at night, over heaping plates of food.'),
(1, 1849137309, 'Dear John', 'Nicholas Sparks', 2006, '16.99', 'Nonfiction', 'book_covers/dearjohn.jpg', 20, 'An angry rebel, John dropped out of school and enlisted in the Army, not knowing what else to do with his life--until he meets the girl of his dreams, Savannah. Their mutual attraction quickly grows into the kind of love that leaves Savannah waiting for John to finish his tour of duty, and John wanting to settle down with the woman who has captured his heart.'),
(0, 1849137310, 'Great Expectations', 'Charles Dickens', 1861, '10.99', 'Classic', 'book_covers/greatexpectations.jpg', 20, 'Humble, orphaned Pip is apprenticed to the dirty work of the forge but dares to dream of becoming a gentleman — and one day, under sudden and enigmatic circumstances, he finds himself in possession of \"great expectations.\" In this gripping tale of crime and guilt, revenge and reward, the compelling characters include Magwitch, the fearful and fearsome convict; Estella, whose beauty is excelled only by her haughtiness; and the embittered Miss Havisham, an eccentric jilted bride.'),
(0, 1849137311, 'Hostage', 'Clare Mackintosh', 2021, '16.99', 'Nonfiction', 'book_covers/hostage.jpg', 20, 'Mina is trying to focus on her job as a flight attendant, not the problems of her five-year-old daughter back home, or the fissures in her marriage. But the plane has barely taken off when Mina receives a chilling note from an anonymous passenger, someone intent on ensuring the plane never reaches its destination. Someone who needs Minas assistance and who knows exactly how to make her comply.'),
(0, 1849137312, 'In Cold Blood', 'Truman Capote', 1966, '15.99', 'Nonfiction', 'book_covers/incoldblood.jpg', 20, 'On November 15, 1959, in the small town of Holcomb, Kansas, four members of the Clutter family were savagely murdered by blasts from a shotgun held a few inches from their faces. There was no apparent motive for the crime, and there were almost no clues. As Truman Capote reconstructs the murder and the investigation that led to the capture, trial, and execution of the killers, he generates both mesmerizing suspense and astonishing empathy. At the center of his study are the amoral young killers Perry Smith and Dick Hickcock, who, vividly drawn by Capote, are shown to be reprehensible yet entirely and frighteningly human.'),
(0, 1849137313, 'Little Dorrit', 'Charles Dickens', 1855, '15.99', 'Nonfiction', 'book_covers/littledorrit.jpg', 20, 'The novel attacks the injustices of the contemporary English legal system, particularly the institution of debtors prison. Amy Dorrit, referred to as Little Dorrit, is born in and lives much of her life at the Marshalsea prison, where her father is imprisoned for debt.'),
(0, 1849137314, 'Malibu Rising', 'Taylor Jenkins Reid', 2021, '27.99', 'New', 'book_covers/maliburising.jpg', 20, 'Four famous siblings throw an epic party to celebrate the end of the summer. But over the course of twenty-four hours, the family drama that ensues will change their lives will change forever.'),
(0, 1849137315, 'Of Mice and Men', 'John Steinbeck', 1937, '10.99', 'Classic', 'book_covers/ofmiceandmen.jpg', 20, 'Of Mice and Men narrates the experiences of George Milton and Lennie Small, two displaced migrant ranch workers, who move from place to place in California in search of new job opportunities during the Great Depression in the United States.'),
(0, 1849137317, 'One By One', 'Ruth Ware', 2020, '16.99', 'Fiction', 'book_covers/onebyone.jpg', 20, 'A group of employees on a corporate retreat to a picturesque ski lodge in the French Alps find their getaway horribly disrupted when an avalanche cuts off their access to the outside world.'),
(0, 1849137318, 'People We Meet On Vacation', 'Emily Henry', 2021, '15.99', 'Bestseller', 'book_covers/peoplewemeetonvacation.jpg', 20, 'People We Meet on Vacation is a collection of in-joke travel memories. It is equal parts hilarious and shockingly tender. Poppy and Alex are complete opposites. But miraculously, they are also best friends, and ever since college, they have taken an annual summer vacation together.'),
(0, 1849137319, 'Pride and Prejudice', 'Jane Austen', 1813, '13.99', 'Classic', 'book_covers/prideandprejudice.jpg', 20, 'Pride and Prejudice follows the turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner. They must overcome the titular sins of pride and prejudice in order to fall in love and marry.'),
(0, 1849137320, 'Project Hail Mary', 'Andy Weir', 2021, '28.99', 'New', 'book_covers/hailmary.jpg', 20, 'Ryland Grace is the sole survivor on a desperate, last-chance mission—and if he fails, humanity and the Earth itself will perish. Except that right now, he does not know that. He cannot even remember his own name, let alone the nature of his assignment or how to complete it.'),
(0, 1849137321, 'Ready Player Two', 'Ernest Cline', 2020, '16.99', 'Fiction', 'book_covers/readyplayertwo.jpg', 20, 'Days after winning Oasis founder James Hallidays contest, Wade Watts makes a discovery that changes everything. Hidden within Hallidays vaults, waiting for his heir to find, lies a technological advancement that will once again change the world and make the Oasis a thousand times more wondrous—and addictive—than even Wade dreamed possible.'),
(0, 1849137322, 'Run, Rose, Run', 'Dolly Parton', 2022, '29.99', 'Bestseller', 'book_covers/runroserun.jpg', 20, 'Every song tells a story. She is a star on the rise, singing about the hard life behind her. She is also on the run. Find a future, lose a past.'),
(0, 1849137323, 'Shadows Reel', 'C.J. Box', 2021, '17.99', 'Nonfiction', 'book_covers/shadowsreel.jpg', 20, 'Wyoming Game Warden Joe Picketts job has many times put his wife and daughters in harms way. Now the tables turn as his wife discovers something that puts the Pickett family in a killers crosshairs in this thrilling new novel in the bestselling series.'),
(0, 1849137324, 'Silent Spring', 'Rachel Carson', 1962, '13.99', 'Nonfiction', 'book_covers/silentspring.jpg', 20, 'Silent Spring is an environmental science book. The book documents the adverse environmental effects caused by the indiscriminate use of pesticides. Carson accused the chemical industry of spreading disinformation, and public officials of accepting the industrys marketing claims unquestioningly.'),
(0, 1849137325, 'The Alchemist', 'Paulo Coelho', 1988, '16.99', 'Nonfiction', 'book_covers/thealchemist.jpg', 20, 'This story, dazzling in its powerful simplicity and soul-stirring wisdom, is about an Andalusian shepherd boy named Santiago, who travels from his homeland in Spain to the Egyptian desert in search of a treasure buried near the Pyramids. Along the way, he meets a Romany woman, a man who calls himself a king, and an alchemist, all of whom point Santiago in the right direction for his quest. No one knows what the treasure is, or whether Santiago will be able to surmount the obstacles in his path; but what starts out as a journey to find worldly goods turns into a discovery of treasure within.'),
(0, 1849137326, 'The Call of the Wild', 'Jack London', 1903, '15.99', 'Classic', 'book_covers/thecallofthewild.jpg', 20, 'Based on London\'s experiences as a gold prospector in the Canadian wilderness and his ideas about nature and the struggle for existence, The Call of the Wild is a tale about unbreakable spirit and the fight for survival in the frozen Alaskan Klondike.'),
(0, 1849137327, 'The Catcher in the Rye', 'J.D. Salinger', 1951, '15.99', 'Classic', 'book_covers/thecatcherintherye.jpg', 20, 'It is Christmas time and Holden Caulfield has just been expelled from yet another school. Fleeing the crooks at Pencey Prep, he pinballs around New York City seeking solace in fleeting encounters - shooting the bull with strangers in dive hotels, wandering alone round Central Park, getting beaten up by pimps and cut down by erstwhile girlfriends. The city is beautiful and terrible, in all its neon loneliness and seedy glamour, its mingled sense of possibility and emptiness. Holden passes through it like a ghost, thinking always of his kid sister Phoebe, the only person who really understands him, and his determination to escape the phonies and find a life of true meaning.'),
(1, 1849137328, 'The Choice', 'Nicholas Sparks', 2007, '15.99', 'Fiction', 'book_covers/thechoice.jpg', 20, 'Travis Parker has everything a man could want: a good job, loyal friends, even a waterfront home in small-town North Carolina. In full pursuit of the good life - boating, swimming, and barbecues with his good-natured buddies -- he holds the vague conviction that a serious relationship with a woman would only cramp his style. That is, until Gabby Holland moves in next door. Spanning the eventful years of young love, marriage, and family, THE CHOICE ultimately confronts us with the most heartwrenching question of all: how far would you go to keep the hope of love alive?'),
(0, 1849137329, 'The Diary of a Young Girl', 'Anne Frank', 1947, '14.99', 'Nonfiction', 'book_covers/thediaryofayounggirl.jpg', 20, 'In 1942, with the Nazis occupying Holland, a thirteen-year-old Jewish girl and her family fled their home in Amsterdam and went into hiding. For the next two years, until their whereabouts were betrayed to the Gestapo, the Franks and another family lived cloistered in the “Secret Annexe” of an old office building. Cut off from the outside world, they faced hunger, boredom, the constant cruelties of living in confined quarters, and the ever-present threat of discovery and death. In her diary, Anne Frank recorded vivid impressions of her experiences during this period. By turns thoughtful, moving, and surprisingly humorous, her account offers a fascinating commentary on human courage and frailty and a compelling self-portrait of a sensitive and spirited young woman whose promise was tragically cut short.'),
(0, 1849137330, 'The Four Winds', 'Kristin Hannah', 2021, '28.99', 'New', 'book_covers/thefourwinds.jpg', 20, 'Millions are out of work and a drought has broken the Great Plains. Farmers are fighting to keep their land and their livelihoods as the crops are failing, the water is drying up, and dust threatens to bury them all. One of the darkest periods of the Great Depression, the Dust Bowl era, has arrived with a vengeance. In this uncertain and dangerous time, Elsa Martinelli—like so many of her neighbors—must make an agonizing choice: fight for the land she loves or go west, to California, in search of a better life. The Four Winds is an indelible portrait of America and the American Dream, as seen through the eyes of one indomitable woman whose courage and sacrifice will come to define a generation.'),
(0, 1849137331, 'The Glass Hotel', 'Emily St. John Mandel', 2020, '16.99', 'Bestseller', 'book_covers/theglasshotel.jpg', 20, 'Vincent is a bartender at the Hotel Caiette, a five-star lodging on the northernmost tip of Vancouver Island. On the night she meets Jonathan Alkaitis, a hooded figure scrawls a message on the lobby\'s glass wall: \"Why don\'t you swallow broken glass.\" High above Manhattan, a greater crime is committed: Alkaitis is running an international Ponzi scheme, moving imaginary sums of money through clients\' accounts. When the financial empire collapses, it obliterates countless fortunes and devastates lives. Vincent, who had been posing as Jonathan\'s wife, walks away into the night. Years later, a victim of the fraud is hired to investigate a strange occurrence: a woman has seemingly vanished from the deck of a container ship between ports of call.'),
(0, 1849137332, 'The Great Gatsby', 'F. Scott Fitzgerald', 1925, '16.99', 'Classic', 'book_covers/thegreatgatsby.jpg', 20, 'The story is of the fabulously wealthy Jay Gatsby and his new love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted \"gin was the national drink and sex the national obsession,\" it is an exquisitely crafted tale of America in the 1920s.'),
(0, 1849137333, 'The Guest List', 'Lucy Foley', 2020, '16.99', 'Fiction', 'book_covers/theguestlist.jpg', 20, 'On an island off the coast of Ireland, guests gather to celebrate two people joining their lives together as one. The groom: handsome and charming, a rising television star. The bride: smart and ambitious, a magazine author. It’s a wedding for a magazine, or for a celebrity: the designer dress, the remote location, the luxe party favors, the boutique whiskey. The cell phone service may be spotty and the waves may be rough, but every detail has been expertly planned and will be expertly executed.'),
(0, 1849137335, 'The Last Thing He Told Me', 'Laura Dave', 2021, '26.99', 'Fiction', 'book_covers/thelastthinghetoldme.jpg', 20, 'Before Owen Michaels disappears, he manages to smuggle a note to his beloved wife of one year: \"Protect her.\" Despite her confusion and fear, Hannah Hall knows exactly to whom the note refers: Owen’s sixteen-year-old daughter, Bailey. Bailey, who lost her mother tragically as a child. Bailey, who wants absolutely nothing to do with her new stepmother. Hannah and Bailey set out to discover the truth, together. But as they start putting together the pieces of Owen’s past, they soon realize they are also building a new future. One neither Hannah nor Bailey could have anticipated.'),
(0, 1849137336, 'The Lightning Rod', 'Brad Meltzer', 2021, '19.99', 'New', 'book_covers/thelightningrod.jpg', 20, 'Archie Mint has led a charmed life--he has got a beautiful wife, two impressive kids, and a successful military career. When he is killed while trying to stop a robbery in his own home, his family is shattered--and then shocked when the other shoe drops. Mint\'s charmed life, so perfect on the surface, held criminal secrets none of them could have imagined.'),
(0, 1849137337, 'The Maid', 'Nita Prose', 2021, '26.99', 'Fiction', 'book_covers/themaid.jpg', 20, 'Molly Gray is not like everyone else. She struggles with social skills and misreads the intentions of others. Her gran used to interpret the world for her, codifying it into simple rules that Molly could live by. A Clue-like, locked-room mystery and a heartwarming journey of the spirit, The Maid explores what it means to be the same as everyone else and yet entirely different—and reveals that all mysteries can be solved through connection to the human heart.'),
(0, 1849137338, 'The Midnight Library', 'Matt Haig', 2020, '25.99', 'Fiction', 'book_covers/themidnightlibrary.jpg', 20, 'Nora Seed finds herself faced with this decision. Faced with the possibility of changing her life for a new one, following a different career, undoing old breakups, realizing her dreams of becoming a glaciologist; she must search within herself as she travels through the Midnight Library to decide what is truly fulfilling in life, and what makes it worth living in the first place.'),
(0, 1849137339, 'The Outsiders', 'S.E. Hinton', 1967, '19.99', 'Classic', 'book_covers/theoutsiders.jpg', 20, 'The Outsiders is about two weeks in the life of a 14-year-old boy. The novel tells the story of Ponyboy Curtis and his struggles with right and wrong in a society in which he believes that he is an outsider. According to Ponyboy, there are two kinds of people in the world: greasers and socs. A soc (short for \"social\") has money, can get away with just about anything, and has an attitude longer than a limousine. A greaser, on the other hand, always lives on the outside and needs to watch his back. Ponyboy is a greaser, and he has always been proud of it, even willing to rumble against a gang of socs for the sake of his fellow greasers--until one terrible night when his friend Johnny kills a soc.'),
(0, 1849137340, 'The Prince', 'Niccolò Machiavelli', 1532, '16.99', 'Fiction', 'book_covers/theprince.jpg', 20, 'Machiavelli needs to be looked at as he really was. Hence: Can Machiavelli, who makes the following observations, be Machiavellian as we understand the disparaging term?'),
(0, 1849137341, 'The Push', 'Ashley Audrain', 2021, '14.99', 'Fiction', 'book_covers/thepush.jpg', 20, 'Blythe Connor is determined that she will be the warm, comforting mother to her new baby Violet that she herself never had. The Push is a tour de force you will read in a sitting, an utterly immersive novel that will challenge everything you think you know about motherhood, about what we owe our children, and what it feels like when women are not believed.'),
(1, 1849137342, 'The Return', 'Nicholas Sparks', 2021, '16.99', 'Fiction', 'book_covers/thereturn.jpg', 20, 'Trevor Benson never intended to move back to New Bern, NC. But when a mortar blast outside the hospital where he worked as an orthopedic surgeon sent him home from Afghanistan with devastating injuries, the dilapidated cabin he inherited from his grandfather seemed as good a place to regroup as any. Tending to his grandfather\'s beloved bee hives while gearing up for a second stint in medical school, Trevor is not prepared to fall in love with a local . . . and yet, from their very first encounter, his connection with Natalie Masterson cannot be ignored. But even as she seems to reciprocate his feelings, she remains frustratingly distant, making Trevor wonder what she is hiding.'),
(0, 1849137344, 'The Wolf Den', 'Elodie Harper', 2021, '16.99', 'New', 'book_covers/thewolfden.jpg', 20, 'Amara was once a beloved daughter, until her father\'s death plunged her family into penury. Now she is a slave in Pompeii\'s infamous brothel, owned by a man she despises. Sharp, clever, and resourceful, Amara is forced to hide her talents. For as a she-wolf, her only value lies in the desire she can stir in others. Set in Pompeii\'s lupanar, The Wolf Den reimagines the lives of women who have long been overlooked.'),
(0, 1849137345, 'Then She Was Gone', 'Lisa Jewell', 2018, '15.99', 'New', 'book_covers/thethenshewasgone.jpg', 20, 'Ten years after her teenage daughter went missing, a mother begins a new relationship only to discover she cannot truly move on until she answers lingering questions about the past. Laurel Mack\'s life stopped in many ways the day her 15-year-old daughter, Ellie, left the house to study at the library and never returned.'),
(0, 1849137346, 'To Kill A Mockingbird', 'Harper Lee', 1960, '19.99', 'Classic', 'book_covers/tokillamockingbird.jpg', 20, 'Set in the small Southern town of Maycomb, Alabama, during the Depression, To Kill a Mockingbird follows three years in the life of 8-year-old Scout Finch, her brother, Jem, and their father, Atticus--three years punctuated by the arrest and eventual trial of a young black man accused of raping a white woman.'),
(0, 1849137347, 'Verity', 'Colleen Hoover', 2018, '16.99', 'Nonfiction', 'book_covers/verity.jpg', 20, 'Lowen Ashleigh is a struggling writer on the brink of financial ruin when she accepts the job offer of a lifetime. Jeremy Crawford, husband of bestselling author Verity Crawford, has hired Lowen to complete the remaining books in a successful series his injured wife is unable to finish. Lowen decides to keep the manuscript hidden from Jeremy, knowing its contents could devastate the already grieving father. But as Lowen’s feelings for Jeremy begin to intensify, she recognizes all the ways she could benefit if he were to read his wife’s words. After all, no matter how devoted Jeremy is to his injured wife, a truth this horrifying would make it impossible for him to continue loving her.'),
(0, 1849137348, 'Walden', 'Henry David Thoreau', 1854, '15.99', 'Fiction', 'book_covers/walden.jpg', 20, 'Walden details Henry David Thoreau\'s two-year stay in a self-built cabin by a lake in the woods, sharing what he learned about solitude, nature, work, thinking, and fulfillment during his break from modern city life.'),
(0, 1849137349, 'When No One Is Watching', 'Alyssa Cole', 2020, '13.99', 'Fiction', 'book_covers/whennooneiswatchingwatching.jpg', 20, 'Sydney Green is Brooklyn born and raised, but her beloved neighborhood seems to change every time she blinks. Condos are sprouting like weeds, FOR SALE signs are popping up overnight, and the neighbors she’s known all her life are disappearing. To hold onto her community’s past and present, Sydney channels her frustration into a walking tour and finds an unlikely and unwanted assistant in one of the new arrivals to the block—her neighbor Theo. But Sydney and Theo’s deep dive into history quickly becomes a dizzying descent into paranoia and fear. Their neighbors may not have moved to the suburbs after all, and the push to revitalize the community may be more deadly than advertised.'),
(0, 1849137350, 'Where The Crawdads Sing', 'Delia Owens', 2018, '20.99', 'Bestseller', 'book_covers/wherethecrawdadssing.jpg', 20, 'For years, rumors of the “Marsh Girl” haunted Barkley Cove, a quiet fishing village. Kya Clark is barefoot and wild; unfit for polite society. So in late 1969, when the popular Chase Andrews is found dead, locals immediately suspect her. In Where the Crawdads Sing, Owens juxtaposes an exquisite ode to the natural world against a profound coming of age story and haunting mystery. Thought-provoking, wise, and deeply moving, Owens’s debut novel reminds us that we are forever shaped by the child within us, while also subject to the beautiful and violent secrets that nature keeps.'),
(0, 1849137351, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 1997, '15.99', 'Collections', 'book_covers/philosophersstone.jpg', 20, 'Join young Harry Potter as he discovers he is a wizard and attends the magical Hogwarts School of Witchcraft and Wizardry. Follow his adventures as he faces challenges, makes friends, and confronts the dark wizard, Lord Voldemort.'),
(0, 1849137352, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 1998, '15.99', 'Collections', 'book_covers/chamberofsecrets.jpg', 20, 'Harry returns to Hogwarts for his second year, only to find mysterious happenings that threaten the safety of the students. With the help of his friends, he must uncover the secrets of the Chamber of Secrets and its deadly monster.'),
(0, 1849137353, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', 1999, '15.99', 'Collections', 'book_covers/prisonerofazkaban.jpg', 20, 'In his third year at Hogwarts, Harry discovers that an escaped prisoner, Sirius Black, is after him. As he unravels the truth about Sirius and a dangerous traitor, Harry faces new challenges, encounters magical creatures, and learns the power of friendship.'),
(0, 1849137354, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 2000, '16.99', 'Collections', 'book_covers/gobletoffire.jpg', 20, 'Harry competes in the Triwizard Tournament, a perilous contest between three schools of magic. As dark forces rise, Harry finds himself entangled in a web of deception, facing unimaginable challenges and a return of Lord Voldemort.'),
(0, 1849137355, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', 2003, '16.99', 'Collections', 'book_covers/orderofthephoenix.jpg', 20, 'In his fifth year, Harry encounters a secret group called the Order of the Phoenix, as he struggles against an oppressive government and the revival of Lord Voldemort\'s forces. As friendships are tested, Harry must gather allies to prepare for the ultimate battle.'),
(0, 1849137356, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling', 2005, '18.99', 'Collections', 'book_covers/half-bloodprince.jpg', 20, 'As Voldemort and his Death Eaters grow stronger, Dumbledore guides Harry in his sixth year at Hogwarts, revealing crucial information about Voldemort\'s past and the Horcruxes. Dark times lie ahead as the battle between good and evil intensifies.'),
(0, 1849137357, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 2007, '18.99', 'Collections', 'book_covers/deathlyhallows.jpg', 20, 'The epic conclusion to the Harry Potter series. Harry, Ron, and Hermione embark on a dangerous quest to find and destroy Voldemort\'s remaining Horcruxes. As they face sacrifices, loss, and the ultimate battle, the fate of the wizarding world hangs in the balance.'),
(0, 1849137365, 'Twilight', 'Stephenie Meyer', 2005, '18.99', 'Collections', 'book_covers/twilight.jpg', 20, 'Twilight tells the story of Bella Swan, a teenage girl who falls in love with Edward Cullen, a vampire. As their forbidden love blossoms, they face challenges from their supernatural worlds and must protect their relationship from the dangers that surround them.'),
(0, 1849137366, 'New Moon', 'Stephenie Meyer', 2006, '18.99', 'Collections', 'book_covers/newmoon.jpg', 20, 'In New Moon, Bella faces deep heartbreak when Edward leaves her. She finds solace in her friendship with Jacob Black, who harbors his own supernatural secret. As Bella navigates a world without Edward, she discovers more about the mythical creatures that exist.'),
(0, 1849137367, 'Eclipse', 'Stephenie Meyer', 2007, '18.99', 'Collections', 'book_covers/eclipse.jpg', 20, 'Eclipse explores the ongoing love triangle between Bella, Edward, and Jacob. As Bella is torn between her love for a vampire and her friendship with a werewolf, an army of newborn vampires threatens their peaceful existence. Bella must make choices that will impact her life forever.'),
(0, 1849137368, 'Breaking Dawn', 'Stephenie Meyer', 2008, '18.99', 'Collections', 'book_covers/breakingdawn.jpg', 20, 'In Breaking Dawn, Bella and Edward face the consequences of their choices as they become husband and wife. Bella discovers unexpected complications in her pregnancy, leading to a perilous situation that tests the loyalties of their vampire and werewolf allies.'),
(0, 1849137369, 'The Hunger Games', 'Suzanne Collins', 2008, '16.99', 'Collections', 'book_covers/hungergames.jpg', 20, 'The Hunger Games is set in a dystopian world where children from twelve districts are forced to participate in a televised fight to the death. Follow Katniss Everdeen as she becomes the symbol of hope and rebellion against the oppressive Capitol.'),
(0, 1849137370, 'Catching Fire', 'Suzanne Collins', 2009, '16.99', 'Collections', 'book_covers/catchingfire.jpg', 20, 'Catching Fire continues Katniss Everdeen\'s journey as she faces the aftermath of winning the Hunger Games. The Capitol seeks revenge, and Katniss finds herself thrust into another deadly competition that challenges her loyalty and puts her loved ones in danger.'),
(0, 1849137371, 'Mockingjay', 'Suzanne Collins', 2010, '17.99', 'Collections', 'book_covers/mockingjay.jpg', 20, 'In Mockingjay, Katniss becomes the face of the rebellion against the Capitol. As the districts unite in a fight for freedom, she must make difficult choices and confront the harsh realities of war to bring an end to the Hunger Games once and for all.'),
(0, 1849137372, 'A Game of Thrones', 'George R.R. Martin', 1996, '19.99', 'Collections', 'book_covers/gameofthrones.jpg', 20, 'A Game of Thrones is the first book in the epic fantasy series A Song of Ice and Fire. Set in the fictional land of Westeros, the story follows noble families as they vie for control of the Iron Throne. Intrigue, political maneuvering, and supernatural forces shape the fate of the Seven Kingdoms.'),
(0, 1849137374, 'A Storm of Swords', 'George R.R. Martin', 2000, '21.99', 'Collections', 'book_covers/stormofswords.jpg', 20, 'A Storm of Swords is a thrilling installment in the A Song of Ice and Fire series. Loyalties shift, alliances form and crumble, and the fate of Westeros hangs in the balance as rival houses clash, battles are fought, and secrets are revealed.'),
(0, 1849137375, 'Gone Girl', 'Gillian Flynn', 2012, '15.99', 'Bestseller', 'book_covers/gonegirl.jpg', 20, 'Gone Girl is a psychological thriller by Gillian Flynn. When Amy Dunne goes missing on her wedding anniversary, her husband Nick becomes the prime suspect. The book delves into themes of marriage, trust, and the dark complexities of human relationships.'),
(0, 1849137376, 'A Little Life', 'Hanya Yanagihara', 2015, '16.99', 'Nonfiction', 'book_covers/alittlelife.jpg', 20, 'A Little Life is a novel by Hanya Yanagihara that follows the lives of four college friends as they navigate their careers, relationships, and personal struggles in New York City. It delves into themes of friendship, trauma, love, and the lasting impact of past experiences. The book offers a deeply emotional and immersive reading experience.'),
(0, 1849137377, 'It Ends with Us', 'Colleen Hoover', 2016, '14.99', 'New', 'book_covers/itendswithus.jpg', 20, 'It Ends with Us is a contemporary romance novel by Colleen Hoover. It explores themes of love, relationships, and the complexities of making difficult choices. The book offers an emotional and thought-provoking reading experience.'),
(1, 1849137378, 'The Last Song', 'Nicholas Sparks', 2009, '12.99', 'Fiction', 'book_covers/thelastsong.jpg', 20, 'The Last Song is a novel by Nicholas Sparks. It tells the story of a teenage girl named Ronnie who spends a summer in a small coastal town, where she finds love and discovers the healing power of music. The book explores themes of family, forgiveness, and self-discovery.'),
(1, 1849137379, 'The Notebook', 'Nicholas Sparks', 1996, '11.99', 'Fiction', 'book_covers/thenotebook.jpg', 20, 'The Notebook is a romantic novel by Nicholas Sparks. It follows the love story of Noah and Allie, two young people from different social backgrounds who fall in love during the summer of 1940. The book explores themes of love, fate, and the enduring power of memories.'),
(0, 1849137380, 'It Starts with Us', 'Colleen Hoover', 2016, '13.99', 'Bestseller', 'book_covers/itstartswithus.jpg', 20, 'It Starts with Us is a contemporary romance novel by Colleen Hoover. It explores themes of love, friendship, and the impact of past traumas on present relationships. The book offers a compelling and emotionally charged reading experience.'),
(0, 1849137381, 'Icebreaker', 'Lian Tanner', 2017, '9.99', 'Fiction', 'book_covers/icebreaker.jpg', 20, 'Icebreaker is a fantasy adventure novel by Lian Tanner. It follows the story of Petrel, a young girl aboard a ship called The Oyster who must unravel the secrets of her world and confront the dangers lurking within the frozen wasteland. The book is filled with action, suspense, and memorable characters.'),
(0, 1849137382, 'The Spanish Love Deception', 'Elena Armas', 2021, '15.99', 'New', 'book_covers/thespanishlovedeception.jpg', 20, 'The Spanish Love Deception is a contemporary romance novel by Elena Armas. It tells the story of Vera, a young woman who embarks on a fake relationship with a charming stranger while on a trip to Spain. The book is filled with witty banter, steamy moments, and unexpected twists.'),
(0, 1849137383, 'The American Roommate Experiment', 'Talia Hibbert', 2022, '14.99', 'Fiction', 'book_covers/theamericanroommateexperiment.jpg', 20, 'The American Roommate Experiment is a romantic comedy novel by Talia Hibbert. It follows the hilarious and heartwarming story of two opposites who become roommates and navigate the complexities of friendship, love, and cultural differences. The book is filled with humor, relatable characters, and swoon-worthy moments.'),
(0, 1849137384, 'Ugly Love', 'Colleen Hoover', 2014, '12.99', 'New', 'book_covers/uglylove.jpg', 20, 'Ugly Love is a contemporary romance novel by Colleen Hoover. It explores the complicated relationship between Tate and Miles, two individuals with emotional baggage and a mutual attraction. The book delves into themes of love, vulnerability, and the power of healing.'),
(0, 1849137385, 'I\'m Glad My Mom Died', 'Jeanette McCurdy', 2021, '16.99', 'Nonfiction', 'book_covers/imgladmymomdied.jpg', 20, 'I\'m Glad My Mom Died is a memoir by Jeanette McCurdy. It offers a candid and introspective account of the author\'s experiences and emotions following the loss of her mother. The book delves into themes of grief, healing, and personal growth.'),
(0, 1849137386, 'Love, Pamela', 'Pamela Anderson', 2021, '13.99', 'Nonfiction', 'book_covers/lovepamela.jpg', 20, 'Love, Pamela is a memoir by Pamela Anderson. It provides a personal and revealing account of the author\'s life, relationships, and experiences in the public eye. The book offers insights into fame, love, and the challenges of navigating a high-profile lifestyle.'),
(0, 1849137387, 'Becoming', 'Michelle Obama', 2018, '19.99', 'Nonfiction', 'book_covers/becoming.jpg', 20, 'Becoming is a memoir by former First Lady Michelle Obama. It offers a personal and inspiring account of her childhood, career, and time in the White House. The book explores themes of identity, perseverance, and the power of hope.'),
(0, 1849137388, 'Anne of Green Gables', 'Lucy Maud Montgomery', 1908, '10.99', 'Classic', 'book_covers/anneofgreengables.jpg', 20, 'Anne of Green Gables is a classic novel by Lucy Maud Montgomery. It follows the story of Anne Shirley, an imaginative and spirited orphan who is mistakenly sent to live with an elderly brother and sister on Prince Edward Island. The book explores themes of friendship, love, and the joys and challenges of growing up.'),
(0, 1849137389, 'Wuthering Heights', 'Emily Bronte', 1847, '11.99', 'Classic', 'book_covers/wutheringheights.jpg', 20, 'Wuthering Heights is a classic novel by Emily Bronte. It tells the story of the passionate and tumultuous love between Catherine Earnshaw and Heathcliff, set against the backdrop of the Yorkshire moors. The book delves into themes of love, revenge, and the destructive power of unresolved emotions.'),
(0, 1849137390, 'Lord of the Flies', 'William Golding', 1954, '9.99', 'Classic', 'book_covers/lordoftheflies.jpg', 20, 'Lord of the Flies is a classic novel by William Golding. It follows a group of young boys stranded on an uninhabited island and explores the breakdown of societal order and the inherent darkness of human nature. The book raises thought-provoking questions about power, morality, and the nature of civilization.'),
(0, 1849137391, 'Charlotte\'s Web', 'E.B. White', 1952, '8.99', 'Classic', 'book_covers/charlottesweb.jpg', 20, 'Charlotte\'s Web is a beloved children\'s novel by E.B. White. It tells the story of Wilbur, a pig who befriends a spider named Charlotte, and their efforts to save Wilbur from becoming bacon. The book explores themes of friendship, loyalty, and the circle of life.'),
(0, 1849137392, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 2005, '13.99', 'Fiction', 'book_covers/girlwiththedragontattoo.jpg', 20, 'The Girl with the Dragon Tattoo is a gripping mystery novel by Stieg Larsson. It follows the story of Mikael Blomkvist, a journalist, and Lisbeth Salander, a computer hacker, as they investigate a decades-old disappearance and unravel a complex web of intrigue and crime. The book is filled with suspense, twists, and unforgettable characters.'),
(0, 1849137393, 'The Summer I Turned Pretty', 'Jenny Han', 2009, '12.99', 'Bestseller', 'book_covers/thesummeriturnedpretty.jpg', 20, 'The Summer I Turned Pretty is a young adult romance series by Jenny Han. It follows the story of Belly Conklin and her summer experiences at the beach house with the Fisher boys, Conrad and Jeremiah. The series explores themes of love, friendship, and coming of age.'),
(0, 1849137394, 'It\'s Not Summer Without You', 'Jenny Han', 2010, '13.99', 'Bestseller', 'book_covers/itsnotsummerwithoutyou.jpg', 20, 'It\'s Not Summer Without You is the second book in the \"The Summer I Turned Pretty\" series by Jenny Han. It continues the story of Belly and her summer adventures with the Fisher boys, as they navigate love, heartbreak, and the complexities of growing up.'),
(0, 1849137395, 'We\'ll Always Have Summer', 'Jenny Han', 2011, '13.99', 'Bestseller', 'book_covers/wellalwayshavesummer.jpg', 20, 'We\'ll Always Have Summer is the third and final book in the \"The Summer I Turned Pretty\" series by Jenny Han. It concludes the story of Belly, Conrad, and Jeremiah as they face the challenges of adulthood, making decisions that will shape their futures and test their relationships.');

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
(1, 1, 'Nicholas Sparks', 'nicholassparks@email.com', '123 Main St.', 'Omaha', 'NE', 68007, '2022', '$2y$10$xXhkoeuNxeusJs3cU8kKauJ8NVYJFA.gTMyN8nBxzFgYT0U33evhS'),
(2, 2, 'Lysanne Scheider', 'lysanne_schneider1@hotmail.com', '8729 Railroad St.', 'Mahwah', 'NJ', 7430, '1985-03-13', '$2y$10$FCG1TiYsKuvyQYvu60sYMO/GOD1bJAThB.rTi22OsqLk7WRNPp.Ga'),
(5, 2, 'Jane Doe', 'jane_doe@yahoo.com', '72 West Amerige Ave.', 'Oswego', 'NY', 13126, '1973-08-05', '$2y$10$ASJ1QQdAmyLo8ewK9VsFM.J2YQlrU4SOg1aiqqgS/nCp5Th7YvClK'),
(6, 2, 'Ethan Brown', 'alayna81@hotmail.com', '7265 N. Roosevelt Circle', 'Muncie', 'IN', 47302, '1993-10-11', '$2y$10$mO9CSbCwIc/hzE0/gnZx5u..RfIoFjLpzwadDLZ8f1uz7SWN/GiKK'),
(7, 2, 'John Parker', 'johnny25@gmail.com', '162 Pineknoll St.', 'Thibodaux', 'LA', 70301, '1963-03-11', '$2y$10$GV01TO.kytrJYkhPTOuNreaRKpgtLTMslwO3mREm/PK8.zOi5F9sO'),
(8, 1, 'Janet Smith', 'jan14@gmail.com', '537 Green Swamp Dr.', 'Minneapolis', 'MN', 55406, '2022', '$2y$10$McRCk1xx65dK.U2.ghjCx.2v3ytMd9m/ZzdbEfY1GBmhlwZNxjZ9q'),
(9, 1, 'Aiden Wallas', 'aiden.spinka@yahoo.com', '4 South Charles St.', 'Fredricksburg', 'VA', 22405, '2022', '$2y$10$t7H7twBRb/bpFKjsLhUYZuSYSTFfx9kCwmaTTWEOkXqLaxiH/Uxa6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bag`
--
ALTER TABLE `Bag`
  ADD PRIMARY KEY (`bag_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `isbn` (`isbn`);

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
-- AUTO_INCREMENT for table `Bag`
--
ALTER TABLE `Bag`
  MODIFY `bag_item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1849137396;

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
  MODIFY `user_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
