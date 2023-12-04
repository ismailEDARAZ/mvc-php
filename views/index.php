<?php
    getHeader("partiels/header");
?>

<div class="container">
    <h1>Page d'accueil</h1>
    <ul>
        <?php
            foreach($users as $user){
                echo "<li>".$user->name. " - ".$user->email."</li>";
            }
        ?>
    </ul>
</div>

<?php
    getFooter("partiels/footer");
?>