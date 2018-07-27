<?php
$mydomain = "t.mtp.ovh"; // site domain name
$myprotocol = "https://"; // site protocol "http://" or "https://"

echo <<<HTML
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <style>html{position: relative;min-height: 100%;}html,body{height:100%}body{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;padding-top:40px;padding-bottom:40px;background-color:#f5f5f5;margin-bottom: 60px}.fuckrkn{width:100%;max-width:330px;padding:15px;margin:auto}.fuckrkn .checkbox{font-weight:400}.fuckrkn .form-control{position:relative;box-sizing:border-box;height:auto;padding:10px;font-size:16px;border-radius: 4px 4px 0 0}.footer{position:absolute;bottom:0;width:100%;height:60px;line-height:60px;background-color:#f5f5f5}</style>

  <title>Open in Telegram</title>
</head>   
<script>
function convert_url()
{
  document.getElementById("inputUrl").value = document.getElementById("inputUrl").value.replace("t.me", "{$mydomain}").replace("http://", "{$myprotocol}").replace("https://", "{$myprotocol}").replace("@", "{$myprotocol}{$mydomain}/");
}
function open_url(url)
{
  window.location.replace(url);
}
var url = window.location.pathname.split("/");
if (url[1].length > 0)
{
  switch (url[1])
  {
    case "socks":
        var str = "tg://socks" + window.location.search;
        break;
    case "joinchat":
        str = "tg://join?invite=" + url[2];
        break;
    case "addstickers":
        str = "tg://addstickers?set=" + url[2];
        break;
    case "proxy":
        str = "tg://" + url[1] + window.location.search;
        break;
    default:
        str = "tg://resolve?domain=" + url[1] + window.location.search.replace("?start=", "&start=");
        url[2] && (str = str + "&post=" + url[2])
  }
  setTimeout(function()
  {
	$("#inputUrl").hide();
	$("#buttonUrl").attr("onclick", "open_url('" + str + "')");
	$("#buttonUrl").html("Open in Telegram");
    window.location.replace(str);
  }, 0);
}
</script>
<body class="text-center">
  <form class="fuckrkn">
    <input type="inputUrl" id="inputUrl" class="form-control" placeholder="t.me/.." required="" autofocus="">
    <button class="btn btn-lg btn-primary btn-block" onclick="convert_url()" id="buttonUrl" type="button">Convert</button>
  </form>
  <footer class="footer">
    <div class="container">
      <span class="text-muted"><a href="https://github.com/mtpovh/t.me-clone">Source code</a> &#183; <a href="https://mtp.ovh">mtp.ovh</a> &#183; <a href="tg://resolve?domain=mtp_ovh">@mtp_ovh</a></span>
    </div>
  </footer>
</body>
</html>
HTML;
?>
