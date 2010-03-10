<?php
/**
 * Sqlall action
 *
 * @author kraken
 */
class PerfORMConsole_SqlallPresenter extends PerfORMConsole_BasePresenter
{

    public function actionDefault()
    {
	$sql= PerfORMController::sqlall();
	$this->template->sql = (is_null($sql)) ? false : $sql;
    }
}

