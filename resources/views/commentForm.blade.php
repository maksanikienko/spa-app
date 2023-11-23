
                 <!-- Отображение формы комментария -->
    <div class="row captcha-form">
        <div class="col-md-12">

            <div class="mb-3 row">
                <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="user_name" name="user_name" required placeholder="Enter your name">
                </div>

                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                </div>

                <label for="home_page" class="col-sm-2 col-form-label">Home Page</label>
                <div class="col-sm-4">
                    <input type="url" class="form-control" id="home_page" name="home_page" placeholder="Enter your home page">
                </div>
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Choose Avatar:</label>
                <select class="form-select" name="avatar" id="avatar">
                    @foreach ($avatar as $key => $filename)
                        <option value="{{ $filename }}">{{ $filename }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="captcha" class="form-label">CAPTCHA</label>
                <div class=" captcha-container">
                    <span >{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger reload">&#x21bb;</button>
                </div>
                <input type="text" class="form-control" id="captcha" name="captcha" required placeholder="Enter the code">
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Message</label>
                <textarea class="form-control" id="text" name="text" rows="4" required placeholder="Enter your message"></textarea>
            </div>

            <!-- Поле для загрузки изображения -->
            <div class="mb-3 ">
                <label for="image" class="form-label">Choose image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-secondary">Done</button>
        </div>
    </div>


