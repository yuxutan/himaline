<?php
/**
 * Created by PhpStorm.
 * User: yuxut
 * Date: 2016/06/09
 * Time: 9:22
 */
class Multiplier
{

    public function setUp()
    {
    }

    public function perform()
    {
        $x = $this->args['x'];
        $y = $this->args['y'];
        sleep(1); // テストのため重い処理っぽい雰囲気を出す
        $result = $x * $y;
        echo "Multiply: x * y = $result" . PHP_EOL;
        error_log("Multiplier log x * y =" );
        error_log($result );
    }

    public function tearDown()
    {
    }

}