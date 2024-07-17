<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/minimart.png" type="image/x-icon">
    <title>MegaMart Admin</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
}

nav {
    background-color: #333;
    color: white;
    display: flex;
    align-items: center;
    padding: 10px;
}

nav img {
    width: 40px;
    margin-right: 10px;
}

.brand {
    font-size: 1.5em;
    font-weight: bold;
    margin-right: auto;
}

.links {
    margin-left: auto;
}

.links a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
}

.links a:hover {
    text-decoration: underline;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container h1 {
    font-size: 2em;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group textarea,
.form-group input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group textarea {
    resize: vertical;
}

.form-group input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    border-radius: 4px;
}

.form-group input[type="submit"]:hover {
    background-color: #45a049;
}

.char-count {
    font-size: 0.8em;
    opacity: 0.7;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-info {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}

.product-image {
    width: 150px;
    height: auto;
    display: block;
    margin: 0 auto 10px auto;
}

</style>
