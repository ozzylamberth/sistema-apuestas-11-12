<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
define("PHPCOVERAGE_HOME", "/path/to/phpcoverage/src"); 
require_once PHPCOVERAGE_HOME . "/CoverageRecorder.php";
require_once PHPCOVERAGE_HOME . "/CoverageRecorder.php";
require_once PHPCOVERAGE_HOME . "/reporter/HtmlCoverageReporter.php";
$reporter = new HtmlCoverageReporter("Code Coverage Report", "", "report");

$includePaths = array(".");
$excludePaths = array("test", "foo.php");
$cov = new CoverageRecorder($includePaths, $excludePaths, $reporter);

$cov->startInstrumentation();
... // run tests
$cov->stopInstrumentation();
$cov->generateReport();
$reporter->printTextSummary();
?>
</body>
</html>