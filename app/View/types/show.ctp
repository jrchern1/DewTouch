
<span id="d1"></span>
<?php 
   if (strlen($this->request->data['Type']['type'])>0) echo __("You choosed ").$this->request->data['Type']['type'].".";
   else echo __("You choosed nothing.");
?>
