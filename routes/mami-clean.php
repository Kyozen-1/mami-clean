<?php

Route::prefix('mami-clean')->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('/', 'MamiClean\Admin\DashboardController@index')->name('mami-clean.admin.dashboard.index');
        Route::post('/change', 'MamiClean\Admin\DashboardController@change')->name('mami-clean.admin.dashboard.change');
    });

    Route::prefix('profil')->group(function(){
        Route::get('/', 'MamiClean\Admin\ProfilController@index')->name('mami-clean.admin.profil.index');
        Route::get('/detail/{id}', 'MamiClean\Admin\ProfilController@show');
        Route::post('/','MamiClean\Admin\ProfilController@store')->name('mami-clean.admin.profil.store');
        Route::get('/edit/{id}','MamiClean\Admin\ProfilController@edit');
        Route::post('/update','MamiClean\Admin\ProfilController@update')->name('mami-clean.admin.profil.update');
        Route::get('/destroy/{id}','MamiClean\Admin\ProfilController@destroy');
        Route::post('/edit-media-sosial-profil', 'MamiClean\Admin\ProfilController@edit_media_sosial_profil')->name('mami-clean.admin.profil.edit-media-sosial-profil');
        Route::post('/tambah-media-sosial-profil', 'MamiClean\Admin\ProfilController@tambah_media_sosial_profil')->name('mami-clean.admin.profil.tambah-media-sosial-profil');
    });

    Route::prefix('master-data')->group(function(){
        Route::prefix('media-sosial')->group(function(){
            Route::get('/', 'MamiClean\Admin\Master\MasterMediaSosialController@index')->name('mami-clean.admin.master-data.media-sosial.index');
            Route::get('/detail/{id}', 'MamiClean\Admin\Master\MasterMediaSosialController@show');
            Route::post('/','MamiClean\Admin\Master\MasterMediaSosialController@store')->name('mami-clean.admin.master-data.media-sosial.store');
            Route::get('/edit/{id}','MamiClean\Admin\Master\MasterMediaSosialController@edit');
            Route::post('/update','MamiClean\Admin\Master\MasterMediaSosialController@update')->name('mami-clean.admin.master-data.media-sosial.update');
            Route::get('/destroy/{id}','MamiClean\Admin\Master\MasterMediaSosialController@destroy');
        });
    });

    Route::prefix('landing-page')->group(function(){

        Route::prefix('beranda')->group(function(){
            Route::get('/', 'MamiClean\LandingPage\BerandaController@index')->name('mami-clean.landing-page.beranda.index');

            Route::post('/store/section-1', 'MamiClean\LandingPage\BerandaController@store_section_1')->name('mami-clean.landing-page.beranda.store.section-1');

            Route::post('/store/section-2', 'MamiClean\LandingPage\BerandaController@store_section_2')->name('mami-clean.landing-page.beranda.store.section-2');
            Route::post('/store/section-2/hapus', 'MamiClean\LandingPage\BerandaController@hapus_section_2')->name('mami-clean.landing-page.beranda.hapus.section-2');

            Route::post('/store/section-3', 'MamiClean\LandingPage\BerandaController@store_section_3')->name('mami-clean.landing-page.beranda.store.section-3');
            Route::post('/store/section-3/konten', 'MamiClean\LandingPage\BerandaController@store_section_3_konten')->name('mami-clean.landing-page.beranda.store.section-3.konten');
            Route::post('/hapus/section-3/konten', 'MamiClean\LandingPage\BerandaController@hapus_section_3_konten')->name('mami-clean.landing-page.beranda.hapus.section-3.konten');

            Route::post('/store/section-4', 'MamiClean\LandingPage\BerandaController@store_section_4')->name('mami-clean.landing-page.beranda.store.section-4');

            Route::post('/store/section-5', 'MamiClean\LandingPage\BerandaController@store_section_5')->name('mami-clean.landing-page.beranda.store.section-5');

            Route::post('/store/section-6', 'MamiClean\LandingPage\BerandaController@store_section_6')->name('mami-clean.landing-page.beranda.store.section-6');

            Route::post('/store/section-7', 'MamiClean\LandingPage\BerandaController@store_section_7')->name('mami-clean.landing-page.beranda.store.section-7');

            Route::post('/store/section-8', 'MamiClean\LandingPage\BerandaController@store_section_8')->name('mami-clean.landing-page.beranda.store.section-8');

            Route::post('/store/section-9', 'MamiClean\LandingPage\BerandaController@store_section_9')->name('mami-clean.landing-page.beranda.store.section-9');
        });

        Route::prefix('perusahaan')->group(function(){
            Route::get('/', 'MamiClean\LandingPage\PerusahaanController@index')->name('mami-clean.landing-page.perusahaan.index');

            Route::post('/store/section-1', 'MamiClean\LandingPage\PerusahaanController@store_section_1')->name('mami-clean.landing-page.perusahaan.store.section-1');

            Route::post('/store/section-2', 'MamiClean\LandingPage\PerusahaanController@store_section_2')->name('mami-clean.landing-page.perusahaan.store.section-2');

            Route::post('/store/section-3', 'MamiClean\LandingPage\PerusahaanController@store_section_3')->name('mami-clean.landing-page.perusahaan.store.section-3');

            Route::post('/store/section-4', 'MamiClean\LandingPage\PerusahaanController@store_section_4')->name('mami-clean.landing-page.perusahaan.store.section-4');

            Route::post('/store/section-5', 'MamiClean\LandingPage\PerusahaanController@store_section_5')->name('mami-clean.landing-page.perusahaan.store.section-5');

            Route::post('/store/section-6', 'MamiClean\LandingPage\PerusahaanController@store_section_6')->name('mami-clean.landing-page.perusahaan.store.section-6');
        });

        Route::prefix('layanan')->group(function(){
            Route::get('/', 'MamiClean\LandingPage\LayananController@index')->name('mami-clean.landing-page.layanan.index');

            Route::post('/store/section-1', 'MamiClean\LandingPage\LayananController@store_section_1')->name('mami-clean.landing-page.layanan.store.section-1');
        });

        Route::prefix('proyek')->group(function(){
            Route::get('/', 'MamiClean\LandingPage\ProyekController@index')->name('mami-clean.landing-page.proyek.index');

            Route::post('/store/section-1', 'MamiClean\LandingPage\ProyekController@store_section_1')->name('mami-clean.landing-page.proyek.store.section-1');
        });

        Route::prefix('kontak')->group(function(){
            Route::get('/', 'MamiClean\LandingPage\KontakController@index')->name('mami-clean.landing-page.kontak.index');

            Route::post('/store/section-1', 'MamiClean\LandingPage\KontakController@store_section_1')->name('mami-clean.landing-page.kontak.store.section-1');

            Route::post('/store/section-2', 'MamiClean\LandingPage\KontakController@store_section_2')->name('mami-clean.landing-page.kontak.store.section-2');
        });

        Route::prefix('service-quality')->group(function(){
            Route::get('/', 'MamiClean\LandingPage\ServiceQualityController@index')->name('mami-clean.landing-page.service-quality.index');
            Route::post('/', 'MamiClean\LandingPage\ServiceQualityController@store')->name('mami-clean.landing-page.service-quality.store');
            Route::post('/faq', 'MamiClean\LandingPage\ServiceQualityController@faq_store')->name('mami-clean.landing-page.service-quality.faq.store');
            Route::post('/faq/delete', 'MamiClean\LandingPage\ServiceQualityController@faq_delete')->name('mami-clean.landing-page.service-quality.faq.delete');
        });
    });

    Route::prefix('testimonial')->group(function(){
        Route::get('/', 'MamiClean\Admin\TestimonialController@index')->name('mami-clean.admin.testimonial.index');
        Route::get('/detail/{id}', 'MamiClean\Admin\TestimonialController@show');
        Route::post('/','MamiClean\Admin\TestimonialController@store')->name('mami-clean.admin.testimonial.store');
        Route::get('/edit/{id}','MamiClean\Admin\TestimonialController@edit');
        Route::post('/update','MamiClean\Admin\TestimonialController@update')->name('mami-clean.admin.testimonial.update');
        Route::get('/destroy/{id}','MamiClean\Admin\TestimonialController@destroy');
    });

    Route::prefix('brand')->group(function(){
        Route::get('/', 'MamiClean\Admin\BrandController@index')->name('mami-clean.admin.brand.index');
        Route::get('/detail/{id}', 'MamiClean\Admin\BrandController@show');
        Route::post('/','MamiClean\Admin\BrandController@store')->name('mami-clean.admin.brand.store');
        Route::get('/edit/{id}','MamiClean\Admin\BrandController@edit');
        Route::post('/update','MamiClean\Admin\BrandController@update')->name('mami-clean.admin.brand.update');
        Route::get('/destroy/{id}','MamiClean\Admin\BrandController@destroy');
    });

    Route::prefix('layanan')->group(function(){
        Route::get('/', 'MamiClean\Admin\LayananController@index')->name('mami-clean.admin.layanan.index');
        Route::get('/detail/{id}', 'MamiClean\Admin\LayananController@show');
        Route::post('/','MamiClean\Admin\LayananController@store')->name('mami-clean.admin.layanan.store');
        Route::get('/edit/{id}','MamiClean\Admin\LayananController@edit');
        Route::post('/update','MamiClean\Admin\LayananController@update')->name('mami-clean.admin.layanan.update');
        Route::get('/destroy/{id}','MamiClean\Admin\LayananController@destroy');
    });

    Route::prefix('brosur')->group(function(){
        Route::get('/', 'MamiClean\Admin\BrosurController@index')->name('mami-clean.admin.brosur.index');
        Route::get('/detail/{id}', 'MamiClean\Admin\BrosurController@show');
        Route::post('/','MamiClean\Admin\BrosurController@store')->name('mami-clean.admin.brosur.store');
        Route::get('/edit/{id}','MamiClean\Admin\BrosurController@edit');
        Route::post('/update','MamiClean\Admin\BrosurController@update')->name('mami-clean.admin.brosur.update');
        Route::get('/destroy/{id}','MamiClean\Admin\BrosurController@destroy');
    });
});
