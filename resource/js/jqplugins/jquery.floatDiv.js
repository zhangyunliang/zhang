/*����λ�ø����̶���*/
/*û��(http://regedit.cnblogs.com) 08-03-11*/
/*˵����������ָ���Ĳ㸡������ҳ�ϵ��κ�λ�ã�������������ʱ���ᱣ���ڵ�ǰλ�ò��䣬�����������*/

/*2008-4-1�޸ģ����Զ���rightλ��ʱ��Ч���������һ���ж�
��ֵʱ�Ͳ����ã���ֵʱҪ��18px��������λ����ie6�µ�����
*/
/*���ã�
1 �޲������ã�Ĭ�ϸ��������½�
$("#id").floatdiv();

2 ���ù̶�λ�ø���
//���½�
$("#id").floatdiv("rightbottom");
//���½�
$("#id").floatdiv("leftbottom");
//���½�
$("#id").floatdiv("rightbottom");
//���Ͻ�
$("#id").floatdiv("lefttop");
//���Ͻ�
$("#id").floatdiv("righttop");
//����
$("#id").floatdiv("middle");

3 �Զ���λ�ø���
$("#id").floatdiv({left:"10px",top:"10px"});
���ϲ��������ø�������left 10������,top 10�����ص�λ��



*/
jQuery.fn.floatdiv=function(location){
        //ie6Ҫ�������������
        var isIE6=false;
        if($.browser.msie && $.browser.version=="6.0"){
                $(this).hide();
                return;
        };
        $("body").css({margin:"0px",padding:"0 10px 0 10px",
                border:"0px",
                height:"100%",
                overflow:"auto"
        });
        return this.each(function(){
                var loc;//��ľ��Զ�λλ��
                if(location==undefined || location.constructor == String){
                        switch(location){
                                case("rightbottom")://���½�
                                        loc={right:"0px",bottom:"0px"};
                                        break;
                                case("leftbottom")://���½�
                                        loc={left:"0px",bottom:"0px"};
                                        break;  
                                case("lefttop")://���Ͻ�
                                        loc={left:"0px",top:"0px"};
                                        break;
                                case("righttop")://���Ͻ�
                                        loc={right:"0px",top:"0px"};
                                        break;
                                case("middle")://����
                                        var l=0;//����
                                        var t=0;//����
                                        var windowWidth,windowHeight;//���ڵĸߺͿ�
                                        //ȡ�ô��ڵĸߺͿ�
                                        if (self.innerHeight) {
                                                windowWidth=self.innerWidth;
                                                windowHeight=self.innerHeight;
                                        }else if (document.documentElement&&document.documentElement.clientHeight) {
                                                windowWidth=document.documentElement.clientWidth;
                                                windowHeight=document.documentElement.clientHeight;
                                        } else if (document.body) {
                                                windowWidth=document.body.clientWidth;
                                                windowHeight=document.body.clientHeight;
                                        }
                                        l=windowWidth/2-$(this).width()/2;
                                        t=windowHeight/2-$(this).height()/2;
                                        loc={left:l+"px",top:t+"px"};
                                        break;
                                default://Ĭ��Ϊ���½�
                                        loc={right:"0px",bottom:"0px"};
                                        break;
                        }
                }else{
                        loc=location;
                }
                $(this).css("z-index","9999").css(loc).css("position","fixed");
                if(isIE6){
                        if(loc.right!=undefined){
                                //2008-4-1�޸ģ����Զ���rightλ��ʱ��Ч���������һ���ж�
                                //��ֵʱ�Ͳ����ã���ֵʱҪ��18px��������λ��
                                if($(this).css("right")==null || $(this).css("right")==""){
                                        $(this).css("right","18px");
                                }
                        }
                        $(this).css("position","absolute");
                }
        });
};

