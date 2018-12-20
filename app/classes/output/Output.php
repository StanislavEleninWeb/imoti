<?php
namespace app\classes\output;

use app\interfaces\OutputInterface;

/**
 *
 * @author stanislavelenin
 *        
 */
class Output implements OutputInterface
{

    /**
     *
     * @var string object array
     */
    protected $_input;

    /**
     */
    public function __construct($input)
    {
        $this->_input = $input;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\OutputInterface::getOutput()
     */
    public function getOutput()
    {
        return serialize($this->_input);
    }
}

