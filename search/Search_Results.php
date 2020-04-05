<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR?xhtmll/DTD/xhtmll-strict.dtd">

<html xmlns="http://ww.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<body>
		<!--	Given a string of text, scan database for job titles that contain the string.-->
		<?php
			function failure($P){
				$F[0] = 0;
				$i = 1;
				$j = 0;
				$m = strlen($P);
				while($i<$m){
					if($P[$i] == $P[$j]){
					$F[$i] = $j + 1;
					$i = $i + 1;
					$j = $j + 1;
					}
					elseif($j > 0){
					$j = $F[$j-1];
					}
					else{
					$F[$i] = 0;
					$i = $i + 1;
					}
				}
				return $F;
			}
	
			function kmp($T,$P){
				$i=0;
				$j=0;
				$F = failure($P);
				$n = strlen($T);
				$m = strlen($P);
				while($i < $n){
					if($T[$i] == $P[$j]){
						if ($j==$m-1){
						return $i-$j;
						}
						else{
						$i=$i+1;
						$j=$j+1;
						}
					}
					else{
						if($j>0){
						$j = $F[$j-1];
						}
						else{
						$i=$i+1;
						}
					}
				}
			return -1;
			}
	
	
		$P=$_GET["search"];
		$T="We like to eat lots of pie.";
		$K=kmp($T,$P);
		$match=substr($T,$K,strlen($P));
	
		echo "<br/>$match,$K";
		?>
	</body>
</html>
