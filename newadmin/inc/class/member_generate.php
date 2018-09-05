<?
//###########################
// Dating / Community Software - By Mark Fail - Website Solutions
//
// Copyright (c) 2005-2006 Mark Fail
// Unauthorized reproduction is not allowed
//==============================
//                   
//###########################
function Email($filename) {
	$FoundName = $filename[rand(0,count($filename) - 1)];
	$FoundNamePieces = explode("\t",$FoundName);
	return $FoundNamePieces[0];
}
function FirstName($filename) {
	$FoundName = $filename[rand(0,count($filename) - 1)];
	$FoundNamePieces = explode("\t",$FoundName);
	return $FoundNamePieces[0];
}
function LastName($filename) {
	$FoundName = trim($filename[rand(0,count($filename) - 1)]);
	$FoundNamePieces = explode("\t",$FoundName);
	return $FoundNamePieces[0];
}
function GenerateData($value) {

	// DATABASE CONNECTION
	global $DB;


   /* get all the data from the files and put them into arrays */
   if($value['names'] == 1){
   		$file = file('inc/class/malenames.txt');
   }else{
   		$file = file('inc/class/femalenames.txt');
   }
   $FileLastNames = file('inc/class/lastnames.txt');
   $EmailExt = file('inc/class/email.txt');

   // DOB
   $Year= array ("1960", "1961", "1962", "1963", "1964","1965","1966","1967","1968","1969", "1970","1971","1972","1973","1974","1975","1976","1977","1978","1979","1980","1981", "1982", "1983", "1984", "1985");
   $Month = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC",);
   $Day = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27","28", "29", "30");
   $Font = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
   $Colour = array("FF99FF","FF9900","990000","990099","006600","000066","666666","FF66CC","FFFF00","FF3366","CCCCCC", "0099CC", "009966", "9966FF", "FF0033", "FFCC33", "FF9999", "999999", "0033FF", "00FF00" , "FF00FF");
   $HairLenght = array("Short","Long","Medium","Very Long");
   $HairColour = array("Blonde","Red Head","Brown","Black", "Light Brown");
   $Music = array("Rock","RNB","Dance, disco music","pop music", "classical", "metal, goth bands", "Opra");
   $Me = array("Loving and caring","Always happy and full of life","Outgoing and enjoys life");
   $StarSign= array("9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19");
   $membercount = 1;
   // random sentances
   $Me = array(
   "You should have heard the fuss my mom   kicked up   !", 
	"And could I have a long-sleeved jacket this time ? The short-sleeved ones are so babyish.", 
	"Sorry, I am terrible with names !", 
	"If its any consolation, Mom yells the most at the students she thinks are the best.", 
	"I guess Im grinning because Jeannie didnt holler very much for a change.", 
	"Hugh MacKendrick is a real slave driver.", 
	"Hes so cute that its a shame hes not nicer.", 
	" even though Hugh is obviously out of my league.(  to be too good or too expensive for you ) The championship doesnt have to be ....", 
	"Oh, Shona. You are such a party pooper. (  someone who spoils other peoples enjoyment by disapproving of or not taking part in a particular activity )", 
	"You could if you put your mind to it.", 
	"I saw them going into that pizza parlor on Austin Street. Are they dating ?", 
	"..... hoping she didnt sound too breathless.", 
	"I thought it might brighten up my practices.", 
	"Well, were just starting out, so we foul up sometimes.", 
	"Dont you need a jacket or anything ? Its freezing out.",
	"A chicken is an eggs way of producing more eggs.", "A man with one watch knows what time it is.", "A man with two watches is never quite sure.", "Above all else -- sky.", "An apple a day makes 365 apples a year.",
"There is no spoon.",
"I think not said Descartes, and promptly disappeared.",
"Mr. Worf, scan that ship. Aye Captain. 300 dpi?",
"OS/2 is the operating system of the 90s - Bill Gates",
"Ummm, Trouble with grammar have I! Yes!",
" All the worlds a stage, and I missed rehearsal.", " Clinton Economics: If 1+2=3 then 4+5=6.", "and on the seventh day, He exited from append mode.","Im sorry, Reality is not in service at this time.", "put knot yore trust inn spel chequers.
","10 out of 5 doctors feel its OK to be schizo!","10.0 times 0.1 is hardly ever 1.0.","1st Law of Thermodynamics: Go to class!!","2 + 2 = 5 for extremely large values of 2.","24 hours in a day, 24 beers in a case. Coincidence?",
" of all statistics are worthless.","640K ought to be enough for anybody", "A belly button is for salt when you eat celery in bed.", "A conclusion is simply the place where you got tired of thinking.
", "A day for firm decisions!!!!! Or is it?
", "A friend: someone who likes you even after they know you.
", "A harp is a nude piano.
", "A little inaccuracy sometimes saves tons of explanation.
", "A mainframe: The biggest PC peripheral available.
", "A man needs a good memory after he has lied.
", "A mind is a terrible thing to ", " er ", " hmmmm?
", "A neat desk is a sign of a sick mind.
", "A pessimist is never disappointed.
", "A program without bugs is obsolete.
", "A seminar on Time Travel will be held two weeks ago.
", "A Shower is the halfway point between Bed and World.
", "A yer ago I kudnt spel progremr now I are won.
", "After all is said and done, usually more is said.
", "AIBOHPHOBIA - the fear of palindromes.
", "Air conditioned environment - Do not open Windows.
", "All E-mail gladly received. Offensive reply ASAP.
", "All generalizations are bad.
", "All things are green unless they are not.
", "All wiyht. Rho sritched mg kegtops awound?
", "Always glad to share my ignorance - Ive got plenty.
", "Always proofread carefully to see if you any words out.
", "Always remember youre unique - just like everyone else.
", "An unbreakable toy is useful for breaking other toys.
", "And dont start a sentence with a conjunction.
", "And God said: E = (+mv) - (Ze)/r ", "and there *WAS* light!
", "Angels can fly because they take themselves so lightly.
", "Artificial Intelligence usually beats real stupidity.
", "As a computer, I find your faith in technology amusing.
", "As I said before, I never repeat myself.
", "As long as I can remember, Ive had amnesia.
", "ASCII stupid question", " get a stupid ANSI!",

"Beauty is in the eye of the beer holder",
"Black holes suck.",
"Black Holes were created when God divided by zero.",
"Bus error - passengers dumped.",
"But I forgot all about the Amnesia Conference!!",
"By all means, lets not confuse ourselves with the facts!
",
"California raisins murdered: Cereal Killer suspected
",
"Cannot find REALITY.SYS. Universe halted.
",
"CChheecckk yyoouurr dduupplleexx sswwiittcchh..
",
"Classified tagline. Please enter password: _
",
"Climate is what you expect. Weather is what you get.
",
"COFFEE.EXE Missing - Insert Cup and Press Any Key
",
"Coming Soon!! Mouse Support for Edlin!!
",
"COMMAND: A suggestion made to a computer.
",
"Computer - A device designed to speed and automate errors.
",
"Computers make very fast, very accurate mistakes.
",
"Computers run on faith, not electrons.
",
"Confucius say: Those who quote me are fools.
",
"CONgress (n) - Opposite of PROgress
",
"Contentsoftaglinemaysettleduringshipping.
",
"Crime doesnt pay", " does that mean my job is a crime?
",
"Daddy, what does FORMATTING DRIVE C: mean?
",
"Daddy, why doesnt this magnet pick up this floppy disk?
",
"DAM: Mothers Against Dyslexia.
",
"Death is a nonmaskable interrupt.
",
"Death: to stop sinning suddenly.
",
"Despite the high cost of living, it remains popular.
",
"Diagonally parked in a parallel universe.
",
"Did you know that 7/5 people dont know how to use fractions?
",
"Dinner not ready: (A)bort (R)etry (P)izza
",
"Disclaimer: Written by a highly caffeinated mammal.
",
"Do fish get thirsty?
",
"Do not believe in miracles -- rely on them.
",
"Do not disturb. Already disturbed!
",
"Do radioactive cats have 18 half-lives?
",
"Does killing time damage eternity?
",
"Dont ask me, I only work here.
",
"Dont hate yourself in the morning - sleep till noon.
",
"Dont let school interfere with your education.
",
"Dont play stupid with me! Im better at it.
",
"Dont rush me. I get paid by the hour.
",
"Dont steal. The government hates competition.
",
"Dont stop posting, a good laugh breaks up my day nicely
",
"Dont use no double negatives.
",
"Double your drive space - delete Windows!
",
"DOWN WITH EXCLAMATION POINTS!!!!!!!
",
"Drink wet cement, and get completely stoned.
",
"Earth is 98 full please delete anyone you can.
",
"Eat Crap! 10 Trillion flies cant be wrong.
",
"Electricity was invented by rubbing cats backwards!
",
"Enter any 11-digit prime number to continue", "
",
"Ethernet n.: something used to catch the etherbunny.
",
"Even in this corner of the galaxy, Captain, 2+2=4 ", " Spock
",
"Even the Holodeck women turn me down: Wesley
",
"Ever notice how fast Windows runs? Neither did I.
",
"Everyone hates me because Im paranoid
",
"Falls dont kill people. Its the deceleration trauma.
",
"Famous last words - Jesus Christ: Father, beam me up.
",
"FATAL ERROR; SYSTEM HALTED; Press any key to do nothing.
",
"Fer Sell Cheep: 1 Bran New Spel Chekker. Nevur Usd.
",
"Find your aim in life, before you run out of ammunition
",
"Funny off-topic messages are always on-topic.
",
"Gather round like cattle and ye shall be herd.
",
"Gene Rodenberry, 1921-1991 - Shakka, when the walls fell.
",
"God I want patience, and I WANT IT NOW!
",
"God invented women because sheep cant cook.
",
"God is real, unless declared integer.
",
"Gravity brings me down
",
"Growing old is mandatory; growing up is optional!!
",
"GURU: One who knows more jargon than you.
",
"H lp! S m b d st l ll th v w ls fr m m k yb rd!
",
"HAL 9000: Dave. Put down those Windows disks, Dave. DAVE!
",
"Half of the people in the world are below average.
",
"Hard work never killed anyone, but why chance it?
",
"hAS ANYONE SEEN MY cAPSLOCK KEY?
",
"He who laughs last is S-L-O-W.
",
"Help beautify our dumps. Throw away something pretty.
",
"Help Wanted: Telepath. You know where to apply.
",
"Hes dead Jim. Grab his tricorder. Ill get his wallet.
",
"Hes dim, Jed
",
"Hi. Ill be your tagline for this evening.
",
"Hit any user to continue.
",
"I am but a vehicle for my tie.
",
"I am Clinton of Borg. Your income will be assimilated.
",
"I am. Therefore, I think. I think.
",
"I cna ytpe 300 wrods pre mniuet!!!
",
"I dont care who you are, Fatso. Get the reindeer off my roof!
",
"I dont suffer from insanity. I enjoy every minute of it.
",
"I had a life once", " now I have a computer and a modem.
",
"I have a rock garden. 3 of them died last week.
",
"I havent lost my mind, I know exactly where I left it.
",
"I like cats, but I dont think I could eat a whole one.
",
"I need someone really bad. Are you really bad?
",
"I thought I was mistaken but I was mistaken.
",
"I tried being reasonable once. I didnt like it.
",
"I used to be indecisive. Now Im not so sure.
",
"I used to be schizophrenic, but were all right now.
",
"I went to the Net and all I got was this stupid tagline.
",
"I wish life had a scroll-back buffer", "..
",
"I xeroxed a mirror, now I have an extra copier.
",
"If a fly has no wings would you call him a walk?
",
"If cows could fly, everyone would carry an umbrella.
",
"If God wanted us to do Hex wed have 16 fingers
",
"If money could talk, it would say goodbye.
",
"If Murphys Law can go wrong, it will.
",
"If you have to ask what jazz is, youll never know.
",
"If you try to fail, and succeed, which have you done?
",
"If youre not confused, youre not paying attention.
",
"Im a nobody, nobody is perfect, therefore Im perfect.
",
"Im busier than a one-eyed cat watching two mouseholes.
",
"Im not as dumb as you look.
",
"Im not as think as you drunk I am.
",
"Im not paranoid! Which of my enemies told you this?
",
"Im out of bed and dressed. What more do you want?
",
"Im so broke, I cant even pay attention.
",
"Imagination is more important than knowledge - Einstein
",
"In mathematics or physics, simplifying can be complicated.
",
"In politics stupidity is not a handicap.
",
"Is there life before coffee?
",
"Is there life before dead?
",
"It said Insert disk #3 but only two will fit!",
"Its easier to get older than it is to get wiser.
",
"Its not an optical illusion. It just looks like one.
",
"Its okay to be ugly", "but arent you overdoing it?
",
"Ive no idea what Im doing out of bed. - Shadwell
",
"Ive taken a vow of poverty. To annoy me, send money.
",
"Just what part of NO didnt you understand", "?
",
"Know what I hate? I hate rhetorical questions!
",
"Knowing Murphys Law wont help either.
",
"Learn to splel, danmit!
",
"Life would be easier if I had the source code.
",
"Machine-independent: does not run on any existing machine.
",
"Make it idiot proof and someone will make a better idiot.
",
"Math is the language God used to write the universe.
",
"Megabyte: A nine course dinner.
",
"Meow", " SPLAT", " Ruff", " SPLAT", " (Raining cats & dogs)
",
"Microsoft Windows", " a virus with mouse support.
",
"Minds are like parachutes, they only work when open.
",
"Misspelled? Impossible. My modem is error correcting!
",
"Mondays are the potholes in the road of life
",
"Move your vowels every day or youll get consonated.
",
"MS Windows -- From the people who brought you EDLIN!
",
"My favourite mythical creature? The honest politician.
",
"My inferiority complexes arent as good as yours.
",
"My keyboard has an F1 key. Where is the NASCAR key?
",
"My software never has bugs. It just develops random features.
",
"Nobody can be just like me. Even I have trouble.
",
"None of you exist, my Sysop types all this in.
",
"Nostalgia isnt what it used to be.
",
"Old poets never die, they just ride off into the sonnet.
",
"OUT TO LUNCH - If not back at five, OUT TO DINNER!
",
"Paranoia is nothing to be afraid of!!
",
"People who live in stone houses shouldnt throw glasses.
",
"Nuke the whales, save the plankton!
",
"Please Tell Me if you Dont Get This Message
",
"Point not found. A)bort, R)eread, I)gnore.
",
"Polls show that 9 out of 6 schizophrenics agree.
",
"Smash forehead on keyboard to continue.
",
"Press all the keys at once to continue", "
",
"Press any key to continue or any other key to quit", "
",
"Press any key", " no, no, no, NOT THAT ONE!
",
"Puns are bad, but poetry is verse.
",
"Q: Why do blondes hate M&Ms? A: Theyre too hard to peel.
",
"Read what I mean, not what I write.
",
"Real Trekkers work out at the Hes Dead Gym.
",
"Reality is for those who cant handle Star Trek.
",
"REALITY.SYS corrupted: Reboot universe? (Y/N/A)
",
"Remember, Subaru spelled backwards is U-R-A-BUS.
",
"Runtime Error 6D at 417A:32CF: Incompetent User.
",
"Seen on BBSers tombstone: CONNECT 1953, NO CARRIER 1994
",
"SENILE.COM: out of memory", "
",
".GIF format: Girls In Files
",
"Silence is more eloquent at times than words.
",
"Sleep is a poor substitute for caffeine.
",
"Smoking is a leading cause of statistics.
",
"Some people act crazy, others arent acting.
",
"Some People, like Flowers, Give Pleasure Just by Being.
",
"Sorry, I forgot all about the Amnesia Conference!
",
"STICK: A boomerang that doesnt work.
",
"Stop talking! Im out of aspirin!
",
"STUPIDITY is NOT a HANDICAP! Park elsewhere!
",
"Suicidal twin kills sister by mistake!
",
"Taglines can be more interesting than messages!
",
"Take my advice, I dont use it anyway.
",
"Talk is cheap because Supply exceeds Demand.
",
"That must be wonderful! I dont understand it at all.
", "The best cure for insomnia is to get a lot of sleep.
", "The best way to accelerate a Mac is at 9.8 m / sec^2.
", "The best way to win an argument is to be right.
", "The Definition of an Upgrade: Take old bugs out, put new ones in.
", "The facts, although interesting, are irrelevant.
", "The first step to making a dream come true is to wake up
", "The future isnt what it used to be.
", "The irony of life is that no one gets out alive", "
", "The Magic of Windows: Turns a 486 back into a PC/XT.
", "The Majority is never right unless it includes me.
", "The Microsoft Motto: Were the leaders, wait for us!", "The tuna doesnt taste the same without the dolphin.
", "The only way to a womans heart is through the left ventricle.
", "The weather is here, wish you were beautiful.
", "There are 2 ways to handle women and I know neither.
", "There is much Obiwan did not tell you.
", "There is something to be said about me: Wow!!", "Theres too much blood in my caffeine system.", "Thesaurus: ancient reptile with an excellent vocabulary.
",
"Things working well, no problems. Time to upgrade.
",
"This is a Tagline mirrorrorrim enilgaT a si sihT
",
"This mind intentionally left blank.
",
"This tag hopes to be an Internet .sig when it grows up.
",
"This tag is invisible to anyone with a higher IQ than me.
",
"Tis better to have loved and lost than just to have lost.
",
"To be, or not to be, those are the parameters.
",
"To be, or not to be. *BOOM!* Not to be.
",
"To boldly go and watch Star Trek re-runs.
",
"To define recursion, we must first define recursion.
",
"To err is human. To really screw up it takes a computer!
",
"To learn more about paranoids, follow them around!
",
"To test a mans character, give him power.
",
"Too much month at the end of the money.
",
"Trees hit cars only in self-defence.
",
"Ultimate office automation: networked coffee.
",
"Use your MasterCard to pay your Visa bill.
",
"User Error: replace user and press any key to continue.
",
"Using yesterdays technology to solve todays problems, tomorrow
",
"Variables wont; constants arent.
",
"Very funny, Scotty. Now beam down my clothes", "
",
"Want a taste of religion? Bite a minister.
",
"Washed the cat - took HOURS to get the hair off my tongue!
",
"We used to write taglines with pencil & paper, my son.
",
"Well, to be Frank, Id have to change my name.
",
"What am I doing out of bed!?!?
",
"What color is a chameleon on a mirror?
",
"What garlic is to salad, insanity is to art.
",
"What has four legs and an arm? A happy pitbull.
",
"Whats another word for thesaurus?
",
"When you come to a fork in the road, take it!
",
"Who is General Failure and why is he reading my disk?
",
"Why cant women put the toilet seat back up?
",
"Why is abbreviation such a long word?
",
"Why is it called tourist season if we cant shoot them?
",
"Windows error 000 : No errors found! [CLOSE]
",
"Windows NT: The worlds only 80 megabyte Solitaire game!
",
"Windows would look better with curtains.
",
"Without Time, everything would happen at once.
",
"Womans mind is cleaner than mans; it changes more often
",
"WORK: Something to do between breaks.
",
"Xerox never comes up with anything original anymore.
",
"You are only young once, but you can be immature forever.
",
"You cant go home again, unless you set $HOME.
",
"You were destined to read this tagline at this moment.
",
"You will never be younger than you are today..
",
"Youre not losing more hair, youre gaining more scalp.
");
   
   /* loop for how may names we want generated */
   for ($i=1; $i<=$value['total']; $i++) { 
   srand((double)microtime()*1000000);
  	 // print output
	 $fname = strtolower(FirstName($file));
	 $lname = strtolower(LastName($FileLastNames));
	 $emailext = strtolower(Email($EmailExt));
	 $y = $Year[rand(0,count($Year) - 1)];
   	 $m = $Month[rand(0,count($Month) - 1)];
     $d = $Day[rand(0,count($Day) - 1)];
	 $Fontid = $Font[rand(0,count($Font) - 1)];
	 $textColour = $Colour[rand(0,count($Colour) - 1)];
	 $textColour1 = $Colour[rand(0,count($Colour) - 1)];
	 $Hair = $HairLenght[rand(0,count($HairLenght) - 1)];
	 $Hair .= " ". $HairColour[rand(0,count($HairColour) - 1)];
	 $Description = $Me[rand(0,count($Me) - 1)];
$Headline = $Me[rand(0,count($Me) - 1)];
	 $Mu = $Music[rand(0,count($Music) - 1)];
	 $Star = $StarSign[rand(0,count($StarSign) - 1)];
	 $height = rand(168,188);
	 $body = rand(63,68);
	 $eyes = rand(69,73);
	 $orgin = rand(77,90);
	 $income = rand(92,99);
	 $bra = rand(126,145);
	 $smoke = rand(206,207);
	 $rwanted = rand(6,7);
	 $th = rand(1,24);
	 $tm = rand(1,60);
	 $ts = rand(1,60);
	 //$dy = rand(2003,2005);
	 $dm = rand(1,3);
	 $dd = rand(1,30);
	 $location = rand(156,164);
	 $children = rand(110,114);
	 
	 $email = $fname."".$lname."@". $emailext;
	 $birthday = $y."-".$m."-".$d;
	 $today_time = "$th:$tm:$ts";//	=date("H:i:s");					// GET TIME
	 $today_date = "2005-$dm-$dd";//	=date("y-m-d");  				// GET DATE
	 $NewUsername = substr($fname.$lname,0,20);

	  // Update Database
	  	$FoundUser = $DB->Row("SELECT count(username) AS total FROM members WHERE username='".$NewUsername."' LIMIT 1");

		if($FoundUser['total'] == 0){


			$ip = $_SERVER['REMOTE_ADDR'];
			$datetime = @date("Y-m-d H:i:s");
			$session = session_id();

			## add the members data
			$DB->Insert("INSERT INTO `members` ( `id` , `username` , `password` , `email` , `session` , `ip` , `lastlogin` , `visible` , active, `created`, packageid, hits, profile_complete, templateid, updated, moderator, activate_code, highlight, ip_long, ip_lat, ip_country, ip_code)
						VALUES (NULL , '".$NewUsername."', '".md5($value['password'])."', '".$value['email']."', '".$session."', '".$ip."', '".$datetime."', 'yes', 'active', '".$datetime."', '".$value['pid']."','0','0','1','".$datetime."', 'no', 'OK','off','','','','')");
			$userid = $DB->InsertID();
			
			
			$DB->Insert("INSERT INTO `members_data` ( `uid` ) values ( '$userid' )");
			$DB->Update("UPDATE `members_data` SET gender='".$value['genderid']."', age='".$Year[rand(0,count($Year) - 1)]."-".$Month[rand(0,count($Month) - 1)]."-".$Day[rand(0,count($Day) - 1)]."', country='".$value['country']."', headline='".$Headline."', description='".$Description."' WHERE uid='".$userid."' LIMIT 1"); // make default values
			
			
			if(isset($data['news']) && $data['news'] =="yes"){ $nw ="yes"; }else{ $nw ="no";}
			if(isset($data['notify']) && $data['notify'] =="yes"){ $nn ="yes"; }else{ $nn ="no";}
		
			$DB->Insert("INSERT INTO `members_privacy` (`uid` ,`Newsletters` ,`Notifications` ,`IM` ,`Language` ,`Time Zone` ,`friends` ,`comments` ,`profile_view` ,`im_window` ,`SMS_email` ,`SMS_wink` , SMS_number ,`SMS_credits` ,`SMS_country` ,`match_array` ,`email_winks` ,`email_msg` ,`email_friends` ,`email_match`)
			VALUES ('".$userid."', '".$nw."', '".$nn."', 'yes', 'english', '', 'no', 'no', 'all', 'off', 'off', 'off', '', '".$packageData['SMS_credits']."', '', '', 'yes', 'yes', 'yes', 'yes')");
				
			 
				## add photos?
				//if($value['photos'] ==1){
				

					$DB->Insert("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a` )
					VALUES (NULL , '".$userid."', '$fname$lname Album', '', '0', 'public', '0', '0', '0', '0')");
									

				//}

			}
		}
	}

 ?>