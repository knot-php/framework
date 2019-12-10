<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use Throwable;

use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Stk2k\Util\Util;

use KnotLib\Module\Application\SimpleApplication;

abstract class KnotApplication extends SimpleApplication
{
    /**
     * Handle exception
     *
     * @param Throwable $e
     *
     * @return bool
     */
    public function handleException(Throwable $e) : bool
    {
        if (!parent::handleException($e)){
            self::logException($e, $this->logger());

            echo '500 Internal Server Error';
        }

        return true;
    }

    /**
     * @param Throwable $e
     * @param PsrLoggerInterface $logger
     */
    private static function logException(Throwable $e, PsrLoggerInterface $logger)
    {
        // print exception stack
        $logger->error('=====[ Exception Stack ]=====', ['file' => __FILE__, 'line' => __LINE__]);
        Util::walkException($e, function($index, Throwable $ex, $file, $line, $message, $code) use($logger){
            $ex_class = get_class($ex);
            $logger->error("[$index][$ex_class][$code] $message @$file($line)", ['file' => __FILE__, 'line' => __LINE__]);
        });

        // print call stack
        $original_ex = $e;
        while($original_ex->getPrevious()){
            $original_ex = $original_ex->getPrevious();
        }
        $logger->error('=====[ Call Stack ]=====', ['file' => __FILE__, 'line' => __LINE__]);
        Util::walkBacktrace($original_ex->getTrace(), function($index, $file, $line, $class, $type, $func) use($logger){
            $message = basename($file) . '(' . $line . ')@' . $class . $type . $func . '()';
            $logger->error("[$index] $message", ['file' => __FILE__, 'line' => __LINE__]);
        });
        $logger->error('========================', ['file' => __FILE__, 'line' => __LINE__]);
    }
}