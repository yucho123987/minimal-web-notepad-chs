<?php
require_once 'modules/protect.php';
Protect\with('modules/protect_form.php', '在这修改密码');
?>
<!DOCTYPE html>
<html>
<head>
<?php

    //  configuration settings, edit settings in config.php as appropriate
   include('config.php');

    // from https://stackoverflow.com/questions/16765158/date-it-is-not-safe-to-rely-on-the-systems-timezone-settings
    if (! ini_get('date.timezone')) {
        date_default_timezone_set('GMT');
    }

    // Directory to save user documents.
    // $data_directory = '_notes'; defined in config.php

    $serverTimezone = "";
    if (ini_get('date.timezone')) {
        $serverTimezone = ' TZ: ' . ini_get('date.timezone');
    }

    function ago($time)
    {
        //https://css-tricks.com/snippets/php/time-ago-function/
        $periods = array("秒", "分钟", "小时", "天", "周", "月", "年");
        $lengths = array("60","60","24","7","4.35","12");

        $now = time();

        $difference     = $now - $time;
        $tense         = "前";

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        if ($difference != 1) {
            $periods[$j].= "";
        }

        return "$difference $periods[$j]$tense ";
    }

    function human_filesize($bytes, $decimals = 2)
    {
        // from user contribs on php filesize page
        $sz = 'bkMGTP';
        $szWords = array('b','Kb','Mb','Gb','Tb','Pb');
        $factor = floor((strlen($bytes) - 1) / 3);
        if (@$sz[$factor] == 'b') {
            $decimals = 0;
        }
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' .@$szWords[$factor];
    }

    ?>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>笔记列表</title>
	<script src="js/notelist.min.js"></script>
	<link rel="shortcut icon" href="favicon.ico" />
	<style>
	body {
		margin-left:20px; margin-top:20px; font-family: sans-serif;}
	th {
		display: table-cell;
		vertical-align: inherit;
		font-weight: bold;
		text-align: left;
	}
	th, td {
		padding-right: 10px;
	}
</style>
</head>
<body>
<a href="<?php print $base_url; ?>">新建笔记</a><br><br>
<table id="filterTable">
	<tr>
	<th><input type="text" id="filterNotes" onkeyup="filterTable()" placeholder="通过笔记标题筛选.." style="background:transparent;border:none;"></th>
	</tr>
</table>
<table id="notelistTable">
	<th onclick="sortTable(0)">名称</th>
	<th onclick="sortTable(1)"><small>上次编辑时间</small></th>
	<th><small>文件大小</small></th>
	</tr>
	<?php
    $files = array_diff(scandir($data_directory), array('.', '..','.htaccess'));
    $counter=0;
    $counterMax=500; //max number of notes to show
    foreach ($files as &$value) {
        if ($counter > $counterMax) {
            echo "<tr><td>已达到列表允许的最大笔记数量 (". $counterMax . ")</td><td></td>";
            break; //have a max number of notes to show
        }
        echo "<tr><td style='padding-right: 20px;'><a href='".$value."' >".$value . "</a> </td>";
        echo "<td><small>" . ago(filemtime($data_directory.'/'.$value)) . "</small></td>";
        echo "<td><small>" . human_filesize(filesize($data_directory.'/'.$value)) . "</small>" . PHP_EOL;
        $counter++;
    }
    ?>
</table>
</body>
</html>
