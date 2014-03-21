<html>
        <head>
        </head>
        <body>
            Dear <?php 
             echo $model->user->full_name;
             ?>,
                <br/><br/>The Business Permit for your business, <b><?php echo $model->name."- ".$model->trade_name; ?></b>, has been approved and issued. You can now download a copy of the signed business permit from the website or you can claim a copy from the municipal office.
        </body>
</html>
