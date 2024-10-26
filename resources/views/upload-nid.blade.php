<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload NID</title>
</head>

<body>
    <div class="container">
        <div>
            <h2>Upload Your NID</h2>
        </div>
        <div>
            <form action="/upload-nid" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nid_image">Upload NID Image:</label>
                <input type="file" name="nid_image" id="nid_image" required> <br>
                <button type="submit">Upload</button>
            </form>

        </div>
    </div>
</body>
</html>