<?php

echo file_get_contents('https://www.firstgreatwestern.co.uk/Services/LDB.aspx?method=departures&crs=MAI');


//foreach ($status->LineStatus as $line) {
//  echo '        <div class="tfl_tube '.strtolower(str_replace(' ','',$line->Line['Name'])).'">';
//  echo $line->Line['Name'].'</div><span id="tfl_tube_status_'.strtolower(str_replace(' ','',$line->Line['Name'])).'">'.$line->Status['Description'].'</span>';
//  if ($line['StatusDetails']!='')
//    echo '('.$line['StatusDetails'].')';
//  echo chr(10);
//} 
?>
