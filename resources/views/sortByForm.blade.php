<!-- Форма выбора сортировки -->
<form action="{{ route('comments.show') }}" method="get">
    @csrf
    <label for="sort_by">Сортировать по:</label>
    <select name="sort_by" id="sort_by">
        <option value="user_name">User Name</option>
        <option value="email">E-mail</option>
        <option value="created_at">Дата добавления</option>
    </select>

    <label for="sort_order">Порядок сортировки:</label>
    <select name="sort_order" id="sort_order">
        <option value="asc">Возрастание</option>
        <option value="desc">Убывание</option>
    </select>

    <button type="submit">Применить</button>
</form>