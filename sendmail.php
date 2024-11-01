<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Récupération des données du formulaire et sécurisation
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Adresse e-mail de destination
    $to = "i.bodian879@gmail.com";

    // Sujet de l'e-mail
    $email_subject = "Nouveau message de votre site web : " . $subject;

    // Contenu de l'e-mail
    $email_body = "Vous avez reçu un nouveau message depuis votre formulaire de contact.\n\n";
    $email_body .= "Nom : $name\n";
    $email_body .= "Email : $email\n\n";
    $email_body .= "Message :\n$message\n";

    // En-têtes de l'e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi de l'e-mail
    if(mail($to, $email_subject, $email_body, $headers)){
        // Redirection ou message de succès
        echo "<script>
                alert('Merci, votre message a bien été envoyé.');
                window.location.href = 'index.html';
              </script>";
    } else {
        // Message d'erreur
        echo "<script>
                alert('Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
                window.location.href = 'index.html';
              </script>";
    }
} else {
    // Redirection si la requête n'est pas POST
    header("Location: index.html");
    exit;
}
?>
