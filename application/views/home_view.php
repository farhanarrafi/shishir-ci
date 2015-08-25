
<div class="container">
	
	<div class="jumbotron">
		<div class="container">
<?php
             	if(isset($result)) {
                    $i = 0;
                    $prefix = '<div class="row">';
                    $suffix = '</div>';
                    
                    echo $prefix;
                    foreach ($result as $row) {
                        
                        if($i%4==0) {
                            echo $suffix;
                            echo $prefix;
                        }
                        $i++;
                        $imgSrc = base_url().'asset/uploads/'.$row->ImageSource;
                        echo '<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">';
                            echo '<div class="thumbnail">';
                                echo '<a href="'.$imgSrc.'"><img src="'.$imgSrc.'" alt="'.$row->ProductName.'"></a>';
                                echo '<div class="caption">';
                                    echo '<p>'.$row->ProductName.'</p>';
                                    echo '<p>'.$row->Description.'</p>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                           
                        
                    }
                    echo $suffix;
             	}                            
                        
?>
		</div>
	</div>

