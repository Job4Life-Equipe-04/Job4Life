<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-end</title>
</head>

<body>
    <form action="./server/users.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="text" name="last_name" placeholder="Last name">
        <input type="text" name="first_name" placeholder="First name">
        <button type="submit">Créer un compte</button>
    </form>
</body>

</html>