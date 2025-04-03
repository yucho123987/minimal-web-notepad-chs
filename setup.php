<?php

// this file should be deleted after setup
// it will show your notes directory path on screen
// this is very simple setup file and is not intended
// to deal with all scenarios

include('config.php');

// test the folder exists, if it doesn't then create it
if (makeDir($data_directory)) {
	echo $data_directory . ' 文件夹正常<br>';
	
	// make sure there is an .htaccess file there
	// if there is not then create one
	$file = $data_directory .'/.htaccess';
	if (makehtaccess($file)) { echo '已成功在数据目录 ' . $data_directory. ' 下创建 htaccess 文件<br>'; } else { echo '.htaccess 文件已存在于数据目录 ' . $data_directory .' 下<br>'; } 	
} else {
	echo $data_directory . ' 不存在且无法被创建<br>';
}

// based on https://raw.githubusercontent.com/bolt/htaccess_tester/master/htaccess_tester.php
if (is_readable(__DIR__.'/.htaccess') ) {

    echo "<p>.htaccess 文件已存在于此目录且对 web 服务器可读。以下是该文件的内容，其应与仓库中的文件相同。</p>\n<pre>";
    echo file_get_contents(__DIR__.'/.htaccess');
    echo "</pre>";

}  else {

    echo "<p><strong>错误：</strong> .htaccess 文件不存在，或其对 web 服务器不可读。<br><br>请确保 .htaccess 存在且和仓库中的内容一致，并使其对 web 服务器可读。</p>";
    die();

}

// https://stackoverflow.com/questions/109188/how-do-i-check-if-a-directory-is-writeable-in-php
if ( ! is_writable(dirname($data_directory))) {
    echo dirname($data_directory) . ' 目录必须可写，请将目录权限设置为 0744 或 0755<br>';
} else {
    echo $data_directory . ' 目录可写<br>';
}
    

// https://stackoverflow.com/questions/2303372/create-a-folder-if-it-doesnt-already-exist
function makeDir($path)
{
    return is_dir($path) || mkdir($path, 0744);
}

// https://stackoverflow.com/questions/20580017/php-create-a-file-if-not-exists
function makehtaccess($file)
{
	if(!is_file($file)){
		$contents = 'Deny from all';  // deny all
		return file_put_contents($file, $contents);  // save content to the file
	}
}
?>
