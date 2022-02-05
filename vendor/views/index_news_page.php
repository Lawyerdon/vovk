<div id="all">
    <table>
        <caption>All news</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <button type="button" id="add">New news item</button>
</div>
<div id="create">
    <form name="create">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"/>
        <label for="text">Text:</label>
        <textarea name="text" id="text"></textarea>
        <input type="submit" value="create"/>
    </form>
</div>
<div id="edit">
    <form name="edit" id="edit-form">
        <input type="hidden" name="id">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"/>
        <label for="text">Text:</label>
        <textarea name="text" id="text"></textarea>
        <input type="submit" value="create"/>
    </form>
</div>
<script src="/js/news.js"></script>