<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// TODO: Пока оставим 15 первых попавшихся событий, дальше добавим какую-то нужную сортировку и фильтр
$events = \Local\Main\Event::getByFilter(array(), array(), array('nTopCount' => 15));

?>
<div class="engBox engContent">
    <div class="engBox-content">
		<div class="elList">
			<div class="grid-sizer"></div><?

			foreach ($events['ITEMS'] as $item)
			{
				$hall = \Local\Main\Hall::getById($item['HALL']);
				$run = \Local\Main\Run::getClosest($item['RUNS']);

				$price = $item['PRICE'];
				if ($item['PRICE'] != $item['PRICE_TO'])
					$price .= ' - ' . $item['PRICE_TO'];

				?>
				<div class="it-item">
					<div class="it-img">
						<a href="<?= $item['DETAIL_PAGE_URL'] ?>">
							<img src="<?= $item['PREVIEW_PICTURE']['src'] ?>"/>
						</a>
					</div>
					<div class="it-inf">
						<div class="it-title"><?= $item['NAME'] ?></div><?

						if ($run)
						{
							$href = $item['DETAIL_PAGE_URL'] . $run['FURL'];
							?>
							<div class="it-date"><i class="engIcon setIcon-date-black"></i><?= $run['DATE_S'] ?>
								<a href="<?= $href ?>">Купить билет</a></div>
							<div class="it-map"><i class="engIcon setIcon-map-black"></i><?= $hall['NAME'] ?></div>
							<div class="it-money"><i class="engIcon setIcon-price-black"></i><?= $price ?> руб.</div><?
						}

						?>
					</div>
				</div><?
			}
			?>
		</div>
    </div>
    <div class="engBox-right">
        <div class="elList">
            <div class="it-item">
                <div class="it-date-form">
                    <div id="engDate-picter"></div>
                    <script>
                        function severalDates(date){

                            var dates = new Array("11.03.2017", "12.03.2017");


                            var dat = $.datepicker.formatDate("dd.mm.yy", date);
                            var r = [true, ""];
                            for (var i=0, c=dates.length; i<c; i++)
                                if (dat == dates[i])
                                    r = [true, "yellow"];
                            return r;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div><?
