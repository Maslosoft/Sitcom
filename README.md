<!--header-->
<!-- Auto generated do not modify between `header` and `/header` -->

# <a href="http://maslosoft.com/sitcom/">Maslosoft Sitcom</a>
<a href="http://maslosoft.com/sitcom/">_Signals based console application wrapper_</a>

<a href="https://packagist.org/packages/maslosoft/sitcom" title="Latest Stable Version">
<img src="https://poser.pugx.org/maslosoft/sitcom/v/stable.svg" alt="Latest Stable Version" style="height: 20px;"/>
</a>
<a href="https://packagist.org/packages/maslosoft/sitcom" title="License">
<img src="https://poser.pugx.org/maslosoft/sitcom/license.svg" alt="License" style="height: 20px;"/>
</a>
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Maslosoft/Sitcom/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Maslosoft/Sitcom/?branch=master)

### Quick Install
```bash
composer require maslosoft/sitcom:"*"
```

<!--/header-->

Sitcom allows you to call commands from many sources from one executable.

To add command to sitcom add it via signals, here is example from hedron:

```php
// Use statments skipped
class RenderTemplateCommand extends Symfony\Component\Console\Command\Command
{
	protected function configure()
	{
		// irrelevant
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		// irrelevant
	}
	
	/**
	 * @SlotFor(Maslosoft\Sitcom\Command)
	 * @param Maslosoft\Signals\Command $signal
	 */
	public function reactOn(\Maslosoft\Sitcom\Command $signal)
	{
		$signal->add($this, 'hedron');
	}
```

Call `sitcom collect`, this will generate command list.

Now call `sitcom` to list commands, here is the output:

```
   _____ _ __
  / ___/(_) /__________  ____ ___
  \__ \/ / __/ ___/ __ \/ __ `__ \
 ___/ / / /_/ /__/ /_/ / / / / / /
/____/_/\__/\___/\____/_/ /_/ /_/

Sitcom version 1.0.0

Usage:
 command [options] [arguments]

Options:
 --help (-h)           Display this help message
 --quiet (-q)          Do not output any message
 --verbose (-v|vv|vvv) Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
 --version (-V)        Display this application version
 --ansi                Force ANSI output
 --no-ansi             Disable ANSI output
 --no-interaction (-n) Do not ask any interactive question

Available commands:
 collect          Build a list of commands
 help             Displays help for a command
 list             Lists commands
hedron
 hedron:commit    Apply headers to all php classes
 hedron:preview   Show list of files to which headers will be applied
 hedron:show      Show how current template will look like
```