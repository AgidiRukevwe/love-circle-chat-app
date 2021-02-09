<?php
$sql = "SET @autoid :=0; 
UPDATE table_name SET id = @autoid:=(@autoid+1);
ALTER TABLE table_name AUTO_INCREMENT=1;";


SELECT DISTINCT * FROM `rooms`, `users` WHERE rooms.users LIKE '%6019483dbb209%' AND users.user_id != '6019483dbb209' AND rooms.users LIKE CONCAT ('%', users.user_id, '%')
?>