<?php
/**
 * Syncdb action
 *
 * @author kraken
 */
class PerfORMConsole_SyncdbPresenter extends PerfORMConsole_BasePresenter
{
    public function actionDefault()
    {
	$confirm= $this->getParam('confirm');
	$execute= ($confirm) ? true : false;
	$sql= PerfORMController::syncdb($execute);
	$this->template->sql = (is_null($sql)) ? false : $sql;
	$this->template->confirm= $execute;
    }
}

