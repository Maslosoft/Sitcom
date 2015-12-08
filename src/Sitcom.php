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

namespace Maslosoft\Sitcom;

use Maslosoft\Signals\Signal;
use Maslosoft\Sitcom\Helpers\CommandWrapper;
use Symfony\Component\Console\Application;

class Sitcom
{

	/**
	 * Version number holder
	 * @var string
	 */
	private static $_version = null;

	public function addCommands(Application $app)
	{
		$signal = new Signal();
		$signal->init();
		$result = $signal->emit(new Command(new CommandWrapper($app)));
	}

	public function __get($name)
	{
		return $this->{'get' . ucfirst($name)}();
	}

	public function __set($name, $value)
	{
		$this->{'set' . ucfirst($name)}($value);
	}

	/**
	 * Get version number
	 * @return string
	 */
	public function getVersion()
	{
		if (null === self::$_version)
		{
			self::$_version = require __DIR__ . '/version.php';
		}
		return self::$_version;
	}

}
