<?php echo $this->fetch('lib/header.html'); ?>
<div class="row">
<div class="span8">
<h2>登录<small>或者<a href="index.php?m=user&a=reg">注册</a></small></h2>
<form action="index.php?m=user&a=logindb" method="post" class="account_form">
			<table class="table table-bordered">
				<tbody>
                <tr><th></th>
                <td>
                <script language="javascript" src="js/sinalogin.js"></script>
				<script language="javascript" src="js/qqlogin.js"></script>
                <img src="images/sina_login.png" onclick="sinalogin()" /> <img src="images/qq_login.png" onclick="qqlogin()" /></td>
                </tr>
                <tr id="username-field">
					<th><label for="username">用户名</label></th>
					<td>
						<input tabindex="1" type="text" name="username" id="username" autocomplete="off"  style="height:30px;" value="">
						<div class="hint">输入用户名</div>
					</td>
				</tr>
				<tr id="password-field">
					<th><label for="password">密码</label></th>
					<td>
						<input tabindex="2" type="password" name="password" id="password" autocomplete="off"  style="height:30px;"  class="text" value="">
						<div class="hint"><a href="index.php?m=user&a=findpwd" id="forgot_password">忘记密码？</a></div></td>
				</tr>
				<tr id="signin-field">
					<th></th>
					<td>
					<input tabindex="3" type="submit" id="signin" class="btn" value="登录">
					</td>
				</tr>
			</tbody></table>
			<input type="hidden" name="remember" id="remember" value="true">
		</form>

</div>
<div class="span4">
<h2>还没有口福网帐号？</h2>
<table class="table table-bordered"><tr><td>
 >> <a href="index.php?m=user&a=reg">立即注册，仅需30秒</a>
 </td>
 </tr>
 </table>
</div>
</div>
<?php echo $this->fetch('lib/footer.html'); ?>