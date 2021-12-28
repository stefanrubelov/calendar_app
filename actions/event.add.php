<?php

use App\Controllers\CalendarController;

// dd($_REQUEST);

$title = $_REQUEST['title'];
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];

$new_calendar = new CalendarController();
$new_calendar->addEvent($title, $start_date, $end_date);
