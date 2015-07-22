<?php


class Module
{
    var $moduleID;
    var $title;
    var $description;

    public function __construct($moduleID, $title, $description){
        $this->moduleID = $moduleID;
        $this->title = $title;
        $this->description = $description;
    }
}