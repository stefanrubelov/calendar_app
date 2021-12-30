<?php

namespace App\Controllers;

use PDO;
use App\Controllers\Controller;

class CalendarController extends Controller
{
    /**
     * @var string $title, event title
     */
    private $title;

    /**
     * @var string $start_date
     */
    private $start_date;

    /**
     * @var string $end_date
     */
    private $end_date;

    /**
     * @var integer $user_id
     */
    private $user_id;

    /**
     * @var integer $event_id
     */
    private $event_id;

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * returns the calendar view
     * @return void
     */
    public function index(): void
    {
        require 'views/calendar.view.php';
    }

    /**
     * Save new event to database
     * @param string $title
     * @param string $start_date
     * @param string $end_date
     *
     * @return void
     */
    public function add(): void
    {
        $this->user_id = 11;

        $this->title = $_REQUEST['title'];
        $this->start_date = $_REQUEST['start_date'];
        $this->end_date = $_REQUEST['end_date'];

        // if (Validate::empty($this->title, $this->start_date, $this->end_date)) {
        //     $query = 'INSERT INTO events (user_id, title, start_date, end_date) values (:user_id, :title, :start_date, :end_date)';
        //     $stmt = $this->pdo->prepare($query);
        //     try {
        //         $stmt->execute(
        //             [
        //                 'user_id' => $this->user_id,
        //                 'title' => $this->title,
        //                 'start_date' => $this->start_date,
        //                 'end_date' => $this->end_date,
        //             ]
        //         );
        //     } catch (Exception $e) {
        //         //
        //     };
        // }
    }

    /**
     * Update existing event in database
     * @return void
     */
    public function update(): void
    {
    }

    /**
     * Delete existing event in database
     * @param int $event_id
     * @return void
     */
    public function deleteEvent($event_id): void
    {
        $this->event_id = $event_id;
        // if (Validate::empty($this->event_id)) {
        //     $query = "DELETE FROM events WHERE id=:event_id";
        //     $stmt = $this->pdo->prepare($query);
        //     $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
        //     try {
        //         $stmt->execute();
        //     } catch (Exception $e) {
        //         //
        //     };
        // }
    }

    /**
     * Return all events from database
     * @return json
     */
    public function getAllEvents()
    {
        $query = "SELECT * FROM events ORDER BY id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        // var_dump($result);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        echo $json;
    }
}
