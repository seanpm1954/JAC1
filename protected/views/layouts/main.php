<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
<?php if(isset(Yii::app()->user->access)){
    $access=Yii::app()->user->access;
}else{
    $access=0;
}
  ?>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                //Co User Menu
                array('label'=>'Project Files', 'url'=>array('/projectFile/index'),'visible'=>( $access==4)),

				//Co Admin Menu
                array('label'=>'Project Files', 'url'=>array('/projectFile/index'),'visible'=>( $access==2)),
                array('label'=>'Uploads', 'url'=>array('/projectFile/create'),'visible'=>( $access==2)),

                //Site User Menu
                array('label'=>'Companies', 'url'=>array('/company/index'),'visible'=>( $access==3)),
                array('label'=>'Users', 'url'=>array('/user/index'),'visible'=>( $access==3)),
                array('label'=>'Projects', 'url'=>array('/project/index'),'visible'=>( $access==3)),
                array('label'=>'Project Files', 'url'=>array('/projectFile/index'),'visible'=>( $access==3)),
                array('label'=>'Uploads', 'url'=>array('/projectFile/create'),'visible'=>( $access==3)),

                //Site Admin menu
                array('label'=>'Companies', 'url'=>array('/company/index'),'visible'=>( $access==1)),
                array('label'=>'Users', 'url'=>array('/user/index'),'visible'=>( $access==1)),
                array('label'=>'Projects', 'url'=>array('/project/index'),'visible'=>( $access==1)),
                array('label'=>'Project Files', 'url'=>array('/projectFile/index'),'visible'=>( $access==1)),
                array('label'=>'Uploads', 'url'=>array('/projectFile/create'),'visible'=>( $access==1)),

                //All
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)

			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			//'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Network PC Pro's.<br/>
		All Rights Reserved.<br/>
<!--		--><?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
