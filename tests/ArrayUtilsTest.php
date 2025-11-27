<?php

use Kucil\ArrayUtils;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ArrayUtilsTest extends TestCase
{
    #[Test]
    public function testIsArr(): void
    {
        $this->assertTrue(ArrayUtils::isArr([]), 'test-1');
        $this->assertTrue(ArrayUtils::isArr([1, 2, 3]), 'test-2');
        $this->assertTrue(ArrayUtils::isArr(['key' => 'value', 'a' => 'b']), 'test-3');
        $this->assertFalse(ArrayUtils::isArr(null), 'test-4');
        $this->assertFalse(ArrayUtils::isArr('ini bukan array'), 'test-5');
        $this->assertFalse(ArrayUtils::isArr(12345), 'test-6');
        $this->assertFalse(ArrayUtils::isArr(12.34), 'test-7');
        $this->assertFalse(ArrayUtils::isArr(true), 'test-8');
        $this->assertFalse(ArrayUtils::isArr(false), 'test-9');
        $this->assertFalse(ArrayUtils::isArr(new \stdClass()), 'test-10');

        return;
    }



    #[Test]
    public function testIsArray(): void
    {
        $this->assertTrue(ArrayUtils::isArray([]), 'test-1');
        $this->assertTrue(ArrayUtils::isArray([1, 2, 3]), 'test-2');
        $this->assertTrue(ArrayUtils::isArray(['key' => 'value', 'a' => 'b']), 'test-3');
        $this->assertFalse(ArrayUtils::isArray(null), 'test-4');
        $this->assertFalse(ArrayUtils::isArray('ini bukan array'), 'test-5');
        $this->assertFalse(ArrayUtils::isArray(12345), 'test-6');
        $this->assertFalse(ArrayUtils::isArray(12.34), 'test-7');
        $this->assertFalse(ArrayUtils::isArray(true), 'test-8');
        $this->assertFalse(ArrayUtils::isArray(false), 'test-9');
        $this->assertFalse(ArrayUtils::isArray(new \stdClass()), 'test-10');

        return;
    }



    #[Test]
    public function testIsEmpty(): void
    {
        $this->assertTrue(ArrayUtils::isEmpty([]), 'test-1');
        $this->assertFalse(ArrayUtils::isEmpty([1, 2, 3]), 'test-2');
        $this->assertFalse(ArrayUtils::isEmpty(['a' => 1]), 'test-3');
        $this->assertNull(ArrayUtils::isEmpty(null), 'test-4');

        return;
    }


    
    #[Test]
    public function testIsAssociative(): void
    {
        $this->assertTrue(ArrayUtils::isAssociative(['nama' => 'Budi', 'kota' => 'Surabaya']), 'test-1');
        $this->assertFalse(ArrayUtils::isAssociative(['apel', 'jeruk', 'mangga']), 'test-2');
        $this->assertTrue(ArrayUtils::isAssociative([]), 'test-3');
        $this->assertNull(ArrayUtils::isAssociative(null), 'test-4');
        $this->assertTrue(ArrayUtils::isAssociative(['satu' => 1, 0 => 'nol', 'dua' => 2]), 'test-5');
        $this->assertTrue(ArrayUtils::isAssociative(['1' => 'satu', '2' => 'dua']), 'test-6');
        $this->assertTrue(ArrayUtils::isAssociative([1 => 'satu', 0 => 'nol']), 'test-7');

        return;
    }

    
    
    #[Test]
    public function testIsValidObject(): void
    {
        $this->assertTrue(ArrayUtils::isValidObject(['nama' => 'Budi', 'umur' => 25]), 'test-1: Array valid dengan key string standar');
        $this->assertTrue(ArrayUtils::isValidObject(['_id' => 123, 'user_status' => 'aktif']), 'test-2: Array valid dengan key underscore di awal');
        $this->assertTrue(ArrayUtils::isValidObject(['alamat1' => 'Jl. A', 'alamat2' => 'Jl. B']), 'test-3: Array valid dengan key mengandung angka');
        $this->assertTrue(ArrayUtils::isValidObject([]), 'test-4: Array kosong');
        $this->assertSame(null, ArrayUtils::isValidObject(null), 'test-5: Input NULL');
        $this->assertFalse(ArrayUtils::isValidObject(['nama' => 'Citra', 0 => 'nilai A']), 'test-6: Array dengan key integer');
        $this->assertFalse(ArrayUtils::isValidObject(['satu', 'dua', 'tiga']), 'test-7: Array numerik (semua key integer)');
        $this->assertFalse(ArrayUtils::isValidObject(['nama depan' => 'Joko']), 'test-8: Array dengan key mengandung spasi');
        $this->assertFalse(ArrayUtils::isValidObject(['1st_place' => 'Emas']), 'test-9: Array dengan key diawali angka');
        $this->assertFalse(ArrayUtils::isValidObject(['user-id' => 99]), 'test-10: Array dengan key mengandung tanda hubung (-)');
        $this->assertFalse(ArrayUtils::isValidObject(['email@' => 'test@example.com']), 'test-11: Array dengan key mengandung karakter spesial (@)');
        $this->assertFalse(ArrayUtils::isValidObject(['' => 'nilai tidak valid']), 'test-12: Array dengan key kosong');

        return;
    }

    
    
    #[Test]
    public function testCount(): void
    {
        $this->assertSame(0, ArrayUtils::count([]), 'test-1: Array kosong');
        $this->assertSame(3, ArrayUtils::count([1, 2, 3]), 'test-2: Array numerik');
        $this->assertSame(2, ArrayUtils::count(['a' => 1, 'b' => 2]), 'test-3: Array asosiatif');
        $this->assertNull(ArrayUtils::count(null), 'test-4: Input NULL');

        return;
    }



    #[Test]
    public function testGetKeys(): void
    {
        $this->assertSame([], ArrayUtils::getKeys([]), 'test-1: Array kosong');
        $this->assertSame([0, 1, 2], ArrayUtils::getKeys(['a', 'b', 'c']), 'test-2: Array numerik');
        $this->assertSame(['nama', 'umur'], ArrayUtils::getKeys(['nama' => 'Budi', 'umur' => 25]), 'test-3: Array asosiatif');
        $this->assertNull(ArrayUtils::getKeys(null), 'test-4: Input NULL');
        $this->assertSame([1, 0], ArrayUtils::getKeys([1 => 'satu', 0 => 'nol']), 'test-5: Array dengan kunci integer tidak berurutan');

        return;
    }



    #[Test]
    public function testGetValues(): void
    {
        $this->assertSame([], ArrayUtils::getValues([]), 'test-1: Array kosong');
        $this->assertSame(['a', 'b', 'c'], ArrayUtils::getValues(['a', 'b', 'c']), 'test-2: Array numerik');
        $this->assertSame(['Budi', 25], ArrayUtils::getValues(['nama' => 'Budi', 'umur' => 25]), 'test-3: Array asosiatif');
        $this->assertNull(ArrayUtils::getValues(null), 'test-4: Input NULL');
        $this->assertSame(['satu', 'nol'], ArrayUtils::getValues([1 => 'satu', 0 => 'nol']), 'test-5: Array dengan kunci integer tidak berurutan');

        return;
    }



    #[Test]
    public function testGetFirstKey(): void
    {
        $this->assertSame(0, ArrayUtils::getFirstKey([10, 20, 30]), 'test-1');
        $this->assertSame('nama', ArrayUtils::getFirstKey(['nama' => 'Budi', 'kota' => 'Surabaya']), 'test-2');
        $this->assertNull(ArrayUtils::getFirstKey([]), 'test-3');
        $this->assertNull(ArrayUtils::getFirstKey(null), 'test-4');
        $this->assertSame(5, ArrayUtils::getFirstKey([5 => 'lima', 1 => 'satu']), 'test-5');

        return;
    }



    #[Test]
    public function testGetLastKey(): void
    {
        $this->assertSame(2, ArrayUtils::getLastKey([10, 20, 30]), 'test-1');
        $this->assertSame('kota', ArrayUtils::getLastKey(['nama' => 'Budi', 'kota' => 'Surabaya']), 'test-2');
        $this->assertNull(ArrayUtils::getLastKey([]), 'test-3');
        $this->assertNull(ArrayUtils::getLastKey(null), 'test-4');
        $this->assertSame(1, ArrayUtils::getLastKey([5 => 'lima', 1 => 'satu']), 'test-5');

        return;
    }



    #[Test]
    public function testGetFirstValue(): void
    {
        $this->assertSame(10, ArrayUtils::getFirstValue([10, 20, 30]), 'test-1');
        $this->assertSame('Budi', ArrayUtils::getFirstValue(['nama' => 'Budi', 'kota' => 'Surabaya']), 'test-2');
        $this->assertNull(ArrayUtils::getFirstValue([]), 'test-3');
        $this->assertNull(ArrayUtils::getFirstValue(null), 'test-4');
        $this->assertSame('lima', ArrayUtils::getFirstValue([5 => 'lima', 1 => 'satu']), 'test-5');

        return;
    }


    
    #[Test]
    public function testGetLastValue(): void
    {
        $this->assertSame(30, ArrayUtils::getLastValue([10, 20, 30]), 'test-1');
        $this->assertSame('Surabaya', ArrayUtils::getLastValue(['nama' => 'Budi', 'kota' => 'Surabaya']), 'test-2');
        $this->assertNull(ArrayUtils::getLastValue([]), 'test-3');
        $this->assertNull(ArrayUtils::getLastValue(null), 'test-4');
        $this->assertSame('satu', ArrayUtils::getLastValue([5 => 'lima', 1 => 'satu']), 'test-5');

        return;
    }



    #[Test]
    public function testKeyExists(): void
    {
        $this->assertTrue(ArrayUtils::keyExists([10, 20, 30], 1), 'test-1');
        $this->assertTrue(ArrayUtils::keyExists(['nama' => 'Budi', 'kota' => 'Surabaya'], 'nama'), 'test-2');
        $this->assertFalse(ArrayUtils::keyExists([10, 20, 30], 5), 'test-3');
        $this->assertFalse(ArrayUtils::keyExists(['nama' => 'Budi'], 'usia'), 'test-4');
        $this->assertNull(ArrayUtils::keyExists(null, 'nama'), 'test-5');
        $this->assertNull(ArrayUtils::keyExists(['nama' => 'Budi'], null), 'test-6');
        $this->assertNull(ArrayUtils::keyExists([], 'nama'), 'test-7');
        $this->assertTrue(ArrayUtils::keyExists(['kota' => null, 'asal' => 'SBY'], 'kota'), 'test-8');

        return;
    }


    
    #[Test]
    public function testValueExists(): void
    {
        $this->assertTrue(ArrayUtils::valueExists([10, 20, 30], 20), 'test-1');
        $this->assertTrue(ArrayUtils::valueExists(['nama' => 'Budi', 'kota' => 'Surabaya'], 'Budi'), 'test-2');
        $this->assertFalse(ArrayUtils::valueExists([10, 20, 30], 99), 'test-3');
        $this->assertFalse(ArrayUtils::valueExists(['nama' => 'Budi'], 'Surabaya'), 'test-4');
        $this->assertNull(ArrayUtils::valueExists(null, 'Budi'), 'test-5');
        $this->assertNull(ArrayUtils::valueExists(['nama' => 'Budi'], null), 'test-6');
        $this->assertNull(ArrayUtils::valueExists([], 'Budi'), 'test-7');
        $this->assertTrue(ArrayUtils::valueExists([10, 20, '30'], 30), 'test-8'); // Test loose comparison
        $this->assertTrue(ArrayUtils::valueExists(['kota' => null, 'asal' => 'SBY'], 'SBY'), 'test-9');

        return;
    }



    #[Test]
    public function testAddFirst(): void
    {
        $list = ['c', 'd'];
        
        $newCount = ArrayUtils::addFirst($list, ['a'], ['b']);
        
        $this->assertSame(4, $newCount, 'test-1: Harusnya mengembalikan jumlah baru (4)');
        
        $this->assertSame([['a'], ['b'], 'c', 'd'], $list, 'test-2: Memastikan array asli TELAH berubah');

        $tests = null;
        $this->assertNull(ArrayUtils::addFirst($tests, ['a']), 'test-3: Input Null');

        $listEmptyElements = [1, 2];
        
        $this->assertSame(2, ArrayUtils::addFirst($listEmptyElements), 'test-4: Harusnya return 2 (count saat ini)');
        $this->assertSame([1, 2], $listEmptyElements, 'test-5: Array tidak boleh berubah jika elemen kosong');

        $listEmpty = [];
        $newCountEmpty = ArrayUtils::addFirst($listEmpty, ['a']);
        $this->assertSame(1, $newCountEmpty, 'test-6: Count adalah 1');
        
        $this->assertSame([['a']], $listEmpty, 'test-7: Array kosong seharusnya berubah');

        $listAssoc = ['x' => 1, 'y' => 2];
        $newCountAssoc = ArrayUtils::addFirst($listAssoc, ['a']);
        $this->assertSame(3, $newCountAssoc, 'test-8: Count asosiatif adalah 3');
        
        $this->assertSame([0 => ['a'], 'x' => 1, 'y' => 2], $listAssoc, 'test-9: Array asosiatif seharusnya berubah');

        return;
    }


    #[Test]
    public function testAddLast(): void
    {
        $list = ['a', 'b'];
        $newCount = ArrayUtils::addLast($list, 'c', 'd');
        $this->assertSame(4, $newCount, 'test-1');
        $this->assertSame(['a', 'b', 'c', 'd'], $list, 'test-2'); // Memastikan array asli berubah

        $listNull = null;
        $this->assertNull(ArrayUtils::addLast($listNull, 'a'), 'test-3');
        $this->assertNull($listNull, 'test-4'); // Memastikan $listNull tetap null

        $listEmptyElements = [1, 2];
        $originalListEmpty = $listEmptyElements;
        $newCountEmpty = ArrayUtils::addLast($listEmptyElements);
        $this->assertSame(2, $newCountEmpty, 'test-5'); // Harus mengembalikan jumlah asli
        $this->assertSame($originalListEmpty, $listEmptyElements, 'test-6'); // Array tidak berubah

        $listEmpty = [];
        $newCountEmptyArr = ArrayUtils::addLast($listEmpty, 'hello', 123);
        $this->assertSame(2, $newCountEmptyArr, 'test-7');
        $this->assertSame(['hello', 123], $listEmpty, 'test-8'); // Array asli berubah

        $listAssoc = ['x' => 1, 'y' => 2];
        $newCountAssoc = ArrayUtils::addLast($listAssoc, 'z');
        $this->assertSame(3, $newCountAssoc, 'test-9');
        $this->assertSame(['x' => 1, 'y' => 2, 0 => 'z'], $listAssoc, 'test-10'); // Array asli berubah

        return;
    }



    #[Test]
    public function testGetColumn(): void
    {
        $data = [
            ['id' => 1, 'nama' => 'Budi', 'kota' => 'Jakarta'],
            ['id' => 2, 'nama' => 'Citra', 'kota' => 'Surabaya'],
            ['id' => 3, 'nama' => 'Dewi', 'kota' => 'Bandung'],
        ];

        $this->assertNull(ArrayUtils::getColumn(null, 'nama'), 'test-1: Input array NULL');

        $this->assertSame([], ArrayUtils::getColumn([], 'nama'), 'test-2: Array kosong');

        $expectedNama = ['Budi', 'Citra', 'Dewi'];
        $this->assertSame($expectedNama, ArrayUtils::getColumn($data, 'nama'), 'test-3: Ambil kolom "nama"');

        $expectedKota = ['Jakarta', 'Surabaya', 'Bandung'];
        $this->assertSame($expectedKota, ArrayUtils::getColumn($data, 'kota'), 'test-4: Ambil kolom "kota"');

        $expectedNamaById = [
            1 => 'Budi',
            2 => 'Citra',
            3 => 'Dewi',
        ];
        $this->assertSame($expectedNamaById, ArrayUtils::getColumn($data, 'nama', 'id'), 'test-5: Ambil kolom "nama" dengan key "id"');

        $expectedNamaByKota = [
            'Jakarta' => 'Budi',
            'Surabaya' => 'Citra',
            'Bandung' => 'Dewi',
        ];
        $this->assertSame($expectedNamaByKota, ArrayUtils::getColumn($data, 'nama', 'kota'), 'test-6: Ambil kolom "nama" dengan key "kota"');

        $expectedAllById = [
            1 => ['id' => 1, 'nama' => 'Budi', 'kota' => 'Jakarta'],
            2 => ['id' => 2, 'nama' => 'Citra', 'kota' => 'Surabaya'],
            3 => ['id' => 3, 'nama' => 'Dewi', 'kota' => 'Bandung'],
        ];
        $this->assertSame($expectedAllById, ArrayUtils::getColumn($data, null, 'id'), 'test-7: Ambil semua kolom (null) dengan key "id"');

        $this->assertSame([], ArrayUtils::getColumn($data, 'usia'), 'test-8: Kolom "usia" tidak ada di data');

        $expectedNamaDefaultIndex = [0 => 'Budi', 1 => 'Citra', 2 => 'Dewi'];
        $this->assertSame($expectedNamaDefaultIndex, ArrayUtils::getColumn($data, 'nama', 'kode_pos'), 'test-9: Key "kode_pos" tidak ada, pakai indeks numerik');
        
        return;
    }



    #[Test]
    public function testRename(): void
    {
        $original = [
            'a' => 'Apple',
            'b' => 'Banana',
            'c' => 'Cherry',
            'd' => 'Durian',
        ];

        $this->assertNull(ArrayUtils::rename(null, ['a' => 'f']), 'test-1: Input array NULL');

        $this->assertSame($original, ArrayUtils::rename($original, null), 'test-2: keyMap NULL, array tidak berubah');

        $this->assertSame($original, ArrayUtils::rename($original, []), 'test-3: keyMap kosong, array tidak berubah');

        $this->assertSame([], ArrayUtils::rename([], ['a' => 'f']), 'test-4: Input array kosong');

        $expected = [
            'f' => 'Apple',
            'b' => 'Banana',
            'c' => 'Cherry',
            'd' => 'Durian',
        ];
        $this->assertSame($expected, ArrayUtils::rename($original, ['a' => 'f']), 'test-5: Rename a -> f');

        $expected = [
            'f' => 'Apple',
            'b' => 'Banana',
            'g' => 'Cherry',
            'd' => 'Durian',
        ];
        $this->assertSame($expected, ArrayUtils::rename($original, ['a' => 'f', 'c' => 'g']), 'test-6: Rename a -> f, c -> g');

        $this->assertSame($original, ArrayUtils::rename($original, ['z' => 'x']), "test-7: Key 'z' tidak ada, array tidak berubah");

        $expected = [
            'a' => 'Apple',
            'c' => 'Cherry',
            'd' => ['Durian', 'Banana'], // 'Durian' (nilai lama d) lalu 'Banana' (nilai dari b)
        ];
        $this->assertSame($expected, ArrayUtils::rename($original, ['b' => 'd']), 'test-8: Rename b -> d (tabrakan key)');

        $data = ['id' => 1, 'name' => 'John', 'age' => 30];
        $expected = ['id' => 1, 'nama' => 'John', 'age' => 30];
        $keys_expected = array_keys($expected);
        
        $result = ArrayUtils::rename($data, ['name' => 'nama']);
        $keys_result = array_keys($result);

        $this->assertSame($expected, $result, 'test-9a: Nilai array setelah rename (cek urutan)');
        $this->assertSame($keys_expected, $keys_result, 'test-9b: Urutan key harus sama');

        $data = ['satu' => 1, 'dua' => 2, 'tiga' => 3, 'empat' => 4];
        $map = [
            'satu' => 'baru', // rename
            'dua' => 'tiga'  // tabrakan
        ];
        $expected = [
            'baru' => 1,
            'tiga' => [3, 2], // nilai lama (3) lalu nilai baru (2)
            'empat' => 4
        ];
        $this->assertSame($expected, ArrayUtils::rename($data, $map), 'test-10: Rename ganda dengan tabrakan');

        $data = [0 => 'Nol', 1 => 'Satu', 'user' => 'Admin'];
        $map = [0 => 'index_nol', 'user' => 'pengguna'];
        $expected = ['index_nol' => 'Nol', 1 => 'Satu', 'pengguna' => 'Admin'];
        $this->assertSame($expected, ArrayUtils::rename($data, $map), 'test-11: Rename key numerik dan string');

        return;
    }



    #[Test]
    public function testToStr(): void
    {
        $this->assertNull(ArrayUtils::toStr(null, ','), 'test-1: Input array NULL');
        $this->assertNull(ArrayUtils::toStr(['a', 'b'], null), 'test-2: Separator NULL');
        $this->assertNull(ArrayUtils::toStr(null, null), 'test-3: Array dan Separator NULL');
        $this->assertSame('a,b,c', ArrayUtils::toStr(['a', 'b', 'c'], ','), 'test-4: Array string dengan koma');
        $this->assertSame('Hello World', ArrayUtils::toStr(['Hello', 'World'], ' '), 'test-5: Array string dengan spasi');
        $this->assertSame('abc', ArrayUtils::toStr(['a', 'b', 'c']), 'test-6: Default separator (empty string)');
        $this->assertSame('abc', ArrayUtils::toStr(['a', 'b', 'c'], ''), 'test-7: Separator empty string');
        $this->assertSame('', ArrayUtils::toStr([], ','), 'test-8: Array kosong');
        $this->assertSame('1-2-3', ArrayUtils::toStr([1, 2, 3], '-'), 'test-9: Array integer');
        $this->assertSame('1|a|3.5', ArrayUtils::toStr([1, 'a', 3.5], '|'), 'test-10: Array mixed types');
        $this->assertSame('One', ArrayUtils::toStr(['One'], ','), 'test-11: Array satu elemen');

        return;
    }



    #[Test]
    public function testToString(): void
    {
        $this->assertNull(ArrayUtils::toString(null, ','), 'test-1: Input array NULL');
        $this->assertNull(ArrayUtils::toString(['a', 'b'], null), 'test-2: Separator NULL');
        $this->assertNull(ArrayUtils::toString(null, null), 'test-3: Array dan Separator NULL');
        $this->assertSame('a,b,c', ArrayUtils::toString(['a', 'b', 'c'], ','), 'test-4: Array string dengan koma');
        $this->assertSame('Hello World', ArrayUtils::toString(['Hello', 'World'], ' '), 'test-5: Array string dengan spasi');
        $this->assertSame('abc', ArrayUtils::toString(['a', 'b', 'c']), 'test-6: Default separator (empty string)');
        $this->assertSame('abc', ArrayUtils::toString(['a', 'b', 'c'], ''), 'test-7: Separator empty string');
        $this->assertSame('', ArrayUtils::toString([], ','), 'test-8: Array kosong');
        $this->assertSame('1-2-3', ArrayUtils::toString([1, 2, 3], '-'), 'test-9: Array integer');
        $this->assertSame('1|a|3.5', ArrayUtils::toString([1, 'a', 3.5], '|'), 'test-10: Array mixed types');
        $this->assertSame('One', ArrayUtils::toString(['One'], ','), 'test-11: Array satu elemen');

        return;
    }
}
