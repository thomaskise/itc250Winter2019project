<?php
//config-page-switch.php assings page specific values to variables for 
switch(THIS_PAGE){

case "index.php":
        $config->pageHeader="Wild Duck Coffee";
        $config->slogan="An adventure in caffinated experience";
        $config->title="Wild Duck Home";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="wildDuckLogo.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "about.php":
        $config->pageHeader="About Wild Duck Coffee";
        $config->slogan="This is what we do.";
        $config->title="About Wild Duck";
        $config->pageImage="about-bg.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "engagement_list.php":
        $config->pageHeader="We are here to tell the coffee story!";
        $config->slogan="Here is the list of our followers!";
        $config->title="Engagements";
        $config->pageImage="post-bg.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="";
        $config->randomSH="y";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "engagement_list_alpha.php":
        $config->pageHeader="Under Construction!";
        $config->slogan="Future engagement with image thumbs";
        $config->title="Engagements";
        $config->pageImage="post-bg.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="";
        $config->randomSH="y";
        $config->rotatePlanets="";
        $config->version="alpha";
        break;

case "engagement_view.php":
        $config->pageHeader="A coffee story telling engagement!";
        $config->slogan=" Here are details ...";
        $config->title="Engagement Detail";
        $config->pageImage="post-bg.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="y";
        $config->version="";
        break;


case "engagement_view_alpha.php":
        $config->pageHeader="Under Construction!";
        $config->slogan="Future engagement view with image upload";
        $config->title="Engagement Detail";
        $config->pageImage="post-bg.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="y";
        $config->version="";
        break;
        
        
case "post.php":
        $config->pageHeader="Man must explore, and this is exploration at its greatest";
        $config->slogan=" Coffee to the max expands all horizons!";
        $config->title="The Coffee Blog";
        $config->pageImage="post-bg.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="";
        $config->randomSH="y";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "dailyspecials.php":
        $config->pageHeader="Good coffee is what life's about.";
        $config->slogan=" Take time to enjoy and treat yourself!";
        $config->title="Daily Specials";
        $config->pageImage="specials-bg.jpg";
        $config->pageImage2="slide-2.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "travel.php":
        $config->pageHeader="Fabulous Adventures";
        $config->slogan="Exotic Coffee Lands";
        $config->title="Travel Inquiries";
        $config->pageImage="travel.jpg";
        $config->pageImage2="slide-3.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "contact.php":
        $config->pageHeader="Contact the Duck";
        $config->slogan="Have questions? I have answers.";
        $config->title="Contact Wild Duck";
        $config->pageImage="contact-bg.jpg";
        $config->pageImage2="slide-1.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "template.php":
        $config->pageHeader="Wild Duck Coffee Template";    
        $config->slogan="Make it what it needs to be.";
        $config->title="Template Only";
        $config->pageImage="contact-bg.jpg";
        $config->pageImage2="slide-1.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="y";
        $config->version="";
        break;

case "db_test.php":
        $config->pageHeader="Database Test Page";
        $config->slogan="Use this page for testing the db";
        $config->title="Template Only";
        $config->pageImage="contact-bg.jpg";
        $config->pageImage2="slide-1.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="y";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "admin_dashboard.php":
        $config->pageHeader="Admin Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Admin Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;          

case "admin_add.php":
        $config->pageHeader="Admin Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Admin Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break; 

case "admin_reset.php":
        $config->pageHeader="Admin Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Admin Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "admin_edit.php":
        $config->pageHeader="Admin Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Admin Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "admin_delete.php":
        $config->pageHeader="Admin Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Admin Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;
        
case "engagement_add.php":
        $config->pageHeader="Engagement Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Engagement Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break; 

case "engagement_edit.php":
        $config->pageHeader="Engagement Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Engagement Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "engagement_delete.php":
        $config->pageHeader="Engagement Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Engagement Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;

case "engagement_dashboard.php":
        $config->pageHeader="Engagement Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Engagement Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;
        
case "admin_login.php":
        $config->pageHeader="Admin Dashboard";
        $config->slogan="Keeping things up-to-date";
        $config->title="Admin Dashboard";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;    
        

case "upload_form.php":
        $config->pageHeader="Admin Image Upload";
        $config->slogan="Keeping things up-to-date";
        $config->title="Image Upload";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="Go for it!";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
        break;    
        
default:
        $config->pageHeader="Opps. Something went wrong.";
        $config->slogan="Try again or call Customer Service at 1-800-555-1212";
        $config->title="THIS_PAGE";
        $config->pageImage="wildDuckLogo.jpg";
        $config->pageImage2="intro-pic.jpg";
        $config->subHeader="";
        $config->randomSH="";
        $config->rotatePlanets="";
        $config->version="";
}
?>