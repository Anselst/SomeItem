$(document).ready(function(){
    $('.hide-tr').toggle();
    $('.hide-tr').fadeOut();
    $('.abcde a').click(function(){
        var id = '#tr'+$(this).attr("id");
        $(id).fadeToggle();
    });
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
    
    /****************** 验证 *******************/
    /**
     * 用户名增加,修改时提示
     */
    $("[name='username']").change(function(){
        var un_val = $("[name='username']").val();
        var reg = $('[name="reg"]').val();
        if(un_val.length == 0) {
            $('#tip_user').html('<font color="red">用户名不能为空!</font>');
            $('[name="send"]').attr('disabled', true);
            $('[name="send"]').removeClass('submit').addClass("disab");
        } else {
            if(un_val.length < 2 || un_val.length > 10) {
                $('#tip_user').html('<font color="red">用户名长度不能小于2位或者大于10位!</font>');
                $('[name="send"]').attr('disabled', true);
                $('[name="send"]').removeClass('submit').addClass("disab");
            } else if(reg == 'reg') {
                var url = '/Blog/index.php/Admin/User/ajax_vali_reg';
                var valu = {'un':un_val};
                $.post(url, valu, function(data){
                    $('#tip_user').html(data);
                    if($('#tip_user font').attr('color') == 'red'){
                        //设置提交按钮不可用,ajax验证后解除
                        $('[name="send"]').attr('disabled', true);
                        $('[name="send"]').removeClass('submit').addClass("disab");
                    } else if($('#tip_user font').attr('color')=='green'&&$('#tip_psw').val()==''&&$('#tip_notpsw').val()==''){
                        //解除提交按钮限制
                        $('[name="send"]').removeClass('disab').addClass("submit");                        
                        $('[name="send"]').removeAttr('disabled');
                    }
                });
            } else {
                $('#tip_user').empty();
                if($('#tip_user').val()==''&&$('#tip_psw').val()==''&&$('#tip_notpsw').val()==''){
                    $('[name="send"]').removeClass('disab').addClass("submit");
                    $('[name="send"]').removeAttr('disabled');
                }
            }
        }
    });
    
    /**
     * 密码的ajax
     */
    $("[name='psw']").change(function(){
        var psw_val = $("[name='psw']").val();
        var reg = $('[name="reg"]').val();
        if(psw_val.length == 0) {
            $('[name="send"]').attr('disabled', true);
            $('[name="send"]').removeClass('submit').addClass("disab");
            $('#tip_psw').html('<font color="red">密码不能为空!</font>');
        } else {
            if(psw_val.length>5&&psw_val.length<18) {
                $('#tip_psw').empty();
                if(reg == 'reg') {
                    if(($('#tip_user').html()==''||$('#tip_user font').attr('color')=='green')&&$('#tip_psw').val()==''&&$('#tip_notpsw').val()==''){
                        $('[name="send"]').removeClass('disab').addClass("submit");
                        $('[name="send"]').removeAttr('disabled');
                    }
                } else {
                    if(($('#tip_user').html()==''||$('#tip_user font').attr('color')=='green')&&$('#tip_psw').val()==''){
                        $('[name="send"]').removeClass('disab').addClass("submit");
                        $('[name="send"]').removeAttr('disabled');
                    }
                }
            } else {
                $('[name="send"]').attr('disabled', true);
                $('[name="send"]').removeClass('submit').addClass("disab");
                $('#tip_psw').html('<font color="red">密码长度必须大于6位小于18位!</font>');                
            }
        }
    });
    
    /**
     * 确认密码的ajax
     */
    $("[name='notpsw']").change(function(){
        var np_val = $("[name='notpsw']").val();
        var psw_val = $('[name="psw"]').val();
        if(np_val.length == 0) {
            $('[name="send"]').attr('disabled', true);
            $('[name="send"]').removeClass('submit').addClass("disab");
            $('#tip_notpsw').html('<font color="red">确认密码不能为空!</font>');
        } else {
            if(np_val != psw_val) {
                $('[name="send"]').attr('disabled', true);
                $('[name="send"]').removeClass('submit').addClass("disab");
                $('#tip_notpsw').html('<font color="red">密码与确认密码必须相同!</font>');
            } else {
                $('#tip_notpsw').empty();
                if(($('#tip_user').html()==''||$('#tip_user font').attr('color')=='green')&&$('#tip_psw').val()==''&&$('#tip_notpsw').val()==''){
                    $('[name="send"]').removeClass('disab').addClass("submit");
                    $('[name="send"]').removeAttr('disabled');
                }         
            }
        }
    });

    $('.post').submit(function(){
        var n = $('[name="yzm"]').val().length;
        if(n!=4) {
            return false;
            $('[name="yzm"]').focus();
        }
    });

    //刷新验证码
    $('#yzm').click(function(){
        $('#yzm').attr('src','/Blog/index.php/Admin/User/yzm');
    });
});
