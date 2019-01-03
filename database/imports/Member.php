<?php
class Member extends Import
{
    protected static $table = ["from" => "members", "to" => "users"];
    protected static $prefix = "mb_";

    
};