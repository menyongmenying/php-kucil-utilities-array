<?php

namespace Kucil\Utilities\ArrayUtils\Core;

use Kucil\Utilities\ArrayUtils\Contracts\ArrayInterface;
use Kucil\Utilities\StringUtils;

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
abstract class ArrayCore implements ArrayInterface
{
    /**
     * @see ArrayUtilsTest::testIsArr()
     * 
     * 
     * 
     */
    public static function isArr(mixed $array = null): ?bool
    {
        return is_array($array);
    }



    /**
     * @see ArrayUtilsTest::testIsArray()
     * 
     * 
     * 
     */
    public static function isArray(mixed $array = null): ?bool
    {
        return self::isArr($array);
    }



    /**
     * @see ArrayUtilsTest::testIsEmpty()
     * 
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
     * @see ArrayUtilsTest::testIsAssociative()
     * 
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
     * @see ArrayUtilsTest::testIsValidObject()
     * 
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
     * @see ArrayUtilsTest::testKeyExists()
     * 
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
     * @see ArrayUtilsTest::testValueExists()
     * 
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
     * @see ArrayUtilsTest::testCount()
     * 
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
     * @see ArrayUtilsTest::testFilter()
     * 
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
     * @see ArrayUtilsTest::testGetKeys()
     * 
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
     * @see ArrayUtilsTest::testGetValues()
     * 
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
     * @see ArrayUtilsTest::testGetFirstKey()
     * 
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
     * @see ArrayUtilsTest::testGetLastKey()
     * 
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
     * @see ArrayUtilsTest::testGetFirstKey()
     * 
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
     * @see ArrayUtilsTest::testGetLastValue()
     * 
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
     * @see ArrayUtilsTest::testGetColumn()
     * 
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
     * @see ArrayUtilsTest::testExtract()
     * 
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
     * @see ArrayUtilsTest::testAddFirst()
     * 
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
     * @see ArrayUtilsTest::testAddLast()
     * 
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
     * @see ArrayUtilsTest::testRename()
     * 
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
     * @see ArrayUtilsTest::testToStr()
     * 
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
     * @see ArrayUtilsTest::testToString()
     * 
     * 
     * 
     */
    public static function toString(?array $array = null, ?string $separator = ''): ?string
    {
        return self::toStr($array, $separator);
    }
}