
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">


    <?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css'); ?>

    <?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css'); ?>

    <?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/baselayout.css'); ?>

    <?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css'); ?>

    <?php echo HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'); ?>

    <?php echo HTML::style('css/treeview.css'); ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <?php echo $__env->yieldContent('head_css'); ?>
    
</head>

    <body>
        <div id="overlay"></div>
        
        <?php echo $__env->make('laravel-authentication-acl::admin.layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        
        <div class="container-fluid">
            <?php echo $__env->yieldContent('container'); ?>
        </div>

        
        <?php echo $__env->yieldContent('before_footer_scripts'); ?>

        <?php echo HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/jquery-1.10.2.min.js'); ?>

        <?php echo HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/bootstrap.min.js'); ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <?php echo HTML::script('js/select2.js'); ?>

        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <?php echo HTML::script('js/tinymce.js'); ?>

        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
        <script>
            $('#lfm').filemanager('image');
        </script>
        <?php echo HTML::script('js/template.js'); ?>

        <?php echo $__env->yieldContent('footer_scripts'); ?>
        
    </body>
</html>