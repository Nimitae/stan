<?php
require_once('forAllPages.php');
require_once('moduleservices.php');
$moduleServices = new ModuleServices();
$_GET['moduleID']='OHIRA1001';
$moduleListing = $moduleServices->getModuleListing();
$categoryListing = $moduleServices->getModuleCategories($_GET['moduleID']);

include('header.partial.php');
?>

<h1 class="overview-header">
    Welcumz
</h1>

<h2 class="sub-header">
    Modules
</h2>

    <?php foreach ($moduleListing as $module) : ?>

            <a href="#" data-toggle="collapse" data-target="#<?php print $module->moduleID; ?>" class="col-sm-12 module-header">
            <?php print $module->moduleID ?>
            </a>

        <div id="<?php print $module->moduleID; ?>" class="collapse">
            <?php foreach ($categoryListing as $category) :?>

                <div class="module-body" id="<?php print $category->categoryID;?>" onclick="selectedCategory(this)">
                    <a href="#"><?php print $category->title; ?>  </a><br>
                </div>

            <?php endforeach; ?>
        </div>
        <div class="col-sm-12" style="height: 2px"></div>
    <?php endforeach; ?>


<?php include('footer.partial.php'); ?>
