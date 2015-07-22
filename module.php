<?php

require_once('forAllPages.php');
require_once('moduleservices.php');
$moduleServices = new ModuleServices();
$categoryListing = $moduleServices->getModuleCategories($_GET['moduleID']);


include('header.partial.php');
?>


            <h2 class="sub-header">
                <?php print $_GET['moduleID'] ; ?>
            </h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width:30%">
                            Category Name
                        </th>
                        <th style="width:70%">
                            Description
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categoryListing as $category) :?>
                        <tr id="<?php print $category->categoryID; ?>" onclick="selectedCategory(this)">
                            <td>
                                <?php print $category->title; ?>
                            </td>
                            <td>
                                <?php print $category->description; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

<?php include('footer.partial.php');