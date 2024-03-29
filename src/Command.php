<?php

/**
 * This software package is licensed under AGPL, Commercial license.
 *
 * @package maslosoft/sitcom
 * @licence AGPL, Commercial
 * @copyright Copyright (c) Piotr Masełkowski <pmaselkowski@gmail.com>
 * @copyright Copyright (c) Maslosoft
 * @link http://maslosoft.com/sitcom/
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
	private CommandWrapper $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function add(SymfonyCommand $command, $namespace = ''): void
	{
		$this->app->add($command, $namespace);
	}

}
