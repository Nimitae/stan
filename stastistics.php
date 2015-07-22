<?php
require_once('forAllPages.php');
require_once('statisticservices.php');
require_once('moduleservices.php');

$statsService = new StatisticServices();
$moduleService = new ModuleServices();
$categoryList = $moduleService->getAllCategories();

if (isset($_SESSION['email'])) {
    $finalStats = array();
    $allStatsResults = $statsService->getStatisticsForEmail($_SESSION['email']);
    foreach ($allStatsResults as $row) {
        if (!isset($finalStats[$row['categoryID']])) {
            $finalStats[$row['categoryID']] = array();
            $finalStats[$row['categoryID']]['pass'] = 0;
            $finalStats[$row['categoryID']]['fail'] = 0;
        }
        if ($row['answer'] == 1) {
            $finalStats[$row['categoryID']]['pass'] += 1;
        } else if ($row['answer'] == 0) {
            $finalStats[$row['categoryID']]['fail'] += 1;
        }
    }
}


include('header.partial.php');
?>
<h2 class="sub-header">
    Statistics
</h2>
<table class="table">
    <thead>
    <th>Category</th>
    <th>Correct</th>
    <th>Wrong</th>
    <th>Total</th>
    </thead>
    <tbody>
    <?php foreach ($finalStats as $key => $stat) : ?>
        <tr>
            <td><?php print $categoryList[$key]->title; ?></td>
            <td><?php print $stat['pass']; ?></td>
            <td><?php print $stat['fail']; ?></td>
            <td><?php print ($stat['pass'] + $stat['fail']) . " ( ". round($stat['pass']*100/($stat['pass']+ $stat['fail']),2) . "% )" ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include('footer.partial.php'); ?>
