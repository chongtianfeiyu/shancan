<ul class="nav nav-tabs">
<li <?php if ($_GET['a'] == 'index'): ?> class="active"<?php endif; ?>><a href="index.php?m=shop&shopid=<?php echo $_GET['shopid']; ?>">������ҳ</a></li>
<li <?php if ($_GET['a'] == 'comment'): ?> class="active"<?php endif; ?>><a href="index.php?m=shop&a=comment&shopid=<?php echo $_GET['shopid']; ?>">��������</a></li>
<li <?php if ($_GET['a'] == 'guest'): ?>class="active"<?php endif; ?>><a href="index.php?m=shop&a=guest&shopid=<?php echo $_GET['shopid']; ?>">��������</a></li>
<li <?php if ($_GET['a'] == 'neworder'): ?>class="active"<?php endif; ?>><a href="index.php?m=shop&a=neworder&shopid=<?php echo $_GET['shopid']; ?>">���¶���</a></li>
</ul>