<?php

namespace Quefei\Core\Console;

use Illuminate\Console\Command;

class MakeCoreCommand extends Command
{
	protected $signature = 'make:core
					{--T|title=My__Title}
					{--L|logo=My__Logo}
					{--C|copyright=My__Copyright}';
	
	
	protected $description = 'Quefei Command';
	
	
	protected $titleFiles = [
		'myauth/src/Console/stubs/make/views/welcome.stub',
		'myauth/src/Console/stubs/make/views/home.stub',
		'myauth/src/Console/stubs/make/views/layouts/app.stub',
		'myauth/src/Console/stubs/make/views/auth/register.stub',
		'myauth/src/Console/stubs/make/views/auth/emailRegister.stub',
		'myauth/src/Console/stubs/make/views/auth/login.stub',
		'myentrust/src/Views/role/index.blade.php',
		'myentrust/src/Views/user/index.blade.php',
		'myentrust/src/Views/searchUser/index.blade.php',
	];
	
	
	protected $logoFiles = [
		'myauth/src/Console/stubs/make/views/layouts/_nav.stub',
	];
	
	
	protected $copyrightFiles = [
		'myauth/src/Console/stubs/make/views/layouts/_footer.stub',
	];
	
	
	public function fire()
	{
		
	}
}
