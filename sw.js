const cacheVersion = "ResBuild-1"

const cacheFiles = [
    "./",
    "./index.html",
    "./manifest.json",
    "./data.json",
    "./js/vue.js",
    "./js/material.js",
    "./js/jquery.js",
    "./js/app.js",
    "./css/app.css",
    "./css/material.css",
    "./css/icons.woff2",
    "./admin/app.js",
    "./admin/index.php",
    "./admin/login.html"
]

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches
        .open(cacheVersion)
        .then((cache) => {
            return cache.addAll(cacheFiles);
        })
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches
        .keys()
        .then((keyList) => {
            return Promise
                .all(keyList
                    .map((key) => {
                        if (key != cacheVersion) {
                            return caches.delete(key);
                        }
                    }));
        })
    );
});

self.addEventListener("fetch", e => {
    event.respondWith(
        caches
        .match(event.request)
        .then(resp => {
            return resp ||
                fetch(event.request)
                .then((response) => {
                    return caches
                        .open(cacheVersion)
                        .then((cache) => {
                            cache
                                .put(event.request, response.clone());
                            return response;
                        });
                })
        })
    )
})
