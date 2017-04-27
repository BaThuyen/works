<?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/bootstrap.min.css'); ?>

<?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/style.css'); ?>

<?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/baselayout.css'); ?>

<?php echo HTML::style('packages/jacopo/laravel-authentication-acl/css/fonts.css'); ?>

<?php echo HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'); ?>


<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i></h3>
                </div>

                <div class="panel-body">


                    <?php if( ! $templates->isEmpty() ): ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style='width:20%'>Template name</th>
                                <th style='width:60%'>Template content</th>

                                <th style='width:40%'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>

                                <td><?php echo $template->template_name; ?></td>
                                <td><?php echo $template->template_content; ?></td>

                                <td>
                                    <button class="btn btn-link" result="<?php echo $template->template_content; ?>" onclick="return getTemplate(this)"><i class="fa fa-check fa-2x"></i></button>
                                    <button class="btn btn-link"><i class="fa fa-trash-o fa-2x"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                    <?php endif; ?>



                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function getTemplate(sender) {
        try {
            window.opener.HandlePopupResult(sender.getAttribute("result"));
            //tinymce.activeEditor.execCommand('mceInsertContent', false, sender.getAttribute("result"));
        } catch (err) {

        }
        this.close();
        return false;
    }
</script>
