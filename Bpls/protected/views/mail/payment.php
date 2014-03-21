<html>
        <head>
        </head>
        <body>
            Dear <?php 
             echo $model->user->full_name;
             ?>,
                <br/><br/>
                <p>
                You made a payment of fees for your business  <b><?php echo $model->name." - ".$model->trade_name ; ?></b>. We only need to review your business details again before approving your business permit and give you an issuance of it. You will receive an email after your request has been approved. Thank you.
                </p>
        </body>
</html>
