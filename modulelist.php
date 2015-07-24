<?php
require_once('forAllPages.php');
require_once('moduleservices.php');
$moduleServices = new ModuleServices();
$moduleListing = $moduleServices->getModuleListing();

include('header.partial.php');
?>

<h2 class="sub-header">
    Modules
</h2>

<div class="table-responsive">
    <table class="table table">
        <thead>
        <tr>
            <th style="width:15%">
                Module Code
            </th>
            <th style="width:20%">
                Title
            </th>
            <th style="width:65%">
                Description
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($moduleListing as $module) : ?>
        <tr id="<?php print $module->moduleID; ?>" onclick="selectedModule(this)">
            <td>
                <?php print $module->moduleID; ?>
            </td>
            <td>
                <?php print $module->title; ?>
            </td>
            <td>
                <?php print $module->description; ?>
            </td>
        </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('footer.partial.php'); ?>