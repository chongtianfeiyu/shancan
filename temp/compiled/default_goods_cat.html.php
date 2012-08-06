<?php echo $this->fetch('lib/header.html'); ?>
<div class="row">
<div class="span9">
<div class="breadcrumb"  >商品列表</div>
<ul class="thumbnails">
<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
  <li class="span3">
    <div class="thumbnail">
      <a href="index.php?m=goods&a=detail&id=<?php echo $this->_var['goods']['id']; ?>"><img src="<?php echo $this->_var['goods']['thumb_img']; ?>" alt=""></a>
      <h5><a href="index.php?m=goods&a=detail&id=<?php echo $this->_var['goods']['id']; ?>"><?php echo $this->_var['goods']['title']; ?></a></h5>
      <p> 市场价格：<?php echo $this->_var['goods']['price']; ?>元 兑换积分：<?php echo $this->_var['goods']['grade']; ?>  <?php if ($this->_var['g']['grade'] <= $this->_var['usegrade']): ?><a href="index.php?m=goods&a=order&id=<?php echo $this->_var['goods']['id']; ?>" target="_blank" >兑换</a><?php endif; ?></p>
    </div>
  </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<div ><?php echo $this->_var['pagelist']; ?></div>

</div>
<div class="span3">
<div class="accordion-group">
<div class="accordion-heading">
<a href="JavaScript:;" class="accordion-toggle f14"><?php if ($this->_var['catrs']): ?><?php echo $this->_var['catrs']['cname']; ?><?php else: ?>商品分类<?php endif; ?></a>
</div>
<div class="accordion-inner">
<ul class="unstyled">
<?php $_from = $this->_var['goodscat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
<li><a href="index.php?m=goods&a=cat&catid=<?php echo $this->_var['cat']['catid']; ?>"><?php echo $this->_var['cat']['cname']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>

<div class="accordion-group">
<div class="accordion-heading">
<a href="javascript:;" class="accordion-toggle f14">商品推荐</a>
</div>
<div class="accordion-inner">
<ol>
<?php $_from = $this->_var['recommendgoods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'g');if (count($_from)):
    foreach ($_from AS $this->_var['g']):
?>
<li><a href="index.php?m=goods&a=detail&id=<?php echo $this->_var['g']['id']; ?>"><?php echo $this->_var['g']['title']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</ol>
</div>

</div>

</div>
</div>

<?php echo $this->fetch('lib/footer.html'); ?>