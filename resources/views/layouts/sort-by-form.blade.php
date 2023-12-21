<!-- Форма выбора сортировки -->
    <form action="{{ route('comments.show') }}" method="get" class="d-flex flex-row flex-md-row align-items-center justify-content-center mb-3">
        @csrf

        <select class="select mb-2 me-md-2" name="sort_by" id="sort_by">
            <option disabled selected>Sort by:</option>
            <option value="user_name">User Name</option>
            <option value="email">E-mail</option>
            <option value="created_at">Created at</option>
        </select>

        <select class="select mb-2 me-md-2" name="sort_order" id="sort_order">
            <option disabled selected>Sort Order:</option>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>

        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
    </form>
