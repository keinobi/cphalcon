<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Logger\Adapter\File;

use Phalcon\Logger\Adapter\File;
use UnitTester;

/**
 * Class BeginCest
 *
 * @package Phalcon\Test\Unit\Logger
 */
class BeginCest
{
    /**
     * Tests Phalcon\Logger\Adapter\File :: begin()
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function loggerAdapterFileBegin(UnitTester $I)
    {
        $I->wantToTest('Logger\Adapter\File - begin()');
        $fileName   = $I->getNewFileName('log', 'log');
        $outputPath = outputFolder('tests/logs/');
        $adapter    = new File($outputPath . $fileName);

        $adapter->begin();

        $actual = $adapter->inTransaction();
        $I->assertTrue($actual);

        $I->safeDeleteFile($outputPath . $fileName);
    }
}
