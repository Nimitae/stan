<?php


class Category
{
    var $categoryID;
    var $moduleID;
    var $title;
    var $description;

    public function __construct($categoryID, $moduleID, $title, $description){
        $this->categoryID = $categoryID;
        $this->moduleID = $moduleID;
        $this->title = $title;
        $this->description = $description;
    }

}