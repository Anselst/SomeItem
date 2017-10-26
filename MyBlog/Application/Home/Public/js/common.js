// window.onload = function(){
$(document).ready(function(){
    /**
     * 点击选择头像显示框架,并选择头像
     */
    $(".face").click(function(){
        var val = $(this).attr('src');
        //更改父文档中的id=def_face的value属性
        // $("#def_face",parent.document.body).attr('value',val);
        jconfirm(val);
    });
    
    $("[type='button']").click(function(){
        $('iframe').fadeIn();
    });

    function jconfirm(val) {
        if(confirm('是否选择这个头像')) {
            $("#def_face",parent.document.body).attr('value',val);
            $('#show',parent.document).hide();
            $('#show_face',parent.document.body).text('已选择头像');
            $('#show_face',parent.document.body).css('color','green')
        }
    }
    
    /**
     * 用户名增加,修改时提示
     */
    $("[name='username']").change(function(){
        var val = $(this).val();
        if(val.length == 0) {
            $('#un_tip').html('<font color="red">用户名不能为空!</font>');
        } else {
            if(val.length < 2 || val.length > 10) {
                $('#un_tip').html('<font color="red">用户名长度不能小于2位或者大于10位!</font>');
            } else {
                var url = '/MyBlog/index.php/Home/Index/ajax_vali_reg';
                url = url + '?tm=' + new Date();
                var valu = {'un':val};
                $.post(url, valu, function(data){
                    $('#un_tip').html(data);
                });
            }
        }
    });

    /**
     * 密码的ajax
     */
    $("[name='psw']").change(function(){
        var val = $(this).val();
        if(val.length == 0) {
            $('#psw_tip').html('<font color="red">密码不能为空!</font>');
        } else {
            if(val.length > 5 && val.length < 18) {
                $('#psw_tip').html('<font color="green">密码可用!</font>');
            } else {
                $('#psw_tip').html('<font color="red">密码长度必须大于6位小于18位!</font>');                
            }
        }
    });

    /**
     * 确认密码的ajax
     */
    $("[name='notpsw']").change(function(){
        var val = $(this).val();
        var psw_val = $("[name='psw']").val();
        if(val.length == 0) {
            $('#npsw_tip').html('<font color="red">确认密码不能为空!</font>');
        } else {
            if(val != psw_val) {
                $('#npsw_tip').html('<font color="red">密码与确认密码必须相同!</font>');
            } else {
                $('#npsw_tip').empty();                
            }
        }
    });

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