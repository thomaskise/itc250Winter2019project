<?php
/**
 * index.php + survey_view.php crate a list/view/pager applciation
 * 
 * 
 * @package nmPager
 * @author Thom Harrington
 * @version 3.02 2011/05/18
 * @link https://kise
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @see survey_view_pager.php
 * @see Pager.php 
 * @todo none
 */

# '../' works for a sub-folder.  use './' for the root  
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials 
 
# SQL statement
//$sql = "select surveyName, surveyID, Price from wn19_surveys";
// change line 22 for survey
//$sql = "select * from wn19_surveys";
$sql = "select CONCAT(a.FirstName, ' ', a.LastName) AdminName, s.SurveyID, s.Title, s.Description, date_format(s.DateAdded, '%W %D %M %Y %H:%i') 'DateAdded' from " . PREFIX . "surveys s, " . PREFIX . "Admin a where s.AdminID=a.AdminID order by s.DateAdded";

#Fills <title> tag. If left empty will default to $PageTitle in config_inc.php  
$config->titleTag = 'surveys made with love & PHP in Seattle';

#Fills <meta> tags.  Currently we're adding to the existing meta tags in config_inc.php
$config->metaDescription = 'Seattle Central\'s ITC250 Class surveys are made with pure PHP! ' . $config->metaDescription;
$config->metaKeywords = 'surveys,PHP,Fun,Bran,Regular,Regular Expressions,'. $config->metaKeywords;

//adds font awesome icons for arrows on pager
$config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

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
<h3 align="center">Survey List</h3>
<!--
<p>This page, along with <b>demo_view_pager.php</b>, demonstrate a List/View web application.</p>
<p>It was built on the mysql shared web application page, <b>demo_shared.php</b></p>
<p>This page is the entry point of the application, meaning this page gets a link on your web site.  Since the current subject is surveys, we could name the link something clever like <a href="<?php echo VIRTUAL_PATH; ?>demo/demo_list_pager.php">surveys</a></p>
<p>Use <b>demo_list_pager.php</b> and <b>demo_view_pager.php</b> as a starting point for building your own List/View web application!</p> 
-->
<p>This page is a list of all surveys created and current.</p>
<p>To see the questions on a survey, select the Survey Title.</p><BR />
<?php
#reference images for pager
//$prev = '<img src="' . $config->virtual_path . '/images/arrow_prev.gif" border="0" />';
//$next = '<img src="' . $config->virtual_path . '/images/arrow_next.gif" border="0" />';

#images in this case are from font awesome
$prev = '<i class="fa fa-chevron-circle-left"></i>';
$next = '<i class="fa fa-chevron-circle-right"></i>';

# Create instance of new 'pager' class
$myPager = new Pager(2,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql);  #load SQL, add offset

# connection comes first in mysqli (improved) function
$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));


if (isset($_GET['pg'])) {
    $_SESSION['currentpage'] = $_GET['pg'];
}else{
    $_SESSION['currentpage'] = 1;
}

if(mysqli_num_rows($result) > 0)
{#records exist - process
	if($myPager->showTotal()==1){
        $itemz = "survey";}
    else{$itemz = "surveys";}  //deal with plural
    # Output the number of surveys
    echo '<h4>We have ' . $myPager->showTotal() . ' ' . $itemz . ' as listed:</h4>';
    # Create the table header
    echo '
        <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Date Created</th>
                  <th scope="col">Survey Title</th>
                  <th scope="col">Created by</th>
                </tr>
              </thead>
              <tbody>';
              while($row = mysqli_fetch_assoc($result))
              {# process each row
                echo '
                  <tr>
                  <td>' . dbOut($row['DateAdded']) . '</td>
                  <td><a href="' . VIRTUAL_PATH . 'surveys/survey_view.php?id=' . (int)$row['SurveyID'] . '">' . dbOut($row['Title']) . '</a></td>
                  <td>' . dbOut($row['AdminName']) . '</td>
                  </tr>';
              }
              echo '</tbody>
            </table>
        </div>'
        . $myPager->showNAV(); # show paging nav, only if enough records	 
}else{#no records
   echo "<div align=center>There are currently no surveys!</div>";	
}
@mysqli_free_result($result);

get_footer(); #defaults to theme footer or footer_inc.php
?>
