<?php
foreach (glob('../src/Clearvox/Asterisk/AMI/Message/Action/*') as $eventClass) {
    echo '"' . str_replace('Action.php', '', basename($eventClass)) . '" => "Clearvox\\\\Asterisk\\\\AMI\\\\Message\\\\Action\\\\' . str_replace('.php', '', basename($eventClass)) . '",';
    echo "<br/>";
}