<?php
class ecs_ResourceModel {

    private $CONFIG = array();
    private $charset = 'utf-8';
    private $filePath = '';
    private $error = null; //如果存在错误的时候返回一下错误
    private $domain = '@qq.com'; //可以修改
    private $token = array();//手机APP 需要的 access_token


    public function __construct() {
        $this->filePath = APP_PATH."../attachs/ziyuandan/";
    }

    public function getToken(){
        return $this->token;
    }

    public function getError() {
        return $this->error;
    }

    public function getAll(){


    }

    public function get($id){


    }

    public function create(){

        return true;
    }

    public function update(){

    }

    public function delete(){


    }
    //文件解析
    public function parseEXCEL($fileurl){

        $fileurl = $this->filePath.$fileurl;

        $parseArray = array();

        try{

            $file  = new fFile($fileurl);
            //文件存在 开始解析...

            if(strpos($fileurl, 'xlsx') !== false){
                $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            }else if(strpos($fileurl, 'xls') !== false){
                $objReader = PHPExcel_IOFactory::createReader('Excel5');
            }else{
                return false;
            }

            $objPHPExcel = $objReader->load($fileurl);
            $objReader->setReadDataOnly(true);
            $objWorksheet = $objPHPExcel->getActiveSheet();

            // 取得总行数
            $highestRow =  $objWorksheet->getHighestRow();
            // 取得总列数
            $highestColumn = $objWorksheet->getHighestColumn();

            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

            for ($row = 1;$row <= $highestRow; $row++) {
                for ($col = 0; $col < $highestColumnIndex; $col++) {
                    $parseArray[$row][] = (string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                }
            }
            //返回解析后的数组 用于存入数据库
            return $parseArray;
        }catch(exception $e){
            //文件不存在
            return false;
        }
    }

    /**
     * [EXCELtohtml EXCEL解析成html]
     */
    public function exceltohtml($fileurl) {

        $fileurl = $this->filePath.$fileurl;

        $objReader = new PHPExcel_Reader_Excel2007();
        if(!$objReader->canRead($fileurl)){
            $objReader = new PHPExcel_Reader_Excel5();
            if(!$objReader->canRead($fileurl)){
                //echo 'no Excel';
                return ;
            }
        }

        $objWriteHTML = new PHPExcel_Writer_HTML($objReader->load($fileurl));
        $objWriteHTML->save("php://output");
    }





}