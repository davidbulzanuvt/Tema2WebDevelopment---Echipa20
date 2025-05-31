<?php
// Protecție simplă la XSS prin htmlspecialchars
function clean($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

$nume = isset($_POST['nume']) ? clean($_POST['nume']) : '';
$email = isset($_POST['email']) ? clean($_POST['email']) : '';
$subiect = isset($_POST['subiect']) ? clean($_POST['subiect']) : '';
$mesaj = isset($_POST['mesaj']) ? clean($_POST['mesaj']) : '';

if (!$nume || !$email || !$subiect || !$mesaj) {
    header('Location: contact.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mesaj trimis - Echipa 4</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/uikit.css" />
    <style>
        body { font-family: 'Open Sans', sans-serif; }
        h1,h2,h3,h4 { font-family: 'Montserrat', sans-serif; }
        .uk-section-muted {
        min-height: 100vh; /* să acopere tot ecranul */
      }
    </style>
</head>
<body>

<section class="uk-section uk-section-muted uk-flex uk-flex-center uk-flex-middle" style="min-height: 80vh;">
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m">
        <h1 class="uk-heading-line uk-text-center"><span>Mesaj primit</span></h1>

        <p><strong>Nume complet:</strong> <?php echo $nume; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Subiect:</strong> <?php echo $subiect; ?></p>
        <p><strong>Mesaj:</strong></p>
        <p><?php echo nl2br($mesaj); ?></p>

        <div class="uk-text-center uk-margin-top">
            <a href="contact.html" class="uk-button uk-button-primary">Trimite alt mesaj</a>
            <a href="index.html" class="uk-button uk-button-default">Înapoi la Acasă</a>
        </div>
    </div>
</section>

<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>

</body>
</html>
0