'use strict';
console.log("Loaded main.js");
if ("serviceWorker" in navigator) {
    if (navigator.serviceWorker.controller) {
      console.log("[PWA Builder] active service worker found, no need to register");
    } else {
      // Register the service worker
      navigator.serviceWorker
        .register("/assets/js/sw.php", {
            scope: "/"
        }
        )
        .then(function (reg) {
          console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
        });
    }
}