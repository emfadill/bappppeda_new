<html>
<title>Firebase Messaging Demo</title>
<head>
  <script src="https://www.gstatic.com/firebasejs/5.5.1/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.5.2/firebase-messaging.js"></script>
    <script src="firebase-messaging-sw.js"></script>
<style>
    div {
        margin-bottom: 15px;
    }
</style>
</head>
<body>
    <div id="token"></div>
    <div id="msg"></div>
    <div id="notis"></div>
    <div id="err"></div>
    test

    <script>
       MsgElem = document.getElementById("msg")
       TokenElem = document.getElementById("token")
       NotisElem = document.getElementById("notis")
       ErrElem = document.getElementById("err")
    </script>

    
    
</body>
</html>
