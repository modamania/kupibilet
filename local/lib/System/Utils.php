<?
namespace Local\System;

/**
 * Class Utils Утилиты проекта
 * @package Local
 */
class Utils
{
	/**
	 * Путь для кеширования
	 */
	const CACHE_PATH = 'Local/System/Utils/';

	/**
	 * Возвращает все инфоблоки
	 * @param bool|false $bRefreshCache сбросить кеш
	 * @return array
	 */
	public static function getAllIBlocks($bRefreshCache = false) {
		$return = array();

		$extCache = new ExtCache(
			array(
				__FUNCTION__,
			),
			static::CACHE_PATH . __FUNCTION__ . '/',
			86400 * 20,
			false
		);
		if (!$bRefreshCache && $extCache->initCache())
			$return = $extCache->getVars();
		else
		{
			$extCache->startDataCache();

			$iblock = new \CIBlock();
			$rsItems = $iblock->GetList(array(), Array(), false);
			while ($arItem = $rsItems->Fetch()) {

				$return['ITEMS'][$arItem['ID']] = array(
					'ID' => $arItem['ID'],
					'ACTIVE' => $arItem['ACTIVE'],
					'NAME' => $arItem['NAME'],
					'CODE' => $arItem['CODE'],
					'TYPE' => $arItem['IBLOCK_TYPE_ID'],
				);
				if ($arItem['CODE']) {
					$return['BY_CODE'][$arItem['CODE']] = $arItem['ID'];
				}
			}

			$extCache->endDataCache($return);
		}

		return $return;
	}

	/**
	 * Возвращает ID инфоблока по коду
	 * @param $code
	 * @return mixed
	 */
	public static function getIBlockIdByCode($code) {
		$iblocks = self::getAllIBlocks();
		return $iblocks['BY_CODE'][$code];
	}

	/**
	 * Возвращает инфоблок по коду
	 * @param $code
	 * @return mixed
	 */
	public static function getIBlockByCode($code) {
		$iblocks = self::getAllIBlocks();
		$id = $iblocks['BY_CODE'][$code];
		return $iblocks['ITEMS'][$id];
	}

	/**
	 * Возвращает инфоблок по ID
	 * @param $id
	 * @return mixed
	 */
	public static function getIBlockById($id) {
		$iblocks = self::getAllIBlocks();
		return $iblocks['ITEMS'][$id];
	}

	/**
	 * Возвращает слово с нужным окончанием в зависимости от числительного
	 * @param $num
	 * @param string $s0 10 штук
	 * @param string $s1 1 штука
	 * @param string $s2 2 штуки
	 * @return string
	 */
	public static function cardinalNumberRus($num, $s0 = '', $s1 = '', $s2 = '') {
		$l = strlen($num);
		$dec = 0;
		$iNubmer = intval($num);
		if ($l > 1)
		{
			$iNubmer = intval(substr($num, ($l - 1)));
			$dec = intval(substr($num, ($l - 2), 1));
		}
		if ($iNubmer > 4 || $iNubmer == 0 || $dec == 1)
			return $s0;
		elseif ($iNubmer == 1)
			return $s1;
		else
			return $s2;
	}

}
