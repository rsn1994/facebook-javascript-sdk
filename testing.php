<html>
<head>
    <title>HUMANIZE SITE</title>
</head>

<body>

<div id="fb-root"></div>

        <script>
        window.fbAsyncInit = function() {
                FB.init({
                appId: '352671538404366',
                status: true,
                cookie: true,
                xfbml: true
            });
        };

        // Load the SDK asynchronously
        (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
        }(document));

function login() {
            FB.login(function(response) {

            // handle the response
            console.log("Response goes here!");

            }, {scope: 'publish_pages' });
}

function photoToPage(url){
  FB.api('/911339048968241/photos', 'post', { url:'http://24.media.tumblr.com/tumblr_m1ttif5puW1qcrr0lo1_500.png', message:'first', access_token:'EAAFAwL3E3A4BAAfTMLIFepCFUhQmVCmlG9kZAZBqjFd1Bg2rZA8tZBX5z2CwUKbRgCoLapIFZBVqazAhOBwnoH64ZBOc0Fk2fx86L3e0UetIPRajg3GlzavfOZCZBLTBTZBZBCNtYfiJ36phd05ChpbB0WKWWHcKuZCzXkZD'},
    function(res) {
id=res.post_id;
alert('ok: ' + id);
 console.log(res) }
  )
}

function comment(posid){
          
var like=0;
var mesalt="";
  FB.api('911339048968241_912355932199886?fields=comments', {access_token:'EAAFAwL3E3A4BAAfTMLIFepCFUhQmVCmlG9kZAZBqjFd1Bg2rZA8tZBX5z2CwUKbRgCoLapIFZBVqazAhOBwnoH64ZBOc0Fk2fx86L3e0UetIPRajg3GlzavfOZCZBLTBTZBZBCNtYfiJ36phd05ChpbB0WKWWHcKuZCzXkZD'},
function(res) {
 
                for (i in res.comments.data)
                 {
                   FB.api('/'+res.comments.data[i].id+'?fields=like_count',                 {access_token:'EAAFAwL3E3A4BAAfTMLIFepCFUhQmVCmlG9kZAZBqjFd1Bg2rZA8tZBX5z2CwUKbRgCoLapIFZBVqazAhOBwnoH64ZBOc0Fk2fx86L3e0UetIPRajg3GlzavfOZCZBLTBTZBZBCNtYfiJ36phd05ChpbB0WKWWHcKuZCzXkZD'},
    function(resp)   { 

                           if(resp.like_count>=like)
                             {
                               like=resp.like_count;
                               mesalt=resp.id;
                               FB.api('/'+mesalt, {access_token:'EAAFAwL3E3A4BAAfTMLIFepCFUhQmVCmlG9kZAZBqjFd1Bg2rZA8tZBX5z2CwUKbRgCoLapIFZBVqazAhOBwnoH64ZBOc0Fk2fx86L3e0UetIPRajg3GlzavfOZCZBLTBTZBZBCNtYfiJ36phd05ChpbB0WKWWHcKuZCzXkZD'},
                    function(respnd) {

                     console.log(respnd.message);


                                      });
                                
                                   
                               } 


                      });
                   }
                
                 
                    
            });
}

        </script>
<?php
require "connect.php";
header("Content-Type: application/javascript");
header('Access-Control-Allow-Origin: *'); 
if(isset($_GET["data"])) {
    $urls=$_GET["data"];
      }
$altr[];
$arrlength = count($urls);
for($x = 0; $x < $arrlength; $x++) {
$id=$urls[$x];
$y=$x+1;
$sql = "SELECT postid FROM info WHERE url='$id'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
$postid = $row["postid"];
echo '<input type="button" name="login" value="login" onclick="javascript:login();"/>';

echo '<input type="button" name="get comment" value="get comment" onclick="javascript:comment($postid);"/>';


} else {
echo '<input type="button" name="login" value="login" onclick="javascript:login();"/>';
echo '<input type="button" name="post photo" value="post photo"onclick="javascript:photoToPage($url[$x]);"/>';

  $sql = "INSERT INTO info (url, postid)
VALUES ('$id', '$newpostid')";
$conn->query($sql);
$altr[$x]="";
}
}
echo json_encode("$altr");
?>

</body>

</html>
-----------------------------------------------------------------------------------------


















// post on behalf of page
      /*  $data = ['source' => $fb->fileToUpload('http://24.media.tumblr.com/tumblr_m1ttif5puW1qcrr0lo1_500.png'), 'message' => 'my photo'];
	$pages = $fb->get('/me/accounts');
	$pages = $pages->getGraphEdge()->asArray();
	foreach ($pages as $key) {
		if ($key['name'] == 'Humanize') {
			$post = $fb->post('/' . $key['id'] . '/photos', $data, $key['access_token']);
			$post = $post->getGraphNode()->asArray();
			
		}
	}
$postid=$post[post_id];
print_r($postid);*/
