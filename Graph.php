<?php
# ------- The graph values in the form of associative array
define('DB_SERVER','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'test'); //database name  
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if($db)
{
    $sql="Select monthname(sdate) as Month,sum(price) as Price from sales group by year(sdate),month(sdate) order by year(sdate),month(sdate)";
    $result=mysqli_query($db,$sql);
    $rowcount=mysqli_num_rows($result);
    if($rowcount)
        while ($row = mysqli_fetch_array($result)) 
            $values[substr($row['Month'],0,3)]=$row['Price'];
}
/*                
$values=array(
    "Jan" => 120,
    "Feb" => 130,
    "Mar" => 215,
    "Apr" => 81,
    "May" => 310,
    "Jun" => 110,
    "Jul" => 190,
    "Aug" => 175,
    "Sep" => 390,
    "Oct" => 286,
    "Nov" => 150,
    "Dec" => 196
);
*/
$img_width=450;
$img_height=300; 
$margins=20;

# ---- Find the size of graph by substracting the size of borders
$graph_width=$img_width - $margins * 2;
$graph_height=$img_height - $margins * 2; 
$img=imagecreate($img_width,$img_height);

$bar_width=20;
$total_bars=count($values);
$gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);

# -------  Define Colors ----------------
$bar_color=imagecolorallocate($img,0,128,0);
$background_color=imagecolorallocate($img,240,240,255);
$border_color=imagecolorallocate($img,200,200,200);
$line_color=imagecolorallocate($img,220,220,220);
$write_color=imagecolorallocate($img,255,0,0);

# ------ Create the border around the graph ------
imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);

# ------- Max value is required to adjust the scale -------
$max_value=max($values);
$ratio= $graph_height/$max_value;

# -------- Create scale and draw horizontal lines  --------
$horizontal_lines=20;
$horizontal_gap=$graph_height/$horizontal_lines;

for($i=1;$i<=$horizontal_lines;$i++)
{
    $y=$img_height - $margins - $horizontal_gap * $i ;
    imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
    $v=intval($horizontal_gap * $i /$ratio);
    imagestring($img,0,4,$y-4,$v,$write_color);
}

# ----------- Draw the bars here ------
for($i=0;$i<$total_bars; $i++)
{ 
    # ------ Extract key and value pair from the current pointer position
    list($key,$value)=each($values); 
    $x1= $margins + $gap + $i * ($gap+$bar_width) ;
    $x2= $x1 + $bar_width; 
    $y1=$margins +$graph_height- intval($value * $ratio) ;
    $y2=$img_height-$margins;
    imagestring($img,0,$x1+3,$y1-10,$value,$write_color);
    imagestring($img,0,$x1+3,$img_height-15,$key,$write_color);        
    imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
}
header("Content-type:image/png");
imagepng($img); 
?>
