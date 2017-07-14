<?php 
/* Test for Excel.php: A class for use with PHP4 scripts only*/


/*
 * This is a test file for Excel class to create,load,read,write,save and use some of the 
 * internal functionalities of workbooks and sheets.
 * Tested with Windows 98 - MS Office 2000
 * Apache 1.3.9 PHP4.02 Running as CGI
 * (c) Alain M. Samoun 09/2000.
 * alain@sonic.net
 * Gnu GPL code (see www.fsf.org for more information ).
 */
 
 /* Set up files and directories for the test. Change as you wish.*/
 
 # Put the include file in your php include directory
	require ("excel.php");
 # Put the test.xls file in the C:\My Documents\ directory
	$workbook = "test.xls";
	$pathin = "C:\\My Documents\\";
	$sheet = "test";
	$pathout = "c:\\My Documents\\"; #The directory to save your files

 /* Instantiate Excel and open the test file. */

 #Instantiate Excel
    	$E = new Excel;

 #Open the workbook
    	$E->XL($workbook,$pathin,$sheet); 
    	Print "Test starting..<br>";

    	
 /* Read the content of a cell or range of cells */

  # Read the A1 cell
    	Print "The content of cell A1 is: ". $E->readrange($sheet,"A1")."<br>";
    
  # Read the content of cells A1,A2,A3,A4
    	$content = $E->readrange($sheet,"A1:A4");
		if (is_array($content))
		{
			$count = sizeof($content);
			for ($num=0; $num<$count; $num++)
			{
				$num2=$num+1;
   				print "Got Cell A$num2 Content = ". $content[$num] . "<br>";
   			}
		}
	
 /* Write to a cell or range of cells  */
 
  # Change the content of cell A1
    	$E->writerange($sheet,"A1","New content");
  # Read the new content  
    	Print "The content of cell A1 now is: ". $E->readrange($sheet,"A1")."<br>";
    
  # Write an array of numbers to the cells B1,C1,D1,E1
    	$array = array("1","2","3","4");
    	$E->writerange($sheet,"B1:E1",$array);
  # Read the new content for the range:
    	$content = $E->readrange($sheet,"B1:E1");
   	if (is_array($content))
    	{
		$count = sizeof($content);
		for ($num=0; $num<$count; $num++)
		{
			$letter= chr(66+$num);
   			print "Set cell $letter"."1 Content= ". $content[$num] . "<br>";
   		}
    	}
    
    
 /* Write a formula in cell B3  */
 
    	$E->writerange($sheet,"B3",'=SUM(B1..E1)');
  # Read the B3 content  
    	Print "The content of cell B3=SUM(B1..D1) is: ". $E->readrange($sheet,"B3")."<br>";

 /* Execute a macro */
 
 #The following will run the macro Macro2 that will put a string on cell D6
 #content of cell D6 before macro
 	Print"Cell D6 before macro:". $E->readrange($sheet,"D6")." <br>";
 	$E->runmacro($workbook,"Macro2");
 #Read the macro result:
 	$result = $E->readrange($sheet,"D6");
 	print "Cell D6 content after running Macro2 = $result <br>"; 
    
 /* Read the result of a build-in excel function */

 #Example: PMT financial function
 	$arrayparam = array("0.08/12","10","10000"); 
 	$result = $E->runfunction("PMT",$arrayparam);
 	print "<br>Financial function PMT result using the \"run function \" method: ".sprintf("%.2f",$result);


 /* Convert all files in a directory */
/* (Uncoment to run this part)
 #File to convert from extension "xls" to extension "csv"
 	if ($E->XLTranslate($pathin,$pathout,"xls","csv",0))
 	{
 		print "<br>All 'xls' files in $pathin have been converted to 'csv files in $pathout.<br>";
 	}
*/ 
 /* Save the workbook */     

 #Save the current workbook as a quattro pro file:
 	$E->saveas($workbook,$pathout,"WQ1");
 	print "<br> $workbook has been saved as a WQ1 file. <br>";

 /* Close workbook  and exit excel */
 	$E->closexl();
 	unset ($E);
 
 /* Start a new instance of excel with a new workbook */ 
     	$E = new Excel;
    	$E->XL("",$pathin,"sheet1"); #Note the empty name for workbook
    	Print "<br>Starting a new workbook<br>";
  # Write something in cell A1
    	$E->writerange("sheet1","A1","Cell A1 in the new workbook");
  # Read the new content  
    	Print "The content of cell A1 in the new workbook is: ". $E->readrange("sheet1","A1")."<br>";
  # Save the new workbook as an xls file
  	$E->saveas("newwkb",$pathout,"xls");
  # And close it
 	 $E->closexl();
         unset ($E);


 	echo "<br> Test finished!";
 
?>