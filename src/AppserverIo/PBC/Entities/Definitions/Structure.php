<?php

/**
 * AppserverIo\PBC\Entities\Definitions\Structure
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Library
 * @package    PBC
 * @subpackage Entities
 * @author     Bernhard Wick <bw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io/pbc
 * @link       http://www.appserver.io
 */

namespace AppserverIo\PBC\Entities\Definitions;

/**
 * This class is used as a DTO fort our structure map and etc.
 *
 * @category   Library
 * @package    PBC
 * @subpackage Entities
 * @author     Bernhard Wick <bw@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io/pbc
 * @link       http://www.appserver.io
 */
class Structure
{
    /**
     * @var array $allowedTypes Will contain types which are allowed for a structure instance
     */
    protected $allowedTypes;

    /**
     * @var int $cTime The manipulation time of the structure file
     */
    protected $cTime;

    /**
     * @var string $identifier The identifier (namespace + structure name) of the structure
     */
    protected $identifier;

    /**
     * @var string $path Path to the file containing the structure definition
     */
    protected $path;

    /*
     * @var string $type Type of the structure e.g. "class"
     */
    protected $type;

    /**
     * @var boolean $hasContracts Does the structure even have contracts
     */
    protected $hasContracts;

    /**
     * @var boolean $enforced Do we have to enforce contracts (if any) within this structure?
     */
    protected $enforced;

    /**
     * Default constructor
     *
     * @param int     $cTime        The manipulation time of the structure file
     * @param string  $identifier   The identifier (namespace + structure name) of the structure
     * @param string  $path         Path to the file containing the structure definition
     * @param string  $type         Type of the structure e.g. "class"
     * @param boolean $hasContracts Does the structure even have contracts
     * @param boolean $enforced     Do we have to enforce contracts (if any) within this structure?
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($cTime, $identifier, $path, $type, $hasContracts = false, $enforced = false)
    {
        // Set the attributes.
        $this->cTime = $cTime;
        $this->identifier = $identifier;
        $this->path = $path;
        $this->hasContracts = $hasContracts;
        $this->enforced = $enforced;
        $this->allowedTypes = array('class', 'interface', 'trait');

        // Check if we got an allowed value for the type.
        $allowedTypes = array_flip($this->allowedTypes);
        if (!isset($allowedTypes[$type])) {

            throw new \InvalidArgumentException();
        }

        $this->type = $type;
    }

    /**
     * Getter for manipulation time
     *
     * @return int
     */
    public function getCTime()
    {
        return $this->cTime;
    }

    /**
     * Getter for identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Getter for the path of the structure
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Getter for the structure type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Does the structure have any contracts
     *
     * @return bool
     */
    public function hasContracts()
    {
        return (bool)$this->hasContracts;
    }

    /**
     * Is this structure enforced?
     *
     * @return bool
     */
    public function isEnforced()
    {
        return (bool)$this->enforced;
    }
}
