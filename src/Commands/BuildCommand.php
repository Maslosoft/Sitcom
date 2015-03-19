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

namespace Maslosoft\Sitcom\Commands;

use Maslosoft\Signals\Signal;
use Maslosoft\Signals\Utility;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * BuildCommand
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class BuildCommand extends Command
{
	protected function configure()
	{
		$this->setName("collect");
		$this->setDescription("Build a list of commands");
		$this->setDefinition([
		]);

		$help = <<<EOT
The <info>collect</info> command scan for command signals.
EOT;
		$this->setHelp($help);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$signal = new Signal();
		@mkdir($signal->runtimePath);
		(new Utility($signal))->generate();
	}
}
