<html>
<head>
    <title>SITE</title>
</head>

<body>

<div id="fb-root"></div>

        <script>
        window.fbAsyncInit = function() {
                FB.init({
                appId: '{app-id}',
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

function post(){
  FB.api('/{pageid}/posts', 'post', { message:'my message', access_token:'{access_token for page'},
    function(res) {
id=res.post_id;
alert('ok: ' + id);
 console.log(res) }
  )
}


        </script>
<?php
echo '<input type="button" name="login" value="login" onclick="javascript:login();"/>';

echo '<input type="button" name="post_page" value="post to page" onclick="javascript:post();"/>';

?>

</body>

</html>
