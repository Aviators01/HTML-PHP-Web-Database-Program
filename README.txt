Timothy Queva
CS2910 Lab7
April 15, 2021

Description: The .php file is preprocessed by a php server which then sends an html file allowing the user
to query the test.lite database from their browser.

Limitations:
	-It is possible that incorrect sql command can slip through, but I hope I plugged all those
	 possibilites.
	-When page is first loaded, text box may be unclickable for a few seconds. Just wait and the
	 cursor should turn into a "I" thereby allowing query entry.	

Instructions:
	1. In the command prompt, navigate to the correct file folder which contains the .php file
	2. On windows, navigate via file folder explorer to location of the php.exe file
	3. Drag and drop the php.exe file into command prompt
	4. Type the following: -S localhost:8080
	   -Command may look like this: C:\xampp\htdocs\HTML-PHP Examples>C:\xampp\php\php.exe -S localhost:8080
	5. In the browser, type the following: localhost:8080/lab7.php
	6. Query away!


-----------------------------------------------------------------------------------------------------------------
Additional Tips:
-localhost is actually the loopback ip address (127.0.0.1)
-In our example, we used port 8080, but one can use any unused port numbers