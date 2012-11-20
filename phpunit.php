<?php

//$type = (isset($_GET['type'])) ? $_GET['type'] : 'phpunit';

/*exec('phpunit -c "C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\loyerexpress\trunk\tests\\'.$type.'.xml" > "C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\loyerexpress\trunk\tests\log.txt"');

$file = file_get_contents('C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\loyerexpress\trunk\tests\log.txt');

print $file;*/


if (isset($_GET['project'])) {
	$projectName = $_GET['project'];

	include 'config.php';

	if ($projectList[$projectName]) {
		$projectConfig = $projectList[$projectName];

		if ($projectConfig['unitConfXml'])
			$unitConfXml = (string) $projectConfig['unitConfXml'];

		if (isset($unitConfXml)) {
			set_time_limit(3720);
			ini_set('memory_limit', '512M');
			require_once 'libs/PHPUnit/Autoload.php';

			$suite = new PHPUnit_TextUI_Command();

			$param = Array(
				'',
				'-c',
				$unitConfXml
			);

			 // We need to temporarily turn off html_errors to ensure correct parsing of test debug output
			$html_errors = ini_get('html_errors');

			ob_start();

			ini_set('html_errors', 0);
			
			$suite->run($param);
			$results = ob_get_contents();
			
			ini_set('html_errors', $html_errors);
			
			ob_end_clean();

			print $results;
		} else {
			sprintf('No define phpunit config file for project %s', $projectName);
		}
	} else {
		sprintf('Project %s not found', $projectName);
	}
}
?>