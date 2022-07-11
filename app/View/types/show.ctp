
<span id="d1"></span>
<?php 
   if (!empty($this->request->data['Type']['type'])) echo __("You choosed ").$this->request->data['Type']['type'].".";
   else echo __("You choosed nothing.");
?>
