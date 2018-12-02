
<?php
$image = $_FILES['image']['name'];
				$cnt = count($image);
				for ($i=0; $i<$cnt; $i++) 
				{ 
					$img = implode(',',$image);
					$tmp_name = $_FILES['image']['tmp_name'][$i];
					$newpath = 'uploaded/'.$_FILES['image']['name'][$i];

					move_uploaded_file($tmp_name,$newpath);
				}
?>