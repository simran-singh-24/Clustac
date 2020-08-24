<?php

function checkfiltertype() {

    if(isset($_POST['level1'])){

        $val='level1';
        return $val;
    }

    else if (isset($_POST['level2'])) {

        $val='level2';
        return $val;

    }
    else if (isset($_POST['level3'])) {

        $val='level3';
        return $val;

    }
    else if (isset($_POST['rating1'])) {

        $val='rating1';
        return $val;

    }
    else if (isset($_POST['rating2'])) {

        $val='rating2';
        return $val;

    }
    else if (isset($_POST['rating3'])) {

        $val='rating3';
        return $val;

    }
    else if (isset($_POST['rating4'])) {

        $val='rating4';
        return $val;

    }

    else if (isset($_POST['site1'])) {

        $val='site1';
        return $val;

    }
    else if (isset($_POST['site2'])) {

        $val='site2';
        return $val;

    }
    else if (isset($_POST['site3'])) {

        $val='site3';
        return $val;

    }


}


function checktagtype(){

    $checktype = checkfiltertype();

    if($checktype=='level1' || $checktype=='level2' || $checktype=='level3' ) {

        $tagtype='c_level';
        return $tagtype;
    }

    else if($checktype=='rating1' || $checktype=='rating2' || $checktype=='rating3' || $checktype=='rating4' ) {

        $tagtype='c_rating';
        return $tagtype;
    }

    else if($checktype=='site1' || $checktype=='site2' || $checktype=='site3' ) {

        $tagtype='c_site';
        return $tagtype;
    }

}

