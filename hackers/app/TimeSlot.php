<?php
/**
 * Class Timeslot
 */
abstract class Timeslot
{
    /**
     * @var Artist
     */
    private $artist;

    /**
     * @var string
     */
    private $description;

    /**
     * @var DateTime
     */
    private $startsAt;

    /**
     * @var DateTime
     */
    private $endsAt;

    /**
     * @param Artist $artist
     * @param string $description
     * @param DateTime $startsAt
     * @param DateTime $endsAt
     * @throws InvalidArgumentException
     */
    public function __construct(Artist $artist, string $description, DateTime $startsAt, DateTime $endsAt)
    {
        $this->artist = $artist;
		/*INPUT CHECK S.Pavlov*/
		 if(!is_string($description))
			throw new InvalidArgumentException('Timeslot constructor only accepts strings for description. Input was: '.$description);
        else
			$this->description = $description;
        $this->startsAt = $startsAt;
        $this->endsAt = $endsAt;
    }

    /**
     * @return Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getStartsAt()
    {
        return $this->startsAt;
    }

    /**
     * @return DateTime
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }

    /**
     * @param Timeslot $timeslot
     * @return bool
     */
    public function overlaps(Timeslot $timeslot)
    {
        /**
         * @TODO: Implementation
         */
			/*S.Pavlov*/
			return !($this->startsAt > $timeslot->endsAt) && !($this->endsAt < $timeslot->startsAt);
    }
}
?>