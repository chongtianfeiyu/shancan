
// JavaScript Document
$(document).ready(function()
{
	//��֤�û��Ƿ��Ѵ���
	$("#ajax_username").bind("keyup",function()
	{
	$.get(
	"index.php?m=ajax&a=ckuser&username="+$("#ajax_username").val(),function(data)
	{
		
		if(data==1)
		{
			$("#ajax_username_res").html("�ܱ�Ǹ�����û��Ѵ��ڣ�");
		}else
		{
			$("#ajax_username_res").html("��ϲ�����û�������ע�ᣡ");
		}
	}
	)
	
	});
	//��֤�ǳ��Ƿ��Ѿ�����
	$("#ajax_nickname").bind("keyup",function()
	{
	$.get(
	"index.php?m=ajax&a=cknickname&nickname="+$("#ajax_nickname").val(),function(data)
	{
		
		if(data==1)
		{
			$("#ajax_nickname_res").html("�ܱ�Ǹ�����ǳ��Ѵ��ڣ�");
		}else
		{
			$("#ajax_nickname_res").html("��ϲ�����ǳƿ���ʹ�ã�");
		}
	}
	)
	
	});
	
	//��֤�����Ƿ�Ϸ�
	$("#ajax_ckemail").bind("keyup",function()
	{
	$.get(
	"index.php?m=ajax&a=ckemail&email="+$("#ajax_ckemail").val(),function(data)
	{
		
		if(data==1)
		{
			$("#ajax_ckemail_res").html("��ϲ�������ʽ��ȷ��");
		}else
		{
			$("#ajax_ckemail_res").html("�ܱ�Ǹ�������ʽ����ȷ��");
		}
	}
	)
	
	});
	
	//��֤��֤���Ƿ�Ϸ�
	$("#ajax_ckyzm").bind("keyup",function()
	{
		$.get("index.php?m=ajax&a=ckyzm&yzm="+$("#ajax_ckyzm").val(),function(data)
		{
			if(data==1)
		{
			$("#ajax_ckyzm_res").html("��֤����ȷ��");
		}else
		{
			$("#ajax_ckyzm_res").html("��֤�����");
		}
			
		});
		
	});
	//��֤�����Ƿ���ȷ
	$("#ajax_pwd1,#ajax_pwd2").bind("keyup",function()
	{
		p1=$("#ajax_pwd1").val();
		
		if(p1.length<4)
		{
			$("#ajax_pwd1_res").html('���볤��Ҫ>=4');
		}else
		{
			$("#ajax_pwd1_res").html('�������Ҫ��');
		}
		if(p1!=$("#ajax_pwd2").val())
		{
			$("#ajax_pwd2_res").html('�����������벻һ��');
		}else
		{
			$("#ajax_pwd2_res").html('�������Ҫ��');
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
	
	//���빺�ﳵ
	$(".addCart").live("click",function()
	{
		//�ж��Ƿ��Ѿ�����
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
	//�ӹ�������
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
	//��ͼ�ر�
	$("#mapinfo_close").live("click",function()
	{
		$("#mapinfo").css('display','none');
		$("#mapinfo_content").html('');
	})
	//�ղع���
	$(".addshopfav").live("click",function()
	{
		$.get('index.php?m=fav&a=shopadd&shopid='+$(this).attr('shopid'));
		
		$(this).text('�Ѽӵ���ҳ');
	})
	
	$(".delshopfav").live("click",function()
	{
		$.get('index.php?m=fav&a=shopdel&shopid='+$(this).attr('shopid'));
		$(this).text('���Ƴ�');
		
	})
	
	//����վ��
	$("#setsites").bind("mouseleave",function()
	{
		$(this).hide();
	});
	setTimeout("getmsg()",3000);
});
//��ȡ��Ϣ
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
//��ȡ���ﳵ�ܼ۸�
function changeprice()
{
	$.get("index.php?m=shopcar&a=totalmoney",function(data)
	{
		$("#totalmoney").html(data);
	});
}
//����ʱ
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
		return '�Ź������';
	}
	//����
	day=time/86400;
	day=day>=1?parseInt(day):0;
	//Сʱ
	hour=(time-86400*day)/3600;
	hour=hour>=1?parseInt(hour):0;
	//��
	minute=(time-86400*day-3600*hour)/60;
	minute=minute>=1?parseInt(minute):0;
	//��
	second=(time-86400*day-3600*hour-minute*60);
	second=second>0?second:0;
	var str='����'+day+'��'+hour+'Сʱ'+minute+'��'+second+'��';
	return str;	
}
