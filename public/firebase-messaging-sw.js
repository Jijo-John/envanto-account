importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBJVe-GfTuZoQfP3L1FPRWQnLDlUrTNz7U",
    projectId: "pushservice-95451",
    messagingSenderId: "855875655722",
    appId: "1:855875655722:web:3c59dee592238a20ef4b53",
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});