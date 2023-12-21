


        <!-- Отображение формы комментария -->
                 <div class="row mb-5">
                     <div class="col-md-4">
                             <label for="user_name" class="col-form-label">Name:</label>
                             <input type="text" id="user_name" name="user_name" required placeholder="Enter your name">
                     </div>
                     <div class="col-md-4">
                             <label for="email" class="col-form-label">E-mail:</label>
                             <input type="email" id="email" name="email" required placeholder="Enter your email">
                     </div>
                     <div class="col-md-4">
                             <label for="home_page" class="col-form-label">Home Page:</label>
                             <input type="url" id="home_page" name="home_page" placeholder="Enter your home page">
                     </div>
                 </div>


               <div class="row mb-5 d-flex align-items-center">

                   <!-- Image upload -->
                   <div class="col-md-4">
                       <label for="image" class="col-form-label">
                           Upload Image:
                       </label>
                       <input type="file" id="image" name="image" >
                   </div>

                         <!-- Choose avatar -->
                    <div class="col-md-4 text-center">
                        <select class="select" name="avatar" id="avatar" >
                            <option disabled>Choose Avatar &#9660; </option>
                        @foreach ($avatar as $key => $filename)
                                 <option value="{{ $filename }}">{{ $filename }}</option>
                            @endforeach
                        </select>
                    </div>

                 <!-- Captcha field -->
                 <div class="col-md-4">
                     <div class="captcha-form">                                               <!-- .captcha-form  -->
                         <span class="captcha-container">{!! captcha_img() !!}</span>         <!-- .captcha-container reload code -->
                         <button type="button" class="btn btn-danger reload">&#x21bb;</button>
                         <input type="text" id="captcha" name="captcha" required placeholder="Enter the code">
                     </div>
                 </div>

               </div>


                 <!-- Message field -->
                <div class="mb-3">
                    <label for="text" class="form-label">Message</label>
                    <textarea class="form-control" id="text" name="text" rows="4" required placeholder="Enter your message"></textarea>
                </div>

            <button type="submit" class="btn btn-primary">Send</button>
