<?php
	foreach ($templates as $key => $value) {
	?>
		<tr>
			<td><?php echo $value->title ?></td>
			<td><?php echo $value->report_type ?></td>
			<td><?php 
				$time=$value->time;
				$frequency=$value->frequency;

				switch ($value->cron_frequncy_type) {
					case 'daily':
						echo "Daily at ".$time;
						break;
					case 'weekly':
						$days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
						echo "Weekly on ".$days[$frequency]." at ".$time;
						break;
					case 'monthly':
						echo "Month on day ".$frequency ." at ".$time;
						break;
					case 'twice-month':
						echo "15th and 30th day of month at ".$time;
						break;			
				}
				?></td>
<!-- 			<td><?php echo $value->to ?></td> -->
			<td><?php echo $value->status==1?"Pause":"Active"; ?></td> 
			<td><a href="javascript:void(0)" data-id="<?php echo $value->id ?>" class="tempalte-edit btn btn-outline-dark alluserbtn">
				<svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0)">
            <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z"></path>
            </g>
            <defs>
            <clipPath id="clip0">
            <rect width="21" height="21" fill="white"></rect>
            </clipPath>
            </defs>
            </svg></a>  <a href="javascript:void(0)" data-id="<?php echo $value->id ?>" class="tempalte-delete btn btn-outline-dark alluserbtn"><svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z"></path>
            </svg></a></td>
		</tr>

	<?php }
 ?> 