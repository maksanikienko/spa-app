<!-- Форма выбора сортировки -->
    <form action="{{ route('comments.show') }}" method="get">
        @csrf
        <div class = "row mb-3 justify-content-center align-items-center">
            <select class="select" name="sort_by" id="sort_by">
                <option disabled>Sort by:</option>
                <option value="user_name">User Name</option>
                <option value="email">E-mail</option>
                <option value="created_at">Created at</option>
            </select>

            <select class="select" name="sort_order" id="sort_order">
                <option disabled>Sort Order:</option>
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-sm">Apply</button>
            </div>
        </div>
    </form>
