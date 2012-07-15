<?php
require_once "vendor/pda/pheanstalk/pheanstalk_init.php";
$pheanstalk = new Pheanstalk('127.0.0.1');

$pheanstalk->useTube('testtube')
           ->put("job payload goes here\n");


==================
<?php
require_once "vendor/pda/pheanstalk/pheanstalk_init.php";
$pheanstalk = new Pheanstalk('127.0.0.1');

$job = $pheanstalk->watch('testtube')
                  ->ignore('default')
                  ->reserve();

// <em>handwave</em> to run the job
echo $job->getData();

$pheanstalk->delete($job);
