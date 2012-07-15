<?php
require "vendor/pda/pheanstalk/pheanstalk_init.php";

$count = 1682;

$pheanstalk = new Pheanstalk('127.0.0.1');
for ($i = $count; $i > 0; $i --) {
    $pheanstalk->put("job payload goes here\n");
}
echo "put $count items into Beanstalkd\n";