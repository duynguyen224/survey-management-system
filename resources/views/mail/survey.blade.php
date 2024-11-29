<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Survey Management System</title>
</head>
<body>
  <p>Dear {{ $engineer->name }}</p>
  <p>Your new survey</p>
  <ul>
    <li>Deadline: {{ $deadline }}</li>
    <li>Link: {{ $surveyUrl }}</li>
  </ul>
  <p>Please complete your survey on time.</p>
</body>
</html>