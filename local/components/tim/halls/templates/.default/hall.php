<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @global CMain $APPLICATION */
/** @var Local\Main\TimHalls $component */

$hall = $component->hall;
$events = \Local\Main\Event::getByHall($hall['ID']);

?>
<div class="engBox engContent">
    <div class='hallpage-detail'>
        <div class='hallpage-img'><img src="<?= CFile::GetPath($hall['PICTURE']) ?>"></div>
        <div class='hallpage-descr'>
            <div class='hallpage-ttl'><?= $hall['NAME'] ?></div>
            <div class='hallpage-place'><i class="engIcon setIcon-map-black"></i><?= $hall['NAME'] ?></div>
            <div class='hallpage-txt'>
                <?=$hall['DETAIL_TEXT']?>
            </div>
        </div>
    </div>
    <div class='up-events'>
        <div class='up-events-ttl'>Предстоящие мероприятия</div>
        <div class='up-events-list'><?
	        foreach ($events as $event)
	        {

		        $run = \Local\Main\Run::getClosest($event['RUNS']);
		        $price = $event['PRICE'];
		        if ($event['PRICE'] != $event['PRICE_TO'])
			        $price .= ' - ' . $event['PRICE_TO'];

				?>
		        <div class='up-events-item'>
			        <a href="<?= $event['DETAIL_PAGE_URL'] ?>"><div class="up-img"
			             style="background-image:url(<?= CFile::GetPath($event['PREVIEW_PICTURE']['src']) ?>);"></div></a>
			        <div class="up-info">
				        <div class="up-title"><?= $event['NAME'] ?></div><?

				        if ($run)
				        {
					        $href = $event['DETAIL_PAGE_URL'] . $run['FURL'];
					        ?>
					        <div class="up-date"><i class="engIcon setIcon-date-black"></i><?= $run['DATE'] ?></div>
				            <a class="engBtn-kyp" href="<?= $href ?>">Купить билет</a><?
				        }

				        ?>
				        <div class="up-place"><i class="engIcon setIcon-map-black"></i><?= $hall['NAME'] ?></div>
				        <div class="up-price"><i class="engIcon setIcon-price-black"></i><?= $price ?> руб.</div>
			        </div>
		        </div><?
	        }
            ?>
        </div>
    </div>
</div><?

$APPLICATION->SetTitle($hall['NAME']);
$APPLICATION->SetPageProperty('title', $hall['NAME']);