<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Pendaftaran</title>
</head>

<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>
    <form action="/welcome" method="POST">
        @csrf
        <label>First Name:</label> <br />
        <br />
        <input type="text" name="firstname"/> <br /><br />
        <label>Last Name:</label> <br />
        <br />
        <input type="text" name="lastname" /> <br /><br />
        <label>Gender:</label> <br />
        <br />
        <input type="radio" name="gender" /> Male <br />
        <input type="radio" name="gender" /> Female <br />
        <input type="radio" name="gender" /> Other <br />
        <br />
        <label>Nationality:</label> <br />
        <br />
        <select name="nationality" id="">
            <option value="">Indonesian</option>
            <option value="">Singapore</option>
            <option value="">Malaysian</option>
            <option value="">Australian</option>
        </select>
        <br />
        <br />
        <label>Language Spoken:</label> <br />
        <br />
        <input type="checkbox" name="language" /> Bahasa Indonesia <br />
        <input type="checkbox" name="language" /> English <br />
        <input type="checkbox" name="language" /> Other <br />
        <br />
        <label> Bio: </label> <br />
        <br />
        <textarea cols="30" rows="10"></textarea> <br />

        <input type="submit" value="signup" />
    </form>
</body>

</html>
