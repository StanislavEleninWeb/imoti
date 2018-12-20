<?php
namespace app\classes\output;

use app\interfaces\OutputInterface;

/**
 *
 * @author stanislavelenin
 *        
 */
class JsonOutput extends Output implements OutputInterface
{

    /**
     */
    public function __construct($input)
    {
        parent::__construct($input);
        // TODO - Insert your code here
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\OutputInterface::getOutput()
     */
    public function getOutput()
    {
        return json_encode(serialize($this->_input));
    }
}

