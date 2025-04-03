
# minimal-web-notepad-chs

这是 [domOrielton/minimal-web-notepad](https://github.com/domOrielton/minimal-web-notepad) 的克隆仓库，此仓库对原项目中的文本进行了简体中文汉化。
![edit screenshot](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_edit.png)

演示地址：https://notechs.rf.gd/

截图
------------

**查看模式下的笔记**

![查看模式截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_view.png)

**兼容移动端设备的响应式菜单**

![移动端菜单截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_mobile_menu_expanded.png) ![移动端菜单截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_mobile_menu.png)

**Mono 字体**

![mono 显示截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_mono.png)

**密码保护**

![密码保护截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_password.png)

**受保护笔记的密码提示**

![密码提示截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_password_prompt.png)

“允许以只读模式查看” 链接仅会显示笔记文本，而不会显示其他内容

**用以复制内容到剪贴板的链接**

![复制链接截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_copy.png)

**笔记列表** - 一般只用于不公开的 URL，尽管该页面有密码保护

![笔记列表截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_notelist.png)

如果您不想显示笔记列表，那么请在 index.php 顶部将 $allow_noteslist 参数设置为 false，或者重命名为其他名称。笔记列表的密码位于 `notelist.php` 的顶部 - Protect\with('modules/protect_form.php', '在这修改密码');

**备选编辑页面**

还有另一种编辑视图，可通过在笔记 URL 后添加 ?simple 来访问，例如 /quick?simple。我个人认为此视图对于在手机上添加非常快速的笔记非常有用 - 它在页面顶部有一个小的编辑区域，当您输入文本并点击换行符时，它会将其添加到笔记中并将其移动到占据页面其余部分的视图。此视图部分将 URL 显示为可点击链接。您无法在此视图上设置密码，但它确实遵守密码。

![复制截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_simple.png)

安装
------------

只要启用 mod_rewrite 并且允许 Web 服务器写入 `_notes` 数据目录，就不需要任何配置。此数据目录已在 `config.php` 被设置，因此如果您想将其更改为原始 pereorga/minimalist-web-notepad 版本使用的文件夹，请在那里进行更改。所有笔记都存储为文本文件，因此一台运行着 Apache 或 Nginx 的服务器就足矣，不需要数据库。

如果笔记未被保存，请检查 `_notes` 目录的权限 - 其应为 0755 或 744。

![权限截图](https://raw.github.com/domOrielton/minimal-web-notepad/screenshots/mn_permissions.png)

您也可以使用 `setup.php` 页面来检查 `_notes` 文件夹是否存在并可写。如果您在保存笔记时遇到问题，可能需要删除 `_notes` 文件夹并转到 `setup.php` 页面以创建该文件夹。若一切正常，则您可以删除 `setup.php` 文件（只要您愿意）。

在某些情况下，需要将位于 `config.php` 中的 $base_url 变量替换为您安装时的硬编码 URL 路径。倘若如此，仅需将 `config.php` 中以  `$base_url = dirname('//'` 开头的那行替换为 `$base_url ='http://actualURL.com/notes'`
请将 actualURL.com/notes 替换为您的安装URL。

### 在 Apache 上运行

您可能需要在您的网站配置中启用并设置 `.htaccess` 文件。参见《[如何为 Apache 配置 mod_rewrite](https://www.digitalocean.com/community/tutorials/how-to-set-up-mod_rewrite-for-apache-on-ubuntu-14-04)》。

## 在 nginx 上运行

在 Nginx 上，您需要确保 nginx.conf 被正确配置，以保证此项目以能预期情况运行。
请检查 nginx.conf.example 文件或 [无密码查看的问题](https://github.com/domOrielton/minimal-web-notepad/issues/4)。感谢 [eonegh](https://github.com/eonegh)  提供的示例文件。
