<?php

/**
 * Class Schedule
 To solve the test please fill all the code gaps which are marked as @TODO. 
 In Schedule.php you need to implement the interfaces Iterator and Countable. 
 Invalid parameters (e.g. empty string for names) should be handled with an InvalidArgumentException.
 */
class Schedule implements Iterator, Countable {
    /**
     * @var array
     */
    private $timeslots;
	
		/* FOR ITERATOR*/
		
		private $position = 0;
		
    /**
     *
     */
    public function __construct()
    {
        $this->timeslots = array();
    }

    /**
     * @param Timeslot $timeslot
     * @return $this
     */
    public function addTimeslot(Timeslot $timeslot)
    {
        if (!$this->overlaps($timeslot)) {
            $this->timeslots[] = $timeslot;
        }

        $this->sortByStartTime();
    }

    /**
     * Sort slots by starting time
     */
    private function sortByStartTime()
    {
        usort($this->timeslots, function (Timeslot $timeslot1,Timeslot $timeslot2) {
            /**
             * @TODO: Implementation
             */
			 /* S. Pavlov
			 * @return    0  1 = 2
			 *			-1 1 > 2
			 *	 		1  2 > 1
			 *
			 */
			 if($timeslot1->$startsAt == $timeslot2->$startsAt) return 0;
               return ($timeslot1->$startsAt > $timeslot2->$startsAt) ? -1 : 1;}); 
        });
    }

    /**
     * @param Timeslot $timeslot
     * @return bool
     */
    public function overlaps(Timeslot $timeslot)
    {
        foreach ($this->timeslots as $existingSlot) {
            if ($timeslot->overlaps($existingSlot)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int
     */
    public function count()
    {
        /**
         * @TODO: Implementation
         */
			/* S. Pavlov*/
			return count($this->timeslots);

    }

    /**
     * @return void
     */
    function rewind()
    {
        /**
         * @TODO: Implementation
         */
			/* S. Pavlov*/
			$this->position = 0;
    }

    /**
     * @return mixed
     */
    function current()
    {
        /**
         * @TODO: Implementation
         */
		 /* S. Pavlov*/
		 return $this->timeslots[$this->position];
    }

    /**
     * @return mixed
     */
    function key()
    {
        /**
         * @TODO: Implementation
         */
			/* S. Pavlov*/
			return $this->position;
    }

    /**
     * @return void
     */
    function next()
    {
        /**
         * @TODO: Implementation
         */
		 /* S. Pavlov*/
		  ++$this->position;
    }

    /**
     * @return bool
     */
    function valid() {
        /**
         * @TODO: Implementation
         */
		 /* S. Pavlov*/
		 return isset($this->timeslots[$this->position]);
    }
}
?>