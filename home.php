<?php
require_once('forAllPages.php');
require_once('moduleservices.php');

$moduleServices = new ModuleServices();
$_GET['moduleID'] = 'OHIRA1001';
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

<div class="container-fluid" style="margin-right: 40px">
    <?php foreach ($moduleListing as $module) : ?>
        <div class="panel">
            <div class="panel-heading module-header">
                <h4 class="module-header" data-toggle="collapse" data-target="#<?php print $module->moduleID; ?>">
                    <?php print $module->moduleID ?>
                </h4>
            </div>
            <div id="<?php print $module->moduleID; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php foreach ($categoryListing as $category) : ?>
                        <div class="module-body" id="<?php print $category->categoryID; ?>"
                             onclick="selectedCategory(this)">
                            <a href="#"><?php print $category->title; ?>  </a><br>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-sm-12" style="height: 2px"></div>
        </div>
    <?php endforeach; ?>
</div>

<?php include('footer.partial.php'); ?>
