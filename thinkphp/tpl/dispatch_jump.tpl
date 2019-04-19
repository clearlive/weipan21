{__NOLAYOUT__}<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>信息提示</title>

  <link href="/static/admin/gaiban/css/style.css" rel="stylesheet">
  <link href="/static/admin/gaiban/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="error-page">

<section>
    <div class="container ">

        <section class="error-wrapper text-center" style="margin-top: 150px;">
          <h1><img alt="" src="/static/admin/gaiban/images/xz-error.png"></h1>
			<?php switch ($code) {?>
           <?php case 1:?>
            <h2></h2>
          
            <?php break;?>
                <?php case 0:?>
          
          			<h2></h2>

            <?php break;?>
            <?php } ?>
          
          
            <h3><?php echo(strip_tags($msg));?></h3>
            <h3 class="nrml-txt">页面正在跳转…… <a id="href"  href="<?php echo($url);?>">点击跳转</a>等待时间：<b id="wait"><?php echo($wait);?></b></h3>
        </section>

    </div>
  <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</section>
</body>  
</html>
<!-- 
<body>
    <div class="system-message">
        <?php switch ($code) {?>
            <?php case 1:?>
            <h1>:)</h1>
            <p class="success"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
            <?php case 0:?>
            <h1>:(</h1>
            <p class="error"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
        <?php } ?>
        <p class="detail"></p>
        <p class="jump">
            页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
        </p>
    </div>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html> -->
