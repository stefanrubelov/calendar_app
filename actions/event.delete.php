<?php

use App\Controllers\CalendarController;


// dd($_REQUEST);
$event_id = $_REQUEST['event_id'];

$new_calendar = new CalendarController();
$new_calendar->deleteEvent($event_id);
