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

namespace Maslosoft\Sitcom\Helpers;

use Symfony\Component\Console\Application;
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
	 * @var Application
	 */
	private Application $app;

	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	public function add(Command $command, $namespace = ''): void
	{
		if ($namespace != '')
		{
			$command->setName($namespace . ':' . $command->getName());
		}
		$this->app->add($command);
	}

}
