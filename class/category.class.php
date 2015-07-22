<?php


class Category
{
    var $categoryID;
    var $moduleID;
    var $title;
    var $description;
    var $questionType;

    public function __construct($categoryID, $moduleID, $title, $description, $questionType){
        $this->categoryID = $categoryID;
        $this->moduleID = $moduleID;
        $this->title = $title;
        $this->description = $description;
        $this->questionType = $questionType;
    }

}