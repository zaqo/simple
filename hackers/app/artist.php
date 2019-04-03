<?php
**
 * Class Artist
 */
class Artist {
    /**
     * @var string
     */
    private $name;

    /**
     * @param $name string
     * @throws InvalidArgumentException
     */
    public function __construct(string $name)
    {
        
		if(!is_string($name))
			throw new InvalidArgumentException('Artist class constructor only accepts strings. Input was: '.$name);
		else 
			$this->name = $name;	
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
?>