<?php

require_once dirname(__FILE__) . "/bootstrap.php";

    $Handler = new Handler($CFG, $CFG->all_form_id_array['refunds']);

    $Handler->setRequestParams($_GET, $_POST);

    $Handler->action();

?>