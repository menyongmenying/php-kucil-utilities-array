<?php

namespace Kucil;

use Kucil\StringUtils;

use function array_keys;
use function array_key_first;
use function array_key_last;
use function array_search;
use function array_slice;
use function array_values;
use function count;
use function in_array;
use function is_array;
use function is_int;
use function preg_match;
use function range;

/**
 * @author  Menyong Menying <menyongmenying.main@gmail.com>
 * 
 * @version 0.0.1
 * 
 * 
 * 
 */
class ArrayUtils
{
    /**
     * Meneruskan hasil pemeriksaan apakah nilai yang diberikan bertipe data array atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  mixed $array Nilai yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool        Hasil pemeriksaan apakah nilai $array bertipe data array atau tidak.     
     * 
     * @see    ArrayUtilsTest::testIsArr()
     * 
     * 
     */
    public static function isArr(mixed $array = null): ?bool
    {
        return is_array($array);
    }



    /**
     * Meneruskan hasil pemeriksaan apakah nilai yang diberikan bertipe data array atau tidak.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     *
     * @param  mixed $array Nilai yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool        Hasil pemeriksaan apakah nilai $array bertipe data array atau tidak.     
     * 
     * @see    ArrayUtilsTest::testIsArray()
     * 
     * 
     */
    public static function isArray(mixed $array = null): ?bool
    {
        return self::isArr($array);
    }



    /**
     * Meneruskan hasil pemeriksaan apakah nilai array yang diberikan merupakan array kosong.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool         Hasil pemeriksaan apakah nilI $array merupakan array kosong.
     * 
     * @see    ArrayUtilsTest::testIsEmpty()
     * 
     * 
     */
    public static function isEmpty(?array $array = null): ?bool
    {
        if ($array === null) {
            return null;
        }

        return empty($array);
    }


    
    /**
     * Meneruskan hasil pemeriksaan apakah nilai array yang diberikan merupakan array asosiatif.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool         Hasil pemeriksaan apakah nilI $array merupakan array asosiatif.
     * 
     * @see    ArrayUtilsTest::testIsAssociative()
     * 
     * 
     */
    public static function isAssociative(?array $array = null): ?bool
    {
        if ($array === null) {
            return null;
        }

        if (self::isEmpty($array)) {
            return true;
        }

        return array_keys($array) !== range(0, count($array) - 1);
   }



    /**
     * Meneruskan hasil pemeriksaan apakah nilai array yang diberikan valid jika dikonversi menjadi objek.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan dijadikan objek pemeriksaan.
     *
     * @return ?bool         Hasil pemeriksaan apakah nilI $array valid jika dikonversi menjadi objek.
     * 
     * @see    ArrayUtilsTest::testIsValidObject()
     * 
     * 
     */
    public static function isValidObject(?array $array = null): ?bool
    {
        if ($array === null) {
            return null;
        }
        
        if (self::isEmpty($array)) {
            return true;
        }

        foreach (array_keys($array) as $key) {
            if (is_int($key)) {
                return false;
            }

            if (!preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $key)) {
                return false;
            }
        }

        return true;
    }


    
    /**
     * @see ArrayUtilsTest::testMap()
     * 
     * 
     * 
     */
    public static function map(?callable $callback = null, array ...$arrays): ?array 
    {
        if ($callback === null || ($arrays === null || self::isEmpty($arrays))) {
            return null;
        }

        return array_map($callback, ...$arrays);
    }




    /**
     * Meneruskan hasil pemeriksaan apakah suatu nilai key terdapat pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array  Nilai array akan dijadikan objek pemeriksaan.
     * @param  mixed  $search Nilai key yang akan dicari pada nilai $array.
     *
     * @return ?bool          Hasil pemeriksaan apakah suatu nilai key terdapat pada nilai $array.
     * 
     * @see ArrayUtilsTest::testKeyExists()
     * 
     * 
     */
    public static function keyExists(?array $array = null, mixed $search = null): ?bool
    {
        if ($array === null || $search === null || empty($array)) {
            return null;
        }

        return key_exists($search, $array);
    }



    /**
     * Meneruskan hasil pemeriksaan apakah suatu nilai value terdapat pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array         Nilai array akan dijadikan objek pemeriksaan.
     * @param  mixed  $search        Nilai value yang akan dicari pada nilai $array.
     * @param  ?bool  $sensitiveCase 
     * @param  ?bool  $strict
     *
     * @return ?bool          Hasil pemeriksaan apakah suatu nilai value terdapat pada nilai $array.
     * 
     * @see ArrayUtilsTest::testValueExists()
     * 
     * 
     */
    public static function valueExists(?array $array = null, mixed $search = null, ?bool $sensitiveCase = false, ?bool $strict = false): ?bool
    {
        if ($array === null || $search === null || $sensitiveCase === null || $strict === null || empty($array)) {
            return null;
        }
        
        if (!$sensitiveCase) {
            $search = StringUtils::lower($search);
            $array = self::map(function($value) {
                    if (StringUtils::isStr($value)) {
                        return $value = StringUtils::lower($value);    
                    }
                    return $value;
                },
                $array
            );
        }

        return in_array($search, $array, $strict);
    }



    /**
     * Meneruskan jumlah elemen yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan dihitung jumlah elemennya.
     *
     * @return ?int          Jumlah elemen yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testCount()
     * 
     * 
     */
    public static function count(?array $array = null): ?int
    {
        if ($array === null) {
            return null;
        }
        
        return count($array);
    }



    /**
     * Filter array dengan kontrol lebih lengkap.
     *
     * @param  array     $array
     * @param  ?callable $callback
     * @param  bool      $useKey   Jika true, callback menerima ($value, $key)
     * 
     * @return array
     * 
     * @see    ArrayUtilsTest::testFilter()
     * 
     * 
     */
    public static function filter(array $array, ?callable $callback = null, bool $useKey = false): array
    {
        if ($callback === null) {
            return array_filter($array);
        }

        if ($useKey) {
            return array_filter($array, function($value, $key) use ($callback) {
                return $callback($value, $key);
            }, ARRAY_FILTER_USE_BOTH);
        }

        return array_filter($array, $callback);
    }



    /**
     * Meneruskan semua key elemen yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array  Nilai array yang akan diambil semua key elemennya.
     * @param  mixed  $search Nilai value yang dicari key-nya.
     * @param  ?bool  $strict
     *
     * @return ?array         Semua key elemen yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testGetKeys()
     * 
     * 
     */
    public static function getKeys(?array $array = null, mixed $search = null, ?bool $strict = false): ?array
    {
        $numArgs = func_num_args();

        if ($array === null || $strict === null) {
            return null;
        }

        if ($numArgs === 1) {
            return array_keys($array);
        }

        return array_keys($array, $search, $strict);
    }



    /**
     * Meneruskan semua value elemen yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan diambil semua value elemennya.
     *
     * @return ?array        Semua value elemen yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testGetValues()
     * 
     * 
     */
    public static function getValues(?array $array = null): ?array
    {
        if ($array === null) {
            return null;
        }

        return array_values($array);
    }



    /**
     * Meneruskan key elemen pertama yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan diambil key elemen pertamanya.
     *
     * @return mixed         Key elemen pertama yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testGetFirstKey()
     * 
     * 
     */
    public static function getFirstKey(?array $array = null): mixed
    {
        if ($array === null) {
            return null;
        }

        return array_key_first($array);
    }



    /**
     * Meneruskan key elemen terakhir yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan diambil key elemen terakhirnya.
     *
     * @return mixed         Key elemen terakhir yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testGetLastKey()
     * 
     * 
     */
    public static function getLastKey(?array $array = null): mixed
    {
        if ($array === null) {
            return null;
        }

        return array_key_last($array);
    }



    /**
     * Meneruskan value elemen pertama yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan diambil value elemen pertamanya.
     *
     * @return mixed         Value elemen pertama yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testGetFirstValue()
     * 
     * 
     */
    public static function getFirstValue(?array $array = null): mixed
    {
        $firstKey = self::getFirstKey($array);

        if ($array === null) {
            return null;
        }

        if (isset($array[$firstKey])) {
            return $array[$firstKey];
        }

        return null;
    }



    /**
     * Meneruskan value elemen terakhir yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array $array Nilai array yang akan diambil value elemen terakhirnya.
     *
     * @return mixed         Value elemen terakhir yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testGetLastValue()
     * 
     * 
     */
    public static function getLastValue(?array $array = null): mixed
    {
        $lastKey = self::getLastKey($array);

        if ($array === null) {
            return null;
        }

        if (isset($array[$lastKey])) {
            return $array[$lastKey];
        }

        return null;
    }



    /**
     * Ekstrak array menjadi pecahan variabel
     * 
     * @param  array  $array  Nilai array yang akan diekstrak.
     * @param  int    $flags 
     * @param  string $prefix 
     *
     * @return int
     * 
     * @see    ArrayUtilsTest::testExtract()
     * 
     * 
     */
    public static function getColumn(?array $array = null, null|int|string $columnName = null, null|int|string $key = null): ?array
    {
        if ($array === null) {
            return null;
        }

        return array_column($array, $columnName, $key);
    }



    /**
     * Meneruskan hasil tambah element pada awalan nilai array yang diberikan.
     *
     * @param  ?array $array    Nilai array yang akan ditambahkan element.
     * @param  mixed  $elements Nilai elemen yang akan ditambahkan pada nilai $array.
     *
     * @return ?array           Nilai $array yang telah ditambahkan pada awalan nilai $elements.
     * 
     * @see    ArrayUtilsTest::testAddFirst()
     * 
     * 
     */
    public static function extract(array &$array, int $flags = EXTR_OVERWRITE, string $prefix = ''): int
    {
        $vars = '';

        foreach ($array as $key => $value) {
            if (!preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $key)) {
                continue;
            }

            $varName = $prefix . $key;
            $export = var_export($value, true);
            $vars .= "\$$varName = $export;";
        }

        eval($vars);

        return count($array);
    }



    /**
     * Meneruskan hasil tambah element pada awalan nilai array yang diberikan.
     *
     * @param  ?array $array    Nilai array yang akan ditambahkan element.
     * @param  mixed  $elements Nilai elemen yang akan ditambahkan pada nilai $array.
     *
     * @return ?array           Nilai $array yang telah ditambahkan pada awalan nilai $elements.
     * 
     * @see    ArrayUtilsTest::testAddFirst()
     * 
     * 
     */
    public static function addFirst(?array &$array, mixed ...$elements): ?int
    {
        if ($array === null) {
            return null;
        }

        if (self::isEmpty($elements)) {
            return count($array);
        }
        
        return array_unshift($array, ...$elements);
    }



    /**
     * Meneruskan hasil tambah element pada akhiran nilai array yang diberikan.
     *
     * @param  ?array $array    Nilai array yang akan ditambahkan element.
     * @param  mixed  $elements Nilai elemen yang akan ditambahkan pada nilai $array.
     *
     * @return ?array           Nilai $array yang telah ditambahkan pada akhiran nilai $elements.
     * 
     * @see    ArrayUtilsTest::testAddLast()
     * 
     * 
     */
    public static function addLast(?array &$array, mixed ...$elements): ?int
    {
        if ($array === null) {
            return null;
        }

        if (self::isEmpty($elements)) {
            return count($array);
        }
        
        return array_push($array, ...$elements);
    }



    /**
     * Melakan rename key elemen.
     *
     * @param  ?array &$array Nilai array yang akan dijadikan objek pembaruan.
     * @param  ?array $keyMap Map key elemen lama dan key elemen baru
     *
     * @return ?array         Array yang telah diubah key elemennya. 
     * 
     * @see    ArrayUtilsTest::testRename()
     * 
     * 
     */
    public static function rename(?array $array = null, ?array $keyMap = null): ?array
    {
        if ($array === null) {
            return null;
        }

        if ($keyMap === null || self::isEmpty($array) || self::isEmpty($keyMap)) {
            return $array;
        }

        $result = $array;

        foreach ($keyMap as $oldKey => $newKey) {
            if (!self::keyExists($result, $oldKey)) {
                continue;
            }

            $oldValue = $result[$oldKey];

            if (self::keyExists($result, $newKey)) {
                $result[$newKey] = [$result[$newKey], $oldValue];
                unset($result[$oldKey]);
                continue;
            }

            $keys = array_keys($result);
            $index = array_search($oldKey, $keys, true);

            if ($index === false) {
                continue;
            }

            $before = array_slice($result, 0, $index, true);
            $after = array_slice($result, $index + 1, null, true);

            $result = $before + [$newKey => $oldValue] + $after;
        }

        return $result;
    }



    /**
     * Meneruskan hasil konversi array ke string dari nilai array yang diberikan.
     *
     * @param  ?array  $array     Nilai array yang akan dijadikan objek konversi array ke string.
     * @param  ?string $separator Nilai yang akan dijadikan penggabung setiap element.
     *
     * @return ?string           Hasil konversi array ke string dari nilai $array.
     * 
     * @see    ArrayUtilsTest::testToStr() 
     * 
     * 
     */
    public static function toStr(?array $array = null, ?string $separator = ''): ?string
    {
        if ($array === null || $separator === null) {
            return null;
        }

        return implode($separator, $array);
    }



    /**
     * Meneruskan hasil konversi array ke string dari nilai array yang diberikan.
     *
     * @param  ?array  $array     Nilai array yang akan dijadikan objek konversi array ke string.
     * @param  ?string $separator Nilai yang akan dijadikan penggabung setiap element.
     *
     * @return ?string           Hasil konversi array ke string dari nilai $array.
     * 
     * @see    ArrayUtilsTest::toString() 
     * 
     * 
     */
    public static function toString(?array $array = null, ?string $separator = ''): ?string
    {
        return self::toStr($array, $separator);
    }
}