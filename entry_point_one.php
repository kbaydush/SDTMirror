<?php

require_once dirname(__FILE__) . "/init.php";

    $Handler = new Handler($CFG, $CFG->all_form_id_array['purchases']);

    $Handler->setRequestParams($_GET, $_POST);

    $Handler->action();



?>