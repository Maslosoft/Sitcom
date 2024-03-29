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

namespace Maslosoft\Sitcom\Application;

use Maslosoft\Sitcom\Commands\BuildCommand;
use Maslosoft\Sitcom\Sitcom;
use Symfony\Component\Console\Application as ConsoleApplication;

/**
 * Application
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Application extends ConsoleApplication
{

	public const Logo = <<<LOGO
   _____ _ __
  / ___/(_) /__________  ____ ___
  \__ \/ / __/ ___/ __ \/ __ `__ \
 ___/ / / /_/ /__/ /_/ / / / / / /
/____/_/\__/\___/\____/_/ /_/ /_/


LOGO;

	public function __construct()
	{
		$sitcom = new Sitcom;
		parent::__construct('Sitcom', $sitcom->getVersion());
		$this->add(new BuildCommand());
		$sitcom->addCommands($this);
	}

	public function getHelp(): string
	{
		return self::Logo . parent::getHelp();
	}

}
