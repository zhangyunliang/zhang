<?php
        vendor('PHPeXCEL.PHPExcel');
        //todo 导入
function FileImport($filename,$exts)
{
            $phpexcel=new PHPExcel();
            //todo 判断excel文档类型
            if($exts=='xls'){
                 $phpread=PHPExcel_IOFactory::createReader('Excel5');
            }else if($exts=='xlsx'){
                $phpread=PHPExcel_IOFactory::createReader('Excel2007');
             }
            //todo 加载文件
            $phpxls=$phpread->load($filename,$encode='utf-8');
            $currentsheet=$phpxls->getSheet(0);//todo 暂时只获取第一个表单数据
            $rows=$currentsheet->getHighestRow();//todo 获取总行数
            $columns=$currentsheet->getHighestColumn();//todo 获取总列数
            $arrExcel=$phpxls->getSheet(0)->toArray();
            //todo 读取数据 第一行不需要
            $ziyuandan_id=$this->ziYuanDan->order('ziyuandan_id DESC')->limit('1')->getfield('ziyuandan_id');
            //file_put_contents("text.txt",$ziyuandan_id);
        for($row=2;$row<=$rows;$row++){
            $data['ziyuandan_id']=$ziyuandan_id;
            $data['goods_cat']=$phpxls->getActiveSheet()->getCell("A".$row)->getValue();
            $data['goods_name']=$phpxls->getActiveSheet()->getCell("B".$row)->getValue();
            $data['goods_version']=$phpxls->getActiveSheet()->getCell("C".$row)->getValue();
            $data['brand_name']=$phpxls->getActiveSheet()->getCell("D".$row)->getValue();
            $data['goods_color']=$phpxls->getActiveSheet()->getCell("E".$row)->getValue();
            $data['goods_unit']=$phpxls->getActiveSheet()->getCell("F".$row)->getValue();
            $data['shop_price']=$phpxls->getActiveSheet()->getCell("G".$row)->getValue();
            $data['public_price']=$phpxls->getActiveSheet()->getCell("H".$row)->getValue();
            $data['stock']=$phpxls->getActiveSheet()->getCell("I".$row)->getValue();
            $data['goods_desc']=$phpxls->getActiveSheet()->getCell("J".$row)->getValue();
            $data['add_time']=time();
            $data['is_delete']=0;
            $flog=$this->zhuCai->add($data);
            if(!$flog)
            {
                $this->error("请确认资源单格式正确");
            }
        }
}
        //todo 数据库导出
function FileOutPut($data,$filename='导出资源单')
{
        $row=2;
        $phpexcel=new PHPExcel();
        header('Content-Type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename='.$filename.'.xls');
        foreach($data as $k=>$rows){
            $span=ord("A");//todo 返回ASCII 码值
            foreach($rows as $key=>$value){
                $column=chr($span);//todo 返回字符串
                 //$phpexcel->setCellValue($column.$row,$value);
                $phpexcel->getActiveSheet(0)->setCellValue($column.$row,$value);
                $span++;
              }
            $row++;
        }
        $phpexcel->setActiveSheetIndex(0);
        $phpread=PHPExcel_IOFactory::createWriter($phpexcel,'Excel2007');
        $phpread->save('php://output');
}

//=============================================文件操作

$dh=opendir($this->savepath);
while ($file=readdir($dh)) {
    if ($file != "." && $file != "..") {
        $fullpath = $this->savepath . "/" . $file;
        if (!is_dir($fullpath)) {
             unlink($fullpath);
        } else {
            deldir($fullpath);
        }
    }
}



