<?php

/**
 * This software package is licensed under New BSD license.
 *
 * @package maslosoft/sitcom
 * @licence New BSD
 * @copyright Copyright (c) Piotr Masełkowski <pmaselkowski@gmail.com>
 * @copyright Copyright (c) Maslosoft
 * @copyright Copyright (c) Others as mentioned in code
 * @link http://maslosoft.com/mangan/
 */

namespace Maslosoft\Sitcom;

use Maslosoft\Signals\Signal;
use Maslosoft\Sitcom\Commands\BuildCommand;
use Maslosoft\Sitcom\Helpers\CommandWrapper;
use Symfony\Component\Console\Application;

class Sitcom extends Application
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
		parent::__construct('Sitcom', '1.0.0');
		$this->add(new BuildCommand());
		$signal = new Signal();
		$signal->paths = [
			'vendor'
		];
		$signal->init();
		$signals = $signal->emit(new Command(new CommandWrapper($this)));
	}

	public function getHelp()
	{
		return self::Logo . parent::getHelp();
	}

}
