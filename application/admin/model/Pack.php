<?php

namespace app\admin\model;

use think\Model;


class Pack extends Model
{

    

    

    // 表名
    protected $name = 'pack';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'apk_status_text',
        'ipa_status_text'
    ];
    

    
    public function getApkStatusList()
    {
        return ['0' => __('Apk_status 0'), '1' => __('Apk_status 1'), '2' => __('Apk_status 2')];
    }

    public function getIpaStatusList()
    {
        return ['0' => __('Ipa_status 0'), '1' => __('Ipa_status 1'), '2' => __('Ipa_status 2')];
    }


    public function getApkStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['apk_status']) ? $data['apk_status'] : '');
        $list = $this->getApkStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIpaStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['ipa_status']) ? $data['ipa_status'] : '');
        $list = $this->getIpaStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
