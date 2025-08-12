<h2>Neues Snippet</h2>
<form action="index.php?action=saveSnippet" method="post">
    <div>
        <label for="title">Titel</label>
        <input type="text" name="title" placeholder="Titel" id="title">
    </div>
    <div>
        <label for="description">Beschreibung</label>
        <input type="text" name="description" placeholder="Beschreibung" id="description">
    </div>
    <div>
        <label for="language">Language</label>
        <select name="language" id="language">
            <option value="PHP">PHP</option>
            <option value="HTML">HTML</option>
            <option value="JS">JS</option>
            <option value="CSS">CSS</option>
            <option value="JAVA">JAVA</option>
            <option value="C++">C++</option>
            <option value="C#">C#</option>
            <option value="PSEUDO">Pseudocode</option>
        </select>
    </div>
    <div>
        <label for="tags">Tags</label>
        <input type="text" name="tags" id="tags" placeholder="login, userverwaltung, singleton...">
    </div>
    <div>
        <label for="code">Code</label>    
        <textarea name="code" rows="10" placeholder="Code" id="code"></textarea>
    </div>
    
    <div>
        <button type="submit">Senden</button>
    </div>
</form>