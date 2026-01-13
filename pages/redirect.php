<?php
$escapedUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
if (!headers_sent()) {
    header('Location: ' . $url, true, 302);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="0; URL=<?php echo $escapedUrl; ?>" />
    <title><?php echo $escapedUrl; ?></title>
</head>
<body>
<div>
    <p>Redirecting to <?php echo $escapedUrl; ?></p>
    <p>If you are not redirected, <a href="<?php echo $escapedUrl; ?>">click here</a>.</p>
</div>
</body>
</html>
