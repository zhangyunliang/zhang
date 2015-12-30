<?php

/*
 * 软件为合肥生活宝网络公司出品，未经授权许可不得使用！
 * 作者：baocms团队
 * 官网：www.baocms.com
 * 邮件: youge@baocms.com  QQ 800026911
 */

class CashAction extends CommonAction {

  
    public function index() {
        $Users = D('Users');
        $data = $Users->find($this->uid);
        if (IS_POST){
            $money = abs((int)($_POST['money']*100));
            if ($money == 0){
                $this->baoError('提现金额不合法');
            }
            if ($money > $data['money'] || $data['money'] == 0) {
                $this->baoError('余额不足，无法提现');
            }
            $arr = array();
            $arr['user_id'] = $this->uid;
            $arr['money'] = $money;
            $arr['addtime'] = NOW_TIME;
            $arr['account'] = $data['account'];
            D('Userscash')->add($arr);
            //扣除余额
            $Users->addMoney($data['user_id'], -$money, '申请提现，扣款');
            $this->baoSuccess('申请成功', U('logs/cashlogs'));
        } else {
            $this->assign('money', $data['money'] / 100);
            $this->display();
        }
    }

}
