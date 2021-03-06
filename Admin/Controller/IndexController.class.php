<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 23:13
 */
namespace Admin\Controller;
class indexController extends \Think\Controller{
    function index(){
        $getphone=session('session_name');
        $getsid=I('sid');
        if(!empty($getsid)){
            $getphone=session("session_sid".$getsid);
            //session("session_sid",$getsid);
        }
        //是否是总管理员进去的
        $getsuperadminname=session('session_superadmin');
        if (!empty($getphone)||!empty($getsuperadminname)){
            $getsid=session("session_sid".$getsid);
           // $infoModel=M('configinfo');
            $shopModel=M('shop');
            if(!empty($getsuperadminname)){
               // $configinfo=$infoModel->where('sid='.I('sid'))->select();//所有信息
                $shopinfo = $shopModel->where('did='.I('sid'))->find();
                $this->sid=I('sid');
            }else{
                //$configinfo=$infoModel->where('sid='.$getsid)->select();//所有信息
                $shopinfo = $shopModel->where('did='.$getsid)->find();
                $this->sid=$getsid;
            }
           // $this->configs=$configinfo;
            $this->shopinfo=$shopinfo;
            // var_dump($configinfo);
            $this->name=$getphone;

            $this->fromadmin=$getsuperadminname;
            $getconfig=M('config')->where('id=1')->find();
            $this->configinfo=$getconfig;
            $this->display("Index/index");
        }else{
            $getsid=I('sid');
            $this.redirect(__MODULE__."/User/mylogin?sid=".$getsid);
        }

    }
    /*定时执行这里的文件,一天执行一次*/
    function  upeverydata(){
        $sids=M('shop')->getField('did',true);
        $adddata=array();
        foreach ($sids as $k=>$v){
            $ishava=M('everyday')->where('e_sid='.$v.' and to_days(e_usetime) = to_days(now())')->find();
            if (empty($ishava)){
                $getplan=M('plan')->where('p_sid='.$v.' and p_status=1 and p_price >0')->find();
                $getplanname=M('plan')->where('p_sid='.$v)->getField('p_name');
                if ($getplan){
                    if (!empty($getplanname)){
                        $adddata['e_shownum']=0;
                        $adddata['e_clicknum']=0;
                        $adddata['p_price']=$getplan['p_price'];
                        $adddata['e_usenum']=0;
                        $adddata['e_planname']=$getplanname;
                        $adddata['e_sid']=$v;
                        $adddata['e_time']=time();
                        $adddata['e_usetime']=date('Y-m-d',time());
                        M('everyday')->add($adddata);
                    }
                }
            }

        }
    }
    /*
     * 每小时更新每日数据中的数据，改为每1分钟
     * */
    function updateeveryhouse(){
        $sids=M('shop')->getField('did',true);
        $updatedata=array();
        foreach ($sids as $k=>$v){
            //每两分钟更新计划中的点击量和展示量
            $getplan=M('plan')->where('p_sid='.$v.' and p_status=1 and p_price >0')->find();
            $getplanname=M('plan')->where('p_sid='.$v)->getField('p_name');
            $getallshownum=M('plan')->where('p_sid='.$v)->getField('p_allshownum');
            $getallclicknum=M('plan')->where('p_sid='.$v)->getField('p_allclicknum');
            $getplanprice=M('plan')->where('p_sid='.$v)->getField('p_price');
            $getprenum=M('plan')->where('p_sid='.$v)->getField('p_repnum');
            $getp_housuse=M('plan')->where('p_sid='.$v)->getField('p_housuse');
            $yue=M('shop')->where('did='.$v)->getField('dyue');

            //时耗和用户充值的比例
            $bili=$getp_housuse/$yue;
            //用于一个小时计算的的充值金额。点击量=(时耗/余额 *余额)/广告价格
            $clicknum=intval(($yue*$bili)/$getplanprice);
            //每1分钟生成点击量
            $twoclicknum=intval($clicknum/60);
            //消耗
            $usenum=$getplanprice*$twoclicknum;
            //每天今日的数据
            $everyshownum=M('everyday')->where('e_sid='.$v.' and to_days(e_usetime) = to_days(now())')->getField('e_shownum');
            $everyclicknum=M('everyday')->where('e_sid='.$v.' and to_days(e_usetime) = to_days(now())')->getField('e_clicknum');
            $everyusenum=M('everyday')->where('e_sid='.$v.' and to_days(e_usetime) = to_days(now())')->getField('e_usenum');

            $newshownum=$everyshownum+$twoclicknum*66;
            $newclicknum=$everyclicknum+$twoclicknum;
            $newusenum=$everyusenum+$usenum;
            //如果今日的消耗大于今日的预算就限等于预算
            if ($newusenum<$getprenum){
                $newusenum=$getprenum;
            }else{
<<<<<<< HEAD
                //更新计划中的点击量和展示量
                M('plan')->where('p_sid='.$v)->save(array('p_allshownum'=>$newshownum,'p_allclicknum'=>$newclicknum));
=======
>>>>>>> dca6bd1f91a895ed995849e7fda90bb37cff7b6b
                if ($getplan){
                    //更新账号余额和历史消耗dhistorypay
                    $getyue=M('shop')->where('did='.$v)->getField('dyue');
                    $getdhistorypay=M('shop')->where('did='.$v)->getField('dhistorypay');
                    $newyue=$getyue-$usenum;
                    $dhistorypay=$getdhistorypay+$usenum;
                    if ($newyue<0){
                        $newyue=0;
                    }else{
                        M('shop')->where('did='.$v)->save(array('dhistorypay'=>$dhistorypay));
                    }
                    M('shop')->where('did='.$v)->save(array('dyue'=>$newyue));
                    if (!empty($getplanname)){
                        $updatedata['e_shownum']=$newshownum;
                        $updatedata['e_clicknum']=$newclicknum;
                        $updatedata['e_usenum']=$newusenum;
                        $updatedata['p_price']=$getplanprice;
                        $updatedata['e_planname']=$getplanname;
                        $updatedata['e_sid']=$v;
                        $updatedata['e_time']=time();
                        $updatedata['e_usetime']=date('Y-m-d',time());
                        M('everyday')->where('e_sid='.$v.' and to_days(e_usetime) = to_days(now())')->save($updatedata);
                    }
                }
            }


        }
    }
}