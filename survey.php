<?php include "part/top.php"; ini("A Tech Life | Survey",2) ?>
	<H2>Survey</H2>
	<?php
		if(isset($_GET["err"])) {
			if($_GET["err"] == "invalid")
				echo "<SPAN style='font-family: pier_bold; color: red;'>A field was left blank, or a number was negative or a decimal.</SPAN>";
			if($_GET["err"] == "wait")
				echo "<SPAN style='font-family: pier_bold; color: red;'>Please wait a few minutes before making another submission. This is to protect against spamming.</SPAN>";
			if($_GET["err"] == "exists")
				echo "<SPAN style='font-family: pier_bold; color: red;'>That name has already been submitted. If you have not submitted it yet, please email me to report spam and append \"notspam\" to your name to allow submission.</SPAN>";
		}
	?>
	<H6>This is used to obtain data for this experiment. <SPAN style="font-family: pier_bold; color: red;">This survey is only to taken by high school students</SPAN> (preferably from Joel Barlow) &mdash; older or younger people will throw off the data, especially dates, for obvious reasons. All questions are required &mdash; name is required (to try to reduce multiple submissions) but it will not be displayed (you will stay anonymous). Repeated names will be deleted. Please enter your real name, and please do not submit multiple times (submissions will be monitored for suspicious activity, and suspicious submissions may be deleted). The results will be updated immediately after your submission (except just before project is due). Your information will not be exploited in any way. Thank you for your cooperation.</H6>
	<FORM action="data/scripts/validate.php" method="post">
		<TABLE>
			<TR>
				<TH>Full Name*</TH>
				<TD><INPUT type="text" name="name" /></TD>
			</TR>
			<TR>
				<TH>Gender</TH>
				<TD>
					<INPUT type="radio" name="gender" value="male" checked />Male<BR />
					<INPUT type="radio" name="gender" value="female" />Female
				</TD>
			</TR>
			<TR>
				<TH colspan="2">Social Media</TH>
			</TR>
			<TR>
				<TH>Do you use social media?**</TH>
				<TD><INPUT type="checkbox" name="sm_1" /> Yes</TD>
			</TR>
			<TR>
				<TH>How many (common***) social media sites/networks do you use?</TH>
				<TD><INPUT type="number" name="sm_2" /> sites/networks</TD>
			</TR>
			<TR>
				<TH>Do you use any of the following sites (regularly****)?</TH>
				<TD>
					<INPUT type="checkbox" name="sm_3_fb" /> Facebook<BR />
					<INPUT type="checkbox" name="sm_3_tw" /> Twitter<BR />
					<INPUT type="checkbox" name="sm_3_in" /> Instagram
				</TD>
			</TR>
			<TR>
				<TH>When did you start using social media?</TH>
				<TD>
					<SELECT name="sm_4">
						<OPTION value="1999">1999</OPTION>
						<OPTION value="2000">2000</OPTION>
						<OPTION value="2001">2001</OPTION>
						<OPTION value="2002">2002</OPTION>
						<OPTION value="2003">2003</OPTION>
						<OPTION value="2004">2004</OPTION>
						<OPTION value="2005">2005</OPTION>
						<OPTION value="2006">2006</OPTION>
						<OPTION value="2007">2007</OPTION>
						<OPTION value="2008">2008</OPTION>
						<OPTION value="2009">2009</OPTION>
						<OPTION value="2010" selected>2010</OPTION>
						<OPTION value="2011">2011</OPTION>
						<OPTION value="2012">2012</OPTION>
						<OPTION value="2013">2013</OPTION>
						<OPTION value="2014">2014</OPTION>
						<OPTION value="2015">2015</OPTION>
					</SELECT>
				</TD>
			</TR>
			<TR>
				<TH colspan="2">Internet</TH>
			</TR>
			<TR>
				<TH>Do you use the Internet?*****</TH>
				<TD>
					<INPUT type="checkbox" name="in_1" checked disabled /> Yes
					<?php // BUG: "disabled" can be removed with developer tools. Will it actually work on submit? ?>
				</TD>
			</TR>
			<TR>
				<TH>How many minutes do you estimate spending on the web****** per day?</TH>
				<TD><INPUT type="number" name="in_2" /> minutes</TD>
			</TR>
			<TR>
				<TH>When did you start using the Internet (regularly****)?</TH>
				<TD>
					<SELECT name="in_3">
						<OPTION value="1999">1999</OPTION>
						<OPTION value="2000">2000</OPTION>
						<OPTION value="2001">2001</OPTION>
						<OPTION value="2002">2002</OPTION>
						<OPTION value="2003">2003</OPTION>
						<OPTION value="2004">2004</OPTION>
						<OPTION value="2005">2005</OPTION>
						<OPTION value="2006">2006</OPTION>
						<OPTION value="2007">2007</OPTION>
						<OPTION value="2008">2008</OPTION>
						<OPTION value="2009">2009</OPTION>
						<OPTION value="2010" selected>2010</OPTION>
						<OPTION value="2011">2011</OPTION>
						<OPTION value="2012">2012</OPTION>
						<OPTION value="2013">2013</OPTION>
						<OPTION value="2014">2014</OPTION>
						<OPTION value="2015">2015</OPTION>
					</SELECT>
				</TD>
			</TR>
			<TR>
				<TH>Do you think of the Internet as a necessity of life?</TH>
				<TD><INPUT type="checkbox" name="in_4" /> Yes</TD>
			</TR>
			<TR>
				<TH colspan="2">"Smart" Technology</TH>
			</TR>
			<TR>
				<TH>How many "smart" devices******* are there...</TH>
				<TD>
					<INPUT type="number" name="st_1_ho" /> in your house?<BR />
					<INPUT type="number" name="st_1_yo" /> in your possession?
				</TD>
			</TR>
			<TR>
				<TH>Do you own a...</TH>
				<TD>
					<INPUT type="checkbox" name="st_2_sm" /> smartphone?<BR />
					<INPUT type="checkbox" name="st_2_ta" /> tablet computer?<BR />
					<INPUT type="checkbox" name="st_2_la" /> laptop computer?<BR />
					<INPUT type="checkbox" name="st_2_de" /> desktop computer?<BR />
					<INPUT type="checkbox" name="st_2_ot" /> other devices?
				</TD>
			</TR>
			<TR>
				<TH>How many minutes do you estimate you look at a screen per day, on average?</TH>
				<TD><INPUT type="number" name="st_3" /> minutes</TD>
			</TR>
			<TR>
				<TH>Does you use the Internet for...</TH>
				<TD>
					<INPUT type="checkbox" name="st_4_in" /> searching for information?<BR />
					<INPUT type="checkbox" name="st_4_me" /> searching for media?<BR />
					<INPUT type="checkbox" name="st_4_ga" /> playing games?<BR />
					<INPUT type="checkbox" name="st_4_sc" /> school?<BR />
					<INPUT type="checkbox" name="st_4_sm" /> social media?<BR />
					<INPUT type="checkbox" name="st_4_oc" /> other communication?<BR />
					<INPUT type="checkbox" name="st_4_ot" /> other uses?<BR />
				</TD>
			</TR>
			<TR>
				<TH colspan="2">General</TH>
			</TR>
			<TR>
				<TH>Do the aforementioned pieces of technology greatly improve your life?</TH>
				<TD><INPUT type="checkbox" name="ge_1" /> Yes</TD>
			</TR>
			<TR>
				<TH>Are you easily distracted by those pieces of technology?</TH>
				<TD><INPUT type="checkbox" name="ge_2" /> Yes</TD>
			</TR>
			<TR>
				<TH>Do you use those technologies more because...</TH>
				<TD>
					<INPUT type="radio" name="ge_3" value="others" checked /> people you know use it?<BR />
					<INPUT type="radio" name="ge_3" value="useful" /> you find it useful?<BR />
					<INPUT type="radio" name="ge_3" value="both" /> both of the above?
				</TD>
			</TR>
			<TR>
				<TH>Do you think that these technologies, in the future, would...</TH>
				<TD>
					<INPUT type="radio" name="ge_4" value="harmgood" checked /> harm people because they make life too convenient?<BR />
					<INPUT type="radio" name="ge_4" value="harmevil" /> harm people because artificial intelligence may take over?<BR />
					<INPUT type="radio" name="ge_4" value="harmboth" /> harm people because of both of the above?<BR />
					<INPUT type="radio" name="ge_4" value="help" /> never harm people more than help them?
				</TD>
			</TR>
			<TR>
				<TD colspan="2"><BUTTON>Submit your results</BUTTON></TD>
			</TR>
		</TABLE>
	</FORM>
	<HR />
	<H2>Notes</H2>
	<P>* Used only to try and prevent repeats. Please still enter accurately.</P>
	<P>** Not all forms of sharing information are social media. It can include social gaming, photo sharing, video sharing, and even business networks. "Social media has been broadly defined to refer to 'the many relatively inexpensive and widely accessible electronic tools that enable anyone to publish and access information, collaborate on a common effort, or build relationships'" (Murthy). Email is not a form of social media. See <A href="http://en.wikipedia.org/wiki/Social_media#Classification_of_social_media" target="_blank">Classification of social media</A> for more details.</P>
	<P>*** See note 2 about classification of social media. "Common" social media: networks that are used by over 25,000 people.</P>
	<P>**** "Regularly": checking at least once a week.</P>
	<P>***** You definitely use the Internet. You got to this website.</P>
	<P>****** This includes both directly browsing the web and using applications that use the web (e.g. a weather app).</P>
	<P>******* A "smart device" is a device with a high level of functionality, able to operate semi-autonomously. They usually are connected to other devices via a wireless system/protocol, such as WiFi or Bluetooth. Many new phones, tablets, and computers are "smart." See <A href="http://en.wikipedia.org/wiki/Smart_device">Smart Device</A> for more information.</P>
<?php include "part/bottom.txt" ?>