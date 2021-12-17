<?php

use App\Calendar;

require '..\autoload.php';

// dd($_REQUEST);
$event_id = $_REQUEST['event_id'];

$new_calendar = new Calendar();
$new_calendar->deleteEvent($event_id);
