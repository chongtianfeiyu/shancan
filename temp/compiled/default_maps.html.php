<?php echo $this->fetch('lib/header.html'); ?>

<!--�̵���Ϣajax����-->
 <div id="mapinfo" style="position:absolute; z-index:10000; top:120px; width:440px; height:400px; display:none; background-color:#FFF; left:300px;">
 <div id="mapinfo_nav" style="display:block;background-color:#CCC; width:100%; height:30px;background-color:#CCC; "><span id="mapinfo_title" style="height:30px; line-height:30px; padding-left:6px; display:block; width:200px; float:left; font-weight:600;">::������Ϣ</span> <span id="mapinfo_close" style="height:30px; line-height:30px; display:block; cursor:pointer; padding-right:6px; padding-left:6px; float:right; background-color:#CDC2BE;">�ر�</span></div>
 <div id="mapinfo_content"></div>
 </div>
<!--�̵���Ϣajax���ý���-->
<div class="row">
<div class="span9">
<div id="map_canvas" style="width:100%; height:600px;"></div>
</div>
<div class="span3 ">
<p>
<div class="btn-group">
<div class="btn">��ͼ�ϵĲ���</div>
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    �ȵ�����
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <?php $_from = $this->_var['hotarea']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
    <li><a href="javascript:;" onclick="setbound(<?php echo $this->_var['t']['lat']; ?>,<?php echo $this->_var['t']['lng']; ?>)"><?php echo $this->_var['t']['title']; ?></a></li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
</div>
</p>
<form class="form-inline">
<input type="text" id="mapshopname" value="" style="width:100px; height:30px;" /> 
<input type="button" id="mapsearchshop" class="btn btn-success" value="����" /> 
<input type="button" id="mapsearchshopclear" class="btn btn-warning" value="���" />
</form>


<div class="well">
<ol id="restaurant_search_result" class="" ></ol>

</div>
<div  id="pagelist"></div>
</div>

</div>
                
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<script type="text/javascript">
var markersArray=[];
var map;
var start=false;
var picfirst=0;
var test;
var infowindow;
var times=0;
var mdata;
var bounds;
var center;
var shopname='';
map = new BMap.Map("map_canvas");
map.enableScrollWheelZoom();
<?php if ($_GET['center']): ?>
map.centerAndZoom(new BMap.Point(<?php echo $_GET['center']; ?>), 14);
<?php else: ?>
map.centerAndZoom(new BMap.Point(<?php if ($this->_var['site']['lat']): ?><?php echo $this->_var['site']['lat']; ?>,<?php echo $this->_var['site']['lng']; ?><?php else: ?>118.18045211417393,24.481007243304155 <?php endif; ?>), 14);
<?php endif; ?>
map.addEventListener("zoomend", function(){
		b=map.getBounds();
		bounds=b.getSouthWest().lat+","+b.getSouthWest().lng+","+b.getNorthEast().lat+","+b.getNorthEast().lng;
		center=map.getCenter().lat+","+map.getCenter().lng;
		markfun(); 
});


map.addEventListener("dragend", function(){
		b=map.getBounds();
		bounds=b.getSouthWest().lat+","+b.getSouthWest().lng+","+b.getNorthEast().lat+","+b.getNorthEast().lng;
		center=map.getCenter().lng+","+map.getCenter().lat;
		markfun(); 
});



b=map.getBounds();
bounds=b.getSouthWest().lat+","+b.getSouthWest().lng+","+b.getNorthEast().lat+","+b.getNorthEast().lng;
center=map.getCenter().lat+","+map.getCenter().lng;
markfun(); 

$("#mapsearchshopclear").click(function()
{
	shopname="";
	$("#mapshopname").val("");
	b=map.getBounds();
	bounds=b.getSouthWest().lat+","+b.getSouthWest().lng+","+b.getNorthEast().lat+","+b.getNorthEast().lng;
	center=map.getCenter().lng+","+map.getCenter().lat;
	markfun(); 
});

$("#mapsearchshop").click(function()
{
	shopname=$("#mapshopname").val();
	b=map.getBounds();
	bounds=b.getSouthWest().lat+","+b.getSouthWest().lng+","+b.getNorthEast().lat+","+b.getNorthEast().lng;
	center=map.getCenter().lng+","+map.getCenter().lat;
	markfun(); 
});


function setbound(lat,lng)
{
	center=lat+","+lng;
	map.setCenter(new BMap.Point(lat,lng));
	b=map.getBounds();
	bounds=b.getSouthWest().lat+","+b.getSouthWest().lng+","+b.getNorthEast().lat+","+b.getNorthEast().lng;
	markfun(); 
}
//����¼�����
function markfun(page)
{
		
		deleteOverlays();
		markersArray.length=0;
		
		times=0;
		if(map.getZoom()>4)
		{
			
			url='index.php?m=maps&a=maps&bounds='+bounds+'&center='+center+'&shopname='+encodeURI(shopname);
			if(page)
			{
				url=url+'&page='+page;
			}
			$.getJSON(url,function(data)
			 {
				
				if(data && times==0)
				{
					mdata=data['list'];
					$("#restaurant_search_result").html("");
					times=1;
					var dlist=data['list'];
					for(i=0;i<dlist.length;i++)
					{
						
						addMarker(new BMap.Point(dlist[i].lat, dlist[i].lng),i);
						$("#restaurant_search_result").append("<li id='restaurant_"+dlist[i].shopid+"' class=' restaurant"+dlist[i].shopid+"'><a class=' triggerAjax restaurants_item' onClick=\"trigwindow("+i+")\"  id='restaurant_bubble_trigger_"+dlist[i].shopid+"' href='javascript:;' shopid='"+dlist[i].shopid+"'>"+dlist[i].shopname+"</a></li>");
						
					}
					if(data['pagelist'])
					{
						$("#pagelist").html(data['pagelist']);
					}else
					{
						$("#pagelist").html("");
					}
					showOverlays(data['list']);
					
				}else
				{
					$("#pagelist").html("");
					$("#restaurant_search_result").html("").append("<span>��ǰ������������</span>");
				}
			  });
		 
		  
		}else
		{
			$("#pagelist").html("");
			$("#restaurant_search_result").html("").append("<span>��ͼ���ż������</span>");
		}
	  	
}
  
//��ǵ�ͼ
function addMarker(location,number) {
 var myIcon = new BMap.Icon( "images/map_icon.png",new BMap.Size(18, 22),
  {
     offset: new BMap.Size(10, 25),
  imageOffset: new BMap.Size(-40,0)
  });
  

	marker = new BMap.Marker(location,{title:mdata[number].shopname,icon:myIcon}); 
	markersArray.push(marker);
}
//��ʾ��ͼ
function showOverlays(data) {
  if (markersArray) {
    for (i in markersArray) {
		map.addOverlay(markersArray[i]); 
	  windowinfo(i);
    }
  }
}


//ɾ�����

function deleteOverlays() {
map.clearOverlays();
}
//��Ϣ����
function windowinfo( number) {

var m=markersArray[number];
  	m.addEventListener( 'click', function() {
		var content;
		
		 
			
		$.get('index.php?m=shop&ajax=1&shopid='+mdata[number].shopid,function(data)
		{
			
		
			
			var infoWindow = new BMap.InfoWindow(data);
			  m.openInfoWindow(infoWindow);
			
		});
	
   
  });
  
}  
function trigwindow(i)
{
	var s=markersArray[i];
	$.get('index.php?m=shop&ajax=1&shopid='+mdata[i].shopid,function(data)
		{
			/*Բ������
			 point = new BMap.Point(mdata[i].lat, mdata[i].lng);
			 circle = new BMap.Circle(point,500);
			map.addOverlay(circle);		
			*/	
			var infoWindow = new BMap.InfoWindow(data);
			  s.openInfoWindow(infoWindow);
			
		});
	
	
}

</script>
<?php echo $this->fetch('lib/footer.html'); ?>