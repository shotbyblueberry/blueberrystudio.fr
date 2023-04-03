<?php
    // Vérifier si le fichier a été téléchargé
    if (isset($_FILES['newBackground']) && $_FILES['newBackground']['error'] == 0) {
        // Récupérer les informations sur le fichier téléchargé
        $file_name = $_FILES['newBackground']['name'];
        $file_size = $_FILES['newBackground']['size'];
        $file_tmp = $_FILES['newBackground']['tmp_name'];
        $file_type = $_FILES['newBackground']['type'];
        // Vérifier si le fichier est une image webp
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = array('webp');
        if (in_array($file_ext, $allowed_extensions)) {
            // Renommer le fichier
            $new_file_name = "background." . $file_ext;
            // Supprimer l'image existante si elle existe
            if (file_exists("../../assets/img/index/" . $new_file_name)) {
                unlink("../../assets/img/index/" . $new_file_name);
            }
            // Vérifier si le répertoire cible existe et s'il est accessible en écriture
            if (!is_dir("../../assets/img/index/") || !is_writable("../../assets/img/index/")) {
                trigger_error('Impossible d\'accéder au répertoire cible.', E_USER_ERROR);
            }
            // Déplacer le fichier téléchargé dans le répertoire
            if (move_uploaded_file($file_tmp, "../../assets/img/index/" . $new_file_name)) {
                echo "<script>alert('Succès lors du changement d\'arrière plan.')</script>";
                // Redirection 
                header("Refresh:0; url=../../admin.php");
                exit();
            } else {
                trigger_error('Impossible de déplacer le fichier téléchargé.', E_USER_ERROR);
            }
        } else {
            trigger_error('Le fichier téléchargé n\'est pas une image valide.', E_USER_ERROR);
        }
        } else {
        trigger_error('Aucun fichier n\'a été téléchargé.', E_USER_ERROR);
    }

?>