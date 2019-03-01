<?php
/**
 * MY_Survey extends the Survey class so we can add 
 * our own methods, etc.
 * Survey.php provides the main access class for SurveySez project
 * 
 * Data access for several of the SurveySez pages are handled via Survey classes 
 * named Survey,Question & Answer, respectively.  These classes model the one to many 
 * relationships between their namesake database tables. 
 *
 * A survey object (an instance of the Survey class) can be created in this manner:
 *
 *<code>
 *$mySurvey = new SurveySez\MY_Survey(1);
 *</code>
 *
 * In which one is the number of a valid Survey in the database. 
 *
 * The forward slash in front of \IDB picks up the global namespace, which is required 
 * now that we're here inside the SurveySez namespace: \\IDB::conn()
 *
 * Version 2 introduces two new classes, the Response and Choice classes, and moderate 
 * changes to the existing classes, Survey, Question & Answer.  The Response class will 
 * inherit from the Survey Class (using the PHP extends syntax) and will be an elaboration 
 * on a theme.  
 *
 * An instance of the Response class will attempt to identify a SurveyID from the srv_responses 
 * database table, and if it exists, will attempt to create all associated Survey, Question & Answer 
 * objects, nearly exactly as the Survey object.
 *
 * @package SurveySez
 * @author William Newman
 * @version 2.12 2015/06/04
 * @link http://newmanix.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Question.php
 * @see Answer.php
 * @see Response.php
 * @see Choice.php
 */
 
 namespace SurveySez;
 
/**
 * MY_Survey extends Survey Class to allow us to produce our own code as well as 
 * access the original Survey class code as it changes
 * 
 * We can now create static methods for our convenience and over-ride methods in 
 * the original object
 *
 * A static method could be accessed in this manner:
 *
 *<code>
 * echo $mySurvey::responseList($myID);
 *</code>
 *
 * @see Survey
 * @todo none
 */
 
class MY_Survey extends Survey
{
    function __construct($id)
	{#constructor sets stage by adding data to an instance of the object
		parent::__construct($id); # access parent class
	}//end constructor
	
	public static function responseList($id)
	{ 
        $myReturn = '';
        $id = (int)$id; //cast to integer
        $sql = "SELECT DateAdded, ResponseID FROM wn19_responses WHERE ResponseID=$id";
        
        #images in this case are from font awesome
        $prev = '<i class="fa fa-chevron-circle-left"></i>';
        $next = '<i class="fa fa-chevron-circle-right"></i>';

        # Create instance of new 'pager' class
        $myPager = new \Pager(2,'',$prev,$next,'');
        $sql = $myPager->loadSQL($sql);  #load SQL, add offset

        # connection comes first in mysqli (improved) function
        $result = mysqli_query(\IDB::conn(),$sql) or die(trigger_error(mysqli_error(\IDB::conn()), E_USER_ERROR));


        if (isset($_GET['pg'])) {
            $_SESSION['currentpage'] = $_GET['pg'];
        }else{
            $_SESSION['currentpage'] = 1;
        }

        if(mysqli_num_rows($result) > 0)
        {#records exist - process
            if($myPager->showTotal()==1){
                $itemz = "response";}
            else{$itemz = "responses";}  //deal with plural
            # Output the number of surveys
            $myReturn .= '<h4>We have ' . $myPager->showTotal() . ' ' . $itemz . ' as listed:</h4>';
            # Create the table header
             '
                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Date Taken</th>
                        </tr>
                      </thead>
                      <tbody>';
                      while($row = mysqli_fetch_assoc($result))
                      {# process each row
                        $myReturn .= '
                          <tr>
                          <td><a href="' . VIRTUAL_PATH . 'surveys/response_view.php?id=' . (int)$row['ResponseID'] . '">' . dbOut($row['DateAdded']) . '</a></td>
                          </tr>';
                      }
                      '</tbody>
                    </table>
                </div>';
               $myReturn .= $myPager->showNAV(); # show paging nav, only if enough records	 
        }else{#no records
           $myReturn .= "<div align=center>There are currently no responses!</div>";	
        }
        @mysqli_free_result($result);
        
        return $myReturn;
        

	}#stub of convenience method to produce a list of responses
	
	/**
	 * Reveals questions in internal Array of Question Objects 
	 *
	 * @param none
	 * @return string prints data from Question Array 
	 * @todo none
	 */
    
	function showQuestions()
	{
        $myReturn = '';
        
    
        if($this->TotalQuestions > 0)
		{#be certain there are questions
			foreach($this->aQuestion as $question)
			{#print data for each 
                $myReturn .= '
        
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>' .$question->Text . '</b></h3>
                    </div>
                    <div class="panel-body">'
                        . $question->showAnswers() . '<BR />
                    </div>
                </div>        
                ';
                /*
				echo $question->QuestionID . " ";
				echo $question->Text . " ";
				echo $question->Description . "<br />";
				#call showAnswers() method to display array of Answer objects
				$question->showAnswers() . "<br />";
                */
			}
		}else{
                $myReturn .= "There are currently no questions for this survey.";	
            }

        return $myReturn;
		
	}# end showQuestions() method

}# end MY_Survey class
