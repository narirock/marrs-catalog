const mix = require("laravel-mix");

// ------ ** Mixes for TENANT ** ------ //
mix.js("src/resources/assets/admin/js/app.js", "src/public/vue").vue();
