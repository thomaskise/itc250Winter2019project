<?php
/**
 * index.php + survey_view.php crate a list/view/pager applciation
 * 
 * 
 * @package nmPager
 * @author Thom Harrington thomas.harrington@seattlecentral.edu
 * @version 3.02 2011/05/18
 * @link https://kiseharrington.com/wn19/
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @see index.php
 * @see Pager.php 
 * @todo none
 */
# '../' works for a sub-folder.  use './' for the root  
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
 
# check variable of item passed in - if invalid data, forcibly redirect back to demo_list.php page
# select q.QuestionID, q.Question from wn19_questions q inner join wn19_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = 1
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{
	myRedirect(VIRTUAL_PATH . "survey/survey_list.php");
}

//sql statement to select individual item
$sql = "select q.QuestionID, q.Question, q.Description 
        from wn19_questions q 
        inner join wn19_surveys s 
        on s.SurveyID = q.SurveyID where s.SurveyID = " . $myID;

#select q.QuestionID, q.Question from wn19_questions q inner join wn19_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = 1
//---end config area --------------------------------------------------

$foundRecord = FALSE; # Will change to true, if record found!
   
# connection comes first in mysqli (improved) function
$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	   $foundRecord = TRUE;
 //      $SurveyDetails[] = $mySurveyDetail;    
	   while ($row = mysqli_fetch_assoc($result))
	   {
			$QID = dbOut($row['QuestionID']);
			$Q = dbOut($row['Question']);
			$D = dbOut($row['Description']);
			$mySurveyDetail = new SurveyDetail($QID, $Q, $D);
            $SurveyDetails[] = $mySurveyDetail;   
			//$myQuestion = new Question(dbOut($row['QuestionID']),dbOut($row['Question']),dbOut($row['Description']);
						//$QuestionID = (int)$row['QuestionID'];
	   }
}
/*
echo '<pre>';
var_dump($SurveyDetails);
echo '</pre>';
die();


@mysqli_free_result($result); # We're done with the data!


/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/
# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php
?>
<h3 align="center"><?=smartTitle();?></h3>
<!--
<p>This page, along with <b>demo_list.php</b>, demonstrate a List/View web application.</p>
<p>It was built on the mysqli shared web application page, <b>demo_shared.php</b></p>
<p>This page is to be used only with <b>demo_list.php</b>, and is <b>NOT</b> the entry point of the application, meaning this page gets <b>NO</b> link on your web site.</p>
<p>Use <b>demo_list.php</b> and <b>demo_view.php</b> as a starting point for building your own List/View web application!</p> 
-->
<p>Here's the details of the survey - questions + the answer selections (yet to come)!</p>
<?php
if($foundRecord)
{#records exist - show survey!
foreach ($SurveyDetails as $detail)
{
    echo "
        <h4>Question #$detail->ID</h4>
        <p>The question is: $detail->Question</p>
        <p>The description is: $detail->Description</p>
    ";
}
 
}else{//no such survey!
    echo '<div align="center">The survey detail has not yet been created!!</div>';
//    echo '<div align="center"><a href="' . VIRTUAL_PATH . 'demo/demo_list.php">Another Muffin?</a></div>';
}
echo '<div align="center"><a href="' . SURVEYS_PATH . '/index.php?pg=' . $_SESSION["currentpage"] . '">Check out another survey?</a></div>';
get_footer(); #defaults to theme footer or footer_inc.php
?>
