<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 12/11/2018
 * Time: 14:29
 */

require_once ("../model/mainModel.php");



if(isset($_GET)){
    $quartiers =  json_encode(GetQuartiers());
    echo($quartiers);
}