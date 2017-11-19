Project Proposal  
Team Name: L1 Cache   
Members: Blake Biskner, Jason Lubrano, Linda Palacios Rivera, Suyog Soti, Keaton Whitehead

Description:
Cache Me if You Can is a social application for CU students. Specifically, this browser-based game incorporates elements of GroundSpeak’s geocaching model to get students collaborating in a campus-wide scavenger hunt. Working alone or with peers, students will go to different waypoints placed throughout the university and solve puzzles and/or complete challenges in order to discover the location of the next marker. In particular, upon arriving at a predetermined gps location, information regarding the placement of the next marker will be downloaded to the user’s phone via our web page; this hint may be in the form of a puzzle or a challenge the player must complete.

The initial version of the game, which we will complete by semester’s end, may only consist of a few waypoints, but the fundamental features of this application will remain the same regardless of scope. Specifically, a typical user session will likely involve a CU student opening the Cache Me if You Can web page on his/her mobile device and viewing his/her current hint. From there the student will attempt to solve the riddle or complete the stated challenge (ie take a selfie in front of the flat irons). Upon finishing this phase he/she will progress to the next marker based upon either the answer to the riddle, or a message received after the challenge is completed. Once the user arrives at the new location, as indicated by their gps coordinates, information regarding the next hint will appear on his/her screen.

This application is meant to get student’s active and collaborating. In particular, to induce teamwork across different colleges, the hints and/ or challenges will require knowledge of a wide breadth of disciplines. For example, one task may necessitate solving a complex differential equation, while another hint may reference passages from Homer’s The Odyssey. In this way we hope students will form teams and work with those they would have never met otherwise (much like you have done by generating these project teams). In addition, we hope to get students active by incorporating various locations into the game. From the C4C to Chautauqua National Park, Cache Me if You Can is meant to get our peers exploring this beautiful campus and its surrounding majesty.

Vision Statement:
To create a social geocaching application which inspires exploration and collaboration among CU students.

Motivation:
Since the gps based treasuring hunting game Mogi in 2003 there have been several popular additions to the genre [1]. In 2012 Ingress, a science fiction game centered around capturing gps waypoints, was introduced and ultimately downloaded over 7 million times [1], and of course in 2016 Pokemon Go became the, “fastest application to reach number one on mobile revenue charts” [2]. There is certainly an interest for gps-based social software, and we believe by making our application a unique experience for CU Boulder students, we will be able to achieve widespread adoption within this relatively large campus community.

In addition to the positive market outlook, we are creating this game because it can be easily tested and iterated upon. Empathetic design requires that developers interact with their users and make changes to their product based upon said feedback. As our target demographic is CU students, we have thousands of potential users which we can consult throughout the development process. Ultimately, this should allow us to create an easy to use and engaging app.

Finally, we are designing this game because it is something we all would like to play. From collecting Easter Eggs as a kid to participating in school- sanctioned treasure hunts, we have always enjoyed scavenger hunts; however, there has never been a widely adopted scavenger hunt game for young adults. Until now.

[1]Allen, J. (2016, July 19) The past and future of location based AR games like Pokemon Go.
Retrieved October 01, 2017, from
https://www.gamasutra.com/view/news/277331/The_past_and_future_of_location_based_AR_games_like_Pokemon_Go.php

[2] Pokémon Go outpaces Clash Royale as the fastest game ever to No. 1 on the mobile
revenue charts. (2016, July 12). Retrieved October 01, 2017, from
https://venturebeat.com/2016/07/11/pokemon-go-outpaces-clash-royale-as-the-fastest-game-ever-to-no-1-on-the-mobile-revenue-charts/?utm_source=glixelnewsletter&utm_medium=email&utm_campaign=July 18th%2C 2016

Risks:
This ambitious project is not without risk. In particular, some possible problems include

Lack of experience by some of the team members in developing software
Inexperience of the entire team in creating mobile games
Lack of time to complete the project





Risk Mitigation Plan:
To obviate these challenges, the team will perform the following actions for each of the abovementioned risks

As some team members lack experience in software development (such as coding in multiple languages, web crawling, etc), while other team members have extensive experience (know several languages, understand repositories, etc) the work will be split accordingly. Specifically, those with superior coding knowledge will work on the more challenging project components (back end development); whereas, those with less experience will be responsible for project elements which are easy to learn and which are being taught in class (front end development in HTML and CSS).

As no team member has experience coding mobile apps we intend to avoid the platform altogether. In particular, we plan to simply develop the game as a web page application which users can then play in browser. This will allow us to take advantage of our collective web development experience, while eliminating the need to learn an entirely new language.

Many team members have several time commitments outside of this class, and it will be challenging to dedicate the necessary resources to creating this game. As a result, we plan on keeping an efficient schedule (one of our team members has experience leading software projects) and meeting at least once a week (we have already established a meeting time) to ensure equal and effective participation. Moreover, to maintain a manageable scope, our final product will likely only consist of a few functioning waypoints; however, as these nodes share a universal structure, future scaling is possible.


Version Control:
We will be using the distributed version control method via a GitHub repository. This will allow us to  both work separately and analyze changes to the main branch before anything is officially pushed. In this way we hope to be individually productive without ever being collectively destructive.

Development Method:
We will be employing the Agile development method.

To be specific, we will first talk with customers to discover user stories related to our application. If we have already begun creating our game, this may involve analyses of various features. We will then merge these suggestions into a product backlog, which will dictate what element we will next develop. From there, we will spend two weeks in a product sprint, which will result in a finished product feature. This element will subsequently be tested with users, thus creating further user stories and beginning the cycle once more.

Throughout this development, we will have weekly Scrums in which one of us will act as a Scrum Master. During these meetings we will each discuss what we have done, what we will do next, and what has been challenging us.

This method seems particularly well suited for our project, as we have immediate access to thousands of users (CU students). Consequently, it should be relatively easy to collect the user stories and feedback which will ultimately drive our project development.

Collaboration Tool:
We will be using Slack for intra-team communication. Additionally, we may use Trello as a means of managing project tasks.

Project Architecture:
Front End:
We will employ HTML and CSS to develop our application’s front end. Additionally, multiple team members have experience with the Adobe Creative Suite, so we will likely use Illustrator and Photoshop to create custom graphics for our page.

Back End:
We will build this application using a python backend as all of the team members are already familiar with python, and can contribute as necessary to the project. In addition, we will also be utilizing mongoDB because of the way it stores all the data. Because it operates similar to a dictionary, the plan is to store data people upload as value to their geographical coordinates as the key. From then on, we can work to construct a circular radius around the geographical unit, and let data be downloaded if two circular units intersect.

Communication Between Front and Back End:
Keaton will be the middle man that will work both with the frontend and backend as he has a solid overall understanding of both sides of the programming. He will manage the progress on both ends and make sure that things come together coherently and efficiently. He will also be offering assistance where needed but will mainly be focusing on the back end of the programming.

Technologies and Functionalities:
In addition to the HTML, CSS and JavaScript required for the front end development, we will also be utilizing bootstrap, a front end framework, on the project. In the backend, we will utilize Django as the python framework. It is a model view controller framework that will hold our hands as we begin this project, which is a good thing because not all of us are familiar with web development. In addition to Django, we will be using mongoDB as our database because of its relational framework. The relational database framework will be particularly helpful in the data navigation later on in the project. 
