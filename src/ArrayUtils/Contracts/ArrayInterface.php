<?php

namespace Kucil\Utilities\ArrayUtils\Contracts;


/**
 * @author  Menyong Menying <menyongmenying.main@gmail.com>
 * 
 * @version 0.0.1
 * 
 * 
 * 
 */
interface ArrayInterface
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
     * 
     */
    public static function isArr(mixed $array): ?bool;



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
     * 
     */
    public static function isArray(mixed $array): ?bool;



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
     * 
     */
    public static function isEmpty(?array $array): ?bool;



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
     * 
     */
    public static function isAssociative(?array $array): ?bool;



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
     * 
     */
    public static function isValidObject(?array $array): ?bool;
    


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
     * 
     */
    public static function keyExists(?array $array, mixed $search): ?bool;
    


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
     * 
     */
    public static function valueExists(?array $array, mixed $search, ?bool $sensitiveCase, ?bool $strict): ?bool;



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
     * 
     */
    public static function count(?array $array): ?int;



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
     * 
     */
    public static function filter(array $array, ?callable $callback = null, bool $useKey = false): array;



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
     * 
     */
    public static function getKeys(?array $array, mixed $search, ?bool $strict): ?array;



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
     * 
     */
    public static function getValues(?array $array): ?array;



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
     * 
     */
    public static function getFirstKey(?array $array): mixed;



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
     * 
     */
    public static function getLastKey(?array $array): mixed;



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
     * 
     */
    public static function getFirstValue(?array $array): mixed;



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
     * 
     */
    public static function getLastValue(?array $array): mixed;



    /**
     * Meneruskan value kolom tertentu yang ada pada nilai array yang diberikan.
     * 
     * NOTE:
     * Jika nilai yang diberikan dianggap tidak valid, maka akan meneruskan `null`.
     * 
     * @param  ?array          $array      Nilai array yang akan diambil value kolom-nya.
     * @param  null|int|string $columnName Nilai kolom $array yang akan diambil.
     * @param  null|int|string $key        Key dari value nilai kolom $array yang akan diambil.
     *
     * @return ?array                      Value kolom tertentu yang ada pada nilai $array.
     * 
     * @see    ArrayUtilsTest::testGetLastValue()
     * 
     * 
     * 
     */
    public static function getColumn(?array $array, null|int|string $columnName, string|int|null $key): ?array;



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
     * 
     */
    public static function extract(array &$array, int $flags, string $prefix): int;



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
     * 
     */
    public static function addFirst(?array &$array, mixed ...$elements): ?int;



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
     * 
     */
    public static function addLast(?array &$array, mixed ...$elements): ?int;



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
     * 
     */
    public static function rename(?array $array, ?array $keyMap): ?array;



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
     * 
     */
    public static function toStr(?array $array, ?string $separator): ?string;



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
     * 
     */
    public static function toString(?array $array, ?string $separator): ?string;
}