<?php
    require_once('../library/common-functions.php');
    echo '<pre>';
    print_r(filter_data_before_query(['123', 'absd', "dad'sdc", 'asf\df', 1234, 123.2]));
    echo '</pre>';