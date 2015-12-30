<?php

class CommonAction extends Action {
   

    protected $_CONFIG = array();

    public function _initialize(){
        $this->_CONFIG = D('Setting')->fetchAll();
    }

   public function verify() {
        import('ORG.Util.Image');
        Image::buildImageVerify(4,2,'png',60,30);
    }
        
}