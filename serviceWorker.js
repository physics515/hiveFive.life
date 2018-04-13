
var CACHE_NAME = mainSite-v1var; 
var urlsToCache = [
    '/'
];


// INSTALL
    
self.addEventListener('install', function(event) {
    // Perform install steps
    event.waitUntil(
    caches.open(CACHE_NAME).then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
    }));
});


// FETCH

self.addEventListener('fetch', function(event) {
    event.respondWith(caches.match(event.request).then(function(response) {

        // Cache hit - return response
        if (response) {
            return response;
        }
  
        // IMPORTANT: Clone the request. A request is a stream and
        // can only be consumed once. Since we are consuming this
        // once by cache and once by the browser for fetch, we need
        // to clone the response.
        var fetchRequest = event.request.clone();
  
        return fetch(fetchRequest).then(function(response) {

            // Check if we received a valid response
            if(!response || response.status !== 200 || response.type !== 'basic') {
                return response;
            }
  
            // IMPORTANT: Clone the response. A response is a stream
            // and because we want the browser to consume the response
            // as well as the cache consuming the response, we need
            // to clone it so we have two streams.
            var responseToCache = response.clone();
  
            caches.open(CACHE_NAME)
            .then(function(cache) {
                cache.put(event.request, responseToCache);
            });

            return response;
        });
    }));
});

/*
self.addEventListener('fetch', function(event) {
    event.respondWith(caches.open(CACHE_NAME).then(function(cache) {
        return cache.match(event.request).then(function(response) {
            //console.log("cache request: " + event.request.url);
            var fetchPromise = fetch(event.request).then(function(networkResponse) {
                // if we got a response from the cache, update the cache
                //console.log("fetch completed: " + event.request.url, networkResponse);
                if (networkResponse) {
                    //console.debug("updated cached page: " + event.request.url, networkResponse);
                    cache.put(event.request, networkResponse.clone());
                }
                return networkResponse;
            }, function (e) {
                // rejected promise - just ignore it, we're offline
                //console.log("Error in fetch()", e);
                ;
            });

            // respond from the cache, or the network
            return response || fetchPromise;
        });
    }));
});
*/

// ACTIVATE

self.addEventListener('activate', function(event) {
    var cacheWhitelist = ['hiveFive|life-v1'];
    event.waitUntil(caches.keys().then(function(cacheNames) {
        return Promise.all(cacheNames.map(function(cacheName) {
            if (cacheWhitelist.indexOf(cacheName) === -1) {
                return caches.delete(cacheName);
            }
        }));
    }));
});