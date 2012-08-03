
// JavaScript Document
$(document).ready(function()
{
	//验证用户是否已存在
	$("#ajax_username").bind("keyup",function()
	{
	$.get(
	"index.php?m=ajax&a=ckuser&username="+$("#ajax_username").val(),function(data)
	{
		
		if(data==1)
		{
			$("#ajax_username_res").html("很抱歉，该用户已存在！");
		}else
		{
			$("#ajax_username_res").html("恭喜！该用户名可以注册！");
		}
	}
	)
	
	});
	//验证昵称是否已经存在
	$("#ajax_nickname").bind("keyup",function()
	{
	$.get(
	"index.php?m=ajax&a=cknickname&nickname="+$("#ajax_nickname").val(),function(data)
	{
		
		if(data==1)
		{
			$("#ajax_nickname_res").html("很抱歉，该昵称已存在！");
		}else
		{
			$("#ajax_nickname_res").html("恭喜！该昵称可以使用！");
		}
	}
	)
	
	});
	
	//验证邮箱是否合法
	$("#ajax_ckemail").bind("keyup",function()
	{
	$.get(
	"index.php?m=ajax&a=ckemail&email="+$("#ajax_ckemail").val(),function(data)
	{
		
		if(data==1)
		{
			$("#ajax_ckemail_res").html("恭喜！邮箱格式正确！");
		}else
		{
			$("#ajax_ckemail_res").html("很抱歉，邮箱格式不正确！");
		}
	}
	)
	
	});
	
	//验证验证码是否合法
	$("#ajax_ckyzm").bind("keyup",function()
	{
		$.get("index.php?m=ajax&a=ckyzm&yzm="+$("#ajax_ckyzm").val(),function(data)
		{
			if(data==1)
		{
			$("#ajax_ckyzm_res").html("验证码正确！");
		}else
		{
			$("#ajax_ckyzm_res").html("验证码错误");
		}
			
		});
		
	});
	//验证密码是否正确
	$("#ajax_pwd1,#ajax_pwd2").bind("keyup",function()
	{
		p1=$("#ajax_pwd1").val();
		
		if(p1.length<4)
		{
			$("#ajax_pwd1_res").html('密码长度要>=4');
		}else
		{
			$("#ajax_pwd1_res").html('密码符合要求');
		}
		if(p1!=$("#ajax_pwd2").val())
		{
			$("#ajax_pwd2_res").html('两次输入密码不一致');
		}else
		{
			$("#ajax_pwd2_res").html('密码符合要求');
		}
		
	});
	
	$("#myaccount").click(function()
	{
		if($("#myaccountlist").css("display")=='block')
		{
			$("#myaccountlist").css("display","none");
		}else
		{
		$("#myaccountlist").css("display","block");
		}
	});
	
	$(".ajax_addaddress").live("click",function()
	{
		$("#showbox").show()
		$("#showbox").center();
		
	})
	
	$("#addresscontent_submit").live("click",function()
	{
		$.post("index.php?m=user&a=myaddress&op=post&ajax=1",{
			address : $("#addresscontent").val()
			},function(data)
			{				
				window.location.reload()
			});
	});
	
	$("#addresscontent_clear").live("click",function()
	{
		$("#addresscontent").val("");
		$("#showbox").hide();
	})
	
	//加入购物车
	$(".addCart").live("click",function()
	{
		//判断是否已经存在
		$t=$(this);		
		caiid = $t.attr('caiid');
		$("#cart_outer").css('display',"block");
		$.get('index.php?m=shopcar&a=Add_db&ajax=1&caiid='+$(this).attr('caiid'),function(data)
		{
			if(data)
			{
				alert(data);
			}else
			{
				$.get('index.php?m=shopcar&a=index&ajax=1',function(data)
				{
					$("#shopcarinfo").html(data);
				});
			}
		});
		
	});
	//加购物数量
	$(".cart_l").live("click",function()
	{
		 
		caiid=$(this).attr('caiid');
		cart_count=parseInt($("#cart_count"+caiid).html());
		if(cart_count>1)
		{
			$.get("index.php?m=shopcar&a=edinum&caiid="+caiid+"&cainum="+(cart_count-1))
			$("#cart_count"+caiid).html(cart_count-1);
			changeprice();
		}
	})
	
	
	$(".cart_r").live("click",function()
	{
		caiid=$(this).attr('caiid');
		cart_count=parseInt($("#cart_count"+caiid).html());
		$.get("index.php?m=shopcar&a=edinum&caiid="+caiid+"&cainum="+(cart_count+1))
		
		$("#cart_count"+caiid).html(cart_count+1);
		changeprice();
	})
	
	$(".cart_delete").live("click",function()
	{
		caiid=$(this).attr('caiid');
		if($(this).parents('.dishes').children().length==1)
		{
			$(this).parents('.restaurant').remove();
		}
		$.get('index.php?m=shopcar&a=del&caiid='+caiid);
		$("#dish"+caiid).removeClass('in_cart');
		$(this).parent().remove();
		changeprice();
		
	})
	$(".mapinfo_show").live("click",function()
	{
		$.get('index.php?m=shop&ajax=1&shopid='+$(this).attr('shopid'),function(data)
		{
			$("#mapinfo").css('display','block');
			$('#mapinfo_content').html(data);
			
		});
	})
	//地图关闭
	$("#mapinfo_close").live("click",function()
	{
		$("#mapinfo").css('display','none');
		$("#mapinfo_content").html('');
	})
	//收藏管理
	$(".addshopfav").live("click",function()
	{
		$.get('index.php?m=fav&a=shopadd&shopid='+$(this).attr('shopid'));
		
		$(this).text('已加到首页');
	})
	
	$(".delshopfav").live("click",function()
	{
		$.get('index.php?m=fav&a=shopdel&shopid='+$(this).attr('shopid'));
		$(this).text('已移除');
		
	})
	
	//设置站点
	$("#setsites").bind("mouseleave",function()
	{
		$(this).hide();
	});
	setTimeout("getmsg()",3000);
});
//获取消息
function getmsg()
{
	$.get("index.php?m=ajax&a=getmsg",function(data)
	{
		if(data)
		{
			$("#getmsg").html("("+data+")"); 
			
		}else
		{
			$("#getmsg").html("");
			
		}
	})
}
//获取购物车总价格
function changeprice()
{
	$.get("index.php?m=shopcar&a=totalmoney",function(data)
	{
		$("#totalmoney").html(data);
	});
}
//倒计时
function changelefttime()
{
	$(".lefttime").each( function()
	{
		$(this).html(lefttime(parseInt($(this).attr("endtime"))- parseInt(new Date().getTime()/1000)))
	});
}

function lefttime(time)
{
	if(time<=0)
	{
		return '团购活动结束';
	}
	//天数
	day=time/86400;
	day=day>=1?parseInt(day):0;
	//小时
	hour=(time-86400*day)/3600;
	hour=hour>=1?parseInt(hour):0;
	//分
	minute=(time-86400*day-3600*hour)/60;
	minute=minute>=1?parseInt(minute):0;
	//秒
	second=(time-86400*day-3600*hour-minute*60);
	second=second>0?second:0;
	var str='还有'+day+'天'+hour+'小时'+minute+'分'+second+'秒';
	return str;	
}
