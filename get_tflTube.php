<?php

echo file_get_contents('http://cloud.tfl.gov.uk/TrackerNet/LineStatus');


//foreach ($status->LineStatus as $line) {
//  echo '        <div class="tfl_tube '.strtolower(str_replace(' ','',$line->Line['Name'])).'">';
//  echo $line->Line['Name'].'</div><span id="tfl_tube_status_'.strtolower(str_replace(' ','',$line->Line['Name'])).'">'.$line->Status['Description'].'</span>';
//  if ($line['StatusDetails']!='')
//    echo '('.$line['StatusDetails'].')';
//  echo chr(10);
//} 
?>
