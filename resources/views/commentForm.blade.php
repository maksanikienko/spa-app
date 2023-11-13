    
                 <!-- Отображение формы комментария -->
    <div class="row captcha-form">
        <div class="col-md-12">
            <div class="mb-3 row">
                <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="user_name" name="user_name" required>
                </div>
                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="home_page" class="form-label">Home Page</label>
                <input type="url" class="form-control" id="home_page" name="home_page">
            </div>

            <div class="mb-3">
                <label for="captcha" class="form-label">CAPTCHA</label>
                <div class=" captcha-container">
                    <span >{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger reload">&#x21bb;</button>
                </div>
                <input type="text" class="form-control" id="captcha" name="captcha" required>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Message</label>
                <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
            </div>

            <!-- Поле для загрузки изображения -->
            <div class="mb-3 ">
                <label for="image" class="form-label">Choose image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Done</button>
        </div>
    </div>


 <!--
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
                <span id="captcha-container">{!! captcha_img() !!}
                </span>
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

        <div class="mb-3">
            <label for="image" class="form-label">Choose image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Done</button>

    -->
        
