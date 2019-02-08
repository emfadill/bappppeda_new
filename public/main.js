
/*firebase.initializeApp({
    apiKey: "AIzaSyB-x5c5XoOcBFLlkO9lCDVH0QymiX2xkp0",
    projectId: "bappppeda",
    messagingSenderId: "1050384502816"
});
*/

var config = {
            apiKey: "AAAA9I_LkCA:APA91bFYGnEDnPNp2iha51E014rCa-aut6vfXC0j5th_b2hXDaOsCNMzzrYoGvnIZGSS4A7ox9QnHl1RCDdDcCRBG8wbx2e633eX4FZtv-PufNN7ivC2klgIzovcisxigNgKPRcLaDSg",
            projectId: "bappppeda",
            messagingSenderId: "1050384502816"
        };
        firebase.initializeApp(config);

const messaging = firebase.messaging();


// Add the public key generated from the console here.
messaging.usePublicVapidKey("BAN4bSbos8ULScdqqs6zrv5ZWnDw-4yZLanAp2EbNkhJAw6tsHGXsnqO2OKUCknxc1DNtEHQlZE-Q-fMh42YeC4");

navigator.serviceWorker.register('firebase-messaging-sw.js')
.then(function(swReg) {
  console.log('Service Worker is registered', swReg);

  swRegistration = swReg;
  
})


function urlB64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

messaging.requestPermission().then(function() {
  console.log('Notification permission granted.');
  // TODO(developer): Retrieve an Instance ID token for use with FCM.
       const applicationServerKey = urlB64ToUint8Array("BAN4bSbos8ULScdqqs6zrv5ZWnDw-4yZLanAp2EbNkhJAw6tsHGXsnqO2OKUCknxc1DNtEHQlZE-Q-fMh42YeC4");
       swRegistration.pushManager.subscribe({
  userVisibleOnly: true,
  applicationServerKey: applicationServerKey
})
.then(function(subscription) {
  console.log('User is subscribed:', subscription);

  isSubscribed = true;
})
    return messaging.getToken();
  // ...
}).then(function(token) {
  console.log(token);
   const topic = 'Admin';
  subscribeTokenToTopic(token,topic);
})
 
.catch(function(err) {
  console.log('Unable to get permission to notify.', err);
});

// Get Instance ID token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
messaging.getToken().then(function(currentToken) {
  if (currentToken) {
    sendTokenToServer(currentToken);
  } else {
    // Show permission request.
    console.log('No Instance ID token available. Request permission to generate one.');
    // Show permission UI.
    updateUIForPushPermissionRequired();
    setTokenSentToServer(false);
  }
}).catch(function(err) {
  console.log('An error occurred while retrieving token. ', err);
 /* showToken('Error retrieving Instance ID token. ', err);*/
  setTokenSentToServer(false);
});

  messaging.onMessage(function(payload) {
    console.log('Message received. ', payload);
    // [START_EXCLUDE]
    // Update the UI to include the received message.
    appendMessage(payload);
    // [END_EXCLUDE]
  });
  // [END receive_message]

  //Subscribe token

  function subscribeTokenToTopic(token, topic) {
            fetch('https://iid.googleapis.com/iid/v1/'+token+'/rel/topics/'+topic, {
                method: 'POST',
                headers: new Headers({
                    'Authorization': 'key='+config.apiKey
                })
            }).then(response => {
                if (response.status < 200 || response.status >= 400) {
                    throw 'Error subscribing to topic: '+response.status + ' - ' + response.text();
                }
                console.log('Subscribed to "'+topic+'"');
            }).catch(error => {
                console.error(error);
            })
        }

  function resetUI() {

    // [START get_token]
    // Get Instance ID token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken().then(function(currentToken) {
      if (currentToken) {
        sendTokenToServer(currentToken);
      } else {
        // Show permission request.
        console.log('No Instance ID token available. Request permission to generate one.');
        // Show permission UI.
        updateUIForPushPermissionRequired();
        setTokenSentToServer(false);
      }
    }).catch(function(err) {
      console.log('An error occurred while retrieving token. ', err);
      setTokenSentToServer(false);
    });
    // [END get_token]
  }
  
  // Send the Instance ID token your application server, so that it can:
  // - send messages back to this app
  // - subscribe/unsubscribe the token from topics
  function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
      console.log('Sending token to server...');
      // TODO(developer): Send the current token to your server.
      setTokenSentToServer(true);
    } else {
      console.log('Token already sent to server so won\'t send it again ' +
          'unless it changes');
    }
  }
  function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
  }
  function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
  }
  function showHideDiv(divId, show) {
    const div = document.querySelector('#' + divId);
    if (show) {
      div.style = 'display: visible';
    } else {
      div.style = 'display: none';
    }
  }
  function requestPermission() {
    console.log('Requesting permission...');
    // [START request_permission]
    messaging.requestPermission().then(function() {
      console.log('Notification permission granted.');
      // TODO(developer): Retrieve an Instance ID token for use with FCM.
      // [START_EXCLUDE]
      // In many cases once an app has been granted notification permission, it
      // should update its UI reflecting this.
      resetUI();
      // [END_EXCLUDE]
    }).catch(function(err) {
      console.log('Unable to get permission to notify.', err);
    });
    // [END request_permission]
  }
  function deleteToken() {
    // Delete Instance ID token.
    // [START delete_token]
    messaging.getToken().then(function(currentToken) {
      messaging.deleteToken(currentToken).then(function() {
        console.log('Token deleted.');
        setTokenSentToServer(false);
        // [START_EXCLUDE]
        // Once token is deleted update UI.
        resetUI();
        // [END_EXCLUDE]
      }).catch(function(err) {
        console.log('Unable to delete token. ', err);
      });
      // [END delete_token]
    }).catch(function(err) {
      console.log('Error retrieving Instance ID token. ', err);
      showToken('Error retrieving Instance ID token. ', err);
    });
  }
  // Add a message to the messages element.
  function appendMessage(payload) {
      localStorage.setItem("NOTIF",1);
    const messagesElement = document.querySelector('#messages');
    const dataHeaderELement = document.createElement('h5');
    const dataElement = document.createElement('p');
   /* dataElement.style = 'overflow-x:hidden;';*/
    dataHeaderELement.textContent = payload.notification.title;
    dataElement.textContent = payload.notification.body;
   
   if (dataHeaderELement.textContent.substr(0,1) == "E") {
    dataHeaderELement.style = 'font-family: Arial;padding: 8px;color: white;background-color:   #ec7063;';
    dataElement.style = 'margin-top:-10px; font-family: Arial;padding: 8px;color: white;background-color:  #f1948a; border-bottom: 1px solid #cbcbcb';
    messagesElement.appendChild(dataHeaderELement);
    messagesElement.appendChild(dataElement);    
   }
   else{
    dataHeaderELement.style = 'font-family: Arial;padding: 8px;color: white;background-color:  #8bc34a;';
    dataElement.style = 'margin-top:-10px;font-family: Arial;padding: 8px;color: white;background-color: #9ccc65;';
    messagesElement.appendChild(dataHeaderELement);
    messagesElement.appendChild(dataElement);
   }

    /*messagesElement.appendChild(dataHeaderELement);
    messagesElement.appendChild(dataElement);*/
    /*dataElement.textContent = JSON.stringify(payload.notification.title, null, 2);*/
    
  }
  
  function updateUIForPushEnabled(currentToken) {
    
  }
  function updateUIForPushPermissionRequired() {
    /*showHideDiv(tokenDivId, false);
    showHideDiv(permissionDivId, true);*/
  }

   function clearMessages() {
    const messagesElement = document.querySelector('#messages');
    while (messagesElement.hasChildNodes()) {
      messagesElement.removeChild(messagesElement.lastChild);
    }
  }

  function clickMessages() {
    const messagesElement = document.querySelector('#messages');
    while (messagesElement.hasChildNodes()) {
      messagesElement.removeChild(messagesElement.firstChild);
    }
  }
navigator.serviceWorker.register('firebase-messaging-sw.js')
.then(function(swReg) {
  console.log('Service Worker is registered', swReg);

  swRegistration = swReg;
  
})

  resetUI();
