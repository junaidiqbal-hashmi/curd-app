<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-messaging.js"></script>
<script>
const firebaseConfig = {
    apiKey: "AIzaSyCTFuwd8XoJ1It5dlbO7SyA_MF6mMXcD00",
    authDomain: "hrm-ast.firebaseapp.com",
    projectId: "hrm-ast",
    storageBucket: "hrm-ast.appspot.com",
    messagingSenderId: "849845425448",
    appId: "1:849845425448:web:f84674da46c98b7826ac1d",
    measurementId: "G-EXWK0TSYSW"
  };
  firebase.initializeApp(firebaseConfig);
  const messaging = firebase.messaging();

  function IntitalizeFireBaseMessaging() {
    messaging
      .requestPermission()
      .then(function() {
        console.log("Notification Permission");
        return messaging.getToken();
      })
      .then(function(token) {
        console.log("Token : " + token);
        $.ajax({
          method: 'GET',
          url: '/insertTokens/',
          data: ({
            // _token: $('meta[name="csrf-token"]').attr('content'),
            user_id: '{{auth()->user()->id}}',
            token_id: token,
          }),
          dataType: 'text',
          success: function(data) {
            console.log(data);
          }
        });
      })
      .catch(function(reason) {
        console.log(reason);
      })
  }
  messaging.onMessage(function(payload) {
    console.log(payload);
    const notificationOption = {
      body: payload.notification.body,
      icon: payload.notification.icon
    };
    if (Notification.permission == "granted") {
      var notification = new Notification(payload.notification.title, notificationOption);
      notification.onclick = function(ev) {
        ev.preventDefault();
        window.open(payload.notification.click_action, '_blank');
        notification.close();
      }
    }
  })
  messaging.onTokenRefresh(function() {
    messaging.getToken()
      .then(function(newtoken) {
        console.log("New Token : " + newtoken);
        $.ajax({
          method: 'GET',
          url: '/insertTokens/',
          data: ({
            // _token: $('meta[name="csrf-token"]').attr('content'),
            user_id: '{{auth()->user()->id}}',
            token_id: token
          }),
          dataType: 'text',
          success: function(data) {
            console.log(data);
          }
        });
      })
      .catch(function(reason) {
        console.log(reason);
      })
  })
  IntitalizeFireBaseMessaging();
</script>