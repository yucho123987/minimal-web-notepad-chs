<link rel="stylesheet" type="text/css" href="modules/css/modal.min.css">
<div class="modal_password hidden" id="password_modal" style="hidden">
	<div class="modal-content">
		<span class="close-button_password">&times;</span>
		<br>为此笔记设置密码<br>
		<span id="inputboxLocation"></span><button class="submit" id="submitpwd" onclick="submitPassword();">设置</button><br>
		<input type="checkbox" id="allowReadOnlyView" name="allowReadOnlyView" value="1" title="允许不输入密码即可查看笔记内容"> 无密码查看<br>
		<span id="removePassword" style="display:none">
				<br><a onclick='passwordRemove();'>Remove password</a>
				<input type="hidden" id="hdnRemovePassword" name="hdnRemovePassword" value=""><br>
		</span>
		<span id="pwdMessage" style="color: red;"><br></span>
		<br><a onclick='window.open("passwordHelp.html");'>关于密码保护的信息</a>
	</div>
</div>
