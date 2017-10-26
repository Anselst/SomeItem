<?php
namespace Org\Util;

class calendar {
    //上个月的日历信息
    protected $prevYear = null; //上个月是哪一年
    protected $prevMonth = null;
    protected $prevDay = null; //上个月总天数
    protected $daySum = null; //上个月所需打印天数

    //本月的信息
    protected $curYear = null;
    protected $curMonth = null;
    protected $curDay = null;

    //下个月的信息
    protected $nextYear = null; //下个月是哪一年
    protected $nextMonth = null;
    protected $nextDay = null; //所需打印的下个月天数

    //定义存放日历的二维数组
    
    protected $calen = array();


    public function __construct($month=null){
        //初始化本月
        if(!isset($month) || $month == 0){
            $this->curYear = date("Y");
            $this->curMonth = date('m');
            $this->curDay = cal_days_in_month(CAL_GREGORIAN, $this->curMonth, $this->curYear); //本月总天数
        } else {
            $this->curYear = date('Y',strtotime(date('Y').'-'.date('m')."-1 +$month month"));
            $this->curMonth = date('m',strtotime(date('Y').'-'.date('m')."-1 +$month month"));            
            $this->curDay = cal_days_in_month(CAL_GREGORIAN, $this->curMonth, $this->curYear); //本月总天数
        }
        //初始化上月
        $this->prevYear = date('Y',strtotime($this->curYear.'-'.$this->curMonth.'-1 -1 month'));
        $this->prevMonth = date('m',strtotime($this->curYear.'-'.$this->curMonth.'-1 -1 month'));
        $this->prevDay = cal_days_in_month(CAL_GREGORIAN, $this->prevMonth, $this->prevYear); //上月总天数
        $this->daySum = 1;
        $this->create_calendar();

    }

    public function get_month(){
        return $this->curYear.'年'.$this->curMonth.'月';
    }

    public function create_calendar(){

        //获取本月1号是周几
        $str = $this->curYear.'-'.$this->curMonth.'-1';
        $curWeak = date('w',strtotime($str));
        //如果本月1号是周日,则上个月打印7天
        if($curWeak == 0){
            $weakSum = 7;
            $dayS = $this->prevDay - $weakSum +1;
        } else {
            $weakSum = $curWeak;
            $dayS = $this->prevDay - $weakSum +1;
        }
        //本月日期,从1号开始

        //下月日期,从1号开始
        $this->nextDay = 1;
        //设置数组存放6排数据
        for ($day=1,$j=0;$j<6;$j++){
            //设置日历第一排
            if($j==0){
                if($weakSum == 7){
                    //设置上个月日期
                    for ($i=0;$i<$weakSum;$i++) {
                        $this->calen[$j][$i] = $dayS;
                        $this->daySum++;
                        $dayS++;
                    }
                } else {
                    for ($i=0;$i<$weakSum;$i++) {
                        $this->calen[$j][$i] = $dayS;
                        $this->daySum++;                        
                        $dayS++;
                    }
                    for (;$i<7;$i++) {
                        $this->calen[$j][$i] = $day;
                        $day++;
                    }
                }
                //跳过第一排循环,避免重复
                continue;
            } else {
                //开始第二排循环
                for ($i=0;$i<7;$i++) {
                    //如果本月日期设置结束,开始设置下个月日期
                    if ($day > $this->curDay) {
                    //设置下个月日期
                        $this->calen[$j][$i] = $this->nextDay;
                        $this->nextDay++;
                    } else {
                        $this->calen[$j][$i] = $day;
                        $day++;    
                    }
                }
            }
        }
    }

    /**
     * 取得日历数组
     *
     * @return void
     */
    public function get_calen(){
        return $this->calen;
    }

    public function get_days(){
        $days = array('prevD'=>$this->daySum-1,'nextD'=>$this->nextDay-1);
        return $days;
    }

}


// if(@$_POST['month']||@$_POST['month'] === '0'){
//     $calendar = new calendar($_POST['month']);
//     $calen = $calendar->get_calen();
//     $curMonth = $calendar->get_month();
//     $days = $calendar->get_days();
//     $count = 42;
//     $str = '<tr><th colspan="7"><span style="margin:0 50px;">'.$curMonth.'</span></th></tr>';
//     $str = $str.'<tr class="weak"><td>周日</td><td>周一</td><td>周二</td><td>周三</td><td>周四</td><td>周五</td><td>周六</td></tr>';
//     for ($i=0;$i<6;$i++){
//         $str = $str.'<tr>';
//         for ($j=0;$j<7;$j++){
//             if ($i==0&&$days['prevD']>0){
//                 $str = $str.'<td class="prev">';
//                 $str = $str.$calen[$i][$j];
//                 $str = $str.'</td>';
//                 $days['prevD']--;
//                 $count--;
//                 continue;
//             } elseif ($count == $days['nextD']){
//                 $str = $str.'<td class="next">';
//                 $str = $str.$calen[$i][$j];
//                 $str = $str.'</td>';
//                 // $days['nextD']--;
//                 // $count--;
//                 continue;
//             }
//             $str = $str.'<td class="current">';
//             $str = $str.$calen[$i][$j];
//             $str = $str.'</td>';
//             $count--;
//         }
//     $str = $str.'</tr>';
//     }
//         // echo $_POST['month'];
//     print_r($str);
// }




?>