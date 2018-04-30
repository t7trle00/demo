<?php print_r($historyData) ?>

<?php for($i = 0; $i < count($historyData); $i ++)
      {
        if($this->session->id == $historyData[$i]['userID'])
        {
          echo 'This is renter' ;
        }
        else {
          echo 'This is host' ;
        }
      }
  ?>
