<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Standar Costing</title>

<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/reset.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/grid.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/style.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/messages.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/forms.css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>assets/css/uploadfile.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/themes/gray/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/themes/icon.css">

<!-- constant -->
<script type="text/javascript">
    var SITE_URL = '<?php echo base_url()?>';
</script>

<!-- easyui -->
<script type="text/javascript" src="<?php echo base_url()?>assets/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/jquery.easyui.min.js"></script>

<!-- js/app ini fungsi untuk meload javascript yang perlu diload tiap2 controller. -->
<?php if (isset($js_app)): foreach ($js_app as $js):?>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/app/<?php echo $js?>.js"></script>
<?php endforeach; endif; ?>

</head>
<body>
    <div id="wrapper">
        <header>
            <div class="container_8 clearfix">
                <nav class="grid_7">
                    <ul class="clearfix">                       						
						<li class="fr active">
						<a href="<?php echo site_url()?>">
							<?php
								$group_title = 'Dashboard';
								echo $group_title;
							?>
						</a>
						</li>
                    </ul>
                </nav>                
            </div>
        </header>
        
        