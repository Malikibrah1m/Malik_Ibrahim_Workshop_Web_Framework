<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dasar-dasar routing pada laravel, dibawah ini merupakan code default saat membuat project baru
Route::get('/', function () {
    return view('welcome');
});

//Rute Laravel paling dasar menerima URI dan penutupan, menyediakan metode yang sangat sederhana dan ekspresif untuk menentukan rute dan perilaku tanpa file konfigurasi perutean yang rumit
Route::get('baru', function() {
    return view('baru');
});

// Untuk sebagian besar aplikasi, Anda akan mulai dengan menentukan rute di routes/web.phpfile Anda. Rute yang ditentukan di routes/web.phpdapat diakses dengan memasukkan URL rute yang ditentukan di browser Anda. Contohnya seperti dibawah ini
Route::get('/user', [UserController::class, 'index']);

// //Metode router yang tersedia
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);

//Kadang kali kita menulis route yang akan merespons dengan beberapa kata kerja HTTP.Kita dapat menggunakan metode match. Atau, kita dapat mendaftarkan route yang merespons semua kata kerja HTTP menggunakan metode any :

Route::match(['get', 'post'], '/', function () {
    // ...
});
 
Route::any('/', function () {
    // ...
});

//Redirect route : Jika Anda menentukan rute yang dialihkan ke URI lain, Anda dapat menggunakan Route::redirectmetode ini. Metode ini menyediakan pintasan yang nyaman sehingga Anda tidak perlu menentukan rute lengkap atau pengontrol untuk melakukan pengalihan sederhana
Route::redirect('/here', '/there');

// permanentdirect untuk status code 301
Route::permanentRedirect('/here', '/there');

// Route view ini digunakan, jika hanya ingin mengembalikan "view" saja. metode ini menyediakan pintasan sederhana sehingga Anda tidak perlu menentukan rute atau pengontrol lengkap.
Route::view('/welcome', 'welcome');

//Route Parameter

//Biasanya kita perlu mendapatkan sebuah variabel yang terdapat di dalam sebuah "URI". Contohnya, kalau ingin mendapatkan User ID di dalam sebuah route.
Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
});

//Dalam contoh kode di atas, kita juga bisa mendapatkan 2 variabel atau lebih di dalam sebuah URI
Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    // ...
});
//Route parameter selalu terdapat di dalam {} dan harus terdiri dari karakter alfabet. Bisa juga menggunakan underscore (_)

//Optional parameter : parameter yang boleh dikosongi isinya
Route::get('/user/{name?}', function (string $name = null) {
    return $name;
});
 
Route::get('/user/{name?}', function (string $name = 'John') {
    return $name;
});

//Regular Expressions Constrains Anda dapat membatasi format Route Parameter menggunakan "where" metode pada Route Instance. Metode where menerima nama parameter dan ekspresi reguler (Regex) yang menentukan bagaimana parameter harus dibatasi
Route::get('/user/{name}', function (string $name) {
    // ...
})->where('name', '[A-Za-z]+');
 
Route::get('/user/{id}', function (string $id) {
    // ...
})->where('id', '[0-9]+');
 
Route::get('/user/{id}/{name}', function (string $id, string $name) {
    // ...
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);




//Setelah pola ditentukan, pola tersebut secara otomatis diterapkan ke semua rute menggunakan nama parameter tersebut:
Route::get('/user/{id}', function (string $id) {
    // Only executed if {id} is numeric...
});

//Encoded forward slashes
Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');

//Named Routing
Route::get('/user/profile', function () {
    // ...
})->name('profile');

//Anda juga dapat menentukan named route untuk controller. Named route harus unik
Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');

//Generated URL untuk named route
// Generating URLs...
$url = route('profile');
 
// Generating Redirects...
return redirect()->route('profile');
 
return to_route('profile');

//Jika rute bernama mendefinisikan parameter, Anda dapat meneruskan parameter sebagai argumen kedua ke fungsi route. Parameter yang diberikan akan secara otomatis dimasukkan ke dalam URL yang dihasilkan di posisi yang benar:
Route::get('/user/{id}/profile', function (string $id) {
    // ...
})->name('profile');
 
$url = route('profile', ['id' => 1]);

//Jika Anda meneruskan parameter tambahan dalam larik, pasangan kunci/nilai tersebut akan secara otomatis ditambahkan ke string kueri URL yang dihasilkan:
Route::get('/user/{id}/profile', function (string $id) {
    // ...
})->name('profile');
 
$url = route('profile', ['id' => 1, 'photos' => 'yes']);
 
// /user/1/profile?photos=yes

//Inspecting the current route

//Jika Anda ingin menentukan apakah permintaan saat ini dialihkan ke rute bernama tertentu, Anda dapat menggunakan metode namedpada instance Route. Misalnya, Anda dapat memeriksa nama rute saat ini dari middleware rute:

//Grup rute memungkinkan Anda berbagi atribut rute, seperti middleware, melintasi sejumlah besar rute tanpa perlu menentukan atribut tersebut pada setiap rute individu.

//Middleware
//Untuk menetapkan middleware ke semua rute dalam grup, Anda dapat menggunakan middlewaremetode ini sebelum menentukan grup. Middleware dijalankan sesuai urutan yang tercantum dalam larik:
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });
 
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});

//Controllers
//Jika sekelompok rute semuanya menggunakan controller yang sama , Anda dapat menggunakan controllermetode untuk menentukan pengontrol umum untuk semua rute dalam grup. Kemudian, saat menentukan rute, Anda hanya perlu menyediakan metode pengontrol yang dipanggil:

use App\Http\Controllers\OrderController;
 
Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});

//Subdomain Routing
//Grup rute juga dapat digunakan untuk menangani perutean subdomain. Subdomain dapat diberi parameter rute seperti halnya URI rute, memungkinkan Anda menangkap sebagian subdomain untuk digunakan dalam rute atau pengontrol Anda. Subdomain dapat ditentukan dengan memanggil domainmetode sebelum menentukan grup:
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function (string $account, string $id) {
        // ...
    });
});

//Route prefixes
//Metode ini prefix dapat digunakan untuk mengawali setiap rute dalam grup dengan URI yang diberikan. Misalnya, Anda mungkin ingin mengawali semua rute URI dalam grup dengan admin:
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});

//Route Name Prefixes
//Metode ini namedapat digunakan untuk mengawali setiap nama rute dalam grup dengan string yang diberikan. Misalnya, Anda mungkin ingin mengawali semua nama rute yang dikelompokkan dengan admin. String yang diberikan diawali dengan nama rute persis seperti yang ditentukan, jadi kami pasti akan memberikan karakter tambahan .di awalan:

Route::name('admin.')->group(function () {
    Route::get('/users', function () {
        // Route assigned name "admin.users"...
    })->name('users');
});



