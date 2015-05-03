<head>
<h1>BBC's Vietnamese Recipes</h1>
<p class="ptitle">"Try a fresh and fragrant approach to Asian cooking" - 5-star recipes from BBC Good Foods</p>
<br/>
<style type="text/css">
article {background-color:#F3F3F3;border-radius: 10px;-moz-border-radius: 10px;padding:20px;height:120; border-bottom:dashed 1px #CCC}
img{float:left;border:0px;padding-right: 10px;padding-bottom: 12px; width:130; height:125;}
body{width:98%;font-family: verdana,tahamo,sans-serif;font-size:12px;}
h2 { height:10px}
a{text-decoration:none;color:#036; vertical-align:top;font-size:16px}
p {font-size:16px; color:#666; font-family:Georgia, "Times New Roman", Times, serif; font-style:italic}
hr{border-top:2px dotted #ccc;}
ul, label {
    display:none;
}
.rate-info {
    font-style: italic;
}
.field-items {
	color:#036;	
}
	
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<?php
include_once('simple_html_dom.php');

$geturl = $_GET["url"];
if(strlen($geturl) == 0) 
	$target_url = "http://www.bbcgoodfood.com/recipes/collection/vietnamese";
else $target_url = "http://www.bbcgoodfood.com" . $geturl;

PrintPage($target_url);

function PrintPage($target_url) {
$html = new simple_html_dom();
$html->load_file($target_url);

foreach($html->find('article[class=node-recipe]') as $post)
{
	if(!empty($post))
    {
        $iRatingValue = $post->find('span meta',0)->itemprop;
        $cRatingValue = (float)$post->find('span meta',0)->content;
        if ($cRatingValue >= 4.375) {
                echo $post;
        }
    }
}

$next = "http://www.bbcgoodfood.com" . $html->find(".pager-next a",0)->href;
if(strlen($next) > 30) {
	PrintPage($next);
	}
}
 
?>
<script>
$(".promo-box").parent().remove();
jQuery("a").on("click",function(elm) {
elm.preventDefault();
window.open("http://www.bbcgoodfood.com" + jQuery(this).attr("href"), '_blank');
});
</script>