<?php
$sql = "SET @autoid :=0; 
UPDATE table_name SET id = @autoid:=(@autoid+1);
ALTER TABLE table_name AUTO_INCREMENT=1;";
?>