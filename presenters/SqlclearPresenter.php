<?php
/**
 * Sqlclear action
 *
 * @author kraken
 */
class PerfORMConsole_SqlclearPresenter extends PerfORMConsole_BasePresenter
{

    public function actionDefault()
    {
	$confirm= $this->getParam('confirm');
	$execute= ($confirm) ? true : false;
	$sql= PerfORMController::sqlclear($execute);
	$this->template->sql = (is_null($sql)) ? false : $sql;
	$this->template->confirm= $execute;
    }
}

