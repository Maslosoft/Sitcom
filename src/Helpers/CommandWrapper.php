<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
