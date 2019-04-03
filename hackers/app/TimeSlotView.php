<?php
class TimeslotView {
    /**
     * @var Timeslot
     */
    private $timeslot;

    /**
     * @param Timeslot $timeslot
     */
    public function __construct(Timeslot $timeslot)
    {
        $this->timeslot = $timeslot;
    }

    /**
     * @return int
     */
    public function getDurationInMinutes()
    {
        /**
         * @TODO: Implementation
         */
		 /*S Pavlov*/
		 $dateDiff  = $this->startsAt->diff($this->endsAt);
        return $dateDiff->format("%I");
    }

    /**
     * @param int $length
     * @return string
     */
    public function getDescriptionExcerpt(int $length = 10)
    {
        /**
         * @TODO: Implementation
         */
		 /* S Pavlov*/
		  if(!is_int($length))
			throw new InvalidArgumentException('getDescriptionExcerpt function only accepts integers for length. Input was: '.$length);
        
        return substr($this->description, 0, $length);;
    }
}
?>