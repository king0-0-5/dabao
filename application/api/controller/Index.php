<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\Controller;
use think\Db;

/**
 * 首页接口
 */
class Index extends Controller
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 首页
     *
     */
    public function index()
    {
        return '';
    }

    /**打包状态反馈
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function upDateApp()
    {
        $id = $this->request->get('id');
        $type = $this->request->get('type');
        $status = $this->request->get('status');
        $status = intval($status);
        if (intval($id) > 0) {
            $result = Db::name('pack')->find($id);
            if ($result) {
                if ($type === 'apk') {
                    Db::name('pack')->where(['id' => $id])->update(['apk_status' => $status]);
                } else {
                    Db::name('pack')->where(['id' => $id])->update(['ipa_status' => $status]);
                }
            }
        }
    }


}
