<ul class="nav nav-tabs">
<li <?php if ($_GET['a'] == 'index'): ?> class="active"<?php endif; ?>><a href="index.php?m=shop&shopid=<?php echo $_GET['shopid']; ?>">店铺首页</a></li>
<li <?php if ($_GET['a'] == 'comment'): ?> class="active"<?php endif; ?>><a href="index.php?m=shop&a=comment&shopid=<?php echo $_GET['shopid']; ?>">店铺评论</a></li>
<li <?php if ($_GET['a'] == 'guest'): ?>class="active"<?php endif; ?>><a href="index.php?m=shop&a=guest&shopid=<?php echo $_GET['shopid']; ?>">店铺留言</a></li>
<li <?php if ($_GET['a'] == 'neworder'): ?>class="active"<?php endif; ?>><a href="index.php?m=shop&a=neworder&shopid=<?php echo $_GET['shopid']; ?>">最新订单</a></li>
</ul>