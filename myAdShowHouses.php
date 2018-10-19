<?php
session_start();
$db = new QueryBuilder;
$art = $db->allByProperty("apartments", 3);

//Выбираем записи по логину
$author = $_SESSION['login'];
foreach ($art as $elem) {
    if($elem['author'] == $author && $elem['property'] == 3) {
        $artNew[]= $elem;
    };
}

$art = $artNew;
$_SESSION['count'] = count($art);
?>
<?php
foreach($art as $task):?>
    <div class="container">
        <div class="item row">
            <div class="photo col-md-3 col-xs-12">
                <a class="photo-wrapper" href="itemPage.php?id=<?= $task['id'];?>">
                    <img src="images/<?php if(!empty($task['img'])) {echo $task['img'];} else echo "notphoto.png"; ?>" style = "width: 140px; height: 105px;">
                </a>
            </div>
            <div class="description col-md-5 col-xs-4">
                <div class="item_header">
                    <h3 class="item-description-title">
                        <a class="item-daescription-title-link" href="itemPage.php?id=<?= $task['id'];?>"><?php echo "Дом ". $task['square'].' кв.м на участке '.$task['land_area'].' соток';?></a>
                    </h3>
                    Адрес: <span class="item-address"><?php echo $task['address']; ?></span>
                </div>
                <!--            <div class="item-content">-->
                <!--                <p>О доме: <span class="wall">кирпичный</span></p>-->
                <!--                <p>Описание: <span>--><?php //echo mb_substr($task['description'], 0, 50, 'utf-8'); ?><!-- ...-->
                <!--                                 </span>-->
                <!--                </p>-->
                <!--            </div>-->
            </div>
            <div class="right-block col-md-4 col-xs-12 text-center">
                <div class="item-price">
                    <span class="item-price-content"><?php echo number_format($task['price'], 0, ',', ' '); ?> руб.</span>
                </div>
                <div class="more btn btn-primary"><span><a  style = "color: #fff;" href="editItemPage.php?id=<?= $task['id'];?>">редактировать</a></span></div>
                <div class="more btn btn-danger"><span><a onclick="return confirm('Вы уверены?');"  style = "color: #fff;" href="deleteItemPage.php?id=<?= $task['id'];?>">удалить</a></span></div>
            </div>
        </div>
    </div>
<?php
endforeach;
