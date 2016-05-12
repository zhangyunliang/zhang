<?php
class IndexAction extends CommonAction {
    
     public function _initialize() {
        parent::_initialize();
        $this->type = D('Keyword')->fetchAll();
        $this->assign('types', $this->type);
    }

    public function index() {
        
        // if (is_mobile()) {
            // header("Location:" . U('mobile/index/index'));
            // die;
        // }
        $this->display();
    }


}
