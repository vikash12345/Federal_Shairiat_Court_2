<?php
/*This scraper for Federal Sharait Court of Criminal Cases.
Link : http://federalshariatcourt.gov.pk/s1.html
Created By Vikash Harjeewan
Date  : 3/1/2018
I added daily schedules for scrape updated data regular
*/

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//totalpages is for future if you saw there is more than 36 pages just change number in totalpages=	;
//http://federalshariatcourt.gov.pk/11.html

$totalpages   = 19;

for($page = 1;$page <= $totalpages; $page++)
	{
		$link	=	'http://federalshariatcourt.gov.pk/s'.$page.'.html';
		$html	=	file_get_html($link);
		foreach($html->find("/html/body/table/tbody/tr[3]/td/table[1]/tbody/tr[2]/td[2]/table[2]/tbody/tr/td/table/tbody/tr") as $element)
		{								
		$no 	=	$element->find("td[1]",0)->plaintext;
		 if (is_numeric($no) == true) 
		 { 
			$s_no 		=	$element->find("td[1]",0)->plaintext;
			$sm 		=	$element->find("td[2]",0)->plaintext;
			$nameoflaw 	=	$element->find("td[3]",0)->plaintext;
			$amm  		=	$element->find("td[4]",0)->plaintext;
			$whe  		=	$element->find("td[5]",0)->plaintext;
			$ord  		=	$element->find("td[6]",0)->plaintext;
			
						scraperwiki::save_sqlite(array('s_no'), array('s_no'=> $s_no,'sm'=> $sm,'nameoflaw'=> $nameoflaw,'amm'=> $amm,'whe'=> $whe,'ord'=> $ord,'link'=> $link));

		 } 
		}
	
	}
?>
