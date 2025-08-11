<?php 

if(!isset($_SESSION['user'])) { ?>
    <!-- Logged out -->
    <h2>Willkommen zurück bei den Snippets</h2>
    <p>Eine kleine Snippetdatenbank für Webentwickler.</p>
<?php } else { ?>
    <!-- Logged in -->
    <h2>Willkommen zurück, <?= $_SESSION['user']->getUsername(); ?>!</h2>
    <p>Wir freuen uns, dass du wieder da bist.</p>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=newSnippet" class="btn btn-primary-outline my-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 mr-1 bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
        </svg>
        Neues Snippet erstellen
    </a>
    <?php
    $sc = new SnippetController($dbh);
    
    $snippets = $sc->findAll();
    $html = '<table>';
    $html .= '<tr>';
        $html .= '<th>Id</th>';
        $html .= '<th>Title</th>';
        $html .= '<th>Beschreibung</th>';
        $html .= '<th>Sprache</th>';
        $html .= '<th>Tags</th>';
        $html .= '<th>Aktion</th>';
    $html .= '</tr>';

    foreach($snippets as $snippet) {
        $html .= '<tr>';
            $html .= '<td>'.$snippet['id'].'</td>';
            $html .= '<td>'.$snippet['title'].'</td>';
            $html .= '<td>'.$snippet['description'].'</td>';
            $html .= '<td>'.$snippet['language'].'</td>';
            $html .= '<td>'.$snippet['tags'].'</td>';
            $html .= '<td><a href="index.php?action=editSnippet&id='.$snippet['id'].'">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                </svg></a>
            </td>';
        $html .= '</tr>';
    }
    $html .= '</table>';

    echo $html;
    ?>
    
    
<?php } ?>