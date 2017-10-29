// window.onload = function(){
$(document).ready(function(){
    

    /**
     * 日历的ajax
     */
    var num = 0;
    $('button').on('click',function(){
        _click($(this));
    });

    function _click($this){
        num = num + parseInt($this.attr('value'));
        var url = '/MyBlog/index.php/Home/Index/ajax_calen';
        var args = {'month':num};
        $.post(url, args,function(data){
        //将内容输出到网页上
        $('#tip').empty().html(data);
        });
    }


})