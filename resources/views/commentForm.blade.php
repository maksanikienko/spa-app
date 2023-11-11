
 
    <div class="col-md-5" id="main-form">
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="home_page">Home Page</label>
            <input type="url" class="form-control" id="home_page" name="home_page">
        </div>
    </div>


        <div class="form-group">
            <label for="captcha">CAPTCHA</label>
            <div class="captcha">
                <span id="captcha-container">{!!captcha_img()!!}</span>
                <button type="button" class="btn btn-danger reload" id="reload">
                    &#x21bb;
                </button>
            </div>
            <input type="text" class="form-control" id="captcha" name="captcha" required>
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
        </div>

        <!-- Поле для загрузки изображения -->
        <div class="mb-3">
            <label for="image" class="form-label">Выберите изображение</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Done</button>


        
