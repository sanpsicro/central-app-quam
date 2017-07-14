/**************************************************************
* This script is brought to you by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
****************************************************************/


function Load_external_content()
{
	$('#external_page_content_displayer').load('external_content.php').hide().fadeIn(3000);
}
setInterval('Load_external_content()', 10000);