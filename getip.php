<?php
/**
 * Created by PhpStorm.
 * User: yurunyang
 * Date: 2018/4/16
 * Time: 21:08
 */
$isMatched = preg_match_all('/117\.32\.216\.\d{0,3}/', $ip, $matches);
echo $isMatched;