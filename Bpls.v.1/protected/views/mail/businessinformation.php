<html>
        <head>
        </head>
        <body>
            Dear <?php 
             echo $model->user->full_name;
             ?>,
                <br/><br/>
                <p>
                The information on your business <b><?php echo $model->name." - ".$model->trade_name ; ?></b> has been verified by the Business Permit and Licensing Office. If you have not yet uploaded the required documents<i> (barangay clearance, zoning clearance, sanitary permit, occupancy permit, & fire safety permit) </i> needed for your business permit request, you may now do so for immediate processing of your request. Thank you.
                </p>
        </body>
</html>
