<?php

class CodeDrop_CallRequest_Model_Cron
{
    public function codedrop_callrequest_clear_cache()
    {

        $file_name = time() . '.html';
        $fp = fopen('/var/www/html/'.$file_name, 'wb');
        $text = "Какой-то текст";
        fwrite($fp, $text);
        fclose($fp);
    }
}
