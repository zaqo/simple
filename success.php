
<?php
		$content="";
		
		$domOBJ = new DOMDocument();
		$domOBJ->load('https://www.delfi.lv/rss/?channel=delfi');//XML page URL
 
		$xml_ = $domOBJ->getElementsByTagName("item");
		$content.= '<table class="table table-striped table-hover table-sm ml-3 mr-1 mt-1">';// To be transferred to the css
		$content.= '<thead>';
		$content.= '<tr><th>#</th><th>News</th><th>Ref</th
					</tr>';
		$content.= '<tbody>';
		$counter=0;
		foreach( $xml_ as $data )
		{
			$title = $data->getElementsByTagName("title")->item(0)->nodeValue;
			$link = $data->getElementsByTagName("link")->item(0)->nodeValue;
			$counter+=1;
			if ($counter>20)
				break;
			else
			{
				$content.='<tr><td>'.$counter.'</td><td>'.$title.' </td><td><a href="'.$link.'">Link </a></td></tr>';
			}
			
		}
		$content.= '</tbody></table>';
		echo $content;
?>
 