<form action="index.php?action=saveSnippet" method="post">
    <div><input type="text" name="title" placeholder="Titel" /></div>
    <div><input type="text" name="description" placeholder="Beschreibung" /></div>
    <div><textarea name="code" rows="10" placeholder="Code"></textarea></div>
    <div>
        <select name="language">
            <option>PHP</option>
            <option>HTML</option>
            <option>JS</option>
            <option>CSS</option>
            <option>JAVA</option>
            <option>C++</option>
            <option>C#</option>
            <option>Pseudocode</option>
        </select>
    </div>
   
    <div><input type="text" name="tags" placeholder="login, userverwaltung, singleton..."></div>
    <div><button type="submit">Senden</button></div>
</form>