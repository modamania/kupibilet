<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @global CMain $APPLICATION */
/** @var Local\Main\TimHalls $component */

$hall = $component->hall;
$events = \Local\Main\Event::getByHall($hall['ID']);

debugmessage($events);

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
		        $price = $item['PRICE'];
		        if ($item['PRICE'] != $item['PRICE_TO'])
			        $price .= ' - ' . $item['PRICE_TO'];

				?>
		        <div class='up-events-item'>
			        <div class="up-img"
			             style="background:url(<?= CFile::GetPath($event['PREVIEW_PICTURE']['src']) ?>);"></div>
			        <div class="up-info">
				        <div class="up-title"><?= $event['NAME'] ?></div><?

				        if ($run)
				        {
					        ?>
					        <div class="up-date"><?= $run['DATE'] ?></div><?
				        }

				        ?>
				        <div class="up-place"><?= $hall['NAME'] ?></div>
				        <div class="up-price"><?= $price ?> руб.</div>
			        </div>
		        </div><?
	        }
            ?>
        </div>
    </div>
</div>
<script>
    $('.elList').masonry({
        // options...
        itemSelector: '.it-item',
        columnWidth: 395
    });
</script><?

$APPLICATION->SetTitle($hall['NAME']);
$APPLICATION->SetPageProperty('title', $hall['NAME']);