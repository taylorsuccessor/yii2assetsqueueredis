<?php

namespace app\queue;

use yii\base\Object;

class DownloadJob extends Object implements \yii\queue\Job
{
    public $url;
    public $file;

    public function execute($queue)
    {
        echo 'start job ...';
        file_put_contents($this->file, file_get_contents($this->url));
    }
}