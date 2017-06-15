<?php

namespace Quefei\Core\Console;

use Illuminate\Console\Command;

class MakeCoreCommand extends Command
{
	protected $signature = 'make:core
					{--title=My__Title}
					{--logo=My__Logo}
					{--copyright=My__Copyright}';
	
	
	protected $description = 'Quefei Command';
	
	
	protected $titleFiles = [
		'vendor/quefei/myauth/src/Console/stubs/make/views/welcome.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/home.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/layouts/app.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/auth/register.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/auth/emailRegister.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/auth/login.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/auth/activate/activate.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/auth/activate/activateFail.stub',
		'vendor/quefei/myauth/src/Console/stubs/make/views/auth/activate/activateSuccess.stub',
		'vendor/quefei/myentrust/src/Views/role/index.blade.php',
		'vendor/quefei/myentrust/src/Views/user/index.blade.php',
		'vendor/quefei/myentrust/src/Views/searchUser/index.blade.php',
	];
	
	
	protected $logoFiles = [
		'vendor/quefei/myauth/src/Console/stubs/make/views/layouts/_nav.stub',
	];
	
	
	protected $copyrightFiles = [
		'vendor/quefei/myauth/src/Console/stubs/make/views/layouts/_footer.stub',
	];
	
	
	public function fire()
	{
		$this->replaceString('title', $this->titleFiles, 'title.buffer');
		
		$this->replaceString('logo', $this->logoFiles, 'logo.buffer');
		
		$this->replaceString('copyright', $this->copyrightFiles, 'copyright.buffer');
	}
	
	
	// 替换文件内容
	public function replaceString($option, $files, $buffer)
	{
		$mycount = 0;
		
		foreach ($files as $file)
		{
			$myOption = $this->option($option);
			$myFile = base_path($file);
			$myBuffer = __DIR__ . '/buffer/' . $buffer;
			
			file_put_contents($myFile, str_replace(file_get_contents($myBuffer), $myOption, file_get_contents($myFile), $count));
			
			$mycount = $mycount + $count;
		}
		
		file_put_contents($myBuffer, $myOption);
		
		if ($option == 'title')
		{
			echo $option . ': ' . $mycount . ($mycount == 12 ? '    Success' : '    Error, The default is 12') . "\n";
		} else
		{
			echo $option . ': ' . $mycount . ($mycount == 1 ? '    Success' : '    Error, The default is 1') . "\n";
		}
	}
}
