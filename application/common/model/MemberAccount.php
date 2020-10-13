<?php

namespace app\common\model;

use think\Model;

class MemberAccount extends Model
{
    protected $autoWriteTimestamp = 'dateTime';

    protected $updateTime = false;

    public static $types = [
        'points' => '花豆',
        'money' => '余额',
        'commission' => '采蜜豆',
    ];

    public function getNicknameAttr($value, $data)
    {
        $member = Member::get($data['member_id']);
        return $data['member_id'] . '#' . ($member ? $member['nickname'] : '--');
    }

    public function getUsernameAttr($value, $data)
    {
        $member = Member::get($data['member_id']);
        return $data['member_id'] . '#' . ($member ? $member['username'] : '--');
    }

    public static function getNames()
    {
        $names = implode('/', array_values(self::$types));

        return $names;
    }
}
