<?php

/**
 * This software package is licensed under AGPL, Commercial license.
 *
 * @package maslosoft/sitcom
 * @licence AGPL, Commercial
 * @copyright Copyright (c) Piotr Masełkowski <pmaselkowski@gmail.com>
 * @copyright Copyright (c) Maslosoft
 * @copyright Copyright (c) Others as mentioned in code
 * @link http://maslosoft.com/mangan/
 */

namespace Maslosoft\Sitcom\Helpers;

use Maslosoft\Sitcom\Sitcom;
use Symfony\Component\Console\Command\Command;

/**
 * CommandWrapper
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class CommandWrapper
{

	/**
	 * Sitcom instance
	 * @var Sitcom
	 */
	private $sitcom = null;

	public function __construct(Sitcom $sitcom)
	{
		$this->sitcom = $sitcom;
	}

	public function add(Command $command, $namespace = '')
	{
		if(strlen($namespace))
		{
			$command->setName($namespace . ':' . $command->getName());
		}
		$this->sitcom->add($command);
	}

}
