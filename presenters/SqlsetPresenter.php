<?php
/**
 * Sqlset action
 *
 * @author kraken
 */
class PerfORMConsole_SqlsetPresenter extends PerfORMConsole_BasePresenter
{
    public function actionDefault()
    {
	$confirm= $this->getParam('confirm');
	$execute= $confirm ? true : false;
	PerfORMController::sqlset($execute);
	$this->template->confirm= $execute;
    }
}

