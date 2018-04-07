<?php 

namespace APP\Shell;

use Cake\Console\Shell;
use Pheanstalk\Pheanstalk;
use Cake\View\View;

class SecuritySheetShell extends Shell{
	public function main(){
		$this->listen();
	}

	public function listen(){
		$pheanstalk_producer = new pheanstalk('127.0.0.1');
		$pheanstalk_producer->watch('SecuritySheetTube');

		while($job = $pheanstalk_producer->reserve()){
			$payload = json_decode($job->getData(), true);

			$status = $this->generate($payload);

			if($status){
				$pheanstalk_producer->delete($job);
				$this->out('Security sheet produced');
			}else{
				$pheanstalk_producer->delete($job);
				// $pheanstalk_producer->release($job,0,15);
				$this->out('Security Sheet released because of an error occured');
			}
		}
	}

	public function generate($data){
		$view = new View();
        $view->viewPath='Generator';
        $view->layout = false;
        $view->set(compact('data'));
        $view_output = $view->render('security_sheets');

        $path = WWW_ROOT.'sheets/security_sheets/mock.html';
        file_put_contents($path, $view_output);
		
		$exec = shell_exec('wkhtmltopdf --no-stop-slow-scripts --javascript-delay 3000 '.WWW_ROOT.'sheets/security_sheets/mock.html '.WWW_ROOT.'sheets/security_sheets/mock.pdf');

		
		if($exec)
		return true;
	    else
	    return false;
	}
}