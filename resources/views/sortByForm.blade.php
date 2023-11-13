<!-- Форма выбора сортировки -->
<form action="{{ route('comments.show') }}" method="get">
    @csrf
    <label for="sort_by">Sort by:</label>
    <select name="sort_by" id="sort_by">
        <option value="user_name">User Name</option>
        <option value="email">E-mail</option>
        <option value="created_at">Created at</option>
    </select>

    <label for="sort_order">Sort Order:</label>
    <select name="sort_order" id="sort_order">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
    </select>

    <button type="submit" class="btn btn-secondary btn-sm">Apply</button>
</form>