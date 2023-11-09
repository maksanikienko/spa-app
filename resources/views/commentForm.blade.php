<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment Form</title>
</head>
<body>

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

        <div class="form-group">
            <label for="captcha">CAPTCHA</label>
            <input type="text" class="form-control" id="captcha" name="captcha" required>
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Done</button>
    
</body>
</html>