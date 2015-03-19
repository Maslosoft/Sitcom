<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Sitcom;

use Maslosoft\Sitcom\Helpers\CommandWrapper;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

/**
 * CommandSignal
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Command
{

	/**
	 *
	 * @var CommandWrapper
	 */
	private $app = null;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function add(SymfonyCommand $command, $namespace = '')
	{
		$this->app->add($command, $namespace);
	}

}
