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

use Maslosoft\Cli\Shared\ConfigReader;
use Maslosoft\Signals\Signal;
use Maslosoft\Sitcom\Helpers\CommandWrapper;
use Symfony\Component\Console\Application;

class Sitcom
{

	/**
	 * Config file name
	 */
	const ConfigName = "sitcom";

	/**
	 * Version number holder
	 * @var string
	 */
	private static $_version = null;

	public function __construct($configName = self::ConfigName)
	{
		$config = new ConfigReader($configName);
		$cfg = (object) $config->toArray();
		if (!empty($cfg->require))
		{
			$cwd = getcwd();
			foreach ($cfg->require as $require)
			{
				require_once(sprintf('%s/%s', $cwd, $require));
			}
		}
	}

	public function addCommands(Application $app)
	{
		$signal = new Signal();
		$signal->init();
		$signal->emit(new Command(new CommandWrapper($app)));
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
