var t = button_id = 0, count;
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

    $('#rotation div:not(:first)').hide();
    $('#rotation ul li:first').addClass('active');
    count = $('#rotation div').length;
    $('#banner-button li').click(function(){
    	button_id = $(this).attr('mid')-1;
    	if ($('#rotation div:visible').attr('mid') != button_id+1){
	    	$('#rotation div').filter(":visible").hide().parent().children().eq(button_id).fadeIn(1000);
	    	$(this).toggleClass("active");
			$(this).siblings().removeAttr("class");
    	}
    });
    
    t = setInterval("show_bann()", 4000);
});

function show_bann()
{
	button_id = button_id >=(count -1) ?0 : ++button_id;
	$("#banner-button li").eq(button_id).trigger('click');
}