<?php
/**
 * Created by IntelliJ IDEA.
 * User: suhongtang
 * Date: 5/5/24
 * Time: 12:18 AM
 */
?>

<!DOCTYPE html>
<!--STATUS OK-->
<html>

<head>
    <meta charset="gbk">
    <title>运营白名单MIS</title>
    <link rel="shortcut icon" href="http://static.tieba.baidu.com/tb/favicon.ico" />
    <?php
    echo HTML::combocss(array(
        'devplatcommon/lib/bootstrap/bootstrap.css',
        'devplatcommon/style/bootstrap_override.css',

        //内部平台自己angular库的css
        'devplatcommon/js/innerplatform/innerplatform.css',

        // 加载当前应用的静态下的css（在fis-conf里用正则将对应目录下的所有css合并之后的文件）
        'mis/channel_manager/channel_manager.css'
    ));
    ?>
    <?= HTML::getCss() ?>

    <?php
    echo HTML::combojs(array(
        'devplatcommon/lib/jquery/jquery.js',
        'devplatcommon/lib/require/require.js'
    ));
    echo HTML::combojs(array(
        'devplatcommon/lib/angular/angular.js',
        'devplatcommon/lib/angular/angular-resource.js',
        'devplatcommon/lib/angular/angular-route.js',

        /*
        * angular-ui-bootstrap组件
        * 提供了基本的bootstrap常用组件，如tab、分页、tooltip、时间选择、typeahead等等
        * 使用文档参见：http://angular-ui.github.io/bootstrap
        */
        'devplatcommon/lib/angular/ui-bootstrap.js',

        'devplatcommon/js/ng_common/ng_common.js',
        'devplatcommon/lib/bootstrap/bootstrap.js',
    ));
    ?>
</head>
<body>
<?php
/*
 * todo: 如果需要加header、footer等各页面统一的东西，在ng-view外直接写即可
 *
 * 不过其实后面的header与footer应该抽出指令在innerplatform库里，直接在这里用指令调用
 * 目前来不及搞了，后面看吧@todo
 */
?>
<div class="container" id="operator">
    <ng-view>
        <div class="container">
            <div class="well">页面加载中...</div>
        </div>
    </ng-view>

    <div class="footer">
        <p>&copy;运营白名单</p>
    </div>

</div>
</body>

<?php
// 用于启动angular应用
// todo: @change 改为自己应用的启动app文件

echo HTML::js('operate_white/app.js', 'mis');
?>

<?php
/**
 * 如下代码用将由框架负责处理js资源加载到页面
 */
?>
<!-- [!MARK][DO NOT DEL]IMPORTANT LOGI --
<?= HTML::getScript('important'); ?>
<?= HTML::getJs(); ?>
<!-- [!MARK][DO NOT DEL]NORMAL LOGIC -->
<?= HTML::getScript('normal'); ?>
<!-- [!MARK][DO NOT DEL]OPTIONAL LOGIC -->
<?= HTML::getScript('optional'); ?>
</html>
