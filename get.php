<?php
require "vendor/pda/pheanstalk/pheanstalk_init.php";

$count = 0;

$pheanstalk = new Pheanstalk("127.0.0.1");
do {
    $job = $pheanstalk->reserve(0);
    //$job = $pheanstalk->reserve(2);  // reserve - with timeout
    if (! $job) {
       break;
    }
    $count ++;

    $jobString = $job->getData();
    $pheanstalk->delete($job);

} while ($job);
fputs(STDERR, "got $count items from Beanstalkd\n");
