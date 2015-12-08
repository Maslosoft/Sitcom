<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Sitcom\Application;

use Maslosoft\Signals\Signal;
use Maslosoft\Sitcom\Command;
use Maslosoft\Sitcom\Commands\BuildCommand;
use Maslosoft\Sitcom\Helpers\CommandWrapper;
use Maslosoft\Sitcom\Sitcom;
use Symfony\Component\Console\Application as ConsoleApplication;

/**
 * Application
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Application extends ConsoleApplication
{

	const Logo = <<<LOGO
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
		$signal = new Signal();
		$signal->emit(new Command(new CommandWrapper($sitcom)));
	}

	public function getHelp()
	{
		return self::Logo . parent::getHelp();
	}

}
