<html>
        <head>
        </head>
        <body>
            Dear <?php 
             echo $model->user->full_name;
             ?>,
                <br/><br/>
                 <p>
                The required documents <i>(barangay clearance, zoning clearance, sanitary permit, occupancy permit, & fire safety permit) </i> you uploaded for your business <b><?php echo $model->name." - ".$model->trade_name ; ?></b> has been approved by the Business Permit and Licensing Office.
                </p>
                <p>
                	An email will be sent to you if your business' fees assessment is done. You can then check the website for the breakdown of the assessment of fees. Thank you.
                </p>
                
        </body>
</html>
