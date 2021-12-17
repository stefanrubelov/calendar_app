<?php

namespace App;

use PDO;
use database\Conn;
use Exception;
use Throwable;

class Calendar extends Conn
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
     * Calendar (event) constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Save new event to database
     * @param string $title
     * @param string $start_date
     * @param string $end_date
     *
     * @return void
     */
    public function addEvent($title, $start_date, $end_date): void
    {
        $this->user_id = 11;
        // $this->user_id = Auth::id();
        $this->title = $title;
        $this->start_date = $start_date;
        $this->end_date = $end_date;

        if (Validate::empty($this->title, $this->start_date, $this->end_date)) {
            $query = 'INSERT INTO events (user_id, title, start_date, end_date) values (:user_id, :title, :start_date, :end_date)';
            $stmt = $this->pdo->prepare($query);
            try {
                $stmt->execute(
                    [
                        'user_id' => $this->user_id,
                        'title' => $this->title,
                        'start_date' => $this->start_date,
                        'end_date' => $this->end_date,
                    ]
                );
            } catch (Exception $e) {
                //
            };
        }
    }

    /**
     * Update existing event in database
     * @return void
     */
    public function editEvent(): void
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
        if (Validate::empty($this->event_id)) {
            $query = "DELETE FROM events WHERE id=:event_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':event_id', $this->event_id, PDO::PARAM_INT);
            try {
                $stmt->execute();
            } catch (Exception $e) {
                //
            };
        }
    }

    /**
     * Return all events from database
     * @return 
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
