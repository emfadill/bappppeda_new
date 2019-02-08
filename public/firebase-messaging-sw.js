/*importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');*/


// // Import and configure the Firebase SDK
// // These scripts are made available when the app is served or deployed on Firebase Hosting
// // If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
// /*importScripts('/__/firebase/5.5.6/firebase-app.js');
// importScripts('/__/firebase/5.5.6/firebase-messaging.js');
// importScripts('/__/firebase/init.js');*/


// /*var messaging = firebase.messaging();*/



//  // [START initialize_firebase_in_sw]
//  // Give the service worker access to Firebase Messaging.
//  // Note that you can only use Firebase Messaging here, other Firebase libraries
//  // are not available in the service worker.
// /* importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
//  importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');*/

/*importScripts('https://www.gstatic.com/firebasejs/5.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.2/firebase-messaging.js');
*/
//  // Initialize the Firebase app in the service worker by passing in the
//  // messagingSenderId.
//  firebase.initializeApp({
//    'messagingSenderId': '1050384502816'
//  });

//  // Retrieve an instance of Firebase Messaging so that it can handle background
//  // messages.
//  const messaging = firebase.messaging();
//  // [END initialize_firebase_in_sw]

// // [START set_public_vapid_key]
// // Add the public key generated from the console here.
// messaging.usePublicVapidKey('BAN4bSbos8ULScdqqs6zrv5ZWnDw-4yZLanAp2EbNkhJAw6tsHGXsnqO2OKUCknxc1DNtEHQlZE-Q-fMh42YeC4');
// // [END set_public_vapid_key]

// function requestPermission() {
//     console.log('Requesting permission...');
//     // [START request_permission]
//     messaging.requestPermission().then(function() {
//         console.log('Notification permission granted.');
//         // TODO(developer): Retrieve an Instance ID token for use with FCM.
//         // [START_EXCLUDE]
//         // In many cases once an app has been granted notification permission, it
//         // should update its UI reflecting this.
//         resetUI();
//         // [END_EXCLUDE]
//     }).catch(function(err) {
//         console.log('Unable to get permission to notify.', err);
//     });
//     // [END request_permission]
// }

// messaging.onMessage(function(payload) {
//     console.log('Message received. ', payload);
//     // [START_EXCLUDE]
//     // Update the UI to include the received message.
//     appendMessage(payload);
//     // [END_EXCLUDE]
// });

// // If you would like to customize notifications that are received in the
// // background (Web app is closed or not in browser focus) then you should
// // implement this optional method.
// // [START background_handler]
// messaging.setBackgroundMessageHandler(function(payload) {
//   console.log('[firebase-messaging-sw.js] Received background message ', payload);
//   // Customize notification here
//   var notificationTitle = 'Background Message Title';
//   var notificationOptions = {
//     body: 'Background Message body.',
//     icon: '/firebase-logo.png'
//   };

//   return self.registration.showNotification(notificationTitle,
//     notificationOptions);
// });
// // [END background_handler]




/*// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp({
    apiKey: "AIzaSyB-x5c5XoOcBFLlkO9lCDVH0QymiX2xkp0",
    authDomain: "bappppeda.firebaseapp.com",
    databaseURL: "https://bappppeda.firebaseio.com",
    projectId: "bappppeda",
    storageBucket: "bappppeda.appspot.com",
    messagingSenderId: "1050384502816"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.usePublicVapidKey('BAN4bSbos8ULScdqqs6zrv5ZWnDw-4yZLanAp2EbNkhJAw6tsHGXsnqO2OKUCknxc1DNtEHQlZE-Q-fMh42YeC4');

messaging
   .requestPermission()
   .then(function () {
     MsgElem.innerHTML = "Notification permission granted." 
     console.log("Notification permission granted.");

     // get the token in the form of promise
     return messaging.getToken()
   })
   .then(function(token) {
     // print the token on the HTML page
     TokenElem.innerHTML = "token is : " + token
   })
   .catch(function (err) {
     ErrElem.innerHTML = ErrElem.innerHTML + "; " + err
     console.log("Unable to get permission to notify.", err);
  });

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: '/itwonders-web-logo.png'
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});
*/

// <<---------BARU---------->>

// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here, other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/5.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.2/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
var config = {
            apiKey: "AAAA9I_LkCA:APA91bFYGnEDnPNp2iha51E014rCa-aut6vfXC0j5th_b2hXDaOsCNMzzrYoGvnIZGSS4A7ox9QnHl1RCDdDcCRBG8wbx2e633eX4FZtv-PufNN7ivC2klgIzovcisxigNgKPRcLaDSg",
            projectId: "bappppeda",
            messagingSenderId: "1050384502816"
        };
        firebase.initializeApp(config);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();


messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  var notificationTitle = 'Notifikasi Surat';
  var notificationOptions = {
    body: 'Ada Pesan Surat Terbaru.',
    icon: 'public/icon.png'
  };

  const notificationPromise = self.registration.showNotification(notificationTitle,
    notificationOptions);
  event.waitUntil(notificationPromise);

});

self.addEventListener('notificationclick', function(event) {
    console.log('[firebase-messaging-sw.js] Notification click Received.');

    event.notification.close();

    event.waitUntil(
      clients.openWindow('https://bappppeda.ieutama-sukapada.id/')
      );
});

/*self.registration.addEventListener('notificationclick', function(event) {

    const clickedNotification = event.notification;
    clickedNotification.close();
    // Do something as the result of the notification click
    const promiseChain = clients.openWindow('https://bappppeda.ieutama-sukapada.id/');

    event.waitUntil(promiseChain);
});
*/