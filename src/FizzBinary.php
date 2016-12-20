<?php
namespace Fizzday\FizzBinary;

/**
 * php 二叉树实现
 *
 * 1
 * 2         3
 * 4   5     6     7
 * 8 9 10 11 12 13 14 15
 *
 * 0: 1;
 * 1: (2^0) ~ (2^1)
 * 2: (2^1) ~ (2^2)
 * 3: (2^2) ~ (2^3)
 *
 * Class FizzBinary
 * @package Fizzday\FizzBinary
 */
class FizzBinary
{
    /**
     * 根据编号, 获取当前层数是第几层
     * @param $id   编号
     * @return int
     */
    public static function getLayers($id)
    {
        $id++;
        // 获取以2为底, $id的对数值
        $res = log($id) / log(2);
        // 如果不为整数, 则递增查询
        if (ceil($res) != $res) {
            return self::getLayers($id);
        }

        return $res;
    }

    /**
     * 跟据编号, 获取所有上级的编号
     * @param $id   编号
     * @param int $layers   限定层数
     * @return array
     */
    public static function getPids($id, $layers = 0)
    {
        // 结果存放容器
        static $ids = array();
        // 直接上级
        $res = floor($id / 2);
        // 插入结果容器中
        $ids[] = $res;
        // 如果未到根节点(且层数未到指定层数,如果为限定层数, 默认取所有), 递归查询
        if ($layers) {
            if (($res > 1) && (count($ids) < $layers)) return self::getPids($res);
        } else {
            if ($res > 1) return self::getPids($res);
        }

        return $ids;
    }
}
